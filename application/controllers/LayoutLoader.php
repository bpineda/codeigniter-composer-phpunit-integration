<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * Date: 2/24/16
 * Time: 12:47 PM
 */
class LayoutLoader  extends CI_Controller
{
    protected $controller_name;
    protected function regular_layout($data, $view_name = '')
    {
        $backtrace = debug_backtrace();
        $view_to_load = $view_name == '' ? $backtrace[1]['function'] : $view_name;

        $this->load->view(  'layouts/header',
                            array()
        );

        $nav_data['selected_tab'] = $data['selected_tab'];
        $nav_data['user_name'] = $data['user_name'];
        $this->load->view(  'layouts/foundation_nav',
                            $nav_data
        );

        $this->load->view(  $this->controller_name .'/'.$view_to_load,
                            $data
        );

        $this->load->view('layouts/footer');
    }

    protected function admin_layout($data, $view_name = '')
    {
        $backtrace = debug_backtrace();
        $view_to_load = $view_name == '' ? $backtrace[1]['function'] : $view_name;
        $this->load->view(  'layouts/admin/header',
                            $data['user_name']
        );
        $this->load->view(  'layouts/admin/foundation_nav',
                            $data['selected_tab']
        );
        $this->load->view(  $this->controller_name .'/'.$view_to_load,
                            $data
        );
        $this->load->view('layouts/admin/footer');
    }

    protected function login_layout($data, $view_name = '')
    {
        $backtrace = debug_backtrace();
        $view_to_load = $view_name == '' ? $backtrace[1]['function'] : $view_name;
        $this->load->view('layouts/login/header');
        $this->load->view(  $this->controller_name .'/'.$view_to_load,
                            $data
        );
        $this->load->view('layouts/login/footer');

    }

    protected function ws_layout($data, $view_name = '')
    {
        $backtrace = debug_backtrace();
        $view_to_load = $view_name == '' ? $backtrace[1]['function'] : $view_name;
        $this->load->view(  $this->controller_name .'/'.$view_to_load,
            $data
        );
    }

}