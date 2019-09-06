DROP TABLE tbl_disposisi;

CREATE TABLE `tbl_disposisi` (
  `id_disposisi` int(10) NOT NULL AUTO_INCREMENT,
  `tujuan` varchar(250) NOT NULL,
  `isi_disposisi` mediumtext NOT NULL,
  `sifat` varchar(100) NOT NULL,
  `batas_waktu` date NOT NULL,
  `catatan` varchar(250) NOT NULL,
  `id_surat` int(10) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_disposisi`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO tbl_disposisi VALUES("2","Kampus UNIKOM","Dalam prosedur pengurusan surat masuk, ada salah satu tahapan yang dilakukan oleh pencatat surat atau agendaris, yang memanfaatkan lembar disposisi. Penggunaan lembar disposisi ini dilakukan ketika proses menyampaikan surat. Dalam penyampaian surat, maka hendaknya disertai dengan lembar disposisi kepada pengarah surat.","Penting","2019-08-31","Dear Rektor UNIKOM","3","1");
INSERT INTO tbl_disposisi VALUES("4","Ketua Program Studi Teknik Informatika UNIKOM","Aditya Nugraha - 10116111, Mohammad Iskandar - 10116121, Zikran Hafizan A - 10116164.","Biasa","2019-09-07","diterima Kerja Praktek di kantor TIK Polri Polrestabes Bandung selama 1 bulan","4","1");



DROP TABLE tbl_instansi;

CREATE TABLE `tbl_instansi` (
  `id_instansi` tinyint(1) NOT NULL,
  `institusi` varchar(150) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kepsek` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `website` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_instansi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_instansi VALUES("1","KEPOLISIAN NEGARA REPUBLIK INDONESIA","RESOR KOTA BESAR BANDUNG","Jl. Merdeka No.18-20 Bandung 40117","BUDY YURDARTO","908192739127","http://polrestabes-bandung.or.id/","humas@polrestabes-bandung.or.id","logo-polisi.png","1");



DROP TABLE tbl_klasifikasi;

CREATE TABLE `tbl_klasifikasi` (
  `id_klasifikasi` int(5) NOT NULL AUTO_INCREMENT,
  `kode` varchar(30) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `uraian` mediumtext NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_klasifikasi`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tbl_klasifikasi VALUES("1","VOC1G1AIYISQV","mohammad iskandar","dsfdsdf","1");
INSERT INTO tbl_klasifikasi VALUES("2","sdf","sdf","dsfsdf
sdfsdf
sdf
","1");



DROP TABLE tbl_sett;

CREATE TABLE `tbl_sett` (
  `id_sett` tinyint(1) NOT NULL,
  `surat_masuk` tinyint(2) NOT NULL,
  `surat_keluar` tinyint(2) NOT NULL,
  `referensi` tinyint(2) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_sett`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO tbl_sett VALUES("1","10","10","10","1");



DROP TABLE tbl_surat_keluar;

CREATE TABLE `tbl_surat_keluar` (
  `id_surat` int(10) NOT NULL AUTO_INCREMENT,
  `no_agenda` int(10) NOT NULL,
  `tujuan` varchar(250) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `isi` mediumtext NOT NULL,
  `kode` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_catat` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO tbl_surat_keluar VALUES("1","1","Kampus UNIKOM","A91","Bagian-bagian surat resmi berikutnya adalah bagian hal atau perihal. Fungsi bagian hal dalam surat adalah memberi petunjuk pada pembaca tentang kepentingan dan isi pokok dalam surat tersebut. Singkatnya, hal atau perihal hampir sama dengan judul pada surat berjudul.","5646","2019-08-29","2019-08-27","8799-030208-098107-Windarto-MHaekal.pdf","tidak ada keterangan","1");
INSERT INTO tbl_surat_keluar VALUES("2","2","UNIKOM","das/12/asd/12","-","700","2019-09-16","2019-09-04","5540-6-DOKUMEN KERJA PRAKTEK IF - STRUKTUR PANITIA.docx","-","1");



DROP TABLE tbl_surat_masuk;

CREATE TABLE `tbl_surat_masuk` (
  `id_surat` int(10) NOT NULL AUTO_INCREMENT,
  `no_agenda` int(10) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `asal_surat` varchar(250) NOT NULL,
  `isi` mediumtext NOT NULL,
  `kode` varchar(30) NOT NULL,
  `indeks` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_diterima` date NOT NULL,
  `file` varchar(250) NOT NULL,
  `keterangan` varchar(250) NOT NULL,
  `id_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO tbl_surat_masuk VALUES("2","1","120/RTMK/2208/WERWER/2019","Sekolah SMKN 1 Bandung","Pada beberapa surat juga terdapat lampiran yang disertakan. Bagian lampiran merupakan penjelas yang memberi informasi bahwa ada berkas atau dokumen lain yang disertakan dalam surat tersebut. Jika misal tidak terdapat berkas atau dokumen yang dilampirkan, maka bagian lampiran ditiadakan.","3632","A24","2019-08-27","2019-08-27","4584-CKEditor4.PFW.Sample.Recognition_of_Achievement.docx","tidak ada keterangan","1");
INSERT INTO tbl_surat_masuk VALUES("3","2","DEH/2287/IOOI/2019","Kampus UNIKOM","Penulisan lampiran yang disertakan bisa disebutkan jumlah lembar, eksemplar atau cukup jumlah berkasnya dengan bentuk huruf. Jika lebih dari sepuluh maka ditulis dalam bentuk angka. Sedangkan jika tidak ada lampiran bisa ditulis tanda penghubung atau tanda minus.","9999","A78","2019-09-10","2019-08-27","9646-skck.doc","tidak ada keterangan","1");
INSERT INTO tbl_surat_masuk VALUES("4","3","B / 69 / VII / 2019 / Si Tipol","Bandung","Penerimaan Kerja Praktek di TIK Polri Polretabes Bandung","000","Surat-12","2019-09-10","2019-09-04","8220-7-DOKUMEN KERJA PRAKTEK IF - COVER.docx","UNIKOM","1");



DROP TABLE tbl_user;

CREATE TABLE `tbl_user` (
  `id_user` tinyint(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO tbl_user VALUES("1","admin","21232f297a57a5a743894a0e4a801fc3","Administrator","10116121","1");



