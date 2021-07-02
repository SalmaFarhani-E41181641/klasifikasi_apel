<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $judul; ?></h1>
                    <div class="card-tools mt-2">
                        <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalImport">
                            <i class="fas fa-plus-circle"></i> Import Excel</button>
                        <a href="<?= base_url('Training/export') ?>" class="btn btn-sm btn-info">
                            <i class="fas fa-upload"></i> Export Excel</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Home'); ?>">Home</a></li>
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
                    <div class="card-header bg-indigo">
                        <h3 class="card-title text-bold"><?= $judul; ?></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAdd">
                                <i class="fas fa-plus-circle"></i> Tambah</button>
                            <a href="<?= base_url('Home'); ?>" class="btn btn-sm btn-default">
                                <i class="fas fa-arrow-circle-left"></i> Kembali</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="training" class="table table-bordered table-striped">
                            <thead>
                                <?php if ($training == null) : ?>
                                    <!-- Jika Belum Terdapat data -->
                                    <div class="col-md">
                                        <div class="card-body text-center mt-4">
                                            <img src="<?= base_url('assets/dist/icon/noList.svg'); ?>" alt="noData" class="img-rounded img-responsive img-fluid" width="100">
                                        </div>
                                        <div class="card-body pt-0 mt-4">
                                            <h3 class="text-center text-bold text-muted">Belum terdapat data</h3>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Kelas Asli</th>
                                        <th>Kelas Klasifikasi</th>
                                        <th>Mean_H</th>
                                        <th>Mean_S</th>
                                        <th>Mean_I</th>
                                        <th>Skewness_H</th>
                                        <th>Skewness_S</th>
                                        <th>Skewness_I</th>
                                        <th>Kurtosis_H</th>
                                        <th>Kurtosis_S</th>
                                        <th>Kurtosis_I</th>
                                        <!-- <th>Data Hasil</th> -->
                                        <th class="text-center" width="150px">Aksi</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($training as $m) :
                                        $id = $m->id_training;
                                        $kelas_asli = $m->Kelas_Asli;
                                        $kelas_klasifikasi = $m->Kelas_Klasifikasi;
                                        $mean_h = $m->Mean_H;
                                        $mean_s = $m->Mean_S;
                                        $mean_i = $m->Mean_I;
                                        $skewness_h = $m->Skewness_H;
                                        $skewness_s = $m->Skewness_S;
                                        $skewness_i = $m->Skewness_I;
                                        $kurtosis_h = $m->Kurtosis_H;
                                        $kurtosis_s = $m->Kurtosis_S;
                                        $kurtosis_i = $m->Kurtosis_I;
                                ?>
                                    <tr>
                                        <td class="text-center" width="100px"><?= $no; ?></td>
                                        <td><?= $kelas_asli ?></td>
                                        <td><?= $kelas_klasifikasi ?></td>
                                        <td><?= $mean_h ?></td>
                                        <td><?= $mean_s ?></td>
                                        <td><?= $mean_i ?></td>
                                        <td><?= $skewness_h ?></td>
                                        <td><?= $skewness_s ?></td>
                                        <td><?= $skewness_i ?></td>
                                        <td><?= $kurtosis_h ?></td>
                                        <td><?= $kurtosis_s ?></td>
                                        <td><?= $kurtosis_i ?></td>
                                        <td class="card-tools text-center">
                                            <button class="btn btn-sm btn-primary m-2" data-toggle="modal" data-target="#modal-detail"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-sm btn-danger m-2" data-toggle="modal" data-target="#modal-hapus"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    <?php $no++ ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Kelas Asli</th>
                                    <th>Kelas Klasifikasi</th>
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
                            <?php endif; ?>
                            </tfoot>
                        </table>
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
</div>
<!-- /.content-wrapper -->

