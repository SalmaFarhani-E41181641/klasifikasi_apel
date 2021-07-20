<?php
class Manage extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_manage', 'manage');
        $this->load->model('M_user', 'user');
        user_logged_in();
        cekuser();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['judul'] = "Manajemen User";
        $data['sidebar'] = "manage";

        $data['manage'] = $this->manage->user();
        
        $tabel = $this->manage->idusr()->num_rows();
        
        $getID = $this->manage->idusr()->row_array();
        
        if ($tabel > 0) :
            $id_usr = autonumber($getID['id_user'], 3, 4);
        else :
            $id_usr = 'USR0000';
        endif;
        
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Kolom ini harus diisi'
        ]);
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Kolom ini harus diisi',
            'valid_email' => 'Email tidak valid',
            'is_unique' => 'Email ini sudah terdaftar'
        ]);
        
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]', [
            'required' => 'Kolom ini harus diisi',
            'min_length' => 'Password terlalu pendek'
        ]);
        
        if ($this->form_validation->run() == FALSE) {
        $this->load->view("template/v_header", $data);
        $this->load->view("template/v_navbar", $data);
        $this->load->view("template/v_sidebar", $data);
        $this->load->view("manage", $data);
        $this->load->view("template/v_footer");
        } else {  
        /** Proses insert ke database */
        $name = htmlspecialchars($this->input->post('nama', true));
        $email = htmlspecialchars($this->input->post('email', true));
        $password = htmlspecialchars(password_hash($this->input->post('password', true), PASSWORD_DEFAULT));
        
        $register = [
            'id_user' => $id_usr,
            'nama_user' => $name,
            'deskripsi' => '-',
            'email' => $email,
            'password' => $password,
            'foto_user' => 'default.jpg',
            'status' => 1,
            'tanggal' => time()
        ];
        $this->manage->reguser($register);

        $this->session->set_flashdata('message', 'isReg');
        redirect('manage');
    }
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

    public function aktif()
    {
        $id = $this->input->post('id');
        $this->manage->aktif($id);
        $this->session->set_flashdata('message', 'Aktif');
        redirect('manage');
    }
}
