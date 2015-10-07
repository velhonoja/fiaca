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
        
        $this->load->view("header");
        $this->load->view("navbar");
        
        
        echo "<h3>Old database transclusion tools</h3>";
        echo "<div class=\"alert alert-danger\" role=\"alert\"><h3>WARNING!! Do this only once to initalize from old data. Otherwise will add duplicate entries. (not so smart funcion)</h3></div>";
        echo "<ul type=\"square\">";
        echo anchor("OldBaseTransclusionManager/transcluseOldAlueet", "Transcluse ALUEET table") . "</br>";
        echo anchor("OldBaseTransclusionManager/transcluseOldPerson", "Transcluse PERSON table") . "</br/>";
        echo anchor("OldBaseTransclusionManager/transcluseOldEvents", "Transcluse EVENTS table");    
        //echo anchor("OldBaseTransclusionManager/transcluseOldAlueet", "Transcluse SOMETHING table");    
        echo "</ul>";
        $this->load->view("footer");
        
        
    }

    public function transcluseOldAlueet() {

        $alueet = $this->Oldbase_transclusion_model->getOldAlueet();
        $error_counter = 0;
        $succes_counter = 0;

        foreach ($alueet as $alue) {
            echo "<p>processing: " . $alue->alue_code . " -- ";

            // Creating new area instance
            $new_data = array(
                'area_code' => $alue->alue_code,
                'area_location' => $alue->alue_detail,
                'area_tostats' => 1, // pistetään defaulttina true, katson käsin nämä sit editillä myöhemmin pois. Liikealueet sekä P1
                'area_group' => $alue->alue_location
            );


            // Importing the new area instance data to database
            if ($this->Oldbase_transclusion_model->insertNewAlue($new_data)) {
                echo ".. DONE!</p>";
                $succes_counter += 1;
            } else {
                echo ".. ERROR!</p>";
                $error_counter += 1;
            }
        }

        echo "<h3>Processed: $succes_counter</h3>";
        echo "<h3>Errors: $error_counter</h3>";
    }

// endof transcluseOldAlueet method

    public function transcluseOldPerson() {

        $users = $this->Oldbase_transclusion_model->getOldPersons();

        $counter = 0;

        foreach ($users as $user) {
            $this->handleOldUser($user);
            $counter++;
        }

        echo "<p>$counter users were processed.</p>";
    }

    private function handleOldUser($old_user) {
        $data = array(
            'user_id' => $old_user->person_id,
            'user_firstname' => $old_user->person_name,
            'user_lastname' => $old_user->person_lastname,
            'user_disabled' => 0
        );

        if ($this->Oldbase_transclusion_model->insertNewPerson($data)) {
            echo $old_user->person_name . " " . $old_user->person_lastname . " lisätty </br>";
        } else {
            echo "ERROR: " . $old_user->user_name;
        }
    }

    public function transcluseOldEvents() {
        /*
         * Otetaan alueittain result setit ja käydään siinä läpi yksitellen
         * Jos event_type = 1 on kyseessä start date, muuten edellisen instanssin end date
         * Jos type 1, niin luodaan uusi entiteetti. 2 tyypissä lisätään olemassaolevaan, jonka 
         * jälkeen lisätään tietokantaan ja nollataan muuttuja.
         */

        // Haetaan ensin alueet. Muista mennä area_code kentällä, ID:t eivät täsmää.
        $areas = $this->Oldbase_transclusion_model->getOldAlueet();

        foreach ($areas as $area) {
            $old_events = $this->Oldbase_transclusion_model->getOldEventsForArea($area->alue_id);
            $this->handleOldEventsForArea($old_events, $area->alue_code);
        }
    }

    private function handleOldEventsForArea($old_events, $area_code) {

        // Tehdään silmukka jossa käydään läpi eventit. 1 ollessa kyseessä tehdään uusi data instanssi
        // 2 kyseessä lisätään edelliseen instanssiin end_date. Loopin lopussa vielä tarkistus jäikö viimenen
        // ilman end datea (eli on edelleen lainassa) jolloin laitetaan null ja lisätään viimeinen instanssi 
        // tietokantaan.

        $this->load->model("Area_model");
        
        $new_area_id = $this->Area_model->findAreaID($area_code);

        if ($new_area_id) {

            $current_event_data = array(
                'event_area' => $new_area_id,
                'event_user' => null,
                'event_typeref' => 1,
                'event_start_date' => null,
                'event_end_date' => null
            );

            
            foreach ($old_events as $old_event) {
                if ($old_event->event_type == 1) {
                    // Tässä aloitetaan uusi lainauksen alku
                    
                    // Käytännössä ei tarvitse tehdä tässä kohtaa muuta kuin lisätä alku päivämäärä lainalle.
                    $current_event_data["event_start_date"] = $old_event->event_date;
                    $current_event_data["event_user"] = $old_event->event_user;
                    
                } else if ($old_event->event_type == 2) {
                    // Tässä tapahtuu palautus eli lopetetaan lainaus
                    
                    // Lisätään lopetuspäivämäärä lainalle, jonka jälkeen lisätään uusi event tietokantaan
                    // ja nullataan current.
                    
                    $current_event_data["event_end_date"] = $old_event->event_date;
                    
                    if ( $current_event_data["event_start_date"] && $current_event_data["event_user"] ) {
                        
                        $this->Oldbase_transclusion_model->insertNewEvent($current_event_data);
                        
                        $current_event_data["event_user"] = null;
                        $current_event_data["event_start_date"] = null;
                        $current_event_data["event_end_date"] = null;
                        
                        //echo "<p>Success: creted new borrowing event for alue: $area_code;</p>";
                        
                    } else {
                        echo "<h4>Problem with <b><u>$area_code</u></b>. Seems like that there is event where borrowing stops before start." . $old_event->event_id . "</h4>";
                        
                    }
                    
                    
                }
            }
            
            if ( $current_event_data["event_start_date"] != null && $current_event_data["event_user"] != null ) {
                // Tässä vaiheessa on laina alkanut mutta ei vielä päättynyt. tehdään päättymispäivästä null ja lisätään kantaan
                $current_event_data["event_end_date"] = null;
                $this->Oldbase_transclusion_model->insertNewEvent($current_event_data);
                //echo "<p>Success: creted new borrowing starting event for alue: $area_code;</p>";
            }
            
            
            
        } else {
            echo "Area $area_code not found in database.";
        }
    }

}

//EOF
