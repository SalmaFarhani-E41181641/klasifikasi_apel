<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_report', 'report');
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
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

    public function kosongkan()
    {
        $this->db->query("TRUNCATE sicerdas.pengujian");
        $this->session->set_flashdata('message', 'truncate');
        redirect('report');
    }
}
