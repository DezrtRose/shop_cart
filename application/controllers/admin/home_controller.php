<?php

    class Home_controller extends CI_Controller {

        public function __construct() {
            parent::__construct();
            if ( !session_check() ) {
                redirect(base_url(), 'refresh');
            }
        }

        public function index() {
            $this -> load -> view('admin/template/header_view');
            $this -> load -> view('admin/template/nav_bar_view');
            $this -> load -> view('admin/home_view');
            $this -> load -> view('admin/template/footer_view');
        }
    }