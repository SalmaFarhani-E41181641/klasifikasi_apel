
<body class="container-fluid">
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <img src="<?= base_url('assets/user/svg/undraw_not_found_60pq.svg'); ?>" alt="" class="img-rounded img-responsive img-fluid" width="400">
                <div class="error-template">
                    <h1>404</h1>
                    <h2><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Halaman belum tersedia atau tidak ditemukan.</h2>
                    <div class="error-details">
                        Halaman yang anda tuju tidak tersedia. Silahkan klik tombol dibawah untuk kembali
                    </div>
                    <div class="error-actions mt-5">
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center">
                                <?php if ($this->session->userdata('email') == true) { ?>
                                    <a href="<?= base_url('home'); ?>" class="btn btn-notfound">kembali ke Beranda</a>
                                <?php } else { ?>
                                    <a href="<?= base_url('Main'); ?>" class="btn btn-notfound">kembali ke Beranda</a>
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