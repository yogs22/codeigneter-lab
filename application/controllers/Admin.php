<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
		public function __construct()
		{
				parent::__construct();
				$this->load->model('M_admin');
				$this->load->library('libraries');
				if(!$this->session->userdata('status') == 'logged_in') {
		    		redirect(base_url('login'));
		    }
		}

		public function index()
		{
				$data['name'] = $this->session->userdata('name');
				$this->libraries->load('home', $data);
		}

		public function item()
		{
				$this->libraries->load('item');
		}
}
