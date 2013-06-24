<?php

    class Cart_controller extends CI_Controller {

        public function __construct() {
            parent::__construct();
        }

        public function index() {
            $post = $this -> input -> post();
            $data = array(
                'id' => $post['product_id'],
                'qty' => $post['product_qty'],
                'price' => $post['product_price'],
                'name' => $post['product_name']
            );

            $this -> cart -> insert($data);

            redirect($post['current_url'], 'refresh');
        }

        public function show_cart() {
            $this -> load -> view('user/template/header_view');
            $this -> load -> view('user/cart_view');
            $this -> load -> view('user/template/footer_view');
        }

        public function update_cart() {
            $post = $this -> input -> post();

            for ($i = 1; $i < $post['item_count']; $i++) {
                $data = array(
                    'rowid' => $post[$i]['rowid'],
                    'qty' => $post[$i]['qty'],
                );

                $this -> cart -> update($data);
            }

            redirect($post['current_url'], 'refresh');
        }

        public function remove_from_cart() {
            $data = array(
                'rowid' => $this -> uri -> segment(3),
                'qty' => 0
            );

            $this -> cart -> update($data);

            redirect(base_url().'shopping_cart', 'refresh');
        }

        public function steps() {
            $this -> load -> view('user/paypal_form_view');
        }
    }