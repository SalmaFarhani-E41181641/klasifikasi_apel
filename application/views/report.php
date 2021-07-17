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
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a></li>
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
                    <div class="card-header bg-navy">
                        <h3 class="card-title text-bold"><?= $judul; ?></h3>
                        <div class="card-tools">
                            <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalDelete">
                                <i class="fas fa-exclamation-triangle"></i> Kosongkan Uji</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="laporan" class="table table-bordered table-striped">
                            <thead>
                                <?php if ($report == null) : ?>
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
                                        <!-- <th>Kelas</th> -->
                                        <th>Penguji</th>
                                        <th>Urutan Pengujian</th>
                                        <th>Kelas Asli</th>
                                        <th>Kelas Hasil</th>
                                        <th>Tanggal Uji</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($report as $r) :
                                        $id = $r->id_user;
                                        $urutan = $r->jenis_pengujian;
                                        $asli = $r->kelas_asli;
                                        $hasil = $r->kelas_hasil;
                                        $tanggal = $r->tanggal_uji;
                                ?>
                                    <tr class="text-center">
                                        <td class="text-center" width="100px"><?= $no; ?></td>
                                        <td><?= $id ?></td>
                                        <td><?= $urutan ?></td>
                                        <td class="bg-<?php if ($asli == 1) {
                                                            echo "teal";
                                                        } else {
                                                            echo "warning";
                                                        } ?>">
                                            <i class="fas fa-apple-alt"></i> <?php if ($asli == 1) {
                                                                                    echo "Green Smith";
                                                                                } else {
                                                                                    echo "Manalagi";
                                                                                } ?>
                                        </td>
                                        <td class="bg-<?php if ($hasil == 1) {
                                                            echo "teal";
                                                        } else {
                                                            echo "warning";
                                                        } ?>">
                                            <i class="fas fa-apple-alt"></i> <?php if ($hasil == 1) {
                                                                                    echo "Green Smith";
                                                                                } else {
                                                                                    echo "Manalagi";
                                                                                } ?>
                                        </td>
                                        <td><?= date("d M Y", $tanggal) ?></td>
                                    </tr>
                                    <?php $no++ ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>No</th>
                                    <!-- <th>Kelas</th> -->
                                    <th>Penguji</th>
                                    <th>Urutan Pengujian</th>
                                    <th>Kelas Asli</th>
                                    <th>Kelas Hasil</th>
                                    <th>Tanggal Uji</th>
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

<!-- Modal Hapus Data -->
<div class="modal fade" id="modalDelete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">Kosongkan Pengujian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Report/kosongkan'); ?>" method="POST">
                <div class="modal-body">
                    <div class="text-center">
                        <img class="mt-2 mb-2" src="<?= base_url(); ?>assets/dist/icon/empty.svg" width=80% alt="delete-img">
                        <h4 class="mb-4">Apakah anda yakin untuk mengkosongkan data hasil pengujian ini?</h4>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Iya <i class="fas fa-exclamation-triangle"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>