<?php

    class Login_model extends CI_Model {

        public function verify_login($login_data) {
            $this -> db -> where('admin_username',$login_data['username']);
            $this -> db -> or_where('admin_email',$login_data['username']);
            $this -> db -> where('admin_password',md5($login_data['password']));
            $query = $this -> db -> get('tbl_login');

            if ($query -> num_rows() == 1) {
                return true;
            }
            else {
                return false;
            }
        }
    }