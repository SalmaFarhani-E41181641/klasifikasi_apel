<?php

use phpDocumentor\Reflection\Types\Null_;

defined('BASEPATH') or exit('No direct script access allowed');

class Classified extends CI_Controller
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

    /** Menampilkan Form Login */
    public function index()
    {
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['jumlah_training'] = $this->m_user->jmltraining();
        $data['jumlah_testing'] = $this->m_user->jmltesting();
        $data['jumlah_kelas'] = $this->m_user->jmlkelas();
        $data['jumlah_uji'] = $this->m_user->jmluji();

        $data['judul'] = "Klasifikasi SVM";
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_navbar');
        $this->load->view('template/v_sidebar', $data);
        $this->load->view('classify');
        $this->load->view('template/v_footer');
    }

    public function graph()
    {
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['judul'] = "Hasil Graph";
        $this->load->view('template/v_header_graph', $data);
        $this->load->view('template/v_navbar');
        $this->load->view('template/v_sidebar');
        $this->load->view('graph');
        $this->load->view('template/v_footer');
    }

    public function individu()
    {
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['jumlah_training'] = $this->m_user->jmltraining();
        $data['jumlah_testing'] = $this->m_user->jmltesting();
        $data['jumlah_kelas'] = $this->m_user->jmlkelas();
        $data['jumlah_uji'] = $this->m_user->jmluji();

        $this->form_validation->set_rules('mean_h', 'Mean_h', 'required', [
            'required' => 'Kolom ini harus di isi'
        ]);
        $this->form_validation->set_rules('mean_s', 'Mean_s', 'required', [
            'required' => 'Kolom ini harus di isi'
        ]);
        $this->form_validation->set_rules('mean_i', 'Mean_i', 'required', [
            'required' => 'Kolom ini harus di isi'
        ]);
        $this->form_validation->set_rules('skewness_h', 'skewness_h', 'required', [
            'required' => 'Kolom ini harus di isi'
        ]);
        $this->form_validation->set_rules('skewness_s', 'skewness_s', 'required', [
            'required' => 'Kolom ini harus di isi'
        ]);
        $this->form_validation->set_rules('skewness_i', 'skewness_i', 'required', [
            'required' => 'Kolom ini harus di isi'
        ]);
        $this->form_validation->set_rules('kurtosis_h', 'kurtosis_h', 'required', [
            'required' => 'Kolom ini harus di isi'
        ]);
        $this->form_validation->set_rules('kurtosis_s', 'kurtosis_s', 'required', [
            'required' => 'Kolom ini harus di isi'
        ]);
        $this->form_validation->set_rules('kurtosis_i', 'kurtosis_i', 'required', [
            'required' => 'Kolom ini harus di isi'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = "Klasifikasi SVM (Data Tunggal)";
            $this->load->view('template/v_header', $data);
            $this->load->view('template/v_navbar');
            $this->load->view('template/v_sidebar');
            $this->load->view('individu', $data);
            $this->load->view('template/v_footer');
        } else {
            $this->ujitunggal();
        }
    }


    public function ujitunggal()
    {
        $mean_h = $this->input->post('mean_h');
        $mean_s = $this->input->post('mean_s');
        $mean_i = $this->input->post('mean_i');
        $skewness_h = $this->input->post('skewness_h');
        $skewness_s = $this->input->post('skewness_s');
        $skewness_i = $this->input->post('skewness_i');
        $kurtosis_h = $this->input->post('kurtosis_h');
        $kurtosis_s = $this->input->post('kurtosis_s');
        $kurtosis_i = $this->input->post('kurtosis_i');

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

        $labels = array_map(function ($value){
            return $value['Kelas_Apel'] == 'Manalagi' ? -1 : 1;
        }, $sql->result_array());

        $this->train($data, $labels);

        $predictions = $this->predict([
            [
                // 62.5,    0.865663889,    86.13888889,    -0.893025,    -0.366811,    0.569101,    3.450681,    -0.761447,    -0.096015
                $mean_h,   $mean_s,    $mean_i,    $skewness_h,    $skewness_s,    $skewness_i,    $kurtosis_h,    $kurtosis_s,   $kurtosis_i
            ]
        ]);

        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['hasil'] = $predictions;
        $data['judul'] = "Hasil Klasifikasi";
        $data['sidebar'] = "classify";
        $this->session->set_flashdata('message', 'pengujian');
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_navbar');
        $this->load->view('template/v_sidebar');
        $this->load->view('result_uji', $data);
        $this->load->view('template/v_footer');
    }

    public function classify($id_ps)
    {
        $this->db->select('Kelas_Apel, Mean_H, Mean_S, Mean_I, Skewness_H, Skewness_S, Skewness_I, Kurtosis_H, Kurtosis_S, Kurtosis_I');
        $this->db->from('data_training');
        $sql = $this->db->get();

        $data =  array_map(function ($value) {
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

        $labels = array_map(function ($value){
            return $value['Kelas_Apel'] == 'Manalagi' ? -1 : 1;
        }, $sql->result_array());

        $this->train($data, $labels);

        $this->db->select('id_testing, Kelas_Apel, Mean_H, Mean_S, Mean_I, Skewness_H, Skewness_S, Skewness_I, Kurtosis_H, Kurtosis_S, Kurtosis_I');
        $this->db->from('data_testing');
        $sql1 = $this->db->get();

        $predictions = $this->predict(
            array_map(function ($value) {
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
            }, $sql1->result_array())
        );
        // var_dump($predictions);
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['hasil'] = $predictions;
        $data['label'] = $labels;
        $data['test'] = $this->db->get('data_testing')->result_array();

        /** Periksa apa ada data di tabel */
        $tabel = $this->m_user->idps()->num_rows();

        /** Ambil id terakhir */
        $getID = $this->m_user->idps()->row_array();

        if ($tabel > 0) :
            $id_uj = autonumber($getID['jenis_pengujian'], 1, 8);
        else :
            $id_uj = 'U00000001';
        endif;

        // $testing = $this->db->get('data_testing')->num_rows();
        // $id_test['id'] = $this->db->query('SELECT id_testing FROM data_testing')->result_array();
        // $asli = $this->db->query('SELECT Kelas_Apel FROM data_testing')->result_array();
        $kelas = array_map(function ($value){
            return $value['Kelas_Apel'] == 'Manalagi' ? -1 : 1;
        }, $sql1->result_array());

        // $id_test = array_map(function ($value){
        //     return $value['id_testing'];
        // }, $sql1->result_array());

        // $result = array_merge($predictions, $kelas);

        // print_r("<pre>");
        // print_r($result);die;

        foreach ($predictions as $key) {
            if ($key != 0) {
                $pecah = implode(', ', (array)$key);

                $hasil = array(
                    'id_user' => $this->session->userdata('id_usr'),
                    'jenis_pengujian' => $id_uj,
                    // 'kelas_asli' => $kelas,
                    'kelas_hasil' =>  $pecah,
                    'tanggal_uji' => time()
                );
                $this->m_user->insert($hasil, 'pengujian');
                $this->session->set_flashdata('message', 'pengujian');
                // $detail = array(
                //     'id_testing' => $pecah3
                // );
                // $this->db->insert('detail_pengujian', $detail);
            }
        }

        // $kelas = array_map(function ($value){
        //     return $value['Kelas_Apel'] != NULL ? 'Manalagi' : 'Green Smith';
        // }, $sql1->result_array());

        // $kelas = $this->db->query("SELECT Kelas_Apel FROM data_testing")->result_array();
        // $pecah2 = implode(', ', (array)$kelas);
        // $jenis_pengujian = $this->uri->segment(2);
        // for ($i=0; $i < count($kelas); $i++) { 
        //     # code...
        //     // var_dump($pecah2);die;
        //     $hasil = if ($pecah2){
        //         array('kelas_asli' => $pecah2);
        //     }
                
        //     $where = array(
        //         'jenis_pengujian' => $jenis_pengujian
        //     );
                
        //     $this->m_user->update($where, $hasil, 'pengujian');
        // }

        
        $data['judul'] = "Hasil Klasifikasi";
        $data['sidebar'] = "classify";
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_navbar');
        $this->load->view('template/v_sidebar');
        $this->load->view('result', $data);
        $this->load->view('template/v_footer');
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
        $maxiter = array_key_exists('maxiter', $options) ? $options['maxiter'] : 10;
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

        // $pecah = json_encode($trainstats);

        // echo 'Prediction: ' . $pecah . PHP_EOL;

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

        // $pecah = json_encode($trainstats);
        
        // echo 'Margin: ' . $f . PHP_EOL;

        // Mengembalikan nilai hasil perhitungan kembali ke training dan akan berulang kembali ke function ini sampai proses training selesai
        return $f;
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
        
        // $pecah = json_encode($margins);
        // print_r("<pre>");
        // print_r($pecah);
        // print_r("</pre>");
        // echo 'Margin: ' . $pecah . PHP_EOL;
        
        return $margins;
    }
    
    protected function kernelResult($i, $j)
    {
        if ($this->kernelResults) {
            return $this->kernelResults[$i][$j];
        }
        
        $kernel = $this->kernel;
        
        // $pecah = json_encode($kernel);
        // echo 'Kernel: ' . $pecah . PHP_EOL;
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

        // echo 'Prediction: ' . $margs[0] . PHP_EOL;
        
        return $margs;

    }

    protected function linearKernel($v1, $v2)
    {
        $s = 0;

        for ($q = 0; $q < count($v1); $q++) {
            $s += $v1[$q] * $v2[$q];
        }

        // print_r("<pre>");
        // print_r($s);
        // echo 'Linear: ' . $s . PHP_EOL;

        return $s;
    }
}
