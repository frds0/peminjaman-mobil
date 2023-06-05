<?php
class MODEL_Permintaan extends CI_Model
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
		$hasil = $this->db->query("SELECT tp.id_permintaan, tp.npk, tp.dept, tp.tujuan, tp.keperluan, DATE_FORMAT(tp.berangkat, '%d-%M-%Y %H:%i') AS berangkat, tp.jmberangkat, DATE_FORMAT(tp.kembali, '%d-%M-%Y  %H:%i') AS kembali, tp.jmkembali,tp.driver, tp.mobil, tp.mobil as id_mobil, CASE WHEN tp.mobil = 1 THEN CONCAT('GRAB -', tp.kodevoucher) ELSE CONCAT(tm.nopolisi, ' - ', tm.merk) END AS mobil, tp.kendaraan, td.nama, tp.km_berangkat,  CONCAT(te.namabank, ' - ', te.nomor) AS tampilan_emoney, tp.saldo_awal_emoney, tp.approved_tidaksetuju, tp.alasan_assignmobil, tp.status, tp.createdby, DATE_FORMAT(tp.createddate, '%d-%M-%Y %H:%i') AS createddate, tp.modifiedby, DATE_FORMAT(tp.modifieddate, '%d-%M-%Y %H:%i') AS modifieddate FROM tbl_permintaan AS tp LEFT JOIN tbl_mobil AS tm ON tp.mobil = tm.id_mobil LEFT JOIN  tbl_emoney AS te ON tp.emoney = te.id_emoney LEFT JOIN tbl_driver AS td ON tp.namadriver = td.id_driver WHERE tp.npk = '$npk'");
		// $hasil=$this->db->get();
		return $hasil->result();
	}
}
