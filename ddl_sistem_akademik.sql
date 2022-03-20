/*
How to use :
1. Create sistem_akademik database in phpmyadmin
2. Click the created database
3. Click import and choose this file
4. Database created
*/

CREATE TABLE IF NOT EXISTS `pengumuman` (
  id int(11) NOT NULL AUTO_INCREMENT,
  judul varchar(128) NOT NULL,
  keterangan varchar(1000) NOT NULL,
  tanggal date NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS `dosen` (
  nip varchar(10) NOT NULL,
  nama varchar(120) NOT NULL,
  tanggalLahir date NOT NULL,
  tempatLahir varchar(100) NOT NULL,
  jenisKelamin char(1) NOT NULL,
  alamat varchar(200) NOT NULL,
  noTelepon varchar(15) NOT NULL,
  email varchar(120) NOT NULL,
  password varchar(300) NOT NULL,
  fotoProfil blob,
  bidangIlmu varchar(100) NOT NULL,
  gelarAkademik varchar(20) NOT NULL,
  programStudi varchar(20) NOT NULL,
  statusDosen varchar(20) NOT NULL,
  statusIkatanKerja varchar(20) NOT NULL,
  PRIMARY KEY (nip)
);

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  nim varchar(10) NOT NULL,
  nama varchar(120) NOT NULL,
  tanggalLahir date NOT NULL,
  tempatLahir varchar(100) NOT NULL,
  jenisKelamin char(1) NOT NULL,
  alamat varchar(200) NOT NULL,
  noTelepon varchar(15) NOT NULL,
  email varchar(120) NOT NULL,
  password varchar(300) NOT NULL,
  fotoProfil blob,
  jurusan varchar(20) NOT NULL,
  tahunMasuk date NOT NULL,
  tahunLulus date,
  PRIMARY KEY (nim)
);

CREATE TABLE IF NOT EXISTS `matakuliah` (
  kode varchar(10) NOT NULL,
  jenis varchar(20) NOT NULL,
  nama varchar(50) NOT NULL,
  sifat varchar(20) NOT NULL,
  sks int(11) NOT NULL,
  PRIMARY KEY (kode)
);

CREATE TABLE IF NOT EXISTS `rencana_studi` (
  id int(11) NOT NULL AUTO_INCREMENT,
  semester int(11) NOT NULL,
  tahun year(4) NOT NULL,
  nim varchar(10) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (nim) REFERENCES mahasiswa (nim) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS `pengambilan_mk` (
  id int(11) NOT NULL AUTO_INCREMENT,
  kode varchar(10) NOT NULL,
  jumlah_pertemuan int(11) NOT NULL,
  kelas varchar(10) NOT NULL,
  semester varchar(20) NOT NULL,
  tahun int(11) NOT NULL,
  nip varchar(10) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (kode) REFERENCES matakuliah(kode) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (nip) REFERENCES dosen(nip) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS `mk_rencana_studi` (
  id_rencana_studi int(11) NOT NULL,
  id_ambil_mk int(11) NOT NULL,
  status_disetujui int(11) NOT NULL,
  PRIMARY KEY (id_rencana_studi,id_ambil_mk),
  FOREIGN KEY (id_ambil_mk) REFERENCES pengambilan_mk(id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (id_rencana_studi) REFERENCES rencana_studi(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS `roster` (
  id int(11) NOT NULL AUTO_INCREMENT,
  jam_mulai time NOT NULL,
  jam_selesai time NOT NULL,
  ruangan varchar(100) NOT NULL,
  tanggal date NOT NULL,
  matakuliah int(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (matakuliah) REFERENCES pengambilan_mk(id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS `nilai_mk` (
  id int(11) NOT NULL AUTO_INCREMENT,
  nilaiIndex varchar(2),
  nilai1 float,
  nilai2 float,
  nilai3 float,
  nilai4 float,
  nilai5 float,
  nilaiUas float,
  nilaiAkhir float,
  mk_diambil int(11) NOT NULL,
  nim varchar(10) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (mk_diambil) REFERENCES pengambilan_mk(id) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (nim) REFERENCES mahasiswa(nim) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS `skripsi` (
  id int(11) NOT NULL AUTO_INCREMENT,
  judul varchar(100) NOT NULL,
  file varchar(128),
  batas_akhir date NOT NULL,
  milestone int(11) NOT NULL,
  nim varchar(10) NOT NULL,
  nip varchar(10) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (nip) REFERENCES dosen (nip) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (nim) REFERENCES mahasiswa (nim) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS `kehadiran_dosen` (
  id int(11) NOT NULL AUTO_INCREMENT,
  roster int(11) NOT NULL,
  nip varchar(10) NOT NULL,
  status int(11) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (nip) REFERENCES dosen(nip) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (roster) REFERENCES roster(id) ON DELETE CASCADE ON UPDATE CASCADE
);