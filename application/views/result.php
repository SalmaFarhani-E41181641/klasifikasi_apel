<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul; ?></h1>
                    <div class="card-tools mt-2">
                        <a href="<?= base_url('Classified/classify') ?>" class="btn btn-sm btn-success">
                            <i class="fas fa-redo"></i> Uji kembali</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                            <a href="<?= base_url('classified'); ?>" class="btn btn-sm btn-default">
                                <i class="fas fa-arrow-circle-left"></i> Kembali</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="uji" class="table table-bordered table-striped">
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
                                        <!-- <td>Greensmith</td> -->
                                        <!-- <td width="50px"><?= $name['Kelas_Apel']; ?></td> -->
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
                            <?php
                            $ambil = $this->db->query("SELECT * FROM pengujian")->result_array();
                            $BN = $SL = $BR = $SH = $KS = 0;

                            foreach ($ambil as $d) {
                                if ($d['Kelas_Asli'] == "Manalagi" && $d['Hasil'] == "-1") {
                                    $BN++;
                                } elseif ($d['Kelas_Asli'] == "Manalagi" && $d['Hasil'] == "1") {
                                    $SL++;
                                } elseif ($d['Kelas_Asli'] == "Green Smith" && $d['Hasil'] == "1") {
                                    $BR++;
                                } elseif ($d['Kelas_Asli'] == "Green Smith" && $d['Hasil'] == "-1") {
                                    $SH++;
                                } else {
                                    $KS++;
                                }
                            }

                            foreach ($ambil as $s) {
                                if ($s['Kelas_Asli'] == "-1" && $s['Hasil'] == "-1") {
                                    $BN++; // Benar
                                } elseif ($s['Kelas_Asli'] == "-1" && $s['Hasil'] == "1") {
                                    $SL++; // Salah
                                } elseif ($s['Kelas_Asli'] == "1" && $s['Hasil'] == "1") {
                                    $BR++; // Benar
                                } elseif ($s['Kelas_Asli'] == "1" && $s['Hasil'] == "-1") {
                                    $SH++; // Salah
                                } else {
                                    $KS++; // Jika Kosong
                                }
                            }
                            ?>
                            <tfoot>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Penguji</th>
                                    <th>Hasil</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="container akurasi mt-3">
                        <div class="card">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col" class="text-center">Jumlah Data Uji</th>
                                        <th scope="col" class="text-center">Jumlah data <b>tepat</b></th>
                                        <th scope="col" class="text-center">Jumlah data <b>tidak tepat</b></th>
                                        <th scope="col" class="text-center">Akurasi SVM</th>
                                        <th scope="col" class="text-center">Laju Error</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $data_uji = count($hasil);
                                    $data_tepat = ($BN + $BR);
                                    $data_tidak_tepat = ($SL + $SH);
                                    $akurasi = ($data_tepat / $data_uji) * 100;
                                    $error = ($data_tidak_tepat / $data_uji) * 100;
                                    ?>
                                    <tr>
                                        <td class="text-center"><?= $data_uji ?> data</td>
                                        <td class="text-center"><?= $data_tepat ?> data</td>
                                        <td class="text-center"><?= $data_tidak_tepat ?> data</td>
                                        <td class="text-center bg-success"><?= $akurasi ?> %</td>
                                        <td class="text-center bg-danger"><?= $error ?> %</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <!-- <div class="container">
        <div id="printdiv">
            <?php
            // print "<pre>";
            // print $hasil;
            // print "</pre>";
            ?>
            <?php
            foreach ($hasil as $h) {
            ?>
                <label for="alert alert-success"><?= $h; ?> => <?php if ($h == "1") {
                                                                    echo "Green Smith";
                                                                } else {
                                                                    echo "Manalagi";
                                                                } ?> </label><br>
            <?php } ?>
        </div>
    </div> -->
</div>