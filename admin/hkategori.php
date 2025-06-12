<?php 
  include "koneksi.php";

  $id = $_GET['id'];
  $cek = mysqli_query($k, "SELECT COUNT(*) FROM produk WHERE kategori_id='$id'");
  $jml = mysqli_fetch_row($cek)[0];

  if($jml > 0){
    echo "<script>alert('Kategori tidak bisa dihapus karena sudah digunakan diproduk');location='kategori.php'</script>";
  }else{
    mysqli_query($k ,"DELETE FROM kategori WHERE id_kategori='$id'");
    echo "<script>location='kategori.php'</script>";
  }