                        <footer class="footer">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">&copy; 2024 <a href="https://www.permataharapanku.sch.id/">Sekolah Permata Harapan</a> All Rights Reserved.</span>
                            </div>
                        </footer> 
                        <!-- partial -->
                    </div>

                </div>

            </div>

        <!-- plugins:js -->
            <script src="<?= base_url('_adminpage') ?>/vendors/js/vendor.bundle.base.js"></script>
            <script src="<?= base_url('_adminpage') ?>/vendors/datatables.net/jquery.dataTables.js"></script>
            <script src="<?= base_url('_adminpage') ?>/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
            <script src="<?= base_url('_adminpage') ?>/js/dataTables.select.min.js"></script>
            <script src="https://kit.fontawesome.com/cbb81e50b1.js" crossorigin="anonymous"></script>
        <!-- endinject -->

        <!-- inject:js -->
            <script src="<?= base_url('_adminpage') ?>/js/off-canvas.js"></script>
            <script src="<?= base_url('_adminpage') ?>/js/hoverable-collapse.js"></script>
            <script src="<?= base_url('_adminpage') ?>/js/template.js"></script>
            <script src="<?= base_url('_adminpage') ?>/js/settings.js"></script>
            <script src="<?= base_url('_adminpage') ?>/js/todolist.js"></script>
            <script src="<?= base_url('_adminpage') ?>/js/tooltips.js"></script>
            <script src="<?= base_url('_adminpage') ?>/js/tabs.js"></script>
            
        <!-- endinject -->

        <!-- CUSTOM JS -->

            <script>

                document.addEventListener('DOMContentLoaded', function()
                {
                    var password = document.getElementById('password');
                    var confirm_password = document.getElementById('confirm_password');

                    function validatePassword()
                    {
                        if (password.value != confirm_password.value)
                        {
                            confirm_password.setCustomValidity('Please make sure its the correct password');
                        }
                        else
                        {
                            confirm_password.setCustomValidity('');
                        }
                    }

                    password.addEventListener('change', validatePassword);
                    confirm_password.addEventListener('keyup', validatePassword);

                });

                document.getElementById("profile_input").onchange = function() {

                    document.getElementById("image_preview").src = URL.createObjectURL(profile_input.files[0]);

                }

                $(function () {
                    $('[data-toggle="tooltip"]').tooltip();
                })

            </script>

    </body>

</html>