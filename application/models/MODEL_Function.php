<?php
class MODEL_Function extends CI_Model
{

    function Rupiah($angka)
    {
        $hasil_rupiah = "Rp." . number_format($angka, 0, ",", ".");;
        return $hasil_rupiah;
    }

    public function hitungJumlahMobil()
    {
        $query = $this->db->get('tbl_mobil');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function hitungMobilTersedia()
    {
        $query = $this->db->query('SELECT * FROM tbl_mobil WHERE available= "Tersedia" AND status = "Aktif"');
        $tersedia = $query->num_rows();
        return $tersedia;
    }

    function hitungUserAktif()
    {
        $query = $this->db->query('SELECT * FROM tbl_user WHERE status= "Aktif"');
        $status = $query->num_rows();
        return $status;
    }

    function hitungMobilDipesan()
    {
        $query = $this->db->query('SELECT * FROM tbl_mobil WHERE available= "Di Pesan"');
        $DiPesan = $query->num_rows();
        return $DiPesan;
    }

    function hitungMobilNonaktif()
    {
        $query = $this->db->query('SELECT * FROM tbl_mobil WHERE status= "Non Aktif"');
        $Nonaktif = $query->num_rows();
        return $Nonaktif;
    }

    function hitungUserRekapPermintaan()
    {
        $query = $this->db->query('SELECT tu.dept AS dept_show, COUNT(*) AS count_permintaan FROM tbl_permintaan AS tp JOIN tbl_user AS tu ON tp.npk = tu.npk WHERE tp.status = "Done" GROUP BY tu.dept;');

        return $query->result();
    }

    function hitungJumlahDriver()
    {
        $query = $this->db->get('tbl_driver');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function hitungDriverTersedia()
    {
        $query = $this->db->query('SELECT * FROM tbl_driver WHERE available= "Tersedia" AND status = "Aktif"');
        $tersedia = $query->num_rows();
        return $tersedia;
    }

    function hitungDriverDipesan()
    {
        $query = $this->db->query('SELECT * FROM tbl_driver WHERE available= "Di Pesan"');
        $DiPesan = $query->num_rows();
        return $DiPesan;
    }

    function hitungDriverNonaktif()
    {
        $query = $this->db->query('SELECT * FROM tbl_driver WHERE status= "Non Aktif"');
        $Nonaktif = $query->num_rows();
        return $Nonaktif;
    }
}
