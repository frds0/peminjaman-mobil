<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTR_Mobil extends CI_Controller 
{

	function __construct(){
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('MODEL_Mobil', 'data');

		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['judul'] = 'PT. SIGAP PRIMA ASTREA';
		$data['tbl_user'] = $this->db->get_where('tbl_user', ['npk' =>
		$this->session->userdata('npk')])->row_array();

		
		$data['mobil'] = $this->data->GetAllData();
		$this->load->view('Template/Header', $data);
		$this->load->view('Template/Sidebaradmin', $data);
		$this->load->view('Admin/Mobil', $data);
		$this->load->view('Template/Footer');

	}

	function InsertData()
	{
		$data = array(
				'nopolisi'			=> $this->input->post('nopolisi'),
				'merk' 				=> $this->input->post('merk'),
				'warna' 			=> $this->input->post('warna'),
				'tahunpembelian' 	=> $this->input->post('tahunpembelian'),
				'available'			=> 'Tersedia',
				'status' 			=> 'Aktif',
				'createdby' 		=> $this->session->userdata('npk'),
				'createddate' 		=> date('Y-m-d H:i:s')

			);
		$this->db->insert('tbl_mobil', $data);
		redirect ('CTR_Mobil/index');

	}

	function EditData()
	{
				$id_mobil = $this->input->post('id_mobil');
					$data = array (
							'nopolisi'		=> $this->input->post('edit_nopolisi'),
							'merk' 			=> $this->input->post('edit_merk'),
							'warna'			=> $this->input->post('edit_warna'),
							'tahunpembelian'=> $this->input->post('edit_tahunpembelian'),
							'status' 		=> $this->input->post('edit_status'),
							'modifiedby' 	=> $this->session->userdata('npk'),
							'modifieddate' 	=> date('Y-m-d H:i:s')
						);

				$this->db->where('id_mobil',$id_mobil);
				$this->db->update('tbl_mobil', $data);
				redirect ('CTR_Mobil/index');
	}

}
