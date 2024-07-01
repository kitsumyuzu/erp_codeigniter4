    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5"
    style="background: linear-gradient(rgba(0, 0, 0, .1), rgba(0, 0, 0, .1)), url(<?= base_url('_landingpage') ?>/assets/._highlight/banner_1.png) center center no-repeat; background-size: cover;">
        <div class="container py-5">
            <h1 class="display-1 text-white mb-3">Pendaftaran</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">Pendaftaran</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Contact Start -->
    <div class="container-fluid bg-light overflow-hidden px-lg-0" style="margin: 6rem 0;">
        <div class="container contact px-lg-0">
            <div class="row g-0 mx-lg-0">
                <div class="col-lg-6 contact-text py-5 wow fadeIn" data-wow-delay="0.5s">
                    <div class="p-lg-5 ps-lg-0">
                        <h6 class="text-primary">Tahun Ajaran <?php echo date('Y') ?> - <?php echo date('Y') + 3 ?></h6>
                        <h1 class="mb-4">Formulir Pendaftaran Online Murid Baru</h1>
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="name" placeholder="Your Name">
                                        <label for="name">Nama Murid</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="email" placeholder="Your Email">
                                        <label for="email">Tanggal Lahir Murid</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Nama Ibu</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Nama Ayah</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Nomor Handphone</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                        <label for="subject">Alamat Email</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <input type="checkbox" name="aggrement" id="aggrement_verification" value="agree">
                                    <label for="aggrement_verification">I agree to the <a href="https://google.com">Terms of Service</a> and the <a href="https://google.com">Privacy Policy</a>.</label>
                                </div>

                                
                                <div class="col-12">
                                    <button class="btn btn-primary rounded-pill py-3 px-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 pe-lg-0" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <iframe class="position-absolute w-100 h-100" style="object-fit: cover;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.0513589546154!2d104.01296077586329!3d1.1234526622598844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d98966f5876889%3A0xeb151aeee8904615!2sSekolah%20Permata%20Harapan%20Batu%20Batam!5e0!3m2!1sid!2sid!4v1712551948848!5m2!1sid!2sid"
                        frameborder="0" allowfullscreen="" aria-hidden="false"
                        tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->