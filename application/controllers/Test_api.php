<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test_api extends CI_Controller{
	
	function login(){
		$this->load->view('login');
	}
	
	function notice(){
	$this->load->view('notices/notice');
	}
	function index(){
	$this->load->view('leaves/leave_request');
	}
	

	function action()
	{
		if($this->input->post('data_action'))
		{
			$data_action = $this->input->post('data_action');
			
			
			if($data_action == "Delete")
			{
				$api_url = "http://localhost/ccc/create-crud-rest-api-in-codeigniter-step-by-step/api/delete";

				$form_data = array(
					'id'		=>	$this->input->post('user_id')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;

			}

			if($data_action == "Edit")
			{
				$api_url = "http://localhost/ccc/create-crud-rest-api-in-codeigniter-step-by-step/api/update";

				$form_data = array(
					/* 'first_name'		=>	$this->input->post('first_name'),
					'last_name'			=>	$this->input->post('last_name'),
					'phone'				=>	$this->input->post('phone'),
					'email'				=>	$this->input->post('email'),
					'address'			=>	$this->input->post('address'),
					'id'				=>	$this->input->post('user_id') */
					
					'leave_type'  => $this->input->post('leave_type'),
					'from_date'   => $this->input->post('from_date'),
					'to_date'   => $this->input->post('to_date'),
					'reason'   => $this->input->post('reason'),
					'reports_to'   => $this->input->post('reports_to'),
					'id'    => $this->input->post('user_id')
					
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;

			}

			if($data_action == "fetch_single")
			{
				$api_url = "http://localhost/ccc/create-crud-rest-api-in-codeigniter-step-by-step/api/fetch_single";

				$form_data = array(
					'id'		=>	$this->input->post('user_id')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;
			}

			if($data_action == "Insert")
			{
				$api_url = "http://localhost/restserver/leaves_api/insert";
			

				$form_data = array(
					'leave_type'  => $this->input->post('leave_type'),
					 'from_date'   => $this->input->post('from_date'),
					 'to_date'   => $this->input->post('to_date'),
					 'reason'   => $this->input->post('reason'),
					 'reports_to'   => $this->input->post('reports_to')
				);

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_POST, true);

				curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				echo $response;
			}

			/* if($data_action == "Insert_new_leavetype")
					{
						$api_url= "http://localhost/restserver/leaves_api/insert_new_leavetype";
						
						$form_data = array(
						 'leave_type_name'  => $this->input->post('leave_type_name'),
						 'set_days'   => $this->input->post('set_days')
						);
						 
						$client = curl_init(api_url);
						curl_setopt($client, CURLOPT_POST, true);
						curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
						curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
						$response = curl_exec($client);
						curl_close($client);
						echo $response;
					} */

			if($data_action == "fetch_all")
			{
				$api_url = "http://localhost/restserver/leaves_api";

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				$result = json_decode($response);

				$output = '';

				if(count($result) > 0)
				{
					foreach($result as $row)
					{
						$output .= '
						<tr>
							<td>'.$row->id.'</td>
							<td>'.$row->leave_type.'</td>
							<td>'.$row->from_date.'</td>
							<td>'.$row->to_date.'</td>
							<td>'.$row->reason.'</td>
							<td>'.$row->reports_to.'</td>
							<td><button type="button" name="edit" class="btn  btn-xs edit" id="'.$row->id.'"><i class="fas fa-pencil-alt" style="color:#28B463;"></i></button>
							<button type="button" name="delete" class="btn  btn-xs delete" id="'.$row->id.'"><i class="fas fa-trash" style="color:#E74C3C;"></i></button></td>
						</tr>

						';
					}
				}
				else
				{
					$output .= '
					<tr>
						<td colspan="8" align="center">No Data Found</td>
					</tr>
					';
				}

				echo $output;
			}
			
			if($data_action == "fetch_all_leaves")
			{
				$api_url = "http://localhost/restserver/leaves_api";

				$client = curl_init($api_url);

				curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

				$response = curl_exec($client);

				curl_close($client);

				$result = json_decode($response);

				$output = '';

				if(count($result) > 0)
				{
					foreach($result as $row)
					{
						$output .= '
						<tr>
							<td>'.$row->id.'</td>
							<td>'.$row->leave_type.'</td>
							<td>'.$row->from_date.'</td>
							<td>'.$row->to_date.'</td>
							<td>'.$row->reason.'</td>
							<td>'.$row->reports_to.'</td>
							<td><button type="button" name="approve" class="btn  btn-xs approve" id="'.$row->id.'"><i class="fas fa-check-circle" style="color:#28B463;" title="Approve"></i></button>
							<button type="button" name="reject" class="btn  btn-xs reject" id="'.$row->id.'"><i class="fas fa-times-circle" style="color:#E74C3C;" title="Reject"></i></button></td>
						</tr>

						';
					}
				}
				else
				{
					$output .= '
					<tr>
						<td colspan="8" align="center">No Data Found</td>
					</tr>
					';
				}

				echo $output;
			}
		}
	}
	
	
	
	}
?>