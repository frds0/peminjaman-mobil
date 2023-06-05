<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CTR_Permintaan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url', 'form');
		$this->load->model('MODEL_Permintaan', 'data');
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['judul'] = 'PT. SIGAP PRIMA ASTREA';
		$data['tbl_user'] = $this->db->get_where('tbl_user', ['npk' =>
		$this->session->userdata('npk')])->row_array();

		$npk = $this->session->userdata('npk');
		$data['permintaan'] = $this->data->GetAllData($npk);

		$this->load->view('Template/Header', $data);
		$this->load->view('Template/Sidebar', $data);
		$this->load->view('User/Permintaan', $data);
		$this->load->view('Template/Footer');
	}

	function InsertData()
	{

		$berangkat = $this->input->post('berangkat') . " " . $this->input->post('jmberangkat');
		$kembali = $this->input->post('kembali') . " " . $this->input->post('jmkembali');
		$data = array(

			'dept' 			=> $this->session->userdata('dept'),
			'tujuan' 		=> $this->input->post('tujuan'),
			'keperluan' 	=> $this->input->post('keperluan'),
			'berangkat' 	=> $berangkat,
			'jmberangkat' 	=> $this->input->post('jmberangkat'),
			'kembali' 		=> $kembali,
			'jmkembali' 	=> $this->input->post('jmkembali'),
			'kendaraan' 	=> $this->input->post('kendaraan'),
			'driver' 		=> $this->input->post('driver'),
			'npk' 			=> $this->session->userdata('npk'),
			'status' 		=> 'Dalam Pengajuan',
			'createdby' 	=> $this->session->userdata('npk'),
			'createddate' 	=> date('Y-m-d H:i:s')

		);
		$this->db->insert('tbl_permintaan', $data);
		redirect('CTR_permintaan/index');
	}

	function EditData()
	{
		$id_permintaan = $this->input->post('id_permintaan');
		$alasan_edit = $this->input->post('alasan_edit' . $id_permintaan);

		if ($alasan_edit == '') {
			$data = array(
				'tujuan' 		=> $this->input->post('tujuan_edit' . $id_permintaan),
				'keperluan' 	=> $this->input->post('keperluan_edit' . $id_permintaan),
				'berangkat' 	=> $this->input->post('berangkat_edit' . $id_permintaan) . " " . $this->input->post('jmberangkat_edit' . $id_permintaan),
				'jmberangkat' 	=> $this->input->post('jmberangkat_edit' . $id_permintaan),
				'kembali' 		=> $this->input->post('kembali_edit' . $id_permintaan) . " " . $this->input->post('jmkembali_edit' . $id_permintaan),
				'jmkembali' 	=> $this->input->post('jmkembali_edit' . $id_permintaan),
				'driver' 		=> $this->input->post('driver_edit' . $id_permintaan),
				'kendaraan' 	=> $this->input->post('kendaraan_edit' . $id_permintaan),
				'mobil' 		=> $this->input->post('editfollowmobil' . $id_permintaan),
				'km_berangkat' 	=> $this->input->post('editkm_berangkat' . $id_permintaan),
				'npk' 			=> $this->session->userdata('npk'),
				'status' 		=> 'Dalam Pengajuan',
				'modifiedby' 	=> $this->session->userdata('npk'),
				'modifieddate' 	=> date('Y-m-d H:i:s')
			);
		} else {
			$data = array(
				'tujuan' 		=> $this->input->post('tujuan_edit' . $id_permintaan),
				'keperluan' 	=> $this->input->post('keperluan_edit' . $id_permintaan),
				'berangkat' 	=> $this->input->post('berangkat_edit' . $id_permintaan) . " " . $this->input->post('jmberangkat_edit' . $id_permintaan),
				'jmberangkat' 	=> $this->input->post('jmberangkat_edit' . $id_permintaan),
				'kembali' 		=> $this->input->post('kembali_edit' . $id_permintaan) . " " . $this->input->post('jmkembali_edit' . $id_permintaan),
				'jmkembali' 	=> $this->input->post('jmkembali_edit' . $id_permintaan),
				'driver' 		=> $this->input->post('driver_edit' . $id_permintaan),
				'kendaraan' 	=> $this->input->post('kendaraan_edit' . $id_permintaan),
				'mobil' 		=> $this->input->post('editfollowmobil' . $id_permintaan),
				'km_berangkat' 	=> $this->input->post('editkm_berangkat' . $id_permintaan),
				'approved_tidaksetuju' => NULL,
				'npk' 			=> $this->session->userdata('npk'),
				'status' 		=> 'Dalam Pengajuan',
				'modifiedby' 	=> $this->session->userdata('npk'),
				'modifieddate' 	=> date('Y-m-d H:i:s')
			);
		}



		$this->db->where('id_permintaan', $id_permintaan);
		$this->db->update('tbl_permintaan', $data);
		redirect('CTR_permintaan/index');
	}

	function start()
	{
		$id_permintaan = $this->input->post('id_permintaan');
		$data = array(
			'alasan_assignmobil' 	=> $this->input->post('edit_assignmobil' . $id_permintaan),
			'modifiedby' 	=> $this->session->userdata('npk'),
			'modifieddate' 	=> date('Y-m-d H:i:s'),
			'status' 		=> 'Dalam Perjalanan'
		);
		$this->db->where('id_permintaan', $id_permintaan);
		$this->db->update('tbl_permintaan', $data);
		redirect('CTR_permintaan');
	}
}
