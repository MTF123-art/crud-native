<?php
include "layout/header.php";
include "config/database.php";

$id = $_GET["id"];
$jurusan = mysqli_query($conn, "select * from jurusan where id_jurusan = '$id'");
$data = mysqli_fetch_assoc($jurusan);
?>

<div class="container mt-3">
   <form method="POST" action="">
      <div class="mb-3">
         <label for="exampleInputEmail1" class="form-label">Nama Jurusan</label>
         <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nama_jurusan" required value="<?= $data['nama_jurusan']?>">
      </div>
      <button type="submit" name="Ubah" class="btn btn-primary">Ubah</button>
   </form>
</div>
<?php
include "layout/footer.php";
if (isset($_POST["Ubah"])) {

   $nama_jurusan = $_POST["nama_jurusan"];
   $simpan = mysqli_query($conn, "UPDATE jurusan set nama_jurusan = '$nama_jurusan' where id_jurusan = $id");
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

?>