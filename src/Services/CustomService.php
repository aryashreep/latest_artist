<?php

namespace Drupal\latest_artist\Services;

use Drupal\Core\Block\BlockBase;
use Drupal\node\Entity\Node;
use Drupal\Core\Session\AccountProxyInterface;
/**
 * Class CustomService.
 */
class CustomService {

  private $currentUser;
  /**
   * Constructs a new CustomService object.
   */
  public function __construct(AccountProxyInterface $currentUser) {
    $this->currentUser=$currentUser;    
  }

  public function getServiceData() {
    //Do something here to get any data.
    $entityQuery = \Drupal::entityQuery('node');
    $nids = $entityQuery->condition('type', 'artists')
        ->condition('status', 1)
        ->execute();
    $nodes = Node::loadMultiple($nids);    
    return $nodes;
  }

  /**
   * Here you can pass your values as $array.
   */
  public function postServiceData($array) {
    //Do something here to post any data.
  }
  
    /**
   * return the current user
   */
  public function whoIsYourOwner() {
    return $this->currentUser->getDisplayName();
  }

}