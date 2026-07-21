<?php
include "session.php";
include "../config/koneksi.php";

$totalProduk=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM produk"));
$totalKategori=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kategori"));
?>

<!DOCTYPE html>

<html>

<head>

<title>Dashboard</title>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="d-flex">

<?php include "sidebar.php"; ?>

<div class="container-fluid p-4">

<div class="container mt-3">

<div class="row">

<div class="col-md-4">

<div class="card bg-success text-white">

<div class="card-body">

<h5>Total Produk</h5>

<h1><?= $totalProduk ?></h1>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card bg-primary text-white">

<div class="card-body">

<h5>Total Kategori</h5>

<h1><?= $totalKategori ?></h1>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

</div>

</body>

</html>