<?php

    class Product_controller extends CI_Controller {

        public function __construct() {
            parent::__construct();
            if ( !session_check() ) {
                redirect(base_url(), 'refresh');
            }
            $this->load->library('image_lib');
            $this -> load -> library('upload');
            $this -> load -> model('admin/brand_model');
            $this -> load -> model('admin/product_model');
            $this -> load -> model('admin/category_model');
        }

        public function index() {
            $data = array(
                'product_info' => $this -> product_model -> get_product()
            );

            $this -> load -> view('admin/template/header_view', $data);
            $this -> load -> view('admin/template/nav_bar_view');
            $this -> load -> view('admin/product_view');
            $this -> load -> view('admin/template/footer_view');
        }

        public function add_product() {
            if ( !$this -> input -> post('submit') ) {
                $data = array(
                    'brand_info' => $this -> brand_model -> get_brand(),
                    'category_info' => $this -> category_model -> get_category(),
                );

                $this -> load -> view('admin/template/header_view', $data);
                $this -> load -> view('admin/template/nav_bar_view');
                $this -> load -> view('admin/add_product_view');
                $this -> load -> view('admin/template/footer_view');
            }
            else {
                $brand_explode = explode(',', $this -> input -> post('brand_select'));
                $category_explode = explode(',', $this -> input -> post('category_select'));

                $insert_data = array(
                    'brand_id' => $brand_explode[0],
                    'category_id' => $category_explode[0],
                    'brand_name' => $brand_explode[1],
                    'category_name' => $category_explode[1],
                    'product_name' => $this -> input -> post('product_name'),
                    'product_desc' => $this -> input -> post('product_desc'),
                    'product_price' => $this -> input -> post('product_price'),
                    'slug' => (url_title($this -> input -> post('product_name'), 'dash', true))
                );

                $file = $_FILES['file'];
                if (!empty($file['name'][0])) {
                    $product_id = $this -> product_model -> add_product(null, $insert_data);

                    for ($i = 0; $i < count($file['name']); $i++) {
                        $_FILES['userfile']['name'] = $file['name'][$i];
                        $_FILES['userfile']['type'] = $file['type'][$i];
                        $_FILES['userfile']['tmp_name'] = $file['tmp_name'][$i];
                        $_FILES['userfile']['error'] = $file['error'][$i];
                        $_FILES['userfile']['size'] = $file['size'][$i];

                        $config['upload_path'] = 'images/products/';
                        $config['allowed_types'] = 'gif|jpg|png';
                        $config['max_size'] = '3000';
                        $config['encrypt_name'] = true;

                        $this -> upload -> initialize($config);

                        if (!$this -> upload -> do_upload()) {
                            $this -> session -> set_flashdata('error', $this -> upload -> display_errors());
                            redirect('admin/product', 'refresh');
                        }
                        else {
                            $upload_data[$i] = $this -> upload -> data();

                            //resizing start
                            $config = array(
                                'source_image' => 'images/products/'.$upload_data[$i]['file_name'],
                                'new_image' => 'images/products/thumb/'.$upload_data[$i]['file_name'],
                                'maintain_ratio' => true,
                                'width' => 160,
                                'height' => 120
                            );
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                        }
                    }
                    if ( $this -> product_model -> add_image($product_id, $upload_data) ) {
                        redirect('admin/product/edit_image/'.$product_id, 'refresh');
                    }
                    else {
                        $this -> session -> set_flashdata('notify', 'A problem occured.');
                        redirect('admin/product', 'refresh');
                    }
                }
                else {
                    $this -> session -> set_flashdata('error', 'Please select product images.');
                    redirect('admin/product/add', 'refresh');
                }
            }
        }

        public function edit_image() {
            $product_id = $this -> uri -> segment(4);
            $mode = $this -> uri -> segment(3);

            if ( !$this -> input -> post('submit') ) {
                $data = array(
                    'product_info' => $this -> product_model -> get_product($product_id),
                    'image_info' => $this -> product_model -> get_images($product_id)
                );

                $this -> load -> view('admin/template/header_view', $data);
                $this -> load -> view('admin/template/nav_bar_view');
                $this -> load -> view('admin/edit_image_view');
                $this -> load -> view('admin/template/footer_view');
            }
            else {
                $post = $this -> input -> post();

                for ($i = 0; $i < $post['data_counter']; $i++) {
                    $org_name[$i] = array('org_image_name' => $post['org_product_image_'.$i]);
                    $insert_data[$i] = array(
                        'product_image' => $post['product_image_'.$i],
                    );
                    $image_id[$i] = array(
                        'image_id' => $post['image_id_'.$i],
                    );
                    rename('./images/products/'.$org_name[$i]['org_image_name'], './images/products/'.$insert_data[$i]['product_image']);
                    rename('./images/products/thumb/'.$org_name[$i]['org_image_name'], './images/products/thumb/'.$insert_data[$i]['product_image']);
                }
                if ($this -> product_model -> edit_image($insert_data, $image_id)) {
                    if ( $mode != 'edit' ) {
                        $this -> session -> set_flashdata('info', 'Product added successfully.');
                        redirect('admin/product', 'refresh');
                    }
                    else {
                        $this -> session -> set_flashdata('info', 'Product updated successfully.');
                        redirect('admin/product', 'refresh');
                    }
                }
                else {
                    $this -> session -> set_flashdata('error', 'A problem occured.');
                    redirect(base_url()."admin/product/edit_image/".$product_id);
                }
            }
        }

        public function edit_product() {
            $product_id = $this -> uri -> segment(4);

            if ( !$this -> input -> post('submit') ) {
                $data = array(
                    'image_info' => $this -> product_model -> get_images($product_id),
                    'brand_info' => $this -> brand_model -> get_brand(),
                    'category_info' => $this -> category_model -> get_category(),
                    'product_info' => $this -> product_model -> get_product($product_id)
                );

                $this -> load -> view('admin/template/header_view', $data);
                $this -> load -> view('admin/template/nav_bar_view');
                $this -> load -> view('admin/edit_product_view');
                $this -> load -> view('admin/template/footer_view');
            }
            else {
                $brand_explode = explode(',', $this -> input -> post('brand_select'));
                $category_explode = explode(',', $this -> input -> post('category_select'));

                $insert_data = array(
                    'category_id' => $category_explode[0],
                    'brand_id' => $brand_explode[0],
                    'brand_name' => $brand_explode[1],
                    'category_name' => $category_explode[1],
                    'product_name' => $this -> input -> post('product_name'),
                    'product_desc' => $this -> input -> post('product_desc'),
                    'product_price' => $this -> input -> post('product_price'),
                    'slug' => (url_title($this -> input -> post('product_name'), 'dash', true))
                );

                $file = $_FILES['userfile'];
                if (!empty($file['name'][0])) {
                    $config['upload_path'] = 'images/products/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '1000';

                    $this -> upload -> initialize($config);

                    if (!$this -> upload -> do_multi_upload()) {
                        $this -> session -> set_flashdata('error', 'A problem occured.');
                        redirect('admin/product', 'refresh');
                    }
                    else {
                        for ($i = 0; $i < count($file['name']); $i++) {
                            $data[$i]['product_id'] = $product_id;
                            $data[$i]['product_image'] = $file['name'][$i];

                            //resizing start
                            $config = array(
                                'source_image' => 'images/products/'.$data[$i]['product_image'],//put inside loop
                                'new_image' => 'images/products/thumb/'.$data[$i]['product_image'],
                                'maintain_ratio' => true,
                                'width' => 160,
                                'height' => 120
                            );
                            $this->image_lib->initialize($config);
                            $this->image_lib->resize();
                            $this->image_lib->clear();
                            //resizing end
                        }
                        if ( $this -> product_model -> add_image($data) ) {
                            $res = $this -> product_model -> add_product($product_id, $insert_data);
                            redirect('admin/product/edit_image/'.$product_id, 'refresh');
                        }
                        else {
                            $this -> session -> set_flashdata('notify', 'A problem occured.');
                            redirect('admin/product', 'refresh');
                        }
                    }
                }
                else {
                    $res = $this -> product_model -> add_product($product_id, $insert_data);
                }

                if ( isset($res) ) {
                    $this -> session -> set_flashdata('info', 'Product updated successfully.');
                    redirect('admin/product', 'refresh');
                }
                else {
                    $this -> session -> set_flashdata('error', 'Product update failed.');
                    redirect('admin/product', 'refresh');
                }
            }
        }

        public function delete_product() {
            $product_id = $this -> uri -> segment(4);

            $images = $this -> product_model -> get_images($product_id);

            foreach ($images as $i) {
                unlink('images/products/'.$i['product_image']);
                unlink('images/products/thumb/'.$i['product_image']);
            }

            if ( $this -> product_model -> delete_product($product_id) ) {
                if ( $this -> product_model -> delete_image('', $product_id) ) {
                    $this -> session -> set_flashdata('info', 'Product deleted successfully.');
                    redirect('admin/product', 'refresh');
                }
            }
            else {
                $this -> session -> set_flashdata('error', 'Product delete failed.');
                redirect('admin/product', 'refresh');
            }
        }

        public function delete_image() {
            $product_id = $this -> uri -> segment(4);
            $image_id = $this -> uri -> segment(5);
            $image_name = $this -> uri -> segment(6);

            unlink('images/products/thumb/'.$image_name);
            unlink('images/products/'.$image_name);

            if ( $this -> product_model -> delete_image($image_id) ) {
                redirect('admin/product/edit/'.$product_id, 'refresh');
            }
            else {
                $this -> session -> set_flashdata('error', 'A problem occured.');
                redirect('', 'refresh');
            }
        }
    }