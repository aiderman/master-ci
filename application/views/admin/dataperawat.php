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
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Position</th>
                                            <th>NRP</th>
                                            <th>Pendidikan</th>
                                            <th>STR Berlaku</th>
                                            <th>STR Selesai</th>
                                            <th>Ruangan</th>
                                            <th>foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($user as $row) : ?>
                                            <tr>
                                                <td> <?= $row->id_user ?></td>
                                                <td> <?= $row->name ?></td>
                                                <td> <?= $row->username ?></td>
                                                <td> <?= $row->position ?></td>
                                                <td> <?= $row->NRP ?></td>
                                                <td> <?= $row->pendidikan ?></td>
                                                <td> <?= $row->str_berlaku ?></td>
                                                <td> <?= $row->str_selesai ?></td>
                                                <td><?= $row->ruangan ?></td>
                                                <td> <?= $row->image ?></td>
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
    </section>


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
                        <!-- Isi form sesuai dengan atribut yang ingin ditambahkan -->
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan Username">
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control" id="position" name="position" placeholder="Masukkan Posisi">
                        </div>
                        <div class="form-group">
                            <label for="NRP">NRP</label>
                            <input type="text" class="form-control" id="NRP" name="NRP" placeholder="Masukkan NRP">
                        </div>
                        <div class="form-group">
                            <label for="pendidikan">Pendidikan</label>
                            <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Masukkan Pendidikan">
                        </div>
                        <!-- ... tambahkan atribut lainnya sesuai kebutuhan -->

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <?php $this->load->view('script'); ?>
</body>

</html>