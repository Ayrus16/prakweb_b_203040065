<?php

function koneksi()
{

  return mysqli_connect('localhost', 'root', '', 'prakweb_2022_b_203040065');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);

  // jika hasilnya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
function tambah($data)
{
  $conn = koneksi();

  $judul = htmlspecialchars($data['judul']);
  $penulis = htmlspecialchars($data['penulis']);
  $thnTerbit = htmlspecialchars($data['thnTerbit']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  // $gambar = htmlspecialchars($data['gambar']);

  // upload gambar
  $gambar = upload();

  if (!$gambar) {
    return false;
  }


  $query = "INSERT INTO buku
            VALUES
            ('', '$judul','$penulis','$penerbit' ,'$thnTerbit' ,'$deskripsi', '$gambar')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];

  // ketika tidak ada gambar yang di pilih
  if ($error == 4) {
    // echo "<script>
    //   alert('Pilih gambar terlebih dahulu')
    //   </script>";
    return 'nophoto.png';
  }
  // cek ekstensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));

  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
      alert('Yang anda pilih bukan gambar')
      </script>";
    return false;
  }

  // cek tipe file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
      alert('Yang anda pilih bukan gambar')
      </script>";
    return false;
  }

  // cek ukuran file{
  // maksimal 5Mb == 5000000
  if ($ukuran_file > 5000000) {
    echo "<script>
      alert('Ukuran terlalu besar')
      </script>";
    return false;
  }

  // lolos pengecekan 
  // siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);

  return $nama_file_baru;
}

function hapus($id)
{
  $conn = koneksi();


  // menghapus gambar di folder image
  $b = query("SELECT * FROM buku WHERE id_buku = $id");
  if ($b['gambar'] != 'nophoto.png') {
    unlink('img/' . $b['gambar']);
  }


  mysqli_query($conn, "DELETE FROM buku WHERE id_buku=$id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();
  $id_buku = $data['id_buku'];
  $judul = htmlspecialchars($data['judul']);
  $penulis = htmlspecialchars($data['penulis']);
  $thnTerbit = htmlspecialchars($data['thnTerbit']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $gambar_lama = htmlspecialchars($data['gambar_lama']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  if ($gambar == 'nophoto.jpg') {
    $gambar = $gambar_lama;
  }
  $query = "UPDATE buku SET
            judul_buku = '$judul',
            penulis = '$penulis',
            tahun_terbit = '$thnTerbit',
            deskripsi = '$deskripsi',
            nama_penerbit = '$penerbit',
            gambar = '$gambar'
            WHERE id_buku = $id_buku ";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}


?>