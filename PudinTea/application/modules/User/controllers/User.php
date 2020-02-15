<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');

class User extends MX_Controller {
	function __construct(){
		parent::__construct();
			$this->load->helper('form');
			date_default_timezone_set ('Asia/Jakarta');
			$this->load->helper('pdn_tgl_indo');
			$this->load->library('doa_masuk');
			$this->doa_masuk->cek_login();
	}
	
	public function title()       	{ return 'Aplikasi'.$this->config->item('base_title_aplikasi').' | By Anibar Studio'; }
    public function description() 	{ return 'Admin User'; }
    public function version()     	{ return '1.0'; }
    public function author()      	{ return 'Pudin Saepudin Ilham'; }
	public function MainModel()   	{ return 'UserModel'; }
    public function contact()     	{ return 'najzmitea@gmail.com'; }
    public function blog()     		{ return 'https://anibarstudio.blogspot.com'; }
	public function ActiveMenu()  	{ return 'user'; }
	
	/* ============================================================*/
// Index	
	public function index() {
		$data[$this->ActiveMenu()] = 'active';
        $this->template->load('admin/admin_tema', 'content', $data);
    }

// Tambah
	public function add() {
		$data[$this->ActiveMenu()] = 'active';
        $this->template->load('admin/admin_tema', 'add', $data);
    }

//Simpan
	public function save() {
		$pssw							= 'akubahagia';
		$masukan['user_nama'] 			= $this->input->post('nama');
		$masukan['user_username'] 		= str_replace(' ', '', $this->input->post('username'));
		$masukan['user_email'] 			= str_replace(' ', '', $this->input->post('email'));
		$masukan['user_level'] 			= $this->input->post('level');
		$masukan['user_jk'] 			= $this->input->post('jk');
		$masukan['user_password'] 		= md5(sha1(sha1($pssw)));
		$masukan['user_tgl_input']		= date('Y-m-d H:i:s');
		
		
		if ( empty($masukan['user_username'])
		){
			$message = 'MAAF, gagal ditambahkan, mohon periksa form yang anda isi sebelum menyimpanya.';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('User'), 'refresh');
		}
		
		$this->load->model($this->MainModel(), 'M_najzmi');
		$periksa = $this->M_najzmi->periksa($masukan);
		if ($periksa > 0){
			$message = 'MAAF, Username yang anda gunakan sudah terdaftar.';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('User'), 'refresh');
		}
		
		$input = $this->M_najzmi->save($masukan);
		
		if ($input){
			$message = "TERIMAKASIH, Data berhasil ditambah";
            $this->session->set_flashdata('success', $message);
		}else{
			$message = "MAAF, data gagal ditambahkan";
            $this->session->set_flashdata('error', $message);
		}
        redirect(base_url('User'), 'refresh');
		
    }
	
// Edit
	public function edit()
		{
			$kode = $this->uri->segment(3);
			$_id_ =  base64_decode($kode);
			
			$data[$this->ActiveMenu()] = 'active';
			$this->load->model($this->MainModel(), 'M_najzmi');
			$data['edit_user'] = $this->M_najzmi->edit($_id_);
			$this->template->load('admin/admin_tema', 'edit', $data);
		}
// Update
	public function update()
	{
		$kode = $this->input->post('kode_user');
		$_id_ =  base64_decode($kode);
		
		$username_asal					= $this->input->post('kode_username');
		$masukan['user_nama'] 			= $this->input->post('nama');
		$masukan['user_username'] 		= str_replace(' ', '', $this->input->post('username'));
		$masukan['user_email'] 			= str_replace(' ', '', $this->input->post('email'));
		$masukan['user_level'] 			= $this->input->post('level');
		$masukan['user_jk'] 			= $this->input->post('jk');

		
		if ( empty($masukan['user_username'])
		){
			$message = 'MAAF, Data gagal di edit, mohon periksa form yang anda isi sebelum menyimpanya.';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('User/edit/'.$kode), 'refresh');
		}
		
		$this->load->model($this->MainModel(), 'M_najzmi');
		
		if ($username_asal != $masukan['user_username']){
			$periksa = $this->M_najzmi->periksa($masukan);
			if ($periksa > 0){
				$message = 'MAAF, Username yang anda gunakan sudah terdaftar.';
				$this->session->set_flashdata('error', $message);
				redirect(base_url('User/edit/'.$kode), 'refresh');
			}
		}
		$input = $this->M_najzmi->update($masukan, $_id_);
		
		if ($input){
			$message = "TERIMAKASIH, Data berhasil diubah";
            $this->session->set_flashdata('success', $message);
		}else{
			$message = "MAAF, Data gagal diubah.";
            $this->session->set_flashdata('error', $message);
		}
        redirect(base_url('User'), 'refresh');
		
    }
	
