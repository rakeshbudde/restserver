<?php
class Emailsend Extends CI_Controller{

	public function index(){
		$this->load->view('notices/notice');
	}
	
	public function send()
	{
    $to =  $this->input->post('from');  // User email pass here
    $subject = $this->input->post('subject');;

    $from = 'rakeshbudhea@gmail.com';              // Pass here your mail id

    $emailContent = '<!DOCTYPE><html><head></head><body><table width="600px" style="border:1px solid #cccccc;margin: auto;border-spacing:0;"><tr><td style="background:#00bcd433;">PN101</td></tr>';
    $emailContent .='<tr><td style="height:50px"></td></tr>';


    $emailContent .= $this->input->post('subject');  //   Post message available here
    
	$emailContent .= $this->input->post('message');  //   Post message available here


    $emailContent .='<tr><td style="height:10px"></td></tr>';
    $emailContent .= "<tr><td style='background:#00bcd433;color: #000000;text-align: center;font-size: 13px;'><p style='margin-top:1px;'></a></p></td></tr></table></body></html>";         
	
	$emailContent ='<div style="font-family: Helvetica Neue, Helvetica, Helvetica, Arial, sans-serif;">
    <table style="width: 100%;">
      <tr>
        <td></td>
        <td bgcolor="#FFFFFF ">
          <div style="padding: 15px; max-width: 600px;margin: 0 auto;display: block; border-radius: 0px;padding: 0px;">
            <table style="width: 100%;background: #00bcd433 ;">
              <tr>
                <td></td> 
                <td>
                  <div>
                    <table width="100%">
                      <tr>
                        <td rowspan="2" style="text-align:center;padding:10px;">
						<p style="color:black;float:left;font-size: 13px;margin-top: 10px; padding:5px; font-size: 14px;">PN101</p></td>
                      </tr>
                    </table>
                  </div>
                </td>
                <td></td>
              </tr>
            </table>
            <table style="padding: 10px;font-size:14px; width:100%;">
              <tr>
                <td style="padding:10px;font-size:14px; width:100%;">
                    <p>Greetings,</p>';
                    $emailContent .= $this->input->post('subject');  //   Post message available here
					$emailContent .= '<br>';
					$emailContent .= $this->input->post('message');  //   Post message available here
					$emailContent .= '<p></p>
                    <p>Thank you <br>
                    Team PN101<br>
                 </td>
              </tr>
			  <tr> 
			  <td>
				 <div align="center" style="font-size:12px; margin-top:20px; padding:5px; width:100%; background:#eee; color:#000000;">
                    © 2019 
                  </div>
                </td>
			  </tr>
            </table>
          </div>
          </td></tr></table></div>';
	

    $config['protocol']    = 'smtp';
    $config['smtp_host']    = 'ssl://smtp.gmail.com';
    $config['smtp_port']    = '465';
    $config['smtp_timeout'] = '60';

    $config['smtp_user']    = 'rakeshbudhea@gmail.com';    //Important
    $config['smtp_pass']    = 'R@kesh2419';  //Important

    $config['charset']    = 'utf-8';
    $config['newline']    = "\r\n";
    $config['mailtype'] = 'html'; // or html
    $config['validation'] = TRUE; // bool whether to validate email or not 

     

    $this->email->initialize($config);
    $this->email->set_mailtype("html");
    $this->email->from($from);
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($emailContent);
    $this->email->send();

    $this->session->set_flashdata('msg',"Mail sent successfully");
    $this->session->set_flashdata('msg_class','alert-success');
    return redirect('emailsend');
}

}


?>