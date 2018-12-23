<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
		public function login($where)
		{
				$query = $this->db->get_where('ci_users', $where);
				return $query;
		}
}
