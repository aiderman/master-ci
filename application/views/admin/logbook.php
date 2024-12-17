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
    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div>
                                <a class="btn btn-warning" onclick="openExportWindow()">
                                    <i class="fa fa-plus">Export</i>
                                </a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Lihat Rekam Medis</th>
                                            <th>Nama perawat</th>
                                            <th>Nama Ruangan</th>
                                            <th>Tanggal</th>
                                            <th>Tinjau</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($logbook as $log) : ?>
                                            <?php
                                            $createdTimestamp = strtotime($log->created);
                                            $tanggalTimestamp = strtotime($log->tanggal);
                                            $terlambat = $createdTimestamp > $tanggalTimestamp;
                                            ?>
                                            <tr <?php if ($terlambat) echo 'class="terlambat"'; ?>>
                                                <td style="text-align: center; vertical-align: middle;">
                                                    <a href="<?= base_url('admin/logbookRekamMedis/' . $log->id_log); ?>" id="profil">
                                                        <button type="button" class="btn btn-info w-100">
                                                            <b>LIHAT REKAM MEDIS</b>
                                                        </button>
                                                    </a>
                                                </td>

                                                <td><?= $log->nama_perawat ?></td>
                                                <td><?= $log->user_ruangan ?></td>
                                                <td><?= $log->tanggal ?></td>
                                                <td>
                                                    <?php if ($log->v_kabid == 1) : ?>
                                                        <input type="checkbox" id="centangV_karo" class="bg-success" checked readonly>
                                                    <?php elseif ($log->v_kabid == 0) : ?>
                                                        <button type="button" class="btn btn-success" onclick="inputnilai(<?= $log->id_log ?>)">input nilai</button>
                                                    <?php endif; ?>
                                                </td>
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

    <!-- Modal -->
    <div class="modal fade bs-example-modal-sm" id="editData" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <?php echo form_open_multipart('admin/updatelog', 'id="updateLogForm"'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">form penilaian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" name="idUser">
                        <input type="hidden" name="idLog">

                        <div class="row">
                            <!-- Right column -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="PK">penilaian:</label>
                                    <input rows="4" class="form-control" id="nilai" name="nilai" placeholder="silahkan beri nilai"></input>
                                </div>
                            </div>
                        </div>

                    </form>

                    <div class="modal-footer">
                        <button class="btn btn-danger waves-effect waves-light" data-dismiss="modal"><span>Batal</span></button>
                        <button class="btn btn-info waves-effect waves-light" type="button" onclick="confirmUpdate()"><span>Simpan</span></button>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>


    <?php $this->load->view('script'); ?>
    <script>
        function openExportWindow() {
            // Buat URL ke controller exportLog di server
            const url = '<?= base_url('admin/exportLog') ?>';

            // Membuka halaman baru untuk export
            window.open(url, '_blank');
        }

        function openExportHistoryWindow() {
            // Buat URL ke controller exportLog di server
            const url = '<?= base_url('admin/exportHistoryLog') ?>';

            // Membuka halaman baru untuk export
            window.open(url, '_blank');
        }
    </script>
    <script>
        function inputnilai(id) {
            //Ajax Load data from ajax

            $.ajax({
                url: "<?php echo site_url('admin/get_log') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name=idUser]').val(data.id_user);
                    $('[name=idLog]').val(data.id_log);

                    $('#editData').modal('show'); // show bootstrap modal when complete loaded
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
    </script>
    <script>
        function confirmUpdate() {
            // Display a confirmation dialog
            if (confirm("Apakah Anda yakin data Anda sudah benar?")) {
                // If user clicks 'OK', submit the form
                document.getElementById("updateLogForm").submit();
            }
        }
    </script>
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