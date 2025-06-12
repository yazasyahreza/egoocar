<?php
    session_start();
    include "koneksi.php";
    if(!empty($_SESSION['iduser'])){
        echo "<script>location='produk.php'</script>";
    }else{
        if(@$_POST['login']){
            $user = $_POST['username'];
            $pass = $_POST['password'];

            $sql = "SELECT * FROM user WHERE username = '$user' AND password = '$pass'";
            $q = mysqli_query($k,$sql); 
            if(mysqli_num_rows($q) > 0){
                $r = mysqli_fetch_assoc($q);
                $_SESSION['iduser'] = $r['id_user'];
                echo "<script>location='produk.php'</script>";
            }else{
                $alert_message = "<div class='alert alert-danger alert-dismissible text-center mx-auto mt-3' style='max-width: 540px;'>
                <button type='button' class='close' data-dismiss='alert'>&times;</button>
                Username dan Password Salah
              </div>";
            }
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.min.css">
</head>

<body>

  <div class="container pt-5">
    <div class="row justify-content-center align-items-center">
      <div class="col-md-6">
        <form class="border rounded p-4" method="post" action="" autocomplete="off">
          <h2 class="mb-4">Login</h2>
          <div class="form-group mb-4">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
          </div>
          <div class="form-group mb-4">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
          </div>
          <input name="login" type="submit" value="Login" class="btn btn-primary">
        </form>
      </div>
    </div>
  </div>

  <?php
            // Menampilkan pesan alert di bawah form login
            if (isset($alert_message)) {
                echo $alert_message;
            }
  ?>

  <script src="assets/vendors/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php } ?>