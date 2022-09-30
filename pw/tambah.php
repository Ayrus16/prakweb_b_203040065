<?php
require 'functions.php';

// cek apakah tombol sudah di tekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil ditambahkan');
            document.location.href = 'index.php'
          </script>";
  } else {
    echo "Data Gagal ditambahkan";
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Mahasiswa</title>
</head>

<body>

  <h3>Tambah Data Mahasiswa</h3>

  <form action="" method="POST" enctype="multipart/form-data">
    <ul>
      <li>
        <label>
          Judul buku :
          <input type="text" name="judul" autofocus required>
        </label>
      </li>
      <li>
        <label>
          Penulis :
          <input type="text" name="penulis" autofocus required>
        </label>
      </li>

      <li>
        <label>
          Tahun terbit :
          <input type="text" name="thnTerbit" required>
        </label>
      </li>

      <li>
        <label>
          Penerbit :
          <input type="text" name="penerbit" required>
        </label>
      </li>


      <li>
        <label>
          Deskripsi :
          <textarea name="deskripsi"></textarea>
        </label>
      </li>

      <li>
        <label>
          Gambar :
          <input type="file" name="gambar" class="gambar" onchange="previewImage()">
        </label>
        <img src="img/nophoto.jpg" width="120" style="display:block;" class="img-preview">
      </li>
      <li>
        <button type="submit" name="tambah">Simpan</button>
      </li>
    </ul>
  </form>

  <script src="js/script.js"></script>
</body>

</html>