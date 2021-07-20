<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klasifikasi extends CI_Controller
{
    protected $alpha;
    protected $b;
    protected $D;
    protected $data;
    protected $kernel;
    protected $kernelResults;
    protected $kernelType;
    protected $labels;
    protected $N;
    protected $usew_;
    protected $w;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user', 'm_user');
        $this->load->helper('number_helper');
    }

    public function index()
    {
        $data['judul'] = "Klasifikasi SVM (Data Tunggal)";
        $data['jumlah_training'] = $this->m_user->jmltraining();
        $data['jumlah_testing'] = $this->m_user->jmltesting();
        $data['jumlah_kelas'] = $this->m_user->jmlkelas();
        $data['jumlah_uji'] = $this->m_user->jmluji();

        $this->load->view('user/header', $data);
        $this->load->view('user/navbar');
        $this->load->view('user/klasifikasi', $data);
        $this->load->view('user/footer');
    }

    public function kelompok()
    {
        $data['judul'] = "Klasifikasi SVM (Data Kelompok)";
        $data['jumlah_training'] = $this->m_user->jmltraining();
        $data['jumlah_testing'] = $this->m_user->jmltesting();
        $data['jumlah_kelas'] = $this->m_user->jmlkelas();
        $data['jumlah_uji'] = $this->m_user->jmluji();
        $this->load->view('user/header', $data);
        $this->load->view('user/navbar');
        $this->load->view('user/kelompok', $data);
        $this->load->view('user/footer');
    }

    public function hasilkelompok()
    {
        $data['judul'] = "Hasil Klasifikasi (Data Kelompok)";
        $data['jumlah_training'] = $this->m_user->jmltraining();
        $data['jumlah_testing'] = $this->m_user->jmltesting();
        $data['jumlah_kelas'] = $this->m_user->jmlkelas();
        $data['jumlah_uji'] = $this->m_user->jmluji();
        $this->load->view('user/header', $data);
        $this->load->view('user/navbar');
        $this->load->view('user/hasilkelompok', $data);
        $this->load->view('user/footer');
    }

    public function dataset()
    {
        force_download('assets/dist/dataset/Testing.xlsx',NULL);
    }

    public function batch()
    {
        // var_dump($_FILES);die;
        $this->form_validation->set_rules('excel', 'Excel', 'trim|required');

        if ($_FILES['excel']['name'] == '') {
            $this->session->set_flashdata('message', 'kosong');
            redirect('Klasifikasi/kelompok');
        } else {
            $config['upload_path'] = './assets/excel/';
            $config['allowed_types'] = 'xls|xlsx';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('excel')) {
                // $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', 'gagal_upload');
                redirect('Klasifikasi/kelompok');
            } else {
                $data = $this->upload->data();

                error_reporting(E_ALL);
                date_default_timezone_set('Asia/Jakarta');

                require 'vendor/autoload.php';

                include './assets/plugins/phpoffice/phpspreadsheet/src/PhpSpreadsheet/IOFactory.php';

                $inputFileName = './assets/excel/' . $data['file_name'];
                // $objPHPExcel = PHPExcel_IOFactory::load($inputFileName);

                $spreadsheet = \PhpOffice\Phpspreadsheet\IOFactory::load($inputFileName);
                $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                $index = 0;
                foreach ($sheetData as $key => $value) {
                    $id = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 1, 6);
                    if ($key != 1) {
                        // $id = md5(DATE('ymdhms') . rand());
                        // $check = $this->m_testing->check_nama($value['C']);

                        // if ($check != 1) {
                        // $resultData[$index]['Id'] = $value['A'];
                        $resultData[$index]['id_testing'] = $id;
                        $resultData[$index]['Kelas_Apel'] = ucwords($value['B']);
                        $resultData[$index]['Mean_H'] = $value['C'];
                        $resultData[$index]['Mean_S'] = $value['D'];
                        $resultData[$index]['Mean_I'] = $value['E'];
                        $resultData[$index]['Skewness_H'] = $value['F'];
                        $resultData[$index]['Skewness_S'] = $value['G'];
                        $resultData[$index]['Skewness_I'] = $value['H'];
                        $resultData[$index]['Kurtosis_H'] = $value['I'];
                        $resultData[$index]['Kurtosis_S'] = $value['J'];
                        $resultData[$index]['Kurtosis_I'] = $value['K'];
                        // }
                    }
                    $index++;
                }

                unlink('./assets/excel/' . $data['file_name']);

                if (count($resultData) != 0) {
                    $result = $this->m_testing->insert_batch($resultData);
                    if ($result > 0) {
                        $this->session->set_flashdata('message', 'save');
                        redirect('Klasifikasi/hasilkelompok');
                    }
                } else {
                    $this->session->set_flashdata('message', 'duplikasi');
                    redirect('Klasifikasi/kelompok');
                }
            }
        }
    }

}
