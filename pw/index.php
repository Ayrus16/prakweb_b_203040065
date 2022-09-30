


<?php


require 'functions.php';
$buku = query("SELECT * FROM buku");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Buku</title>
  <link rel="stylesheet" href="css/style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h2>Buku</h2>
    <a href="tambah.php"> 
              <button type="button" class="btn btn-primary">Tambah Data</button>
            </a>
    
    <div class="row">
    <?php
    $i = 1;
    foreach ($buku as $b) : ?>

    <div class="card mb-4 list-buku" style="max-width: 450px;">
      <div class="row g-0">
        <div class="col-md-4">
          <img src="img/<?= $b['gambar']; ?>" class="img-fluid rounded-start" alt="BUKU">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h6 class="card-title"><?= $b['judul_buku']; ?></h6>
            <h6 class="card-title text-muted" ><?= $b['penulis']; ?></h6>
            <p class="card-text text-muted"><?= $b['nama_penerbit']; ?></p>
            <p class="card-text deskripsi"><?= $b['deskripsi']; ?></p>
            <p class="card-text"><small class="text-muted"><?= $b['tahun_terbit']; ?></small></p>
            <a href="ubah.php?id_buku=<?= $b['id_buku'] ?>"> 
              <button type="button " class="btn btn-warning btn-sm">Ubah</button>
            </a>

            <a href="hapus.php?id_buku=<?= $b['id_buku'] ?>"> 
              <button type="button " class="btn btn-danger btn-sm">Hapus</button>
            </a>
          </div>
        </div>
        </div>
      </div>
      

      <?php endforeach; ?>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
</body>

</html>