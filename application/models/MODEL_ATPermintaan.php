<?php
class MODEL_ATPermintaan extends CI_Model
{

	function datar($number, $offset)
	{
		// return $query = $this->db->get('tbl_mobil',$number,$offset)->result();
		$this->db->select('*')->from('tbl_permintaan');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function jumlah_data()
	{
		return $this->db->get('tbl_permintaan')->num_rows();
	}

	function GetAllData($npk)
	{
		$hasil = $this->db->query("SELECT tp.id_permintaan, tp.npk, tp.dept, tp.tujuan, tp.keperluan, DATE_FORMAT(tp.berangkat, '%d-%M-%Y %H:%i') AS berangkat, tp.jmberangkat, DATE_FORMAT(tp.kembali, '%d-%M-%Y  %H:%i') AS kembali, tp.jmkembali,tp.driver, tp.mobil, tp.mobil as id_mobil, CONCAT(tm.merk, ' - ', tm.nopolisi) AS mobil, tp.kendaraan, tp.namadriver, td.nama, tp.km_berangkat, tp.emoney, tp.saldo_awal_emoney, tp.status, tp.createdby, DATE_FORMAT(tp.createddate, '%d-%M-%Y %H:%i') AS createddate, tp.modifiedby, DATE_FORMAT(tp.modifieddate, '%d-%M-%Y %H:%i') AS modifieddate FROM tbl_permintaan AS tp LEFT JOIN tbl_mobil AS tm ON tp.mobil = tm.id_mobil LEFT JOIN tbl_driver AS td ON tp.namadriver = td.id_driver WHERE tp.npk = '$npk'");
		return $hasil->result();
	}
}
