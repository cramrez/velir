<?php

declare(strict_types=1);

namespace Drupal\velir\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Returns responses for Velir routes.
 */
final class JsonController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function __invoke() {

    $build = [
      $this->t('Hello, my name is Carlos'),
    ];
    return new JsonResponse($build);
  }

}
