<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaves_Api_model extends CI_Model{
		
		function fetch_all(){
			
			$this->db->order_by('id', 'DESC');
			return $this->db->get('leave_apply');
			
		}
		
		function insert_api($data)
		{
			$this->db->insert('leave_apply', $data);
			if($this->db->affected_rows() > 0)
			  {
			   return true;
			  }
			  else
			  {
			   return false;
			  }
		}
		
		

		function insert_new_leavetype_api($data)
		{
			$this->db->insert('leave_type', $data);
			if($this->db->affected_rows() > 0)
			  {
			   return true;
			  }
			  else
			  {
			   return false;
			  }
		}
		
		function fetch_single_user($user_id)
		{
			$this->db->where('id', $user_id);
			$query = $this->db->get('leave_type');
			return $query->result_array();
		}
		function update_api()
		{
			$this->db->where('id', $user_id);
			$this->db->update('leave_type', $data);
			
		}
			function delete_single_user($user_id)
			 {
			  $this->db->where("id", $user_id);
			  $this->db->delete("leave_type");
			  if($this->db->affected_rows() > 0)
			  {
			   return true;
			  }
			  else
			  {
			   return false;
			  }
			 }
		
	}
?>