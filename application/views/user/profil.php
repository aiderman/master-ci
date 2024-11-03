<!doctype html>
<html class="no-js" lang="en">

<?php $this->load->view('head'); ?>

<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30">
                <img class="zmdi-hc-spin" src="<?= base_url(); ?>assets/images/logo.png" width="48" height="48" alt="Compass">
            </div>
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <small class="text-muted">Nama:</small>
                                            <p><?= isset($user['name']) ? $user['name'] : 'Nama tidak tersedia'; ?></p>
                                            <hr>
                                            <small class="text-muted">NRP:</small>
                                            <p><?= isset($user['NRP']) ? $user['NRP'] : 'NRP tidak tersedia'; ?></p>
                                            <hr>
                                            <small class="text-muted">Pendidikan Terakhir:</small>
                                            <p><?= isset($user['pendidikan']) ? $user['pendidikan'] : 'Pendidikan tidak tersedia'; ?></p>
                                            <hr>
                                            <small class="text-muted">STR/SIP</small><br>
                                            <table class="table table-border" style="width: 70%;">
                                                <tr>
                                                    <td>
                                                        <small class="text-muted">Tanggal Terbit:</small><br>
                                                        <?= isset($user['str_berlaku']) ? $user['str_berlaku'] : 'Tidak tersedia'; ?>
                                                    </td>
                                                    <td>
                                                        <small class="text-muted">Tanggal Selesai:</small><br>
                                                        <?= isset($user['str_selesai']) ? $user['str_selesai'] : 'Tidak tersedia'; ?>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="info-item">
                                            <hr>
                                            <small class="text-muted">Ruangan Perawat Sekarang:</small><br>
                                            <?= isset($user['ruangan']) && $user['ruangan'] !== '' ? $user['ruangan'] : '<strong>Tidak tersedia</strong>'; ?>
                                            <hr>
                                            <small class="text-muted">Riwayat Pengalaman Kerja:</small><br>
                                            <?php if (!empty($pengalaman)) { ?>
                                                <ul>
                                                    <?php foreach ($pengalaman as $key) { ?>
                                                        <li><?= isset($key['penempatan']) ? $key['penempatan'] : 'Tidak tersedia'; ?> (<?= isset($key['tahun_masuk']) ? $key['tahun_masuk'] : 'Tahun tidak tersedia'; ?> - <?= isset($key['tahun_selesai']) ? $key['tahun_selesai'] : 'Tahun tidak tersedia'; ?>)</li>
                                                    <?php } ?>
                                                </ul>
                                            <?php } else { ?>
                                                <strong>Tidak ada pengalaman kerja.</strong>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
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
                            <a href="javascript:void(0);" class="">
                                <img src="<?= base_url(); ?>uploads/profile/<?= isset($user['image']) ? $user['image'] : 'default.png'; ?>" class="rounded-circle" alt="Profile Image">
                            </a>
                        </div>
                        <div class="body">
                            <div class="col-12">
                                <button type="button" class="btn btn-round btn-info waves-effect" data-toggle="modal" data-target="#changePhotoModal">
                                    Ganti Foto
                                </button>
                            </div>

                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- Modal untuk Ganti Foto Profil -->
    <div class="modal fade" id="changePhotoModal" tabindex="-1" role="dialog" aria-labelledby="changePhotoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <?php echo form_open_multipart('user/changePhoto'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="changePhotoModalLabel">Ganti Foto Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="user_id" value="<?= $user['id_user']; ?>">
                    <div class="form-group">
                        <label for="profile_photo">Pilih Foto Baru</label>
                        <input type="file" class="form-control" name="profile_photo" id="profile_photo" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>

    <script>
        function ubah_data(id) {
            $.ajax({
                url: "<?php echo site_url('user/get') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name=ed_id]').val(data.id_user);
                    $('[name=ed_name]').val(data.name);
                    $('[name=ed_username]').val(data.username);
                    $('[name=ed_NRP]').val(data.NRP);
                    $('[name=ed_pendidikan]').val(data.pendidikan);
                    $('[name=ed_str_berlaku]').val(data.str_berlaku);
                    $('[name=ed_str_selesai]').val(data.str_selesai);
                    $('[name=ed_ruangan]').val(data.ruangan);
                    $('#editData').modal('show');
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