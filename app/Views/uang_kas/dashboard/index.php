                <div class="main-panel">
                    <div class="content-wrapper">
                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="row">
                                    <div class="col-9">
                                        <h3 class="font-weight-bold">Welcome <?php echo ucwords(session() -> username) ?></h3>
                                        <h6 class="font-weight-normal mb-0">All systems are running smoothly!</h6>
                                    </div>
                                    <div class="col-3">
                                        <div class="justify-content-end d-flex">
                                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                                <button class="btn btn-sm btn-light bg-white" type="button">
                                                    <i class="icon-globe"></i> <?php $date = new DateTime('now', new DateTimeZone('Asia/Jakarta')) ?> <?php echo  $date -> format('Y-m-d'); ?>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="embed-responsive embed-responsive-16by9 mb-4">
                                            <iframe class="embed-responsive-item" src="<?= base_url('_adminpage') ?>/assets/._highlight/video_panduan_mendapatkan_no_va.mp4" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="embed-responsive embed-responsive-16by9 mb-4">
                                            <iframe class="embed-responsive-item" src="<?= base_url('_adminpage') ?>/assets/._highlight/tutorial_pembayaran_tagihan_sekolah_via_virtual_account_bca.mp4" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="embed-responsive embed-responsive-16by9 mb-4">
                                            <iframe class="embed-responsive-item" src="<?= base_url('_adminpage') ?>/assets/._highlight/tutor_pembayaran_tagihan_sekolah_via_virtual_account_bca_atm.mp4" allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>