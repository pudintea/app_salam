<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct()
    {
        parent::__construct();

		date_default_timezone_set ('Asia/Jakarta');
		  
		$this->load->library('session');
		  
    }
	
	public function title()       { return 'Aplikasi Catatan Rapat'; }
    public function description() { return 'Modul Login'; }
    public function version()     { return '1.0'; }
    public function author()      { return 'Pudin Saepudin Ilham'; }
    public function contact()     { return 'najzmitea@gmail.com'; }
    public function mainModel()   { return 'LoginModel'; }
    public function create()      { return '04 November 2019'; }
    public function Blog()        { return 'anibarstudio.blogspot.com'; }
    public function _Home()       { return 'Admin_home'; }
    public function _Keys()       { return 'APLIKASI_PENAYANGAN_TV_PUDIN_SAEPUDIN_ILHAM_ANIBARSTUDIO.BLOGSPOT.COM_NAJZMITEA@GMAIL.COM_0813-8172-9540'.date('d-m-Y'); }
	
	function index(){
		$keys = $this->_Keys();
		 if ($this->session->userdata('s_pDn_kode_masuk') != md5($keys)){
				// jika tidak sama session
				// hapus jika masih ada session
				$this->session->sess_destroy();

				$this->load->view('login');
				
			}else{
				// jika session sama
				redirect(base_url($this->_Home()), 'refresh');
			}
		
	}
	
	function masuk(){
		$_u = $this->input->post('username');
		$_p = $this->input->post('password');
		
		$data['user_username'] = $_u;
		$data['user_password'] = md5(sha1(sha1($_p)));

		if (empty($_u) and empty($_p) ){
			// kalau KOSONG
			$message = 'Form tidak boleh kosong';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('login'), 'refresh');
		}
		
		$this->load->model($this->mainModel(),'M_najzmi');
		$periksa = $this->M_najzmi->periksa($data);
		
		if ($periksa->num_rows() > 0 ){
				$isinya = $periksa->row();
				$sess_data['s_id_user'] 			= $isinya->id_user;
				$sess_data['s_user_nama'] 			= $isinya->user_nama;
				$sess_data['s_user_username'] 		= $isinya->user_username;
				$sess_data['s_pDn_kode_masuk'] 		= md5(sha1(sha1($this->_Keys())));
				$this->session->set_userdata($sess_data);
				
				redirect(base_url($this->_Home()), 'refresh');

		}else{
			// kalau user tidak ada
			$message = 'Anda belum terdaftar';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('login'), 'refresh');
		}
	
	}
	
    function logout()
    {
			$this->session->sess_destroy();
			redirect(base_url('login'), 'refresh');
    }

}
