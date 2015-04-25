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



        if (!$this->db->table_exists("user")) {
            echo "going to initalize user table<br/>";
            $this->initalizeUserTable();
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

}

// EOF



/* 
	CREATE TABLE `USER` (
	`USER_ID` int(11) NOT NULL auto_increment,
	`USER_FIRSTNAME` VARCHAR(255) NOT NULL,
	`USER_LASTNAME` VARCHAR(255) NOT NULL,
	`USER_DISABLED` BOOLEAN, PRIMARY KEY  (`USER_ID`)) ENGINE=MyISAM;
*/
