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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
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
                                        <?php foreach ($data_perawat as $row) : ?>
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


    <!-- Modal untuk form tambah data -->
    <div class="modal fade bs-example-modal-lg" id="editData" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <?php echo form_open_multipart('user/updatelog'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">update</h4>
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