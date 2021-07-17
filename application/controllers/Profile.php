<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'm_user');
        user_logged_in();
    }

    public function index()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->m_user->user($email);

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'kolom ini harus diisi',
        ]);

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim');

        $data['judul'] = "Profile";
        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_navbar');
            $this->load->view('template/v_sidebar');
            $this->load->view('profile');
            $this->load->view('template/v_footer');
        } else {
            $nama = htmlspecialchars($this->input->post('nama'));
            $desc = htmlspecialchars($this->input->post('deskripsi'));

            /** Proses Edit Gambar */
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/dist/img/user/';

                $this->upload->initialize($config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['foto_user'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/dist/img/user/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto_user', $new_image);
                } else {
                    $this->session->set_flashdata('message', 'gagal_upload');
                    redirect('profile');
                }
            }

            $edit = [
                'nama_user' => $nama,
                'deskripsi' => $desc,
                'update_user' => time(),
            ];
            $get = $this->db->get_where('user', ['email' => $email])->row();
            unlink(FCPATH . 'assets/dist/img/user' . $get->FTO_ADM);
            $this->db->set($edit);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('message', 'Ubah Profil');
            redirect('profile');
        }
    }

    public function editpsw()
    {
        $email = $this->session->userdata('email');
        $data['judul'] = "Profil Saya";
        /** Ambil data admin */
        $data['user'] = $this->m_user->user($email);

        $this->form_validation->set_rules('pswlma', 'Lma', 'trim|required|min_length[8]', [
            'required' => 'kolom ini harus diisi',
            'min_length' => 'Password minimal berjumlah 8 karakter'
        ]);

        $this->form_validation->set_rules('pswbru', 'bru', 'trim|required|matches[pswbru1]|min_length[8]', [
            'required' => 'kolom ini harus diisi',
            'min_length' => 'Password minimal berjumlah 8 karakter',
            'matches' => ''
        ]);

        $this->form_validation->set_rules('pswbru1', 'bru1', 'trim|required|matches[pswbru]|min_length[8]', [
            'required' => 'kolom ini harus diisi',
            'min_length' => 'Password minimal berjumlah 8 karakter',
            'matches' => 'konfirmasi password tidak sesuai'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_navbar', $data);
            $this->load->view('template/v_sidebar', $data);
            $this->load->view('profile', $data);
            $this->load->view('template/v_footer');
        } else {
            $pswlma = $this->input->post(htmlspecialchars('pswlma'));
            $pswbru1 = $this->input->post(htmlspecialchars('pswbru1'));

            if (!password_verify($pswlma, $data['user']['password'])) {
                $this->session->set_flashdata('message', 'Pswslh');
                redirect('profile');
            } else {
                if ($pswlma == $pswbru1) {
                    $this->session->set_flashdata('message', 'Pswbaru=Pswlama');
                    redirect('profile');
                } else {
                    $pswhash = password_hash($pswbru1, PASSWORD_DEFAULT);
                    $this->m_user->ubhpsw($pswhash, $email);
                    $this->session->set_flashdata('message', 'Password');
                    redirect('profile');
                }
            }
        }
    }
}
