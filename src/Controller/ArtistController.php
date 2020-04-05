<?php
/**
 * @file 
 * Contains \Drupal\common\Controller\HomeController
 */
namespace Drupal\latest_artist\Controller;
use Drupal\Core\Controller\ControllerBase;

class ArtistController extends ControllerBase {

  public function content(){
    return array(
      '#type' => 'markup',
      '#markup' => $this->t(''),
    );
  }

  }