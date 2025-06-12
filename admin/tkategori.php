<?php
 session_start();
    include "koneksi.php";
    if(empty($_SESSION['iduser'])){
        echo "<script>location='login.php'</script>";
    }else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Tambah Data</title>
  <link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-sm fixed-top navbar-dark">
        <div class="container py-1">
            <a class="navbar-brand font-weight-bold" href="#">Admin Goocar</a>
            <div class="toggle-menu" id="toggle-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul class="navbar-nav ml-auto gap-4" id="navbar-nav">
                <li class="nav-item active mr-4">
                    <a class="nav-link" href="produk.php">Produk</a>
                </li>
                <li class="nav-item active mr-4">
                    <a class="nav-link" href="kategori.php">Kategori</a>
                </li>
                <li class="nav-item active mr-4">
                  <a class="nav-link" href="keluar.php">Keluar</a>
                </li>
                <!-- <li class="nav-item active mr-4">
                            <a class="nav-link" href="contact">Contact</a>
                            </li> -->
            </ul>
        </div>
</nav>

  <form action="" method="post" enctype="multipart/form-data">
    <div class="container mt-5 tabelrespon">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header bg-primary text-white">Form Tambah Data</div>
            <div class="card-body">

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Nama Kategori</label>
                    <input type="text" name="nama" class="form-control">
                  </div>
                </div>
              </div>

            </div>
            <div class="card-footer">
              <input type="submit" value="Simpan" name="simpan" class="btn btn-outline-primary">
              <a href="kategori.php" class="btn btn-danger">Batal</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>

    <footer class="mt-5 mb-5">
      <p class="text-center text-secondary font-weight-semibold m-0">
        Copyright &copy; 2024 Goocar. All right reserved
      </p>
    </footer>
    
    <script src="assets/js/script.js"></script>
</body>
</html>
<?php
  if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];

    mysqli_query($k, "INSERT INTO kategori SET nama='$nama'");
    
    echo "<script>alert('Data Berhasil Ditambah');location='kategori.php'</script>";
    
  }
?>
<?php } ?>