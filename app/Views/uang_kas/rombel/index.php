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
                                        <h4 class="card-title">Add new Rombel<i class="fas fa-graduation-cap ml-2"></i></h4>
                                        <form action="/Kas/create_rombel" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <select name="majoring" class="form-control">
                                                    <option disabled selected>Select Majoring</option>
                                                    <?php foreach($data_jurusan as $data) { ?>
                                                        <option value="<?php echo $data['nama_jurusan'] ?>"><?php echo ucwords($data['nama_jurusan']) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select name="class" class="form-control">
                                                    <option disabled selected>Select Class</option>
                                                    <?php foreach($data_kelas as $data) { ?>
                                                        <option value="<?php echo $data['nama_kelas'] ?>"><?php echo strtoupper($data['nama_kelas']) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select name="class_group" id="class" class="form-control">
                                                    <option disabled selected>Select Class Group</option>
                                                    <?php for ($i = 65; $i <= 90; $i++) { // ASCII values for A-Z ?>
                                                        <option value="<?php echo strtoupper(chr($i)); ?>"><?php echo chr($i); ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select name="homeroom_teacher" id="" class="form-control">
                                                    <option disabled selected>Select Homeroom Teacher</option>
                                                    <?php foreach($data_guru as $data) { ?>
                                                        <option value="<?php echo $data['id_guru'] ?>"><?php echo ucwords($data['guru_nama_depan']) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select name="leader" id="" class="form-control">
                                                    <option disabled selected>Select Class Leader</option>
                                                    <?php foreach($data_murid as $data) { ?>
                                                        <option value="<?php echo $data['id_murid'] ?>"><?php echo ucwords($data['murid_nama_depan']) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select name="co_leader" id="" class="form-control">
                                                    <option disabled selected>Select Class Co-Leader</option>
                                                    <?php foreach($data_murid as $data) { ?>
                                                        <option value="<?php echo $data['id_murid'] ?>"><?php echo ucwords($data['murid_nama_depan']) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select name="treasurer" id="" class="form-control">
                                                    <option disabled selected>Select Treasurer</option>
                                                    <?php foreach($data_murid as $data) { ?>
                                                        <option value="<?php echo $data['id_murid'] ?>"><?php echo ucwords($data['murid_nama_depan']) ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="num" name="payment" placeholder="Payment / Month">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Class Data</h4>
                                        <div class="table-responsive">

                                            <table class="table table-striped">

                                                <thead>
                                                    <tr style="text-align: center;">
                                                        <th>No.</th>
                                                        <th>Class</th>
                                                        <th>Homeroom Teacher</th>
                                                        <th>Class Leader</th>
                                                        <th>Class Co-Leader</th>
                                                        <th>Treasurer</th>
                                                        <th>Payment</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php $no = 1;
                                                        foreach ($data_rombel as $data) {
                                                    ?>
                                                        <tr style="text-align: center;">
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo ucwords($data['jurusan_rombel']) ?></td>
                                                            <td><?php echo ucwords($data['guru_nama_depan']) . ' ' . ucwords($data['guru_nama_belakang']) ?></td>
                                                            <td><?php echo ucwords($data['ketua_kelas']) . ' ' . ucwords($data['murid_nama_belakang']) ?></td>
                                                            <td><?php echo ucwords($data['wakil_ketua_kelas']) . ' ' . ucwords($data['murid_nama_belakang']) ?></td>
                                                            <td><?php echo ucwords($data['bendahara']) . ' ' . ucwords($data['murid_nama_belakang']) ?></td>
                                                            <td><?php echo ucwords($data['uangkas_rombel']) ?></td>
                                                            <td>
                                                                <a href="<?= base_url('/Kas/drop_rombel/'.$data['id_rombel']) ?>">
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