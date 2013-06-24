<?php

    class Logout_controller extends CI_Controller {

        public function __construct() {
            parent::__construct();
        }

        public function index() {
            $this -> session -> unset_userdata('active_session');
            $this -> session -> sess_destroy();

            redirect(base_url(), 'refresh');
        }
    }