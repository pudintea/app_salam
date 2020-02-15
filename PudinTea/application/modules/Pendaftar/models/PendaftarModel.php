<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');
/**
* Anibar Akan selalu dihati
* Diciptakan dengan sepenuh hati, untuk para pecinta kopi.
*
* Author:  Pudin Saepudin Ilham
* 		   najzmitea[et]gmail.com
*
*/

class PendaftarModel extends CI_Model
{
	/* nama databases */
	//protected 
	private $_table1 		= 'tb_m_daftar';
	private $_id1 			= 'id_daftar';
	
	/**
     * return _retval
     *
     * @var Boolean
     **/
    private $_retval = NULL;

    /**
     * return _result
     *
     * @var Boolean
     **/
    private $_result = FALSE;

    /**
     * return _retarr
     *
     * @var Array
     **/
    private $_retarr = array();
	
	/**
     * Pemeriksaan data
    **/
	
	function periksa($data){
		$this->db->where('user_username',$data['user_username']);
		return $this->db->get($this->_table1)->num_rows();
	}
	
	function list_pendaftar()
	{
		$this->db->select('daftar_tanggal, sekolah_nama, daftar_nama, daftar_email, daftar_telpon');
		$this->_result = $this->db->get('view_daftar')->result();
		
		if ($this->_result) {
            return $this->_result;
        }
	}
	
	function lihat_data($dari, $sampai){
		$this->_result = $this->db
        ->select('*')->from('tb_m_daftar')
        ->where(array(
            'daftar_tanggal >= ' => $dari,
			'daftar_tanggal <=' => $sampai
        ))
        ->get();
		
		if ($this->_result) {
            return $this->_result;
        }
		
	}
	/**
     * SIMPAN
    **/
	function save($kirim)
    {
        if (empty ($kirim['user_nama'])) {
            return false;
        }

        $this->_result = $this->db->insert($this->_table1, $kirim);

        if ($this->_result) {
            return $this->_result;
        }
    }
	

    /**
     * Edit
    **/
	
	function edit($id)
	{
		if (empty ($id)) {
            return false;
        }

		$this->db->where($this->_id1,$id);
		$this->_result = $this->db->get($this->_table1)->row();
		
		if ($this->_result) {
            return $this->_result;
        }
	}
	
	/**
     * Update ( Prosess Edit )
    **/

    function update($data, $_id_)
    {
        if (empty ($_id_)) {
            return false;
        }

        $this->db->where($this->_id1, $_id_);
        $this->_result = $this->db->update($this->_table1, $data);

        if ($this->_result) {
            return $this->_result;
        }
    }

    /**
     * Datatables server side
    **/
	
	function delete($_id_)
    {
        if (empty ($_id_)) {
            return false;
        }

        $this->db->where($this->_id1, $_id_);
        $this->_result = $this->db->delete($this->_table1);

        if ($this->_result) {
            return $this->_result;
        }
    }
	
	/**
     * Reset (Prosess Reset Password)
    **/

    function reset($data, $_id_)
    {
        if (empty ($_id_)) {
            return false;
        }

        $this->db->where($this->_id1, $_id_);
        $this->_result = $this->db->update($this->_table1, $data);

        if ($this->_result) {
            return $this->_result;
        }
    }

}