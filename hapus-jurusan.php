<?php
include "config/database.php";

$id = $_GET['id'];

function hapus($id){
   global $conn;
   $query = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE jurusan_id = $id");
   if (mysqli_num_rows($query) > 0) {
      return
      "<script>
            alert('Tidak dapat menghapus data karena ada data mahasiswa pada jurusan tersebut!');
            window.location.href = 'jurusan.php';
      </script>";
   } else {
      mysqli_query($conn, "delete from jurusan where id = $id");
      return
      "<script>
         alert('data berhasill di hapus');
         window.location.href = 'jurusan.php';
      </script>";
   }
}

echo hapus($id);
