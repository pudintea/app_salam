<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');

class Frontend extends MX_Controller {
	function __construct(){
		parent::__construct();
			$this->load->helper('form');
			date_default_timezone_set ('Asia/Jakarta');
			$this->load->helper('pdn_tgl_indo');
	}
	
	public function title()       	{ return 'Aplikasi '.$this->config->item('base_title_aplikasi').' | By Anibar Studio'; }
    public function description() 	{ return 'Frontend'; }
    public function version()     	{ return '1.0'; }
    public function author()      	{ return 'Pudin Saepudin Ilham'; }
	public function MainModel()   	{ return 'FrontendModel'; }
    public function contact()     	{ return 'najzmitea@gmail.com'; }
    public function blog()     		{ return 'https://anibarstudio.blogspot.com'; }
	public function ActiveMenu()  	{ return 'frontend'; }
	
	/* ============================================================*/
// Index	
	public function index() {
		$data[$this->ActiveMenu()] = 'active';
		$this->load->model($this->MainModel() ,'M_najzmi');
		$data['list_tingkat'] = $this->M_najzmi->list_tingkat();
        $this->load->view('content', $data);
    }
	
	function json_sub_tingkat()
	{
		$id_   = $this->input->post('id_sub');
		$this->load->model($this->mainModel() ,'M_najzmi');
        $blog = $this->M_najzmi->sub_tingkat($id_);
        $posts = array();
        foreach ($blog as $hasil)
        {
            $posts[] = array(
                "id_sub"          =>  $hasil->id_sekolah,
                "nama_sub"        =>  $hasil->sekolah_nama
            );
        }

        header('Content-Type: application/json');
        echo json_encode($posts,TRUE);
	}

// Tambah
	public function save() {
		$masukan['daftar_nama'] 			= $this->input->post('nama');
		$masukan['daftar_email'] 			= $this->input->post('email');
		$masukan['daftar_telpon'] 			= $this->input->post('telpon');
		$masukan['daftar_id_tingkat'] 		= $this->input->post('tingkat');
		$masukan['daftar_id_sekolah'] 		= $this->input->post('sekolah');
		$masukan['daftar_tanggal']			= date('Y-m-d');
		$masukan['daftar_tgl_input']		= date('Y-m-d H:i:s');
		
		if ( empty($masukan['daftar_nama']) || empty($masukan['daftar_email']) || empty($masukan['daftar_telpon']) || empty($masukan['daftar_id_tingkat']) || empty($masukan['daftar_id_sekolah'])
		){
			$message = 'MAAF, gagal ditambahkan, mohon periksa form yang anda isi sebelum menyimpanya.';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('Frontend'), 'refresh');
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
        redirect(base_url('Frontend'), 'refresh');
    }

}
