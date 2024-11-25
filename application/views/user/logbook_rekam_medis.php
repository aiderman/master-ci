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
            <div>
                <a href="<?= base_url(); ?>user/logbook" class="btn btn-warning">
                    <i class="fa fa-arrow-left"></i> Back
                </a>
            </div>
            <br>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="text-left">
                                <label onclick="sendTableData()">
                                    <i class="fa fa-address-card"></i> ID LOG : <?= $id_log ?>
                                </label>
                            </div>
                            <div class="text-right">
                                <button
                                    class="btn btn-primary"
                                    onclick="confirmSendData('<?= base_url('user/sendTableData/' . $id_log); ?>')">
                                    <i class="fa fa-paper-plane"></i> Kirim Data Tabel
                                </button>
                            </div>

                            <script>
                                function confirmSendData(url) {
                                    // Tampilkan konfirmasi
                                    if (confirm("Apakah Anda yakin ingin mengirim data?")) {
                                        // Jika setuju, arahkan ke URL
                                        window.location.href = url;
                                    }
                                    // Jika tidak, cukup tutup alert (tidak melakukan apapun)
                                }
                            </script>



                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th></th>
                                            <th>PK</th>
                                            <th>NAMA KEWENANGAN</th>
                                            <th>NOMOR REKAM MEDIS</th>
                                            <th>TINDAKAN PEWAWATAN</th>
                                            <th>WAKTU KONFIRMASI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($seleksiRiwayat as $log) : ?>
                                            <tr>
                                                <td><?= $log->id_rek ?></td>
                                                <td>
                                                    <a href="<?= base_url('user/hapusDataRekamMedis/' . $log->id_rek); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>

                                                    <button type="button" class="btn btn-info" onclick="updateLog(<?= $log->id_rek ?>)">Sunting Data</button>
                                                </td>
                                                <td><?= $log->PK ?></td>
                                                <td><?= $log->nama_kewenangan ?></td>
                                                <td><?= $log->no_rekam_medis ?></td>
                                                <td>
                                                    <div class="limited-lines">
                                                        <?= htmlspecialchars(implode(' ', array_slice(explode(' ', $log->tindakan_keperawatan), 0, 4))) ?>
                                                        <?php if (str_word_count($log->tindakan_keperawatan) > 4) : ?>
                                                            ...
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php if (str_word_count($log->tindakan_keperawatan) > 4) : ?>
                                                        <div class="hidden-text" style="display: none;">
                                                            <?= htmlspecialchars($log->tindakan_keperawatan) ?>
                                                        </div>
                                                        <div class="details-button" onclick="toggleText(this)">Lihat Lebih Banyak</div>
                                                    <?php endif; ?>
                                                </td>

                                                <td><?= $log->created ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>


                                </table>
                            </div>
                            <div class="text-right">
                                <a class="btn btn-success" onclick="tambahRekamMedis(<?= $id_log ?>)">
                                    <i class="fa fa-plus"></i> Tambah rekam medis
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal untuk form edit data -->
    <div class="modal fade bs-example-modal-lg" id="editData" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <?php echo form_open_multipart('user/updateRekamMedis'); ?>
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
                                <input type="hidden" class="form-control" id="idRek" name="idRek">
                                <input type="hidden" class="form-control" id="idUser" name="idUser" value="<?= $id_user ?>">
                                <input type="hidden" class="form-control" id="idLog" name="idLog" value="<?= $id_user ?>">
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
                        <button class="btn btn-info waves-effect waves-light" type="submit" onclick="confirmUpdate1()"><span>SUNTING DATA</span></button>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <!-- Modal untuk form tambah data -->
    <div class="modal fade bs-example-modal-lg" id="addData" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabe2">
        <div class="modal-dialog modal-lg" role="document">
            <?php echo form_open_multipart('user/tambahRekamMedis', 'id="addLogForm"'); ?>
            <div class="modal-content">
                <div class="modal-header text-center" style="display: flex; justify-content: center; align-items: center;">
                    <h4 class="modal-title" style="font-weight: bold; flex: 1; text-align: center;">Tambah Rekam Medis</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close" style="position: absolute; right: 10px;">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body">
                    <input type="hidden" name="ed_id">
                    <div class="row">
                        <!-- Left column -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="idUser" name="idUser" value="<?= $id_user ?>">
                                <input type="hidden" class="form-control" id="idLog" name="idLog" value="<?= $id_log ?>">
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
                                <label for="tindakan_keperawatan">Tindakan Keperawatan:</label>
                                <textarea rows="4" class="form-control" id="tindakan_keperawatan" name="tindakan_keperawatan" placeholder="Please type what you want..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-danger waves-effect waves-light" data-dismiss="modal"><span>Batal</span></button>
                        <button class="btn btn-info waves-effect waves-light" type="submit" onclick="confirmUpdate1()"><span>Tambah</span></button>
                    </div>
                </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <?php $this->load->view('script'); ?>

    <script>
        function toggleText(element) {
            var hiddenText = $(element).prev('.hidden-text');
            var limitedText = $(element).siblings('.limited-lines');

            if (hiddenText.is(':visible')) {
                hiddenText.hide();
                limitedText.show();
                $(element).text('Lihat Lebih Banyak');
            } else {
                hiddenText.show();
                limitedText.hide();
                $(element).text('Sembunyikan');
            }
        }
    </script>

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
                url: "<?php echo site_url('user/getRekamMedis') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    // Pastikan data yang diterima
                    console.log(data);

                    // Mengisi input form dengan data
                    $('[name=idRek]').val(data.id_rek);
                    $('[name=idUser]').val(data.id_user);
                    $('[name=idLog]').val(data.id_log);
                    $('[name=PK]').val(data.PK);
                    $('[name=namaKewenangan]').val(data.nama_kewenangan);
                    $('[name=noRekamMedis]').val(data.no_rekam_medis);
                    $('[name=tindakan_keperawatan]').val(data.tindakan_keperawatan);

                    $('#editData').modal('show'); // show bootstrap modal when complete loaded
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
    </script>

    <script>
        function tambahRekamMedis(id_log) {
            // Set ID log ke dalam form
            $('#idLog').val(idLog);

            // Tampilkan modal
            $('#addData').modal('show');
        }
    </script>

    <script>
        function confirmUpdate() {
            // Display a confirmation dialog
            if (confirm("Apakah Anda yakin data Anda sudah benar?")) {
                // If user clicks 'OK', submit the form
                document.getElementById("addLogForm").submit();
            }
        }
    </script>
    <script>
        function confirmUpdate1() {
            // Display a confirmation dialog
            if (confirm("Apakah Anda yakin data Anda sudah benar?")) {
                // If user clicks 'OK', submit the form
                document.getElementById("updateLogForm").submit();
            }
        }
    </script>



</body>

</html>