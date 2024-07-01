        <div class="container-scroller">
            <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                    <a class="navbar-brand brand-logo-mini" href="/Kas/dashboard/?"><img src="<?= base_url('favicon.ico') ?>" alt="logo"></a>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown"><img src="<?php echo base_url('_adminpage') ?>/assets/._user/default-profile.png" alt="profile"/></a>
                            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="<?= base_url('/Kas/view_update_user/'.$menu['id_user']) ?>">
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
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="icon-menu"></span>
                    </button>
                </div>
            </nav>

            <div class="container-fluid page-body-wrapper">

                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <!-- Start: Menu -->
                        <ul class="nav">

                            <li class="nav-item">
                                <a class="nav-link" href="/Kas/dashboard/?">
                                    <i class="mdi mdi-home menu-icon"></i>
                                    <span class="menu-title">Dashboard</span>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="/Kas/invoice">
                                    <i class="mdi mdi-cash menu-icon"></i>
                                    <span class="menu-title">Invoice List</span>
                                </a>
                            </li>

                            <hr>

                            <?php if (in_array(session() -> get('level'), [1,2])) { ?>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#user_menu" aria-expanded="false" aria-controls="user_menu">
                                        <i class="mdi mdi-account menu-icon"></i>
                                        <span class="menu-title">Users</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="user_menu">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item"> <a class="nav-link" href="/Kas/user">User</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="/Kas/teacher">Teacher</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="/Kas/student">Student</a></li>
                                        </ul>
                                    </div>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="collapse" href="#school_menu" aria-expanded="false" aria-controls="school_menu">
                                        <i class="mdi mdi-school menu-icon"></i>
                                        <span class="menu-title">School</span>
                                        <i class="menu-arrow"></i>
                                    </a>
                                    <div class="collapse" id="school_menu">
                                        <ul class="nav flex-column sub-menu">
                                            <li class="nav-item"> <a class="nav-link" href="/Kas/major">Major</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="/Kas/class">Class</a></li>
                                            <li class="nav-item"> <a class="nav-link" href="/Kas/rombel">Rombel</a></li>
                                        </ul>
                                    </div>
                                </li>
                            
                            <?php } ?>

                        </ul>
                    <!-- End: Menu -->
                </nav>