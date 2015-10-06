<?php

class UserManager extends CI_Controller {
    
    public function index() {
        
        $data = array(
            'users' => $this->User_model->getAllUsers()
        );
        
        $this->load->view("UserManager/users_front", $data);
    }
    
}