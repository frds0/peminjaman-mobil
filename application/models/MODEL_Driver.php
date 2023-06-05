<?php 
class MODEL_Driver extends CI_Model 
{

	function datar($number,$offset){
		//return $query = $this->db->get('tbl_driver',$number,$offset)->result();
		$this->db->select('*')->from('tbl_driver');
		 $hasil=$this->db->get();
		 return $hasil->result();
	}

	function jumlah_data(){
		return $this->db->get('tbl_driver')->num_rows();
	}

	function GetAllData(){
		 $this->db->select('id_driver, npk, nama, available, status, createdby, createddate, modifiedby, modifieddate')->from('tbl_driver');
		 $hasil=$this->db->get();
		 return $hasil->result();
	}

}

?>