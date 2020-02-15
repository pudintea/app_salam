<?php  if ( ! defined('__NAJZMI_PUDINTEA__')) exit('No direct script access allowed');
/**
* Anibar Akan selalu dihati
* Diciptakan dengan sepenuh hati, untuk para pecinta kopi.
*
* Author:  Pudin Saepudin Ilham
* 		   najzmitea[et]gmail.com
*
*/

class FrontendModel extends CI_Model
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
	
	function list_tingkat()
	{
		$this->db->select('id_tingkat, tingkat_nama');
		$this->_result = $this->db->get('tb_m_tingkat')->result();
		
		if ($this->_result) {
            return $this->_result;
        }
	}
	
	function sub_tingkat($id_)
	{
		$this->db->select('id_sekolah, sekolah_id_tingkat, sekolah_nama');
		$this->db->where('sekolah_id_tingkat',$id_);
		$this->_result = $this->db->get('tb_m_sekolah')->result();
		
		if ($this->_result) {
            return $this->_result;
        }
	}

	/**
     * SIMPAN
    **/
	function save($kirim)
    {
        if (empty ($kirim['daftar_nama'])) {
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

}