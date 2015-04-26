<?php

/* 
 * This model handles the database queries related to old database transclusion 
 * integration procedures.
 * 
 * In future solutions this can be ignored and deleted after the new system
 * is up and running.
 */

class Oldbase_transclusion_model extends CI_Model {
    
    /*
     * Returns items from old_alue table ordered by alue_code ascending.
     * Array of Objects.
     */
    public function getOldAlueet() {
        return  $this->db
                ->order_by("alue_code", "asc")
                ->get("old_alue")
                ->result();
    }
    
    
}