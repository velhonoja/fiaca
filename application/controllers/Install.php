<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class Install extends CI_Controller {

	public function install() {
		// do stuff here, or something...
		
		
		
		$this->load->view('welcome_message');
	}
}



/* 
	CREATE TABLE `USER` (
	`USER_ID` int(11) NOT NULL auto_increment,
	`USER_FIRSTNAME` VARCHAR(255) NOT NULL,
	`USER_LASTNAME` VARCHAR(255) NOT NULL,
	`USER_DISABLED` BOOLEAN, PRIMARY KEY  (`USER_ID`)) ENGINE=MyISAM;
*/
