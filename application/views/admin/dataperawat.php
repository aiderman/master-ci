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


    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahDataModal">Tambah Data</button>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <!-- Table Header -->
                                    <thead>

                                        <tr>

                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Position</th>
                                            <th>NRP</th>
                                            <th>Pendidikan</th>
                                            <th>STR Berlaku</th>
                                            <th>STR Selesai</th>
                                            <th>Ruangan</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data_perawat as $row) : ?>
                                            <tr>

                                                <td> <?= $row->name ?></td>
                                                <td> <?= $row->username ?></td>
                                                <td> <?= $row->position ?></td>
                                                <td> <?= $row->NRP ?></td>
                                                <td> <?= $row->pendidikan ?></td>
                                                <td> <?= $row->str_berlaku ?></td>
                                                <td> <?= $row->str_selesai ?></td>
                                                <td><?= $row->ruangan ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($this->session->flashdata('add')) : ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('add') ?>
            </div>
        <?php endif; ?>

    </section>


    <!-- Modal untuk menambah pengalaman kerja -->
    <div class="modal fade" id="addExperienceModal" tabindex="-1" role="dialog" aria-labelledby="addExperienceModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExperienceModalLabel">Tambah Pengalaman Kerja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="experienceForm" action="<?= base_url('admin/addExperience'); ?>" method="post">
                        <input type="hidden" name="id_user" id="id_user_experience">
                        <div class="form-group">
                            <label for="tahunMasuk">Tahun Masuk</label>
                            <input type="date" class="form-control" name="tahunMasuk" placeholder="Tahun Masuk" required>
                        </div>
                        <div class="form-group">
                            <label for="tahunSelesai">Tahun Selesai</label>
                            <input type="date" class="form-control" name="tahunSelesai" placeholder="Tahun Selesai" required>
                        </div>
                        <div class="form-group">
                            <label for="penempatan">Penempatan</label>
                            <input type="text" class="form-control" name="penempatan" placeholder="Penempatan" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" id="submitExperience">Tambah Pengalaman</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk memperbarui data pengguna -->
    <div class="modal fade" id="updateDataModal" tabindex="-1" role="dialog" aria-labelledby="updateDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateDataModalLabel">Update Data Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateForm" action="<?= site_url('admin/updateUser'); ?>" method="post">
                        <input type="hidden" name="id_user" id="id_user_update">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" name="position" id="position" required>
                        </div>
                        <div class="form-group">
                            <label for="nrp">NRP</label>
                            <input type="text" class="form-control" name="nrp" id="nrp" required>
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" class="form-control" name="pendidikan" id="pendidikan" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning" id="submitUpdate">Update</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahDataModal" tabindex="-1" role="dialog" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahDataModalLabel">Tambah Data Baru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form Tambah Data -->
                    <form id="formTambahData" action="<?= base_url('admin/tambahUser'); ?>" method="post">
                        <!-- Validasi Nama -->
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required maxlength="50">
                        </div>
                        <!-- Validasi Username -->
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username" required maxlength="50" pattern="^[a-zA-Z0-9_]+$" title="Hanya huruf, angka, dan underscore yang diperbolehkan">
                        </div>

                        <div class="form-group">
                            <label for="nama">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Pass" required maxlength="50">
                        </div>

                        <!-- Validasi Position -->
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" id="position" name="position" placeholder="Masukkan Posisi" required maxlength="50">
                        </div>

                        <!-- Validasi NRP (harus angka) -->
                        <div class="form-group">
                            <label for="NRP">NRP</label>
                            <input type="text" class="form-control" id="NRP" name="NRP" placeholder="Masukkan NRP" required pattern="^[0-9]+$" title="NRP harus berupa angka">
                        </div>

                        <!-- Validasi Pendidikan -->
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Masukkan Pendidikan" required maxlength="100">
                        </div>

                        <!-- Validasi Ruangan -->
                        <div class="form-group">
                            <label for="ruangan">Ruangan</label>
                            <input type="text" class="form-control" id="ruangan" name="ruangan" placeholder="Ruangan" required maxlength="100">
                        </div>

                        <!-- Validasi STR Berlaku -->
                        <div class="form-group">
                            <label for="str_berlaku">STR Berlaku</label>
                            <input type="date" class="form-control" id="str_berlaku" name="str_berlaku" required>
                        </div>

                        <!-- Validasi STR Selesai -->
                        <div class="form-group">
                            <label for="str_selesai">STR Selesai</label>
                            <input type="date" class="form-control" id="str_selesai" name="str_selesai" required>
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk menambah foto -->
    <div class="modal fade" id="addPhotoModal" tabindex="-1" role="dialog" aria-labelledby="addPhotoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPhotoModalLabel">Tambah Foto Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="photoForm" action="<?= base_url('admin/uploadPhoto'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_user" id="id_user_photo">
                        <div class="form-group">
                            <label for="photo">Pilih Foto</label>
                            <input type="file" class="form-control-file" name="photo" id="photo" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success" id="submitPhoto">Simpan Foto</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Menangani pembukaan modal untuk menambah pengalaman
            $('#addExperienceModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget);
                const userId = button.data('id');
                $(this).find('#id_user_experience').val(userId);
            });

            // Menangani pembukaan modal untuk update data
            $('#updateDataModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget);
                const userId = button.data('id');
                $(this).find('#id_user_update').val(userId);
                $(this).find('#name').val(button.data('name'));
                $(this).find('#username').val(button.data('username'));
                $(this).find('#position').val(button.data('position'));
                $(this).find('#nrp').val(button.data('nrp'));
                $(this).find('#pendidikan').val(button.data('pendidikan'));
            });

            // Menangani pembukaan modal untuk menambah foto
            $('#addPhotoModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget);
                const userId = button.data('id');
                $(this).find('#id_user_photo').val(userId);
            });

            // Menangani pengiriman formulir pengalaman
            $('#submitExperience').on('click', function(e) {
                e.preventDefault();
                const userId = $('#id_user_experience').val();
                const experienceData = {
                    user_id: userId,
                    position: $('#position_experience').val(),
                    company: $('#company_experience').val(),
                    start_date: $('#start_date_experience').val(),
                    end_date: $('#end_date_experience').val()
                };

                $.ajax({
                    url: "<?php echo site_url('user/add_experience'); ?>",
                    type: "POST",
                    data: experienceData,
                    success: function(response) {
                        // Handle success response
                        alert('Pengalaman berhasil ditambahkan!');
                        $('#addExperienceModal').modal('hide');
                        location.reload(); // Reload the page or update the UI as needed
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error adding experience: ' + textStatus);
                    }
                });
            });

            // Menangani pengiriman formulir update
            $('#submitUpdate').on('click', function(e) {
                e.preventDefault();
                const userId = $('#id_user_update').val();
                const updateData = {
                    id: userId,
                    name: $('#name').val(),
                    username: $('#username').val(),
                    nrp: $('#nrp').val(),
                    pendidikan: $('#pendidikan').val(),
                    position: $('#position').val()
                };

                $.ajax({
                    url: "<?php echo site_url('user/update'); ?>",
                    type: "POST",
                    data: updateData,
                    success: function(response) {
                        // Handle success response
                        alert('Data berhasil diperbarui!');
                        $('#updateDataModal').modal('hide');
                        location.reload(); // Reload the page or update the UI as needed
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error updating data: ' + textStatus);
                    }
                });
            });

            // Menangani pengiriman formulir foto
            $('#submitPhoto').on('click', function(e) {
                e.preventDefault();
                const userId = $('#id_user_photo').val();
                const formData = new FormData();
                formData.append('id', userId);
                formData.append('photo', $('#photo_input').prop('files')[0]);

                $.ajax({
                    url: "<?php echo site_url('user/upload_photo'); ?>",
                    type: "POST",
                    data: formData,
                    processData: false, // Important
                    contentType: false, // Important
                    success: function(response) {
                        // Handle success response
                        alert('Foto berhasil diunggah!');
                        $('#addPhotoModal').modal('hide');
                        location.reload(); // Reload the page or update the UI as needed
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error uploading photo: ' + textStatus);
                    }
                });
            });
        });
    </script>

    <?php $this->load->view('script'); ?>

</body>

</html>