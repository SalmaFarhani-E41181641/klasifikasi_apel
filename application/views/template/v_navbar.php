    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url(); ?>assets/dist/img/user/<?= $user['foto_user']; ?>" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">Administrator</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="<?= base_url(); ?>assets/dist/img/user/<?= $user['foto_user']; ?>" class="img-circle elevation-2" alt="User Image">

                    <p>
                        <small><span title="admin" class="badge badge-warning">Admin</span></small>
                        <?= $user['nama_user']; ?>
                    </p>
                    <!-- <small>
                        <?php if ($user['Tanggal_Terbuat'] != 0) { ?>
                            Terdaftar <?= date('d F Y', $user['tanggal']); ?>
                        <?php } else { ?>
                            Terdaftar <span title='caption' class='badge badge-secondary'></span>
                        <?php } ?>
                    </small> -->
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="<?= base_url('profile'); ?>" class="btn btn-outline-primary">Profil</a>
                    <button type="button" class="btn btn-outline-danger float-right" data-toggle="modal" data-target="#modal-sm">Keluar</button>
                </li>
            </ul>
        </li>
    </ul>
    <!-- <ul class="navbar-nav ml-auto">
        
    </ul> -->
    </nav>
    <!-- /.navbar -->

    <!-- Modal Logout -->
    <div class="modal fade" id="modal-sm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Logout</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin logout?</p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('Auth/logout'); ?>" class="btn btn-danger">Ya</a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->