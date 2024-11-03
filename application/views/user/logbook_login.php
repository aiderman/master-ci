<!doctype html>
<html class="no-js " lang="en">

<?php $this->load->view('head'); ?>

<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="<?= base_url(); ?>assets/images/logo.png" width="48" height="48" alt="Compass"></div>
            <p>Please wait...</p>
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
                <div class="col-lg-12col-md-12 col-sm-12">
                    <h2>
                        <CENTer>MASUKAN USERNAMAE DAN PASSWORD</CENTer>
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
                                <form action="<?= base_url() ?>user/logbook_cek" method="post">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="username" id="username" placeholder="username">

                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="col-sm-8 text-center">
                                                <button type="submit" class="btn btn-primary btn-round">MASUK</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>


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