<?php

class User_model extends CI_Model {
    
    
    public function getAllUsers() {
        return $this->db->order_by("user_lastname, user_firstname")
                ->get("user")->result();
    }
    
    
    /**
    *   function returns User object with certain id
    */
    public function getUser( $user_id = null ) {
        return $this->db->where("user_id", $user_id)->get("users")->row();
    }
}