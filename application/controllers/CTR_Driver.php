<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTR_Driver extends CI_Controller 
{

	function __construct(){
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('MODEL_Driver', 'data');

		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['judul'] = 'PT. SIGAP PRIMA ASTREA';
		$data['driver'] = $this->data->GetAllData();
		$data['tbl_user'] = $this->db->get_where('tbl_user', ['npk' =>
		$this->session->userdata('npk')])->row_array();
		//$data['driver'] = $this->data->datar($config['per_page'],$from);
		$this->load->view('Template/Header', $data);
		$this->load->view('Template/Sidebaradmin', $data);
		$this->load->view('Admin/Driver', $data);
		$this->load->view('Template/Footer');

	}

	function InsertData()
	{
		
		$data = array(
				'npk'			=> $this->input->post('npk'),
				'nama' 			=> $this->input->post('nama'),
				'available'		=> 'Tersedia',
				'status' 		=> 'Aktif',
				'createdby' 	=> $this->session->userdata('npk'),
				'createddate' 	=> date('Y-m-d H:i:s')

			);
		$this->db->insert('tbl_driver', $data);
		redirect ('CTR_Driver/index');

	}

	function EditData()
	{

				$id_driver = $this->input->post('id_driver');
					$data = array (
							'npk'			=> $this->input->post('edit_npk'),
							'nama' 			=> $this->input->post('edit_nama'),
							'status' 		=> $this->input->post('edit_status'),
							'modifiedby'	=> $this->session->userdata('npk'),
							'modifieddate' 	=> date('Y-m-d H:i:s')
						);

				$this->db->where('id_driver',$id_driver);
				$this->db->update('tbl_driver', $data);
				redirect ('CTR_driver/index');
	}


}
?>