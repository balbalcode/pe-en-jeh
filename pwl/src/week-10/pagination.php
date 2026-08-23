<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- css bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
  </div>
</nav>

<div class="container-fluid">

<!--Panel Form pencarian -->
<div class="row">
  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading"><b>Pencarian</b></div>
      <div class="panel-body">
        <form class="form-inline" >
          <div class="form-group">
            <select class="form-control" id="Kolom" name="Kolom" required="">
              <?php
              $kolom=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";
              ?>
              <option value="nama_mhs" <?php if ($kolom=="nama_mhs") echo "selected"; ?>>Nama Mahasiswa</option>
              <option value="NIM" <?php if ($kolom=="NIM") echo "selected";?>>NIM</option>
            </select>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="KataKunci" name="KataKunci" placeholder="Kata kunci.." required="" value="<?php if (isset($_GET['KataKunci']))  echo $_GET['KataKunci']; ?>">
          </div>
          <button type="submit" class="btn btn-primary">Cari</button>
          <a href="pagination.php" class="btn btn-danger">Reset</a>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Tabel data Siswa -->
<table class="table table-striped table-bordered table-hover">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Mahasiswa</th>
      <th>NIM</th>
      <th>Alamat</th>
    </tr>
  </thead>
  <tbody>

    <?php
    include "koneksi.php";

    $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;

    $kolomCari=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";

    $kolomKataKunci=(isset($_GET['KataKunci']))? $_GET['KataKunci'] : "";

    // Jumlah data per halaman
    $limit = 5;

    $limitStart = ($page - 1) * $limit;

    //kondisi jika parameter pencarian kosong
    if($kolomCari=="" && $kolomKataKunci==""){
      $SqlQuery = mysqli_query( $koneksi, "SELECT * FROM mahasiswa LIMIT ".$limitStart.",".$limit);
    }else{
      //kondisi jika parameter kolom pencarian diisi
      $SqlQuery = mysqli_query( $koneksi, "SELECT * FROM mahasiswa WHERE $kolomCari LIKE '%$kolomKataKunci%' LIMIT ".$limitStart.",".$limit);
    }

    $no = $limitStart + 1;

    while($row = mysqli_fetch_array($SqlQuery)){
    ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $row['nama_mhs']; ?></td>
        <td><?php echo $row['NIM']; ?></td>
        <td><?php echo $row['alamat']; ?></td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>
<div align="right">
  <ul class="pagination">
    <?php
    // Jika page = 1, maka LinkPrev disable
    if($page == 1){
    ?>
      <!-- link Previous Page disable -->
      <li class="disabled"><a href="#">Previous</a></li>
    <?php
    }
    else{
      $LinkPrev = ($page > 1)? $page - 1 : 1;

      if($kolomCari=="" && $kolomKataKunci==""){
      ?>
        <li><a href="pagination.php?page=<?php echo $LinkPrev; ?>">Previous</a></li>
      <?php
      }else{
      ?>
        <li><a href="pagination.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $LinkPrev;?>">Previous</a></li>
      <?php
      }
    }
    ?>

    <?php
    //kondisi jika parameter pencarian kosong
    if($kolomCari=="" && $kolomKataKunci==""){
      $SqlQuery = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
    }else{
      //kondisi jika parameter kolom pencarian diisi
      $SqlQuery = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE $kolomCari LIKE '%$kolomKataKunci%'");
    }
    //Hitung semua jumlah data yang berada pada tabel Sisawa
    $JumlahData = mysqli_num_rows($SqlQuery);
    // Hitung jumlah halaman yang tersedia
    $jumlahPage = ceil($JumlahData / $limit);
    // Jumlah link number
    $jumlahNumber = 1;
    // Untuk awal link number
    $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1;
    // Untuk akhir link number
    $endNumber = ($jumlahPage < ($page + $jumlahNumber))? $page + $jumlahNumber : $jumlahPage;

    for($i = $startNumber; $i <= $endNumber; $i++){
      $linkActive = ($page == $i)? ' class="active"' : '';

      if($kolomCari=="" && $kolomKataKunci==""){
      ?>
        <li<?php echo $linkActive; ?>><a href="pagination.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php
      }else{
      ?>
        <li<?php echo $linkActive; ?>><a href="pagination.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
      <?php
      }
    }
    ?>

    <!-- link Next Page -->
    <?php
    if($page == $jumlahPage){
    ?>
      <li class="disabled"><a href="#">Next</a></li>
    <?php
    }
    else{
      $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
      if($kolomCari=="" && $kolomKataKunci==""){
      ?>
        <li><a href="pagination.php?page=<?php echo $linkNext; ?>">Next</a></li>
      <?php
      }else{
      ?>
        <li><a href="pagination.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $linkNext; ?>">Next</a></li>
      <?php
      }
    }
    ?>
  </ul>
</div>
</div>

</body>
</html>
