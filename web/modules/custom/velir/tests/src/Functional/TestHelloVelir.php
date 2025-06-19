<?php

declare(strict_types=1);

namespace Drupal\Tests\velir\Functional;

use Drupal\Tests\BrowserTestBase;
use Drupal\user\Entity\Role;
use PHPUnit\Framework\Attributes\Group;

/**
 * Tests the /hello-velir-1 route.
 */
#[Group('velir')]
class TestHelloVelir extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'claro';

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['velir'];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $role = Role::load('anonymous');
    $role->grantPermission('access content');
    $role->save();
  }

  /**
   * Test callback.
   */
  public function testHelloRoute(): void {
    $name = 'Carlos';
    $path = '/hello-velir-1/';

    // Visit the custom route.
    $this->drupalGet($path);
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->pageTextContains("Hello, my name is $name");
  }

}
