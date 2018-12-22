<?php 

Class Libraries {

	public function paswd($txt){
		$pass = md5(crc32($txt).'/'.base64_encode($txt));
		return $pass;
	}
}
?>