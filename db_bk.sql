-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Jan 10, 2013 at 11:24 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `db_bk`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `tb_asal_sekolah`
-- 

CREATE TABLE `tb_asal_sekolah` (
  `id_asal_sekolah` int(20) NOT NULL auto_increment,
  `asal_sekolah` varchar(200) default NULL,
  PRIMARY KEY  (`id_asal_sekolah`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `tb_asal_sekolah`
-- 

INSERT INTO `tb_asal_sekolah` VALUES (1, 'SMP 1 Handayani');
INSERT INTO `tb_asal_sekolah` VALUES (2, 'SMP 2 Handayani');
INSERT INTO `tb_asal_sekolah` VALUES (3, 'SMP 3 Handayani');
INSERT INTO `tb_asal_sekolah` VALUES (6, 'SMP 4 Handayani');

-- --------------------------------------------------------

-- 
-- Table structure for table `tb_data_siswa`
-- 

CREATE TABLE `tb_data_siswa` (
  `id_siswa` bigint(20) NOT NULL default '0',
  `nama_siswa` varchar(200) default NULL,
  `nama_panggilan` varchar(200) default NULL,
  `kelas` bigint(20) default NULL,
  `jurusan` bigint(20) default NULL,
  `no_induk` varchar(50) default NULL,
  `gol_darah` varchar(20) default NULL,
  `jns_kelamin` varchar(50) default NULL,
  `tpt_lahir` varchar(150) default NULL,
  `tgl_lahir` datetime default NULL,
  `agama` varchar(20) default NULL,
  `anak_ke` varchar(15) default NULL,
  `jml_saudara` varchar(15) default NULL,
  `asal_sekolah` bigint(20) default NULL,
  `jml_SKHU` varchar(20) default NULL,
  `telp_rumah` varchar(50) default NULL,
  `almt_rumah` text,
  `stt_ayah` varchar(50) default NULL,
  `nama_ayah` varchar(200) default NULL,
  `umur_ayah` varchar(20) default NULL,
  `pekerjaan_ayah` varchar(100) default NULL,
  `pend_akhir_ayah` varchar(20) default NULL,
  `stt_ibu` varchar(50) default NULL,
  `nama_ibu` varchar(200) default NULL,
  `umur_ibu` varchar(20) default NULL,
  `agama_ibu` varchar(20) default NULL,
  `pekerjaan_ibu` varchar(100) default NULL,
  `pend_akhir_ibu` varchar(20) default NULL,
  `riwayat_sakit` varchar(200) default NULL,
  `hobby` varchar(200) default NULL,
  `kecp_prestasi_1` varchar(200) default NULL,
  `photo` longblob,
  PRIMARY KEY  (`id_siswa`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `tb_data_siswa`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tb_jurusan`
-- 

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(20) NOT NULL auto_increment,
  `jurusan` varchar(50) default NULL,
  PRIMARY KEY  (`id_jurusan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `tb_jurusan`
-- 

INSERT INTO `tb_jurusan` VALUES (1, 'Perhotelan');
INSERT INTO `tb_jurusan` VALUES (2, 'Kecantikan');
INSERT INTO `tb_jurusan` VALUES (3, 'Tata Boga');
INSERT INTO `tb_jurusan` VALUES (4, 'Tata Busana');
INSERT INTO `tb_jurusan` VALUES (7, '-');

-- --------------------------------------------------------

-- 
-- Table structure for table `tb_kelas`
-- 

CREATE TABLE `tb_kelas` (
  `id_kelas` int(20) NOT NULL auto_increment,
  `kelas` varchar(20) default NULL,
  PRIMARY KEY  (`id_kelas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- 
-- Dumping data for table `tb_kelas`
-- 

INSERT INTO `tb_kelas` VALUES (1, 'X-1');
INSERT INTO `tb_kelas` VALUES (2, 'X-2');
INSERT INTO `tb_kelas` VALUES (3, 'X-3');
INSERT INTO `tb_kelas` VALUES (4, 'X-4');
INSERT INTO `tb_kelas` VALUES (5, 'X-5');
INSERT INTO `tb_kelas` VALUES (6, 'X-6');
INSERT INTO `tb_kelas` VALUES (7, 'X-7');
INSERT INTO `tb_kelas` VALUES (8, 'X-8');
INSERT INTO `tb_kelas` VALUES (9, 'X-9');
INSERT INTO `tb_kelas` VALUES (10, 'XI-1');
INSERT INTO `tb_kelas` VALUES (11, 'XI-2');
INSERT INTO `tb_kelas` VALUES (12, 'XI-3');
INSERT INTO `tb_kelas` VALUES (13, 'XI-4');
INSERT INTO `tb_kelas` VALUES (14, 'XI-5');
INSERT INTO `tb_kelas` VALUES (15, 'XI-6');
INSERT INTO `tb_kelas` VALUES (16, 'XI-7');
INSERT INTO `tb_kelas` VALUES (17, 'XI-8');
INSERT INTO `tb_kelas` VALUES (18, 'XI-9');
INSERT INTO `tb_kelas` VALUES (19, 'XII-1');
INSERT INTO `tb_kelas` VALUES (20, 'XII-2');
INSERT INTO `tb_kelas` VALUES (21, 'XII-3');
INSERT INTO `tb_kelas` VALUES (22, 'XII-4');
INSERT INTO `tb_kelas` VALUES (23, 'XII-5');
INSERT INTO `tb_kelas` VALUES (24, 'XII-6');
INSERT INTO `tb_kelas` VALUES (25, 'XII-7');
INSERT INTO `tb_kelas` VALUES (26, 'XII-8');
INSERT INTO `tb_kelas` VALUES (27, 'XII-9');
INSERT INTO `tb_kelas` VALUES (29, 'XII-10');

-- --------------------------------------------------------

-- 
-- Table structure for table `tb_konseling`
-- 

CREATE TABLE `tb_konseling` (
  `id_konseling` bigint(20) NOT NULL auto_increment,
  `nis` varchar(50) default NULL,
  `tgl` date default NULL,
  `kasus` text,
  `deskripsi_masalah` text,
  `diagnosa_masalah` text,
  `tindak_lanjut` text,
  PRIMARY KEY  (`id_konseling`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Dumping data for table `tb_konseling`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tb_konsultasi`
-- 

CREATE TABLE `tb_konsultasi` (
  `id_konsultasi` bigint(20) NOT NULL default '0',
  `nis` varchar(50) default NULL,
  `tgl_konsultasi` date default NULL,
  `hasil_konsultasi` text NOT NULL,
  PRIMARY KEY  (`id_konsultasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `tb_konsultasi`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tb_suratundanganorangtua`
-- 

CREATE TABLE `tb_suratundanganorangtua` (
  `no_surat` varchar(50) NOT NULL default '',
  `perihal` varchar(50) default NULL,
  `nis` varchar(50) default NULL,
  `ditempat` varchar(50) default NULL,
  `hari` varchar(50) default NULL,
  `tgl` datetime default NULL,
  `waktu` varchar(20) default NULL,
  `tempat` varchar(50) default NULL,
  `keperluan` varchar(100) default NULL,
  PRIMARY KEY  (`no_surat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `tb_suratundanganorangtua`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tb_surat_panggilansiswa`
-- 

CREATE TABLE `tb_surat_panggilansiswa` (
  `no_surat` varchar(50) NOT NULL default '',
  `perihal` varchar(100) default NULL,
  `siswa` varchar(100) default NULL,
  `kls` varchar(20) default NULL,
  `jam` varchar(20) default NULL,
  `perlu` varchar(100) default NULL,
  `guru` varchar(100) default NULL,
  `nip` varchar(50) default NULL,
  PRIMARY KEY  (`no_surat`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Dumping data for table `tb_surat_panggilansiswa`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `tb_user`
-- 

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL auto_increment,
  `namauser` varchar(50) default NULL,
  `pass` varchar(50) default NULL,
  `nip` varchar(50) default NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  PRIMARY KEY  (`id_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `tb_user`
-- 

INSERT INTO `tb_user` VALUES (1, 'admin', 'admin', NULL, '');
