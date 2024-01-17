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
                            <button type="button" class="btn btn-round btn-info waves-effect" data-toggle="modal" data-target="#addevent">input jadwal</button>
                            <button class="btn btn-default hidden-lg-up m-t-0 float-right" data-toggle="collapse" data-target="#open-Schedule" aria-expanded="false" aria-controls="collapseExample"><i class="zmdi zmdi-chevron-down"></i></button>
                            <div class="collapse-xs collapse-sm collapse" id="open-Schedule">
                                <hr>
                                <div class="event-name b-primary row">
                                    <div class="col-2 text-center">
                                        <h4>11<span>Dec</span><span>2017</span></h4>
                                    </div>
                                    <div class="col-10">
                                        <h6>Conference</h6>
                                        <p>It is a long established fact that a reader will be distracted</p>
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

    <!-- Default Size -->
    <div class="modal fade" id="addevent" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">Add Schedule</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-line">
                            <input type="number" class="form-control" placeholder="Event Date">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <input type="text" class="form-control" placeholder="Event Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-line">
                            <textarea class="form-control no-resize" placeholder="Event Description..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-round waves-effect">Add</button>
                    <button type="button" class="btn btn-simple btn-round waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('script'); ?>
    <script>
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
            events: [{
                    title: 'Long Event',
                    start: '2024-01-07',
                    end: '2024-01-07',
                    className: 'bg-cyan'
                }

            ]
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