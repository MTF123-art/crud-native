<?php
include "layout/header.php";
include "config/database.php";
?>

<div class="container mt-3">
   <form method="POST" action="">
      <div class="mb-3">
         <label for="exampleInputEmail1" class="form-label">Nama Jurusan</label>
         <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_jurusan" required>
      </div>
      <button type="submit" name="simpan" class="btn btn-primary">Tambah</button>
   </form>
</div>

<?php
include "layout/footer.php";
if (isset($_POST["simpan"])) {
   if($_POST["nama_jurusan"]){
      $nama_jurusan = $_POST["nama_jurusan"];
      $simpan = mysqli_query($conn, "INSERT INTO jurusan (nama_jurusan) values ('$nama_jurusan');");
   
      echo '
         <script>
            alert("data berhasil disimpan");
            window.location.href = "jurusan.php";
         </script>
      ';
   }else{
      echo '
      <script>
         alert("data gagal disimpan");
      </script>
   ';
   }
}

?>