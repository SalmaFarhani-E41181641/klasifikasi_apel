<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notfound extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /** Menampilkan Error 404 */
    public function index()
    {
        if ($this->session->userdata('email')) {
            $data['user'] = $this->db->get_where('user', [
                'email' =>
                $this->session->userdata('email')
            ])->row_array();
        }

        $data['judul'] = '404 Page Not Found';
        $this->load->view('user/header', $data);
        $this->load->view('user/notfound', $data);
    }
}
