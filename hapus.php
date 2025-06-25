<?php
include 'koneksi.php';
session_start();

$nip = $_GET['nip'];
mysqli_query($koneksi, "DELETE FROM karyawan WHERE nip='$nip'");

$_SESSION['pesan'] = "Data berhasil dihapus!";
header("Location: index.php");
exit;
?>
