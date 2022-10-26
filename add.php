<?php
require_once "conn.php";
$nama = $_POST['nama'];
$ktr = $_POST['ktr'];
$harga = $_POST['harga'];
$jumlah = $_POST['jumlah'];

$query = mysqli_query($connect,"INSERT INTO produk(nama_produk,keterangan,harga,jumlah) VALUES ('$nama','$ktr',$harga,$jumlah)");
?>