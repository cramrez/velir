<?php

declare(strict_types=1);

namespace Drupal\Tests\velir\Functional;

use Drupal\Tests\BrowserTestBase;
use Drupal\user\Entity\User;
use PHPUnit\Framework\Attributes\Group;

/**
 * Test description.
 */
#[Group('velir')]
final class TestRoleVelir extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'claro';

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['velir'];

  /**
   * Test callback.
   */
  public function testRoleRoute(): void {
    $name = 'Carlos';
    $path = '/hello-velir-3/';

    $this->drupalGet($path);
    $this->assertSession()->statusCodeEquals(403);

    $admin_account = $this->drupalCreateUser([], NULL, TRUE, ['roles' => ['administrator']]);
    $this->drupalLogin($admin_account);

    $this->drupalGet($path);
    $this->assertSession()->statusCodeEquals(200);
    $this->assertSession()->pageTextContains("Hello, my name is $name");
  }

}
