<?php 
include "config/database.php";

$id = $_GET['id'];
mysqli_query($conn, "delete from mahasiswa where id_mhs = $id");
header("Location: mahasiswa.php");

?>