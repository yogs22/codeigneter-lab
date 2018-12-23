<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
		public function __construct()
		{
				parent::__construct();
				$this->load->model('M_login');
				$this->load->library('libraries');
				if($this->session->userdata('status') == 'logged_in') {
		    		redirect(base_url('admin'));
		    }
		}

		public function index()
		{
				$data['msg'] = $this->session->userdata('msg');

				$this->load->view('login', $data);
				$this->session->sess_destroy();
		}

		public function do_login()
		{
				$email = $this->input->post('email');
				$password = $this->libraries->paswd($this->input->post('pass'));
				$where = array(
						'email' => $email,
						'password' => $password
				);

				$cek = $this->M_login->login($where);
				if($cek->num_rows() > 0){
						foreach ($cek->result_array() as $key) {
								$data_session = array(
										'email' => $key['email'],
										'username' => $key['username'],
										'id_user' => $key['id'],
										'status' => 'logged_in'
								);
						}

						$this->session->set_userdata($data_session);
						redirect(base_url('admin'));
				} else {
						$data_session = array(
							'msg' => 'Email atau password salah !',
							'status' => 'error'
						);

						$this->session->set_userdata($data_session);
						redirect(base_url('login'));
				}
		}
}
