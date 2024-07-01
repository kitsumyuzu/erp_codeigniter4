<!DOCTYPE html>
<html lang="en">

    <head>

        <!-- Required meta tags -->

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Skydash Admin</title>

        <!-- Favicon -->

            <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('favicon.ico') ?>">

        <!-- plugins:css -->

            <link rel="stylesheet" href="<?= base_url('_adminpage') ?>/vendors/feather/feather.css">
            <link rel="stylesheet" href="<?= base_url('_adminpage') ?>/vendors/ti-icons/css/themify-icons.css">
            
        <!-- Libraries Stylesheet -->
            
            <link rel="stylesheet" href="<?= base_url('_adminpage') ?>/vendors/css/vendor.bundle.base.css">

        <!-- Template Stylesheet -->

            <link rel="stylesheet" href="<?= base_url('_adminpage') ?>/css/vertical-layout-light/style.css">

    </head>

    <body>

        <div class="container-scroller">

            <div class="container-fluid page-body-wrapper full-page-wrapper">

                <div class="content-wrapper d-flex align-items-center auth px-0">
                    <div class="row w-100 mx-0">
                        <div class="col-lg-4 mx-auto">
                            <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                                <div class="brand-logo d-flex justify-content-center">
                                    <img src="<?= base_url('_adminpage') ?>/assets/logo.ico" alt="logo" style="width: 200px; height: 100px;">
                                </div>

                                    <h3 style="color: #ff7300; font-weight:900;">Login</h3>

                                <form action="<?= base_url('/Kas/auth_login/') ?>" class="pt-3" method="post">

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" placeholder="Username" focus required>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>

                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>

        <script src="<?= base_url('_adminpage') ?>/vendors/js/vendor.bundle.base.js"></script>
        <script src="<?= base_url('_adminpage') ?>/js/off-canvas.js"></script>
        <script src="<?= base_url('_adminpage') ?>/js/hoverable-collapse.js"></script>
        <script src="<?= base_url('_adminpage') ?>/js/template.js"></script>
        <script src="<?= base_url('_adminpage') ?>/js/settings.js"></script>
        <script src="<?= base_url('_adminpage') ?>/js/todolist.js"></script>

    </body>

</html>
