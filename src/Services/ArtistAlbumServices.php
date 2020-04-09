<?php

namespace Drupal\latest_artist\Services;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Session\AccountProxyInterface;
/**
 * Class ArtistAlbumServices.
 */
class ArtistAlbumServices {

  public function getAlbumServiceData() {
    //Do something here to get any data.
    $node = \Drupal::routeMatch()->getParameter('node');
    if ($node instanceof \Drupal\node\NodeInterface) {
      // You can get nid and anything else you need from the node object.
      $nid = $node->id();
      $entityQuery = \Drupal::entityQuery('node');
      $nids = $entityQuery->condition('type', 'music')
        ->condition('status', NODE_PUBLISHED)
        ->condition('field_related_artist.target_id', $nid)
        ->execute();

      // Fetch albums.
      $entityQuery = \Drupal::entityQuery('node');
      $album_nids = $entityQuery->condition('type', 'album')
        ->condition('status', NODE_PUBLISHED)
        ->condition('field_related_music.target_id', $nids, 'IN')
        ->execute();
      $nodes = Node::loadMultiple($album_nids);
      return $nodes;
    }    
  }
}