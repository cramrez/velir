<?php

declare(strict_types=1);

namespace Drupal\velir\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Velir routes.
 */
final class VelirController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function __invoke() {

    $build = [
      '#markup' => $this->t('Hello, my name is Carlos'),
    ];
    return $build;
  }

}
