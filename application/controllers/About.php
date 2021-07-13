<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    /** Menampilkan Form Login */
    public function index()
    {
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['judul'] = "Tentang SVM";
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_navbar');
        $this->load->view('template/v_sidebar');
        $this->load->view('about');
        $this->load->view('template/v_footer');
    }
}
