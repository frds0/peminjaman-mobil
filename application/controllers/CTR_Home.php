<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTR_Home extends CI_Controller 
{

	public function index()
	{	
		$data['tbl_user'] = $this->db->get_where('tbl_user', ['npk' =>
		$this->session->userdata('npk')])->row_array();
		$this->load->view('Template/Header');
		$this->load->view('Template/Sidebar');
		$this->load->view('Template/Home');
		$this->load->view('Template/Footer');
	}

	public function pelaksanaan()
	{	
		$this->load->view('Template/Header');
		$this->load->view('Template/Sidebar');
		$this->load->view('Admin/Pelaksanaan');
		$this->load->view('Template/Footer');
	}

	public function wawancara()
	{	
		$this->load->view('Template/Header');
		$this->load->view('Template/Sidebar');
		$this->load->view('Admin/Wawancara');
		$this->load->view('Template/Footer');
	}

	public function survey()
	{	
		$this->load->view('Template/Header');
		$this->load->view('Template/Sidebar');
		$this->load->view('Admin/Survey');
		$this->load->view('Template/Footer');
	}
}
?>