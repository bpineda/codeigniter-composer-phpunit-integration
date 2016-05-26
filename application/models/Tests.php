<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once('ActiveRecordBase.php');
/**
 * Created by PhpStorm.
 * Date: 3/2/16
 * Time: 12:01 AM
 */
class Tests extends ActiveRecordBase
{

    protected $table_name = 'test';
    function __construct()
    {
        parent::__construct();
    }

}