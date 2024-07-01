    <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
            <a href="/home/" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-10">
                <h2 class="m-0 text-primary">
                    <img
                    src="<?= base_url('_landingpage/assets') ?>/logo.ico"
                    alt=""
                    style="width:60px; height:55px; object-fit:cover;">
                </h2>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="/home/" class="nav-item nav-link active">Home</a>
                    <a href="project.html" class="nav-item nav-link">Tentang Kami</a>
                    <a href="about.html" class="nav-item nav-link">E-Learning</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pembayaran</a>
                        <div class="dropdown-menu bg-light m-0">
                            <a href="/kas/" class="dropdown-item">Uang Sekolah</a>
                            <a href="/kas/" class="dropdown-item">Uang Kas</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pemberitahuan</a>
                        <div class="dropdown-menu bg-light m-0">
                            <a href="feature.html" class="dropdown-item">Acara Sekolah</a>
                            <a href="feature.html" class="dropdown-item">Jadwal Pelajaran</a>
                        </div>
                    </div>
                    <a href="/home/pendaftaran" class="nav-item nav-link">Pendaftaran</a>
                </div>
            </div>
        </nav>
    <!-- Navbar End -->