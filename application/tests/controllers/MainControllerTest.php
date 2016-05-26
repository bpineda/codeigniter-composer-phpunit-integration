<?php
session_start();
require_once(__DIR__.'/../CITestCase.php');
require_once(__DIR__.'/../CIUtilities.php');
require_once(__DIR__.'/../SessionMock.php');

class MainControllerTest extends CITestCase
{

    public function setUp()
    {

        $this->CI = &get_instance();
        $this->Utilities = new CIUtilities();
        $this->Utilities->clean();
        $this->Utilities->populate();

        $this->requireController('Test');
        $this->CIController = new Test();


    }

    public function testIndexMethod()
    {

        //$this->emulateLogIn();
        ob_start();
        $this->CIController->index();
        $html = ob_get_contents();

        $this->assertRegExp('/Home/',$html, 'Text Home not found');
        $this->assertRegExp('/Other/',$html, 'Text Other not found');
        $this->assertRegExp('/Content/',$html, 'Text Content not found');
        $this->assertRegExp('/Footer/',$html, 'Text Footer not found');


        //ob_end_flush();
    }


    private function emulateLogIn()
    {
        /*
         * Fix to emulate user is logged in. I apologize for the hard code but I saw
         * no other way around it.
         *
         */
        $_SESSION['auth'] = true;

        /**
         * This should be used for emulating admin log in.
         */
        //$_SESSION['admin'] = true;
        $this->CIController->session = new SessionMock();
    }

    private function emulateAdminLogIn()
    {

        $_SESSION['admin'] = true;
        $this->CIController->session = new SessionMock();
    }

}

?>