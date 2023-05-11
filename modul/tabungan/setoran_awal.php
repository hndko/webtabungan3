<?php
require 'fungsi/fungsi.php';
foreach (summon_admin() as $adm) :

  date_default_timezone_set("Asia/Jakarta");
  $tanggalSekarang = date("Y-m-d");

  if (isset($_POST['simpan'])) {
    insert_setoran_awal();
  }

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Setoran Awal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="<?= url() ?>vendors/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= url() ?>vendors/css/bootstrap.min.css">

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

    <div class="container">
      <!-- Button trigger modal -->
      <div class="card">
        <div class="card-body">
          <form action="" method="post">
            <input type="hidden" name="id_tabungan">
            <div class="row mb-3">
              <label for="id_siswa" class="col-sm-2 col-form-label">ID Siswa</label>
              <div class="col-sm-10">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="id_siswa" id="id_siswa">
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
                    Cari ID Siswa
                  </button>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nama" id="nama" readonly>
              </div>
            </div>
            <div class="row mb-3">
              <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="kelas" id="kelas" readonly>
              </div>
            </div>
            <div class="row mb-3">
              <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="tanggal" id="tanggal" value="<?= $tanggalSekarang; ?>" readonly>
              </div>
            </div>
            <div class="row mb-3">
              <label for="saldo" class="col-sm-2 col-form-label">Setoran Awal</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" name="saldo" id="saldo" required>
              </div>
            </div>

            <button type="submit" class="btn btn-warning" name="simpan">Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button>
          </form>
        </div>
      </div>
    </div>

    <!-- modal -->
    <div id="modal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form role="form" id="form-tambah" method="post" action="input.php">
            <div class="modal-header">
              <center>
                <h3 class="modal-title">Pilih Siswa</h3>
              </center>
            </div>
            <div class="modal-body">




              <table width="100%" class="table table-hover" id="example">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <!--<th>Jenis Kelamin</th>
                                        <th>Tempat</th>
                                        <th>Alamat</th>-->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $data = mysqli_query($koneksi, " SELECT  *
																					  from 
																					  tb_siswa
																					  order by id ASC");
                  foreach ($data as $sa) :


                  ?>
                    <tr id="tb_siswa" data-id_siswa="<?php echo $sa['id']; ?>" data-nama="<?php echo $sa['nama']; ?>" data-kelas="<?= $sa['kelas']; ?>">
                      <td>
                        <?php echo $no++; ?>
                      </td>
                      <td>
                        <?php echo $sa['nama']; ?>
                      </td>
                      <td>
                        <?php echo $sa['kelas']; ?>
                      </td>

                    </tr>
                  <?php
                  endforeach;
                  ?>
              </table>


            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
            </div>
        </div>
      </div>
    </div>

    </div>
    <script src="<?= url() ?>vendors/jquery/jquery.min.js"></script>
    <script src="<?= url() ?>vendors/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {

        $(document).on('click', '#tb_siswa', function(e) {
          document.getElementById("id_siswa").value = $(this).attr('data-id_siswa');
          document.getElementById("nama").value = $(this).attr('data-nama');
          document.getElementById("kelas").value = $(this).attr('data-kelas');
          $('#modal').modal('hide');
        });

      });
    </script>
  </body>

  </html>
<?php endforeach; ?>