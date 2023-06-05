<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CTR_Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        // Form Validation untuk memvalidasi email dan password yang sesuai
        $this->form_validation->set_rules('npk', 'npk', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) { //jika salah jalankan yang ini
            $data['judul'] = 'PT. SIGAP PRIMA ASTREA';
            // $this->load->view('template/header');
            $this->load->view('Template/Login', $data);
        } else {
            // kalau validdasinya berhasil
            $this->_login(); //melakukan validasi login private
        }
    }

    private function _login()
    {
        $npk = $this->input->post('npk');
        $password = $this->input->post('password');

        //query ke database
        $user = $this->db->get_where('tbl_user', ['npk' => $npk])->row_array();
        //get_where merupakan fungsi dr ci yangdibaca Select * From user Where (,) 

        //jika usernya ada maka akan masuk
        if ($user) {
            //jika usernya aktif
            if ($user['status'] == "Aktif") {
                //cek password
                if ($password == $user['password']) {
                    $data = [
                        'npk' => $user['npk'],
                        'nama' => $user['nama'],
                        'role' => $user['role'],
                        'dept' => $user['dept'],
                    ];
                    $this->session->set_userdata($data);
                    //untuk melakukan login ke admin/user
                    if ($user['role'] == "Admin") {
                        redirect('CTR_Admin');
                    } else if ($user['role'] == "Staff") {
                        redirect('CTR_User');
                    } else if ($user['role'] == "Kadept") {
                        redirect('CTR_Atasan');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Anda Salah</div>');
                    redirect('CTR_Login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NPK Tidak Aktif ( Silahkan Hubungi Admin )</div>');
                redirect('CTR_Login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NPK Belum Terdaftar ( Silahkan Hubungi Admin )</div>');
            redirect('CTR_Login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('CTR_Login/index');
    }
}
