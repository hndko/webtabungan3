<?php
require 'fungsi/fungsi.php';
foreach (summon_admin() as $adm) :

    if (isset($_POST['simpan'])) {
        insert_kelas();
    }

    if (isset($_POST['hapus-siswa'])) {
        hapus_kelas();
    }
    if (isset($_POST['edit'])) {
        edit_kelas();
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Kelas</title>
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
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Tambah Data
                    </button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="" method="post">
                                    <div class="modal-body">
                                        <div class="row mb-3">
                                            <label for="nama_kelas" class="col-sm-2 col-form-label">Nama Kelas</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Masukkan Nama Kelas">
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
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Kelas</th>
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
                                                    } ?>>Next</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <script src="<?= url() ?>vendors/jquery/jquery.min.js"></script>
        <script src="<?= url() ?>vendors/js/bootstrap.bundle.min.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
    </body>

    </html>
<?php endforeach; ?>