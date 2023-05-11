<?php
require 'fungsi/fungsi.php';
foreach (summon_admin() as $adm) :

  date_default_timezone_set("Asia/Jakarta");
  $tanggalSekarang = date("Y-m-d");

  if (isset($_POST['simpan'])) {
    tambah_setoran();
  }

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Tambah Setoran</title>
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
      <div class="card">
        <div class="card-body">
          <form action="" method="post">
            <input type="hidden" name="id_tabungan">
            <div class="row mb-3">
              <label for="id_tabungan" class="col-sm-2 col-form-label">ID Tabungan</label>
              <div class="col-sm-10">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="id_tabungan" id="id_tabungan" readonly>
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
                    Cari ID Tabungan
                  </button>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <label for="id_siswa" class="col-sm-2 col-form-label">ID Siswa</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="id_siswa" id="id_siswa" readonly>
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
              <label for="setoran" class="col-sm-2 col-form-label">Jumlah Setoran</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="setoran" id="setoran" required>
                <i><b><span id="message2" style="color: red;"></span></b></i>
              </div>
            </div>
            <div class="row mb-3">
              <label for="saldo" class="col-sm-2 col-form-label">Saldo Anda</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="saldo" id="saldo" readonly>
              </div>
            </div>
            <button class="btn btn-warning" id="endButton" name="simpan">Simpan</button>
            <button type="reset" class="btn btn-danger">Batal</button>
          </form>
        </div>
      </div>

      <script type="text/javascript">
        var saldo = document.getElementById('saldo')
        var setoran = document.getElementById('setoran')
        setoran.addEventListener('keyup', function() {
          if (setoran.value == "") {
            message2.textContent = 'Kolom tidak boleh kosong!'
            document.getElementById('endButton').disabled = true;
          } else if (setoran.value) {
            message2.textContent = ''
            document.getElementById('endButton').disabled = false;
          }
        })
      </script>
    </div>

    <!-- modal -->
    <div id="modal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <form role="form" id="form-tambah" method="post" action="input.php">
            <div class="modal-header">
              <h3 class="modal-title">Pilih Siswa</h3>
            </div>
            <div class="modal-body">
              <table width="100%" class="table table-hover" id="example">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Tabungan</th>
                    <th>Id Siswa</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>tanggal</th>
                    <th>saldo</th>
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
                                            tb_tabungan
                                            order by id_tabungan ASC");
                  foreach ($data as $sa) :


                  ?>
                    <tr id="tb_tabungan" data-id_tabungan="<?= $sa['id_tabungan']; ?>" data-id_siswa="<?= $sa['id_siswa']; ?>" data-nama="<?= $sa['nama']; ?>" data-kelas="<?= $sa['kelas']; ?>" data-tanggal="<?= $sa['tanggal']; ?>" data-saldo="<?= $sa['saldo']; ?>">
                      <td>
                        <?php echo $no++; ?>
                      </td>
                      <td>
                        <?php echo $sa['id_tabungan']; ?>
                      </td>
                      <td>
                        <?php echo $sa['id_siswa']; ?>
                      </td>
                      <td>
                        <?php echo $sa['nama']; ?>
                      </td>
                      <td>
                        <?php echo $sa['kelas']; ?>
                      </td>
                      <td>
                        <?php echo $sa['tanggal']; ?>
                      </td>
                      <td>
                        <?php echo $sa['saldo']; ?>
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

    <script src="<?= url() ?>vendors/jquery/jquery.min.js"></script>
    <script src="<?= url() ?>vendors/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {

        $(document).on('click', '#tb_tabungan', function(e) {
          document.getElementById("id_tabungan").value = $(this).attr('data-id_tabungan');
          document.getElementById("id_siswa").value = $(this).attr('data-id_siswa');
          document.getElementById("nama").value = $(this).attr('data-nama');
          document.getElementById("kelas").value = $(this).attr('data-kelas');
          document.getElementById("tanggal").value = $(this).attr('data-tanggal');
          document.getElementById("saldo").value = $(this).attr('data-saldo');
          $('#modal').modal('hide');
        });

      });
    </script>
  </body>

  </html>
<?php endforeach; ?>