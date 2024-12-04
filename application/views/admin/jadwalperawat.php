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
                                            <th>No</th> <!-- Kolom untuk nomor urut -->
                                            <th>tanggal</th>
                                            <th>piket</th>
                                            <th>Nama Perawat</th>
                                            <th>ruangan</th>
                                            <!-- <th>action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1; // Inisialisasi nomor urut
                                        foreach ($perawat as $row) :
                                        ?>
                                            <?php $nullOb = "Belum di input" ?>
                                            <tr>
                                                <td><?= $no++ ?></td> <!-- Menampilkan nomor urut -->
                                                <td><?= !empty($row->tanggal) ? date('d-m-Y', strtotime($row->tanggal)) : $nullOb ?></td>
                                                <td><?= !empty($row->piket) ? $row->piket : $nullOb ?></td>
                                                <td><?= $row->nama_perawat ?></td>
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
        <?php if ($this->session->flashdata('error', 5)) : ?>
            <div class="alert alert-danger">
                <?= $this->session->flashdata('error', 5) ?>
            </div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('add', 5)) : ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('add', 5) ?>
            </div>
        <?php endif; ?>
    </section>
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
                    <form id="formTambahData" action="<?= base_url('admin/tambahJadwalPerawat'); ?>" method="post">
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>


                        <div class="form-group">
                            <label for="name">Pilih Perawat </label>
                            <select name="name" id="name" class="btn btn-danger dropdown-toggle dropdown-toggle-split">
                                <?php foreach ($daftarPerawat as $p) : ?>
                                    <option value=<?= $p->id_user ?>><?= $p->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Pilih Perawat </label>
                            <select name="piket" id="piket" class="btn btn-danger ">
                                <option value=pagi>Pagi</option>
                                <option value=sore>Sore</option>
                                <option value=malam>Malam</option>

                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Data -->


    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form id="editForm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_log" id="editId">
                        <div class="form-group">
                            <label for="editTanggal">Tanggal</label>
                            <input type="date" class="form-control" id="editTanggal" name="tanggal">
                        </div>
                        <div class="form-group">
                            <label for="editPK">PK</label>
                            <input type="text" class="form-control" id="editPK" name="PK">
                        </div>
                        <div class="form-group">
                            <label for="editName">Nama Perawat</label>
                            <input type="text" class="form-control" id="editName" name="name">
                        </div>
                        <div class="form-group">
                            <label for="ruangan">Ruangan</label>
                            <input type="text" class="form-control" id="ruangan" name="ruangan">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.edit-button').on('click', function() {
                var id = $(this).data('id');
                $.ajax({
                    url: "<?php echo site_url('admin/get_data_by_id'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $('#editId').val(data.id_log);
                        $('#editTanggal').val(data.tanggal);
                        $('#editPK').val(data.PK);
                        $('#editName').val(data.name);
                        $('#editRuangan').val(data.ruangan);
                        $('#editModal').modal('show');
                    }
                });
            });

            $('#editForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "<?php echo site_url('DataController/update_data'); ?>",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "JSON",
                    success: function(response) {
                        if (response.status) {
                            $('#editModal').modal('hide');
                            location.reload();
                        }
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen input tanggal
            var tanggalInput = document.getElementById('tanggal');

            // Dapatkan tanggal hari ini dalam format YYYY-MM-DD
            var today = new Date();
            var year = today.getFullYear();
            var month = String(today.getMonth() + 1).padStart(2, '0');
            var day = String(today.getDate()).padStart(2, '0');
            var todayDate = year + '-' + month + '-' + day;

            // Set atribut min pada elemen input
            tanggalInput.setAttribute('min', todayDate);
        });
    </script>

    <?php $this->load->view('script'); ?>
</body>

</html>