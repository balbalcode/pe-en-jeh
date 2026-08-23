<?php
require 'koneksi.php';

$sql = 'SELECT id_produk, tgl_transaksi, harga, kuantitas
        FROM sales';

$query = mysqli_query($conn, $sql);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($conn));
}

echo '<html>
        <head>
            <title>Menampilkan Data Tabel MySQL Dengan mysqli_fetch_array</title>
            <style>
                body {font-family:tahoma, arial}
                table {border-collapse: collapse}
                th, td {font-size: 13px; border: 1px solid #DEDEDE; padding: 3px 5px; color: #303030}
                th {background: #CCCCCC; font-size: 12px; border-color:#B0B0B0}
                .subtotal td {background: #F8F8F8}
                .right{text-align: right}
            </style>
        </head>
        <body>
        <table>
        <thead>
            <tr>
                <th>ID PRODUK</th>
                <th>TGL TRANSAKSI</th>
                <th>HARGA</th>
                <th>KUANTITAS</th>
            </tr>
        </thead>
        <tbody>';

while ($row = mysqli_fetch_array($query))
{
    echo '<tr>
            <td>'.$row['id_produk'].'</td>
            <td>'.$row['tgl_transaksi'].'</td>
            <td>'.number_format($row['harga'], 0, ',', '.').'</td>
            <td class="right">'.$row['kuantitas'].'</td>
        </tr>';
}
echo '
        </tbody>
    </table>
    </body>
    </html>';

// Apakah kita perlu menjalankan fungsi mysqli_free_result()
mysqli_free_result($query);

// Apakah kita perlu menjalankan fungsi mysqli_close()
mysqli_close($conn);
