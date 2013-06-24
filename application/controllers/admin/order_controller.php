<?php

    class Order_controller extends CI_Controller {

        public function __construct() {
            parent::__construct();
            if ( !$this -> session -> userdata('active_session') ) {
                redirect(base_url(), 'refresh');
            }
            $this -> load -> model('admin/order_model');
        }

        public function index() {
            $data['order_info'] = $this -> order_model -> get_order();

            $this -> load -> view('admin/template/header_view', $data);
            $this -> load -> view('admin/template/nav_bar_view');
            $this -> load -> view('admin/order_view');
            $this -> load -> view('admin/template/footer_view');
        }

    }