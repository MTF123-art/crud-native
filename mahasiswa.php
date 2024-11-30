<?php
include "layout/header.php";
include "config/database.php";

$mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!-- main -->
<div class="container pt-3">
   <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
         <h4>Data Mahasiswa</h4>
         <a href="tambah-mahasiswa.php" class="btn btn-secondary">Tambah Mahasiswa</a>
      </div>
      <div class="card-body">
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">NO</th>
                  <th scope="col">Nama</th>
                  <th scope="col">NIM</th>
                  <th scope="col">Jenis Kelamin</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Jurusan</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $a = 1;?>
               <?php foreach( $mahasiswa as $data): ?>
               <tr>
                  <th scope="row"><?= $a++?></th>
                  <td><?= $data["nama"] ?></td>
                  <td><?= $data["nim"] ?></td>
                  <td><?= $data["jenis_kelamin"] ?></td>
                  <td><?= $data["alamat"] ?></td>
                  <?php $jurusan =mysqli_fetch_assoc(mysqli_query($conn, "SELECT nama_jurusan FROM jurusan where id_jurusan = '$data[jurusan_id]'"));?>
                  <td><?= $jurusan["nama_jurusan"] ?></td>
                  <td>
                     <a href="edit-mahasiswa.php?id=<?= $data["id_mhs"] ?>" class="btn btn-primary">Edit</a>
                     <a href="hapus-mahasiswa.php?id=<?= $data["id_mhs"] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                  </td>
               </tr>
               <?php endforeach;?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<!-- main -->

<?php
include "layout/footer.php";
?>