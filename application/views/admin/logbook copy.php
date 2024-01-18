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
                            <button type="button" class="btn btn-cart btn-info waves-effect" data-toggle="modal" data-target="#addLogModal">Tambah Catatan</button>

                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>ID User</th>
                                            <th>Nama Ruangan</th>
                                            <th>Tanggal</th>
                                            <th>Shift</th>
                                            <th>PK</th>
                                            <th>Nama Kewenangan</th>
                                            <th>No. Rekam Medis</th>
                                            <th>Tindakan Keperawatan</th>
                                            <th>V Karo</th>
                                            <th>V Kabid</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($logbook as $log) : ?>
                                            <tr>
                                                <td> <button type="button" class="btn btn-cart btn-info waves-effect" data-toggle="modal" data-target="#addLogModal">update log </button>
                                                </td>
                                                <td><?= $log->id_user ?></td>
                                                <td><?= $log->nama_ruangan ?></td>
                                                <td><?= $log->tanggal ?></td>
                                                <td><?= $log->shift ?></td>
                                                <td><?= $log->PK ?></td>
                                                <td><?= $log->nama_kewenangan ?></td>
                                                <td><?= $log->no_rekam_medis ?></td>
                                                <td>
                                                    <div class="limited-lines"><?= $log->tindakan_keperawatan ?></div>
                                                    <?php if (strlen($log->tindakan_keperawatan) > 10) : ?>
                                                        <div class="details-button" onclick="toggleText(this)">Lihat Lebih Banyak</div>
                                                    <?php endif; ?>
                                                </td>
                                                <td><?= $log->v_karo ?></td>
                                                <td><?= $log->v_kabid ?></td>

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


    <!-- Modal untuk form tambah data -->
    <div class="modal fade bs-example-modal-lg" id="addLogModal" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <?php echo form_open_multipart('user/tambah'); ?>
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
                                    <input type="hidden" class="form-control" id="idUser" name="idUser">
                                    <label for="namaRuangan">Nama Ruangan:</label>
                                    <input type="text" class="form-control" id="namaRuangan" name="namaRuangan">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal:</label>
                                    <input type="text" class="form-control" id="tanggal" name="tanggal">
                                </div>
                                <div class="form-group">
                                    <label for="PK">PK:</label>
                                    <input type="text" class="form-control" id="PK" name="PK">
                                </div>
                            </div>
                            <!-- Right column -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="namaKewenangan">Nama Kewenangan:</label>
                                    <input type="text" class="form-control" id="namaKewenangan" name="namaKewenangan">
                                </div>
                                <div class="form-group">
                                    <label for="noRekamMedis">No. Rekam Medis:</label>
                                    <input type="text" class="form-control" id="noRekamMedis" name="noRekamMedis">
                                </div>
                                <div class="form-group">
                                    <label for="PK">Tindakan Keperawatan:</label>
                                    <input type="textarea" class="form-control" id="tindakan_keperawatan" name="tindakan_keperawatan">
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


    <?php $this->load->view('script'); ?>

    <script>
        function toggleText(element) {
            var limitedLines = $(element).prev('.limited-lines');
            limitedLines.toggleClass('expanded');
            if (limitedLines.hasClass('expanded')) {
                $(element).text('Sembunyikan');
            } else {
                $(element).text('Lihat Lebih Banyak');
            }
        }
    </script>
</body>

</html>