<?php
session_start();
include "config/koneksi.php";

// PINDAHKAN LOGIKA PHP KE ATAS AGAR PROSES REDIRECT JALAN
if(isset($_POST['login'])) { // Cek tombol login
  $Username = $_POST['username'];
  $Password = $_POST['password'];

  if(empty($Username) || empty($Password)) {
    echo "<script>alert('data tidak boleh kosong');</script>";
  }
  else {
    // Sesuaikan nama tabel 'users' atau 'admin' sesuai database kamu
    $sql = "SELECT * from users where username = '$Username' AND password = '$Password'";
    $query = mysqli_query($koneksi, $sql); // Perbaikan penulisan mysqli_query
    $userquerry = mysqli_fetch_array($query);

    if($userquerry) {
      $_SESSION['username'] = $Username; // Simpan session
      header("location:index.php");
      exit();
    } else {
      echo "<script>alert('Username atau Password salah!');</script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b>LTE</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-4">
            <input type="submit" name="login" value="LOGIN" class="btn btn-primary btn-block">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>