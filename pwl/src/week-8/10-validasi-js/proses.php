<?php
// proses.php tidak ditampilkan di slide untuk contoh validasi Javascript ini
// (validasinya udah kejadian di sisi client sebelum form di-submit lewat pesan()).
// Ini stub sederhana biar data.php di folder ini bisa langsung dicoba.
$nama = $_POST["nama"] ?? '';
$umur = $_POST["umur"] ?? '';
$email = $_POST["email"] ?? '';

echo "Nama  : $nama<br>";
echo "Umur  : $umur<br>";
echo "Email : $email<br>";
