<?php
Class Libraries {
	public function __construct()
	{
		$this->gi =& get_instance();
	}

	public function paswd($txt)
	{
		$pass = md5(crc32($txt).'/'.base64_encode($txt));
		return $pass;
	}

	public function load($content, $custom = '')
	{
		$data['name'] = $this->gi->session->userdata('name');

		$this->gi->load->view('header', $data);
		$this->gi->load->view($content, $custom);
		$this->gi->load->view('footer', $data);
	}

	public function anti_xss($data)
	{
  	return htmlentities(strip_tags($data), ENT_QUOTES, 'UTF-8');
	}
}
?>
