<?php

/**
 *
 * Composer hack to make composer work properly with CodeIgniter
 *
 *
 */

class Composer_loader
{

    public function __construct()
    {
        include('./vendor/autoload.php');
    }
}
