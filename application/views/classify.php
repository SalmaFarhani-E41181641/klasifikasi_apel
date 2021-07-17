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
            <div class="col-md-8">
                <div class="alert alert-light shadow alert-sm" role="alert">
                    <div class="row justify-content-center">
                        <div class="col-lg-2 col-md-3 col-sm-4 text-center">
                            <img src="<?= base_url(); ?>assets/dist/icon/search.svg" width="150" alt="halo">
                        </div>
                        <div class="col-lg-12 col-md-9 col-sm-8 p-4 text-center">
                            <h6 class="alert-heading">
                                <b>Sistem Informasi Klasifikasi Apel Malang dengan menggunakan Metode SVM!</b>
                            </h6>
                        </div>
                    </div>
                    <!-- <hr> -->
                    <p class="mb-0 p-2 rounded alert alert-warning"><i class="fas fa-info-circle"></i>
                        Perhatikan keterangan tombol dibawah ini:
                    <ul>
                        <li>Tombol <b>Hitung</b> digunakan untuk menghitung klasifikasi kelas data</li>
                        <!-- <li>Tombol <b>Grafik</b> digunakan untuk melihat hasil klasifikasi kelas data</li> -->
                    </ul>
                    <small class="text-success">Untuk memulai pengujian data
                        <!-- ataupun melihat grafik -->
                        dapat dilakukan dengan cara klik
                        <!-- salah satu  -->
                        tombol dibawah
                    </small>
                    </p>
                    <hr>
                    <div class="bg-light text-center shadow rounded p-3 mb-4">
                        <?php
                            /** Periksa apa ada data di tabel */
                            $tabel = $this->db->query("SELECT pengujian.jenis_pengujian FROM pengujian")->num_rows();

                            /** Ambil id terakhir */
                            $getID = $this->db->query("SELECT pengujian.jenis_pengujian FROM pengujian ORDER BY jenis_pengujian DESC")->row_array();

                            if ($tabel > 0) :
                                $id_ps = autonumber($getID['jenis_pengujian'], 1, 8);
                            else :
                                $id_ps = 'U00000001';
                            endif;
                        ?>
                        <div class="button container-fluid">
                            <a href="<?= base_url('classify/'.$id_ps) ?>" style="text-decoration: none;" class="btn btn-primary ml-2 mr-2"><i class="fas fa-vials"></i> Hitung SVM</a>
                            <!-- atau
                            <a href="<?= base_url('graph') ?>" class="btn btn-info ml-2 mr-2" style="text-decoration: none;"><i class="fas fa-chart-line"></i> Lihat Grafik</a> -->
                        </div>
                    </div>
                    <p>Untuk mengetahui algoritma dari metode SVM bisa ke <a style="text-decoration:none;" class="text-primary" href="<?= base_url('about'); ?>"> <i class="fas fa-external-link-alt"></i> Tentang SVM</a>.</p>
                </div>
            </div>
            <div class="col-md-4">
                <!-- Info Boxes Style 2 -->
                <div class="info-box mb-3 bg-light shadow">

                    <div class="info-box-content">
                        <span class="info-box-text"><i class="fas fa-info-circle"></i> Keterangan data</span>
                    </div>
                </div>
                <div class="info-box mb-3 bg-light shadow">
                    <span class="info-box-icon"><i class="fas fa-server"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Data Latih</span>
                        <span class="info-box-number"><?= $jumlah_training ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-light shadow">
                    <span class="info-box-icon"><i class="fas fa-flask"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Data Uji</span>
                        <span class="info-box-number"><?= $jumlah_testing ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
                <div class="info-box mb-3 bg-light shadow">
                    <span class="info-box-icon"><i class="fas fa-vials"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Total Uji</span>
                        <span class="info-box-number"><?= $jumlah_uji['uji'] ?></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
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
</div>