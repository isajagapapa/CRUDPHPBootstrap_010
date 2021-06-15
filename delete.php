<?php
// Koneksi db
include 'config.php';

// Menangkan data id yang di kirim dari url karena delete cuma butuh id
$id = $_GET['id'];

// Menghapus data dari database
mysqli_query($koneksi, "delete from mahasiswa where id='$id'");

// Menamgalihkan halaman kembali ke index.php
header("location:index.php");
?>