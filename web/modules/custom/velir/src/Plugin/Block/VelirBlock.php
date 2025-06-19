<?php

declare(strict_types=1);

namespace Drupal\velir\Plugin\Block;

use Drupal\Core\Block\Attribute\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Cache\CacheableDependencyInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;

/**
 * Provides a velir block block.
 */
#[Block(
  id: 'velir_block',
  admin_label: new TranslatableMarkup('Velir Block'),
  category: new TranslatableMarkup('Custom'),
)]
final class VelirBlock extends BlockBase implements CacheableDependencyInterface {

  /**
   * {@inheritdoc}
   */
  public function build(): array {
    $msg = 'Log in';
    if (\Drupal::currentUser()->isAuthenticated()) {
      $msg = $this->t('Welcome, @username!', ['@username' => \Drupal::currentUser()->getAccountName()]);
    }
    $build['content'] = [
      '#markup' => $msg,
      '#cache' => [
        'contexts' => ['user'],
        'tags' => ['user:' . \Drupal::currentUser()->id()],
      ],
    ];
    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts() {
    return Cache::mergeContexts(parent::getCacheContexts(), ['user']);
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheTags() {
    return Cache::mergeTags(parent::getCacheTags(), ['user:' . \Drupal::currentUser()->id()]);
  }

}
