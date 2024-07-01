                <div class="main-panel">
                    <div class="content-wrapper">

                        <form action="/Kas/update_student" method="post" enctype="multipart/form-data">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-3 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="hidden" name="rombelId" value="<?php echo $data_rombel['id_rombel'] ?>">
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
                            </div>
                        </form>