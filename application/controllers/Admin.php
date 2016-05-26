<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(__DIR__ . '/LayoutLoader.php');
class Admin extends LayoutLoader {
  public function __construct()
  {
    parent::__construct();
    $this->controller_name = strtolower(__CLASS__);
  }

  private function verify_auth_admin()
  {
    if(!$this->session->userdata('admin'))
    {
      redirect('/admin/logout', 'refresh');
      return;
    }
  }


}