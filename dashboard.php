<?php
require 'fungsi/fungsi.php';
if (!isset($_SESSION["idtabsis"])) {
  header("Location: login.php");
  exit();
}

foreach (summon_admin() as $adm) :
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= url() ?>vendors/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      /* Set gray background color and 100% height */
      .sidenav {
        background-color: #f1f1f1;
        height: 400px;
        margin: 20px 0;
        padding: 20px 20px;
        border-radius: 20px;
      }

      .footer-fixed {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
      }

      .sidenav a {
        color: black;
      }

      /* On small screens, set height to 'auto' for the grid */
      @media screen and (max-width: 767px) {
        .row.content {
          height: auto;
        }
      }
    </style>
  </head>

  <body>

  <?php include "content/navbar.php" ?>

    <div class="container">
      <div class="well" style="border-radius: 20px;">
        <h4>Selamat Datang di Dashboard Admin</h4><br>
        <p>Anda login sebagai : <strong><?= $adm['username'] ?></strong></p>
        <br><br><br><br><br><br><br><br><br><br><br><br><br>
      </div>
    </div>
    </div>
    </div>

    <script src="<?= url() ?>vendors/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  </body>

  </html>

<?php endforeach ?>