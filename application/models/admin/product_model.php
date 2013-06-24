<?php

    class Product_model extends CI_Model {

        public function get_product($product_id = '', $cat_id = '') {
            if ($product_id == '' && $cat_id == '') {
                $this -> db -> order_by('product_id', 'desc');
                $query = $this -> db -> get('tbl_product');
            }
            elseif ($product_id == '' && $cat_id != '') {
                $this -> db -> where('category_id', $cat_id);
                $query = $this -> db -> get('tbl_product');
            }
            else {
                $this -> db -> order_by('product_id', 'desc');
                $query = $this -> db -> get_where('tbl_product', array('product_id' => $product_id));
            }

            if ( $query -> num_rows() != 0) {
                return $query -> result_array();
            }
            else {
                return false;
            }
        }

        public function get_product_bycat() {
            $this -> db -> group_by('category_id');
            $query = $this -> db -> get('tbl_product');

            if ( $query -> num_rows() != 0 ) {
                return $query -> result_array();
            }
            else {
                return false;
            }
        }

        public function add_product($product_id = '', $insert_data) {
            if ( $product_id == '' ) {
                $query = $this -> db -> insert('tbl_product', $insert_data);
            }
            else {
                $this -> db -> where('product_id', $product_id);

                $query = $this -> db -> update('tbl_product', $insert_data);
            }

            if ( $query ) {
                return $this -> db -> insert_id();
            }
            else {
                return false;
            }
        }

        public function add_image($product_id, $data) {
            foreach ($data as $d) {
                $insert_data = array(
                    'product_id' => $product_id,
                    'product_image' => $d['file_name']
                );

                $this -> db -> insert('tbl_product_image', $insert_data);
            }

            return true;
        }

        public function get_images($product_id = '') {
            if ($product_id == '') {
                $query = $this -> db -> get('tbl_product_image');
            }
            else {
                $query = $this -> db -> get_where('tbl_product_image', array('product_id' => $product_id));
            }

            if ( $query ) {
                return $query -> result_array();
            }
            else {
                return false;
            }
        }

        public function edit_image($insert_data, $image_id) {
            for ($i = 0; $i < count($image_id); $i++) {
                $this -> db -> where('image_id', $image_id[$i]['image_id']);
                $this -> db -> update('tbl_product_image', $insert_data[$i]);
            }

            return true;
        }

        public function delete_product($product_id) {
            $this -> db -> where('product_id', $product_id);

            if ( $this -> db -> delete('tbl_product') ) {
                return true;
            }
            else {
                return false;
            }
        }

        public function delete_image($image_id = '', $product_id = '') {
            if ( $product_id == '' ) {
                $this -> db -> where('image_id', $image_id);
                $query = $this -> db -> delete('tbl_product_image');
            }
            else {
                $this -> db -> where('product_id', $product_id);
                $query = $this -> db -> delete('tbl_product_image');
            }

            if ( $query ) {
                return true;
            }
            else {
                return false;
            }
        }
    }