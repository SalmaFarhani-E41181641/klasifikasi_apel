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
            <div class="col-lg-5 col-md-3 col-sm-4 text-center">
                <img src="<?= base_url(); ?>assets/dist/icon/qa.svg" width="600" alt="halo">
            </div>
            <div class="col-lg-7" id="accordion">
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseZero">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                0. Tentang SVM
                            </h4>
                        </div>
                    </a>
                    <div id="collapseZero" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            Pelajari cara kerja sistem dengan metode SVM ini. <a class="btn btn-info" href="<?= base_url('about') ?>"><i class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                1. Data Training
                            </h4>
                        </div>
                    </a>
                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            Masukkan data training sebelum memasukkan data testing. <a class="btn btn-info" href="<?= base_url('training') ?>"><i class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseTwo">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                2. Data Testing
                            </h4>
                        </div>
                    </a>
                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            Setelah data training telah dimasukkan, selanjutnya masukkan data testing. <a class="btn btn-info" href="<?= base_url('testing') ?>"><i class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseThree">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                3. Kelas Klasifikasi
                            </h4>
                        </div>
                    </a>
                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            Kelas klasifikasi adalah halaman untuk melakukan pengujian sistem, menguji klasifikasi hasil dari data training dan data testing. <a class="btn btn-info" href="<?= base_url('classified') ?>"><i class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseFour">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                4. Hasil Laporan dan cetak laporan
                            </h4>
                        </div>
                    </a>
                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            Laporan merupakan hasil dari beberapa pengujian yang telah dilakukan, bisa dilakukan cetak dokumen. <a class="btn btn-info" href="<?= base_url('report') ?>"><i class="fas fa-external-link-alt"></i></a>
                        </div>
                    </div>
                </div>
                <div class="card card-primary card-outline">
                    <a class="d-block w-100" data-toggle="collapse" href="#collapseFive">
                        <div class="card-header">
                            <h4 class="card-title w-100">
                                5. Selesai
                            </h4>
                        </div>
                    </a>
                    <div id="collapseFive" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            Pastikan cara yang telah dilakukan urut sesuai urutan. Terima kasih <i class="far fa-smile"></i> .
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mt-3 text-center">
                <p class="lead">
                    <a class="btn btn-sm btn-info" href="<?= base_url('contact') ?>">Kelompok 25 <i class="fas fa-external-link-alt"></i></a>
                </p>
            </div>
        </div>
    </section>
</div>