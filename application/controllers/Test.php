<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__ . '/LayoutLoader.php');
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
class Test extends LayoutLoader {

    public function __construct()
    {
        parent::__construct();
        $this->controller_name = strtolower(__CLASS__);
    }

    public function index()
    {
        $log = new Logger('name');
        $log->pushHandler(new StreamHandler('mein_log.log', Logger::WARNING));

        // add records to the log
        $log->warning('Foo');
        $log->error('Bar');

        $this->load->model('Tests', '', TRUE);
        $data['user_name'] = 'User Full Name';
        $data['selected_tab'] = 'index';
        $this->regular_layout($data);
    }

    public function other()
    {

        $data['user_name'] = 'User Full Name';
        $data['selected_tab'] = 'index';
        $this->regular_layout($data);
    }

}
