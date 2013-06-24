<?php

    class Brand_model extends CI_Model {

        public function get_brand($brand_id = '') {
            if ($brand_id == '') {
                $this -> db -> order_by('brand_id', 'desc');
                $query = $this -> db -> get('tbl_brand');
            }
            else {
                $this -> db -> order_by('brand_id', 'desc');
                $query = $this -> db -> get_where('tbl_brand', array('brand_id' => $brand_id));
            }

            if ($query -> num_rows() != null) {
                return $query -> result_array();
            }
            else {
                return false;
            }
        }

        public function add_brand($brand_id = '', $insert_data) {
            if ($brand_id == '') {
                $query = $this -> db -> insert('tbl_brand', $insert_data);
            }
            else {
                $this -> db -> where('brand_id', $brand_id);
                $query = $this -> db -> update('tbl_brand', $insert_data);
            }

            if ( $query ) {
                return true;
            }
            else {
                return false;
            }
        }

        public function delete_brand($brand_id = '', $cat_id = '') {
            if ($brand_id != '') {
                $this -> db -> where('brand_id', $brand_id);
                $query = $this -> db -> delete('tbl_brand');
            }
            else {
                $this -> db -> where('cat_id', $cat_id);
                $query = $this -> db -> delete('tbl_brand');
            }

            if ( $query ) {
                return true;
            }
            else {
                return false;
            }
        }

    }