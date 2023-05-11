<?php
require 'fungsi/fungsi.php';
foreach (summon_admin() as $adm) :

  if (isset($_POST['simpan'])) {
    insert_kelas();
  }

  if (isset($_POST['hapus-tabungan'])) {
    hapus_tabungan();
  }
  if (isset($_POST['edit'])) {
    edit_kelas();
  }
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Tabungan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="<?= url() ?>vendors/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= url() ?>vendors/css/bootstrap.min.css">

    </style>
  </head>

  <body>
    <?php include "content/navbar.php" ?>
    <div class="container mt-4">
      <!-- Button trigger modal -->
      <div class="card">
        <div class="card-header d-flex justify-content-end">
          <div>
            <a href="index.php?m=tabungan&s=setoran_awal" class="btn btn-success">
              Setoran Awal
            </a>
            <a href="index.php?m=tabungan&s=tambah_setoran" class="btn btn-primary">
              Tambah Setoran
            </a>
            <a href="index.php?m=tabungan&s=penarikan" class="btn btn-warning">
              Penarikan
            </a>
          </div>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>NO</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Saldo</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 1;
              include 'paging.php';
              ?>
            </tbody>
          </table>
          <ul class="pagination justify-content-end">
            <li class="page-item">
              <a class="page-link" <?php if ($halaman > 1) {
                                      echo "href='?m=tabungan&s=awal&halaman=$previous'";
                                    } ?>>Previous</a>
            </li>
            <?php
            for ($x = 1; $x <= $total_halaman; $x++) {
            ?>
              <li class="page-item"><a class="page-link" href="?m=tabungan&s=awal&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
            <?php
            }
            ?>
            <li class="page-item">
              <a class="page-link" <?php if ($halaman < $total_halaman) {
                                      echo "href='?m=tabungan&s=awal&halaman=$next'";
                                    } ?>>Next</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <script src="<?= url() ?>vendors/jquery/jquery.min.js"></script>
    <script src="<?= url() ?>vendors/js/bootstrap.bundle.min.js"></script>
  </body>

  </html>
<?php endforeach; ?>