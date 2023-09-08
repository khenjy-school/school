CREATE TABLE tb_detail_transaksi (id INT, id_transaksi INT, id_paket INT, qty DOUBLE, keterangan TEXT);

CREATE TABLE tb_paket (id INT, id_outlet INT, jenis ENUM ('kiloan', 'selimut', 'bed_cover', 'kaos', 'lain'), nama_paket VARCHAR(100), harga INT);

CREATE TABLE tb_transaksi (id INT, id_outlet INT, kode_invoice VARCHAR(100), id_member INT, tgl DATETIME, batas_waktu DATETIME, tgl_bayar DATETIME, biaya_tambahan INT, diskon DOUBLE, pajak INT, status ENUM ('baru', 'proses', 'selesai', 'diambil'),  dibayar ENUM('dibayar', 'belum_dibayar'), id_user INT);

CREATE TABLE tb_member (id INT, nama VARCHAR(100), alamat TEXT, jenis_kelamin ENUM('L', 'P'), tlp VARCHAR(15));

CREATE TABLE tb_outlet (id INT, nama VARCHAR(100), alamat TEXT, tlp VARCHAR(15));

CREATE TABLE tb_user (id INT, nama VARCHAR(100), username VARCHAR(30), password TEXT, id_outlet INT, role ENUM ('admin', 'kasir', 'owner'));

==========================
DATA DUMMY
==========================
user
username : admin
password : 123