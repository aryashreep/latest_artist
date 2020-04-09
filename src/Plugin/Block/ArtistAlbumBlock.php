<?php

namespace Drupal\latest_artist\Plugin\Block;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Cache\Cache;  

/**
 *
 * @Block(
 *  id = "artist_album_block",
 *  admin_label = @Translation("Artist Album Block"),
 * )
 */
class ArtistAlbumBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    // Getting all Artist Album content.
    $service = \Drupal::service('latest_artist.artist_album_services');
    $nodes=$service->getAlbumServiceData();

    $result = array(
      '#theme' => 'artist_album_block',
      '#nodes' => $nodes,
    );

    return $result;
  }  
}