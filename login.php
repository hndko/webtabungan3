<?php
require 'fungsi/fungsi.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>LOGIN ADMIN</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= url() ?>vendors/css/font-awesome.min.css">
  <style>
    /* FONTS */
    @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap');
    /* FONTS END */

    body,
    html {
      height: 100%;
      line-height: 1.8;
      font-family: "Raleway", sans-serif;
      background-image: url('./vendors/img/admin.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }


    .navbar-custom {
      background-color: black;
      border-color: #dee2e6;
    }

    .navbar-custom .navbar-brand {
      color: white;
      margin: 0 20px;
      font-family: 'Libre Baskerville', serif;
    }

    .btn-custom {
      border-radius: 10px;
      width: 100px;
      margin: 20px 0;
    }

    a {
      text-decoration: none;
    }

    .card {
      width: 100%;
      height: 400px;
      border-radius: 25px;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <!-- Navbar (sit on top) -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
      <a class="navbar-brand">Yuk Menabung</a>
    </div>
  </nav>

  <section class="mt-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-4 mx-auto">
          <div class="card">
            <div class="card-header">
              <h1 class="card-title text-center">Login</h1>
            </div>
            <div class="card-body">
              <form class="form" action="" method="post">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input class="form-control" type="text" name="user" placeholder="Masukkan username Anda" autocomplete="off" required>
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="off" required>
                </div>

                <div class="form-group text-center">
                  <a href="index.php">
                    <button type="button" class="btn btn-warning btn-custom mr-2">Batal</button>
                  </a>

                  <input class="btn btn-success btn-custom" type="submit" name="daftar" value="Masuk">
                </div>

                <?php
                if (@$_POST['daftar']) {
                  include("pro_login.php");
                }
                ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- jQuery -->
  <script src="<?= url() ?>vendors/jquery/jquery.min.js"></script>

  <!-- Bootstrap JS -->
  <script src="<?= url() ?>vendors/js/bootstrap.bundle.min.js"></script>
</body>

</html>