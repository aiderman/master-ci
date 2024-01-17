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
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>PROFIL SAYA
                        <small class="text-muted"></small>
                    </h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12">

                    <div class="card">
                        <div class="tab-content">
                            <div class="tab-pane body active" id="about">
                                <small class="text-muted">nama: </small>
                                <p><?= $name ?></p>
                                <hr>
                                <small class="text-muted">NRP: </small>
                                <p><?= $user['NRP'] ?></p>
                                <hr>
                                <small class="text-muted">pendidikan terakhir: </small>
                                <p><?= $user['pendidikan'] ?></p>
                                <hr>
                                <small class="text-muted">STR/SIP</small><br>
                                <table class="table table-border" style="width: 70%;">
                                    <tr>
                                        <td>
                                            <small class="text-muted"> Tanggal Terbit :</small> <?= $user['str_berlaku']; ?>
                                        </td>

                                        <td>
                                            <small class="text-muted">Tanggal Selesai : </small><?= $user['str_selesai']; ?>
                                        </td>
                                    </tr>

                                </table>
                                <hr>

                                <small class="text-muted">ruangan perawat sekarang</small>
                                <p><?= $user['ruangan'] ?></p>
                                <hr>
                                <small class="text-muted">riwayat pengalaan kerja</small>
                                <br>
                                <table class="table table-border" style="width: 70%;">
                                    <?php foreach ($pengalaman as $key) { ?>
                                        <tr>
                                            <td>
                                                <small class="text-muted"> Tahun Masuk :</small> <?= $key['tahun_masuk']; ?>
                                            </td>

                                            <td>
                                                <small class="text-muted">Tahun Selesai : </small><?= $key['tahun_selesai']; ?>
                                            </td>

                                            <td>
                                                <small class="text-muted"> Penempatan: </small><?= $key['penempatan']; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </table>

                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card member-card">
                        <div class="header l-cyan">
                            <h4 class="m-t-10"><?= $name ?></h4>
                        </div>
                        <div class="member-img">
                            <a href="profile.html" class="">
                                <img src="<?= base_url(); ?>assets/images/profile_av.jpg" class="rounded-circle" alt="profile-image">
                            </a>
                        </div>
                        <div class="body">
                            <div class="col-12">
                                <ul class="social-links list-unstyled">
                                    <li><a title="facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                    <li><a title="twitter" href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                                    <li><a title="instagram" href="#"><i class="zmdi zmdi-instagram"></i></a></li>
                                </ul>
                                <p class="text-muted">795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-4">
                                    <h5>852</h5>
                                    <small>Following</small>
                                </div>
                                <div class="col-4">
                                    <h5>13k</h5>
                                    <small>Followers</small>
                                </div>
                                <div class="col-4">
                                    <h5>234</h5>
                                    <small>Post</small>
                                </div>
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