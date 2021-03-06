<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // $this->load->model('M_auth');
    }

    /** Menampilkan Form Login */
    public function index()
    {


        if ($this->session->userdata('email')) {
            redirect('Home');
        }

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Kolom ini harus di isi',
            'valid_email' => 'Email tidak valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Kolom ini harus di isi',
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Member Login - Sikapel';
            $this->load->view("user/login", $data);
        } else {
            $this->login();
        }
    }

    private function login()
    {

        $email = htmlspecialchars(($this->input->post('email')));
        $password = htmlspecialchars(($this->input->post('password')));
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if ($user['status'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_usr' => $user['id_user'],
                        'email' => $user['email'],
                        'name' => $user['nama_user']
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('message', 'isLogin');
                    redirect('Home');
                } else {
                    $this->session->set_flashdata('message', 'email/pswwrong');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', 'emailnotactivate');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', 'emailnotreg');
            redirect('Auth');
        }
    }

    /**Fungsi Log out */
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id_usr');
        $this->session->unset_userdata('name');
        $this->session->set_flashdata('message', 'logout');
        redirect('Auth');
    }
}
