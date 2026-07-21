<?php
include "session.php";
include "../config/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
<title>Kelola Produk</title>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="d-flex">

<?php include "sidebar.php"; ?>

<div class="container-fluid p-4">

<div class="container mt-4">

<h2>Kelola Produk</h2>

<form method="GET" class="d-flex justify-content-center align-items-center mb-3">
	<div class="input-group">
		<input
			type="text"
			name="cari"
			class="form-control mb-3"
			placeholder="Cari Produk">
		<button class="btn btn-primary mb-3">
			Cari
		</button>
	</div>
</form>

<a href="tambah_produk.php" class="btn btn-success mb-3">
+ Tambah Produk
</a>

<a href="export_produk.php" class="btn btn-success mb-3">
Export Excel
</a>

<table class="table table-bordered table-hover">

<thead class="table-success">

<tr>

<th>No</th>
<th>Foto</th>
<th>Nama</th>
<th>Harga</th>
<th>Stok</th>
<th>Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

if(isset($_GET['cari'])){

$cari=$_GET['cari'];

$data=mysqli_query($conn,"
SELECT * FROM produk
WHERE nama_produk
LIKE '%$cari%'
ORDER BY id DESC
");

}else{

$data=mysqli_query($conn,"
SELECT * FROM produk
ORDER BY id DESC
");

}

while($d=mysqli_fetch_assoc($data)){

?>

<tr>

<td><?= $no++; ?></td>

<td width="100">

<img src="../uploads/<?= $d['gambar']; ?>"
width="50">

</td>

<td><?= $d['nama_produk']; ?></td>

<td>Rp <?= number_format($d['harga']); ?></td>

<td><?= $d['stok']; ?></td>

<td>

<a
href="edit_produk.php?id=<?= $d['id']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="hapus_produk.php?id=<?= $d['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Hapus produk?')">

Hapus

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>


</div>

</div>


</body>

</html>