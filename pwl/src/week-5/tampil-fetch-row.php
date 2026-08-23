<?php
require 'koneksi.php';

$sql = 'SELECT id_produk, tgl_transaksi, harga, kuantitas FROM sales';
$query = mysqli_query($conn, $sql);
if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

echo '<table><tbody>';
// menggunakan mysqli_fetch_row() dengan memanggil nama field berdasarkan index nya.
while ($row = mysqli_fetch_row($query))
{
    echo '<tr>
            <td>'.$row[0].'</td>
            <td>'.$row[1].'</td>
            <td>'.number_format($row[2], 0, ',', '.').'</td>
            <td class="right">'.$row[3].'</td>
        </tr>';
}
echo '</tbody></table>';
