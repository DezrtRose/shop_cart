<?php

    class Category_model extends CI_Controller {

        public function get_category($cat_id = '') {
            if ($cat_id == '') {
                $this -> db -> order_by('cat_id', 'desc');
                $query = $this -> db -> get('tbl_category');
            }
            else {
                $this -> db -> order_by('cat_id', 'desc');
                $query = $this -> db -> get_where('tbl_category', array('cat_id' => $cat_id));
            }

            if ($query -> num_rows() != null) {
                return $query -> result_array();
            }
            else {
                return false;
            }
        }

        public function add_category($cat_id = '', $insert_data) {
            if ($cat_id == '') {
                if ( $this -> db -> insert('tbl_category', $insert_data) ) {
                    return true;
                }
                else {
                    return false;
                }
            }
            else {
                $this -> db -> where('cat_id', $cat_id);
                $query = $this -> db -> update('tbl_category', $insert_data);
                if ( $query ) {
                    return true;
                }
                else {
                    return false;
                }
            }
        }

        public function delete_category($cat_id) {
            $this -> db -> where('cat_id', $cat_id);

            if ( $this -> db -> delete('tbl_category') ) {
                return true;
            }
            else {
                return false;
            }
        }

    }