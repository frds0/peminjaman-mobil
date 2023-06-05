<?php 
class MODEL_Mobil extends CI_Model 
{
	function datar($number,$offset){
		// return $query = $this->db->get('tbl_mobil',$number,$offset)->result();
		$this->db->select('*')->from('tbl_mobil');
		 $hasil=$this->db->get();
		 return $hasil->result();
	}

	function jumlah_data(){
		return $this->db->get('tbl_mobil')->num_rows();
	}

	function GetAllData(){
		 
		 $this->db->select('id_mobil, nopolisi, merk, warna, tahunpembelian, available, status, createdby, createddate, modifiedby, modifieddate')->from('tbl_mobil');
		 $hasil=$this->db->get();
		 return $hasil->result();
	}


}

?>