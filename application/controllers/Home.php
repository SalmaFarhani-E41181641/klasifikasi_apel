<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'm_user');
        user_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['jumlah_training'] = $this->m_user->jmltraining();
        $data['jumlah_testing'] = $this->m_user->jmltesting();
        $data['jumlah_kelas'] = $this->m_user->jmlkelas();
        $data['detail'] = $this->m_user->detailkelas();
        $data['jumlah_uji'] = $this->m_user->jmluji();

        $data['judul'] = "Dashboard";
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_navbar');
        $this->load->view('template/v_sidebar', $data);
        $this->load->view('home', $data);
        $this->load->view('template/v_footer');
    }
}
