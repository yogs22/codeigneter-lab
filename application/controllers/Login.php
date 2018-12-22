<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{ 
	function __construct(){ 
		parent::__construct(); 
		$this->load->model('M_user'); 
		$this->load->library('libraries');
	} 

	public function index() {
		$this->load->view('login');
	}
	
	function do_login() { 
		$email = $this->input->post('email');
		$password = $this->libraries->paswd($this->input->post('pass'));
		$where = array(
			'email' => $email,
			'password' => $password
			);
		$cek = $this->M_user->login($where);
		if($cek->num_rows() > 0){
			foreach ($cek->result_array() as $key) {
				$data_session = array(
				'email' => $key['email'],
				'username' => $key['username'],
				'id_user' => $key['id'],
				'status' => "true"
				);
			}
			$this->session->set_userdata($data_session);
			redirect(base_url('admin'));
		}else{
			echo "Email atau password salah !";
		} 
	} 
	function logout(){ 
		$this->session->sess_destroy(); redirect(''); 
	}
}