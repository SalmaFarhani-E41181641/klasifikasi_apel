<?php
class Manage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_manage', 'manage');
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

        $data['judul'] = "Manajemen User";

        /** Ambil data peserta */
        $data['manage'] = $this->manage->user();

        $this->load->view("template/v_header", $data);
        $this->load->view("template/v_navbar", $data);
        $this->load->view("template/v_sidebar", $data);
        $this->load->view("manage", $data);
        $this->load->view("template/v_footer");
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $this->manage->hapus($id);
        $this->session->set_flashdata('message', 'hapusps');
        redirect('manage');
    }

    public function blok()
    {
        $id = $this->input->post('id');
        $this->manage->blok($id);
        $this->session->set_flashdata('message', 'Blok');
        redirect('manage');
    }

    public function unblok()
    {
        $id = $this->input->post('id');
        $this->manage->unblok($id);
        $this->session->set_flashdata('message', 'Unblok');
        redirect('manage');
    }
}
