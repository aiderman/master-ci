    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <div class="menu">
            <ul class="list">
                <li>
                    <div class="user-info">
                        <div class="image"><a href="profile.html"><img src="<?= base_url(); ?>assets/images/Hospital.svg" alt="User"></a></div>
                    </div>
                </li>
                <li class="header">MAIN</li>
                <li><a href="<?= base_url(); ?>user/halaman_utama"><i class="zmdi zmdi-home"></i><span>Halaman Utama</span></a></li>
                <li><a href="<?= base_url(); ?>user/edit_profil"><i class="zmdi zmdi-account-o"></i><span>edit profil</span> </a></li>
                <li><a href="<?= base_url(); ?>user/ganti_pass"><i class="zmdi zmdi-account-o"></i><span>ganti pass</span> </a></li>
                <li class="active open"><a href="#" class="menu-toggle"><i class="zmdi zmdi-calendar-check"></i><span>logbook</span> </a>
                    <ul class="ml-menu">
                        <li class="active"><a href="<?= base_url(); ?>user/jadwal">Doctor Schedule</a></li>
                        <li><a href="user/input_jadwal">Book Appointment</a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </aside>