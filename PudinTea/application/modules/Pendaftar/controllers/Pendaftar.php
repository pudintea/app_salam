<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');

class Pendaftar extends MX_Controller {
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
	public function MainModel()   	{ return 'PendaftarModel'; }
    public function contact()     	{ return 'najzmitea@gmail.com'; }
    public function blog()     		{ return 'https://anibarstudio.blogspot.com'; }
	public function ActiveMenu()  	{ return 'pendaftar'; }
	
	/* ============================================================*/
// Index	
	public function index() {
		$data[$this->ActiveMenu()] = 'active';
        $this->template->load('admin/admin_tema', 'content', $data);
    }

// Tambah
	public function export_pendaftar() {
		$data[$this->ActiveMenu()] = 'active';
		$this->load->model($this->MainModel(), 'M_najzmi');
		$data['list_pendaftar'] = $this->M_najzmi->list_pendaftar();
        $this->load->view('export_pendaftar', $data);
    }

// Edit
	public function lihat()
		{
			$dari 		= $this->input->post('dari_tgl');
			$sampai 	= $this->input->post('sampai_tgl');
			
			$data[$this->ActiveMenu()] = 'active';
			$this->load->model($this->MainModel(), 'M_najzmi');
			$data['lihat_data'] = $this->M_najzmi->lihat_data($dari, $sampai);
			$this->template->load('admin/admin_tema', 'lihat', $data);
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
				
			redirect(base_url('Pendaftar'), 'refresh');
		}
		

// Json
	public function data_json()
		{
			$tabel = 'view_daftar';
			$column_order = array(null, 'daftar_tanggal','sekolah_nama','daftar_nama','daftar_email','daftar_telpon');
			$column_search = array('daftar_tanggal','sekolah_nama','daftar_nama','daftar_email','daftar_telpon');
			$order = array('id_daftar' => 'DASC'); // default order
				
				$this->load->model('DatatablesModel' ,'M_najzmi');
				$list = $this->M_najzmi->get_datatables($tabel,$column_order,$column_search,$order);
				$data = array();
				$no = isset($_POST['start']) 	? $_POST['start'] 	: 1;
				foreach ($list as $pDn) {
				
					
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = nama_hari($pDn->daftar_tanggal).', '. tgl_indo($pDn->daftar_tanggal);
					$row[] = $pDn->sekolah_nama;
					$row[] = $pDn->daftar_nama;
					$row[] = $pDn->daftar_email;
					$row[] = $pDn->daftar_telpon;
					$row[] = anchor('Pendaftar/hapus/'.base64_encode($pDn->id_daftar),' ',array("title"=>"Hapus", "class"=>"glyphicon glyphicon-trash", "onclick" =>"if( ! confirm('Apakah anda yakin akan menghapus data ini..??')) return false")) ;

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
