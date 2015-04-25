<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FiacaInstall extends CI_Controller {

    public function index() {
        echo "<h2>Fiaca installer</h2>";
        echo anchor("fiacaInstall/install", "Start database install");
    }

    /**
     * Method creates the database structure if not exits.
     */
    public function install() {

	echo "<h1>Fiaca - install</h1>";

        if (!$this->db->table_exists("user")) {
            echo "going to initalize user table<br/>";
            $this->initalizeUserTable();
            echo "ready...<br/><br/>";
        }

        if (!$this->db->table_exists("area")) {
            echo "going to initalize area table<br/>";
            $this->initalizeAreaTable();
            echo "ready...<br/><br/>";
        }
        
        if (!$this->db->table_exists("event")) {
            echo "going to initalize event table<br/>";
            $this->initalizeEventTable();
            echo "ready...<br/><br/>";
        }

        if (!$this->db->table_exists("event_type")) {
            echo "going to initalize event_type table<br/>";
            $this->initalizeEventTypeTable();
            echo "ready...<br/><br/>";
        }


        
    }

    /**
     * Initalizes user table to database
     */
    public function initalizeUserTable() {
        $query = $this->db->query("CREATE TABLE IF NOT EXISTS `user` (
        `user_id` int(11) NOT NULL AUTO_INCREMENT,
        `user_firstname` varchar(100) NOT NULL,
        `user_lastname` varchar(100) NOT NULL,
        `user_disabled` tinyint(1) NOT NULL DEFAULT '0',
        PRIMARY KEY (`user_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");
    }

    public function initalizeAreaTable() {
        $query = $this->db->query("CREATE TABLE IF NOT EXISTS `area` (
        `area_id` int(11) NOT NULL AUTO_INCREMENT,
        `area_code` varchar(100) NOT NULL,
        `area_location` varchar(255) NOT NULL,
        `area_tostats` tinyint(1) NOT NULL DEFAULT '1',
	`area_group` varchar(100) NOT NULL,
        PRIMARY KEY (`area_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");
    }


    public function initalizeEventTable() {
	$this->db->query( "CREATE TABLE IF NOT EXISTS `event` (
	  `event_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	  `event_area` int(10) unsigned NOT NULL,
	  `event_user` int(10) unsigned NOT NULL,
	  `event_typeref` int(10) unsigned NOT NULL,
	  `event_start_date` date NOT NULL,
	  `event_end_date` date DEFAULT NULL,
	  PRIMARY KEY (`event_id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" );
    }

    public function initalizeEventTypeTable() {
	$this->db->query( "CREATE TABLE IF NOT EXISTS `event_type` (
	 `event_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	 `event_type_name` varchar(255) NOT NULL,
	 `event_type_hasduration` tinyint(1) NOT NULL DEFAULT '0',
	 `event_type_tostats` tinyint(1) NOT NULL DEFAULT '1',
	 `event_type_effects_borrowing` tinyint(1) NOT NULL DEFAULT '1',
	 PRIMARY KEY (`event_type_id`)
	) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1" );
    }





}

// EOF



/* 
	CREATE TABLE `USER` (
	`USER_ID` int(11) NOT NULL auto_increment,
	`USER_FIRSTNAME` VARCHAR(255) NOT NULL,
	`USER_LASTNAME` VARCHAR(255) NOT NULL,
	`USER_DISABLED` BOOLEAN, PRIMARY KEY  (`USER_ID`)) ENGINE=MyISAM;
*/
