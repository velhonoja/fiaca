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
    
    public function index() {
        echo "<h3>Old database transclusion tools</h3>";
        
    }
    
    public function transcluseOldAlueet() {
        
        $this->load->model("Oldbase_transclusion_model");
        
        $alueet = $this->Oldbase_transclusion_model->getOldAlueet();
        $counter = 0;
        
        foreach( $alueet as $alue ) {
            echo "<p>processing: " . $alue->alue_code . " -- ";
            
            $new_data = array(
                'area_code' => $alue->alue_code,
                'area_location' => $alue->alue_detail,
                'area_tostats' => 1, // pistetään defaulttina true, katson käsin nämä sit editillä myöhemmin pois. Liikealueet sekä P1
                'area_group' => $alue->alue_location
            );
            
            $counter += 1;
        }
        
        echo "<h3>Processed: $counter</h3>";
        
    }
    
}
