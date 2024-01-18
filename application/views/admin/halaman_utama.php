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



    <section class="content page-calendar">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Jadwal Dinas
                        <small class="text-muted"><?= $name ?></small>
                    </h2>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 col-lg-8 col-xl-8">
                        <div class="body">
                            <button class="btn btn-primary btn-round waves-effect" id="change-view-today">today</button>
                            <button class="btn btn-default btn-simple btn-round waves-effect" id="change-view-day">Day</button>
                            <button class="btn btn-default btn-simple btn-round waves-effect" id="change-view-week">Week</button>
                            <button class="btn btn-default btn-simple btn-round waves-effect" id="change-view-month">Month</button>
                            <div id="calendar" class="m-t-20"></div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="body">
                            <!-- External Events -->
                            <button type="button" class="btn btn-round btn-info waves-effect" data-toggle="modal" data-target="#inputjadwal">input jadwal</button>
                            <button class="btn btn-default hidden-lg-up m-t-0 float-right" data-toggle="collapse" data-target="#open-Schedule" aria-expanded="false" aria-controls="collapseExample"><i class="zmdi zmdi-chevron-down"></i></button>
                            <div class="collapse-xs collapse-sm collapse" id="open-Schedule">
                                <hr>
                                <div class="event-name b-primary row">
                                    <div class="col-12">
                                        <h6>jadwal shift</h6>
                                        <p>pagi (7.30- 14.00)</p>
                                        <p>shift sore (14.00-21.00)</p>
                                        <p>shift malam (21.00-07.30)</p>
                                        <address><i class="zmdi zmdi-pin"></i> 123 6th St. Melbourne, FL 32904</address>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <div class="modal fade bs-example-modal-lg" id="inputjadwal" enctype="mutlipart/form-data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1">
        <div class="modal-dialog modal-lg" role="document">
            <?php echo form_open_multipart('admin/tambah_log'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">input jadwal perwat</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <input type="hidden" name="ed_id">

                        <div class="row">
                            <!-- Left column -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <select class="form-control" id="idUser" name="idUser">
                                        <?php foreach ($users as $user) : ?>
                                            <option value="<?= $user->id_user ?>"><?= $user->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">tanggal shift:</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                                </div>
                                <div class="form-group">
                                    <select class="form-control" id="shift" name="shift">
                                        <option value="pagi">pagi</option>
                                        <option value="sore">sore</option>
                                        <option value="malam">malam</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="noRekamMedis">Nama Ruangan:</label>
                                    <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan">
                                </div>
                            </div>
                            <!-- Right column -->
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
        var logbookData = <?php echo json_encode($logbook); ?>;
        $('#calendar').fullCalendar({
            header: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            defaultDate: '2024-01-01',
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function() {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
            eventLimit: true, // allow "more" link when too many events
            events: []
        });

        logbookData.forEach(function(log) {
            $('#calendar').fullCalendar('renderEvent', {
                title: log.nama_ruangan,
                start: log.tanggal,
                description: log.id_user,
                className: 'bg-red'
            }, true);
        });
        // Previous month action
        $('#cal-prev').on('click', function() {
            $('#calendar').fullCalendar('prev');
        });

        // Next month action
        $('#cal-next').on('click', function() {
            $('#calendar').fullCalendar('next');
        });

        // Change to month view
        $('#change-view-month').on('click', function() {
            $('#calendar').fullCalendar('changeView', 'month');

            // safari fix
            $('#content .main').fadeOut(0, function() {
                setTimeout(function() {
                    $('#content .main').css({
                        'display': 'table'
                    });
                }, 0);
            });

        });

        // Change to week view
        $('#change-view-week').on('click', function() {
            $('#calendar').fullCalendar('changeView', 'agendaWeek');

            // safari fix
            $('#content .main').fadeOut(0, function() {
                setTimeout(function() {
                    $('#content .main').css({
                        'display': 'table'
                    });
                }, 0);
            });

        });

        // Change to day view
        $('#change-view-day').on('click', function() {
            $('#calendar').fullCalendar('changeView', 'agendaDay');

            // safari fix
            $('#content .main').fadeOut(0, function() {
                setTimeout(function() {
                    $('#content .main').css({
                        'display': 'table'
                    });
                }, 0);
            });

        });

        // Change to today view
        $('#change-view-today').on('click', function() {
            $('#calendar').fullCalendar('today');
        });

        /* initialize the external events
         -----------------------------------------------------------------*/
        $('#external-events .event-control').each(function() {

            // store data so the calendar knows to render an event upon drop
            $(this).data('event', {
                title: $.trim($(this).text()), // use the element's text as the event title
                stick: true // maintain when user navigates (see docs on the renderEvent method)
            });

            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true, // will cause the event to go back to its
                revertDuration: 0 //  original position after the drag
            });

        });

        $('#external-events .event-control .event-remove').on('click', function() {
            $(this).parent().remove();
        });

        // Submitting new event form
        $('#add-event').submit(function(e) {
            e.preventDefault();
            var form = $(this);

            var newEvent = $('<div class="event-control p-10 mb-10">' + $('#event-title').val() + '<a class="pull-right text-muted event-remove"><i class="fa fa-trash-o"></i></a></div>');

            $('#external-events .event-control:last').after(newEvent);

            $('#external-events .event-control').each(function() {

                // store data so the calendar knows to render an event upon drop
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true // maintain when user navigates (see docs on the renderEvent method)
                });

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true, // will cause the event to go back to its
                    revertDuration: 0 //  original position after the drag
                });

            });

            $('#external-events .event-control .event-remove').on('click', function() {
                $(this).parent().remove();
            });

            form[0].reset();

            $('#cal-new-event').modal('hide');

        });
    </script>


</body>

</html>