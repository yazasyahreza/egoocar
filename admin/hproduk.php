<?php 
  include "koneksi.php";

  $id = $_GET['id'];
  mysqli_query($k ,"DELETE FROM produk WHERE kd_produk='$id'");
  echo "<script>location='produk.php'</script>";