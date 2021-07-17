<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Training extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_training', 'm_training');
        user_logged_in();
        cekuser();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['training'] = $this->m_training->select_all();

        $data['judul'] = "Data Latih";
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_navbar');
        $this->load->view('template/v_sidebar');
        $this->load->view('training', $data);
        $this->load->view('template/v_footer');
    }

    public function insert()
    {
        $this->form_validation->set_rules('kelas_apel', 'Kelas_Apel', 'required');
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
            redirect('training');
        } else {
            $kelas_apel = htmlspecialchars($this->input->post('kelas_apel', TRUE), ENT_QUOTES);
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

            $this->m_training->insert($kelas_apel, $mean_h, $mean_s, $mean_i, $skewness_h, $skewness_s, $skewness_i, $kurtosis_h, $kurtosis_s, $kurtosis_i);
            $this->session->set_flashdata('message', 'save');
            redirect('training');
        }
    }

    function update()
    {
        $this->form_validation->set_rules('kelas_apel', 'Kelas_Apel', 'required');
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
            redirect('training');
        } else {
            $id = htmlspecialchars($this->input->post('id_training'));
            $kelas_apel = htmlspecialchars($this->input->post('kelas_apel', TRUE), ENT_QUOTES);
            $mean_h = htmlspecialchars($this->input->post('mean_h', TRUE), ENT_QUOTES);
            $mean_s = htmlspecialchars($this->input->post('mean_s', TRUE), ENT_QUOTES);
            $mean_i = htmlspecialchars($this->input->post('mean_i', TRUE), ENT_QUOTES);
            $skewness_h = htmlspecialchars($this->input->post('skewness_h', TRUE), ENT_QUOTES);
            $skewness_s = htmlspecialchars($this->input->post('skewness_s', TRUE), ENT_QUOTES);
            $skewness_i = htmlspecialchars($this->input->post('skewness_i', TRUE), ENT_QUOTES);
            $kurtosis_h = htmlspecialchars($this->input->post('kurtosis_h', TRUE), ENT_QUOTES);
            $kurtosis_s = htmlspecialchars($this->input->post('kurtosis_s', TRUE), ENT_QUOTES);
            $kurtosis_i = htmlspecialchars($this->input->post('kurtosis_i', TRUE), ENT_QUOTES);
            $this->m_training->update($id, $kelas_apel, $mean_h, $mean_s, $mean_i, $skewness_h, $skewness_s, $skewness_i, $kurtosis_h, $kurtosis_s, $kurtosis_i);
            $this->session->set_flashdata('message', 'edit');
            redirect('training');
        }
    }

    function delete()
    {
        $id = $this->input->post('id_delete', TRUE);
        $this->m_training->delete($id);
        $this->session->set_flashdata('message', 'hapus');
        redirect('training');
    }

    public function export()
    {
        error_reporting(E_ALL);
        require '/vendor/autoload.php';
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $data = $this->m_training->select_all();
        $sheet = $spreadsheet->getActiveSheet();

        $rowCount = 1;
        $sheet->setCellValue('A' . $rowCount, "id_training");
        $sheet->setCellValue('B' . $rowCount, "Kelas_Apel");
        $sheet->setCellValue('D' . $rowCount, "Mean_H");
        $sheet->setCellValue('E' . $rowCount, "Mean_S");
        $sheet->setCellValue('F' . $rowCount, "Mean_I");
        $sheet->setCellValue('G' . $rowCount, "Skewness_H");
        $sheet->setCellValue('H' . $rowCount, "Skewness_S");
        $sheet->setCellValue('I' . $rowCount, "Skewness_I");
        $sheet->setCellValue('J' . $rowCount, "Kurtosis_H");
        $sheet->setCellValue('K' . $rowCount, "Kurtosis_S");
        $sheet->setCellValue('L' . $rowCount, "Kurtosis_I");
        $rowCount++;

        foreach ($data as $value) {
            $sheet->setCellValue('A' . $rowCount, $value->id_training);
            $sheet->setCellValue('B' . $rowCount, $value->Kelas_Apel);
            $sheet->setCellValue('D' . $rowCount, $value->Mean_H);
            $sheet->setCellValue('E' . $rowCount, $value->Mean_S);
            $sheet->setCellValue('F' . $rowCount, $value->Mean_I);
            $sheet->setCellValue('G' . $rowCount, $value->Skewness_H);
            $sheet->setCellValue('H' . $rowCount, $value->Skewness_S);
            $sheet->setCellValue('I' . $rowCount, $value->Skewness_I);
            $sheet->setCellValue('J' . $rowCount, $value->Kurtosis_H);
            $sheet->setCellValue('K' . $rowCount, $value->Kurtosis_S);
            $sheet->setCellValue('L' . $rowCount, $value->Kurtosis_I);
            $rowCount++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);;
        $writer->save('./assets/excel/Data Training.xlsx');

        $this->load->helper('download');
        force_download('./assets/excel/Data Training.xlsx', NULL);
    }

    public function batch()
    {
        $this->form_validation->set_rules('excel', 'Excel', 'trim|required');

        if ($_FILES['excel']['name'] == '') {
            $this->session->set_flashdata('message', 'kosong');
            redirect('training');
        } else {
            $config['upload_path'] = './assets/excel/';
            $config['allowed_types'] = 'xls|xlsx';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('excel')) {
                $this->session->set_flashdata('message', 'gagal_upload');
                redirect('training');
            } else {
                $data = $this->upload->data();

                error_reporting(E_ALL);
                date_default_timezone_set('Asia/Jakarta');

                require 'vendor/autoload.php';

                include './assets/plugins/phpoffice/phpspreadsheet/src/PhpSpreadsheet/IOFactory.php';

                $inputFileName = './assets/excel/' . $data['file_name'];

                $spreadsheet = \PhpOffice\Phpspreadsheet\IOFactory::load($inputFileName);
                $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                $index = 0;
                foreach ($sheetData as $key => $value) {
                    if ($key != 1) {
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
                    }
                    $index++;
                }

                unlink('./assets/excel/' . $data['file_name']);

                if (count($resultData) != 0) {
                    $result = $this->m_training->insert_batch($resultData);
                    if ($result > 0) {
                        $this->session->set_flashdata('message', 'save');
                        redirect('training');
                    }
                } else {
                    $this->session->set_flashdata('message', 'duplikasi');
                    redirect('training');
                }
            }
        }
    }
}
