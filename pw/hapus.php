<?php

require 'functions.php';
// jika tidak ada id di url
if (!isset($_GET['id_buku'])) {
  header("Location: index.php");
  exit;
}

// Mengambil Id dari url
$id_buku = $_GET['id_buku'];

if (hapus($id_buku) > 0) {
  echo "<script>
            alert('Data Berhasil dihapus');
            document.location.href = 'index.php'
          </script>";
} else {
  echo "Data Gagal dihapus";
}