<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaves_api extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->model('leaves_api_model');
			$this->load->library('form_validation');
		}
		function index(){
		
		$data=$this->leaves_api_model->fetch_all();

			echo json_encode($data->result_array());
			
		}
		
		
			
		function insert()
		{
			
			$this->form_validation->set_rules('leave_type', 'Leave Type', 'required');
			$this->form_validation->set_rules('from_date', 'From Date', 'required');
			$this->form_validation->set_rules('to_date', 'To Date', 'required');
			$this->form_validation->set_rules('reason', 'Leave Reason', 'required');
			$this->form_validation->set_rules('reports_to', 'Reports To', 'required');
			
			if($this->form_validation->run())
			{
				$data=array(
					'leave_type'	=>	$this->input->post('leave_type'),
					'from_date'		=>	date('Y-m-d H:i:s',strtotime($this->input->post('from_date'))),
					'to_date'		=>	date('Y-m-d H:i:s',strtotime($this->input->post('to_date'))),
					'reason'		=>	$this->input->post('reason'),
					'reports_to'	=>	$this->input->post('reports_to'),
				);
				$this->leaves_api_model->insert_api($data);
				$array = array(
					'success' => true,
					
				);
			}
			else{
				$array=array(
					'error'				=>	true,
					'leave_type_error'	=>	form_error('leave_type'),
					'from_date_error'	=>	form_error('from_date'),
					'to_date_error'		=>	form_error('to_date'),
					'reason_error'		=>	form_error('reason'),
					'reports_to_error'	=>	form_error('reports_to')
				);
			}
			echo json_encode($array);
		}
		
		
		/* function insert_new_leavetype()
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
					'error'				=>	true,
					'new_leave_type_error'	=>	form_error('leave_type_name'),
					'set_days_error'	=>	form_error('set_days')
				);
			}
			echo json_encode($array);
		} */
		
		
		
		function fetch_single()
		{
			if($this->input->post('id'))
			  {
				  $data = $this->leaves_api_model->fetch_single_user($this->input->post('id'));
				  foreach($data as $row)
				   {
					$output['leave_type'] = $row["leave_type"];
					$output['from_date'] = $row["from_date"];
					$output['to_date'] = $row["to_date"];
					$output['reason'] = $row["reason"];
					$output['reports_to'] = $row["reports_to"];
				   }
				   echo json_encode($output);
			  }
		}
		function update()
		{
			$this->form_validation->set_rules('leave_type', 'Leave Type', 'required');
			$this->form_validation->set_rules('from_date', 'From Date', 'required');
			$this->form_validation->set_rules('to_date', 'To Date', 'required');
			$this->form_validation->set_rules('reason', 'Leave Reason', 'required');
			$this->form_validation->set_rules('reports_to', 'Reports To', 'required');
			
			if($this->form_validation->run())
			{
				$data=array(
					'leave_type'	=>	$this->input->post('leave_type'),
					'from_date'		=>	date('Y-m-d H:i:s',strtotime($this->input->post('from_date'))),
					'to_date'		=>	date('Y-m-d H:i:s',strtotime($this->input->post('to_date'))),
					'reason'		=>	$this->input->post('reason'),
					'reports_to'	=>	$this->input->post('reports_to')
				);
				$this->leaves_api_model->update_api($this->input->post('id'), $data);
				$array = array(
					'success' => true,
				);
			}
			else{
				$array=array(
					'error'				=>	true,
					'leave_type_error'	=>	form_error('leave_type'),
					'from_date_error'	=>	form_error('from_date'),
					'to_date_error'		=>	form_error('to_date'),
					'reason_error'		=>	form_error('reason'),
					'reports_to_error'	=>	form_error('reports_to')
				);
			}
			echo json_encode($array);
		}
		 function delete()
			 {
			  if($this->input->post('id'))
			  {
			   if($this->leaves_api_model->delete_single_leave($this->input->post('id')))
			   {
				$array = array(
				 'success' => true
				);
			   }
			   else
			   {
				$array = array(
				 'error' => true
				);
			   }
			   echo json_encode($array);
			  }
			 }
			 
			 
			 
}
?>