<!doctype html>
<html class="no-js " lang="en">

<?php $this->load->view('head'); ?>

<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="<?= base_url(); ?>assets/images/logo.png" width="48" height="48" alt="Compass"></div>
            <p>Mohon Menunggu...</p>
        </div>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <?php $this->load->view('navbar'); ?>
    <?php $this->load->view('leftbar'); ?>
    <?php $this->load->view('rightbar'); ?>
    <section class="content page-calendar">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Ubah Sandi
                        <small class="text-muted"></small>
                    </h2>
                </div>
            </div>
        </div>
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('add', 300)) : ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('add', 300) ?>
            </div>
        <?php endif; ?>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">

                                <form action="<?= base_url() ?>user/verif_pass" method="post" onsubmit="return validateForm()">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="Password_terkini" id="Password_terkini" placeholder="Password terkini">
                                                    <input type="hidden" class="form-control" name="id" id="id" value="<?= $user['id_user'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="Password" id="Password" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="konfirmasi_Password" id="konfirmasi_Password" placeholder="Konfirmasi Password">
                                                    <span id="passwordMatchError" style="color: red;"></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <button type="button" class="btn btn-default btn-round btn-simple" onclick="resetForm()">Batal</button>
                                                <button type="submit" class="btn btn-primary btn-round">Simpan</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <script>
                                    function validateForm() {
                                        var password = document.getElementById('Password').value;
                                        var confirmPassword = document.getElementById('konfirmasi_Password').value;
                                        var errorSpan = document.getElementById('passwordMatchError');

                                        if (password !== confirmPassword) {
                                            errorSpan.innerHTML = 'Password tidak cocok.';
                                            return false; // Prevent form submission
                                        } else {
                                            errorSpan.innerHTML = '';
                                            return true; // Allow form submission
                                        }
                                    }

                                    function resetForm() {
                                        document.getElementById('Password_terkini').value = '';
                                        document.getElementById('Password').value = '';
                                        document.getElementById('konfirmasi_Password').value = '';
                                        document.getElementById('passwordMatchError').innerHTML = '';
                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php $this->load->view('script'); ?>

</body>

</html>