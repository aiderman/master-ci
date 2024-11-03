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
                            <div id="calendar" class="m-t-20"></div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="body">
                            <div class="collapse-xs collapse-sm collapse" id="open-Schedule">
                                <hr>
                                <div class="event-name b-primary row">
                                    <div class="col-12">
                                        <h6>jadwal shift</h6>
                                        <p>pagi (7.30- 14.00)</p>
                                        <p>shift sore (14.00-21.00)</p>
                                        <p>shift malam (21.00-07.30)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php $this->load->view('script'); ?>
    <script>
        var logbookData = <?php echo json_encode($logbook); ?>;
        $('#calendar').fullCalendar({
            header: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            defaultDate: new Date(), // Set default date to current date
            editable: false, // Set editable to false since no input functionality is needed
            droppable: false, // Disable droppable since we're only viewing
            eventLimit: true, // allow "more" link when too many events
            events: []
        });

        logbookData.forEach(function(log) {
            $('#calendar').fullCalendar('renderEvent', {
                title: log.name,
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
    </script>

</body>

</html>