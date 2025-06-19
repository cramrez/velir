<?php

namespace Drupal\velir\Commands;

use Drupal\node\Entity\Node;
use Drush\Commands\DrushCommands;

/**
 * Drush command file.
 */
class DummyContentCommands extends DrushCommands {

  /**
   * Create dummy content.
   *
   * @command dummy-content
   * @aliases dc
   * @description Create dummy content.
   */
  public function dummyContent($limit = NULL) {
    $node_page = Node::create([
      'type' => 'page',
      'title' => 'Hello from install',
      'field_description' => 'Field description',
      'moderation_state' => 'published',
      'status' => 1,
      'uid' => 1,
    ]);
    $node_page->save();

    $node_article = Node::create([
      'type' => 'article',
      'title' => 'Sample article from the module',
      'status' => 1,
      'uid' => 1,
      'field_subtitle' => 'Code generated subtitle.',
      'field_body' => [
        'value' => '<p>This is the <strong>body</strong> content created from drush.</p>',
        'format' => 'content_format',
      ],
    ]);
    $node_article->save();

    $node_article1 = Node::create([
      'type' => 'article',
      'title' => 'Sample article from the module #2',
      'status' => 1,
      'uid' => 1,
      'field_subtitle' => 'Code generated subtitle.',
      'field_body' => [
        'value' => '<p>This is the <strong>body</strong> content created from drush.</p>',
        'format' => 'content_format',
      ],
    ]);
    $node_article1->save();

    $this->io()->note("Dummy content created.");
  }

}
