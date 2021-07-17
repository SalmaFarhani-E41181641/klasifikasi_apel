<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $judul ?></title>
    <!--  Bootstrap css file  -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/bootstrap.min.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/dist/img/favicon/favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?= base_url(); ?>assets/dist/img/favicon/favicon-16x16.png" sizes="16x16" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">

</head>

<body class="container-fluid">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <img src="<?= base_url('assets/dist/icon/cancel.svg'); ?>" alt="" class="img-rounded img-responsive img-fluid" width="400">
                <div class="error-template">
                    <h1>403</h1>
                    <h2><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Akses ditolak.</h2>
                    <div class="error-details">
                        Anda tidak bisa mengakses halaman yang anda tuju. Silahkan klik tombol dibawah untuk kembali
                    </div>
                    <div class="error-actions mt-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">
                                <?php if (!$this->session->userdata($user['id_role']) == 1) { ?>
                                    <a href="<?= base_url('home'); ?>" class="btn btn-outline-primary"><i class="fas fa-tachometer-alt"></i></i> kembali ke dashboard</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>