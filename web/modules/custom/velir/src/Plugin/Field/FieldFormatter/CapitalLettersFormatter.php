<?php

declare(strict_types=1);

namespace Drupal\velir\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\Attribute\FieldFormatter;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Plugin implementation of the 'CapitalLetters' formatter.
 */
#[FieldFormatter(
  id: 'velir_capitalletters',
  label: new TranslatableMarkup('CapitalLetters'),
  field_types: ['string'],
)]
class CapitalLettersFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode): array {
    $element = [];
    foreach ($items as $delta => $item) {
      $element[$delta] = [
        '#markup' => strtoupper($item->value),
      ];
    }
    return $element;
  }

}
