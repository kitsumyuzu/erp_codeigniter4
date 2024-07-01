                <div class="main-panel">
                    <div class="content-wrapper">

                        <?php if (session() -> get('message')) { ?>

                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>User</strong> <?= session() -> getFlashdata('message') ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        <?php } ?>

                        <div class="row">
                            <div class="col-lg-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">User Data</h4>
                                        <div class="table-responsive">

                                            <table class="table table-striped">

                                                <thead>
                                                    <tr style="text-align: center;">
                                                        <th>No.</th>
                                                        <th>Profile</th>
                                                        <th>Username</th>
                                                        <th>Email</th>
                                                        <th>Level</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php $no = 1;
                                                        foreach ($data_user as $data) {
                                                    ?>
                                                        <tr style="text-align: center;">
                                                            <td><?php echo $no++ ?></td>
                                                            <td><img src="<?php echo base_url('_adminpage/assets/._user/'.($data['_profile'] ? $data['_profile'] : 'default-profile.png')) ?>" alt="profile"></td>
                                                            <td><?php echo $data['username'] ?></td>
                                                            <td><?php echo $data['email'] ?></td>
                                                            <td><?php echo ucwords($data['level']) ?></td>
                                                            <td>
                                                                <button class="btn btn-link btn-sm" data-toggle="tooltip" data-placement="bottom" title="Reset Password"><i class="fas fa-key" style="color: #f0ad4e"></i></button>
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