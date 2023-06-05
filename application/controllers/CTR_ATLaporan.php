<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CTR_ATLaporan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->library('upload');
		$this->load->model('MODEL_ATLaporan', 'data');
		$this->load->model('MODEL_Function', 'function');

		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['judul'] = 'PT. SIGAP PRIMA ASTREA';
		$data['tbl_user'] = $this->db->get_where('tbl_user', ['npk' =>
		$this->session->userdata('npk')])->row_array();
		$data['laporanatasan'] = $this->data->GetAllData();
		$data['detailbiaya'] = $this->data->GetDataDetail();
		$data['date1'] = "";
		$data['date2'] = "";
		$this->load->view('Template/Header', $data);
		$this->load->view('Template/Sidebaratasan', $data);
		$this->load->view('Atasan/Laporan', $data);
		$this->load->view('Template/Footer');
	}

	public function tampilkan()
	{
		$data['judul'] = 'PT. SIGAP PRIMA ASTREA';
		$data['detailbiaya'] = $this->data->GetDataDetail();
		$date1 = $this->input->post('date1');
		$data['date1'] = $date1;
		$date2 = $this->input->post('date2');
		$data['date2'] = $date2;
		if ($date1 != null) {
			$data['laporanatasan'] = $this->data->periode($date1, $date2);
		} else {
			$data['laporanatasan'] = $this->data->GetAllData();
		}
		$this->load->view('Template/Header', $data);
		$this->load->view('Template/Sidebaratasan', $data);
		$this->load->view('Atasan/Laporan', $data);
		$this->load->view('Template/Footer');
	}

	public function print()
	{
		// $judul['title'] = 'Print Data Asesor';
		// $data['asesor'] = $this->m_asesor->print("tbl_asesor")->result();
		$data['judul'] = 'PT. SIGAP PRIMA ASTREA';
		$data['detailbiaya'] = $this->data->GetDataDetail();

		$date1 = $this->input->post('date1');
		$date2 = $this->input->post('date2');
		if ($date1 != null) {
			$data['laporanatasan'] = $this->data->periode($date1, $date2);
		} else {
			$data['laporanatasan'] = $this->data->GetAllData();
		}
		// $this->load->view('Template/Header', $judul);
		// $this->load->view('Template/Footer', $judul);
		$this->load->view('Atasan/print_atasan', $data);
	}

	public function excel()
	{
		$data['judul'] = 'PT. SIGAP PRIMA ASTREA';
		$data['detailbiaya'] = $this->data->GetDataDetail();
		$date1 = $this->input->post('date1');
		$date2 = $this->input->post('date2');
		$laporanatasan = $this->data->GetDataExcel($date1, $date2);
		if ($date1 != null) {
			$laporanatasan = $this->data->periode($date1, $date2);
		} else {
			$laporanatasan = $this->data->GetDataExcelNoFilter();
		}

		include_once APPPATH . '/third_party/xlsxwriter.class.php';
		ini_set('display_errors', 0);
		ini_set('log_errors', 1);
		error_reporting(E_ALL & ~E_NOTICE);

		$filename = "Laporan Peminjaman Mobil-" . date('d-m-Y-H-i-s') . ".xlsx";
		header('Content-disposition: attachment; filename="' . XLSXWriter::sanitize_filename($filename) . '"');
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Transfer-Encoding: binary');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');

		$styles = array('widths' => [5, 20, 20, 20], 'font' => 'Arial', 'font-size' => 10, 'font-style' => 'bold', 'halign' => 'center', 'border' => 'left,right,top,bottom');
		$styles2 = array(['font' => 'Arial', 'font-size' => 10, 'font-style' => 'bold', 'halign' => 'left', 'border' => 'left,right,top,bottom'],);

		$header = array(
			'No' 				=> 'integer',
			'No_Polisi' 		=> 'string',
			'Kode Voucher' 		=> 'string',
			'Tanggal Berangkat' => 'string',
			'Bulan' 			=> 'string',
			'Nama User' 		=> 'string',
			'Departemen' 		=> 'string',
			'Nama Driver' 		=> 'string',
			'Tujuan' 			=> 'string',
			'Keperluan' 		=> 'string',
			'Km Awal' 			=> 'integer',
			'Km Akhir' 			=> 'integer',
			'Biaya GRAB' 		=> 'integer',
			'Biaya Bensin' 		=> 'integer',
			'Biaya Tol' 		=> 'integer',
			'Biaya Parkir'		=> 'integer',
			'Biaya Tambal Ban' 	=> 'integer',
			'Biaya Cuci Mobil' 	=> 'integer',
			'Biaya Lain-lain'	=> 'integer',
			'Biaya Keseluruhan'	=> 'integer',
		);

		$writer = new XLSXWriter();
		$writer->setAuthor('IT SIGAP');

		$writer->writeSheetHeader('Sheet1', $header, $styles);
		$no = 1;
		foreach ($laporanatasan as $row) {
			$writer->writeSheetRow('Sheet1', [$no++, $row->nopolisi, $row->kodevoucher, $row->berangkat, $row->bulan_berangkat, $row->createdby_name, $row->dept, $row->nama, $row->tujuan, $row->keperluan, $row->km_berangkat, $row->km_akhir, $row->total_biaya_grab, $row->total_biaya_bensin, $row->total_biaya_tol, $row->total_biaya_parkir, $row->total_biaya_tambalban, $row->total_biaya_cucimobil, $row->total_biaya_lainlain, $row->total_keseluruhan], $styles2);
		}
		$writer->writeToStdOut();
	}
}
