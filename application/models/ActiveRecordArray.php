<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * Date: 2/22/16
 * Time: 2:29 PM
 */
abstract class ActiveRecordArray extends CI_Model
{
    protected $data;

    public function get($id)
    {
        if( array_key_exists(   $id,
                                $this->data ) )
        {

            return $this->data[ $id ];

        }

        return NULL;

    }

    public function all()
    {

        return $this->data;

    }

}