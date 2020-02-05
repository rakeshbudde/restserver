<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add_new_leavetype_api extends CI_Controller{
	public function __construct(){
			parent::__construct();
			$this->load->model('leaves_api_model');
			$this->load->library('form_validation');
		}

function insert_new_leavetype()
		{
			$this->form_validation->set_rules('leave_type_name', 'New Leave Type', 'required');
			$this->form_validation->set_rules('set_days', 'Set Days', 'required');
			
			if($this->form_validation->run())
			{
				$data=array(
					'leave_type_name'	=>	$this->input->post('leave_type_name'),
					'set_days'		=>	$this->input->post('set_days')
				);
				$this->leaves_api_model->insert_new_leavetype_api($data);
				$array = array(
					'success' => true,
					);
			}
			else{
				$array=array(
					'error'					=>	true,
					'new_leave_type_error'	=>	form_error('leave_type_name'),
					'set_days_error'		=>	form_error('set_days')
				);
			}
			echo json_encode($array);
		}
		
}