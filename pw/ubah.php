<?php
require 'functions.php';
// jika tidak ada id di url
if (!isset($_GET['id_buku'])) {
  header("Location: index.php");
  exit;
}

// ambil id dari url
$id_buku = $_GET['id_buku'];



// Query mahasiswa berdasarkan id
$b = query("SELECT * FROM buku WHERE id_buku = $id_buku");

// cek apakah tombol ubah sudah di tekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil diubah');
            document.location.href = 'index.php'
          </script>";
  } else {
    echo "Data Gagal diubah";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Mahasiswa</title>
</head>

<body>

  <h3>Form Ubah Data Mahasiswa</h3>

  <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_buku" value="<?= $b['id_buku']; ?>">
    <ul>
      <li>
        <label>
          Judul :
          <input type="text" name="judul" autofocus required value="<?= $b['judul_buku']; ?>">
        </label>
      </li>

      <li>
        <label>
           Penulis:
          <input type="text" name="penulis" required value="<?= $b['penulis']; ?>">
        </label>
      </li>

      <li>
        <label>
           Tahun Terbit:
          <input type="text" name="thnTerbit" required value="<?= $b['tahun_terbit']; ?>">
        </label>
      </li>

      <li>
        <label>
           Penerbit:
          <input type="text" name="penerbit" required value="<?= $b['nama_penerbit']; ?>">
        </label>
      </li>
      <li>
        <label>
           Penerbit:
            <textarea name="deskripsi"><?= $b['deskripsi']; ?></textarea>
        </label>
      </li>

      

      <li>
        <input type="hidden" name="gambar_lama" value="<?= $m['gambar']; ?>">
        <label>
          Gambar :
          <input type="file" name="gambar" class="gambar" onchange="previewImage()">
        </label>
        <img src="img/<?= $m['gambar']; ?>" width="120" style="display:block;" class="img-preview">
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data</button>
      </li>
    </ul>
  </form>
  <script src="js/script.js"></script>
</body>

</html>