<?php
class MODEL_ATLaporan extends CI_Model
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

	function GetAllData()
	{
		$hasil = $this->db->query("SELECT tp.id_permintaan, tp.npk, tp.dept, tp.tujuan, tp.keperluan, DATE_FORMAT(tp.berangkat, '%d-%M-%Y %H:%i') AS berangkat, DATE_FORMAT(tp.berangkat, '%M') AS bulan_berangkat, DATE_FORMAT(tp.kembali, '%d-%M-%Y %H:%i') AS kembali, tp.driver, tp.mobil, tp.mobil as id_mobil, tm.nopolisi, CONCAT(tm.merk, ' - ', tm.nopolisi) AS mobil, tp.namadriver,tp.kendaraan, tp.kodevoucher, td.nama, tp.km_berangkat, tp.km_akhir, tp.emoney, CONCAT(te.namabank, ' - ', te.nomor) AS tampilan_emoney, tp.saldo_awal_emoney, tp.saldo_akhir_emoney,  tp.total_biaya_grab, tp.total_biaya_bensin, tp.total_biaya_tol, tp.total_biaya_parkir, tp.total_biaya_tambalban, tp.total_biaya_cucimobil, tp.total_biaya_lainlain, tp.total_biaya_emoney, tp.total_biaya_cash, tp.total_keseluruhan, tp.status, tp.approvedby, tp.approveddate, tp.createdby, u1.nama AS createdby_name, DATE_FORMAT(tp.createddate, '%d-%M-%Y %H:%i') AS createddate, tp.modifiedby, u2.nama AS modifiedby_name, tp.modifieddate FROM tbl_permintaan AS tp LEFT JOIN tbl_mobil AS tm ON tp.mobil = tm.id_mobil LEFT JOIN tbl_emoney AS te ON tp.emoney = te.id_emoney LEFT JOIN tbl_driver AS td ON tp.namadriver = td.id_driver LEFT JOIN tbl_user AS u1 ON tp.createdby = u1.npk LEFT JOIN tbl_user AS u2 ON tp.createdby = u2.npk ORDER BY tp.createddate");

		return $hasil->result();
	}

	function GetDataDetail()
	{
		$hasil = $this->db->query("SELECT * from tbl_detail_biaya_operasional");

		return $hasil->result();
	}

	function periode($date1, $date2)
	{
		$hasil = $this->db->query("SELECT tp.id_permintaan, tp.npk, tp.dept, tp.tujuan, tp.keperluan, DATE_FORMAT(tp.berangkat, '%d-%M-%Y %H:%i') AS berangkat, DATE_FORMAT(tp.berangkat, '%M') AS bulan_berangkat, DATE_FORMAT(tp.kembali, '%d-%M-%Y %H:%i') AS kembali, tp.driver, tp.mobil, tp.mobil as id_mobil, tm.nopolisi, CONCAT(tm.merk, ' - ', tm.nopolisi) AS mobil, tp.namadriver,tp.kendaraan, tp.kodevoucher, td.nama, tp.km_berangkat, tp.km_akhir, tp.emoney, CONCAT(te.namabank, ' - ', te.nomor) AS tampilan_emoney, tp.saldo_awal_emoney, tp.saldo_akhir_emoney, tp.total_biaya_bensin, tp.total_biaya_tol, tp.total_biaya_parkir, tp.total_biaya_tambalban, tp.total_biaya_cucimobil, tp.total_biaya_lainlain, tp.total_biaya_emoney, tp.total_biaya_cash, tp.total_biaya_grab, tp.total_keseluruhan, tp.status, tp.approvedby, tp.approveddate, tp.createdby, u1.nama AS createdby_name, DATE_FORMAT(tp.createddate, '%d-%M-%Y %H:%i') AS createddate, tp.modifiedby, u2.nama AS modifiedby_name, tp.modifieddate FROM tbl_permintaan AS tp LEFT JOIN tbl_mobil AS tm ON tp.mobil = tm.id_mobil LEFT JOIN tbl_emoney AS te ON tp.emoney = te.id_emoney LEFT JOIN tbl_driver AS td ON tp.namadriver = td.id_driver LEFT JOIN tbl_user AS u1 ON tp.createdby = u1.npk LEFT JOIN tbl_user AS u2 ON tp.createdby = u2.npk WHERE berangkat BETWEEN '$date1' AND '$date2'");

		return $hasil->result();
	}

	public function print($date1, $date2)
	{
		// $hasil = $this->db->query("SELECT tp.id_permintaan, tp.npk, tp.dept, tp.tujuan, tp.keperluan, DATE_FORMAT(tp.berangkat, '%d-%M-%Y %H:%i') AS berangkat, DATE_FORMAT(tp.berangkat, '%M') AS bulan_berangkat, DATE_FORMAT(tp.kembali, '%d-%M-%Y %H:%i') AS kembali, tp.driver, tp.mobil, tp.mobil as id_mobil, tm.nopolisi, CONCAT(tm.merk, ' - ', tm.nopolisi) AS mobil, tp.namadriver,tp.kendaraan, tp.kodevoucher, td.nama, tp.km_berangkat, tp.km_akhir, tp.emoney, CONCAT(te.namabank, ' - ', te.nomor) AS tampilan_emoney, tp.saldo_awal_emoney, tp.saldo_akhir_emoney, tp.total_biaya_bensin, tp.total_biaya_tol, tp.total_biaya_parkir, tp.total_biaya_tambalban, tp.total_biaya_cucimobil, tp.total_biaya_lainlain, tp.total_biaya_emoney, tp.total_biaya_cash, tp.total_biaya_grab, tp.total_keseluruhan, tp.status, tp.approvedby, tp.approveddate, tp.createdby, u1.nama AS createdby_name, DATE_FORMAT(tp.createddate, '%d-%M-%Y %H:%i') AS createddate, tp.modifiedby, u2.nama AS modifiedby_name, tp.modifieddate FROM tbl_permintaan AS tp LEFT JOIN tbl_mobil AS tm ON tp.mobil = tm.id_mobil LEFT JOIN tbl_emoney AS te ON tp.emoney = te.id_emoney LEFT JOIN tbl_driver AS td ON tp.namadriver = td.id_driver LEFT JOIN tbl_user AS u1 ON tp.createdby = u1.npk LEFT JOIN tbl_user AS u2 ON tp.createdby = u2.npk ORDER BY tp.createddate");

		// return $hasil->result();
		// // return $this->db->get('tbl_asesor');
		$hasil = $this->db->query("SELECT tp.id_permintaan, tp.npk, tp.dept, tp.tujuan, tp.keperluan, DATE_FORMAT(tp.berangkat, '%d-%M-%Y %H:%i') AS berangkat, DATE_FORMAT(tp.berangkat, '%M') AS bulan_berangkat, DATE_FORMAT(tp.kembali, '%d-%M-%Y %H:%i') AS kembali, tp.driver, tp.mobil, tp.mobil as id_mobil, tm.nopolisi, CONCAT(tm.merk, ' - ', tm.nopolisi) AS mobil, tp.namadriver,tp.kendaraan, tp.kodevoucher, td.nama, tp.km_berangkat, tp.km_akhir, tp.emoney, CONCAT(te.namabank, ' - ', te.nomor) AS tampilan_emoney, tp.saldo_awal_emoney, tp.saldo_akhir_emoney, tp.total_biaya_bensin, tp.total_biaya_tol, tp.total_biaya_parkir, tp.total_biaya_tambalban, tp.total_biaya_cucimobil, tp.total_biaya_lainlain, tp.total_biaya_emoney, tp.total_biaya_cash, tp.total_biaya_grab, tp.total_keseluruhan, tp.status, tp.approvedby, tp.approveddate, tp.createdby, u1.nama AS createdby_name, DATE_FORMAT(tp.createddate, '%d-%M-%Y %H:%i') AS createddate, tp.modifiedby, u2.nama AS modifiedby_name, tp.modifieddate FROM tbl_permintaan AS tp LEFT JOIN tbl_mobil AS tm ON tp.mobil = tm.id_mobil LEFT JOIN tbl_emoney AS te ON tp.emoney = te.id_emoney LEFT JOIN tbl_driver AS td ON tp.namadriver = td.id_driver LEFT JOIN tbl_user AS u1 ON tp.createdby = u1.npk LEFT JOIN tbl_user AS u2 ON tp.createdby = u2.npk WHERE berangkat BETWEEN '$date1' AND '$date2'");

		return $hasil->result();
	}

	function GetDataExcel($date1, $date2)
	{
		$hasil = $this->db->query("SELECT tp.id_permintaan, tp.npk, tp.dept, tp.tujuan, tp.keperluan, tp.berangkat, DATE_FORMAT(tp.berangkat, '%M') AS bulan_berangkat, DATE_FORMAT(tp.kembali, '%d-%M-%Y %H:%i') AS kembali, tp.driver, tp.mobil, tp.mobil as id_mobil, tm.nopolisi, CONCAT(tm.merk, ' - ', tm.nopolisi) AS mobil, tp.namadriver,tp.kendaraan, tp.kodevoucher, td.nama, tp.km_berangkat, tp.km_akhir, tp.emoney, CONCAT(te.namabank, ' - ', te.nomor) AS tampilan_emoney, tp.saldo_awal_emoney, tp.saldo_akhir_emoney, tp.total_biaya_bensin, tp.total_biaya_tol, tp.total_biaya_parkir, tp.total_biaya_tambalban, tp.total_biaya_cucimobil, tp.total_biaya_lainlain, tp.total_biaya_emoney, tp.total_biaya_cash, tp.total_biaya_grab, tp.total_keseluruhan, tp.status, tp.approvedby, tp.approveddate, tp.createdby, u1.nama AS createdby_name, DATE_FORMAT(tp.createddate, '%d-%M-%Y %H:%i') AS createddate, tp.modifiedby, u2.nama AS modifiedby_name, tp.modifieddate FROM tbl_permintaan AS tp LEFT JOIN tbl_mobil AS tm ON tp.mobil = tm.id_mobil LEFT JOIN tbl_emoney AS te ON tp.emoney = te.id_emoney LEFT JOIN tbl_driver AS td ON tp.namadriver = td.id_driver LEFT JOIN tbl_user AS u1 ON tp.createdby = u1.npk LEFT JOIN tbl_user AS u2 ON tp.createdby = u2.npk WHERE tp.status = 'Done' AND tp.berangkat BETWEEN '$date1' AND '$date2' ORDER BY createddate");

		return $hasil->result();
	}

	function GetDataExcelNoFilter()
	{
		$hasil = $this->db->query("SELECT tp.id_permintaan, tp.npk, tp.dept, tp.tujuan, tp.keperluan, tp.berangkat, DATE_FORMAT(tp.berangkat, '%M') AS bulan_berangkat, DATE_FORMAT(tp.kembali, '%d-%M-%Y %H:%i') AS kembali, tp.driver, tp.mobil, tp.mobil as id_mobil, tm.nopolisi, CONCAT(tm.merk, ' - ', tm.nopolisi) AS mobil, tp.namadriver,tp.kendaraan, tp.kodevoucher, td.nama, tp.km_berangkat, tp.km_akhir, tp.emoney, CONCAT(te.namabank, ' - ', te.nomor) AS tampilan_emoney, tp.saldo_awal_emoney, tp.saldo_akhir_emoney, tp.total_biaya_bensin, tp.total_biaya_tol, tp.total_biaya_parkir, tp.total_biaya_tambalban, tp.total_biaya_cucimobil, tp.total_biaya_lainlain, tp.total_biaya_emoney, tp.total_biaya_cash, tp.total_biaya_grab, tp.total_keseluruhan, tp.status, tp.approvedby, tp.approveddate, tp.createdby, u1.nama AS createdby_name, DATE_FORMAT(tp.createddate, '%d-%M-%Y %H:%i') AS createddate, tp.modifiedby, u2.nama AS modifiedby_name, tp.modifieddate FROM tbl_permintaan AS tp LEFT JOIN tbl_mobil AS tm ON tp.mobil = tm.id_mobil LEFT JOIN tbl_emoney AS te ON tp.emoney = te.id_emoney LEFT JOIN tbl_driver AS td ON tp.namadriver = td.id_driver LEFT JOIN tbl_user AS u1 ON tp.createdby = u1.npk LEFT JOIN tbl_user AS u2 ON tp.createdby = u2.npk WHERE tp.status = 'Done' ORDER BY createddate");

		return $hasil->result();
	}
}
