<?php
require 'koneksi.php';

$table_name = 'sales';

$sql = 'CREATE TABLE IF NOT EXISTS `' . $table_name . '` (
        `id_transaksi` int(11) NOT NULL AUTO_INCREMENT,
        `id_produk` int(11) NOT NULL,
        `tgl_transaksi` date NOT NULL,
        `kuantitas` tinyint(4) NOT NULL,
        `harga` int(11) NOT NULL,
        `id_pelanggan` int(11) NOT NULL,
        PRIMARY KEY (`id_transaksi`),
        KEY `id_produk` (`id_produk`)
        ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1';

$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('ERROR: Tabel ' . $table_name . ' gagal dibuat: ' . mysqli_error($conn));
}
echo 'Tabel ' . $table_name . ' berhasil dibuat <br/>';
$sql = "INSERT INTO `$table_name` (`id_transaksi`, `id_produk`, `tgl_transaksi`, `kuantitas`, `harga`,
        `id_pelanggan`)
        VALUES (1, 100, '2016-09-20', 8, 265000, 1),
        (2, 100, '2016-10-11', 3, 270000, 2),
        (3, 101, '2016-08-17', 8, 250000, 2),
        (4, 101, '2016-08-24', 12, 380000, 2),
        (5, 101, '2016-05-18', 12, 250000, 1)";

$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('ERROR: Data gagal dimasukkan pada tabel ' . $table_name . ': ' . mysqli_error($conn));
}
echo 'Data berhasil dimasukkan pada tabel ' . $table_name . '';
