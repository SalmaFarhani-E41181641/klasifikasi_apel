    <!-- Navbar Menu  ---->
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand text-white d-flex flex-row" href="<?= base_url('Main'); ?>">
                <img src="<?= base_url('assets/user/'); ?>images/logo.png"  class="my-auto" height="50%" alt="">
                <p class="text-white my-1 ml-2"> SIKAPEL</p>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>Main#top">Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>Main#panduan">Panduan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>Main#tentangsvm">Tentang SVM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#timkami">Tim Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#kontak">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn-login" href="<?= base_url() ?>Auth">Masuk</a>
                    </li><br>
                </ul>
            </div>
        </nav>
    </section>