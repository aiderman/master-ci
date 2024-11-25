create view v_list_perawat as
select `t_users`.`id_user` AS `id_user`,`t_users`.`name` AS `name`,`t_users`.`username` AS `username`,`t_users`.`password` AS `password`,`t_users`.`role_id` AS `role_id`,`t_users`.`position` AS `position`,`t_users`.`NRP` AS `NRP`,`t_users`.`pendidikan` AS `pendidikan`,`t_users`.`str_berlaku` AS `str_berlaku`,`t_users`.`str_selesai` AS `str_selesai`,`t_users`.`ruangan` AS `ruangan`,`t_users`.`pengalaman_id` AS `pengalaman_id`,`t_users`.`image` AS `image` from `t_users` where (`t_users`.`role_id` = '1')


create view v_log_users as 
select `lb`.`id_log` AS `id_log`,`u`.`id_user` AS `id_user`,`u`.`name` AS `name`,`lb`.`tanggal` AS `tanggal`,`lb`.`PK` AS `PK`,`lb`.`nama_kewenangan` AS `nama_kewenangan`,`lb`.`no_rekam_medis` AS `no_rekam_medis`,`lb`.`tindakan_keperawatan` AS `tindakan_keperawatan`,`lb`.`nilai` AS `nilai`,`lb`.`sifat` AS `sifat`,`lb`.`v_karo` AS `v_karo`,`lb`.`v_kabid` AS `v_kabid`,`lb`.`status` AS `status`,`u`.`ruangan` AS `ruangan`,`u`.`name` AS `nama_perawat`,`r`.`role` AS `nama_role`,now() AS `created` from ((`t_logbook` `lb` join `t_users` `u` on((`lb`.`id_user` = `u`.`id_user`))) join `t_role` `r` on((`u`.`role_id` = `r`.`id_role`)))


create view v_profil as 
select `p`.`id_pengalaman` AS `id_pengalaman`,`p`.`id_user` AS `id_user`,`p`.`tahun_masuk` AS `tahun_masuk`,`p`.`tahun_selesai` AS `tahun_selesai`,`p`.`penempatan` AS `penempatan`,`u`.`name` AS `name`,`u`.`username` AS `username`,`u`.`position` AS `position`,`u`.`ruangan` AS `ruangan` from (`t_pengalaman` `p` join `t_users` `u` on((`p`.`id_user` = `u`.`id_user`)))



create view v_user_logbook as 
select `lb`.`id_log` AS `id_log`,`u`.`id_user` AS `id_user`,`lb`.`tanggal` AS `tanggal`,`lb`.`PK` AS `PK`,`lb`.`nama_kewenangan` AS `nama_kewenangan`,`lb`.`no_rekam_medis` AS `no_rekam_medis`,`lb`.`tindakan_keperawatan` AS `tindakan_keperawatan`,`lb`.`nilai` AS `nilai`,`lb`.`sifat` AS `sifat`,`lb`.`v_karo` AS `v_karo`,`lb`.`v_kabid` AS `v_kabid`,`lb`.`status` AS `status`,`u`.`ruangan` AS `ruangan`,`u`.`name` AS `nama_perawat`,`r`.`role` AS `nama_role`,now() AS `created` from ((`t_logbook` `lb` join `t_users` `u` on((`lb`.`id_user` = `u`.`id_user`))) join `t_role` `r` on((`u`.`role_id` = `r`.`id_role`)))


SELECT 
    lb.id_log, 
    lb.tanggal, 
    lb.piket, 
    lb.nilai, 
    lb.sifat, 
    lb.v_karo, 
    lb.v_kabid, 
    lb.created, 
    lb.status, 
    u.id_user AS id_user, 
    u.username AS username, 
    u.position AS position, 
    r.role AS role, 
    p.penempatan AS penempatan, 
    rm.tindakan_keperawatan AS tindakan_keperawatan, 
    rm.PK AS PK, 
    rm.nama_kewenangan AS rekam_medis_kewenangan,
    rm.no_rekam_medis AS rekam_medis_nomor

FROM 
    t_logbook lb
LEFT JOIN 
    t_users u ON lb.id_user = u.id_user
LEFT JOIN 
    t_role r ON u.role_id = r.id_role
LEFT JOIN 
    t_pengalaman p ON u.pengalaman_id = p.id_pengalaman
LEFT JOIN 
    t_rekam_medis rm ON lb.id_rek = rm.id_rek 