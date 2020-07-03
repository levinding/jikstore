<?php

namespace Drupal\Tests\commerce_cart\Kernel;

use Drupal\commerce_order\OrderQueryAccessHandler;
use Drupal\Core\Session\AnonymousUserSession;
use Drupal\entity\QueryAccess\Condition;

/**
 * Tests query access filtering for carts.
 *
 * @coversDefaultClass \Drupal\commerce_cart\EventSubscriber\QueryAccessSubscriber
 * @group commerce
 */
class CartQueryAccessTest extends CartKernelTestBase {

  /**
   * The query access handler.
   *
   * @var \Drupal\commerce_order\OrderQueryAccessHandler
   */
  protected $handler;

  /**
   * {@inheritdoc}
   */
  protected function setUp() {
    parent::setUp();

    // Create uid: 1 here so that it's skipped in test cases.
    $admin_user = $this->createUser();

    $entity_type_manager = $this->container->get('entity_type.manager');
    $entity_type = $entity_type_manager->getDefinition('commerce_order');
    $this->handler = OrderQueryAccessHandler::createInstance($this->container, $entity_type);
  }

  /**
   * @covers ::onQueryAccess
   */
  public function testAccess() {
    // User with full access.
    foreach (['administer commerce_order', 'view commerce_order'] as $permission) {
      $user = $this->createUser([], [$permission]);
      $conditions = $this->handler->getConditions('view', $user);
      $this->assertEquals(0, $conditions->count());
      $this->assertEquals(['user.permissions'], $conditions->getCacheContexts());
      $this->assertFalse($conditions->isAlwaysFalse());
    }

    // Anonymous user with no access other than to their own carts.
    $anon_user = new AnonymousUserSession();
    $cart = $this->cartProvider->createCart('default', $this->store, $anon_user);
    $conditions = $this->handler->getConditions('view');
    $expected_conditions = [
      new Condition('order_id', [$cart->id()]),
    ];
    $this->assertEquals(1, $conditions->count());
    $this->assertEquals($expected_conditions, $conditions->getConditions());
    $this->assertEquals(['user.permissions'], $conditions->getCacheContexts());
    $this->assertFalse($conditions->isAlwaysFalse());

    // Confirm that finalized carts are also allowed.
    $this->cartProvider->finalizeCart($cart);
    $conditions = $this->handler->getConditions('view', $anon_user);
    $this->assertEquals(1, $conditions->count());
    $this->assertEquals(['user.permissions'], $conditions->getCacheContexts());
    $expected_conditions = [
      new Condition('order_id', [$cart->id()]),
    ];
    $this->assertEquals($expected_conditions, $conditions->getConditions());

    // Create another cart.
    $another_cart = $this->cartProvider->createCart('default', $this->store, $anon_user);
    $conditions = $this->handler->getConditions('view', $anon_user);
    $expected_conditions = [
      new Condition('order_id', [$another_cart->id(), $cart->id()]),
    ];
    $this->assertEquals(1, $conditions->count());
    $this->assertEquals($expected_conditions, $conditions->getConditions());
    $this->assertEquals(['user.permissions'], $conditions->getCacheContexts());
    $this->assertFalse($conditions->isAlwaysFalse());
  }

}
