<?php

/**
 * Created by PhpStorm.
 * Date: 3/18/16
 * Time: 9:28 AM
 */
class AuthHookClass
{
    private $arr_exceptions = ['users','welcome'];
    public function verifyUser()
    {

        $CI =& get_instance();
        //If the controller is not in the exceptions array, authenticate
        //Uncomment if you want to authenticate
        /*if(!in_array($CI->router->class,$this->arr_exceptions))
        {

            $this->authenticate($CI->session->has_userdata('auth'));

        }*/
    }

    private function authenticate($authenticated)
    {
        if(!$authenticated)
        {
            redirect('/users/login', 'refresh');
        }
    }
}
