<?php

namespace Drupal\latest_artist\Services;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Session\AccountProxyInterface;
/**
 * Class CustomService.
 */
class CustomService {

  public function getServiceData() {
    //Do something here to get any data.
    $entityQuery = \Drupal::entityQuery('node');
    $nids = $entityQuery->condition('type', 'artist')
        ->condition('status', 1)
        ->range(0, 5)
        ->execute();
    $nodes = Node::loadMultiple($nids);    
    return $nodes;
  }

}