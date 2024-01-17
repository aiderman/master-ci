<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>AplikasiReport</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A premium admin dashboard template by mannatthemes" name="description" />
    <meta content="Mannatthemes" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url('assets') ?>/images/logo_1.png">
    <link href="<?php echo base_url('assets') ?>/plugins/dropify/css/dropify.min.css" rel="stylesheet">

    <!-- App css -->
    <link href="<?php echo base_url('assets') ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets') ?>/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets') ?>/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets') ?>/css/style.css" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="<?= base_url('assets'); ?>/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets'); ?>/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="<?= base_url('assets'); ?>/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets') ?>/plugins/summernote/summernote-bs4.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets') ?>/plugins/custombox/custombox.min.css" rel="stylesheet" type="text/css">

    <!-- Plugins css -->
    <link href="<?php echo base_url('assets') ?>/plugins/timepicker/tempusdominus-bootstrap-4.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets') ?>/plugins/timepicker/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/plugins/clockpicker/jquery-clockpicker.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets') ?>/plugins/colorpicker/asColorPicker.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets') ?>/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url('assets') ?>/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets') ?>/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />

</head>

<body class="account-body" onload="startTime()">

    <!-- Log In page -->
    <div class="row vh-100">
        <div class="col-lg-3  pr-0">
            <div class="card mb-0 shadow-none">
                <div class="card-body">

                    <div class="px-3">
                        <div class="media">
                            <a href="index.html" class="logo logo-admin"><img src="<?php echo base_url('assets') ?>/images/logo-sm1.png" height="55" alt="logo" class="my-3"></a>
                            <div class="media-body ml-3 align-self-center">
                                <h4 class="mt-0 mb-1">BAWASLU MANADO</h4>
                                <p class="text-muted mb-0">Minahasa Selatan</p>
                            </div>
                        </div>

                        <form class="form-horizontal my-4" method="POST" action="<?php echo base_url('c_loginAdmin/loginCek') ?>">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="mdi mdi-account-outline font-16"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="mdi mdi-key font-16"></i></span>
                                    </div>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password">
                                </div>
                            </div>
                            <div class="form-group mb-0 row">
                                <div class="col-12 mt-2">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-9 p-0 d-flex justify-content-center">
            <div class="accountbg d-flex align-items-center">
                <div class="account-title text-white text-center">
                    <!-- <img src="<?php echo base_url('assets') ?>/images/logo-sm1.png" alt="" class="thumb-sm"> -->
                    <h1 class="">Selamat Datang</h1>
                    <div id="txt"></div>
                </div>
            </div>
        </div>




    </div>
    <!-- End Log In page -->
    <script>
        function startTime() {
            const today = new Date();
            let h = today.getHours();
            let m = today.getMinutes();
            let s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
            setTimeout(startTime, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
    </script>