// Hapus
	function hapus()
		{
			$kode = $this->uri->segment(3);
			$_id_ =  base64_decode($kode);

			$this->load->model($this->MainModel() ,'M_najzmi');
			$_result = $this->M_najzmi->delete($_id_);
				
			if ($_result) {
					$message = 'TERIMAKASIH, Data berhasil dihapus';
					$this->session->set_flashdata('success', $message);
			} else {
					$message = 'MAAF, Data gagal dihapus';
					$this->session->set_flashdata('error', $message);
			}
				
			redirect(base_url('User'), 'refresh');
		}
		
// Hapus
	function reset()
		{
			$kode = $this->uri->segment(3);
			$_id_ =  base64_decode($kode);
			
			$pssw							= 'akubahagia';
			$masukan['user_password'] 		= md5(sha1(sha1($pssw)));
			
			$this->load->model($this->MainModel() ,'M_najzmi');
			$_result = $this->M_najzmi->reset($masukan, $_id_);
				
			if ($_result) {
					$message = 'TERIMAKASIH, Data berhasil direset';
					$this->session->set_flashdata('success', $message);
			} else {
					$message = 'MAAF, Data gagal direset';
					$this->session->set_flashdata('error', $message);
			}
				
			redirect(base_url('User'), 'refresh');
		}
// Json
	public function data_json()
		{
			$tabel = 'tb_m_user';
			$column_order = array(null, 'user_nama','user_username','user_email','user_level');
			$column_search = array('user_nama','user_username','user_email','user_level');
			$order = array('user_nama' => 'DASC'); // default order
				
				$this->load->model('DatatablesModel' ,'M_najzmi');
				$list = $this->M_najzmi->get_datatables($tabel,$column_order,$column_search,$order);
				$data = array();
				$no = isset($_POST['start']) 	? $_POST['start'] 	: 1;
				foreach ($list as $pDn) {
				
					
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $pDn->user_nama;
					$row[] = $pDn->user_username;
					$row[] = $pDn->user_email;
					$row[] = $pDn->user_level;
					$row[] = anchor('User/edit/'.base64_encode($pDn->id_user),' ',array('title'=>'Edit', 'class'=>'glyphicon glyphicon-edit')).' | '.
							anchor('User/reset/'.base64_encode($pDn->id_user),' ',array("title"=>"Reset", "class"=>"glyphicon glyphicon-refresh", "onclick" =>"if( ! confirm('Apakah anda yakin akan mereset user ini..??')) return false")).' | '.
						anchor('User/hapus/'.base64_encode($pDn->id_user),' ',array("title"=>"Hapus", "class"=>"glyphicon glyphicon-trash", "onclick" =>"if( ! confirm('Apakah anda yakin akan menghapus data ini..??')) return false")) ;

					$data[] = $row;
				}

				$output = array(
								"draw" => isset($_POST['draw']) 	? $_POST['draw'] 	: 'null',
								"recordsTotal" => $this->M_najzmi->count_all($tabel,$column_order,$column_search,$order),
								"recordsFiltered" => $this->M_najzmi->count_filtered($tabel,$column_order,$column_search,$order),
								"data" => $data,
						);
				//output to json format
				header('Content-type: application/json');
				echo json_encode($output);
			// End Json
		}
}
