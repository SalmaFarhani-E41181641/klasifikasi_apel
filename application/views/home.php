<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Beranda</h1>
                    <!-- <input type="email" name="em" id="em" value="<?= $this->session->userdata('email'); ?>"> -->
                </div><!-- /.col -->
                <!-- <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v1</li>
              </ol>
            </div>/.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="alert alert-primary shadow alert-sm" role="alert">
                        <div class="row">
                            <div class="col-lg-2 col-md-3 col-sm-4 text-center">
                                <img src="<?= base_url(); ?>assets/dist/icon/firmware.svg" width="150" alt="halo">
                            </div>
                            <div class="col-lg-10 col-md-9 col-sm-8 p-4">
                                <h6 class="alert-heading">Selamat Datang di
                                    <b>Sistem Informasi Klasifikasi Apel Malang dengan menggunakan Metode SVM!</b>
                                </h6>
                                <p>Halo, anda login sebagai <?php if ($this->session->userdata('role') == 1) {
                                                                echo "Administrator";
                                                            } ?>. Untuk melihat mekanisme <?php if ($this->session->userdata('role') == 1) {
                                                                                                echo "penggunaan aplikasi";
                                                                                            } else {
                                                                                                echo "pengujian sistem";
                                                                                            } ?> bisa ke <a style="text-decoration:none;" class="btn-sm btn-info" href="<?= base_url('guide'); ?>">Panduan</a> .</p>
                            </div>
                        </div>
                        <hr>
                        <p class="mb-0 p-2 rounded alert alert-warning"><i class="fas fa-info-circle"></i> Aplikasi ini merupakan hasil workshop sistem cerdas dari kelompok 25.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light shadow">
                        <div class="inner">
                            <h3><?= $jumlah_training ?></h3>
                            <p class="text-uppercase">
                                <center>Data Latih</center>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-server"></i>
                        </div>
                        <?php if ($user['id_role'] != '1') {?>
                            <a href="<?= base_url('#'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        <?php }else {?>
                            <a href="<?= base_url('training'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        <?php }?>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light shadow">
                        <div class="inner">
                            <h3><?= $jumlah_testing ?></h3>
                            <p>
                                <center>Data Uji</center>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-flask"></i>
                        </div>
                        <a href="<?= base_url('testing'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light shadow">
                        <div class="inner">
                            <h3><?= $jumlah_uji['uji'] ?></h3>
                            <p>
                                <center>Total Uji</center>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-vials"></i>
                        </div>
                        <?php if ($user['id_role'] != '1') {?>
                            <a href="<?= base_url('#'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        <?php }else {?>
                            <a href="<?= base_url('report'); ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        <?php }?>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-light shadow">
                        <div class="inner">
                            <h3><?= $jumlah_kelas['kelas'] ?></h3>
                            <p>
                                <center>Kelas Klasifikasi</center>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fab fa-leanpub"></i>
                        </div>
                        <a href="<?= base_url('#'); ?>" class="small-box-footer" data-toggle="modal" data-target="#DetailKelas">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col">
                    <?php 
                    $train= $this->db->get('data_testing')->result_array();
                    foreach ($train as $test) {
                        // for ($i=0; $i <= $test; $i++) { 
                            # code...
                            $col = array($test['Mean_H'], $test['Mean_S'], $test['Mean_I'],$test['Skewness_H'],$test['Skewness_S'],$test['Skewness_I'],$test['Kurtosis_H'],$test['Kurtosis_S'],$test['Kurtosis_I']);
                        // }
                        // return $col;
                    }
                    ?>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal Hapus Data -->
<div class="modal fade" id="DetailKelas">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Kelas Klasifikasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="text-center">
                    <?php foreach ($detail as $d ) {?>
                        <div class="col-md-6 float-left bg-<?php if ($d['Kelas_Apel'] == 'Manalagi') {
                            echo 'warning';
                        }else {
                            echo 'teal';
                        }?>">
                        <i class="fas fa-apple-alt mt-4 mb-2"></i>
                        <h4 class="mt-2 mb-4"><?= $d['Kelas_Apel']?></h4>
                    </div>
                    <?php }?>
                </div>
                <small class="text-success text-center">Jumlah Kelas klasifikasi berdasarkan data latih berjumlah ( <b><?= count($detail);?></b> )</small>
            </div>
        </div>
    </div>
</div>

