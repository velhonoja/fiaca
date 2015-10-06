<?php

class User_model extends CI_Model {
    
    
    public function getAllUsers() {
        return $this->db->order_by("user_lastname, user_firstname")
                ->get("user")->result();
    }
    
    
}