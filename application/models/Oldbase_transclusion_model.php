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
    
    
    public function insertNewAlue( $data ) {
        return $this->db->insert("area", $data);
    }
    
    
    /*
     * Returns persons from old database table.
     */
    public function getOldPersons() {
        return $this->db
                ->order_by("person_id", "asc")
                ->get("old_person")->result();
    } 
    
    public function insertNewPerson( $data ) {
        return $this->db->insert("user", $data);
    }
    
    public function getOldEventsForArea( $old_area_id ) {
        return $this->db->where("event_alue", $old_area_id)
                ->order_by("event_id", "asc")
                ->get("old_alue_events")->result();
    }
    
    public function insertNewEvent( $data ) {
        $this->db->insert("event", $data);
    }
    
}