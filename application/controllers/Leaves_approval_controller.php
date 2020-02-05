<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaves_approval_controller extends CI_Controller{
	/* function index(){
		$userid = "ab";
		$url="http://todquest.com/PN101/api/leave/GetAllLeaveTypes/".$userid;
		$ch = curl_init($url);
		

		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'x-device-id: 123',
			'x-token: 5488S5DD8D2C8V58SF5SD5SDDS'
		));
		
		$server_output = curl_exec($ch);
		$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if($httpcode == 200){
			curl_close ($ch);
			$data['leavetypedata'] = $server_output;
			$this->load->view('leaves/leaves_approval',$data);
		}
	}
 */
 
 
 function index(){
	$this->load->view('leaves/leaves_approval');
	}
 
function new_leave_type_action()
	{
		if($this->input->post('new_data_action'))
			  {
				  $new_data_action = $this->input->post('new_data_action');
				  
				  if($new_data_action == "fetch_all")
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
							<td>'.$row->ids.'</td>
							<td>'.$row->leave_type.'</td>
							<td>'.$row->from_date.'</td>
							<td>'.$row->to_date.'</td>
							<td>'.$row->reason.'</td>
							<td>'.$row->reports_to.'</td>
							<td><button type="button" name="approve" class="btn  btn-xs " id=""><i class="fas fa-check-circle" style="color:#28B463;"></i></button>
							<button type="button" name="reject" class="btn  btn-xs " id=""><i class="fas fa-times-circle" style="color:#E74C3C;"></i></button></td>
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