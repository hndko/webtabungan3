<?php
require 'fungsi/fungsi.php';
foreach (summon_admin() as $adm) :

  if (isset($_POST['simpan'])) {
    insert_siswa();
  }

  if (isset($_POST['hapus-siswa'])) {
    hapus_siswa();
  }
  if (isset($_POST['edit'])) {
    edit_siswa();
  }

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Siswa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="<?= url() ?>vendors/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= url() ?>vendors/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <style>
      /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
      .row.content {
        height: 550px
      }

      /* Set gray background color and 100% height */
      .sidenav {
        background-color: #f1f1f1;
        height: 100%;
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

    <div class="container mt-4">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah data
          </button>
          <form action="" method="POST">
            <div class="input-group">
              <input type="text" name="cari" placeholder="Cari nama siswa" class="form-control" autocomplete="off">
              <button class="btn btn-outline-success" type="submit" name="go">Cari</button>
            </div>
            <!-- <div class="row">
              <div class="col">
                <input type="text" name="cari" placeholder="Cari nama siswa" class="form-control">
              </div>
              <div class="col">
                <input type="submit" name="go" value="Cari" class="btn btn-success">
              </div>
            </div> -->
          </form>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-bordered table-earning">
            <thead>
              <tr>
                <th>NO</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
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
                                      echo "href='?m=siswa&s=awal&halaman=$previous'";
                                    } ?>>Previous</a>
            </li>
            <?php
            for ($x = 1; $x <= $total_halaman; $x++) {
            ?>
              <li class="page-item"><a class="page-link" href="?m=siswa&s=awal&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
            <?php
            }
            ?>
            <li class="page-item">
              <a class="page-link" <?php if ($halaman < $total_halaman) {
                                      echo "href='?m=siswa&s=awal&halaman=$next'";
                                    } ?>>
                Next
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="" method="post">
            <div class="modal-body">
              <div class="row mb-3">
                <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" autocomplete="off">
                </div>
              </div>
              <div class="row mb-3">
                <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="kelas" id="kelas" placeholder="Masukkan Kelas" autocomplete="off">
                  <!-- <select name="kelas" id="kelas" class="form-select" required>
                    <option value="">--- Pilih Kelas ---</option>
                    <?php
                    global $koneksi;
                    $sql = "SELECT * FROM tb_kelas";
                    $hasil = mysqli_query($koneksi, $sql);
                    foreach ($hasil as $kelas) :
                    ?>
                      <option value="<?php echo $kelas['nama_kelas']; ?>"><?php echo $kelas['nama_kelas']; ?></option>
                    <?php endforeach; ?>
                  </select> -->
                </div>
              </div>
              <div class="row mb-3">
                <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" autocomplete="off">
                </div>
              </div>
              <div class="row mb-3">
                <label for="notlp" class="col-sm-3 col-form-label">Nomor Telepon</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="notlp" id="notlp" placeholder="Masukkan Nomor Telepon" autocomplete="off">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <script src="<?= url() ?>vendors/jquery/jquery.min.js"></script>
    <script src="<?= url() ?>vendors/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
  </body>

  </html>
<?php endforeach; ?>