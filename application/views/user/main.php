  <!--- Banner Hero section ------->
  <section class="banner">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p class="promo-title">Sistem Informasi Klasifikasi Apel Malang dengan menggunakan Metode SVM!</p>
          <p class="join-title">
            Halo, Selamat Datang di <b>SIKAPEL</b>. Untuk melihat mekanisme penggunaan aplikasi bisa ke <a class="link-play" href="#panduan"><strong>Panduan</strong></a>.</p>
          <a class="nav-link btn-klas" align="center" href="<?= base_url() ?>Klasifikasi"><b>Mulai Uji</b></a>
          <a href="#" class="link-play">
            <img src="<?= base_url('assets/user/') ?>svg/play.svg" alt="" class="play-btn">Tonton Tutorial
          </a>
        </div>
        <div class="col-md-6">
          <img src="<?= base_url('assets/user/') ?>svg/undraw_Hello_re_3evm.svg" alt="" class="img-fluid">
        </div>
      </div>
    </div>
    <!--- Background wave Hero ---->
    <img src="<?= base_url('assets/user/') ?>images/ground@-min.png" class="bottom-img" alt="">
  </section>

  <!--- Services ---->
  <section id="panduan">
    <div class="container text-center">
      <h3 class="title text-center">PANDUAN</h3>
      <div class="row text-center">
        <div class="col-md-4 services">
          <img src="<?= base_url('assets/user/') ?>svg/undraw_Profile_data_re_v81r.svg" class="service-img" alt="">
          <h4>Akses</h4>
          <p>Anda dapat mengakses website ini tanpa login dengan fitur-fitur yang tersedia seperti Panduan, Tentang SVM, dan halaman Pengujian.
          </p>
        </div>
        <div class="col-md-4 services">
          <img src="<?= base_url('assets/user/') ?>svg/undraw_knowledge_g5gf.svg" class="service-img" alt="">
          <h4>Kerja Sistem</h4>
          <p>Pelajari cara kerja sistem ini dengan menggunakan metode Support Vector Machine <a class="link-a" href="<?= base_url(); ?>Main#tentangsvm">disini</a>.
          </p>
        </div>
        <div class="col-md-4 services">
          <img src="<?= base_url('assets/user/') ?>svg/undraw_Data_re_80ws.svg" class="service-img" alt="">
          <h4>Data</h4>
          <p>Data yang dimasukkan adalah data nilai Mean, Skewness, dan Kurtosis hasil HSI. Kami telah menyediakan dataset uji, Anda bisa mengunduhnya <a class="link-a" href="<?= base_url('dataset') ?>" target="_blank">disini</a>.
          </p>
        </div>
        <div class="col-md-4 services">
          <img src="<?= base_url('assets/user/') ?>svg/undraw_All_the_data_re_hh4w.svg" class="service-img" alt="">
          <h4>Kelas Klasifikasi</h4>
          <p>Kelas klasifikasi adalah halaman untuk melakukan pengujian sistem. Klasifikasi dapat dilakukan dengan dua cara, yaitu secara individu dan kelompok. Metode yang digunakan yaitu metode Support Vector Machine. Anda dapat mengenal SVM <a class="link-a" href="#tentangsvm">disini</a>.
          </p>
        </div>
        <div class="col-md-4 services">
          <img src="<?= base_url('assets/user/') ?>svg/undraw_Data_extraction_re_0rd3.svg" class="service-img" alt="">
          <h4>Uji Individu</h4>
          <p>Di menu ini, Anda dapat menguji kelas data untuk dilakukan klasifikasi berdasarkan pada kelas dataset menggunakan metode SVM. Uji <a class="link-a" href="<?= base_url(); ?>Klasifikasi">disini</a>.
          </p>
        </div>
        <div class="col-md-4 services">
          <img src="<?= base_url('assets/user/') ?>svg/undraw_data_processing_yrrv.svg" class="service-img" alt="">
          <h4>Uji Kelompok</h4>
          <p>Di menu ini, Anda dapat menguji kelas data untuk dilakukan klasifikasi berdasarkan pada kelas dataset menggunakan metode SVM secara berkelompok dengan cara unggah file data yang akan diuji. Uji <a class="link-a" href="<?= base_url(); ?>Klasifikasi/kelompok">disini</a>.
          </p>
        </div>
      </div>
      <a href="<?= base_url(); ?>Klasifikasi" type="button" class="btn btn-primary" name="button">Mulai Uji</a>
    </div>
  </section>
  <!--- About Section ------>
  <section id="tentangsvm">
    <div class="container">
      <h3 class="title text-center">TENTANG SVM</h3>
      <div class="row">
        <div class="col-md-12" align="center">
          <img src="<?= base_url('assets/') ?>dist/img/svm_image.jpg" class="img-fluid" width="50%" alt="">
        </div>
        <div class="col-md-12 about">
          <p class="about-title" align="center"><i class="fa fa-info-circle"></i> Mengenal algoritma dari Support Vector Machine, berikut penjelasan singkatnya berdasarkan studi kasus Apel Malang.</p>
          <div class="col-lg-12" id="accordion">
            <div class="card card-primary card-outline">
              <a class="d-block w-90 tag-a" data-toggle="collapse" href="#collapseZero">
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
              <a class="d-block w-100 tag-a" data-toggle="collapse" href="#collapseTwo">
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
              <a class="d-block w-100 tag-a" data-toggle="collapse" href="#collapseThree">
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
              <a class="d-block w-100 tag-a" data-toggle="collapse" href="#collapseFour">
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
              <a class="d-block w-100 tag-a" data-toggle="collapse" href="#collapseFive">
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
              <a class="d-block w-100 tag-a" data-toggle="collapse" href="#collapseSix">
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

      </div>
    </div>
  </section>
  <!---  Testimonials Section  --->
  <section id="timkami">
    <div class="container">
      <h3 class="title text-center">TIM KAMI</h3>
      <div class="row offset-1">
        <div class="col-md-6 testimonials">
          <img src="<?= base_url('assets/user/') ?>images/testimonials/1.png" alt="">
          <p class="user-details"><b>Muhammad Arif Annaili Fitrawan</b><br>Ketua Kelompok</p>
          <p class="feedback"><b>Deskripsi</b>: E41181232 | Golongan C | TIF-18<br><b>Alamat</b>: Banyuwangi</p>
        </div>
        <div class="col-md-6 testimonials">
          <img src="<?= base_url('assets/user/') ?>images/testimonials/2.png" alt="">
          <p class="user-details"><b>Widya Wahyu Pramesti</b><br>Anggota Kelompok 1</p>
          <p class="feedback"><b>Deskripsi</b>: E41181728 | Golongan D | TIF-18<br><b>Alamat</b>: Banyuwangi</p>
        </div>
        <div class="col-md-6 testimonials">
          <img src="<?= base_url('assets/user/') ?>images/testimonials/2.png" alt="">
          <p class="user-details"><b>Salma Farhani</b><br>Anggota Kelompok 2</p>
          <p class="feedback"><b>Deskripsi</b>: E41181641 | Golongan C | TIF-18<br><b>Alamat</b>: Jember</p>
        </div>
        <div class="col-md-6 testimonials">
          <img src="<?= base_url('assets/user/') ?>images/testimonials/2.png" alt="">
          <p class="user-details"><b>Arini Firdausiyah</b><br>Anggota Kelompok 3<br></p>
          <p class="feedback"><b>Deskripsi</b>: E41182006 | Golongan D | TIF-18<br><b>Alamat</b>: Probolinggo</p>
        </div>
      </div>
    </div>
  </section>