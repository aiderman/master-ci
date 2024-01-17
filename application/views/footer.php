<!-- end page content -->
<footer class="footer text-center text-sm-right">
    &copy; 2023 invictus media
</footer>
</div>
</div>
</div>

<!-- end page-wrapper -->
<!-- //////////////////////////// -->
<!-- jQuery  -->

<script src="<?= base_url('assets') ?>/js/jquery.min.js"></script>
<script src="<?= base_url('assets') ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets') ?>/js/metisMenu.min.js"></script>
<script src="<?= base_url('assets') ?>/js/waves.min.js"></script>
<script src="<?= base_url('assets') ?>/js/jquery.slimscroll.min.js"></script>
<script src="<?= base_url('assets') ?>/js/app.js"></script>

<script src="<?= base_url('assets') ?>/plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>
<script src="<?= base_url('assets') ?>/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?= base_url('assets') ?>/plugins/moment/moment.js"></script>
<script src="<?= base_url('assets') ?>/plugins/apexcharts/apexcharts.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/tinymce/tinymce.min.js"></script>

<!-- Required datatable js -->
<script src="<?= base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets') ?>/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
<script src="https://apexcharts.com/samples/assets/series1000.js"></script>
<script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
<!-- App js -->

<!--Wysiwig js-->


<script src="<?= base_url('assets') ?>/pages/jquery.dashboard.init.js"></script>
<script src="<?= base_url('assets') ?>/pages/jquery.form-editor.init.js"></script>
<!-- Sweet-Alert  -->
<script src="<?= base_url('assets') ?>/plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="<?= base_url('assets') ?>/pages/jquery.sweet-alert.init.js"></script>

<!-- end - This is for export functionality only -->
<script src="<?= base_url('assets') ?>/leaflet/leaflet.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#datatable').DataTable({
            "language": {
                "decimal": "",
                "emptyTable": "Tidak ada data yang tersedia",
                "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                "infoEmpty": "Data yang dicari tidak ditemukan",
                "infoFiltered": "(difilter dari _MAX_ total data)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Tampilkan _MENU_ data",
                "loadingRecords": "Memuat...",
                "processing": "Sedang Memproses...",
                "search": "Pencarian:",
                "zeroRecords": "Tidak ada data yang ditamplkan",
                "paginate": {
                    "first": "Pertama",
                    "last": "Terakhir",
                    "next": "Berikutnya",
                    "previous": "Sebelumnya"
                },
                "aria": {
                    "sortAscending": ": Aktifkan untuk urutkan kolom secara ascending",
                    "sortDescending": ": Aktifkan untuk urutkan kolom secara descending"
                }
            }
        });

        $('#datatable-scroller').DataTable({
            ajax: "<?php echo base_url(); ?>assets/plugins/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });
        var table = $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });
        var table = $('#datatable-fixed-col').DataTable({
            scrollY: "300px",
            scrollX: true,
            scrollCollapse: true,
            paging: false,
            fixedColumns: {
                leftColumns: 1,
                rightColumns: 1
            }
        });
    });
    // TableManageButtons.init();
</script>
</body>

</html>