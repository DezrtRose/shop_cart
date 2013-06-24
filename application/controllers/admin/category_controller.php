<?php

    class Category_controller extends CI_Controller {

        public function __construct() {
            parent::__construct();
            if( !session_check() ) {
                redirect(base_url(), 'refresh');
            }
            $this -> load -> model('admin/brand_model');
            $this -> load -> model('admin/product_model');
            $this -> load -> model('admin/category_model');
        }

        public function index() {
            $data['cat_info'] = $this -> category_model -> get_category();

            $this -> load -> view('admin/template/header_view', $data);
            $this -> load -> view('admin/template/nav_bar_view');
            $this -> load -> view('admin/category_view');
            $this -> load -> view('admin/template/footer_view');
        }

        public function add_category() {
            if ( !$this -> input -> post('submit') ) {
                $this -> load -> view('admin/template/header_view');
                $this -> load -> view('admin/template/nav_bar_view');
                $this -> load -> view('admin/add_category_view');
                $this -> load -> view('admin/template/footer_view');
            }
            else {
                $insert_data = array(
                    'cat_name' => $this -> input -> post('cat_name')
                );
                if ( $this -> category_model -> add_category(null, $insert_data) ) {
                    $this -> session -> set_flashdata('info', 'Category saved successfully.');
                    redirect('admin/category', 'refresh');
                }
                else {
                    $this -> session -> set_flashdata('error', 'Category save failed.');
                    redirect('admin/category', 'refresh');
                }
            }
        }

        public function edit_category() {
            $cat_id = $this -> uri -> segment(4);
            if ( !$this -> input -> post('submit') ) {
                $data['cat_info'] = $this -> category_model -> get_category($cat_id);

                $this -> load -> view('admin/template/header_view', $data);
                $this -> load -> view('admin/template/nav_bar_view');
                $this -> load -> view('admin/edit_category_view');
                $this -> load -> view('admin/template/footer_view');
            }
            else {
                $insert_data = array(
                    'cat_name' => $this -> input -> post('cat_name')
                );

                if ( $this -> category_model -> add_category($cat_id, $insert_data) ) {
                    $this -> session -> set_flashdata('info', 'Category updated successfully.');
                    redirect('admin/category', 'refresh');
                }
                else {
                    $this -> session -> set_flashdata('error', 'Category update failed.');
                    redirect('admin/category', 'refresh');
                }
            }
        }

        public function delete_category() {
            $cat_id = $this -> uri -> segment(4);

            if ( $this -> category_model -> delete_category($cat_id) ) {
                if ( $this -> brand_model -> delete_brand('', $cat_id) ) {
//                    if ( $this -> product_model -> delete_product('', $cat_id) ) {
                        $this -> session -> set_flashdata('info', 'Category deleted successfully.');
                        redirect('admin/category', 'refresh');
//                    }
                }
            }
            else {
                $this -> session -> set_flashdata('error', 'Category delete failed.');
                redirect('admin/category', 'refresh');
            }
        }

    }