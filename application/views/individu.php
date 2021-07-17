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
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active"><?= $judul; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container">
        <p class="mb-3 p-2 rounded text-center alert alert-secondary"><i class="fas fa-info-circle"></i> Halaman ini digunakan untuk menguji kelas data untuk dilakukan klasifikasi berdasarkan pada kelas dataset menggunakan metode SVM.</p>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-light shadow alert-sm" role="alert">
                    <div class="row justify-content-center">
                        <div class="col-lg-2 col-md-3 col-sm-4 text-center">
                            <img src="<?= base_url(); ?>assets/dist/icon/search.svg" width="150" alt="halo">
                        </div>
                        <div class="col-lg-12 col-md-9 col-sm-8 p-4 text-center">
                            <h6 class="alert-heading">
                                <b>Sistem Informasi Klasifikasi Apel Malang dengan menggunakan Metode SVM!</b>
                            </h6>
                            <a href="<?= base_url('guide')?>" class="btn btn-info" style="text-decoration: none;"><i class="fas fa-download"></i> Download Dataset Uji</a>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <!-- Info Boxes Style 2 -->
                                <div class="info-box mb-3 bg-light shadow">
                                    <span class="info-box-icon"><i class="fas fa-server"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Data Latih</span>
                                        <span class="info-box-number"><?= $jumlah_training ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div>
                            <div class="col-md-3">
                                <!-- /.info-box -->
                                <div class="info-box mb-3 bg-light shadow">
                                    <span class="info-box-icon"><i class="fas fa-flask"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Data Uji</span>
                                        <span class="info-box-number"><?= $jumlah_testing ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div>
                            <div class="col-md-3">
                                <!-- /.info-box -->
                                <div class="info-box mb-3 bg-light shadow">
                                    <span class="info-box-icon"><i class="fas fa-vials"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Uji</span>
                                        <span class="info-box-number"><?= $jumlah_uji['uji'] ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                            </div>
                            <div class="col-md-3">
                                <!-- /.info-box -->
                                <div class="info-box mb-3 bg-light shadow">
                                    <span class="info-box-icon"><i class="fab fa-leanpub"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Kelas Klasfikasi</span>
                                        <span class="info-box-number"><?= $jumlah_kelas['kelas'] ?></span>
                                    </div>
                                    <!-- /.info-box-content -->
                                </div>
                                <!-- /.info-box -->
                            </div>
                        </div>
                    </div>
                    <!-- <hr> -->
                    <form action="<?php echo base_url() . 'Classified/individu' ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kelas" class="badge badge-primary">Form Data Uji</label>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="mean_h">Nilai Mean_H</label>
                                        <input type="text" id="mean_h" name="mean_h" class="form-control" placeholder="Nilai Data">
                                        <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                        <?= form_error('mean_h', '<small class="text-danger col-md">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="mean_s">Nilai Mean_S</label>
                                        <input type="text" id="mean_s" name="mean_s" class="form-control" placeholder="Kelas Data">
                                        <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                        <?= form_error('mean_s', '<small class="text-danger col-md">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="mean_i">Nilai Mean_I</label>
                                        <input type="text" id="mean_i" name="mean_i" class="form-control" placeholder="Nilai Data">
                                        <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                        <?= form_error('mean_i', '<small class="text-danger col-md">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="skewness_h">Nilai Skewness_H</label>
                                        <input type="text" id="skewness_h" name="skewness_h" class="form-control" placeholder="Nilai Data">
                                        <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                        <?= form_error('skewness_h', '<small class="text-danger col-md">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="skewness_s">Nilai Skewness_S</label>
                                        <input type="text" id="skewness_s" name="skewness_s" class="form-control" placeholder="Nilai Data">
                                        <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                        <?= form_error('skewness_s', '<small class="text-danger col-md">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="skewness_i">Nilai Skewness_I</label>
                                        <input type="text" id="skewness_i" name="skewness_i" class="form-control" placeholder="Nilai Data">
                                        <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                        <?= form_error('skewness_i', '<small class="text-danger col-md">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kurtosis_h">Nilai Kurtosis_H</label>
                                        <input type="text" id="kurtosis_h" name="kurtosis_h" class="form-control" placeholder="Nilai Data">
                                        <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                        <?= form_error('kurtosis_h', '<small class="text-danger col-md">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="kurtosis_s">Nilai Kurtosis_S</label>
                                        <input type="text" id="kurtosis_s" name="kurtosis_s" class="form-control" placeholder="Nilai Data">
                                        <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                        <?= form_error('kurtosis_s', '<small class="text-danger col-md">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="kurtosis_i">Nilai Kurtosis_I</label>
                                        <input type="text" id="kurtosis_i" name="kurtosis_i" class="form-control" placeholder="Nilai Data">
                                        <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                        <?= form_error('kurtosis_i', '<small class="text-danger col-md">', '</small>'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" value="reset"><i class="fas fa-eraser"></i> Reset</button>
                            <button type="submit" value="submit" class="btn btn-primary"><i class="fas fa-vials"></i> Uji Data</button>
                        </div>
                    </form>
                    <p>Untuk mengetahui algoritma dari metode SVM bisa ke <a style="text-decoration:none;" class="text-primary" href="<?= base_url('about'); ?>"> <i class="fas fa-external-link-alt"></i> Tentang SVM</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>