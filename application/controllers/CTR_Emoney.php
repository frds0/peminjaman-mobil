<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTR_Emoney extends CI_Controller 
{

	function __construct(){
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('MODEL_Emoney', 'data');

		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['judul'] = 'PT. SIGAP PRIMA ASTREA';
		$data['emoney'] = $this->data->GetAllData();
		$data['tbl_user'] = $this->db->get_where('tbl_user', ['npk' =>
		$this->session->userdata('npk')])->row_array();
		$this->load->view('Template/Header', $data);
		$this->load->view('Template/Sidebaradmin', $data);
		$this->load->view('Admin/Emoney', $data);
		$this->load->view('Template/Footer');
	}

	function InsertData()
	{
		
		$data = array(
				'nomor'			=> $this->input->post('nomor'),
				'namabank' 		=> $this->input->post('namabank'),
				'available'		=> 'Tersedia',
				'status' 		=> 'Aktif',
				'createdby' 	=> $this->session->userdata('npk'),
				'createddate' 	=> date('Y-m-d H:i:s')

			);
		$this->db->insert('tbl_emoney', $data);
		redirect ('CTR_Emoney/index');

	}

	function EditData()
	{

				$id_emoney = $this->input->post('id_emoney');
					$data = array (
							'nomor'			=> $this->input->post('edit_nomor'),
							'namabank' 		=> $this->input->post('edit_namabank'),
							'status' 		=> $this->input->post('edit_status'),
							'modifiedby'	=> $this->session->userdata('npk'),
							'modifieddate' 	=> date('Y-m-d H:i:s')
						);

				$this->db->where('id_emoney',$id_emoney);
				$this->db->update('tbl_emoney', $data);
				redirect ('CTR_Emoney/index');
	}


}
?>