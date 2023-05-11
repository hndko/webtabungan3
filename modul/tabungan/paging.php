<?php
$koneksi = mysqli_connect('localhost', 'root', '', 'database_tabungan');
global $koneksi;

$batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_tabungan");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);

$data_tabungan = mysqli_query($koneksi, "SELECT * FROM tb_tabungan LIMIT $halaman_awal, $batas");
$nomor = $halaman_awal + 1;

foreach ($data_tabungan as $tab) :
?>

    <tr>
        <td><?= $i++; ?></td>
        <td><?= $tab['nama']; ?></td>
        <td><?= $tab['kelas']; ?></td>
        <td><?= rupiah($tab['saldo']); ?></td>
        <!--  <td><?= $tab['jumlah_setoran'] - $tab['jumlah_penarikan']; ?></td> -->
        <td>
            <!-- Trigger Modal Hapus -->
            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#hapus-admin<?= $tab['id_tabungan'] ?>">
                <i class="fa fa-trash"></i>
            </button>

            <!-- Modal Hapus -->
            <div class="modal fade" id="hapus-admin<?= $tab['id_tabungan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin ingin dihapus?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="post">
                            <div class="modal-body">
                                <input type="hidden" name="id_tabungan" value="<?= $tab['id_tabungan'] ?>">
                                <table>
                                    <tr>
                                        <td>ID tabungan</td>
                                        <td>:</td>
                                        <td><?= $tab['id_tabungan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td><?= $tab['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kelas</td>
                                        <td>:</td>
                                        <td><?= $tab['kelas']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Saldo</td>
                                        <td>:</td>
                                        <td><?= $tab['saldo']; ?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="hapus-tabungan" class="btn btn-danger">Hapus</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Trigger Lihat Detail -->
            <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#edit-siswa<?= $tab['id_tabungan'] ?>">
                <i class="fa fa-eye"></i>
            </button>

            <!-- Modal Lihat Detail-->
            <div class="modal fade" id="edit-siswa<?= $tab['id_tabungan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Lihat Detail Tabungan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table>
                                <tr>
                                    <td>ID tabungan</td>
                                    <td>:</td>
                                    <td><?= $tab['id_tabungan']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td><?= $tab['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>:</td>
                                    <td><?= $tab['kelas']; ?></td>
                                </tr>
                                <tr>
                                    <td>Setoran</td>
                                    <td>:</td>
                                    <td><?= $tab['setoran']; ?></td>
                                </tr>
                                <tr>
                                    <td>Penarikan</td>
                                    <td>:</td>
                                    <td><?= rupiah($tab['penarikan']); ?></td>
                                </tr>
                                <tr>
                                    <td>Saldo</td>
                                    <td>:</td>
                                    <td><?= rupiah($tab['saldo']); ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a target="_blank" href="index.php?m=tabungan&s=print&id_siswa=<?= $tab['id_siswa']; ?>"><button type="submit" name="edit" class="btn btn-primary">Print</button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="edit-siswa<?= $tab['id_tabungan'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit-siswa<?= $tab['id_tabungan'] ?>" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <b>
                                <p class="modal-title" id="edit-siswa<?= $tab['id_tabungan'] ?>" style="text-align: center; font-size: 18px;">Lihat Detail Tabungan</p>
                            </b>
                        </div>
                        <div class="modal-body">


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <a target="_blank" href="index.php?m=tabungan&s=print&id_siswa=<?= $tab['id_siswa']; ?>"><button type="submit" name="edit" class="btn btn-primary">Print</button></a>
                        </div>

                    </div>
                </div>
            </div>

        </td>
    </tr>
<?php endforeach; ?>