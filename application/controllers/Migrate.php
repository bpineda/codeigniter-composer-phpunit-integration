<?php

/**
 * Created by PhpStorm.
 * Date: 2/17/16
 * Time: 1:22 PM
 */
class Migrate extends CI_Controller
{
    public function index()
    {

        $this->load->library('migration');

        if ($this->migration->current() === FALSE)
        {
            show_error($this->migration->error_string());
        }
    }

}
