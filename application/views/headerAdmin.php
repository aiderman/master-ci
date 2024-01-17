<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?php echo $title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A premium admin dashboard template by mannatthemes" name="description" />
    <meta content="Mannatthemes" name="author" />
    <!-- DataTables -->
    <link href="<?php echo base_url('assets') ?>/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets') ?>/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?php echo base_url('assets') ?>/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets') ?>/plugins/custombox/custombox.min.css" rel="stylesheet" type="text/css">
    <!-- App upload -->
    <link href="<?php echo base_url('assets') ?>/plugins/dropify/css/dropify.min.css" rel="stylesheet">
    <!-- App Repet -->
    <link href="<?php echo base_url('assets') ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets') ?>/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets') ?>/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets') ?>/css/style.css" rel="stylesheet" type="text/css" />
    <!-- Sweet-Alert  -->
    <script src="<?php echo base_url('assets') ?>/plugins/sweet-alert2/sweetalert2.min.js"></script>
    <script src="<?php echo base_url('assets') ?>/pages/jquery.sweet-alert.init.js"></script>
    <!-- App css -->
    <link href="<?php echo base_url('assets') ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets') ?>/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets') ?>/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets') ?>/css/style.css" rel="stylesheet" type="text/css" />

    <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>

    <!-- leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="<?= base_url('assets');  ?>/leaflet/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="<?= base_url('assets');  ?>/leaflet/leaflet.js"></script>

    <!-- maps css -->
    <style>
        #map {
            height: 600px;
            z-index: 2;

        }

        .legend {
            position: absolute;
            /* bottom: 20px; */
            left: 20px;
            background-color: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
            z-index: 100;
        }

        .legend-item {
            margin-bottom: 5px;
        }

        .legend-color {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin-right: 5px;
        }
    </style>


    <!-- tabel css -->
    <style>
        .breadcrumb-item {
            color: aliceblue;
            font-weight: bold;
        }

        .pagination .page-item.active .page-link {
            background-color: #f64848;
            border-color: #f64848;
            color: #ffffff;

        }
    </style>


    <!-- public css -->
    <style>
        .footer {
            z-index: 0;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #f68d8d;
            border-color: #f68d8d;
        }

        .btn-primary {
            color: #fff;
            background-color: #00cb7a94;
            border-color: #00cb7a94;
        }

        .btn-primary.active,
        .btn-primary.focus,
        .btn-primary:active,
        .btn-primary:focus,
        .btn-primary:hover,
        .open>.dropdown-toggle.btn-primary,
        .btn-outline-primary.active,
        .btn-outline-primary:active,
        .show>.btn-outline-primary.dropdown-toggle,
        .btn-outline-primary:hover,
        .btn-primary.active,
        .btn-primary:not(:disabled):not(.disabled):active,
        .btn-primary:active,
        .show>.btn-primary.dropdown-toggle,
        .btn-primary.disabled,
        .btn-primary:disabled,
        .btn-outline-primary:not(:disabled):not(.disabled).active,
        .btn-outline-primary:not(:disabled):not(.disabled):active,
        .show>.btn-outline-primary.dropdown-toggle,
        a.bg-primary:focus,
        a.bg-primary:hover,
        button.bg-primary:focus,
        button.bg-primary:hover {
            background-color: #00cb7a94 !important;
            border: 1px solid #00cb7a94;
        }
    </style>


    <!-- dinamic -->
    <style>
        @media (max-width: 700) {

            .table {
                width: 100%;

            }
        }
    </style>
    <style>
        .btn {
            width: 100px;
            margin-top: 13px;

        }
    </style>
    <!-- dinamic -->
    <style>
        @media (max-width: 4000) {

            .table {
                width: 100%;

            }
        }
    </style>

</head>

<body>

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- Navbar -->
        <nav class="navbar-custom">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo">
                    <span>
                        <img src="<?= base_url('assets/') ?>/images/logo-sm1.png" alt="logo-small" class="logo-sm">
                    </span>
                    <span>
                        <img src="<?= base_url('assets/') ?>/images/logo-dark1.png" alt="logo-large" class="logo-lg">
                    </span>
                </a>
            </div>


            <ul class="list-unstyled topbar-nav float-right mb-0">

                <li class="dropdown">
                    <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell-outline nav-icon"></i>
                        <span class="badge badge-danger badge-pill noti-icon-badge">2</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                        <!-- item-->
                        <h6 class="dropdown-item-text">
                            Notifications (258)
                        </h6>
                        <div class="slimscroll notification-list">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                                <p class="notify-details">New Message received<small class="text-muted">You have 87 unread messages</small></p>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-info"><i class="mdi mdi-glass-cocktail"></i></div>
                                <p class="notify-details">Your item is shipped<small class="text-muted">It is a long established fact that a reader will</small></p>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                            </a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <div class="notify-icon bg-danger"><i class="mdi mdi-message"></i></div>
                                <p class="notify-details">New Message received<small class="text-muted">You have 87 unread messages</small></p>
                            </a>
                        </div>
                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                            View all <i class="fi-arrow-right"></i>
                        </a>
                    </div>
                </li>

                <li class="dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="<?php echo base_url('assets') ?>/images/users/user-1.jpg" alt="profile-user" class="rounded-circle" />
                        <span class="ml-1 nav-user-name hidden-sm"> <i class="mdi mdi-chevron-down"></i> </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="#"><i class="dripicons-user text-muted mr-2"></i> Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url('c_loginAdmin/logout') ?>"><i class="dripicons-exit text-muted mr-2"></i> keluar</a>
                    </div>
                </li>
            </ul>

            <ul class="list-unstyled topbar-nav mb-0">
                <li>
                    <button class="button-menu-mobile nav-link waves-effect waves-light">
                        <i class="mdi mdi-menu nav-icon"></i>
                    </button>
                </li>
            </ul>

        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->
    <div class="page-wrapper-img">
        <div class="page-wrapper-img-inner">
            <div class="sidebar-user media">
                <img src="<?php echo base_url('assets') ?>/images/users/user-1.png" alt="user" class="rounded-circle img-thumbnail mb-1">
                <span class="online-icon"><i class="mdi mdi-record text-success"></i></span>
                <div class="media-body">
                    <h5 class="text-light"><?php echo $levelName; ?></h5>
                </div>

            </div>