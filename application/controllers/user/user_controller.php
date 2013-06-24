<?php

    class User_controller extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this -> load -> model('admin/product_model');
        }

        public function index() {
            $data['product_info'] = $this -> product_model -> get_product_bycat();

            $this -> load -> view('user/template/header_view', $data);
            $this -> load -> view('user/product_view');
            $this -> load -> view('user/template/footer_view');
        }

        public function product_page() {
            $cat_id = $this -> uri -> segment(2);

            $data['product_info'] = $this -> product_model -> get_product(null, $cat_id);

            $this -> load -> view('user/template/header_view', $data);
            $this -> load -> view('user/product_list_view');
            $this -> load -> view('user/template/footer_view');
        }

        public function product_view_page() {
            $product_id = $this -> uri -> segment(3);

            $data['product_info'] = $this -> product_model -> get_product($product_id, null);
            $data['product_image'] = $this -> product_model -> get_images($product_id);

            $this -> load -> view('user/template/header_view', $data);
            $this -> load -> view('user/product_main_view');
            $this -> load -> view('user/template/footer_view');
        }
    }