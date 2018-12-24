<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
	private $table = 'ci_items';

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_admin');
		$this->load->library(array('libraries', 'datatables', 'form_validation', 'user_agent'));
		$this->load->helper('security');
		if(!$this->session->userdata('status') == 'logged_in') {
    		redirect(base_url('login'));
    }
	}

	public function index()
	{
		$this->libraries->load('home');
	}

	/*
	 * Item Controller Method
	 */

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
		<a data-toggle="tooltip" data-original-title="Edit" class="btn btn-success btn-sm" href="'. base_url('admin/edit_item/$1') .'"><i class="glyphicon glyphicon-edit"></i></a>
		<a data-toggle="tooltip" data-original-title="Hapus" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin akan menghapus data ?\')" href="'. base_url('admin/delete_item/$1') .'"><i class="glyphicon glyphicon-trash"></i></button>
		 ',
		 'id');
		$this->datatables->from($this->table);

		echo $this->datatables->generate();
	}

	public function item_rules()
	{
		return [
			[
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'trim|required|xss_clean'
			],
			[
				'field' => 'category',
				'label' => 'Category',
				'rules' => 'trim|required|xss_clean'
			],
			[
				'field' => 'price',
				'label' => 'Price',
				'rules' => 'trim|required|xss_clean'
			],
			[
				'field' => 'description',
				'label' => 'Description',
				'rules' => 'trim|required|xss_clean'
			],
			[
				'field' => 'price',
				'label' => 'Price',
				'rules' => 'trim|required|numeric|xss_clean'
			],
		];
	}

	public function create_item()
	{
		$data['categories'] = $this->M_admin->get('ci_categories');
		$this->libraries->load('create_item', $data);
	}

	public function store_item() {
		$post = $this->input->post();

		$this->name = $post['name'];
		$this->id_category = $post['category'];
		$this->price = $post['price'];
		$this->description = $post['description'];
		$this->image = $this->M_admin->uploadImage();

		$validation = $this->form_validation;
		$validation->set_rules($this->item_rules());

		if ($validation->run()) {
			$insert = $this->M_admin->insert($this->table, $this);
			if ($insert) {
				$this->session->set_flashdata('success', 'Berhasil disimpan');
				redirect(base_url('admin/item'));
			}
		} else {
				redirect($this->agent->referrer());
		}
	}

	public function edit_item($id)
	{
		$custom['item'] = $this->M_admin->where($this->table, array('id' => $id));
		$custom['categories'] = $this->M_admin->get('ci_categories');

		$this->libraries->load('edit_item', $custom);
	}

	public function update_item($id)
	{
		$post = $this->input->post();

		$this->name = $post['name'];
		$this->id_category = $post['category'];
		$this->price = $post['price'];
		$this->description = $post['description'];

		$validation = $this->form_validation;
		$validation->set_rules($this->item_rules());

		if (!empty($_FILES['image']['name'])) {
			$this->image = $this->M_admin->uploadImage();
		}

		if ($validation->run()) {
			$update = $this->M_admin->update($this->table, array('id' => $id), $this);
			if ($update) {
				$this->session->set_flashdata('success', 'Berhasil update');
				redirect(base_url('admin/item'));
			}
		} else {
			redirect($this->agent->referrer());
		}
	}

	public function delete_item($id)
	{
		$where = array('id' => $id);
		$delete = $this->M_admin->delete($this->table, $where);
		if ($delete) {
			$this->session->set_flashdata('success', 'Berhasil menghapus data');
			redirect(base_url('admin/item'));
		} else {
			echo "gagal ";
		}
	}
}
