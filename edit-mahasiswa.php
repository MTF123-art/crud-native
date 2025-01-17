<?php
include "layout/header.php";
include "config/database.php";

$id = $_GET["id"];
$mahasiswa = mysqli_query($conn, "select * from mahasiswa where id = '$id'");
$data = mysqli_fetch_assoc($mahasiswa);
?>

<div class="container mt-3">
   <form method="POST" action="">

      <div class="mb-3">
         <label for="nama" class="form-label">Nama Mahasiswa</label>
         <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama_mahasiswa" value="<?= $data['nama'] ?>" required>
      </div>

      <div class="mb-3">
         <label for="nim" class="form-label">NIM Mahasiswa</label>
         <input type="text" class="form-control" id="nim" aria-describedby="emailHelp" name="nim_mahasiswa" value="<?= $data['nim'] ?>" required>
      </div>
   
      <div class="mb-3">
         <label for="email" class="form-label">Email Mahasiswa</label>
         <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email_mahasiswa" value="<?= $data['email'] ?>" required>
      </div>

      <div class="mb-3">
         <label for="alamat" class="form-label">Alamat Mahasiswa</label>
         <input type="text" class="form-control" id="alamat" aria-describedby="emailHelp" name="alamat_mahasiswa" value="<?= $data['alamat'] ?>" required>
      </div>

      <div class="mb-3">
         <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
         <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
            <option value="laki-laki" <?= $data['jenis_kelamin'] == "laki-laki" ? "selected" : "" ?>>Laki-Laki</option>
            <option value="perempuan" <?= $data['jenis_kelamin'] == "perempuan" ? "selected" : "" ?>>Perempuan</option>
         </select>
      </div>

      <?php $jurusan = mysqli_query($conn, "SELECT * FROM jurusan ") ?>
      <div class="mb-3">
         <label for="jurusan" class="form-label">Jurusan</label>
         <select class="form-select" name="jurusan" id="jurusan">
            <?php foreach ($jurusan as $jrs): ?>
               <option value="<?= $jrs['id'] ?>" <?= $jrs['id'] == $data['jurusan_id'] ? "selected" : "" ?>><?= $jrs['nama_jurusan'] ?></option>
            <?php endforeach; ?>
         </select>
      </div>

      <button type="submit" name="simpan" class="btn btn-primary">Edit</button>
   </form>
</div>

<?php
include "layout/footer.php";
if (isset($_POST["simpan"])) {
   if ($_POST["nama_mahasiswa"]) {
      $nama_mahasiswa = $_POST["nama_mahasiswa"];
      $nim_mahasiswa = $_POST["nim_mahasiswa"];
      $email_mahasiswa = $_POST["email_mahasiswa"];
      $alamat_mahasiswa = $_POST["alamat_mahasiswa"];
      $jenis_kelamin = $_POST["jenis_kelamin"];
      $jurusan = $_POST["jurusan"];

      $simpan = mysqli_query($conn, "UPDATE mahasiswa SET nama = '$nama_mahasiswa', nim = '$nim_mahasiswa', email = '$email_mahasiswa', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat_mahasiswa', jurusan_id = '$jurusan' where id = '$id'");

      echo '
         <script>
            alert("data berhasil diubah");
            window.location.href = "mahasiswa.php";
         </script>
      ';
   } else {
      echo '
      <script>
         alert("data gagal diubah");
      </script>
   ';
   }
}

?>