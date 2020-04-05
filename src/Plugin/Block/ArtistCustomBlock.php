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
 *  admin_label = @Translation("Music Block"),
 * )
 */
class ArtistCustomBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {    
   $service = \Drupal::service('latest_artist.custom_services');
   $username=$service->whoIsYourOwner();
   $nodes=$service->getServiceData();
    return [      
      'nodes' => $nodes,
      'currentuser' => $username,      
    ];
  }
  
  /**
   * Only when node(s) of type 'artists' are updated. See .module file
   */
  public function getCacheTags() {
    //return Cache::mergeTags(parent::getCacheTags(), ['node_list']);
    return Cache::mergeTags(parent::getCacheTags(), ['latest_artist_updates']);
  }
  
}