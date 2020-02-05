<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notice extends CI_Controller{
	

	function index(){
	$this->load->view('notices/notice');
	}
	
}
?>