<?php
require 'koneksi.php';

// dapat membuat temporary field dengan menambahkan AS, atau tanpa menggunakan AS (harga*kuantitas total_byr)
$sql = 'SELECT id_produk, tgl_transaksi, harga, kuantitas, harga*kuantitas AS total_byr
        FROM sales';

$query = mysqli_query($conn, $sql);
if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

echo '<table><tbody>';
while ($row = mysqli_fetch_array($query))
{
    echo '<tr>
            <td>'.$row['id_produk'].'</td>
            <td>'.$row['tgl_transaksi'].'</td>
            <td>'.$row['kuantitas'].'</td>
            <td>'.$row['harga'].'</td>
            <td>'.number_format($row['total_byr'], 0, ',', '.').'</td>
        </tr>';
}
echo '</tbody></table>';
