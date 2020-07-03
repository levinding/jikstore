<?php

namespace Drupal\Tests\commerce_promotion\Kernel\Plugin\Commerce\PromotionOffer;

use Drupal\commerce_order\Entity\OrderItem;
use Drupal\commerce_order\Entity\Order;
use Drupal\commerce_price\Price;
use Drupal\commerce_promotion\Entity\Promotion;
use Drupal\Tests\commerce_order\Kernel\OrderKernelTestBase;

/**
 * Tests the fixed amount off offer for orders.
 *
 * @coversDefaultClass \Drupal\commerce_promotion\Plugin\Commerce\PromotionOffer\OrderFixedAmountOff
 *
 * @group commerce
 */
class OrderFixedAmountOffTest extends OrderKernelTestBase {

  /**
   * The test order.
   *
   * @var \Drupal\commerce_order\Entity\OrderInterface
   */
  protected $order;

  /**
   * Modules to enable.
   *
   * @var array
   */
  public static $modules = [
    'commerce_promotion',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    $this->installEntitySchema('commerce_promotion');
    $this->installConfig(['commerce_promotion']);
    $this->installSchema('commerce_promotion', ['commerce_promotion_usage']);

    $this->order = Order::create([
      'type' => 'default',
      'state' => 'completed',
      'mail' => 'test@example.com',
      'ip_address' => '127.0.0.1',
      'order_number' => '6',
      'uid' => $this->createUser(),
      'store_id' => $this->store,
      'order_items' => [],
    ]);
  }

  /**
   * Tests the offer.
   *
   * @covers ::apply
   */
  public function testOffer() {
    // Starts now, enabled. No end time.
    $promotion = Promotion::create([
      'name' => 'Promotion 1',
      'order_types' => [$this->order->bundle()],
      'stores' => [$this->store->id()],
      'status' => TRUE,
      'offer' => [
        'target_plugin_id' => 'order_fixed_amount_off',
        'target_plugin_configuration' => [
          'amount' => [
            'number' => '25.00',
            'currency_code' => 'USD',
          ],
        ],
      ],
    ]);
    $promotion->save();

    $order_item = OrderItem::create([
      'type' => 'test',
      'quantity' => '1',
      'unit_price' => [
        'number' => '20.00',
        'currency_code' => 'USD',
      ],
    ]);
    $order_item->save();
    $this->order->addItem($order_item);
    $this->order->state = 'draft';
    $this->order->save();
    $this->order = $this->reloadEntity($this->order);
    $order_items = $this->order->getItems();
    $order_item = reset($order_items);
    $adjustments = $order_item->getAdjustments();
    $this->assertEquals(1, count($adjustments));
    /** @var \Drupal\commerce_order\Adjustment $adjustment */
    $adjustment = reset($adjustments);

    // Offer amount larger than the order subtotal.
    $this->assertEquals(0, count($this->order->getAdjustments()));
    $this->assertEquals(1, count($order_item->getAdjustments()));
    $this->assertEquals('Discount', $adjustment->getLabel());
    $this->assertEquals(new Price('-20.00', 'USD'), $adjustment->getAmount());
    $this->assertEquals(new Price('20.00', 'USD'), $order_item->getTotalPrice());
    $this->assertEquals(new Price('0.00', 'USD'), $order_item->getAdjustedTotalPrice());
    $this->assertEquals(new Price('0.00', 'USD'), $this->order->getTotalPrice());

    // Offer amount smaller than the order subtotal.
    $promotion->setDisplayName('$25 off');
    $promotion->save();
    $order_item->setQuantity(2);
    $order_item->save();
    $this->order->save();
    $this->order = $this->reloadEntity($this->order);
    $order_items = $this->order->getItems();
    $order_item = reset($order_items);
    $adjustments = $order_item->getAdjustments();
    $this->assertEquals(1, count($adjustments));
    /** @var \Drupal\commerce_order\Adjustment $adjustment */
    $adjustment = reset($adjustments);

    $this->assertEquals(0, count($this->order->getAdjustments()));
    $this->assertEquals(1, count($order_item->getAdjustments()));
    $this->assertEquals('$25 off', $adjustment->getLabel());
    $this->assertEquals(new Price('-25.00', 'USD'), $adjustment->getAmount());
    $this->assertEquals(new Price('40.00', 'USD'), $order_item->getTotalPrice());
    $this->assertEquals(new Price('15.00', 'USD'), $order_item->getAdjustedTotalPrice());
    $this->assertEquals(new Price('15.00', 'USD'), $this->order->getTotalPrice());

    // Tests with multiple promotions.
    // Starts now, enabled. No end time.
    $another_promotion = Promotion::create([
      'name' => 'Promotion 2',
      'order_types' => [$this->order->bundle()],
      'stores' => [$this->store->id()],
      'status' => TRUE,
      'offer' => [
        'target_plugin_id' => 'order_fixed_amount_off',
        'target_plugin_configuration' => [
          'amount' => [
            'number' => '25.00',
            'currency_code' => 'USD',
          ],
        ],
      ],
    ]);
    $another_promotion->save();
    $this->order->save();
    $order_item_adjustments = $order_item->getAdjustments();
    $this->assertEquals(2, count($order_item_adjustments));
    $this->assertEquals('$25 off', $order_item_adjustments[0]->getLabel());
    $this->assertEquals(new Price('-25.00', 'USD'), $order_item_adjustments[0]->getAmount());
    $this->assertEquals(new Price('-15.00', 'USD'), $order_item_adjustments[1]->getAmount());
    $this->assertEquals(new Price('40.00', 'USD'), $order_item->getTotalPrice());
    $this->assertEquals(new Price('0', 'USD'), $order_item->getAdjustedTotalPrice());
    $this->assertEquals(new Price('0', 'USD'), $this->order->getTotalPrice());
  }

}
