<?php
// Lanjutan dari Pertemuan 1 (lihat ../../week-1.md): form HTML statis
// sekarang dicetak & dihitung pakai PHP.

$harga = [
    'penginapan'   => 1000000,
    'transportasi' => 1200000,
    'makanan'      => 500000,
];

$namaPemesan = '';
$jumlahPeserta = 0;
$waktuPerjalanan = 0;
$layananDipilih = [];
$hargaPaket = 0;
$jumlahTagihan = 0;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $namaPemesan = trim($_POST['nama_pemesan'] ?? '');
    $jumlahPeserta = (int) ($_POST['jumlah_peserta'] ?? 0);
    $waktuPerjalanan = (int) ($_POST['waktu_perjalanan'] ?? 0);
    $layananDipilih = $_POST['layanan'] ?? [];

    // Jika form isian belum di-input, maka muncul pesan data form pemesanan terisi
    if ($namaPemesan === '' || $jumlahPeserta <= 0 || $waktuPerjalanan <= 0 || empty($layananDipilih)) {
        $error = 'Data form pemesanan harus diisi lengkap.';
    } else {
        // Harga paket perjalanan = penjumlahan dari layanan yang dicentang
        foreach ($layananDipilih as $layanan) {
            if (isset($harga[$layanan])) {
                $hargaPaket += $harga[$layanan];
            }
        }
        // jumlah_tagihan = jumlah_hari x jumlah_peserta x harga_paket_perjalanan
        $jumlahTagihan = $waktuPerjalanan * $jumlahPeserta * $hargaPaket;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>Form Pemesanan Paket Wisata</title>
</head>
<body>
<h1>Form Pemesanan Paket Wisata</h1>

<?php if ($error !== ''): ?>
    <p style="color:red"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<?php if ($jumlahTagihan > 0): ?>
    <div>
        <h2>Rangkuman Reservasi Paket Wisata</h2>
        <p>Nama : <?php echo htmlspecialchars($namaPemesan); ?></p>
        <p>Jumlah Peserta : <?php echo $jumlahPeserta; ?></p>
        <p>Waktu Perjalanan : <?php echo $waktuPerjalanan; ?> hari</p>
        <p>Layanan Paket : <?php echo htmlspecialchars(implode(', ', $layananDipilih)); ?></p>
        <p>Harga Paket : Rp <?php echo number_format($hargaPaket, 0, ',', '.'); ?></p>
        <p>Jumlah Tagihan : Rp <?php echo number_format($jumlahTagihan, 0, ',', '.'); ?></p>
    </div>
<?php endif; ?>

<form method="post" action="pemesanan.php">
    <p>
        Nama Pemesan :
        <input type="text" name="nama_pemesan" value="<?php echo htmlspecialchars($namaPemesan); ?>">
    </p>
    <p>
        Waktu Pelaksanaan Perjalanan (hari) :
        <input type="number" name="waktu_perjalanan" min="1" value="<?php echo $waktuPerjalanan ?: ''; ?>">
    </p>
    <p>
        Jumlah Peserta :
        <input type="number" name="jumlah_peserta" min="1" value="<?php echo $jumlahPeserta ?: ''; ?>">
    </p>
    <p>
        Pelayanan Paket Perjalanan :<br>
        <label><input type="checkbox" name="layanan[]" value="penginapan"> Penginapan (Rp 1.000.000)</label><br>
        <label><input type="checkbox" name="layanan[]" value="transportasi"> Transportasi (Rp 1.200.000)</label><br>
        <label><input type="checkbox" name="layanan[]" value="makanan"> Makanan (Rp 500.000)</label>
    </p>
    <button type="submit">Review Pesanan</button>
</form>
</body>
</html>
