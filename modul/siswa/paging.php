<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'database_tabungan');
global $koneksi;

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_siswa");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);


$nomor = $halaman_awal + 1;


// cari
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $data_siswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE nama LIKE '%" . $cari . "%'");
} else {
  $data_siswa = mysqli_query($koneksi, "SELECT * FROM tb_siswa LIMIT $halaman_awal, $batas");
}


foreach ($data_siswa as $key) :
?>

  <tr>
    <td><?= $i++; ?></td>
    <td><?= $key['nama']; ?></td>
    <td><?= $key['kelas']; ?></td>
    <td><?= $key['alamat']; ?></td>
    <td><?= $key['notlp']; ?></td>


    <td>
      <!-- Trigger Modal Hapus -->
      <button type="button" class="btn btn-danger btn-sm" title="Hapus" data-bs-toggle="modal" data-bs-target="#hapus-admin<?= $key['id'] ?>">
        <i class="fa fa-trash"></i>
      </button>

      <!-- Modal Hapus -->
      <div class="modal fade" id="hapus-admin<?= $key['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin dihapus?</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
              <div class="modal-body">
                <input type="hidden" name="id" value="<?= $key['id'] ?>">
                <table class="table table-borderless">
                  <tr>
                    <td style="width: 200px;">Nama Siswa</td>
                    <td>:</td>
                    <td><?= $key['nama'] ?></td>
                  </tr>
                  <tr>
                    <td style="width: 200px;">Kelas</td>
                    <td>:</td>
                    <td><?= $key['kelas']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 200px;">Alamat</td>
                    <td>:</td>
                    <td><?= $key['alamat']; ?></td>
                  </tr>
                  <tr>
                    <td style="width: 200px;">Nomor Telepon</td>
                    <td>:</td>
                    <td><?= $key['notlp']; ?></td>
                  </tr>
                </table>
              </div>
              <div class="modal-footer">
                <button type="submit" name="hapus-siswa" class="btn btn-danger">Hapus</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!-- Trigger Modal Edit -->
      <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-siswa<?= $key['id'] ?>">
        <i class="fa fa-edit"></i>
      </button>

      <!-- Modal Edit-->
      <div class="modal fade" id="edit-siswa<?= $key['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Data Siswa</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
              <div class="modal-body">
                <input type="hidden" value="<?= $key['id']; ?>" name="id">
                <div class="row mb-3">
                  <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama" value="<?= $key['nama']; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="kelas" class="col-sm-3 col-form-label">Kelas</label>
                  <div class="col-sm-9">
                    <select name="kelas" id="kelas" class="form-select">
                      <option value="">--- Pilih Kelas ---</option>
                      <?php
                      global $koneksi;
                      $sql = "SELECT * FROM tb_kelas";
                      $hasil = mysqli_query($koneksi, $sql);
                      foreach ($hasil as $kelas) :
                      ?>
                        <option value="<?= $kelas['nama_kelas'] ?>" <?= $kelas['nama_kelas'] == $key['kelas'] ? 'selected' : ''; ?> ?><?= $kelas['nama_kelas']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" value="<?= $key['alamat']; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="notlp" class="col-sm-3 col-form-label">Nomor Telepon</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="notlp" id="notlp" placeholder="Masukkan Nomor Telepon" value="<?= $key['notlp']; ?>">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </td>
  </tr>
<?php endforeach; ?>