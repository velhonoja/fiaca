<?php

class UserManager extends CI_Controller {
    
    public function index() {
        
        $data = array(
            'users' => $this->User_model->getAllUsers(),
            'content' => "UserManager/users_front"
        );
        
        $this->load->view("template", $data);
    }
    
    public function edit( $user_id = null ) {
        
    }
    
    
}