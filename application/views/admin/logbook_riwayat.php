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
                        <a class="btn btn-warning" onclick="openExportHistoryWindow()">
                                    <i class="fa fa-plus">Export</i>
                                </a>
                            <div class="table-responsive">
                                <table class="table table-bordered  table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nama perawat</th>
                                            <th>Nama Ruangan</th>
                                            <th>Tanggal</th>

                                            <th>PK</th>
                                            <th>Nama Kewenangan</th>
                                            <th>No. Rekam Medis</th>
                                            <th>Tindakan Keperawatan</th>
                                            <th>nilai</th>
                                            <th>sifat</th>

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
                                                <td><?= $log->name ?></td>
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
                                                <td><?= $log->nilai ?></td>
                                                <td><?= $log->sifat ?></td>
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