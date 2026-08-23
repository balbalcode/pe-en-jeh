<?php
require 'koneksi.php';

$sql = 'SELECT id_produk, tgl_transaksi, harga, kuantitas FROM sales';
$query = mysqli_query($conn, $sql);
if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

echo '<table><tbody>';
// mengubah fungsi mysqli_fetch_array() menjadi mysqli_fetch_assoc()
while ($row = mysqli_fetch_assoc($query))
{
    echo '<tr>
            <td>'.$row['id_produk'].'</td>
            <td>'.$row['tgl_transaksi'].'</td>
            <td>'.number_format($row['harga'], 0, ',', '.').'</td>
            <td class="right">'.$row['kuantitas'].'</td>
        </tr>';
}
echo '</tbody></table>';
