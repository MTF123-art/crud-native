<?php
include "config/database.php";

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE jurusan_id = $id");
if (mysqli_num_rows($query) > 0) {
   echo "<script>
               alert('Tidak dapat menghapus data karena ada data mahasiswa pada jurusan tersebut!');
               window.location.href = 'jurusan.php';
         </script>";
} else {
   mysqli_query($conn, "delete from jurusan where id_jurusan = $id");
   echo "<script>
      alert('data berhasill di hapus');
      window.location.href = 'jurusan.php';
</script>";
}
