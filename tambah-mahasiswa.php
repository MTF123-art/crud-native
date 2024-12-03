<?php
include "layout/header.php";
include "config/database.php";
?>

<div class="container mt-3">
   <form method="POST" action="">

      <div class="mb-3">
         <label for="nama" class="form-label">Nama Mahasiswa</label>
         <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama_mahasiswa" required>
      </div>

      <div class="mb-3">
         <label for="nim" class="form-label">NIM Mahasiswa</label>
         <input type="text" class="form-control" id="nim" aria-describedby="emailHelp" name="nim_mahasiswa" required>
      </div>
      
      <div class="mb-3">
         <label for="email" class="form-label">Email Mahasiswa</label>
         <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email_mahasiswa" required>
      </div>

      <div class="mb-3">
         <label for="alamat" class="form-label">Alamat Mahasiswa</label>
         <input type="text" class="form-control" id="alamat" aria-describedby="emailHelp" name="alamat_mahasiswa" required>
      </div>

      <div class="mb-3">
         <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
         <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
            <option selected>--</option>
            <option value="laki-laki">Laki-Laki</option>
            <option value="perempuan">Perempuan</option>
         </select>
      </div>

      <?php $jurusan = mysqli_query($conn, "SELECT * FROM jurusan") ?>
      <div class="mb-3">
         <label for="jurusan" class="form-label">Jurusan</label>
         <select class="form-select" name="jurusan" id="jurusan">
            <option selected>--</option>
            <?php foreach ($jurusan as $jrs): ?>
               <option value="<?= $jrs['id_jurusan'] ?>"><?= $jrs['nama_jurusan'] ?></option>
            <?php endforeach; ?>
         </select>
      </div>

      <button type="submit" name="simpan" class="btn btn-primary">Tambah</button>
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

      $cek = mysqli_query($conn, "select * from mahasiswa where nim = '$nim_mahasiswa' or email = '$email_mahasiswa'");
      if(mysqli_num_rows($cek) > 0){
         echo '
         <script>
            alert("Email atau NIM sudah terdaftar");
            window.location.href = "tambah-mahasiswa.php";
         </script>
      ';
      }else{
         $simpan = mysqli_query($conn, "INSERT INTO mahasiswa (nama, nim, email, jenis_kelamin, alamat, jurusan_id) values ('$nama_mahasiswa', '$nim_mahasiswa', '$email_mahasiswa', '$jenis_kelamin','$alamat_mahasiswa', $jurusan )");
         echo '
            <script>
               alert("data berhasil disimpan");
               window.location.href = "mahasiswa.php";
            </script>
         ';
      }

   } else {
      echo '
      <script>
         alert("data gagal disimpan");
      </script>
   ';
   }
}

?>