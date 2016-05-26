<?php

class SessionMock
{
    /**
     * Userdata (fetch)
     *
     * Legacy CI_Session compatibility method
     *
     * @param	string	$key	Session data key
     * @return	mixed	Session data value or NULL if not found
     */
    public function userdata($key = NULL)
    {
        if (isset($key))
        {
            return isset($_SESSION[$key]) ? $_SESSION[$key] : NULL;
        }
        elseif (empty($_SESSION))
        {
            return array();
        }

        $userdata = array();
        $_exclude = array_merge(
            array('__ci_vars'),
            $this->get_flash_keys(),
            $this->get_temp_keys()
        );

        foreach (array_keys($_SESSION) as $key)
        {
            if ( ! in_array($key, $_exclude, TRUE))
            {
                $userdata[$key] = $_SESSION[$key];
            }
        }

        return $userdata;
    }
}