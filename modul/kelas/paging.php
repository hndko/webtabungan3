<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'database_tabungan');
global $koneksi;

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_kelas = mysqli_query($koneksi, "SELECT * FROM tb_kelas LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal + 1;

foreach ($data_kelas as $key) :
?>




    <tr>
        <td><?= $i++; ?></td>
        <td><?= $key['nama_kelas']; ?></td>
        <td>
            <!-- Trigger Modal Hapus -->
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-admin<?= $key['id'] ?>" title="Hapus">
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
                                <table>
                                    <tr>
                                        <td style="width: 100px;">Kelas</td>
                                        <td style="width: 20px">:</td>
                                        <td><?= $key['nama_kelas']; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="hapus-siswa" class="btn btn-danger">Hapus</button>
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
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post">
                            <div class="modal-body">
                                <input type="hidden" value="<?= $key['id']; ?>" name="id">
                                <div class="row mb-3">
                                    <label for="nama_kelas" class="col-sm-3 col-form-label">Nama Kelas</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Masukkan Nama Kelas" value="<?= $key['nama_kelas']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </td>
    </tr>
<?php endforeach; ?>