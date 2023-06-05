<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CTR_APenyelesaian extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->library('upload');
		$this->load->model('MODEL_APenyelesaian', 'data');
		$this->load->model('MODEL_Function', 'function');

		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['judul'] = 'PT. SIGAP PRIMA ASTREA';
		$data['tbl_user'] = $this->db->get_where('tbl_user', ['npk' =>
		$this->session->userdata('npk')])->row_array();
		$data['permintaan'] = $this->data->GetAllData();
		$data['detailbiaya'] = $this->data->GetDataDetail();
		$data['datamobil'] = $this->data->getdata();
		$data['datadriver'] = $this->data->getdatadriver();
		$this->load->view('Template/Header', $data);
		$this->load->view('Template/Sidebaradmin', $data);
		$this->load->view('Admin/Penyelesaian', $data);
		$this->load->view('Template/Footer');
	}

	function EditData()
	{
		//header
		$id_permintaan 	= $this->input->post('id_permintaan');
		$km_akhir 		= $this->input->post('editkm_akhir' . $id_permintaan);
		//

		//biaya pengeluaran
		$data = [];

		// $count = count($_FILES['gambar']['name']);

		// for ($i = 0; $i < $count; $i++) {
		// }
		// echo $this->upload->display_errors();

		$datain = array();

		$field_data = $this->input->post('editnamabiaya');

		$total_harga_grab	 	= 0;
		$total_harga_bensin 	= 0;
		$total_harga_tol		= 0;
		$total_harga_parkir		= 0;
		$total_harga_tambalban	= 0;
		$total_harga_cucimobil	= 0;
		$total_harga_lainlain	= 0;

		$total_harga_cash = 0;
		$total_harga_emoney = 0;
		$total_harga_perusahaan = 0;
		$total_keseluruhan = 0;

		for ($i = 0; $i < count($field_data); $i++) {

			$namabiaya 		= $this->input->post('editnamabiaya');
			$harga 			= $this->input->post('editharga');
			$metode 		= $this->input->post('editmetode');

			$datain = array(
				'id_permintaan' => $id_permintaan,
				'namabiaya' => $namabiaya[$i],
				'harga' 	=> $harga[$i],
				'metode' 	=> $metode[$i],
				'gambar' 	=> $id_permintaan . '_' . $i . '.blm'
			);
			if (!empty($_FILES['gambar']['name'][$i])) {

				$_FILES['file']['name'] = $_FILES['gambar']['name'][$i];
				$_FILES['file']['type'] = $_FILES['gambar']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['gambar']['error'][$i];
				$_FILES['file']['size'] = $_FILES['gambar']['size'][$i];

				$path = './assets/img/';
				$config['upload_path'] = $path;
				$config['allowed_types'] = 'jpg|jpeg|png';
				$config['max_size'] = '10000';
				$config['file_name'] = $id_permintaan . '_' . $i;

				$this->upload->initialize($config);
				$this->load->library('upload', $config);
				// $this->upload->overwrite = true;

				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];

					// $data['totalFiles'][] = $gambar;
				}
				$datain['gambar'] = $filename;
			}

			$this->db->insert('tbl_detail_biaya_operasional', $datain);

			if ($namabiaya[$i] == 'GRAB') {
				$total_harga_grab = $total_harga_grab + $harga[$i];
			}

			if ($namabiaya[$i] == 'Bensin') {
				$total_harga_bensin = $total_harga_bensin + $harga[$i];
			}

			if ($namabiaya[$i] == 'Tol') {
				$total_harga_tol = $total_harga_tol + $harga[$i];
			}

			if ($namabiaya[$i] == 'Parkir') {
				$total_harga_parkir = $total_harga_parkir + $harga[$i];
			}

			if ($namabiaya[$i] == 'Tambal Ban') {
				$total_harga_tambalban = $total_harga_tambalban + $harga[$i];
			}

			if ($namabiaya[$i] == 'Cuci Mobil') {
				$total_harga_cucimobil = $total_harga_cucimobil + $harga[$i];
			}

			if ($namabiaya[$i] == 'Lain-lain') {
				$total_harga_lainlain = $total_harga_lainlain + $harga[$i];
			}

			if ($metode[$i] == 'E-Money') {
				$total_harga_emoney = $total_harga_emoney + $harga[$i];
			}

			if ($metode[$i] == 'Cash') {
				$total_harga_cash = $total_harga_cash + $harga[$i];
			}

			if ($metode[$i] == 'Perusahaan') {
				$total_harga_perusahaan = $total_harga_perusahaan + $harga[$i];
			}

			$total_keseluruhan = $total_keseluruhan + $harga[$i];
		}

		echo $total_harga_grab . ' --- ' . 'grab<br/>';
		echo $total_harga_bensin . ' --- ' . 'bensin<br/>';
		echo $total_harga_tol . ' --- ' . 'tol<br/>';
		echo $total_harga_parkir . ' --- ' . 'parkir<br/>';
		echo $total_harga_tambalban . ' --- ' . 'tambalban<br/>';
		echo $total_harga_cucimobil . ' --- ' . 'cucimobil<br/>';
		echo $total_harga_lainlain . ' --- ' . 'lainlain<br/>';

		echo $total_harga_emoney . ' --- ' . 'emoney<br/>';
		echo $total_harga_cash . ' --- ' . 'cash<br/>';
		echo $total_harga_perusahaan . ' --- ' . 'perusahaan<br/>';

		echo $total_keseluruhan;

		$data = array(
			'km_akhir' 					=> $km_akhir,
			'saldo_akhir_emoney' 		=> $this->input->post('saldo_awal_emoney' . $id_permintaan) - $total_harga_emoney,
			'status'					=> 'Diselesaikan oleh user',
			'total_biaya_grab'			=> $total_harga_grab,
			'total_biaya_bensin'		=> $total_harga_bensin,
			'total_biaya_tol'			=> $total_harga_tol,
			'total_biaya_parkir'		=> $total_harga_parkir,
			'total_biaya_tambalban'		=> $total_harga_tambalban,
			'total_biaya_cucimobil'		=> $total_harga_cucimobil,
			'total_biaya_lainlain'		=> $total_harga_lainlain,
			'total_biaya_emoney'		=> $total_harga_emoney,
			'total_biaya_cash'			=> $total_harga_cash,
			'total_biaya_perusahaan' 	=> $total_harga_perusahaan,
			'total_keseluruhan'			=> $total_keseluruhan,
		);

		$this->db->where('id_permintaan', $id_permintaan);
		$this->db->update('tbl_permintaan', $data);

		redirect('CTR_APenyelesaian');
	}

	function rilisMobil()
	{
		$id_permintaan 		= $this->input->post('id_permintaan_rilis');

		$data = array(
			'modifiedby' 	=> $this->session->userdata('npk'),
			'modifieddate' 	=> date('Y-m-d H:i:s'),
			'status' 		=> 'Done'
		);
		$this->db->where('id_permintaan', $id_permintaan);
		$this->db->update('tbl_permintaan', $data);

		$id_mobil = $this->input->post('id_mobil_rilis' . $id_permintaan);
		$data = array(
			'available' => 'Tersedia',
		);
		$this->db->where('id_mobil', $id_mobil);
		$this->db->update('tbl_mobil', $data);

		$id_driver = $this->input->post('id_driver_rilis' . $id_permintaan);
		$data = array(
			'available' => 'Tersedia',
		);
		$this->db->where('id_driver', $id_driver);
		$this->db->update('tbl_driver', $data);

		$id_emoney = $this->input->post('id_emoney_rilis' . $id_permintaan);
		$data = array(
			'available' => 'Tersedia',
		);
		$this->db->where('id_emoney', $id_emoney);
		$this->db->update('tbl_emoney', $data);

		redirect('CTR_APenyelesaian');
	}

	function revisi()
	{
		$id_permintaan 		= $this->input->post('id_permintaan_rilis');
		$data = array(
			'keterangan' 	=> $this->input->post('keterangan' . $id_permintaan),
			'modifiedby' 	=> $this->session->userdata('npk'),
			'modifieddate' 	=> date('Y-m-d H:i:s'),
			'status' 		=> 'Revisi'
		);
		$this->db->where('id_permintaan', $id_permintaan);
		$this->db->update('tbl_permintaan', $data);
		redirect('CTR_APenyelesaian');
	}

	public function TambahBaris()
	{
		$data['judul'] = 'PT. SIGAP PRIMA ASTREA';
		$data['baris'] = $this->input->post('count');
		$this->load->view('Admin/TambahBaris', $data);
	}
}
