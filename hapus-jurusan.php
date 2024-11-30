<?php 
include "config/database.php";

$id = $_GET['id'];
mysqli_query($conn, "delete from jurusan where id_jurusan = $id");
header("Location: jurusan.php");

?>