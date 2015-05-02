<?php

class AreaManager extends CI_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('fiacaform_helper');
		$this->load->model('area_model');
	}	
	
	
	function index()
	{
		
		//if(  ){
		
		//}
		
		$data = array(
		    'content' => "AreaManager/front",
		    'areas' => $this->area_model->getAll()
		);
		
		$this->load->view("template", $data);
	}
	
	
	function handle_form()
	{			
		$this->form_validation->set_rules('area_code', 'area_code', 'required|trim');			
		$this->form_validation->set_rules('area_location', 'area_location', 'required|trim');				
		$this->form_validation->set_rules('area_tostats', 'area_tostats', '');			
		$this->form_validation->set_rules('area_group', 'area_group', '');
			
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('Area Manager_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'area_code' => set_value('area_code'),
					       	'area_location' => set_value('area_location'),
					       	'area_tostats' => set_value('area_tostats'),
					       	'area_group' => set_value('area_group')
						);
					
			// run insert model to write data to db
		
			if ($this->Area_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
				redirect('AreaManagerController/success');   // or whatever logic needs to occur
			}
			else
			{
			echo 'An error occurred saving your information. Please try again later';
			// Or whatever error handling is necessary
			}
		}
	}

}
?>
