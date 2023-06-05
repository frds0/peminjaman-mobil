<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTR_Pengguna extends CI_Controller 
{

	function __construct(){
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('MODEL_Pengguna', 'data');

		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['judul'] = 'PT. SIGAP PRIMA ASTREA';
		$data['pengguna'] = $this->data->GetAllData();
		$data['tbl_user'] = $this->db->get_where('tbl_user', ['npk' =>
		$this->session->userdata('npk')])->row_array();
		$this->load->view('Template/Header', $data);
		$this->load->view('Template/Sidebaradmin', $data);
		$this->load->view('Admin/Pengguna', $data);
		$this->load->view('Template/Footer');

	}

	function InsertData()
	{
		
		$data = array(
				'npk'			=> $this->input->post('npk'),
				'nama' 			=> $this->input->post('nama'),
				'dept' 			=> $this->input->post('dept'),
				'password' 		=> $this->input->post('password'),
				'status'	 	=> 'Aktif',
				'role' 			=> $this->input->post('role'),
				'createdby' 	=> $this->session->userdata('npk'),
				'createddate' 	=> date('Y-m-d H:i:s')

			);
		$this->db->insert('tbl_user', $data);
		redirect ('CTR_Pengguna/index');

	}

	function EditData()
	{

				$id_user = $this->input->post('id_user');
					$data = array (
							'npk'			=> $this->input->post('edit_npk'),
							'nama' 			=> $this->input->post('edit_nama'),
							'dept' 			=> $this->input->post('edit_dept'),
							'password' 		=> $this->input->post('edit_password'),
							'status' 		=> $this->input->post('edit_status'),
							'role' 			=> $this->input->post('edit_role'),
							'modifiedby'	=> $this->session->userdata('npk'),
							'modifieddate' 	=> date('Y-m-d H:i:s')
						);

				$this->db->where('id_user',$id_user);
				$this->db->update('tbl_user', $data);
				redirect ('CTR_Pengguna/index');
	}


}
?>