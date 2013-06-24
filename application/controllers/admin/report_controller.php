<?php

    class Report_controller extends CI_Controller {

        public function __construct() {
            parent::__construct();
            if ( !$this -> session -> userdata('active_session') ) {
                redirect(base_url(), 'refresh');
            }
            $this -> load -> model('admin/customer_model');
            $this -> load -> model('admin/order_model');
        }

        public function index() {
            if ( !$this -> input -> post('submit') ) {
                $this -> load -> view('admin/template/header_view');
                $this -> load -> view('admin/template/nav_bar_view');
                $this -> load -> view('admin/report_view');
                $this -> load -> view('admin/template/footer_view');
            }
        }
    }