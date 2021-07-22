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
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <img src="<?= base_url('assets/user/') ?>svg/undraw_Web_search_re_efla.svg" class="service-img pb-4" style="width:20% !important;" alt=""><br>
    <a href="<?= base_url('Klasifikasi/dataset') ?>" target="_blank" class="btn btn-primary text-white mr-3" name="button">Unduh Data Uji</a>
    <a href="<?= base_url('template') ?>" target="_blank" class="btn btn-primary text-white" name="button">Unduh Template</a>
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
    <form action="<?= base_url() . 'Klasifikasi/batch' ?>" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <p class="mb-2 rounded alert alert-dark"><i class="fa fa-info-circle"></i> Import digunakan untuk menambahkan lebih dari satu file berformat EXCEL (.xlx atau .xlsx).</p>
        <div class="form-group mb-3">
          <label for="file"><b>File Import</b></label>
          <div class="custom-file">
            <input type="file" oninput="showFileName(this, '#labelfile')" name="excel" class="custom-file-input" id="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
            <label id="labelfile" class="custom-file-label" for="file">Unggah file</label>
          </div>
          <small class="form-text text-success">Unggah file excel. *maximal ukuran 2mb</small>
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="reset" class="btn btn-secondary" value="reset"><i class="fa fa-eraser"></i> Reset</button> -->
        <button type="submit" class="btn-uji"><i class="fa fa-upload"></i> Unggah Data</button>
      </div>
    </form>
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