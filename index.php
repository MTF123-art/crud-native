<?php
include "layout/header.php";
include "config/database.php";

$jumlah_jurusan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM jurusan"));
$jumlah_laki_laki = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM mahasiswa WHERE jenis_kelamin = 'Laki-Laki'"));
$jumlah_perempuan = mysqli_fetch_assoc(mysqli_query($conn, "SELECT  COUNT(*) as jumlah FROM mahasiswa WHERE jenis_kelamin = 'perempuan'"));

$data_jurusan = mysqli_query($conn, "SELECT * FROM jurusan");
?>

<!-- main -->
<div class="container pt-3">
    <!-- alert -->
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Halo, Selamat Datang!</strong> Mahasiswa Informatika F23 UNIBA Madura
    </div>
    <!-- alert -->
    <!-- content -->
    <div class="row">
        <div class="col-md-8">
            <ul class="list-group mb-2">
                <li class="list-group-item d-flex justify-content-between text-bg-primary align-items-center">
                    Data Jurusan
                    <span class="badge rounded-pill"><?= $jumlah_jurusan["jumlah"] ?></span>
                </li>
            </ul>
            <div class="row">
                <!-- card -->
                <?php foreach ($data_jurusan as $jurusan): ?>
                    <?php $jumlah_mhs = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as jumlah FROM mahasiswa WHERE jurusan_id = '$jurusan[id_jurusan]'")); ?>
                    <div class="col-md-6 my-2">
                        <div class="card text-center shadow p-3 mb-5 bg-body rounded">
                            <div class="card-header bg-primary text-white">
                                <?= $jurusan["nama_jurusan"]?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?= $jumlah_mhs["jumlah"];?></h5>
                                <p class="card-text">Mahasiswa</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- card -->
            </div>
        </div>
        <div class="col-md-4">
            <h5 class="text-center">Total berdasarkan gender</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="card text-center shadow p-3 mb-5 bg-body rounded">
                        <div class="card-header bg-primary text-white">
                            Laki-laki
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $jumlah_laki_laki['jumlah']; ?></h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-center shadow p-3 mb-5 bg-body rounded">
                        <div class="card-header bg-primary text-white">
                            Perempuan
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?= $jumlah_perempuan['jumlah'];; ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content -->
</div>
<!-- main -->

<?php
include "layout/footer.php";
?>