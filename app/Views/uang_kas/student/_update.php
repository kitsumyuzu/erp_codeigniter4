                <div class="main-panel">
                    <div class="content-wrapper">

                        <form action="/Kas/update_student" method="post" enctype="multipart/form-data">
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-3 grid-margin">
                                    <div class="card">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img class="card-img-top" src="<?= base_url('_adminpage') ?>/assets/._user/default-profile.png" alt="Profile" style="width: 10rem;">
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <input type="hidden" name="userId" value="<?php echo $data_murid['id_user'] ?>">
                                            <input type="hidden" name="oldProfile" value="<?php echo $data_murid['_profile'] ?>">
                                            <div class="form-group">
                                                <label for="username">Username <span style="color:red;">*</span></label>
                                                <input value="<?php echo $data_murid['username'] ?>" type="text" class="form-control" id="username" name="username" maxlength="26" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email <span style="color:red;">*</span></label>
                                                <input value="<?php echo $data_murid['email'] ?>" type="email" class="form-control" id="email" name="email" maxlength="36" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="profile">Profile</label>
                                                <input type="file" class="form-control" id="profile" name="profile" accept="image/png, image/jpg, image/jpeg, image/webp">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7 grid-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <input type="hidden" name="userMurid" value="<?php echo $data_murid['murid_user'] ?>">
                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="nis">NIS</label>
                                                    <input value="<?php echo $data_murid['murid_nis'] ?>" type="text" class="form-control" id="nis" name="nis" placeholder="1234567890" maxlength="20">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="nama_depan">Nama Depan</label>
                                                    <input value="<?php echo $data_murid['murid_nama_depan'] ?>" type="text" class="form-control" id="nama_depan" name="nama_depan" maxlength="55">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="nama_belakang">Nama Belakang</label>
                                                    <input value="<?php echo $data_murid['murid_nama_belakang'] ?>" type="text" class="form-control" id="nama_belakang" name="nama_belakang" maxlength="200">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                        <option disabled selected>Pilih Jenis Kelamin</option>
                                                        <option value="perempuan" <?php echo $data_murid['murid_jenis_kelamin'] == 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                                        <option value="laki-laki" <?php echo $data_murid['murid_jenis_kelamin'] == 'laki-laki' ? 'selected' : '' ?>>Laki Laki</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                                    <input value="<?php echo $data_murid['murid_tanggal_lahir'] ?>" type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="tempat_lahir">Tempat Lahir</label>
                                                    <input value="<?php echo $data_murid['murid_tempat_lahir'] ?>" type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="no_handphone">No. Handphone</label>
                                                    <input value="<?php echo $data_murid['murid_no_handphone'] ?>" type="text" class="form-control" id="no_handphone" pattern="8[0-9]{2}-[0-9]{4}-[0-9]{4,5}" maxlength="16" placeholder="812-3456-7890" name="no_handphone">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="alamat">Alamat</label>
                                                    <input value="<?php echo $data_murid['murid_alamat'] ?>" type="text" class="form-control" id="alamat" name="alamat">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="alamat">Rombel</label>
                                                    <select name="rombel" id="rombel" class="form-control">
                                                        <option disabled selected>Pilih Rombel</option>
                                                        <?php foreach ($data_rombel as $data) { ?>
                                                            <option value="<?php echo $data['id_rombel'] ?>" <?php echo $data_murid['murid_rombel'] == $data['id_rombel'] ? 'selected' : '' ?>><?php echo strtoupper($data['jurusan_rombel']) ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>