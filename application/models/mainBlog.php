<?php
function can_login($username, $password){
	$this->db->where('username', $username);
	$this->db->where('password', $password);
	$query = $this->db->get('users');
}

?>