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
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Nama Ruangan</th>
                                            <th>Tanggal</th>
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
                                                <td>
                                                    <button type="button" class="btn btn-success" onclick="updateLog(<?= $log->id_log ?>)">Input Log</button>

                                                </td>
                                                <td><?= $log->ruangan ?></td>
                                                <td><?= $log->tanggal ?></td>
                                                <td><?= $log->PK ?></td>
                                                <td><?= $log->nama_kewenangan ?></td>
                                                <td><?= $log->no_rekam_medis ?></td>
                                                <td>
                                                    <div class="limited-lines"><?= $log->tindakan_keperawatan ?></div>
                                                    <?php if (strlen($log->tindakan_keperawatan) > 10) : ?>
                                                        <div class="details-button" onclick="toggleText(this)">Lihat Lebih Banyak</div>
                                                    <?php endif; ?>
                                                </td>
                                                <td> <?php if ($log->v_karo == 1) : ?>
                                                        <input type="checkbox" id="centangV_karo" class="bg-success" checked readonly>
                                                    <?php elseif ($log->v_karo == 0) : ?>
                                                        <span>&#10008;</span> <!-- Tanda "x" jika v_karo == 0 -->
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php if ($log->v_kabid == 1) : ?>
                                                        <input type="checkbox" id="centangV_karo" class="bg-success" checked readonly>
                                                    <?php elseif ($log->v_kabid == 0) : ?>
                                                        <span>&#10008;</span> <!-- Tanda "x" jika v_karo == 0 -->
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
    <div class="modal fade bs-example-modal-lg" id="editData" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <?php echo form_open_multipart('user/updatelog', 'id="updateLogForm"'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">input log</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="ed_id">
                    <div class="row">
                        <!-- Left column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="idUser" name="idUser">
                                <input type="hidden" class="form-control" id="idLog" name="idLog">
                                <label for="PK">PK:</label>
                                <input type="text" class="form-control" id="PK" name="PK">
                            </div>
                            <div class="form-group">
                                <label for="namaKewenangan">Nama Kewenangan:</label>
                                <input type="text" class="form-control" id="namaKewenangan" name="namaKewenangan">
                            </div>
                            <div class="form-group">
                                <label for="noRekamMedis">No. Rekam Medis:</label>
                                <input type="text" class="form-control" id="noRekamMedis" name="noRekamMedis">
                            </div>
                        </div>
                        <!-- Right column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="PK">Tindakan Keperawatan:</label>
                                <textarea rows="4" class="form-control" id="tindakan_keperawatan" name="tindakan_keperawatan" placeholder="Please type what you want..."></textarea>
                            </div>
                        </div>
                    </div>

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
            const url = '<?= base_url('user/exportLog') ?>';

            // Membuka halaman baru untuk export
            window.open(url, '_blank');
        }
        function openExportHistoryWindow() {
            // Buat URL ke controller exportLog di server
            const url = '<?= base_url('user/exportHistoryLog') ?>';

            // Membuka halaman baru untuk export
            window.open(url, '_blank');
        }
    </script>


    <script>
        function updateLog(id) {
            //Ajax Load data from ajax

            $.ajax({
                url: "<?php echo site_url('user/get_log') ?>/" + id,
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