<!-- Modal Tambah -->
<div class="modal fade" id="modalAdd" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Tambah Data Latih</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() . 'Training/insert' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kelas">Kelas Data Latih</label>
                        <input type="text" id="kelas_asli" name="kelas_asli" class="form-control" placeholder="Kelas Data Latih">
                        <small class="form-text text-success">Contoh: <b>Manalagi</b> atau <b>Greensmith</b></small>
                        <?= form_error('kelas', '<small class="text-danger col-md">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas Data Klasifikasi</label>
                        <input type="text" id="kelas_klasifikasi" name="kelas_klasifikasi" class="form-control" placeholder="Kelas Data Klasifikasi">
                        <small class="form-text text-success">Contoh: <b>Manalagi</b> atau <b>Greensmith</b></small>
                        <?= form_error('kelas', '<small class="text-danger col-md">', '</small>'); ?>
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Tambah Import -->
<div class="modal fade" id="modalImport" tabindex="-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Tambah Data Latih</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() . 'Training/batch' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <p class="mb-2 rounded alert alert-dark"><i class="fas fa-info-circle"></i> Import digunakan untuk menambahkan lebih dari satu file berformat EXCEL (.xlx atau .xlsx).</p>
                    <div class="form-group mb-3">
                        <label for="file">File Import</label>
                        <div class="custom-file">
                            <input type="file" name="excel" class="custom-file-input" id="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            <label class="custom-file-label" for="file">Unggah file</label>
                        </div>
                        <small class="form-text text-success">Unggah file excel. *maximal ukuran 2mb</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($training as $n) {
    $id = $n->id_training;
    $kelas_asli = $n->Kelas_Asli;
    $kelas_klasifikasi= $n->Kelas_Klasifikasi;
    $mean_h = $n->Mean_H;
    $mean_s = $n->Mean_S;
    $mean_i = $n->Mean_I;
    $skewness_h = $n->Skewness_H;
    $skewness_s = $n->Skewness_S;
    $skewness_i = $n->Skewness_I;
    $kurtosis_h = $n->Kurtosis_H;
    $kurtosis_s = $n->Kurtosis_S;
    $kurtosis_i = $n->Kurtosis_I;
?>
    <!-- Modal Edit -->
    
    <div class="modal fade" id="modalEdit<?= $id?>" tabindex="-1">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title">Edit Data Latih</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url() . 'Training/update' ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="kelas">Kelas Data Latih</label>
                            <input type="text" id="kelas_asli" name="kelas_asli" value="<?= $kelas_asli ?>" class="form-control" placeholder="Kelas Data Latih">
                            <small class="form-text text-success">Contoh: <b>Manalagi</b> atau <b>Greensmith</b></small>
                            <?= form_error('kelas', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas Data Klasifikasi</label>
                            <input type="text" id="kelas_klasifikasi" name="kelas_klasifikasi" value="<?= $kelas_klasifikasi ?>" class="form-control" placeholder="Kelas Data Klasifikasi">
                            <small class="form-text text-success">Contoh: <b>Manalagi</b> atau <b>Greensmith</b></small>
                            <?= form_error('kelas', '<small class="text-danger col-md">', '</small>'); ?>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mean_h">Nilai Mean_H</label>
                                    <input type="text" id="mean_h" name="mean_h" value="<?= $mean_h ?>" class="form-control" placeholder="Nilai Data">
                                    <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                    <?= form_error('mean_h', '<small class="text-danger col-md">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="mean_s">Nilai Mean_S</label>
                                    <input type="text" id="mean_s" name="mean_s" value="<?= $mean_s ?>" class="form-control" placeholder="Kelas Data">
                                    <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                    <?= form_error('mean_s', '<small class="text-danger col-md">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="mean_i">Nilai Mean_I</label>
                                    <input type="text" id="mean_i" name="mean_i" value="<?= $mean_i ?>" class="form-control" placeholder="Nilai Data">
                                    <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                    <?= form_error('mean_i', '<small class="text-danger col-md">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="skewness_h">Nilai Skewness_H</label>
                                    <input type="text" id="skewness_h" name="skewness_h" value="<?= $skewness_h ?>" class="form-control" placeholder="Nilai Data">
                                    <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                    <?= form_error('skewness_h', '<small class="text-danger col-md">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="skewness_s">Nilai Skewness_S</label>
                                    <input type="text" id="skewness_s" name="skewness_s" value="<?= $skewness_s ?>" class="form-control" placeholder="Nilai Data">
                                    <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                    <?= form_error('skewness_s', '<small class="text-danger col-md">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="skewness_i">Nilai Skewness_I</label>
                                    <input type="text" id="skewness_i" name="skewness_i" value="<?= $skewness_i ?>" class="form-control" placeholder="Nilai Data">
                                    <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                    <?= form_error('skewness_i', '<small class="text-danger col-md">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="kurtosis_h">Nilai Kurtosis_H</label>
                                    <input type="text" id="kurtosis_h" name="kurtosis_h" value="<?= $kurtosis_h ?>" class="form-control" placeholder="Nilai Data">
                                    <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                    <?= form_error('kurtosis_h', '<small class="text-danger col-md">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="kurtosis_s">Nilai Kurtosis_S</label>
                                    <input type="text" id="kurtosis_s" name="kurtosis_s" value="<?= $kurtosis_s ?>" class="form-control" placeholder="Nilai Data">
                                    <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                    <?= form_error('kurtosis_s', '<small class="text-danger col-md">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="kurtosis_i">Nilai Kurtosis_I</label>
                                    <input type="text" id="kurtosis_i" name="kurtosis_i" value="<?= $kurtosis_i ?>" class="form-control" placeholder="Nilai Data">
                                    <small class="form-text text-success">Isian: berupa Nilai Data</small>
                                    <?= form_error('kurtosis_i', '<small class="text-danger col-md">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id_training" value="<?= $id; ?>" required>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="far fa-save"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Hapus Data -->
    <div class="modal fade" id="modalDelete<?= $id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Training/delete'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="text-center">
                            <img class="mt-2 mb-2" src="<?= base_url(); ?>assets/dist/icon/hapus.svg" width=80% alt="delete-img">
                            <h4 class="mb-4">Apakah anda yakin untuk menghapus data <b><?= $kelas; ?></b> nomer urut <b><?= $id; ?></b> ini?</h4>
                        </div>
                        <input type="hidden" name="id_delete" value="<?= $id; ?>">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>