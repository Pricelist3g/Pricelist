<?php
include "session.php";
include "../config/koneksi.php";

if(isset($_POST['simpan'])){

$nama=mysqli_real_escape_string($conn,$_POST['nama']);

mysqli_query($conn,"INSERT INTO kategori(nama_kategori)
VALUES('$nama')");

header("Location:kategori.php");

}
?>

<!DOCTYPE html>

<html>

<head>

<title>Tambah Kategori</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="d-flex">

<?php include "sidebar.php"; ?>

<div class="container-fluid p-4">

<!-- Isi halaman -->

<div class="container mt-4">

<h2>Tambah Kategori</h2>

<form method="POST">

<div class="mb-3">

<label>Nama Kategori</label>

<input
type="text"
name="nama"
class="form-control"
required>

</div>

<button
class="btn btn-success"
name="simpan">

Simpan

</button>

<a
href="kategori.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>


</body>

</html>