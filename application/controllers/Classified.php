<?php
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
        user_logged_in();
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
        $this->load->view('template/v_header', $data);
        $this->load->view('template/v_navbar');
        $this->load->view('template/v_sidebar');
        $this->load->view('result_uji', $data);
        $this->load->view('template/v_footer');
        $this->session->set_flashdata('message', 'pengujian');
    }

    public function classify($id_ps)
    {
        error_reporting(E_ALL);
        require 'vendor/autoload.php';

        $data = [
            [
                57.02777778, 0.67015, 129.75, -2.025495, 0.330486, -1.52613, 5.970165, -0.863646, 2.785942
            ],
            [
                57, 0.685277778, 134.25, -1.239767, 0.0785, -0.277893, 2.856228, -0.80489, -0.111968
            ],
            [
                60.27777778, 0.877358333, 94.38888889, -0.75414,    -1.545316,    0.140398,    0.676099,    1.733615,    0.046694
            ],
            [
                42.11111111, 0.981877778, 72.86111111, -0.102077, -4.279275,    -0.400073,    0.709334,    21.393366,    1.195065
            ],
            [
                59.91666667, 0.656138889, 140.6388889, -0.05863,    -0.405387,    0.576515,    0.263567,    -0.897484,    -0.824775
            ],
            [
                62.11111111, 0.895002778, 97.75, -1.58669,    -1.352519,    -0.588041,    3.407613,    0.940846,    0.353721
            ],
            [
                52.19444444, 0.892163889, 88.33333333, -1.926657,    -1.766328,    -0.168332,    4.760428,    2.511033,    -0.264655
            ],
            [
                60.97222222, 0.662755556, 138.5833333, -0.423719,    -0.478533,    0.644788,    1.921761,    -0.624135,    -0.005353
            ],
            [
                64.16666667, 0.781552778, 103.5555556, -2.224771,    -0.635359,    -0.563338,    6.9053,    -0.582326,    0.757717
            ],
            [
                51.47222222, 0.962397222, 74.38888889, -0.276247,    -2.763387,    -0.363251,    -0.635584,    7.89933, -0.422771
            ],
            [
                61.27777778, 0.827236111, 116.6111111, 0.295963,    -0.593617,    0.776778,    -0.914017,    -0.740487,    -0.371718
            ],
            [
                67.77777778, 0.701013889, 118.1944444, 2.199473,    -0.212561,    -0.844271,    6.436078,    -0.913925,    1.565617
            ],
            [
                52.63888889, 0.945491667, 73.08333333, -0.544127,    -2.058748,    -0.483464,    0.062668,    3.96441,    -0.584308
            ],
            [
                62.05555556, 0.811691667, 110.2222222, -0.41008,    -0.884856,    0.927982,    -0.374632,    -0.427819,    -0.150677
            ],
            [
                58.69444444, 0.931016667, 91.86111111, -2.061955,    -1.907436,    -0.752776,    4.842145,    3.439999,    1.093498
            ],
            [
                54.69444444, 0.890275, 87.36111111, -0.56907,    -0.880673,    -0.436837,    0.554936,    -0.583434,    -0.621265
            ],
            [
                58.38888889, 0.872819444, 103.1111111, -1.309995,    -0.529677,    -0.088669,    3.486293,    -0.568634,    -0.46783
            ],
            [
                57.97222222, 0.919183333, 86.63888889, -2.064433,    -1.605255,    -0.83392,    4.140809,    1.768396,    1.278445
            ],
            [
                48.5, 0.944597222, 79.16666667, -0.773547,    -2.355488,    -0.518491,    0.351216,    6.437304,    -0.181258
            ],
            [
                61.86111111, 0.688363889, 132.4722222, 0.047521,    -0.327827,    0.831748,    -0.117625,    -0.478973,    -0.069555
            ],
            [
                62.94444444, 0.640888889, 136.4166667, 0.45819,    -0.093649,    -0.123887,    -0.422658,    -1.637067,    -1.176229
            ],
            [
                56.55555556, 0.80195, 95.63888889, -0.19793,    -1.090585,    0.288863,    -0.192467,    -0.378959,    -0.790876
            ],
            [
                60.5, 0.736669444, 122.0555556, -1.18496,    -0.27674,    0.602523,    2.793949,    -0.225944,    0.985042
            ],
            [
                63.88888889, 0.559413889, 144.6944444, 1.203607,    0.086198,    -0.414891,    1.971797,    -1.610073,    -1.031908
            ],
            [
                58.69444444, 0.674686111, 126.6388889, -1.069318,    -0.323518,    -0.635155,    0.48068,    -1.237413,    0.344844
            ],
            [
                62.44444444, 0.779347222, 120.9722222, -0.919903,    -0.750799,    1.036035,    0.565884,    -0.445111,    -0.060428
            ],
            [
                63.83333333, 0.617169444, 139.5277778, 0.110181,    -0.055622,    -0.295207,    0.326061,    -1.536737,    -0.813242
            ],
            [
                48.97222222, 0.901402778, 94.83333333, -0.56538,    -2.100064,    0.458409,    -0.334315,    3.646222,    0.185836
            ],
            [
                60.91666667, 0.832072222, 119.8055556, 0.673963,    -1.169034,    1.219373,    0.332191,    0.394725,    0.701938
            ],
            [
                62.91666667, 0.697444444, 122, -0.134009,    -0.452582,    -0.08732,    1.265994,    -1.539368,    -0.979082
            ],
            [
                51.66666667, 0.932219444, 70.91666667, -0.131938,    -1.499742,    -0.397321,    1.031313,    1.312444,    0.204096
            ],
            [
                62.69444444, 0.863666667, 108.0277778, -0.799452,    -0.70953,    0.569761,    0.114562,    -0.459059,    -0.406061
            ],
            [
                58.61111111, 0.807797222, 111.3333333, -2.081251,    -0.381455,    -0.573571,    5.050169,    -1.241495,    -0.143384
            ],
            [
                46.05555556, 0.952805556, 68.77777778, -0.8492,    -2.643973,    -0.717524,    0.282841,    6.34122,    -0.278738
            ],
            [
                59.75, 0.871922222, 107.2222222, -0.771624,    -0.881233,    0.340473,    0.44996,    -0.2425,    -0.179196
            ],
            [
                59.66666667, 0.954275, 82.33333333, -2.463721,    -3.260361,    -1.089408,    8.845159,    12.970259,    1.702121
            ],
            [
                54.05555556, 0.974838889, 64.61111111, -0.741635,    -3.546821,    -0.021524,    -0.004179,    15.100638,    -0.148838
            ],
            [
                59.91666667, 0.837386111, 114.1666667, -1.005153,    -0.673651,    0.40408,    0.906236,    0.084322,    -0.008108
            ],
            [
                62.22222222, 0.630302778, 133.8333333, 3.00547,    -0.227384,    -0.054632,    14.38222,    -1.436466,    -1.190634
            ],
            [
                54.33333333, 0.661555556, 122.8055556, -2.592507, -0.351423, 0.253671, 10.762508, -1.410255, -1.011505
            ],



            // // Green Smith
            [
                67, 0.661783333, 104.3611111, -1.311727,    -0.300783,    0.17853,    2.344254,    -1.459602,    -1.346769
            ],
            [
                60.91666667, 0.891161111, 86.66666667, 0.344404,    -1.081544,    0.786101,    -0.387562,    -0.067048,    -0.28845
            ],
            [
                67.66666667, 0.647302778, 118.6111111, -0.117634,    -0.084417,    -0.161876,    -0.708721,    -1.50411,    -1.074432
            ],
            [
                64.36111111, 0.645613889, 114.6944444, -0.88789,    -0.354396,    0.101316,    0.842625,    -1.426603,    -1.413465
            ],
            [
                65.02777778, 0.784088889, 100.6111111, -0.789885,    -0.946474,    0.694298,    1.42011,    -0.350383,    -0.382225
            ],
            [
                59.5, 0.980525, 58.61111111, -1.629461,    -3.543821,    -0.411675,    3.104384,    12.623929,    1.060762
            ],
            [
                62.41666667, 0.806441667, 80.16666667, -1.693647,    -1.020326,    0.531977,    3.722637,    -0.569431,    -0.949002
            ],
            [
                63.05555556, 0.8389, 87.61111111, -1.769877,    -0.131627,    0.123913,    7.552934,    -1.167544,    -0.59317
            ],
            [
                64.63888889, 0.853302778, 88.19444444, 1.07287,    -1.639633,    0.597647,    8.706895,    1.566721,    0.245009
            ],
            [
                62.36111111, 0.890236111, 77.97222222, -2.043003,    -1.841874,    -0.429789,    6.795551,    4.025187,    0.035438
            ],
            [
                61.83333333, 0.882563889, 93.80555556, -0.083436,    -1.453004,    1.103721,    -0.347662,    1.771832,    0.774441
            ],
            [
                64.16666667, 0.773691667, 93.80555556, 0.088544,    -1.084986,    0.865864,    1.033774,    -0.225738,    -0.296068
            ],
            [
                61.22222222, 0.920841667, 62.63888889, 0.764744,    -2.396436,    0.897774,    0.930552,    5.743314,    0.646879
            ],
            [
                63.11111111, 0.902761111, 91.47222222, -1.051798,    -1.378395,    0.589419,    4.16737,    1.268728,    0.08761
            ],
            [
                63.83333333, 0.879294444, 77.33333333, 1.570066,    -1.654434,    0.384284,    5.97894,    2.054473,    0.209137
            ],
            [
                61.72222222, 0.810255556, 84.97222222, -0.305541,    -1.384172,    0.854684,    -0.737798,    0.590536,    -0.044402
            ],
            [
                64.38888889, 0.872716667, 86.97222222, -1.314031,    -0.717685,    0.774731,    4.055995,    -0.928252,    -0.22274
            ],
            [
                65.30555556, 0.755883333, 97.13888889, -1.209355,    -0.788138,    0.555636,    2.622407,    -0.927442,    -0.109493
            ],
            [
                61.72222222, 0.831655556, 80.75, -1.358447,    -1.099705,    0.604789,    2.008521,    0.030224,    -0.400055
            ],
            [
                63.55555556, 0.865405556, 92.38888889, -5.162082,    -0.879812,    0.926348,    29.312533,    -0.488381,    0.152767
            ],
            [
                62.55555556, 0.764327778, 85.33333333, 1.067373,    -0.73987,    0.436291,    7.883068,    -0.308743,    -0.423572
            ],
            [
                62.02777778, 0.864902778, 84.33333333, -0.34946,    -1.447569,    -0.05016,    -0.367997,    1.554766,    -0.007761
            ],
            [
                64.55555556, 0.846655556, 93.05555556, -1.130221,    -0.181043,    -0.185838,    3.312611,    -1.118305,    0.244895
            ],
            [
                62.30555556, 0.886408333, 74.02777778, 1.960491,    -1.016929,    -0.285283,    11.916498,    -0.267089,    0.161176
            ],
            [
                62.30555556, 0.904502778, 72.88888889, -2.670536,    -1.406174,    0.625132,    9.362463,    0.963676,    -0.163245
            ],
            [
                62.13888889, 0.804402778, 99.22222222, -0.184818,    0.018852,    0.140123,    -0.238617,    -1.348922,    -1.28721
            ],
            [
                63.69444444, 0.758747222, 84.83333333, -1.785287,    -0.573193,    0.724683,    3.910521,    -1.016721,    -0.272665
            ],
            [
                60.11111111, 0.775438889, 80.72222222, -1.224017,    -0.812132,    0.46353,    1.306659,    -0.414313,    -0.256003
            ],
            [
                63.80555556, 0.577313889, 123.4722222, 0.018228,    -0.434233,    0.602189,    -1.009081,    -0.593006,    -0.507133
            ],
            [
                60.44444444, 0.901561111, 70.05555556, -1.697851,    -2.020813,    0.273262,    4.76407,    4.623221,    1.044509
            ],
            [
                58.41666667, 0.8974, 80.94444444, -1.267347,    -1.529028,    0.238902,    1.122738,    1.30914,    -0.031335
            ],
            [
                66.16666667, 0.90755, 88.08333333, -0.098938,    -0.539961,    0.161954,    -1.068787,    -1.347298,    -0.997492
            ],
            [
                61.47222222, 0.907125, 76.22222222, -1.224652,    -2.073315,    0.530722,    4.134748,    4.007029,    0.480051
            ],
            [
                56.72222222, 0.913463889, 66.97222222, -1.694601,    -1.97835,    0.548403,    2.774787,    3.277221,    0.438354
            ],
            [
                63.16666667, 0.792608333, 105, -0.269772,    -0.749042,    0.746561,    -0.132809,    -0.483468,    -0.319482
            ],
            [
                56.86111111, 0.930694444, 72.27777778, 0.817009,    -1.578009,    -0.188428,    8.996069,    1.413278,    0.045121
            ],
            [
                61.22222222, 0.903888889, 77.83333333, -1.541566,    -1.783422,    0.639087,    2.09846,    2.178301,    0.391058
            ],
            [
                62.75, 0.888038889, 97.88888889, -2.328095,    -0.648902,    0.130347,    7.441429,    -1.028864,    -0.825524
            ],
            [
                60.83333333, 0.847702778, 91.94444444, -2.161042,    -1.128765,    0.715296,    7.345182,    0.397429,    0.003036
            ],
            [
                59.19444444, 0.754502778, 97.86111111, -0.847299,    -0.997361,    0.725068,    1.031987,    -0.321141,    -0.180017
            ]

        ];

        $labels = [
            -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1,
            1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1
        ];
        $this->train($data, $labels);

        $predictions = $this->predict(
            [
                // Manalagi
                [
                    // 56.16666667, 0.906788889, 90.30555556, 0.441792, -0.218167,    0.805617,    -0.047146,    -0.404507,    -0.234233
                    59.69444444,    0.791805556,    115.6944444,    0.441792,    -0.218167,    0.805617,    -0.047146,    -0.404507,    -0.234233
                ],
                [
                    // 60.36111111, 0.657763889, 119.8611111, -0.557384, -0.624515,    0.111137,    0.750078,    -1.286343,    -1.116429
                    63,    0.730733333,    113.5,    -0.557384,    -0.624515,    0.111137,    0.750078,    -1.286343,    -1.116429

                ],
                [
                    // 61.52777778, 0.611244444, 138.4166667, -0.234434, -1.440812,    -0.017296,    -0.960514,    1.015264,    0.126936
                    52,    0.878991667,    93.38888889,    -0.234434,    -1.440812,    -0.017296,    -0.960514,    1.015264,    0.126936
                ],
                [
                    // 60.72222222, 0.766952778, 125.6666667, -0.130296, -0.600094,    0.480685,    0.668463,    -0.356284,    -0.436861
                    59.36111111,    0.855625,    109.4166667,    -0.130296,    -0.600094,    0.480685,    0.668463,    -0.356284,    -0.436861

                ],
                [
                    // 58.77777778, 0.770755556, 104.5277778, 0.249596, -0.106155,    -0.423123,    -0.88462,    -1.479742,    -0.725198
                    62.55555556, 0.576427778,    140.1666667,    0.249596,    -0.106155,    -0.423123,    -0.88462,    -1.479742,    -0.725198

                ],
                [
                    // 62.55555556, 0.576427778, 140.1666667, -0.143465, -0.749478,    -0.22795,    0.463252,    -0.776919,    -0.749557
                    58.77777778,    0.770755556,    104.5277778,    -0.143465,    -0.749478,    -0.22795,    0.463252,    -0.776919,    -0.749557
                ],
                [
                    // 59.36111111, 0.855625, 109.4166667, -0.402867, -0.860515,    0.921517,    1.9436,    -0.05338,    0.014092
                    60.72222222,    0.766952778, 125.6666667,    -0.402867,    -0.860515,    0.921517,    1.9436,    -0.05338,    0.014092
                ],
                [
                    // 52, 0.878991667, 93.38888889, 1.120813, -0.164828,    0.024981,    1.902467,    -1.341808,    -1.212286
                    61.52777778,    0.611244444,    138.4166667,    1.120813,    -0.164828,    0.024981,    1.902467,    -1.341808,    -1.212286
                ],
                [
                    // 63, 0.730733333, 113.5, -0.01515, -0.321083,    0.087128,    3.603672,    -1.496635,    -1.266448
                    60.36111111,    0.657763889,    119.8611111,    -0.01515,    -0.321083,    0.087128,    3.603672,    -1.496635,    -1.266448

                ],
                [
                    // 59.69444444, 0.791805556, 115.6944444, -0.049101, -1.091195,    0.410589,    0.027456,    -0.025506,    -0.685502
                    56.16666667,    0.906788889,    90.30555556,    -0.049101,    -1.091195,    0.410589,    0.027456,    -0.025506,    -0.685502
                ],

                // Green Smith
                [
                    // 61.69444444, 0.872994444, 94.30555556, 0.021786,    -1.082408,    0.967523,    -1.310887,    0.927855,    1.326441
                    61.69444444,    0.872994444,    94.30555556,    0.021786,    -1.082408,    0.967523,    -1.310887,    0.927855,    1.326441
                ],
                [
                    // 65.58333333, 0.721675, 103.3055556, -0.26557,    -0.798807,    0.579477,    1.544311,    -0.41397,    -0.329072
                    65.58333333,    0.721675,    103.3055556,    -0.26557,    -0.798807,    0.579477,    1.544311,    -0.41397,    -0.329072
                ],
                [
                    // 62.61111111, 0.613047222, 125.8888889, -0.366302,    -0.399928,    0.557333,    0.314777,    -1.083092,    -0.96797
                    62.61111111,    0.613047222,    125.8888889,    -0.366302,    -0.399928,    0.557333,    0.314777,    -1.083092,    -0.96797
                ],
                [
                    62.11111111, 0.862530556, 84.16666667, -0.279317,    -1.24729,    1.031564,    0.635896,    0.662626,    0.626671

                ],
                [
                    // 65.58333333, 0.608, 131.0833333, 0.030298,    -0.178452,    -0.12147,    2.57174,    -1.611532,    -1.210987
                    65.58333333,    0.608,    131.0833333,    0.030298,    -0.178452,    -0.12147,    2.57174,    -1.611532,    -1.210987
                ],
                [
                    // 59.66666667, 0.794891667, 91.91666667, -0.230802,    -1.145823,    0.628419,    -0.356002,    1.36371,    0.728952
                    59.66666667,    0.794891667,    91.91666667,    -0.230802,    -1.145823,    0.628419,    -0.356002,    1.36371,    0.728952
                ],
                [
                    // 63.30555556, 0.625183333, 125.7777778, -0.646888,    -0.299905,    0.723204,    1.367981,    -0.897868,    -0.316171
                    63.30555556,    0.625183333,    125.7777778,    -0.646888,    -0.299905,    0.723204,    1.367981,    -0.897868,    -0.316171
                ],
                [
                    // 61.52777778, 0.847297222, 91.33333333, -2.612948,    -1.27542,    -0.125292,    6.945317,    1.704221,    1.282704
                    61.52777778,    0.847297222,    91.33333333,    -2.612948,    -1.27542,    -0.125292,    6.945317,    1.704221,    1.282704

                ],
                [
                    // 60.55555556, 0.907230556, 72, -1.223176,    -1.554216,    0.806678,    2.198913,    1.193809,    0.156609
                    60.55555556,    0.907230556,    72,    -1.223176,    -1.554216,    0.806678,    2.198913,    1.193809,    0.156609
                ],
                [
                    // 62.5, 0.865663889, 86.13888889, -0.893025,    -0.366811,    0.569101,    3.450681,    -0.761447,    -0.096015
                    62.5,    0.865663889,    86.13888889,    -0.893025,    -0.366811,    0.569101,    3.450681,    -0.761447,    -0.096015
                ]

            ]
        );
        // var_dump($predictions);
        $data['user'] = $this->db->get_where('user', [
            'email' =>
            $this->session->userdata('email')
        ])->row_array();

        $data['hasil'] = $predictions;
        $data['test'] = $this->db->get('data_testing')->result_array();

        /** Periksa apa ada data di tabel */
        $tabel = $this->m_user->idps()->num_rows();

        /** Ambil id terakhir */
        $getID = $this->m_user->idps()->row_array();

        if ($tabel > 0) :
            $id_ps = autonumber($getID['jenis_pengujian'], 1, 8);
        else :
            $id_ps = 'U00000001';
        endif;

        /** Periksa apa ada data di tabel */
        $tabel = $this->db->query("SELECT pengujian.jenis_pengujian FROM pengujian")->num_rows();

        /** Ambil id terakhir */
        $getID = $this->db->query("SELECT pengujian.jenis_pengujian FROM pengujian ORDER BY jenis_pengujian DESC")->row_array();

        if ($tabel > 0) :
            $id_uj = autonumber($getID['jenis_pengujian'], 3, 6);
        else :
            $id_uj = 'UJI000001';
        endif;

        foreach ($predictions as $a => $key) {

            $testing = $this->db->query("SELECT id_testing FROM data_testing")->result_array();
            foreach ($testing as $k) {
                $idtesting = $k['id_testing'];
                $detail = array(
                    'id_testing' => $idtesting
                );
                $this->m_user->insert($detail, 'detail_pengujian');
            }

            $pecah = implode(', ', (array)$a);
            $ubah = implode(', ', (array)$where);
            $hasil = array(
                'id_user' => $this->session->userdata('id_usr'),
                'jenis_pengujian' => $id_ps,
                'kelas_asli' => $ubah,
                'kelas_hasil' =>  $pecah,
                'tanggal_uji' => time()
            );
            $this->session->set_flashdata('message', 'pengujian');
            $this->m_user->insert($hasil, 'pengujian');
        }

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
        $maxiter = array_key_exists('maxiter', $options) ? $options['maxiter'] : 10000;
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
