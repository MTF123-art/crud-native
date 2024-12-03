<?php
include "layout/header.php";
include "config/database.php";

$jurusan = mysqli_query($conn, "SELECT * FROM jurusan");
?>

<!-- main -->
<div class="container pt-3">
   <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
         <h4>Data Jurusan</h4>
         <a href="tambah-jurusan.php" class="btn btn-secondary">Tambah Jurusan</a>
      </div>
      <div class="card-body">
         <table class="table">
            <thead>
               <tr>
                  <th scope="col">NO</th>
                  <th scope="col">Nama Jurusan</th>
                  <th scope="col">Aksi</th>
               </tr>
            </thead>
            <tbody>
               <?php $a = 1; ?>
               <?php foreach ($jurusan as $data): ?>
                  <tr>
                     <th scope="row"><?= $a++ ?></th>
                     <td><?= $data["nama_jurusan"] ?></td>
                     <td>
                        <a href="edit-jurusan.php?id=<?= $data["id_jurusan"] ?>" class="btn btn-primary">Edit</a>
                        <a href="hapus-jurusan.php?id=<?= $data["id_jurusan"] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
</div>
<!-- main -->

<?php
include "layout/footer.php";
?>