<?php

namespace Drupal\latest_artist\Plugin\Block;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Cache\Cache;  

/**
 *
 * @Block(
 *  id = "artist_custom_block",
 *  admin_label = @Translation("Artist Block"),
 * )
 */
class ArtistCustomBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {    
    // Getting all Artist content.
    $service = \Drupal::service('latest_artist.custom_services');
    $nodes=$service->getServiceData();

    return [
      '#theme' => 'popular_artist_block',
      '#nodes' => $nodes,
    ];
  }  
}