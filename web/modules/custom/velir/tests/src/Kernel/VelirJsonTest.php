<?php

declare(strict_types=1);

namespace Drupal\Tests\velir\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Drupal\user\Entity\Role;
use Symfony\Component\HttpFoundation\Request;
use PHPUnit\Framework\Attributes\Group;

/**
 * Test description.
 */
#[Group('velir')]
final class VelirJsonTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['velir'];

  /**
   * Test callback.
   */
  public function testVelirJsonRouteResponse(): void {
    $request = Request::create('/hello-velir-2');
    $response = $this->container->get('http_kernel')->handle($request);
    $this->assertEquals(200, $response->getStatusCode(), 'The route should return a 200 OK status code.');
    $this->assertEquals('application/json', $response->headers->get('Content-Type'), 'The response content type should be application/json.');

  }

}
