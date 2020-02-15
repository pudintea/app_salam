<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');

class Admin_home extends MX_Controller {
	function __construct(){
		parent::__construct();
			$this->load->helper('form');
			date_default_timezone_set ('Asia/Jakarta');
			$this->load->helper('pdn_tgl_indo');
			$this->load->library('doa_masuk');
			$this->doa_masuk->cek_login();
	}
	
	public function title()       	{ return 'Aplikasi TV | By Anibar Studio'; }
    public function description() 	{ return 'Admin Home'; }
    public function version()     	{ return '1.0'; }
    public function author()      	{ return 'Pudin Saepudin Ilham'; }
	public function MainModel()   	{ return 'Admin_homeModel'; }
    public function contact()     	{ return 'najzmitea@gmail.com'; }
    public function blog()     		{ return 'https://anibarstudio.blogspot.com'; }
	public function ActiveMenu()  	{ return 'admin_home'; }
	
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
		
		$masukan['judul_nama'] 			= $this->input->post('judul');
		$masukan['judul_tgl_input']		= date('Y-m-d H:i:s');
		
		
		if ( empty($masukan['judul_nama'])
		){
			$message = 'MAAF, gagal ditambahkan, mohon periksa form yang anda isi sebelum menyimpanya.';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('Judul_rapat'), 'refresh');
		}
		
		$this->load->model($this->MainModel(), 'M_najzmi');
		
		$input = $this->M_najzmi->save($masukan);
		
		if ($input){
			$message = "TERIMAKASIH, Data berhasil ditambah";
            $this->session->set_flashdata('success', $message);
		}else{
			$message = "MAAF, data gagal ditambahkan";
            $this->session->set_flashdata('error', $message);
		}
        redirect(base_url('Judul_rapat'), 'refresh');
		
    }
	
// Edit
	public function edit()
		{
			$kode = $this->uri->segment(3);
			$_id_ =  base64_decode($kode);
			
			$data[$this->ActiveMenu()] = 'active';
			$this->load->model($this->MainModel(), 'M_najzmi');
			$data['edit_judul'] = $this->M_najzmi->edit($_id_);
			$this->template->load('admin/admin_tema', 'edit', $data);
		}
// Update
	public function update()
	{
		$kode = $this->input->post('kode_judul');
		$_id_ =  base64_decode($kode);
		
		$masukan['judul_nama'] 			= $this->input->post('judul');

		
		if ( empty($masukan['judul_nama'])
		){
			$message = 'MAAF, Data gagal di edit, mohon periksa form yang anda isi sebelum menyimpanya.';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('Judul_rapat/edit/'.$kode), 'refresh');
		}
		
		
		$this->load->model($this->MainModel(), 'M_najzmi');
		
		$input = $this->M_najzmi->update($masukan, $_id_);
		
		if ($input){
			$message = "TERIMAKASIH, Data berhasil diubah";
            $this->session->set_flashdata('success', $message);
		}else{
			$message = "MAAF, Data gagal diubah.";
            $this->session->set_flashdata('error', $message);
		}
        redirect(base_url('Judul_rapat'), 'refresh');
		
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
				
			redirect(base_url('Judul_rapat'), 'refresh');
		}
		
// Json
	public function data_json()
		{
			$tabel = 'tb_m_judul';
			$column_order = array(null, 'judul_nama');
			$column_search = array('judul_nama');
			$order = array('judul_tgl_input' => 'DASC'); // default order
				
				$this->load->model('DatatablesModel' ,'M_najzmi');
				$list = $this->M_najzmi->get_datatables($tabel,$column_order,$column_search,$order);
				$data = array();
				$no = isset($_POST['start']) 	? $_POST['start'] 	: 1;
				foreach ($list as $pDn) {
				
					
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = anchor('Detail_rapat/index/'.base64_encode($pDn->id_judul),$pDn->judul_nama,array('title'=>'Detail', 'class'=>''));
					$row[] = $pDn->judul_tgl_input;
					$row[] = anchor('Judul_rapat/edit/'.base64_encode($pDn->id_judul),' ',array('title'=>'Review', 'class'=>'glyphicon glyphicon-edit')).' | '.
						anchor('Judul_rapat/hapus/'.base64_encode($pDn->id_judul),' ',array("title"=>"Hapus", "class"=>"glyphicon glyphicon-trash", "onclick" =>"if( ! confirm('Apakah anda yakin akan menghapus data ini..??')) return false")) ;

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
