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
  <title>Data Produk</title>
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

  <div class="container mt-5 mb-5 tabelrespon">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-header"><b>Data Produk</b></div>
          <div class="card-body">

            <form action="" method="get">
              <div class="row">
                <div class="col">
                  <input type="text" name="cari" class="form-control" placeholder="Cari : Kategori/Stock/Harga/Nama Produk" autocomplete="off"
                    value=<?php if(isset($_GET['cari'])){echo $_GET['cari'];}?>>
                </div>
                <div class="col">
                  <button type="submit" class="btn btn-info">Cari</button>
                </div>
              </div>
            </form>
            <div class="table-responsive">
            <table class="table table-striped mt-3">
              <thead>
                <tr>
                  <td>No</td>
                  <td>Nama Produk</td>
                  <td>Kategori</td>
                  <td>Deskripsi</td>
                  <td>Harga</td>
                  <td>Stok</td>
                  <td>Gambar</td>
                  <td>Aksi</td>
                </tr>
              </thead>
              <tbody>
                <?php
                if(isset($_GET['cari'])){
                  $cari = $_GET['cari'];
                  $q = mysqli_query($k, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b ON a.kategori_id=b.id_kategori WHERE 
                  b.nama LIKE '%" . $cari . "%' OR a.stock LIKE '%" . $cari . "%' OR a.harga LIKE '%" . $cari . "%' OR a.nama_produk LIKE '%" . $cari . "%' ");
                }else{
                  $q = mysqli_query($k, "SELECT a.*, b.nama AS nama_kategori FROM produk a JOIN kategori b on a.kategori_id=b.id_kategori");
                }
                  $no = 1;
                  while($d = mysqli_fetch_assoc($q)){
                ?>
                <tr>
                  <td><?= $no++?></td>
                  <td><?= $d['nama_produk']?>
                  <td><?= $d['nama_kategori']?>
                  <td><?= $d['deskripsi']?>
                  <td><?= $d['harga']?></td>
                  <td><?= $d['stock']?></td>
                  <td><img src="../gambar/<?php echo $d['gambar']?>" width="100px"></td>
                  <td>
                    <a href="eproduk.php?id=<?= $d['kd_produk']?>" class="btn btn-warning">Edit</a>
                    <a href="hproduk.php?id=<?= $d['kd_produk']?>" onclick="return confirm('Anda Yakin?')"
                      class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            </div>
          </div>
          <div class="card-footer">
            <a href="tproduk.php" class="btn btn-primary">Tambah</a>
          </div>
        </div>
      </div>
    </div>
  </div>

    <footer class="mt-5 mb-5">
      <p class="text-center text-secondary font-weight-semibold m-0">
        Copyright &copy; 2024 Goocar. All right reserved
      </p>
    </footer>

  <script src="assets/js/script.js"></script>

</body>

</html>
<?php } ?>