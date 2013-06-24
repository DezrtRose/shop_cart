<?php

    class Customer_model extends CI_Model {

        public function get_customer() {
            $this -> db -> order_by('customer_id', 'desc');
            $query = $this -> db -> get('tbl_customer');

            if ( $query -> num_rows() != 0 ) {
                return $query -> result_array();
            }
            else {
                return false;
            }
        }

        public function delete_customer($customer_id) {
            $this -> db -> where('customer_id', $customer_id);

            if ( $this -> db -> delete('tbl_customer') ) {
                return true;
            }
            else {
                return false;
            }
        }
    }
