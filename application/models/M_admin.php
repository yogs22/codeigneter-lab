<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_admin extends CI_Model {
	public function get($table){
		return $this->db->get($table)->result_array();
	}

	public function where($table, $where){
		return $this->db->get_where($table, $where)->row();
	}

	public function insert($table, $data)
	{
	  $cek = $this->db->insert($table, $data);
	  if ($cek) {
	  	return true;
	  }else{
	  	return false;
	  }
	}

	public function update($table,$where,$data)
	{
	  $this->db->where($where);
	  return $this->db->update($table,$data);
	}

	public function delete($table, $where)
	{
		$this->db->where($where);
		return $this->db->delete($table);
	}

	public function uploadImage()
	{
    $config['upload_path']      = './upload/';
    $config['allowed_types']    = 'gif|jpg|png';
    $config['file_name']        = rand(1,1000);
    $config['overwrite']				= true;
    $config['max_size']         = 1024; // 1MB

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {
      return $this->upload->data("file_name");
    }
	}

}
