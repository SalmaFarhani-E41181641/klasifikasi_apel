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
                        <li class="breadcrumb-item"><a href="<?= base_url('user/dashboard'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active"><?= $judul; ?></li>
                    </ol>
                </div>
            </div>
            <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile" id="img">
                            <div class="text-center">
                                <!-- <img class="profile-user-img img-circle" src="<?= base_url(); ?>assets//dist/img/user/<?= $user['Foto_User']; ?>" alt="User profile picture"> -->
                                <img class="img-fluid img-thumbnail" src="<?= base_url(); ?>assets/dist/img/user/<?= $user['foto_user']; ?>" width="200px" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center text-bold"><?= $user['nama_user']; ?></h3>
                            <?php
                            if ($user['tanggal'] == 0) :
                                $tgl = "Sejak Dulu";
                            else :
                                $tgl = date('d M Y', $user['tanggal']);
                            endif;
                            ?>

                            <ul class="list-group">
                                <li class="list-group-item">
                                    <b>Hak akses</b> <span class="badge badge-danger text-bold float-right">Admin</span>
                                </li>
                                <li class="list-group-item">
                                    <b>Terdaftar</b> <span class="badge bg-primary text-bold float-right"><?= $tgl; ?></span>
                                </li>
                            </ul>
                            <!-- <button type="button" class="btn btn-primary btn-block" id="btn-ubhgbr"><i class="fas fa-images"></i> Ubah Gambar</button> -->
                        </div>

                        <div class="card-body box-profil" id="imgedit" hidden>
                            <?= form_open_multipart('Profile'); ?>
                            <div class="form-group">
                                <div class="form-group text-center" style="position: relative;">
                                    <span class="img-div">
                                        <div class="text-center img-placeholder" onClick="triggerClick()">
                                            <h3 class="profile-username text-center text-bold">Edit Foto Profil</h3>
                                            <label class="sm-0 text-primary"><small>(Klik gambar di bawah untuk mengganti)</small></label>
                                        </div>
                                        <div>
                                            <img src="<?= base_url(); ?>assets/dist/img/user/<?= $user['foto_user']; ?>" onClick="triggerClick()" id="profileDisplay" width="200px">
                                        </div>
                                    </span>
                                    <input type="file" name="image" value="<?= $user['foto_user']; ?>" onChange="displayImage(this)" id="profileImage" class="form-control" style="display: none;" accept="image/x-png,image/gif,image/jpeg">
                                    <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
                                    <label class="text-bold text-gray">Foto Profil</label>
                                    <div>
                                        <small class="text-danger text-bold">(Ukuran file gambar max 2 mb.)</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->

                <div class="col-md-9">
                    <div class="card card-primary card-outline card-outline-tabs">
                        <div class="card-header p-0 border-bottom-0">
                            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active tittle" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Profil</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="custom-tabs-four-messages-tab" data-toggle="pill" href="#custom-tabs-four-messages" role="tab" aria-controls="custom-tabs-four-messages" aria-selected="false">Ubah Password</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="custom-tabs-four-tabContent">
                                <!-- Profil -->
                                <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                    <!-- <form class="form-horizontal" action="<?= base_url('Profile'); ?>" method="POST"> -->
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="input-group mb-1 col-sm-9">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="nm" name="nama" placeholder="Nama Lengkap" value="<?= $user['nama_user']; ?>" required disabled>
                                        </div>
                                        <div class="offset-sm-2">
                                            <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                                        <div class="input-group mb-1 col-sm-9">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control" id="em" name="email" placeholder="Email" value="<?= $user['email']; ?>" required disabled>
                                        </div>
                                        <div class="offset-sm-2">
                                            <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                        <div class="input-group mb-1 col-sm-9">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-align-justify"></i></span>
                                            </div>
                                            <input type="text" class="form-control" id="desc" name="deskripsi" placeholder="Deskripsi" value="<?= $user['deskripsi']; ?>" required disabled>
                                        </div>
                                        <div class="offset-sm-2">
                                            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-3 col-form-label">Terakhir update</label>
                                        <div class="mb-1 col-sm-9">
                                            <?php if ($user['update_user'] == 0) : ?>
                                                <span class="badge bg-secondary text-bold">--</span>
                                            <?php else : ?>
                                                <span class="badge badge-dark text-bold"><?= date('d F Y', $user['update_user']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="offset-sm-2">
                                            <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-9">
                                            <button type="button" class="btn btn-default" id="btn-cancel" hidden><i class="fas fa-arrow-alt-circle-left"></i> Batal</button>
                                            <button type="submit" class="btn btn-primary" id="btn-save" hidden><i class="fas fa-save"></i> Simpan</button>
                                            <button type="button" class="btn btn-primary" id="btn-edit"><i class="fas fa-edit"></i> Edit</button>
                                        </div>
                                    </div>
                                    <?= form_close() ?>
                                </div>

                                <!-- Ubah Password -->
                                <div class="tab-pane fade" id="custom-tabs-four-messages" role="tabpanel" aria-labelledby="custom-tabs-four-messages-tab">
                                    <form class="form-horizontal" action="<?= base_url('profile/editpsw'); ?>" method="POST">
                                        <div class="form-group row">
                                            <label for="pswlma" class="col-sm-3 col-form-label">Password Sekarang</label>
                                            <div class="input-group mb-1 col-sm-9">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                </div>
                                                <input type="password" class="form-control" id="password" name="pswlma" placeholder="Password Sekarang" required>
                                                <div class="input-group-prepend">
                                                    <button type="button" class="input-group-text" id="show-hide">
                                                        <i class="fas fa-eye" id="icon"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="offset-sm-3">
                                                <?= form_error('pswlma', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pswbru" class="col-sm-3 col-form-label">Password Baru</label>
                                            <div class="input-group mb-1 col-sm-9">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                </div>
                                                <input type="password" class="form-control" id="password2" name="pswbru" placeholder="Password Baru" required>
                                                <div class="input-group-prepend">
                                                    <button type="button" class="input-group-text" id="show-hide2">
                                                        <i class="fas fa-eye" id="icon2"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="offset-sm-3">
                                                <?= form_error('pswbru', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="pswbru1" class="col-sm-3 col-form-label">Ulangi Password Baru</label>
                                            <div class="input-group mb-1 col-sm-9">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                                </div>
                                                <input type="password" class="form-control" id="password3" name="pswbru1" placeholder="Ulangi Password Baru" required>
                                                <div class="input-group-prepend">
                                                    <button type="button" class="input-group-text" id="show-hide3">
                                                        <i class="fas fa-eye" id="icon3"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="offset-sm-3">
                                                <?= form_error('pswbru1', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="alamat" class="col-sm-3 col-form-label">Terakhir update</label>
                                            <div class="mb-1 col-sm-9">
                                                <?php if ($user['update_password'] == 0) : ?>
                                                    <span class="badge bg-secondary text-bold">--</span>
                                                <?php else : ?>
                                                    <span class="badge bg-dark text-bold"><?= date('d F Y', $user['update_password']); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="offset-sm-2">
                                                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-3 col-sm-9">
                                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
            </><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->