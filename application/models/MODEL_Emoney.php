<?php 
class MODEL_Emoney extends CI_Model 
{

	function datar($number,$offset){
		$this->db->select('*')->from('tbl_emoney');
		 $hasil=$this->db->get();
		 return $hasil->result();
	}

	function jumlah_data(){
		return $this->db->get('tbl_emoney')->num_rows();
	}

	function GetAllData(){
		 $this->db->select('id_emoney, nomor, namabank, available, status, createdby, createddate, modifiedby, modifieddate')->from('tbl_emoney');
		 $hasil=$this->db->get();
		 return $hasil->result();
	}

}
