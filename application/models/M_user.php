<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model{ 
	function login($where){ 
		$query = $this->db->get_where('ci_users', $where);
		return $query;
	} 
}