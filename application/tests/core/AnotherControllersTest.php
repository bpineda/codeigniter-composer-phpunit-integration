<?php

require_once(__DIR__.'/../CITestCase.php');

class AnotherControllersTest extends CITestCase
{

  public function testWelcomeIndex()
  {
      $this->requireController('Welcome'); // assuming you have a applications/controllers/Home.php
      $CI = new Welcome();
      //$CI->index();
      $this->assertTrue(true, 'Value should be true');
  }

  /**
   * @expectedException           PHPUnit_Framework_Exception
   * @expectedExceptionCode       403
   * @expectedExceptionMessage    forbidden
   */
  public function testWelcomeDummyMethod()
  {
      $this->requireController('Welcome'); // assuming you have a applications/controllers/Home.php
      $CI = new Welcome();
      $CI->dummy_method();
  }
  
  
}

?>