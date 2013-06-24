<?php

    class Brand_controller extends CI_Controller {

        public function __construct() {
            parent::__construct();
            if ( !session_check() ) {
                redirect('admin/login', 'refresh');
            }
            $this -> load -> model('admin/brand_model');
            $this -> load -> model('admin/category_model');
        }

        public function index() {
            $data = array(
                'brand_info' => $this -> brand_model -> get_brand(),
            );

            $this -> load -> view('admin/template/header_view', $data);
            $this -> load -> view('admin/template/nav_bar_view');
            $this -> load -> view('admin/brand_view');
            $this -> load -> view('admin/template/footer_view');
        }

        public function add_brand() {
            if ( !$this ->  input -> post('submit') ) {
                $data['cat_info'] = $this -> category_model -> get_category();

                $this -> load -> view('admin/template/header_view', $data);
                $this -> load -> view('admin/template/nav_bar_view');
                $this -> load -> view('admin/add_brand_view');
                $this -> load -> view('admin/template/footer_view');
            }
            else {
                $insert_data = array(
                    'cat_id' => $this -> input -> post('cat_id'),
                    'brand_name' => $this -> input -> post('brand_name')
                );

                if ( $this -> brand_model -> add_brand(null, $insert_data) ) {
                    $this -> session -> set_flashdata('info', 'Brand added successfully.');
                    redirect('admin/brand', 'refresh');
                }
                else {
                    $this -> session -> set_flashdata('error', 'Brand add failed.');
                    redirect('admin/brand', 'refresh');
                }
            }
        }

        public function edit_brand() {
            $brand_id = $this -> uri -> segment(4);

            if ( !$this ->  input -> post('submit') ) {
                $data = array(
                    'cat_info' => $this -> category_model -> get_category(),
                    'brand_info' => $this -> brand_model -> get_brand($brand_id)
                );

                $this -> load -> view('admin/template/header_view', $data);
                $this -> load -> view('admin/template/nav_bar_view');
                $this -> load -> view('admin/edit_brand_view');
                $this -> load -> view('admin/template/footer_view');
            }
            else {
                $insert_data = array(
                    'cat_id' => $this -> input -> post('cat_id'),
                    'brand_name' => $this -> input -> post('brand_name')
                );

                if ( $this -> brand_model -> add_brand($brand_id, $insert_data) ) {
                    $this -> session -> set_flashdata('info', 'Brand edited successfully.');
                    redirect('admin/brand', 'refresh');
                }
                else {
                    $this -> session -> set_flashdata('error', 'Brand edit failed.');
                    redirect('admin/brand', 'refresh');
                }
            }
        }

        public function delete_brand() {
            $brand_id = $this -> uri -> segment(4);

            if ( $this -> brand_model -> delete_brand($brand_id) ) {
                $this -> session -> set_flashdata('info', 'Brand deleted successfully.');
                redirect('admin/brand', 'refresh');
            }
            else {
                $this -> session -> set_flashdata('info', 'Brand delete failed.');
                redirect('admin/brand', 'refresh');
            }
        }
    }