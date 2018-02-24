<?php

 namespace Drupal\d8dev\Controller;

/**
 * Provides route response for the d8dev module.
 */
class D8devController {

  /**
   * Returns a simple page.
   *
   * @return array
   *   A sinmple renderable array.
   */
  public function myPage() {

    return [
      '#type' => 'markup',
      '#markup' => 'Hello world',
    ];
  }

}
