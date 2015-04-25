<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class EventTypeManager extends CI_Controller {
    
    public function index() {
        $data = array(
            'content' => "EventTypeManager/front",
            'foo' => "asdf"
        );
        
        $this->load->view("template", $data);
        
    }
    
}
