<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guide extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        user_logged_in();
    }

    /** Menampilkan Form Login */
    public function index()
    {
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['judul'] = "Panduan";
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_navbar');
        $this->load->view('template/v_sidebar', $data);
        $this->load->view('guide');
        $this->load->view('template/v_footer');
    }

    public function dataset()
    {
        force_download('assets/dist/dataset/Testing.xlsx',NULL);
    }
}
