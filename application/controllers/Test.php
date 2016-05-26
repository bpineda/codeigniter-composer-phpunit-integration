<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__ . '/LayoutLoader.php');
class Test extends LayoutLoader {

    public function __construct()
    {
        parent::__construct();
        $this->controller_name = strtolower(__CLASS__);
    }

    public function index()
    {
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
