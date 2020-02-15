<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');

/* *****************************

Pudin Saepudin Ilham
najzmitea@gmail.com
Ciamis Asli

******************************** */

class Doa_masuk {
	
	// SET SUPER GLOBAL
	var $CI = NULL;
	public function __construct() {

		$this->CI =& get_instance();
	}

	// Cek login
	public function cek_login() {
		$keys = 'APLIKASI_PENAYANGAN_TV_PUDIN_SAEPUDIN_ILHAM_ANIBARSTUDIO.BLOGSPOT.COM_NAJZMITEA@GMAIL.COM_0813-8172-9540'.date('d-m-Y');
		if($this->CI->session->userdata('s_pDn_kode_masuk') != md5(sha1(sha1($keys)))) {
			$this->CI->session->set_flashdata('sukses','Oops...silakan login dulu');
			redirect(base_url('login'));
		}
	}
	
}