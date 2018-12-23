<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
		public function __construct()
		{
				parent::__construct();
				$this->load->model('M_admin');
				$this->load->library(array('libraries', 'datatables'));
				if(!$this->session->userdata('status') == 'logged_in') {
		    		redirect(base_url('login'));
		    }
		}

		public function index()
		{
				$this->libraries->load('home');
		}

		public function item()
		{
				$this->libraries->load('item');
		}

		public function item_json()
		{
				header('Content-Type: application/json');
				$this->datatables->select('id,name,id_category,price,description,image');
				$this->datatables->add_column('action',
				'
				<button type="button" data-toggle="tooltip" data-original-title="Edit" class="btn btn-darkblue-1 btn-sm" onclick="edit($1)"><i class="glyphicon glyphicon-edit"></i></button>
				<button type="button" data-toggle="tooltip" data-original-title="Hapus" class="btn btn-danger btn-sm" onclick="delete_by($1)"><i class="glyphicon glyphicon-trash"></i></button>
				 ',
				 'id_warga');
				$this->datatables->from('ci_items');

				echo $this->datatables->generate();
		}
}
