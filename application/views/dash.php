    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body mb-0">
                            <div class="row">
                                <div class="col-8 align-self-center">
                                    <div class="">
                                        <h4 class="mt-0 header-title">Total Pengguna</h4>
                                        <h2 class="mt-0 font-weight-bold text-dark-danger"><?php foreach ($pengguna as $key) { ?>
                                                <?= $key->totalPengguna; ?>
                                            <?php } ?></h2>
                                        <p class="mb-0 text-muted"><span class="text-danger"><i class="mdi mdi-arrow-up"></i>237.740</span> total kecamatan</p>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-4 align-self-center">
                                    <div class="icon-info text-right">
                                        <i class="dripicons-user-id bg-soft-danger"></i>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                        <div class="card-body overflow-hidden p-0">
                            <div class="d-flex mb-0 h-100 dash-info-box">
                                <div class="w-100">
                                    <div class="apexchart-wrapper">
                                        <div id="dash_spark_1" class="chart-gutters-danger"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body mb-0">
                            <div class="row">
                                <div class="col-8 align-self-center">
                                    <div class="">
                                        <h4 class="mt-0 header-title">Total laporan</h4>
                                        <h2 class="mt-0 font-weight-bold text-dark"> <?php foreach ($totalpanwascam as $key) { ?>
                                                <?= $key->totalpanwascam ?>
                                            <?php } ?></h2>
                                        <p class="mb-0 text-muted"><span class="text-danger"><i class="mdi mdi-clipboard-arrow-down-outline"></i> </span> laporan dari masyarakat</p>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-4 align-self-center">
                                    <div class="icon-info text-right">
                                        <i class="dripicons-to-do bg-soft-danger"></i>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end card-body-->
                        <div class="card-body overflow-hidden p-0">
                            <div class="d-flex mb-0 h-100 dash-info-box">
                                <div class="w-100">
                                    <div class="apexchart-wrapper">
                                        <div id="apex_column1" class="chart-gutters"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
                <div class="col-lg-4">
                    <div class="card carousel-bg-img">
                        <div class="card-body dash-info-carousel mb-0">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row">
                                            <div class="col-12 align-self-center">
                                                <div class="text-center">
                                                    <h4 class="mt-0 header-title text-left">Total panwascam</h4>
                                                    <div class="icon-info my-3">
                                                        <i class="dripicons-to-do bg-soft-danger"></i>
                                                    </div>
                                                    <h2 class="mt-0 font-weight-bold text-dark"><?php foreach ($totalpanwascam as $key) { ?>
                                                            <?= $key->totalpanwascam ?>
                                                        <?php } ?></h2>
                                                    <p class="mb-1 text-muted">data terbaru<span class="text-danger"></span></p>

                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row">
                                            <div class="col-12 align-self-center">
                                                <div class="text-center">
                                                    <h4 class="mt-0 header-title text-left">Laporan belum di proses</h4>
                                                    <div class="icon-info my-3">
                                                        <i class="dripicons-time-reverse bg-soft-danger"></i>
                                                    </div>
                                                    <h2 class="mt-0 font-weight-bold text-dark"> <?php foreach ($totalpanwascam as $key) { ?>
                                                            <?= $key->totalpanwascam ?>
                                                        <?php } ?> </h2>
                                                    <p class="mb-1 text-muted">data terbaru<span class="text-danger"></span></p>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </div>
                                    <!--end carousel-item-->
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                        <!--end card-body-->
                    </div>
                    <!--end card-->
                </div>
                <!--end col-->
            </div>
            <!--end row-->

            <div id="map"></div>
            <div class="legend">
                <div class="legend-item">
                    <span class="legend-color" style="background-color: red;"></span>
                    belum di proses
                </div>
                <div class="legend-item">
                    <span class="legend-color" style="background-color: blue;"></span>
                    sedang diproses
                </div>
                <div class="legend-item">
                    <span class="legend-color" style="background-color: yellow;"></span>
                    laporan selesai
                </div>
            </div>
            <script>
                var map = L.map('map', {
                    maxBounds: L.latLngBounds(L.latLng(1.5, 124.8), L.latLng(1.6, 125)),
                    maxZoom: 10,
                    minZoom: 11
                }).setView([1.5408156, 124.9514569], 11);
                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19
                }).addTo(map);

                <?php
                $data = $titikMasalah; // Data data dari controller
                ?>

                // Fungsi untuk mendapatkan warna berdasarkan status
                function getStatusColor(status) {
                    switch (status) {
                        case 0:
                            return 'biru'; // Ganti dengan warna yang diinginkan untuk status 0
                        case 1:
                            return 'merah'; // Ganti dengan warna yang diinginkan untuk status 1
                        case 2:
                            return 'kuning'; // Ganti dengan warna yang diinginkan untuk status 2
                            // Tambahkan status lain jika diperlukan
                        default:
                            return 'biru'; // Warna default jika status tidak dikenali
                    }
                }

                // Loop melalui data dan tambahkan marker ke peta
                <?php foreach ($data as $data) { ?>
                    var statusColor = getStatusColor(<?php echo $data->status; ?>);
                    var markerIcon = L.icon({
                        iconUrl: '<?= base_url('assets/images/icon/') ?>marker-' + statusColor + '.png',
                        iconSize: [25, 41],
                        iconAnchor: [12, 41],
                        popupAnchor: [1, -34],
                        tooltipAnchor: [16, -28],
                        shadowSize: [41, 41]
                    });

                    var marker = L.marker([<?php echo $data->long; ?>, <?php echo $data->lat; ?>], {
                        icon: markerIcon
                    }).addTo(map);

                    marker.bindPopup('<?php echo $data->form_type; ?>');
                <?php } ?>
            </script>

        </div>