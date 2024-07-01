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
                            <div class="col-md-4 gird-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Add new Majoring <i class="fas fa-graduation-cap ml-2"></i></h4>
                                        <form action="/Kas/create_major" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label for="">Majoring Name</label>
                                                <input type="text" name="majoring_name" class="form-control" placeholder="Enter Majoring Name">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Majoring Data</h4>
                                        <div class="table-responsive">

                                            <table class="table table-striped">

                                                <thead>
                                                    <tr style="text-align: center;">
                                                        <th>No.</th>
                                                        <th>Major</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php $no = 1;
                                                        foreach ($data_jurusan as $data) {
                                                    ?>
                                                        <tr style="text-align: center;">
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo ucwords($data['nama_jurusan']) ?></td>
                                                            <td>
                                                                <a href="<?= base_url('/Kas/drop_major/'.$data['id_jurusan']) ?>">
                                                                    <button type="button" class="btn btn-link btn-sm" data-toggle="tooltip" data-placement="bottom" title="Delete Data"><i class="fas fa-trash-can" style="color: #ff0000"></i></button>
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