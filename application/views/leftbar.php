<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="javascript:void(0);"><img src="<?= base_url(); ?>assets/images/logo-mini.png" alt="User" style="height: 80px;"></a></div>
                </div>
            </li>
            <li class="header">MAIN</li>

            <?php if ($role_id == 1) : ?>
                <a href="<?= base_url(); ?>user/logbook_login" id="halaman-utama"><i class="zmdi zmdi-home"></i><span>Halaman Utama</span></a></li>
                <li><a href="<?= base_url(); ?>user/profil" id="profil"><i class="zmdi zmdi-account-o"></i><span>profil</span></a></li>
                <li><a href="<?= base_url(); ?>user/ganti_pass" id="ganti-pass"><i class="zmdi zmdi-account-o"></i><span>ganti pass</span></a></li>
                <li><a href="<?= base_url(); ?>user/logbook_login" id="logbook"><i class="zmdi zmdi-calendar-check"></i><span>logbook</span></a></li>
                <li><a href="<?= base_url(); ?>user/logbook_riwayat" id="logbook"><i class="zmdi zmdi-calendar-check"></i><span>history logbook</span></a></li>
            <?php elseif ($role_id == 2) : ?>
                <li><a href="<?= base_url(); ?>admin/logbook_login" id="logbook"><i class="zmdi zmdi-calendar-check"></i><span>logbook</span></a></li>
                <li><a href="<?= base_url(); ?>admin/logbook_riwayat" id="logbook"><i class="zmdi zmdi-calendar-check"></i><span>history logbook</span></a></li>
                <li><a href="<?= base_url(); ?>admin/profil" id="profil"><i class="zmdi zmdi-account-o"></i><span>profil</span></a></li>
                <li><a href="<?= base_url(); ?>admin/data_perawat" id="profil"><i class="zmdi zmdi-account-o"></i><span>data perawat</span></a></li>
                <li><a href="<?= base_url(); ?>admin/jadwal_perawat" id="profil"><i class="zmdi zmdi-account-o"></i><span>jadwal perawat</span></a></li>
                <li><a href="<?= base_url(); ?>admin/ganti_pass" id="ganti-pass"><i class="zmdi zmdi-account-o"></i><span>ganti pass</span></a></li>
            <?php elseif ($role_id == 3) : ?>
                <li><a href="<?= base_url(); ?>admin_validator/logbook_login" id="logbook"><i class="zmdi zmdi-calendar-check"></i><span>logbook</span></a></li>
                <li><a href="<?= base_url(); ?>admin_validator/logbook_riwayat" id="logbook"><i class="zmdi zmdi-calendar-check"></i><span>history logbook</span></a></li>
                <li><a href="<?= base_url(); ?>admin_validator/profil" id="profil"><i class="zmdi zmdi-account-o"></i><span>profil</span></a></li>
                <li><a href="<?= base_url(); ?>admin_validator/data_perawat" id="profil"><i class="zmdi zmdi-account-o"></i><span>data perawat</span></a></li>
                <li><a href="<?= base_url(); ?>admin_validator/ganti_pass" id="ganti-pass"><i class="zmdi zmdi-account-o"></i><span>ganti pass</span></a></li>
            <?php endif; ?>

        </ul>
    </div>
</aside>