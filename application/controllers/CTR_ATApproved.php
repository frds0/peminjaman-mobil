<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CTR_ATApproved extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('MODEL_ATApproved', 'data');;

		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['judul'] = 'PT. SIGAP PRIMA ASTREA';
		$data['tbl_user'] = $this->db->get_where('tbl_user', ['npk' =>
		$this->session->userdata('npk')])->row_array();

		$dept = $this->session->userdata('dept');
		$data['permintaan'] = $this->data->GetAllData($dept);

		$data['datamobil'] = $this->data->getdata();
		$data['datadriver'] = $this->data->getdatadriver();
		$data['dataemoney'] = $this->data->getdataemoney();
		$this->load->view('Template/Header', $data);
		$this->load->view('Template/Sidebaratasan', $data);
		$this->load->view('Atasan/Approved', $data);
		$this->load->view('Template/Footer');
	}

	function EditData()
	{
		$id_permintaan = $this->input->post('id_permintaan');
		if ($this->input->post('editfollowmobil' . $id_permintaan) == 1) {

			$data = array(
				'mobil' 		=> $this->input->post('editfollowmobil' . $id_permintaan),
				'namadriver' 	=> NULL,
				'kodevoucher'   => $this->input->post('editkodevoucher' . $id_permintaan),
				'km_berangkat' 	=> NULL,
				'emoney'		=> NULL,
				'saldo_awal_emoney' 	=> NULL,
				'status' 		=> 'Approved by Kadept',
				'approvedby' 	=> $this->session->userdata('npk'),
				'approveddate' 	=> date('Y-m-d H:i:s')
			);
			$this->db->where('id_permintaan', $id_permintaan);
			$this->db->update('tbl_permintaan', $data);
		} else {
			$data = array(

				'mobil' 		=> $this->input->post('editfollowmobil' . $id_permintaan),
				'namadriver' 	=> $this->input->post('editfollowdriver' . $id_permintaan),
				'km_berangkat' 	=> $this->input->post('editkm_berangkat' . $id_permintaan),
				'emoney' 		=> $this->input->post('editemoney' . $id_permintaan),
				'saldo_awal_emoney' 	=> $this->input->post('editsaldoawal' . $id_permintaan),
				'status' 		=> 'Approved by Kadept',
				'approvedby' 	=> $this->session->userdata('npk'),
				'approveddate' 	=> date('Y-m-d H:i:s')
			);
			$this->db->where('id_permintaan', $id_permintaan);
			$this->db->update('tbl_permintaan', $data);

			$id_mobil = $this->input->post('editfollowmobil' . $id_permintaan);
			$data = array(
				'available' => 'Di Pesan',
			);
			$this->db->where('id_mobil', $id_mobil);
			$this->db->update('tbl_mobil', $data);

			$id_driver = $this->input->post('editfollowdriver' . $id_permintaan);
			$data = array(
				'available' => 'Di Pesan',
			);
			$this->db->where('id_driver', $id_driver);
			$this->db->update('tbl_driver', $data);
		}

		redirect('CTR_ATApproved');
	}

	function revisi()
	{
		$id_permintaan = $this->input->post('id_permintaan');
		$data = array(
			'approved_tidaksetuju' 	=> $this->input->post('approved_tidaksetuju' . $id_permintaan),
			'modifiedby' 	=> $this->session->userdata('npk'),
			'modifieddate' 	=> date('Y-m-d H:i:s'),
			'status' 		=> 'Tidak Disetujui oleh Kadept'
		);
		$this->db->where('id_permintaan', $id_permintaan);
		$this->db->update('tbl_permintaan', $data);
		redirect('CTR_ATApproved');
	}
};
