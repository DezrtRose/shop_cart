<?php

    class Customer_controller extends CI_Controller {

        public function __construct() {
            parent::__construct();
            if ( !$this -> session -> userdata('active_session') ) {
                redirect(base_url(), 'refresh');
            }
            $this -> load -> model('admin/customer_model');
        }

        public function index() {
            $data['customer_info'] = $this -> customer_model -> get_customer();

            $this -> load -> view('admin/template/header_view', $data);
            $this -> load -> view('admin/template/nav_bar_view');
            $this -> load -> view('admin/customer_view');
            $this -> load -> view('admin/template/footer_view');
        }

        public function delete_customer() {
            $customer_id = $this -> uri -> segment(4);

            if ( $this -> customer_model -> delete_customer($customer_id) ) {
                $this -> session -> set_flashdata('info', 'Customer deleted successfully.');
                redirect('admin/customer', 'refresh');
            }
            else {
                $this -> session -> set_flashdata('error', 'Customer delete failed.');
                redirect('admin/customer', 'refresh');
            }
        }
    }