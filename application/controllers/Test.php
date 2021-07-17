<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_testing', 'm_testing');
        user_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['testing'] = $this->m_testing->select_all();

        $data['judul'] = "Data Uji Kelompok";
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_navbar');
        $this->load->view('template/v_sidebar');
        $this->load->view('test', $data);
        $this->load->view('template/v_footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('mean_h', 'Mean_h', 'required');
        $this->form_validation->set_rules('mean_s', 'Mean_s', 'required');
        $this->form_validation->set_rules('mean_i', 'Mean_i', 'required');
        $this->form_validation->set_rules('skewness_h', 'skewness_h', 'required');
        $this->form_validation->set_rules('skewness_s', 'skewness_s', 'required');
        $this->form_validation->set_rules('skewness_i', 'skewness_i', 'required');
        $this->form_validation->set_rules('kurtosis_h', 'kurtosis_h', 'required');
        $this->form_validation->set_rules('kurtosis_s', 'kurtosis_s', 'required');
        $this->form_validation->set_rules('kurtosis_i', 'kurtosis_i', 'required');

        if ($this->form_validation->run() == false) {
            redirect('testing');
        } else {
            $kelas = htmlspecialchars($this->input->post('kelas', TRUE), ENT_QUOTES);
            $mean_h = htmlspecialchars($this->input->post('mean_h', TRUE), ENT_QUOTES);
            $mean_s = htmlspecialchars($this->input->post('mean_s', TRUE), ENT_QUOTES);
            $mean_i = htmlspecialchars($this->input->post('mean_i', TRUE), ENT_QUOTES);
            $skewness_h = htmlspecialchars($this->input->post('skewness_h', TRUE), ENT_QUOTES);
            $skewness_s = htmlspecialchars($this->input->post('skewness_s', TRUE), ENT_QUOTES);
            $skewness_i = htmlspecialchars($this->input->post('skewness_i', TRUE), ENT_QUOTES);
            $kurtosis_h = htmlspecialchars($this->input->post('kurtosis_h', TRUE), ENT_QUOTES);
            $kurtosis_s = htmlspecialchars($this->input->post('kurtosis_s', TRUE), ENT_QUOTES);
            $kurtosis_i = htmlspecialchars($this->input->post('kurtosis_i', TRUE), ENT_QUOTES);
            // $isi = $this->input->post('isi');

            $this->m_testing->insert($kelas, $mean_h, $mean_s, $mean_i, $skewness_h, $skewness_s, $skewness_i, $kurtosis_h, $kurtosis_s, $kurtosis_i);
            $this->session->set_flashdata('message', 'save');
            redirect('testing');
        }
    }

    function update()
    {
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('mean_h', 'Mean_h', 'required');
        $this->form_validation->set_rules('mean_s', 'Mean_s', 'required');
        $this->form_validation->set_rules('mean_i', 'Mean_i', 'required');
        $this->form_validation->set_rules('skewness_h', 'skewness_h', 'required');
        $this->form_validation->set_rules('skewness_s', 'skewness_s', 'required');
        $this->form_validation->set_rules('skewness_i', 'skewness_i', 'required');
        $this->form_validation->set_rules('kurtosis_h', 'kurtosis_h', 'required');
        $this->form_validation->set_rules('kurtosis_s', 'kurtosis_s', 'required');
        $this->form_validation->set_rules('kurtosis_i', 'kurtosis_i', 'required');

        if ($this->form_validation->run() == false) {
            redirect('testing');
        } else {
            $id = htmlspecialchars($this->input->post('id_kb'));
            $kelas = htmlspecialchars($this->input->post('kelas', TRUE), ENT_QUOTES);
            $mean_h = htmlspecialchars($this->input->post('mean_h', TRUE), ENT_QUOTES);
            $mean_s = htmlspecialchars($this->input->post('mean_s', TRUE), ENT_QUOTES);
            $mean_i = htmlspecialchars($this->input->post('mean_i', TRUE), ENT_QUOTES);
            $skewness_h = htmlspecialchars($this->input->post('skewness_h', TRUE), ENT_QUOTES);
            $skewness_s = htmlspecialchars($this->input->post('skewness_s', TRUE), ENT_QUOTES);
            $skewness_i = htmlspecialchars($this->input->post('skewness_i', TRUE), ENT_QUOTES);
            $kurtosis_h = htmlspecialchars($this->input->post('kurtosis_h', TRUE), ENT_QUOTES);
            $kurtosis_s = htmlspecialchars($this->input->post('kurtosis_s', TRUE), ENT_QUOTES);
            $kurtosis_i = htmlspecialchars($this->input->post('kurtosis_i', TRUE), ENT_QUOTES);
            $this->m_testing->update($id, $kelas, $mean_h, $mean_s, $mean_i, $skewness_h, $skewness_s, $skewness_i, $kurtosis_h, $kurtosis_s, $kurtosis_i);
            // $this->kebijakan_model->update($id, $name, $link, $isi);
            $this->session->set_flashdata('message', 'edit');
            redirect('testing');
        }
    }

    function delete()
    {
        $id = $this->input->post('id_delete', TRUE);
        $this->m_testing->delete($id);
        $this->session->set_flashdata('message', 'hapus');
        redirect('testing');
    }

    public function export()
    {
        error_reporting(E_ALL);
        require 'vendor/autoload.php';
        // include_once './assets/plugins/PhpSpreadsheet/Writer/Xlsx.php';
        // include_once './assets/plugins/PhpSpreadsheet/Spreadsheet.php';
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $data = $this->m_testing->select_all();
        $check = $this->db->get('data_training');
        if ($check->num_rows() != 0) {
            $sheet = $spreadsheet->getActiveSheet();

            $rowCount = 1;
            $sheet->setCellValue('A' . $rowCount, "id_testing");
            $sheet->setCellValue('B' . $rowCount, "Kelas_Apel");
            $sheet->setCellValue('C' . $rowCount, "Mean_H");
            $sheet->setCellValue('D' . $rowCount, "Mean_S");
            $sheet->setCellValue('E' . $rowCount, "Mean_I");
            $sheet->setCellValue('F' . $rowCount, "Skewness_H");
            $sheet->setCellValue('G' . $rowCount, "Skewness_S");
            $sheet->setCellValue('H' . $rowCount, "Skewness_I");
            $sheet->setCellValue('I' . $rowCount, "Kurtosis_H");
            $sheet->setCellValue('J' . $rowCount, "Kurtosis_S");
            $sheet->setCellValue('K' . $rowCount, "Kurtosis_I");
            $rowCount++;

            foreach ($data as $value) {
                $sheet->setCellValue('A' . $rowCount, $value->id_testing);
                $sheet->setCellValue('B' . $rowCount, $value->Kelas_Apel);
                $sheet->setCellValue('C' . $rowCount, $value->Mean_H);
                $sheet->setCellValue('D' . $rowCount, $value->Mean_S);
                $sheet->setCellValue('E' . $rowCount, $value->Mean_I);
                $sheet->setCellValue('F' . $rowCount, $value->Skewness_H);
                $sheet->setCellValue('G' . $rowCount, $value->Skewness_S);
                $sheet->setCellValue('H' . $rowCount, $value->Skewness_I);
                $sheet->setCellValue('I' . $rowCount, $value->Kurtosis_H);
                $sheet->setCellValue('J' . $rowCount, $value->Kurtosis_S);
                $sheet->setCellValue('K' . $rowCount, $value->Kurtosis_I);
                // $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $value->id);
                // $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $value->nama);
                $rowCount++;
            }

            $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);;
            $writer->save('./assets/excel/Data Testing.xlsx');

            $this->load->helper('download');
            force_download('./assets/excel/Data Testing.xlsx', NULL);
        } else {
            $this->session->set_flashdata('message', 'gagal_export');
            redirect('training');
        }
    }

    public function batch()
    {
        $this->form_validation->set_rules('excel', 'Excel', 'trim|required');

        if ($_FILES['excel']['name'] == '') {
            $this->session->set_flashdata('message', 'kosong');
            redirect('testing');
        } else {
            $config['upload_path'] = './assets/excel/';
            $config['allowed_types'] = 'xls|xlsx';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('excel')) {
                // $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', 'gagal_upload');
                redirect('testing');
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
                    if ($key != 1) {
                        // $id = md5(DATE('ymdhms') . rand());
                        // $check = $this->m_testing->check_nama($value['C']);

                        // if ($check != 1) {
                        // $resultData[$index]['Id'] = $value['A'];
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
                        redirect('testing');
                    }
                } else {
                    $this->session->set_flashdata('message', 'duplikasi');
                    redirect('testing');
                }
            }
        }
    }
}
