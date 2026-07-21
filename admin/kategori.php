<?php
include "session.php";
include "../config/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>

<title>Kelola Kategori</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="d-flex">

<?php include "sidebar.php"; ?>

<div class="container-fluid p-4">

<!-- Isi halaman -->

<div class="container mt-4">

<h2>Kelola Kategori</h2>

<a href="tambah_kategori.php" class="btn btn-success mb-3">
+ Tambah Kategori
</a>

<table class="table table-bordered">

<thead class="table-success">

<tr>

<th>No</th>
<th>Nama Kategori</th>
<th width="180">Aksi</th>

</tr>

</thead>

<tbody>

<?php

$no=1;

$data=mysqli_query($conn,"SELECT * FROM kategori ORDER BY id DESC");

while($k=mysqli_fetch_assoc($data)){

?>

<tr>

<td><?= $no++; ?></td>

<td><?= $k['nama_kategori']; ?></td>

<td>

<a href="edit_kategori.php?id=<?= $k['id']; ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus_kategori.php?id=<?= $k['id']; ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Hapus kategori?')">
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