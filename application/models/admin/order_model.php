<?php

    class Order_model extends CI_Model {

        public function get_order($order_id = '') {
            if ( $order_id == '' ) {
                $query = $this -> db -> get('tbl_order');
            }
            else {
                $query = $this -> db -> get_where('tbl_order', array('order_id' => $order_id));
            }

            if ($query -> num_rows() != 0) {
                return $query -> result_array();
            }
            else {
                return false;
            }
        }
    }