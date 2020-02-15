<?php if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');

class Sekolah extends MX_Controller {
	function __construct(){
		parent::__construct();
			$this->load->helper('form');
			date_default_timezone_set ('Asia/Jakarta');
			$this->load->helper('pdn_tgl_indo');
			$this->load->library('doa_masuk');
			$this->doa_masuk->cek_login();
	}
	
	public function title()       	{ return 'Aplikasi'.$this->config->item('base_title_aplikasi').' | By Anibar Studio'; }
    public function description() 	{ return 'Admin Sekolah'; }
    public function version()     	{ return '1.0'; }
    public function author()      	{ return 'Pudin Saepudin Ilham'; }
	public function MainModel()   	{ return 'SekolahModel'; }
    public function contact()     	{ return 'najzmitea@gmail.com'; }
    public function blog()     		{ return 'https://anibarstudio.blogspot.com'; }
	public function ActiveMenu()  	{ return 'sekolah'; }
	
	/* ============================================================*/
// Index	
	public function index() {
		$data[$this->ActiveMenu()] = 'active';
        $this->template->load('admin/admin_tema', 'content', $data);
    }

// Tambah
	public function add() {
		$data[$this->ActiveMenu()] = 'active';
		$this->load->model($this->MainModel(), 'M_najzmi');
		$data['list_tingkat'] = $this->M_najzmi->list_tingkat();
        $this->template->load('admin/admin_tema', 'add', $data);
    }

//Simpan
	public function save() {
		$masukan['sekolah_nama'] 			= $this->input->post('nama');
		$masukan['sekolah_email'] 			= str_replace(' ', '', $this->input->post('email'));
		$masukan['sekolah_id_tingkat'] 		= $this->input->post('tingkat');
		$masukan['sekolah_telpon'] 			= $this->input->post('telpon');
		$masukan['sekolah_tgl_input']		= date('Y-m-d H:i:s');
		
		
		if ( empty($masukan['sekolah_nama'])
		){
			$message = 'MAAF, gagal ditambahkan, mohon periksa form yang anda isi sebelum menyimpanya.';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('Sekolah'), 'refresh');
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
        redirect(base_url('Sekolah'), 'refresh');
		
    }
	
// Edit
	public function edit()
		{
			$kode = $this->uri->segment(3);
			$_id_ =  base64_decode($kode);
			
			$data[$this->ActiveMenu()] = 'active';
			$this->load->model($this->MainModel(), 'M_najzmi');
			$data['list_tingkat'] = $this->M_najzmi->list_tingkat();
			$data['edit_sekolah'] = $this->M_najzmi->edit($_id_);
			$this->template->load('admin/admin_tema', 'edit', $data);
		}
// Update
	public function update()
	{
		$kode = $this->input->post('kode_sekolah');
		$_id_ =  base64_decode($kode);
		
		$masukan['sekolah_nama'] 			= $this->input->post('nama');
		$masukan['sekolah_email'] 			= str_replace(' ', '', $this->input->post('email'));
		$masukan['sekolah_id_tingkat'] 		= $this->input->post('tingkat');
		$masukan['sekolah_telpon'] 			= $this->input->post('telpon');

		
		if ( empty($masukan['sekolah_nama'])
		){
			$message = 'MAAF, Data gagal di edit, mohon periksa form yang anda isi sebelum menyimpanya.';
			$this->session->set_flashdata('error', $message);
			redirect(base_url('Sekolah/edit/'.$kode), 'refresh');
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
        redirect(base_url('Sekolah'), 'refresh');
		
    }
	
// Export
	public function export_sekolah()
		{
			$data[$this->ActiveMenu()] = 'active';
			$this->load->model($this->MainModel(), 'M_najzmi');
			$data['list_sekolah'] = $this->M_najzmi->list_sekolah();
			$this->load->view('export_sekolah', $data);
		}
// Import
	public function import_sekolah() {
		$data[$this->ActiveMenu()] = 'active';
        $this->template->load('admin/admin_tema', 'import_sekolah', $data);
    }
	
	public function import_data() {
        $target_file = './wp-content/temp/';
        move_uploaded_file($_FILES["import_excel"]["tmp_name"], $target_file."template_import_sekolah.xls");

        $file   = explode('.',$_FILES['import_excel']['name']);
        $length = count($file);

        if($file[$length -1] == 'xlsx' || $file[$length -1] == 'xls') {
            //jagain barangkali uploadnya selain file excel
            $tmp    = './wp-content/temp/template_import_sekolah.xls';
            //Baca dari tmp folder jadi file ga perlu jadi sampah di server :-p
            
            $this->load->library('excel');//Load library excelnya
            $read   = PHPExcel_IOFactory::createReaderForFile($tmp);
            $read->setReadDataOnly(true);
            $excel  = $read->load($tmp);

            //echo $tmp;
    
            $_sheet = $excel->setActiveSheetIndexByName('data_sekolah');            


            $data = array();

            $no = 1;
            for ($b = 3; $b < 500; $b++) {
                //$id_ 			= $_sheet->getCell('A'.$b)->getCalculatedValue();
                $tingkat 		= $_sheet->getCell('B'.$b)->getCalculatedValue();
                $nama 			= $_sheet->getCell('C'.$b)->getCalculatedValue();
                $email 			= $_sheet->getCell('D'.$b)->getCalculatedValue();
                $telpon 		= $_sheet->getCell('E'.$b)->getCalculatedValue();
				$tgl_input		= date('Y-m-d H:i:s');
				
				

                if ($nama != "" || $tingkat != "") {
                    $data[] = "('$tingkat', '$nama', '$email', '$telpon', '$tgl_input')";
                    $no++;
                }
            }

            //exit;

            $strq = "INSERT INTO tb_m_sekolah(sekolah_id_tingkat, sekolah_nama, sekolah_email, sekolah_telpon, sekolah_tgl_input) VALUES ";

            $strq .= implode(",", $data).";";
            
			$this->load->model($this->MainModel(), 'M_najzmi');
            $input = $this->M_najzmi->get_query($strq);

            @unlink('./wp-content/temp/template_import_sekolah.xls');
			
            if ($input){
				$message = "TERIMAKASIH, ".($no-1)." Data berhasil ditambah";
				$this->session->set_flashdata('success', $message);
			}else{
				$message = "MAAF, data gagal ditambahkan";
				$this->session->set_flashdata('error', $message);
			}
			redirect(base_url('Sekolah'), 'refresh');

        } else {
            exit('Buka File Excel...');//pesan error tipe file tidak tepat
        }
			$message = "MAAF, ada masalah";
				$this->session->set_flashdata('error', $message);
        redirect(base_url('Sekolah'), 'refresh');
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
				
			redirect(base_url('Sekolah'), 'refresh');
		}
		
// Json
	public function data_json()
		{
			$tabel = 'view_sekolah';
			$column_order = array(null, 'sekolah_nama','sekolah_email','sekolah_telpon','tingkat_nama');
			$column_search = array('sekolah_nama','sekolah_email','sekolah_telpon','sekolah_nama','tingkat_nama');
			$order = array('sekolah_nama' => 'DASC'); // default order
				
				$this->load->model('DatatablesModel' ,'M_najzmi');
				$list = $this->M_najzmi->get_datatables($tabel,$column_order,$column_search,$order);
				$data = array();
				$no = isset($_POST['start']) 	? $_POST['start'] 	: 1;
				foreach ($list as $pDn) {
				
					
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $pDn->sekolah_nama;
					$row[] = $pDn->sekolah_email;
					$row[] = $pDn->sekolah_telpon;
					$row[] = $pDn->tingkat_nama;
					$row[] = anchor('Sekolah/edit/'.base64_encode($pDn->id_sekolah),' ',array('title'=>'Edit', 'class'=>'glyphicon glyphicon-edit')).' | '.
						anchor('Sekolah/hapus/'.base64_encode($pDn->id_sekolah),' ',array("title"=>"Hapus", "class"=>"glyphicon glyphicon-trash", "onclick" =>"if( ! confirm('Apakah anda yakin akan menghapus data ini..??')) return false")) ;

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
