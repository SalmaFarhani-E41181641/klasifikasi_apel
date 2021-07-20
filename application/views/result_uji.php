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
                        <li class="breadcrumb-item"><a href="<?=base_url()?>">Beranda</a></li>
                        <li class="breadcrumb-item active"><?= $judul; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
        <div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-purple">
                        <h3 class="card-title text-bold"><?= $judul; ?> Apel Malang dengan metode SVM</h3>
                        <div class="card-tools">
                            <a href="<?= base_url('individu'); ?>" class="btn btn-sm btn-default">
                                <i class="fas fa-arrow-circle-left"></i> Kembali</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tunggal" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Penguji</th>
                                    <th>Hasil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                $test = $this->db->get('data_testing')->result_array();
                                foreach ($hasil as $code) :
                                ?>
                                    <tr class="text-center">
                                        <td width="50px"><?= $no; ?></td>
                                        <td width="100px"><span class="badge badge-primary"><?= $this->session->userdata('name'); ?></span></td>
                                        <td width="200px" class="bg-<?php if ($code == "1") {
                                                                        echo "teal";
                                                                    } else {
                                                                        echo "warning";
                                                                    } ?>"> <i class="nav-icon fas fa-apple-alt"></i>
                                            <?php if ($code == "1") {
                                                echo "Green Smith";
                                            } else {
                                                echo "Manalagi";
                                            } ?></td>
                                    </tr>
                                    <?php $no++ ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Penguji</th>
                                    <th>Hasil</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <div class="container akurasi mt-3">
                    <div class="card text-center">
                        <p class="mt-3">Hasil Klasifikasi pada inputan individu menghasilkan kelas klasifikasi sebagai, <label for="Pengujian hasil"> <?php if ($code == "1") {
                                            echo "Green Smith";
                                        } else {
                                            echo "Manalagi";
                                        } ?></p></label>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>