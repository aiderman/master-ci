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
                                <p><?= $user['name'] ?></p>
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
                            <button type="button" class="btn btn-block btn-warning waves-effect" data-toggle="modal" data-target="#addevent" onclick="ubah_data(<?= $key['id_user']; ?>)">sunting data</button>


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

                                <button type="button" class="btn btn-round btn-info waves-effect" data-toggle="modal" data-target="#addevent">ganti foto</button>
                            </div>
                            <hr>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal edit -->
    <div class="modal fade bs-example-modal-lg" id="editData" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <?php echo form_open_multipart('user/edit'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" name="ed_id">

                        <div class="row">
                            <!-- Left column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ed_name">Name</label>
                                    <input type="text" class="form-control" name="ed_name">
                                </div>
                                <div class="form-group">
                                    <label for="ed_username">Username</label>
                                    <input type="text" class="form-control" name="ed_username">
                                </div>
                                <div class="form-group">
                                    <label for="ed_NRP">NRP</label>
                                    <input type="text" class="form-control" name="ed_NRP">
                                </div>
                                <div class="form-group">
                                    <label for="ed_pendidikan">Pendidikan</label>
                                    <input type="text" class="form-control" name="ed_pendidikan">
                                </div>
                            </div>

                            <!-- Right column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ed_str_berlaku">STR Berlaku</label>
                                    <input type="date" class="form-control" name="ed_str_berlaku">
                                </div>
                                <div class="form-group">
                                    <label for="ed_str_selesai">STR Selesai</label>
                                    <input type="date" class="form-control" name="ed_str_selesai">
                                </div>
                                <div class="form-group">
                                    <label for="ed_ruangan">Ruangan</label>
                                    <input type="text" class="form-control" name="ed_ruangan">
                                </div>
                            </div>
                        </div>

                    </form>

                    <div class="modal-footer">
                        <button class="btn btn-danger waves-effect waves-light" data-dismiss="modal"><span>Batal</span></button>
                        <button class="btn btn-info waves-effect waves-light" type="submit"><span>Simpan</span></button>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <script>
        function ubah_data(id) {
            //Ajax Load data from ajax

            $.ajax({
                url: "<?php echo site_url('user/get') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name=ed_id]').val(data.id_user);
                    $('[name=ed_name]').val(data.name);
                    $('[name=ed_email]').val(data.email);
                    $('[name=ed_username]').val(data.username);
                    $('[name=ed_password]').val(data.password);
                    $('[name=ed_status]').val(data.status);
                    $('[name=ed_role_id]').val(data.role_id);
                    $('[name=ed_position]').val(data.position);
                    $('[name=ed_image]').val(data.image);
                    $('[name=ed_NRP]').val(data.NRP);
                    $('[name=ed_pendidikan]').val(data.pendidikan);
                    $('[name=ed_str_berlaku]').val(data.str_berlaku);
                    $('[name=ed_str_selesai]').val(data.str_selesai);
                    $('[name=ed_ruangan]').val(data.ruangan);
                    $('[name=ed_pengalaman_id]').val(data.pengalaman_id)
                    $('#editData').modal('show'); // show bootstrap modal when complete loaded
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
    </script>


    <?php $this->load->view('script'); ?>
</body>

</html>