<?php
class MODEL_Pengguna extends CI_Model
{

	function GetAllData()
	{
		$this->db->select('id_user, npk, nama, dept,password, status, role, createdby, createddate, modifiedby, modifieddate')->from('tbl_user');
		$hasil = $this->db->get();
		return $hasil->result();
	}
}
