<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $judul; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12 mt-3 text-center">
                <p class="lead">
                    <a class="btn btn-sm btn-info" href="<?= base_url('contact') ?>">Kelompok 25 <i class="fas fa-external-link-alt"></i></a>
                </p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-3 col-sm-4 text-center">
                <img src="<?= base_url(); ?>assets/dist/img/svm_image.jpg" width="600" alt="halo">
                <p class="mt-2 mb-2 rounded alert alert-secondary"><i class="fas fa-info-circle"></i> Mengenal algoritma dari support vector machine, berikut penjelasan singkatnya berdasarkan studi kasus <b>Apel Malang</b>.</p>
            </div>
            <div class="col-lg-12" id="accordion">
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseZero">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                0. Tentang SVM
                            </h4>
                        </div>
                    </a>
                    <div id="collapseZero" class="collapse show" data-parent="#accordion">
                        <div class="card-body text-justify">
                            Dalam machine learning, <b>Support Vector Machine</b> (<b>SVM</b>) Menurut Santoso (2007) adalah suatu teknik untuk melakukan prediksi,
                            baik dalam kasus klasifikasi maupun regresi. SVM berada dalam satu kelas dengan <b>Artificial Neural Network</b> (<b>ANN</b>) dalam hal fungsi dan kondisi permasalahan
                            yang bisa diselesaikan. Keduanya masuk dalam kelas <b>supervised learning</b>. Dikembangkan di AT&amp;T Bell Laboratories oleh Vladimir Vapnik dengan kolega (Boser et al.,
                            1992, Guyon et al., 1993, Vapnik et al., 1997), SVM adalah salah satu metode prediksi yang paling kuat, didasarkan pada kerangka kerja pembelajaran statistik atau teori VC
                            yang diusulkan oleh Vapnik (1982, 1995) dan Chervonenkis (1974).
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                1. Data Training atau dataset
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body text-justify">
                            <p><b> Dataset </b>/ <b> Himpunan Data </b>/ <b> Data Latih </b> adalah sebuah himpunan data yang berasal dari informasi masa-masa lampau dan dikelola menjadi sebuah informasi untuk melakukan teknik dari ilmu data mining.</p>

                            <p> Dataset terdiri dari 5 kategori dan terbagi menjadi dua bagian data,dua jenis dataset, tujuan dataset.</p>
                            <p> Pembahasan <b> Pertama </b> adalah mengenai dua jenis dataset yaitu Private dan Public.</p>
                            <ul>
                                <li>
                                    <b> Private </b> Dataset, adalah data set yang dapat diambil dari sebuah organisasi yang akan kita lakukan sebagai objek penelitian misalnya seperti data bank, rumah sakit, universitas, perusahaan dan lain sebagainya
                                </li>
                                <li>
                                    <b> Public </b> Dataset, adalag data set yang bisa kita ambil dari repository publik yang disepakati oleh ulama-ulama peneliti data mining, misalnya seperti UCI Repository (http://www.ics.uci.edu/~mlearn/MLRepository.html), ACM KDD (http://www.sigkdd.org/kddcup/).
                                </li>
                            </ul>
                            <p> Pembahasan <b> Kedua </b> adalah mengenai tujuan dataset. Dewasa ini penelitian yang dilakukan pada bidang illmu data mining adalah menguji metode yang dikembangkan oleh peneliti dengan public dataset. Sehingga penelitian tersebut dapat bersifat <i> comparable </i>, <i> repeatable </i>, dan <i> verifiable </i>.</p>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                2. Dataset Apel Malang
                            </h4>
                        </div>
                    </a>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body text-justify">
                            <p>Pada aplikasi ini, terdapat dataset apel malang yang berjumlah 100 Data. Dari dataset tersebut akan diekstrak atau dibagi menjadi Data Latih ( <i>Training</i> ) dan Data Uji ( <i>Testing</i> ). </p>
                            <p>Dataset ini merupakan hasil dari ekstraksi citra buah apel berjenis Manalagi dan Greensmith. Dari citra tersebut dilakukan ekstraksi untuk diambil nilai <b>Mean</b>, <b>Skewness</b>, dan <b>Kurtosis</b>.</p>
                            <p>Untuk pembagian dataset tersebut dapat di lihat pada tabel dibawah ini:</p>

                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Pembagian</th>
                                        <th scope="col">Data</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Data Latih</td>
                                        <td>80 data</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Data Uji</td>
                                        <td>20 data</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td class="text-bold">Jumlah</td>
                                        <td class="text-bold">100 data</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                3. Kernel dan Margin
                            </h4>
                        </div>
                    </a>
                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <div class="card-body text-justify">
                            <ul>
                                <li>
                                    <p>Kernel adalah pola teknik yang dilakukan untuk memisahkan data menjadi 2 atau 3 bagian. Fungsi kernel yang biasanya dipakai dalam SVM:</p>
                                    <img src="<?= base_url() ?>assets/dist/img/kernel.png" width="300px" alt="kernel-svm">
                                    <!-- <ul>
                                        <li>Linear: x^Tx,</li>
                                        <li>Polinomial: (𝑥^T𝑥𝑖 + 1)^p,</li>
                                        <li>Radial Basis Function (RBF): xTx,</li>
                                        <li>Linear: xTx,</li>
                                    </ul> -->
                                    <img src="<?= base_url() ?>assets/dist/img/svm.png" width="600px" alt="gambar-kernel">
                                </li>
                                <li>
                                    <p>Margin adalah Jarak(Gap) antara 2 kelas atau lebih terhadap garis pemisah / classifier(hyperplane). Hyperplane pemisah terbaik antara kedua kelas dapat ditemukan dengan mengukur margin hyperplane tersebut dan mencari titik maksimalnya.</p>
                                    <img src="<?= base_url() ?>assets/dist/img/margin.png" width="500px" alt="gambar-kernel">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                4. Metode perhitungan SVM
                            </h4>
                        </div>
                    </a>
                    <div id="collapseFive" class="collapse" data-parent="#accordion">
                        <div class="card-body text-justify">
                            <ul>
                                <li>
                                    <p>1. Tentukan model SVM yang akan dipakai, semisal menggunakan <b>Sequential Minimal Optimization</b> (<b>SMO</b>) yang ada. sebagai contoh adalah SVM biasa atau bertipe linear. Jika dirasa tidak terlalu akurat menggunakan tipe linear, maka disarankan untuk mengganti dengan tipe non-linear.
                                        Beberapa tipe SVM non-linear seperti:
                                    <ul>
                                        <li>RBF (Radial Basis Function)</li>
                                        <li>Polynomial</li>
                                        <li>Sigmoid</li>
                                    </ul>
                                    </p>
                                </li>
                                <li>
                                    <p>2. Hitung data latih(<i>training</i>). Pada proses penghitungan, sistem akan menghitung hasil dari data training(<i>training</i>) dengan pengelompokan berdasarkan label.</p>
                                    <img src="<?= base_url() ?>assets/dist/img/training.png" alt="">
                                </li>
                                <li>
                                    <p>3. Setelah itu masuk ke fungsi prediksi, pada fungsi prediksi dibutuhkan sebuah data uji(<i>testing</i>). Data uji(<i>testing</i>) ini digunakan untuk tes data klasifikasi berdasarkan data latih(<i>training</i>). Data yang digunakan untuk perulangan dalam proses prediksi diambil dari
                                        Hasil nilai margin, nilai tersebut menentukan hasil pada fungsi prediksi.
                                    </p>
                                    <img src="<?= base_url() ?>assets/dist/img/prediksi.png" alt="fungsi-prediksi">
                                </li>
                                <li>
                                    <p>4. Pada proses klasifikasi, hasil dari proses prediksi tergantung kepada keakuratan data dan banyak data referensi sebagai data latih(<i>training</i>) atau pembelajar dari sistem tersebut.</p>
                                </li>
                                <li>
                                    <p>5. Hasil dari proses klasifikasi berupa <i>array()</i>. <i>array()</i> tersebut disusun dengan cara di <i>looping</i> untuk menampilkan seluruh hasil klasifikasi.</p>
                                </li>
                                <li>
                                    <p>6. Dari hasil yang telah jadi. Dicari perbandingan antara data hasil klasifikasi dengan data testing yang berfungsi untuk menyamakan kelas. Jika kelas sebelum klasifikasi dan setelah klasifikasi hasil-nya tetap, maka klasifikasi berhasil. Jika tidak, berarti data kurang akurat.
                                        Proses ini disebut dengan mencari akurasi dari <i>machine learning</i> menggunakan metode SVM tersebut.
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseSix">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                5. Daftar referensi
                            </h4>
                        </div>
                    </a>
                    <div id="collapseSix" class="collapse" data-parent="#accordion">
                        <div class="card-body text-justify">
                            <ul>
                                <li>[1] Ritonga, Alven Safik dan Endah Supeni Purwaningsih. 2018. PENERAPAN METODE SUPPORT VECTOR MACHINE (SVM) DALAM KLASIFIKASI KUALITAS PENGELASAN SMAW (SHIELD METAL ARC WELDING).
                                    Jurnal Ilmiah Edutic /Vol.5, No.1, November 2018. Universitas Wijaya Putra. </li>
                                <li>[2] Platt, John. Fast Training of Support Vector Machines using Sequential Minimal Optimization, in Advances in Kernel Methods – Support Vector Learning, B. Scholkopf, C. Burges,
                                    A. Smola, eds., MIT Press (1998).</li>
                                <li>[3] B.E. Boser, I.M. Guyon and V.N. Vapnik, " A Training Algorithm for Optimal Margin Classifiers", Proc. Fifth Ann. Workshop Computational Learning Theory, pp. 144-152, 1992.</li>
                                <li>[4] B. Schlkopf, C.J.C. Burges and A.J. Smola, Advances in Kernel MethodsSupport Vector Learning, Cambridge, Mass, 1998.</li>
                                <li>[5] C.J.C. Burges, "Simplified Support Vector Decision Rules", Proc. 13th Int'l Conf. Machine Learning, pp. 71-77, 1996.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>