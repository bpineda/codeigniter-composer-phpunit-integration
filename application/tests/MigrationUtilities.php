<?php
require_once(__DIR__.'/CITestCase.php');
require_once(__DIR__.'/CIUtilities.php');

class MigrationUtilities extends CITestCase
{

    public function setUp()
    {
        $this->CI = &get_instance();
        $this->Utilities = new CIUtilities();
        echo '
';
        $this->Utilities->printTitleWithColor('Running Migrations', 34);
        $this->requireController('Migrate');
        $this->CIController = new Migrate();
        $this->CIController->index();

    }

    /**
     * We need this empty test in order for PHPUnit to run the setupMethod and run the migrations
     */
    public function testRunMigrations(){}





}

?>