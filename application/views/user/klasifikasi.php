<!--- Banner Hero section ------->
<section class="banner pt-1">
  <img src="<?= base_url('assets/user/') ?>images/ground@-min.png" class="bottom-img" alt="">
</section>
<!--- Services ---->
<section id="panduan" class="pt-1">
  <div class="container text-center">
    <h3 class="title text-center">KLASIFIKASI INDIVIDU</h3>
    <img src="<?= base_url('assets/user/') ?>svg/undraw_Web_search_re_efla.svg" class="service-img pb-4" style="width:20% !important;" alt=""><br>
    <a href="<?= base_url('Klasifikasi/dataset') ?>" target="_blank" class="btn btn-primary text-white" name="button">Unduh Data Uji</a><br><br>
    <a href="<?= base_url(); ?>Klasifikasi/kelompok" class="btn btn-primary"><i class="fa fa-area-chart"></i> KLASIFIKASI KELOMPOK</a>
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
    <form action="<?= base_url() ?>Klasifikasi/individu" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
          <label for="kelas" class="badge badge-warning text-white">Form Data Uji</label>
        </div>
        <div class="row text-left">
          <div class="col-md-4">
            <div class="form-group">
              <label for="mean_h">Nilai Mean_H</label>
              <input type="text" id="mean_h" name="mean_h" class="form-control inputan" placeholder="Nilai Data">
              <small class="form-text text-success">Isian: berupa Nilai Data</small>
              <?= form_error('mean_h', '<small class="text-danger col-md">', '</small>'); ?>
            </div>
            <div class="form-group">
              <label for="mean_s">Nilai Mean_S</label>
              <input type="text" id="mean_s" name="mean_s" class="form-control inputan" placeholder="Kelas Data">
              <small class="form-text text-success">Isian: berupa Nilai Data</small>
            </div>
            <div class="form-group">
              <label for="mean_i">Nilai Mean_I</label>
              <input type="text" id="mean_i" name="mean_i" class="form-control inputan" placeholder="Nilai Data">
              <small class="form-text text-success">Isian: berupa Nilai Data</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="skewness_h">Nilai Skewness_H</label>
              <input type="text" id="skewness_h" name="skewness_h" class="form-control inputan" placeholder="Nilai Data">
              <small class="form-text text-success">Isian: berupa Nilai Data</small>
            </div>
            <div class="form-group">
              <label for="skewness_s">Nilai Skewness_S</label>
              <input type="text" id="skewness_s" name="skewness_s" class="form-control inputan" placeholder="Nilai Data">
              <small class="form-text text-success">Isian: berupa Nilai Data</small>
            </div>
            <div class="form-group">
              <label for="skewness_i">Nilai Skewness_I</label>
              <input type="text" id="skewness_i" name="skewness_i" class="form-control inputan" placeholder="Nilai Data">
              <small class="form-text text-success">Isian: berupa Nilai Data</small>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="kurtosis_h">Nilai Kurtosis_H</label>
              <input type="text" id="kurtosis_h" name="kurtosis_h" class="form-control inputan" placeholder="Nilai Data">
              <small class="form-text text-success">Isian: berupa Nilai Data</small>
            </div>
            <div class="form-group">
              <label for="kurtosis_s">Nilai Kurtosis_S</label>
              <input type="text" id="kurtosis_s" name="kurtosis_s" class="form-control inputan" placeholder="Nilai Data">
              <small class="form-text text-success">Isian: berupa Nilai Data</small>
            </div>
            <div class="form-group">
              <label for="kurtosis_i">Nilai Kurtosis_I</label>
              <input type="text" id="kurtosis_i" name="kurtosis_i" class="form-control inputan" placeholder="Nilai Data">
              <small class="form-text text-success">Isian: berupa Nilai Data</small>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" id="btn-reset" class="btn btn-secondary" style="border: none; border-radius: 20px;" value="reset"><i class="fa fa-eraser"></i> Reset</button>
          <div id="button-area">
            <button type="button" onclick="checkInput()" class="btn-uji"><i class="fa fa-area-chart"></i> Uji Data</button>
          </div>
        </div>

    </form>
    <div id="hasil">
      
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