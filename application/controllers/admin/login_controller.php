<?php

    class Login_controller extends CI_Controller {


//        testing;;;;

        public function __construct() {
            parent::__construct();
            if ( session_check() ) {
                redirect('admin/home', 'refresh');
            }
            $this -> load -> model('admin/login_model');
        }

        public function index() {
            if (!$this -> input -> post('submit')) {
                $this -> load -> view('admin/template/login_view');
            }
            else {
                $this -> load -> helper('string');

                $login_data = $this -> input -> post();

                if ($this -> login_model -> verify_login($login_data)) {
                    $session_data = array(
                        'session_id' => random_string('numeric', 5),
                        'session_user' => $login_data['username']
                    );
                    $this -> session ->set_userdata('active_session', $session_data);

                    redirect('admin/home','refresh');
                }
                else {
                    $this -> session -> set_flashdata('error', 'Invalid login info.');

                    redirect('', 'refresh');
                }
            }
        }
    }