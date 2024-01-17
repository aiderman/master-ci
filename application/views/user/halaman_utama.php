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
        <div class="container-fluid">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 col-lg-4 col-xl-4">
                        <div class="body">
                            <button type="button" class="btn btn-round btn-info waves-effect" data-toggle="modal" data-target="#addevent">Add Schedule</button>
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
                                <div class="event-name b-primary row">
                                    <div class="col-2 text-center">
                                        <h4>13<span>Dec</span><span>2017</span></h4>
                                    </div>
                                    <div class="col-10">
                                        <h6>Birthday</h6>
                                        <p>It is a long established fact that a reader will be distracted</p>
                                        <address><i class="zmdi zmdi-pin"></i> 123 6th St. Melbourne, FL 32904</address>
                                    </div>
                                </div>
                                <hr>
                                <div class="event-name b-lightred row">
                                    <div class="col-2 text-center">
                                        <h4>09<span>Dec</span><span>2017</span></h4>
                                    </div>
                                    <div class="col-10">
                                        <h6>Repeating Event</h6>
                                        <p>It is a long established fact that a reader will be distracted</p>
                                        <address><i class="zmdi zmdi-pin"></i> 123 6th St. Melbourne, FL 32904</address>
                                    </div>
                                </div>
                                <hr>
                                <div class="event-name b-greensea row">
                                    <div class="col-2 text-center">
                                        <h4>16<span>Dec</span><span>2017</span></h4>
                                    </div>
                                    <div class="col-10">
                                        <h6>Repeating Event</h6>
                                        <p>It is a long established fact that a reader will be distracted</p>
                                        <address><i class="zmdi zmdi-pin"></i> 123 6th St. Melbourne, FL 32904</address>
                                    </div>
                                </div>
                                <div class="event-name b-greensea row">
                                    <div class="col-2 text-center">
                                        <h4>28<span>Dec</span><span>2017</span></h4>
                                    </div>
                                    <div class="col-10">
                                        <h6>Google</h6>
                                        <p>It is a long established fact that a reader will be distracted</p>
                                        <address><i class="zmdi zmdi-pin"></i> 123 6th St. Melbourne, FL 32904</address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-8 col-xl-8">
                        <div class="body">
                            <button class="btn btn-primary btn-round waves-effect" id="change-view-today">today</button>
                            <button class="btn btn-default btn-simple btn-round waves-effect" id="change-view-day">Day</button>
                            <button class="btn btn-default btn-simple btn-round waves-effect" id="change-view-week">Week</button>
                            <button class="btn btn-default btn-simple btn-round waves-effect" id="change-view-month">Month</button>
                            <div id="calendar" class="m-t-20"></div>
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
</body>

</html>