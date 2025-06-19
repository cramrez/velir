<?php

declare(strict_types=1);

namespace Drupal\Tests\velir\Kernel;

use Drupal\KernelTests\KernelTestBase;
use Drupal\node\Entity\Node;
use Drupal\user\Entity\User;
use PHPUnit\Framework\Attributes\Group;

/**
 * Test description.
 */
#[Group('velir')]
final class VelirJsonFieldTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'node',
    'user',
    'text',
    'serialization',
    'field',
    'filter',
    'system',
    'velir',
  ];

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    // Install required schemas.
    $this->installEntitySchema('user');
    $this->installEntitySchema('node');
    $this->installConfig(['node']);
  }

  /**
   * Test callback.
   */
  public function testVelirJsonFieldRouteResponse(): void {
    // Create user.
    $user = User::create([
      'name' => 'author',
      'mail' => 'author@example.com',
      'status' => 1,
    ]);
    $user->save();
    // Create a basic page node.
    $node = Node::create([
      'type' => 'page',
      'title' => 'Test Node',
      'uid' => $user->id(),
      'status' => 1,
    ]);
    $node->save();
    // Serialize the node.
    /** @var \Symfony\Component\Serializer\SerializerInterface $serializer */
    $serializer = $this->container->get('serializer');
    $data = $serializer->serialize($node, 'json', ['plugin_id' => 'entity:node']);
    // Convert JSON to array for assertion.
    $decoded = json_decode($data, TRUE);
    $this->assertArrayHasKey('velir', $decoded);
    $this->assertEquals('212', $decoded['velir'], "Field velir : " . $decoded['velir']);

  }

}
