
--
--
-- TABEL MASTER
--
--

CREATE TABLE IF NOT EXISTS `tb_m_user` (
  `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_jk` enum('Laki-laki','Perempuan') NOT NULL,
  `user_level` enum('admin','guest') NOT NULL,
  `user_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tb_m_tingkat` (
  `id_tingkat` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tingkat_nama` varchar(100) NOT NULL,
  `tingkat_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tingkat_tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id_tingkat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tb_m_sekolah` (
  `id_sekolah` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sekolah_id_tingkat` int(11) unsigned NOT NULL,
  `sekolah_nama` varchar(100) NOT NULL,
  `sekolah_email` varchar(100) NOT NULL,
  `sekolah_telpon` varchar(100) NOT NULL,
  `sekolah_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sekolah_tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id_sekolah`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tb_m_daftar` (
  `id_daftar` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `daftar_id_tingkat` int(11) unsigned NOT NULL,
  `daftar_id_sekolah` int(11) unsigned NOT NULL,
  `daftar_nama` varchar(100) NOT NULL,
  `daftar_email` varchar(100) NOT NULL,
  `daftar_telpon` varchar(100) NOT NULL,
  `daftar_tanggal` DATE NOT NULL,
  `daftar_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `daftar_tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id_daftar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
--
-- TABEL TRANSAKSI
-- ===================================================================================================================================================
--





--
--
-- TABEL VIEWS
-- ==================================================================================================================================================
--

CREATE VIEW view_sekolah
AS
SELECT tb1.id_sekolah, tb1.sekolah_nama, tb1.sekolah_email, tb1.sekolah_telpon, tb1.sekolah_id_tingkat,
tb2.id_tingkat, tb2.tingkat_nama
FROM tb_m_sekolah tb1
LEFT JOIN tb_m_tingkat tb2 ON tb1.sekolah_id_tingkat = tb2.id_tingkat;

CREATE VIEW view_daftar
AS
SELECT tb1.id_daftar, tb1.daftar_id_tingkat, tb1.daftar_id_sekolah, tb1.daftar_nama, tb1.daftar_email, tb1.daftar_telpon, tb1.daftar_tanggal,
tb2.id_tingkat, tb2.tingkat_nama,
tb3.id_sekolah, tb3.sekolah_nama
FROM tb_m_daftar tb1
LEFT JOIN tb_m_tingkat tb2 ON tb1.daftar_id_tingkat = tb2.id_tingkat
LEFT JOIN tb_m_sekolah tb3 ON tb1.daftar_id_sekolah = tb3.id_sekolah;













CREATE VIEW view_daftar
AS
SELECT tb1.id_pembahasan, tb1.pembahasan_id_judul, tb1.pembahasan_id_kategori, tb1.pembahasan_isi,
tb2.id_judul, tb2.judul_nama,
tb3.id_kategori, tb3.kategori_nama
FROM tb_pembahasan tb1
LEFT JOIN tb_m_judul tb2 ON tb1.pembahasan_id_judul = tb2.id_judul
LEFT JOIN tb_kategori tb3 ON tb1.pembahasan_id_kategori = tb3.id_kategori;

CREATE VIEW view_daftar
AS
SELECT tb1.id_daftar, tb1.daftar_id_tingkat, tb1.daftar_id_sekolah, tb1.daftar_nama, tb1.daftar_email, tb1.daftar_telpon, tb1.daftar_tgl_input,
tb2.id_tingkat, tb2.tingkat_nama,
tb3.id_sekolah, tb3.sekolah_nama
FROM tb_m_daftar tb1
LEFT JOIN tb_m_tingkat tb2 ON tb1.daftar_id_tingkat = tb2.id_tingkat
LEFT JOIN tb_m_sekolah tb3 ON tb1.daftar_id_sekolah = tb3.id_sekolah;











CREATE VIEW view_data_guru
AS
SELECT id_user, user_username, user_nama, user_nip, user_jk, user_is_bk, user_level, user_konid, user_aktif, user_stat_data
FROM tb_m_user where user_level= 'guru';


CREATE VIEW view_kelas_siswa
AS
SELECT tb1.id_kelas_siswa, tb1.kelas_siswa_id_kelas, tb1.kelas_siswa_id_siswa,
tb2.id_kelas, tb2.kelas_nama,
tb3.id_siswa, tb3.siswa_nisn, tb3.siswa_nis, tb3.siswa_nama
FROM tb_t_kelas_siswa tb1
LEFT JOIN tb_m_kelas tb2 ON tb1.kelas_siswa_id_kelas = tb2.id_kelas
LEFT JOIN tb_m_siswa tb3 ON tb1.kelas_siswa_id_siswa = tb3.id_siswa;





CREATE VIEW view_guru_mapel
AS
SELECT tb1.id_guru_mapel, tb1.guru_mapel_id_guru, tb1.guru_mapel_id_mapel, tb1.guru_mapel_id_kelas,
tb2.id_user, tb2.user_nama,
tb3.id_mapel, tb3.mapel_nama,
tb4.id_kelas, tb4.kelas_nama
FROM tb_t_guru_mapel tb1
LEFT JOIN view_data_guru tb2 ON tb1.guru_mapel_id_guru = tb2.id_user
LEFT JOIN tb_m_mapel tb3 ON tb1.guru_mapel_id_mapel = tb3.id_mapel
LEFT JOIN tb_m_kelas tb4 ON tb1.guru_mapel_id_kelas = tb4.id_kelas;


CREATE VIEW view_walikelas
AS
SELECT tb1.id_walikelas, tb1.walikelas_id_guru, tb1.walikelas_id_kelas, tb1.walikelas_tasm,
tb2.id_kelas, tb2.kelas_nama,
tb3.id_user, tb3.user_nama
FROM tb_t_walikelas tb1
LEFT JOIN tb_m_kelas tb2 ON tb1.walikelas_id_kelas = tb2.id_kelas
LEFT JOIN view_data_guru tb3 ON tb1.walikelas_id_guru = tb3.id_user;




--
-- VIEW
--

CREATE VIEW data_view_kategori
AS
SELECT tb1.id_katepos, tb1.katepos_posts, tb1.katepos_kategori,
tb2.id_kategori, tb2.kategori_nama, tb2.kategori_slug , tb2.kategori_keterangan
FROM data_katepos tb1
LEFT JOIN data_kategori tb2 ON tb1.katepos_kategori = tb2.id_kategori;

--
-- PENGATURAN
--

CREATE TABLE IF NOT EXISTS `data_option` (
  `id_option` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(150) NOT NULL,
  `option_value` text NOT NULL,
  `option_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `option_tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id_option`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `data_user` (
  `id_user` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(150) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_email` varchar(150) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_level` enum('Administrator','Guest') NOT NULL,
  `user_status` enum('Aktif','Nonaktif') NOT NULL,
  `user_jk` enum('Laki-laki','Perempuan','Lain-lain') NOT NULL,
  `user_foto` varchar(100) NOT NULL,
  `user_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- VIEW
--

CREATE VIEW view_data_barang
AS
SELECT tb1.id_barang, tb1.barang_nama, tb1.barang_id_lokasi, tb1.barang_kode, tb1.barang_harga, tb1.barang_satuan,
tb2.id_lokasi, tb2.lokasi_nama
FROM data_barang tb1
LEFT JOIN data_lokasi tb2 ON tb1.barang_id_lokasi = tb2.id_lokasi;


--
--
--
--




CREATE TABLE IF NOT EXISTS `data_kampus` (
  `id_kampus` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kampus_nama`  varchar(200) NOT NULL,
  `kampus_status` enum('nonactive','active') NOT NULL,
  `kampus_link` text NOT NULL,
  `kampus_keterangan` text NOT NULL,
  `kampus_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `kampus_tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id_kampus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



CREATE TABLE IF NOT EXISTS `data_detail` (
  `id_detail` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `detail_id_kampus` int(11) unsigned NOT NULL,
  `detail_status` enum('nonactive','active') NOT NULL,
  `detail_video`  text NOT NULL,
  `detail_keterangan` text NOT NULL,
  `detail_tgl_edit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `detail_tgl_input` datetime NOT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





INSERT INTO `data_kampus` (`kampus_nama`, `kampus_status`, `kampus_link`, `kampus_keterangan`, `kampus_tgl_edit`, `kampus_tgl_input`) VALUES
('Kampus 1', 'active', '1.jpg', 'Kampus Al Azhar', '2018-10-31 13:54:48', '2018-10-31 05:12:41'),
('Kampus 2', 'nonactive', '2.jpg', 'Kampus Al Azhar', '2018-10-31 13:54:48', '2018-10-31 05:12:41'),
('Kampus 3', 'nonactive', '3.jpg', 'Kampus Al Azhar', '2018-10-31 13:54:48', '2018-10-31 05:12:41'),
('Kampus 4', 'nonactive', '4.jpg', 'Kampus Al Azhar', '2018-10-31 13:54:48', '2018-10-31 05:12:41'),
('Kampus 5', 'nonactive', '5.jpg', 'Kampus Al Azhar', '2018-10-31 13:54:48', '2018-10-31 05:12:41'),
('Kampus 6', 'nonactive', '6.jpg', 'Kampus Al Azhar', '2018-10-31 13:54:48', '2018-10-31 05:12:41'),
('Kampus 7', 'nonactive', '7.jpg', 'Kampus Al Azhar', '2018-10-31 13:54:48', '2018-10-31 05:12:41'),
('Kampus 8', 'nonactive', '8.jpg', 'Kampus Al Azhar', '2018-10-31 13:54:48', '2018-10-31 05:12:41'),
('Kampus 9', 'nonactive', '9.jpg', 'Kampus Al Azhar', '2018-10-31 13:54:48', '2018-10-31 05:12:41'),
('Kampus 10', 'nonactive', '10.jpg', 'Kampus Al Azhar', '2018-10-31 13:54:48', '2018-10-31 05:12:41'),
('Kampus 11', 'nonactive', '11.jpg', 'Kampus Al Azhar', '2018-10-31 13:54:48', '2018-10-31 05:12:41'),
('Kampus 12', 'nonactive', '12.jpg', 'Kampus Al Azhar', '2018-10-31 13:54:48', '2018-10-31 05:12:41'),
('Kampus 13', 'nonactive', '13.jpg', 'Kampus Al Azhar', '2018-10-31 13:54:48', '2018-10-31 05:12:41');




