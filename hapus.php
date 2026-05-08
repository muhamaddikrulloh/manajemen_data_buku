<?php
include 'koneksi.php';

$id = $_GET['id'];
$r  = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT foto FROM buku WHERE id=$id"));

unlink("uploads/" . $r['foto']);
mysqli_query($koneksi, "DELETE FROM buku WHERE id=$id");

header("Location: index.php");
?>
