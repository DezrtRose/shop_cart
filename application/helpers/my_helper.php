<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function session_check() {
        $ci = & get_instance();

        if( $ci -> session -> userdata('active_session') ) {
            return true;
        }
        else {
            return false;
        }
    }