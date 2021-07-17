<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notfound extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        user_logged_in();
    }

    /** Menampilkan Error 404 */
    public function index()
    {
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['judul'] = '403 Forbidden Page';
        $this->load->view('forbidden', $data);
    }
}
