                <div class="main-panel">
                    <div class="content-wrapper">

                        <?php if (session() -> get('message')) { ?>

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Akun</strong> <?= session() -> getFlashdata('message') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php } ?>

                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Teacher Data</h4>
                                        <a href="/Kas/view_create_teacher">
                                            <button type="button" class="btn btn-link btn-sm"><i class="fas fa-user-plus mr-2"></i>New Teacher</button>
                                        </a>
                                        <div class="table-responsive">

                                            <table class="table table-striped">

                                                <thead>
                                                    <tr style="text-align: center;">
                                                        <th>No.</th>
                                                        <th>NIK</th>
                                                        <th>Nickname</th>
                                                        <th>Gender</th>
                                                        <th>Birthdate & Place</th>
                                                        <th>Phone Number</th>
                                                        <th>Address</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php $no = 1;
                                                        foreach ($data_guru as $data) {
                                                    ?>
                                                        <tr style="text-align: center;">
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $data['guru_nik'] ?></td>
                                                            <td><?php echo ucwords($data['guru_nama_depan']) . ' ' . ucwords($data['guru_nama_belakang']) ?></td>
                                                            <td><?php echo ucwords($data['guru_jenis_kelamin']) ?></td>
                                                            <td><?php echo ucwords($data['guru_tempat_lahir']) . ', ' . ucwords($data['guru_tanggal_lahir']) ?></td>
                                                            <td>+62 <?php echo $data['guru_no_handphone']?></td>
                                                            <td><?php echo $data['guru_alamat']?></td>
                                                            <td>
                                                                <a href="<?= base_url('/Kas/drop_teacher/'.$data['guru_user']) ?>">
                                                                    <button type="button" class="btn btn-link btn-sm" data-toggle="tooltip" data-placement="bottom" title="Delete Data"><i class="fas fa-trash-can" style="color: #ff0000"></i></button>
                                                                </a>
                                                                <a href="<?= base_url('/Kas/view_update_teacher/'.$data['guru_user']) ?>">
                                                                    <button type="button" class="btn btn-link btn-sm" data-toggle="tooltip" data-placement="bottom" title="Update Data"><i class="fas fa-square-pen" style="color: #f0ad4e"></i></button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>

                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>