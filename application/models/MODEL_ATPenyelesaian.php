<?php
class MODEL_ATPenyelesaian extends CI_Model
{

	function datar($number, $offset)
	{
		// return $query = $this->db->get('tbl_mobil',$number,$offset)->result();
		$this->db->select('*')->from('tbl_penyelesaian');
		$hasil = $this->db->get();
		return $hasil->result();
	}

	function jumlah_data()
	{
		return $this->db->get('tbl_penyelesaian')->num_rows();
	}

	function GetAllData($npk)
	{
		$hasil = $this->db->query("SELECT tp.id_permintaan, tp.npk,  tp.dept, tp.tujuan, tp.keperluan, DATE_FORMAT(tp.berangkat, '%d-%M-%Y %H:%i') AS berangkat, DATE_FORMAT(tp.kembali, '%d-%M-%Y %H:%i') AS kembali, tp.driver, tp.mobil, tp.mobil as id_mobil, CASE WHEN tp.mobil = 1 THEN CONCAT('GRAB -',tp.kodevoucher) ELSE CONCAT(tm.nopolisi, ' - ', tm.merk) END AS mobil, tp.namadriver, tp.kendaraan, tp.kodevoucher, td.nama,  tp.km_berangkat, tp.emoney, CONCAT(te.namabank, ' - ', te.nomor) AS tampilan_emoney, tp.saldo_awal_emoney, tp.km_akhir, tp.saldo_akhir_emoney, tp.status, tp.keterangan, tp.createdby, u1.nama AS createdby_name, tp.approvedby, tp.approveddate, tp.createddate, tp.modifiedby, u2.nama AS modifiedby_name, tp.modifieddate FROM tbl_permintaan AS tp LEFT JOIN tbl_mobil AS tm ON tp.mobil = tm.id_mobil LEFT JOIN tbl_emoney AS te ON tp.emoney = te.id_emoney LEFT JOIN tbl_driver AS td ON tp.namadriver = td.id_driver LEFT JOIN tbl_user AS u1 ON tp.createdby = u1.npk LEFT JOIN tbl_user AS u2 ON tp.createdby = u2.npk WHERE tp.npk = '$npk'");
		return $hasil->result();
	}

	function GetDataDetail()
	{
		$hasil = $this->db->query("SELECT * from tbl_detail_biaya_operasional");

		return $hasil->result();
	}
}
