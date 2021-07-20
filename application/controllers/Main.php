<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['judul'] = "SIKAPEL";
        $this->load->view('user/header', $data);
        $this->load->view('user/navbar');
        $this->load->view('user/main');
        $this->load->view('user/footer');
    }
}
