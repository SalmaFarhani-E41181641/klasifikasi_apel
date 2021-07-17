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
                        <li class="breadcrumb-item"><a href="<?= base_url('home'); ?>">Beranda</a></li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h3 class="card-title text-bold">Tabel <?= $judul; ?></h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalAdd">
                                <i class="fas fa-plus-circle"></i> Tambah</button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="user" class="table table-bordered table-striped">
                            <thead>
                                <?php if ($manage == null) : ?>
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
                                        <th>ID User</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Status Akun</th>
                                        <th>Aksi</th>
                                    </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($manage as $p) :
                                        $id = $p['id_user'];
                                        $nama = $p['nama_user'];
                                        $email = $p['email'];
                                        $status = $p['status'];
                                ?>
                                    <tr>
                                        <td class="text-center"><?= $no; ?></td>
                                        <td><?= $id; ?></td>
                                        <td><?= $nama; ?></td>
                                        <td><?= $email; ?></td>
                                        <td class="text-center">
                                            <?php if ($status == 0) { ?>
                                                <span class="badge-pill bg-danger"><b>Belum Aktif</b></span>
                                            <?php } elseif ($status == 1) { ?>
                                                <span class="badge-pill bg-success"><b>Sudah Aktif</b></span>
                                            <?php } else { ?>
                                                <span class="badge-pill bg-dark"><b>Terblokir</b></span>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-detail<?= $id; ?>"><b><i class="fas fa-edit"></i> Detail</b></button>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus<?= $id; ?>"><i class="fas fa-trash"></i> <b>Hapus</b></button>
                                            <?php if ($status == 0) { ?>
                                                <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-aktif<?= $id; ?>"><i class="fas fa-info-circle"></i> <b>Aktifkan</b></button>
                                            <?php } else { ?>
                                                <?php if ($status == 1) { ?>
                                                    <button class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-blok<?= $id; ?>"><i class="fas fa-ban"></i> <b>Blokir</b></button>
                                                <?php } elseif ($status == 2) { ?>
                                                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-unblok<?= $id; ?>"><i class="fas fa-check"></i> <b>Buka Blokir</b></button>
                                                <?php } ?>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>ID Peserta</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status Akun</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        <?php endif; ?>
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
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url() . 'Manage' ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama User</label>
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan Nama User">
                        <small class="form-text text-success">Contoh: <b>Andre</b> atau <b>Nama bebas</b></small>
                        <?= form_error('nama', '<small class="text-danger text-center col-md">', '</small>'); ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email User</label>
                                <?= form_error('email', '<small class="badge badge-danger col-md">', '</small>'); ?>
                                <input type="text" id="email" name="email" class="form-control" placeholder="Masukkan Email">
                                <small class="form-text text-success">Email user</small>
                            </div>
                            <div class="form-group">
                                <label for="password">Password User</label>
                                <?= form_error('password', '<small class="badge badge-danger col-md">', '</small>'); ?>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password">
                                <small class="form-text text-success">Password email</small>
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal Di Buat</label>
                                <input type="text" id="tanggal" name="tanggal" class="form-control" value="<?= date('d M Y') ?>" placeholder="Tanggal terbuat" disabled>
                                <small class="form-text text-success">Tanggal terbuatnya user</small>
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

<?php foreach ($manage as $p) :
    $id = $p['id_user'];
    $nama = $p['nama_user'];
    $email = $p['email'];
    $status = $p['status'];
    $deskripsi = $p['deskripsi'];
    $foto = $p['foto_user'];
    $date = $p['tanggal'];
?>

    <!-- Modal Detail Data -->
    <div class="modal fade" id="modal-detail<?= $id; ?>">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="card">
                                <img src="<?= base_url('assets/dist/img/user/' . $foto); ?>" class="img-resposive img-rounded shadow" alt="Profile picture" style="width: 375px;left: -75px;right: -75px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id">ID Peserta</label>
                                    <input type="text" class="form-control text-bold" id="id" value="<?= $id; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control text-bold" id="nama" placeholder="Nama" value="<?= $nama; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control text-bold" id="email" placeholder="Email" value="<?= $email; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" class="form-control text-bold" id="deskripsi" placeholder="Deskripsi" value="<?= $deskripsi; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <b>Member sejak:</b> <span class="badge badge-primary text-bold"><?= date('d F Y', $date); ?></span>
                            </div>
                            <div class="col-md-6">
                                <b>Status akun:</b>
                                <?php if ($status == 0) { ?>
                                    <span class="badge bg-danger"><b>Belum Aktif</b></span>
                                <?php } elseif ($status == 1) { ?>
                                    <span class="badge bg-success"><b>Sudah Aktif</b></span>
                                <?php } else { ?>
                                    <span class="badge bg-dark"><b>Terblokir</b></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-right">
                        <button type="button" class="btn btn-danger text-bold" data-dismiss="modal"><i class="fas fa-arrow-circle-left"></i> Tutup</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal Hapus Data -->
    <div class="modal fade" id="modal-hapus<?= $id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Manage/hapus'); ?>" method="POST">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data dari <b><?= $nama; ?></b>?</p>
                        <input type="hidden" name="id" value="<?= $id; ?>">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal Blokir Data -->
    <div class="modal fade" id="modal-blok<?= $id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Blokir</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Manage/blok'); ?>" method="POST">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin memblokir akun <b><?= $nama; ?></b>?</p>
                        <input type="hidden" name="id" value="<?= $id; ?>">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal Unblok Data -->
    <div class="modal fade" id="modal-unblok<?= $id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Buka Blokir</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Manage/unblok'); ?>" method="POST">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin membuka blokir akun <b><?= $nama; ?></b>?</p>
                        <input type="hidden" name="id" value="<?= $id; ?>">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal Unblok Data -->
    <div class="modal fade" id="modal-aktif<?= $id; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Aktifkan Akun</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Manage/aktif'); ?>" method="POST">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin mengaktifkan akun <b><?= $nama; ?></b>?</p>
                        <input type="hidden" name="id" value="<?= $id; ?>">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                        <button type="submit" class="btn btn-danger">Ya</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>