<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CTR_ATPermintaan extends CI_Controller 
{

	function __construct(){
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->model('MODEL_ATPermintaan', 'data');
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
		$this->load->view('Template/Sidebaratasan', $data);
		$this->load->view('Atasan/Permintaan', $data);
		$this->load->view('Template/Footer');

	}

	function InsertData()
	{
		
		$berangkat= $this->input->post('berangkat')." ".$this->input->post('jmberangkat');
		$kembali= $this->input->post('kembali')." ".$this->input->post('jmkembali');
		$data = array(
				// 'npk'	=> $this->input->post('npk'),
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
		redirect ('CTR_ATpermintaan/index');

	}

	function EditData()
	{
		$id_permintaan = $this->input->post('id_permintaan');
					$data = array (
							
							'tujuan' 		=> $this->input->post('tujuan_edit'.$id_permintaan),
							'keperluan' 	=> $this->input->post('keperluan_edit'.$id_permintaan),
							'berangkat' 	=> $this->input->post('berangkat_edit'.$id_permintaan)." ".$this->input->post('jmberangkat_edit'.$id_permintaan),
							'jmberangkat' 	=> $this->input->post('jmberangkat_edit'.$id_permintaan),
							'kembali' 		=> $this->input->post('kembali_edit'.$id_permintaan)." ".$this->input->post('jmkembali_edit'.$id_permintaan),
							'jmkembali' 	=> $this->input->post('jmkembali_edit'.$id_permintaan),
							'driver' 		=> $this->input->post('driver_edit'.$id_permintaan),
							'kendaraan' 	=> $this->input->post('kendaraan_edit'.$id_permintaan),
							'mobil' 		=> $this->input->post('editfollowmobil'.$id_permintaan),
							'km_berangkat' 	=> $this->input->post('editkm_berangkat'.$id_permintaan),
							'npk' 			=> $this->session->userdata('npk'),
							'status' 		=> 'Dalam Pengajuan',
							'modifiedby' 	=> $this->session->userdata('npk'),
							'modifieddate' 	=> date('Y-m-d H:i:s')
						);

				$this->db->where('id_permintaan',$id_permintaan);
				$this->db->update('tbl_permintaan', $data);
				redirect ('CTR_ATpermintaan/index');
	}
}
?>