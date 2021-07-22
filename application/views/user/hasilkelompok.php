<!--- Banner Hero section ------->
<!-- <section class="banner">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <p class="promo-title">Selamat Datang di Sistem Informasi Klasifikasi Apel Malang dengan menggunakan Metode SVM!</p>
          <p class="join-title">Gabung <a class="link-play" href="<?= base_url('Authh'); ?>"><strong>Disini</strong></a> untuk mendapat akses dari kami. Untuk melihat mekanisme penggunaan aplikasi bisa ke <a class="link-play" href="#panduan"><strong>Panduan</strong></a>.</p>
          <a href="#" class="link-play">
            <img src="<?= base_url('assets/user/') ?>svg/play.svg" alt="" class="play-btn">Tonton Tutorial
          </a>
        </div>
        <div class="col-md-6">
          <img src="<?= base_url('assets/user/') ?>svg/undraw_Hello_re_3evm.svg" alt="" class="img-fluid">
        </div>
      </div>
    </div>
    <img src="<?= base_url('assets/user/') ?>images/ground@-min.png" class="bottom-img" alt="">
  </section> -->
<!--- Services ---->
<section id="panduan">
  <div class="container text-center">
    <h3 class="title text-center">KLASIFIKASI KELOMPOK</h3>
    <img src="<?= base_url('assets/user/') ?>svg/undraw_Web_search_re_efla.svg" class="service-img pb-4" style="width:20% !important;" alt=""><br>
    <div class="row pt-4">
      <div class="col-md-6">
        <!-- Info Boxes Style 2 -->
        <div class="info-box mb-3 bg-light shadow">
          <span class="info-box-icon">Data Latih:</span><br>
          <span class="info-box-number"><?= $jumlah_training ?></span>
          <!-- /.info-box-content -->
        </div>
      </div>
      <div class="col-md-6">
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-light shadow">
          <span class="info-box-icon">Kelas Klasfikasi:</span><br>
          <span class="info-box-number"><?= $jumlah_kelas['kelas'] ?></span>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
    </div>
    <div class="card-body">
      <table id="test" class="table table-bordered table-striped">
        <thead>
          <tr class="text-center">
            <th>No</th>
            <th>Kelas Asli</th>
            <th>Kelas Hasil</th>
            <th>Mean_H</th>
            <th>Mean_S</th>
            <th>Mean_I</th>
            <th>Skewness_H</th>
            <th>Skewness_S</th>
            <th>Skewness_I</th>
            <th>Kurtosis_H</th>
            <th>Kurtosis_S</th>
            <th>Kurtosis_I</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php
          foreach ($testing as $p) :
            $id = $p->id_testing;
            $kelas = $p->Kelas_Apel;
            $hasil = $p->Kelas_Hasil;
            $mean_h = $p->Mean_H;
            $mean_s = $p->Mean_S;
            $mean_i = $p->Mean_I;
            $skewness_h = $p->Skewness_H;
            $skewness_s = $p->Skewness_S;
            $skewness_i = $p->Skewness_I;
            $kurtosis_h = $p->Kurtosis_H;
            $kurtosis_s = $p->Kurtosis_S;
            $kurtosis_i = $p->Kurtosis_I;
          ?>
            <tr>
              <td class="text-center" width="100px"><?= $no; ?></td>
              <td class="text-center bg-<?php if ($kelas == 'Manalagi') {
                                          echo 'warning';
                                        } else {
                                          echo 'info';
                                        } ?>"><b><?= $kelas ?></b></td>
              <td class="text-center bg-<?php if ($hasil == $kelas) {
                                          echo 'success';
                                        } else {
                                          echo 'danger';
                                        } ?>"><b><?= $hasil ?></b></td>
              <td><?= number_format($mean_h, 3, '.', '.'); ?></td>
              <td><?= number_format($mean_s, 3, '.', '.'); ?></td>
              <td><?= number_format($mean_i, 3, '.', '.'); ?></td>
              <td><?= number_format($skewness_h, 3, '.', '.'); ?></td>
              <td><?= number_format($skewness_s, 3, '.', '.'); ?></td>
              <td><?= number_format($skewness_i, 3, '.', '.'); ?></td>
              <td><?= number_format($kurtosis_h, 3, '.', '.'); ?></td>
              <td><?= number_format($kurtosis_s, 3, '.', '.'); ?></td>
              <td><?= number_format($kurtosis_i, 3, '.', '.'); ?></td>
            </tr>
            <?php $no++ ?>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr class="text-center">
            <th>No</th>
            <th>Kelas</th>
            <th>Mean_H</th>
            <th>Mean_S</th>
            <th>Mean_I</th>
            <th>Skewness_H</th>
            <th>Skewness_S</th>
            <th>Skewness_I</th>
            <th>Kurtosis_H</th>
            <th>Kurtosis_S</th>
            <th>Kurtosis_I</th>
            <th class="text-center" width="150px">Aksi</th>
          </tr>
        </tfoot>
      </table>

      <div class="row">
        <div style="border-color:green; color:black !important;" class="card-hasil mt-5 animate__animated animate__bounceIn col-md-6">
          <span>Akurasi Berhasil:</span><br>
          <span>
            <?php
            $hitung = $jmlberhasil['berhasil'] / $jmlhasil['hasil'] * 100;
            echo $hitung . "%";
            ?>
          </span>
        </div>
        <div style="border-color:red; color:black !important;" class="card-hasil mt-5 animate__animated animate__bounceIn col-md-6">
          <span>Akurasi Gagal:</span><br>
          <span>
            <?php
            $hitung1 = $jmlgagal['gagal'] / $jmlhasil['hasil'] * 100;
            echo $hitung1 . "%";
            ?>
          </span>
        </div>
      </div>
    </div>
    <!-- /.card-body -->
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
<!-- Footer ------>
<section id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6 footer-box">
        <p class="text-white"><b>SIKAPEL</b></p>
        <p>SIKAPEL adalah Sistem Informasi Klasifikasi Apel Malang yang menggunakan Metode Support Vector Machine (SVM).
        </p>
      </div>
      <div class="col-md-6 footer-box">
        <p id="kontak"><b>KONTAK KAMI</b></p>
        <p><i class="fa fa-map-marker"></i>Jember</p>
        <p><i class="fa fa-phone"></i>+62 838 5210 9582</p>
        <p><i class="fa fa-envelope-o"></i>sikapel@gmail.com</p>
      </div>
      <div class="col-md-6 ">
        <p class="copyright">Copyright © 2021. SIKAPEL | Designed by <a href="https://www.salvatoremandis.it/index-eng.html">Salvatore Mandis</a></p>
      </div>
    </div>
    <br>
  </div>
</section>
<!--- Smooth Scroll js ---------->
<script type="text/javascript" src="<?= base_url('assets/user/') ?>js/smooth-scroll.js"></script>
<script>
  var scroll = new SmoothScroll('a[href*="#"]');
</script>
</body>

</html>