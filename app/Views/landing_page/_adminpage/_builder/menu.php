        <div class="container-scroller">
            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="/Home/"><img src="<?= base_url('assets/src/icon') ?>/logo-brand-collapse.png" alt="logo"></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown"><img src="" alt="profile"/></a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item">
                                    <i class="ti-user text-primary"></i>Profile
                                </a>
                                <a class="dropdown-item">
                                    <i class="ti-key text-primary"></i>Reset Password
                                </a>
                                <hr>
                                <a href="<?= base_url('/Kas/auth_logout') ?>" class="dropdown-item" style="color: #ff0000;">
                                    <i class="ti-power-off text-danger"></i>Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid page-body-wrapper">

                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <!-- Start: Menu -->
                        <ul class="nav">

                            <li class="nav-item">
                                <a class="nav-link" href="/home/dashboard/?">
                                    <i class="mdi mdi-home menu-icon"></i>
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            </li>

                        </ul>
                    <!-- End: Menu -->
                </nav>