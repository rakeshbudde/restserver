<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messanger extends CI_Controller{
	

	function index(){
	$this->load->view('messanger_view/messanger');
	}
	
}
?>