<!-- Jquery Core Js -->
<script src="<?= base_url(); ?>assets/bundles/libscripts.bundle.js"></script>
<!-- Lib Scripts Plugin Js -->
<script src="<?= base_url(); ?>assets/bundles/vendorscripts.bundle.js"></script>
<!-- Lib Scripts Plugin Js -->

<script src="<?= base_url(); ?>assets/bundles/fullcalendarscripts.bundle.js"></script>
<!--/ calender javascripts -->

<script src="<?= base_url(); ?>assets/bundles/mainscripts.bundle.js"></script>
<!-- Custom Js -->
<script src="<?= base_url(); ?>assets/js/pages/calendar/calendar.js"></script>


<!-- Bootstrap Datepicker JS -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->


<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

<!-- Inisialisasi DataTables -->
<script>
    $(document).ready(function() {
        $('.js-basic-example').DataTable();
    });
</script>




<script>
    $(document).ready(function() {
        $('.dropdown-item').click(function() {
            var selectedText = $(this).text();
            $('#name').val(selectedText);
            $('.btn-danger:first-child').text(selectedText);
        });
    });
</script>

<?php $this->load->view('alert'); ?>

