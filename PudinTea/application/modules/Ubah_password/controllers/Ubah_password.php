<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');

class Ubah_password extends MX_Controller {
	function __construct(){
		parent::__construct();
			$this->load->helper('form');
			date_default_timezone_set ('Asia/Jakarta');
			$this->load->helper('pdn_tgl_indo');
			$this->load->library('doa_masuk');
			$this->doa_masuk->cek_login();
	}
	
	public function title()       	{ return 'Aplikasi'.$this->config->item('base_title_aplikasi').' | By Anibar Studio'; }
    public function description() 	{ return 'Ubah Password'; }
    public function version()     	{ return '1.0'; }
    public function author()      	{ return 'Pudin Saepudin Ilham'; }
	public function MainModel()   	{ return 'Ubah_passwordModel'; }
    public function contact()     	{ return 'najzmitea@gmail.com'; }
    public function blog()     		{ return 'https://anibarstudio.blogspot.com'; }
	public function ActiveMenu()  	{ return 'ubah_password'; }
	
	/* ============================================================*/
// Index	
	public function index() {
		$data[$this->ActiveMenu()] = 'active';
        $this->template->load('admin/admin_tema', 'add', $data);
    }

	public function update()
	{

		
		$password_sebelumnya			= $this->input->post('password_sebelumnya');
		$password_baru					= $this->input->post('password_baru');
		$ulangi_password_baru			= $this->input->post('ulangi_password_baru');

		if ( empty($password_sebelumnya) || empty($password_baru) || empty($ulangi_password_baru)
		){
			$message = 'MAAF, Password gagal di ubah, mohon periksa form yang anda isi sebelum menyimpanya.';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('Ubah_password'), 'refresh');
		}
		
		$this->load->model($this->MainModel(), 'M_najzmi');
		$cek_password_sebelumnya = $this->M_najzmi->edit($this->session->userdata('s_id_user'));
		$ps_s = md5(sha1(sha1($password_sebelumnya)));
		if ($ps_s != $cek_password_sebelumnya->user_password){
			$message = 'MAAF, Password sebelumnya tidak sama, mohon masukan dengan teliti.';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('Ubah_password'), 'refresh');
		}
		
		if ( $password_baru != $ulangi_password_baru){
			$message = 'MAAF, Password baru dan Ulangi password baru anda tidak sama.';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('Ubah_password'), 'refresh');
		}
		
		$masukan['user_password'] = md5(sha1(sha1($password_baru)));
		
		$input = $this->M_najzmi->update($masukan, $this->session->userdata('s_id_user'));
		
		if ($input){
			$message = "TERIMAKASIH, Password berhasil diubah";
            $this->session->set_flashdata('success', $message);
		}else{
			$message = "MAAF, Password gagal diubah.";
            $this->session->set_flashdata('error', $message);
		}
        redirect(base_url('Ubah_password'), 'refresh');
		
    }
}
