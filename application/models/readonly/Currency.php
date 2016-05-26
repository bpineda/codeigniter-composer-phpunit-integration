<?php
require_once(__DIR__ . '/../ActiveRecordArray.php');
/**
 * Created by PhpStorm.
 * Date: 2/22/16
 * Time: 6:20 PM
 */
class Currency extends ActiveRecordArray
{

    protected $data = [ 1 => array( 'name' => 'MXN'),
                        2 => array( 'name' => 'USD')
    ];

}