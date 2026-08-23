<!DOCTYPE html>
<html>
<body>

<!-- kerangka 1: paling umum dipakai -->
<?php
echo "Kerangka 1 (paling umum) <br>";
?>

<!-- kerangka 2: short tag, harus diaktifkan dulu di php.ini (short_open_tag = On) -->
<? echo "Kerangka 2 (short tag) <br>"; ?>

<!-- kerangka 3: gaya lama, jarang dipakai lagi -->
<script language="php">
echo "Kerangka 3 (script tag, deprecated) <br>";
</script>

<?php
// Fungsi echo() - bisa tanpa tanda kurung, bisa lebih dari satu parameter
echo "Halo dari echo <br>";
echo "Halo ", " dari ", " echo dengan banyak parameter <br>";

// Fungsi print() - hanya boleh satu parameter, tapi selalu return nilai 1
print("Halo dari print <br>");

// Fungsi printf() - untuk formatting teks/string
// %s = string, %d = integer, %f = float, %b = boolean
printf("Nama: %s, Umur: %d tahun <br>", "Budi", 20);
?>

</body>
</html>
