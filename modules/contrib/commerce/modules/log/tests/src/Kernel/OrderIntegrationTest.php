<?php

namespace Drupal\Tests\commerce_log\Kernel;

use Drupal\commerce_order\Entity\Order;
use Drupal\commerce_order\Entity\OrderInterface;
use Drupal\commerce_order\Entity\OrderType;
use Drupal\commerce_price\Price;
use Drupal\commerce_product\Entity\Product;
use Drupal\commerce_product\Entity\ProductVariation;
use Drupal\commerce_product\Entity\ProductVariationType;
use Drupal\Component\Render\FormattableMarkup;
use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceModifierInterface;
use Drupal\profile\Entity\Profile;
use Drupal\Tests\commerce_order\Kernel\OrderKernelTestBase;
use Drupal\user\Entity\User;

/**
 * Tests integration with order events.
 *
 * @group commerce
 */
class OrderIntegrationTest extends OrderKernelTestBase implements ServiceModifierInterface {

  /**
   * A sample order.
   *
   * @var \Drupal\commerce_order\Entity\OrderInterface
   */
  protected $order;

  /**
   * The log storage.
   *
   * @var \Drupal\commerce_log\LogStorageInterface
   */
  protected $logStorage;

  /**
   * The log view builder.
   *
   * @var \Drupal\commerce_log\LogViewBuilder
   */
  protected $logViewBuilder;

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = [
    'commerce_log',
    'commerce_log_test',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->installEntitySchema('commerce_log');
    $user = $this->createUser(['mail' => $this->randomString() . '@example.com']);
    $this->logStorage = $this->container->get('entity_type.manager')->getStorage('commerce_log');
    $this->logViewBuilder = $this->container->get('entity_type.manager')->getViewBuilder('commerce_log');

    // Change the workflow of the default order type.
    $order_type = OrderType::load('default');
    $order_type->setWorkflowId('order_fulfillment_validation');
    $order_type->save();

    // Turn off title generation to allow explicit values to be used.
    $variation_type = ProductVariationType::load('default');
    $variation_type->setGenerateTitle(FALSE);
    $variation_type->save();

    $product = Product::create([
      'type' => 'default',
      'title' => 'Default testing product',
    ]);
    $product->save();

    $variation1 = ProductVariation::create([
      'type' => 'default',
      'sku' => 'TEST_' . strtolower($this->randomMachineName()),
      'title' => $this->randomString(),
      'status' => 1,
      'price' => new Price('12.00', 'USD'),
    ]);
    $variation1->save();
    $product->addVariation($variation1)->save();

    $profile = Profile::create([
      'type' => 'customer',
    ]);
    $profile->save();
    $profile = $this->reloadEntity($profile);

    /** @var \Drupal\commerce_order\OrderItemStorageInterface $order_item_storage */
    $order_item_storage = $this->container->get('entity_type.manager')->getStorage('commerce_order_item');

    $order_item1 = $order_item_storage->createFromPurchasableEntity($variation1);
    $order_item1->save();
    $order = Order::create([
      'type' => 'default',
      'store_id' => $this->store->id(),
      'state' => 'draft',
      'mail' => $user->getEmail(),
      'uid' => $user->id(),
      'ip_address' => '127.0.0.1',
      'order_number' => '6',
      'billing_profile' => $profile,
      'order_items' => [$order_item1],
    ]);
    $order->save();
    $this->order = $this->reloadEntity($order);
  }

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    $container->removeDefinition('commerce_order.order_receipt_subscriber');
  }

  /**
   * Tests that a log is generated for the cancel transition.
   */
  public function testCancelLog() {
    // Draft -> Canceled.
    $this->order->getState()->applyTransitionById('cancel');
    $this->order->save();

    $logs = $this->logStorage->loadMultipleByEntity($this->order);
    $this->assertEquals(1, count($logs));
    $log = reset($logs);
    $build = $this->logViewBuilder->view($log);
    $this->render($build);

    $this->assertText('The order was canceled.');
  }

  /**
   * Tests that a log is generated for place, validate, and fulfill transitions.
   */
  public function testPlaceValidateFulfillLogs() {
    // Draft -> Placed.
    $this->order->getState()->applyTransitionById('place');
    $this->order->save();

    $logs = $this->logStorage->loadMultipleByEntity($this->order);
    $this->assertEquals(1, count($logs));
    $log = reset($logs);
    $build = $this->logViewBuilder->view($log);
    $this->render($build);

    $this->assertText('The order was placed.');

    // Placed -> Validated.
    $this->order->getState()->applyTransitionById('validate');
    $this->order->save();

    $logs = $this->logStorage->loadMultipleByEntity($this->order);
    $this->assertEquals(2, count($logs));
    $log = $logs[2];
    $build = $this->logViewBuilder->view($log);
    $this->render($build);

    $this->assertText('The order was validated.');

    // Validated -> Fulfilled.
    $this->order->getState()->applyTransitionById('fulfill');
    $this->order->save();

    $logs = $this->logStorage->loadMultipleByEntity($this->order);
    $this->assertEquals(3, count($logs));
    $log = $logs[3];
    $build = $this->logViewBuilder->view($log);
    $this->render($build);

    $this->assertText('The order was fulfilled.');
  }

  /**
   * Tests that an order assignment log is generated.
   */
  public function testOrderAssignedLog() {
    // Reassignment is currently only done on user login.
    $this->order->setCustomer(User::getAnonymousUser());
    $this->order->setRefreshState(OrderInterface::REFRESH_SKIP);
    $this->order->save();
    $new_user = $this->createUser();

    $order_assignment = $this->container->get('commerce_order.order_assignment');
    $order_assignment->assign($this->order, $new_user);

    $logs = $this->logStorage->loadMultipleByEntity($this->order);
    $this->assertEquals(1, count($logs));
    $log = reset($logs);
    $build = $this->logViewBuilder->view($log);
    $this->render($build);
    $this->assertText("The order was assigned to {$new_user->getDisplayName()}.");
  }

  /**
   * Tests that a log is generated when any order email is sent.
   */
  public function testEmailLog() {
    $order_receipt_mail = $this->container->get('commerce_order.order_receipt_mail');
    $order_receipt_mail->send($this->order);
    $this->order->setData('simulate_mail_failure', TRUE);
    $order_receipt_mail->send($this->order);
    $this->order->unsetData('simulate_mail_failure');
    $subject = sprintf('Order %s test mail', $this->order->getOrderNumber());
    $params = [
      'id' => 'order_test',
      'from' => $this->order->getStore()->getEmail(),
      'order' => $this->order,
    ];
    $mail_handler = $this->container->get('commerce.mail_handler');
    $mail_handler->sendMail($this->order->getEmail(), $subject, [], $params);
    $this->order->setData('simulate_mail_failure', TRUE);
    $mail_handler->sendMail($this->order->getEmail(), $subject, [], $params);

    $logs = $this->logStorage->loadMultipleByEntity($this->order);
    $this->assertEquals(4, count($logs));
    $success_log = reset($logs);
    $build = $this->logViewBuilder->view($success_log);
    $this->render($build);
    $this->assertText(new FormattableMarkup('Order receipt email sent to @mail.', ['@mail' => $this->order->getEmail()]));

    $failure_log = $logs[2];
    $build = $this->logViewBuilder->view($failure_log);
    $this->render($build);
    $this->assertText(new FormattableMarkup('Order receipt email failed to send to @mail.', ['@mail' => $this->order->getEmail()]));

    $order_test_log = $logs[3];
    $build = $this->logViewBuilder->view($order_test_log);
    $this->render($build);
    $this->assertText(new FormattableMarkup('Email "order_test" sent to @mail.', ['@mail' => $this->order->getEmail()]));

    $order_test_failure_log = $logs[4];
    $build = $this->logViewBuilder->view($order_test_failure_log);
    $this->render($build);
    $this->assertText(new FormattableMarkup('Failed to send "order_test" to @mail.', ['@mail' => $this->order->getEmail()]));
  }

}
