<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SiCerdas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>assets/dist/img/user/<?= $user['foto_user']; ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block"><?= $user['nama_user']; ?></a>
            </div>
        </div>
        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

        <!-- Sidebar Menu -->
        <?php
            $link = $this->uri->segment(1);
        ?>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
                <li class="nav-header">Beranda</li>
                <li class="nav-item">
                    <a href="<?= base_url(); ?>" class="nav-link <?php if ('home' == $link) {
                        echo 'active';
                    }?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Beranda
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('guide') ?>" class="nav-link <?php if ('guide' == $link) {
                        echo 'active';
                    }?>">
                        <i class="nav-icon fas fa-info"></i>
                        <p>
                            Panduan
                        </p>
                    </a>
                </li>
                <?php if ($user['id_role'] == 1) : ?>
                    <li class="nav-item">
                        <a href="<?= base_url('manage') ?>" class="nav-link <?php if ('manage' == $link) {
                        echo 'active';
                    }?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data User
                            </p>
                        </a>
                    </li>
                    <li class="nav-header">Dataset</li>
                    <li class="nav-item">
                        <a href="<?= base_url('training') ?>" class="nav-link <?php if ('training' == $link) {
                        echo 'active';
                    }?>">
                            <i class="nav-icon fas fa-server"></i>
                            <p>
                                Data Latih
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($user['id_role'] == 2) { ?>
                    <li class="nav-header">Pengujian</li>
                <?php } ?>
                <li class="nav-item">
                    <a href="<?= base_url('testing') ?>" class="nav-link <?php if ('testing' == $link) {
                        echo 'active';
                    }?>">
                        <i class="nav-icon fas fa-flask"></i>
                        <p>
                            Data Uji
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php if ('classified' == $link || 'individu' == $link || 'classify' == $link) {
                        echo 'active';
                    }?>">
                        <i class="nav-icon fas fa-apple-alt"></i>
                        <p>
                            Kelas Klasifikasi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('individu') ?>" class="nav-link <?php if ('individu' == $link) {
                        echo 'active';
                    }?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Uji Individu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('classified') ?>" class="nav-link <?php if ('classified' == $link || 'classify' == $link) {
                        echo 'active';
                    }?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Uji Kelompok</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php if ($user['id_role'] == 1) : ?>
                    <li class="nav-header">Laporan</li>
                    <li class="nav-item">
                        <a href="<?= base_url('report') ?>" class="nav-link <?php if ('report' == $link) {
                        echo 'active';
                    }?>">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Laporan Pengujian
                            </p>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="nav-header">Info</li>
                <li class="nav-item ">
                    <a href="<?= base_url('about') ?>" class="nav-link <?php if ('about' == $link) {
                        echo 'active';
                    }?>">
                        <i class="nav-icon fas fa-question-circle"></i>
                        <p>
                            Tentang SVM
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-header">Keluar akun</li> -->
                <li class="nav-item bg-danger mb-2">
                    <a href="#" data-toggle="modal" data-target="#modal-sm" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            <b>Keluar</b>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>