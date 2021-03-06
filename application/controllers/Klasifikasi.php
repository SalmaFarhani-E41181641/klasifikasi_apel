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
        $this->load->model('M_testing', 'm_testing');
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

    public function hasilkelompok($id_uji)
    {
        $data['judul'] = "Hasil Klasifikasi (Data Kelompok)";
        $data['jumlah_training'] = $this->m_user->jmltraining();
        $data['jumlah_kelas'] = $this->m_user->jmlkelas();
        $data['testing'] = $this->m_user->AllTesting($id_uji);
        $data['jmlhasil'] = $this->m_user->jmlHasil($id_uji);
        $data['jmlberhasil'] = $this->m_user->jmlBerhasil($id_uji);
        $data['jmlgagal'] = $this->m_user->jmlGagal($id_uji);
        $this->load->view('user/header', $data);
        $this->load->view('user/navbar');
        $this->load->view('user/hasilkelompok', $data);
        $this->load->view('user/footer');
    }

    public function dataset()
    {
        force_download('assets/dist/dataset/Testing.xlsx', NULL);
    }

    public function template()
    {
        force_download('assets/dist/dataset/Template.xlsx', NULL);
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
                // var_dump($sheetData);die;
                foreach ($sheetData as $key => $value) {
                    $id = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'), 1, 6);
                    if ($key > 1) {
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

                        $resultData[$index]['Kelas_Hasil'] = $this->ujikelompok($value['C'], $value['D'], $value['E'], $value['F'], $value['G'], $value['H'], $value['I'], $value['J'], $value['K']);

                    }
                    $index++;
                }
                // var_dump($resultData);
                // die;

                if (count($resultData) != 0) {
                    $id_uji = substr(str_shuffle('1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 1, 10);

                    $pengujian = [
                        'id_uji' => $id_uji,
                        'id_user' => "user",
                        'jenis_pengujian' => "kelompok",
                        'tanggal_uji' => date('Y-m-d')
                    ];

                    $arrayy = [];
                    foreach ($resultData as $rd) {
                        // var_dump($rd['id_testing']);die;
                        $detail = [
                            'id_uji' => $id_uji,
                            'id_testing' => $rd['id_testing']
                        ];
                        array_push($arrayy, $detail);
                    }
                    $id = $id_uji;
                    $this->db->insert('pengujian_user', $pengujian);
                    $result = $this->m_testing->insert_batch_user('data_testing_user', $resultData);
                    $result = $this->m_testing->insert_batch_user('detail_pengujian_user', $arrayy);
                    if ($result > 0) {
                        unlink('./assets/excel/' . $data['file_name']);
                        $this->session->set_flashdata('message', 'pengujian');
                        redirect('Klasifikasi/hasilkelompok/'. $id);
                    }else{

                    }
                } else {
                    $this->session->set_flashdata('message', 'duplikasi');
                    redirect('Klasifikasi/kelompok');
                }
            }
        }
    }

    //klasifikasi kelompok
    public function ujikelompok($mean_h,   $mean_s,    $mean_i,    $skewness_h,    $skewness_s,    $skewness_i,    $kurtosis_h,    $kurtosis_s,   $kurtosis_i)
    {
        try {
            // $mean_h = $kelompok['mean_h'];
            // $mean_s = $kelompok['mean_s'];
            // $mean_i = $kelompok['mean_i'];
            // $skewness_h = $kelompok['skewness_h'];
            // $skewness_s = $kelompok['skewness_s'];
            // $skewness_i = $kelompok['skewness_i'];
            // $kurtosis_h = $kelompok['kurtosis_h'];
            // $kurtosis_s = $kelompok['kurtosis_s'];
            // $kurtosis_i = $kelompok['kurtosis_i'];

            // $result = [
            //     'data' => $mean_h
            // ];
            // echo json_encode($result);

            $this->db->select('Kelas_Apel, Mean_H, Mean_S, Mean_I, Skewness_H, Skewness_S, Skewness_I, Kurtosis_H, Kurtosis_S, Kurtosis_I');
            $this->db->from('data_training');
            $sql = $this->db->get();

            $data = array_map(function ($value) {
                return [
                    (double) $value['Mean_H'],
                    (double) $value['Mean_S'],
                    (double) $value['Mean_I'],
                    (double) $value['Skewness_H'],
                    (double) $value['Skewness_S'],
                    (double) $value['Skewness_I'],
                    (double) $value['Kurtosis_H'],
                    (double) $value['Kurtosis_S'],
                    (double) $value['Kurtosis_I'],
                ];
            }, $sql->result_array());

            $labels = array_map(function ($value) {
                return $value['Kelas_Apel'] == 'Manalagi' ? -1 : 1;
            }, $sql->result_array());

            $this->train($data, $labels);

            $predictions = $this->predict([
                [
                    // 62.5,    0.865663889,    86.13888889,    -0.893025,    -0.366811,    0.569101,    3.450681,    -0.761447,    -0.096015
                    $mean_h,   $mean_s,    $mean_i,    $skewness_h,    $skewness_s,    $skewness_i,    $kurtosis_h,    $kurtosis_s,   $kurtosis_i
                ]
            ]);

            if ($predictions == -1) {
                $hasilpre = "Manalagi";
            } else {
                $hasilpre = "Green Smith";
            }

            return $hasilpre;
        } catch (\Throwable $th) {
            $this->session->set_flashdata('message', 'gagalklas');
            redirect('Klasifikasi/kelompok');
        }
    }

    public function train($data, $labels, $options = [])
    {
        // Function helper yang diperlukan
        $this->data = $data;
        $this->labels = $labels;

        // parameters
        // C Nilai. regulasi nilai C
        $C = array_key_exists('C', $options) ? $options['C'] : 5.0;

        $tol = array_key_exists('tol', $options) ? $options['tol'] : 1e-4;
        // vektor non-pendukung untuk efisiensi ruang dan waktu dipotong. Untuk menjamin hasil yang benar, setel ini ke 0 untuk tidak melakukan pemotongan. Jika Anda ingin meningkatkan efisiensi, bereksperimenlah dengan menyetel ini sedikit lebih tinggi, 
        // hingga mungkin 1e-4 atau (0.0001) atau lebih.
        $alphatol = array_key_exists('alphatol', $options) ? $options['alphatol'] : 1e-7;
        // jumlah maksimum iterasi
        $maxiter = array_key_exists('maxiter', $options) ? $options['maxiter'] : 3000;
        // Sebanyak apa terjadi perulangan sampai berhenti pada angka yang telah ditentukan
        $numpasses = array_key_exists('numpasses', $options) ? $options['numpasses'] : 20;

        // instantiate kernel sesuai dengan opsi. kernel dapat diberikan sebagai string atau sebagai fungsi kustom
        $kernel = [$this, 'linearKernel'];
        $this->kernelType = 'linear';

        if (array_key_exists('kernel', $options)) {
            if (is_string($options['kernel'])) {
                // kernel ditentukan sebagai string.
                if ($options['kernel'] === 'linear') {
                    $kernel = [$this, 'linearKernel'];
                    $this->kernelType = 'linear';
                }
            }

            if (is_callable($options['kernel'])) {
                $kernel = $options['kernel'];
                $this->kernelType = 'custom';
            }
        }

        // inisialisasi
        $this->kernel = $kernel;
        $this->N = $N = count($data);
        // $this->D = $D = count($data[0]);
        $this->alpha = array_fill(0, $N, 0);
        $this->b = 0.0;
        $this->usew_ = false;

        // Cache perhitungan kernel untuk menghindari penghitungan ulang yang berat.
        // Ini dapat menggunakan terlalu banyak memori jika N besar.
        if (array_key_exists('memoize', $options) && $options['memoize']) {
            $this->kernelResults = array_fill(0, $N, []);

            for ($i = 0; $i < $N; $i++) {
                $this->kernelResults[$i] = array_fill(0, $N, []);

                for ($j = 0; $j < $N; $j++) {
                    $this->kernelResults[$i][$j] = $kernel($data[$i], $data[$j]);
                }
            }
        }

        // SMO (Squential Minimal Optimization) algorithma
        $iter = 0;
        $passes = 0;

        while ($passes < $numpasses && $iter < $maxiter) {
            $alphaChanged = 0;

            for ($i = 0; $i < $N; $i++) {
                $Ei = $this->marginOne($data[$i]) - $labels[$i];

                if (($labels[$i] * $Ei < -$tol && $this->alpha[$i] < $C)
                    || ($labels[$i] * $Ei > $tol && $this->alpha[$i] > 0)
                ) {
                    // alpha_i perlu diperbarui! aplpha j untuk memperbaruinya
                    $j = $i;

                    while ($j === $i) {
                        $j = rand(0, $this->N - 1);
                    }

                    $Ej = $this->marginOne($data[$j]) - $labels[$j];

                    // hitung batas L dan H untuk j untuk memastikan kita berada dalam kotak [0 C] x [0 C]
                    $ai = $this->alpha[$i];
                    $aj = $this->alpha[$j];
                    $L = 0;
                    $H = $C;

                    if ($labels[$i] === $labels[$j]) {
                        $L = max(0, $ai + $aj - $C);
                        $H = min($C, $ai + $aj);
                    } else {
                        $L = max(0, $aj - $ai);
                        $H = min($C, $C + $aj - $ai);
                    }

                    if (abs($L - $H) < 1e-4) {
                        continue;
                    }

                    $eta = 2 * $this->kernelResult($i, $j) - $this->kernelResult($i, $i) - $this->kernelResult($j, $j);

                    if ($eta >= 0) {
                        continue;
                    }

                    // hitung alpha_j baru dan klip di dalam kotak [0 C] x [0 C]
                    // lalu hitung alpha_i berdasarkan itu.
                    $newaj = $aj - (($labels[$j] * ($Ei - $Ej)) / $eta);

                    if ($newaj > $H) {
                        $newaj = $H;
                    }

                    if ($newaj < $L) {
                        $newaj = $L;
                    }

                    if (abs($aj - $newaj) < 1e-4) {
                        continue;
                    }

                    $this->alpha[$j] = $newaj;
                    $newai = $ai + $labels[$i] * $labels[$j] * ($aj - $newaj);
                    $this->alpha[$i] = $newai;

                    $b1 = $this->b - $Ei - $labels[$i] * ($newai - $ai) * $this->kernelResult($i, $i)
                        - $labels[$j] * ($newaj - $aj) * $this->kernelResult($i, $j);

                    $b2 = $this->b - $Ej - $labels[$i] * ($newai - $ai) * $this->kernelResult($i, $j)
                        - $labels[$j] * ($newaj - $aj) * $this->kernelResult($j, $j);

                    $this->b = 0.5 * ($b1 + $b2);

                    if ($newai > 0 && $newai < $C) {
                        $this->b = $b1;
                    }

                    if ($newaj > 0 && $newaj < $C) {
                        $this->b = $b2;
                    }

                    $alphaChanged++;
                }
            }

            $iter++;

            // echo 'iter: ' . $iter . ' perubahan Alpha: ' . $alphaChanged . PHP_EOL;

            //console.log("iter number %d, alphaChanged = %d", iter, alphaChanged);
            $passes = ($alphaChanged == 0) ? $passes + 1 : 0;
        }

        // jika pengguna menggunakan kernel linier, mari kita juga menghitung dan menyimpan bobot. 
        // Ini akan mempercepat evaluasi selama waktu pengujian
        if ($this->kernelType === 'linear') {
            // menghitung bobot dan menyimpannya
            $this->w = array_fill(0, $this->D, 0);

            for ($j = 0; $j < $this->D; $j++) {
                $s = 0.0;

                for ($i = 0; $i < $this->N; $i++) {
                    $s += $this->alpha[$i] * $labels[$i] * $data[$i][$j];
                }

                $this->w[$j] = $s;
                $this->usew_ = true;
            }
        } else {
            // oke, perlu untuk mempertahankan semua support vektor dalam data pelatihan,
            $newdata = [];
            $newlabels = [];
            $newalpha = [];

            for ($i = 0; $i < $this->N; $i++) {
                //console.log("alpha=%f", this.alpha[i]);
                if ($this->alpha[$i] > $alphatol) {
                    $newdata[] = $this->data[$i];
                    $newlabels[] = $this->labels[$i];
                    $newalpha[] = $this->alpha[$i];
                }
            }

            // menyimpan data dan label
            $this->data = $newdata;
            $this->labels = $newlabels;
            $this->alpha = $newalpha;
            $this->N = count($this->data);
            //console.log("filtered training data from %d to %d support vectors.", data.length, this.data.length);
        }

        // Membuat variabel trainstat dengan membuat array dan memasukkan seluruh proses training kedalam variabel tersebut.
        $trainstats = [];
        $trainstats['iters'] = $iter;

        return $trainstats;
    }

    // inst adalah array panjang D. Mengembalikan margin dari contoh tertentu
    // ini adalah fungsi prediksi inti. Semua orang lain adalah untuk kenyamanan sebagian besar
    // dan akhirnya memanggil yang satu ini entah bagaimana.
    protected function marginOne($inst)
    {
        $f = $this->b;

        // jika kernel linear digunakan dan w dihitung dan disimpan,
        // (yaitu svm telah selesai dilakukan pelatihan)
        // variabel kelas internal usew_ akan diatur ke true.
        if ($this->usew_) {
            // proses dapat mempercepat ini banyak dengan menggunakan bobot komputasi
            // disini menghitung ini selama train(). Hasil dari perhitungan ini dibawa ke training.
            for ($j = 0; $j < $this->D; $j++) {
                $f += $inst[$j] * $this->w[$j];
            }
        } else {
            // Menggunakan rumus untuk mencari nilai W dengan mencari nilai menggunakan alpha_i dan aplha_j pada algoritma SMO 
            for ($i = 0; $i < $this->N; $i++) {
                $kernel = $this->kernel;
                $f += $this->alpha[$i] * $this->labels[$i] * $kernel($inst, $this->data[$i]);
            }
        }

        // Mengembalikan nilai hasil perhitungan kembali ke training dan akan berulang kembali ke function ini sampai proses training selesai
        return $f;
    }

    public function predictOne($inst)
    {
        return $this->marginOne($inst) > 0 ? 1 : -1;
    }

    // data adalah array NxD. Mengembalikan array margin.
    protected function margins($data)
    {
        // N = Jumlah data.
        // Melakukan looping sebanyak N
        $N = count($data);
        $margins = array_fill(0, $N, 0);

        for ($i = 0; $i < $N; $i++) {
            $margins[$i] = $this->marginOne($data[$i]);
        }

        return $margins;
    }

    protected function kernelResult($i, $j)
    {
        if ($this->kernelResults) {
            return $this->kernelResults[$i][$j];
        }

        $kernel = $this->kernel;

        return $kernel($this->data[$i], $this->data[$j]);
    }

    // data adalah array NxD. Mengembalikan array dari 1 atau -1, prediksi
    public function predict($data)
    {
        // Nilai margin diambil dari hasil margin(Gap) data 
        $margs = $this->margins($data);

        // Dilakukan looping pada hasil margin untuk menentukan antara kelas (1) atau kelas (-1)
        // Kelas (-1) merupakan apel manalagi, sedangkan Kelas (1) merupakan apel Green Smith 
        for ($i = 0; $i < count($margs); $i++) {
            $margs[$i] = $margs[$i] > 0 ? 1 : -1;
        }

        return $margs;
    }

    protected function linearKernel($v1, $v2)
    {
        $s = 0;

        for ($q = 0; $q < count($v1); $q++) {
            $s += $v1[$q] * $v2[$q];
        }

        return $s;
    }
}
