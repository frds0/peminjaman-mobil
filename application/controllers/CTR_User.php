<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CTR_User extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->library('upload');
		$this->load->model('MODEL_Function', 'function');

		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['judul'] = 'PT. SIGAP PRIMA ASTREA';
		$data['tbl_user'] = $this->db->get_where('tbl_user', ['npk' =>
		$this->session->userdata('npk')])->row_array();
		$data['total_mobil'] = $this->function->hitungJumlahMobil();
		$data['mobiltersedia'] = $this->function->hitungMobilTersedia();
		$data['mobildipesan'] = $this->function->hitungMobilDipesan();
		$data['mobilnonaktif'] = $this->function->hitungMobilNonaktif();

		$data['total_driver'] = $this->function->hitungJumlahDriver();
		$data['drivertersedia'] = $this->function->hitungDriverTersedia();
		$data['driverdipesan'] = $this->function->hitungDriverDipesan();
		$data['drivernonaktif'] = $this->function->hitungDriverNonaktif();

		$data['useraktif'] = $this->function->hitungUserAktif();
		$data['rekapPermintaan'] = $this->function->hitungUserRekapPermintaan();
		$this->load->view('Template/Header', $data);
		$this->load->view('Template/Sidebar', $data);
		$this->load->view('User/index', $data);
		$this->load->view('Template/Footer');
	}
}
