<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Controller is used to import old database to new one.
 */

/*
 * Old table names to import data are:
 * old_alue
 * old_alue_events
 * old_person
 */


class OldBaseTransclusionManager extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model("Oldbase_transclusion_model");
        
    }
    
    
    public function index() {
        echo "<h3>Old database transclusion tools</h3>";
        echo "<h3>WARNING!! Do this only once to initalize from old data. Otherwise will add duplicate entries. (not so smart funcion)</h3>";
        echo "<ul type=\"square\">";
        echo anchor("OldBaseTransclusionManager/transcluseOldAlueet", "Transcluse ALUEET table") . "</br>";    
        echo anchor("OldBaseTransclusionManager/transcluseOldPerson", "Transcluse PERSON table") . "</br/>";    
        // echo anchor("OldBaseTransclusionManager/transcluseOldAlueet", "Transcluse EVENTS table");    
        //echo anchor("OldBaseTransclusionManager/transcluseOldAlueet", "Transcluse SOMETHING table");    
        echo "</ul>";
    }
    
    public function transcluseOldAlueet() {
        
        $alueet = $this->Oldbase_transclusion_model->getOldAlueet();
        $error_counter = 0;
        $succes_counter = 0;
        
        foreach( $alueet as $alue ) {
            echo "<p>processing: " . $alue->alue_code . " -- ";
            
            // Creating new area instance
            $new_data = array(
                'area_code' => $alue->alue_code,
                'area_location' => $alue->alue_detail,
                'area_tostats' => 1, // pistetään defaulttina true, katson käsin nämä sit editillä myöhemmin pois. Liikealueet sekä P1
                'area_group' => $alue->alue_location
            );
            
            
            // Importing the new area instance data to database
            if ( $this->Oldbase_transclusion_model->insertNewAlue( $new_data ) ) {
                echo ".. DONE!</p>";
                $succes_counter += 1;
            } else {
                echo ".. ERROR!</p>";
                $error_counter += 1;
            }
            
        }
        
        echo "<h3>Processed: $succes_counter</h3>";
        echo "<h3>Errors: $error_counter</h3>";
        
    } // endof transcluseOldAlueet method
    
    
    public function transcluseOldPerson() {
        
        $users = $this->Oldbase_transclusion_model->getOldPersons();
        
        $counter = 0;
        
        foreach( $users as $user ) {
            $this->handleOldUser( $user );
            $counter++;
        }
        
        echo "<p>$counter users were processed.</p>";
        
    }
    
    private function handleOldUser( $old_user ) {
        $data = array(
            'user_id' => $old_user->person_id,
            'user_firstname' => $old_user->person_name,
            'user_lastname' => $old_user->person_lastname,
            'user_disabled' => 0
        );
        
        if ( $this->Oldbase_transclusion_model->insertNewPerson($data) ) {
            echo $old_user->person_name . " " . $old_user->person_lastname . " lisätty </br>";
        } else {
            echo "ERROR: " . $old_user->user_name;
        }
        
    }
    
} //EOF
