<?php
require_once "conn.php";
$nama = $_POST['nama'];
$ktr = $_POST['ktr'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];

$resultid = mysqli_query($connect, "SELECT id FROM produk WHERE nama_produk='$nama' LIMIT 1");
$row=mysqli_fetch_assoc($resultid);
$id = $row['id'];

$query = mysqli_query($connect,"DELETE FROM produk WHERE id=$id");
?>