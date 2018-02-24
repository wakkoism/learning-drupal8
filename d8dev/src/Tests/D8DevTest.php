<?php

namespace Drupal\d8dev\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Test the d8dev mdoule functionalitty.
 *
 * @group d8dev
 */
class D8DevTest extends WebTestBase {

  /**
   * Test route 'mypage/page' path returns content.
   */
  public function testCustomPageExists() {
    $this->drupalGet('mypage/page');
    $this->assertResponse(200);
  }

}
