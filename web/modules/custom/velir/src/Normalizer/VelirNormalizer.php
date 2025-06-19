<?php

namespace Drupal\velir\Normalizer;

use Drupal\Core\Entity\EntityInterface;
use Drupal\node\NodeInterface;
use Drupal\serialization\Normalizer\ContentEntityNormalizer;

/**
 * {@inheritdoc}
 */
class VelirNormalizer extends ContentEntityNormalizer {

  /**
   * Supported interface or class.
   *
   * @var string
   */
  protected $supportedInterfaceOrClass = NodeInterface::class;

  /**
   * {@inheritdoc}
   */
  public function supportsNormalization($data, $format = NULL, array $context = []): bool {
    if (!parent::supportsNormalization($data, $format, $context) || !$data instanceof EntityInterface) {
      return FALSE;
    }
    return $data->getEntityTypeId() === 'node';
  }

  /**
   * {@inheritdoc}
   */
  public function normalize($entity, $format = NULL, array $context = []): array {
    $values = parent::normalize($entity, $format, $context);
    $values['velir'] = 212;
    return $values;
  }
}