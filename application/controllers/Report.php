<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_report', 'report');
        user_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['report'] = $this->report->select_all();

        $data['judul'] = "Laporan Pengujian";
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_navbar');
        $this->load->view('template/v_sidebar');
        $this->load->view('report');
        $this->load->view('template/v_footer');
    }

    // public function kosongkan()
    // {
    //     $this->db->query("ALTER TABLE klasifikasi.detail_pengujian DROP CONSTRAINT detail_pengujian_ibfk_3");
    //     $this->db->query("TRUNCATE TABLE pengujian");
    //     $this->db->query("ALTER TABLE klasifikasi.detail_pengujian ADD CONSTRAINT detail_pengujian_ibfk_3 FOREIGN KEY(id_uji) REFERENCES klasifikasi.pengujian (id_uji)");
    //     $this->session->set_flashdata('message', 'truncate');
    //     redirect('report');
    // }
}
