<?php
   session_start();
    include "koneksi.php";
    if(empty($_SESSION['iduser'])){
        echo "<script>location='login.php'</script>";
    }else{

    $id = $_GET['id'];
    $q = mysqli_query($k, "SELECT * FROM produk,kategori WHERE produk.kategori_id=kategori.id_kategori AND kd_produk='$id'");
    $d = mysqli_fetch_assoc($q);  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Edit Data</title>
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
    <div class="container mt-5 mb-5 tabelrespon">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header bg-primary text-white">Form Edit Data</div>
            <div class="card-body">

              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Nama Produk</label>
                    <input type="text" name="nama" class="form-control" value="<?= $d['nama_produk']?>" required>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="sel1">Kategori</label>
                    <select class="form-control" id="sel1" name="id_cat">
                      <?php
                          echo "<option value=$d[id_kategori]>$d[nama]</option>";
                          $q = mysqli_query($k, "SELECT * FROM kategori WHERE id_kategori!='$d[kategori_id]'");
                          while($data=mysqli_fetch_array($q)){
                            echo " <option value=$data[id_kategori]>$data[nama]</option>";
                          }
                      ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="row">
                  <div class="col">
                  <div class="form-group">
                    <label for="">Harga</label>
                    <input type="text" name="harga" class="form-control" value="<?= $d['harga']?>" required>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="">Stock</label>
                    <input type="number" name="stk" class="form-control" value="<?= $d['stock']?>" required>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="">Gambar</label>
                    <img src="../gambar/<?php echo $d['gambar']; ?>" width="100px">
                    <input type="file" name="gbr" class="form-control">
                  </div>
                </div>
              </div>
              
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="">Deskripsi</label>
                  <textarea class="form-control" rows="5" name="des" id="comment" required><?= $d['deskripsi']?></textarea>
                </div>
              </div>
            </div>

            </div>
            <div class="card-footer">
              <input type="submit" value="Simpan" name="simpan" class="btn btn-outline-primary">
              <a href="produk.php" class="btn btn-danger">Batal</a>
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
    $idcat = $_POST['id_cat'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $stk = $_POST['stk'];
    $gambar = $_FILES['gbr']['name'];
    $source = $_FILES['gbr']['tmp_name'];
    $folder = '../gambar/';
    $des = $_POST['des'];

    if(empty($gambar)){
            mysqli_query($k, "UPDATE produk SET kategori_id='$idcat', nama_produk='$nama', deskripsi='$des', harga='$harga', stock='$stk' WHERE kd_produk='$id'");
    }else{
            mysqli_query($k, "UPDATE produk SET kategori_id='$idcat', nama_produk='$nama', deskripsi='$des', harga='$harga', stock='$stk', gambar='$gambar' WHERE kd_produk='$id'");
            move_uploaded_file($source, $folder.$gambar);
    }

    echo "<script>alert('Data Berhasil Diedit');location='produk.php'</script>";
  }
?>
<?php } ?>