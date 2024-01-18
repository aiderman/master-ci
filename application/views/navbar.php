    <!-- Top Bar -->
    <nav class="navbar">
        <div class="col-12">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html"><img src="<?= base_url(); ?>assets/images/logo-mini.png" width="30" alt="Compass"><span class="m-l-10">E-Logbook RSGM</span></a>
            </div>
            <ul class="nav navbar-nav navbar-left">
                <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a></li>
                <li class="hidden-sm-down">

                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">


                <li>
                    <a href="javascript:void(0);" class="fullscreen hidden-sm-down" data-provide="fullscreen" data-close="true"><i class="zmdi zmdi-fullscreen"></i></a>
                </li>
                <li><a href="<?= base_url(); ?>logout" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a></li>
                <li class=""><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a></li>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <img src="<?= base_url(); ?>assets/images/profile_av.jpg" width="40" alt="User Profile" class="img-circle">
                        <!-- You can replace the above image path with the actual path to the user's profile image -->
                        <span class="hidden-xs"><?= $name; ?></span>
                    </a>

                </li>
            </ul>
        </div>
    </nav>