<?php
include "session.php";
include "../config/koneksi.php";

if(isset($_POST['simpan'])){

$nama=$_POST['nama'];
$harga=$_POST['harga'];
$stok=$_POST['stok'];
$deskripsi=$_POST['deskripsi'];
$kategori=$_POST['kategori'];

$gambar = $_FILES['gambar']['name'];
$tmp = $_FILES['gambar']['tmp_name'];
$ukuran = $_FILES['gambar']['size'];

if($gambar!=""){

    $ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

    $allow = ['jpg','jpeg','png','webp'];

    if(!in_array($ext,$allow)){

        echo "<script>
        Swal.fire('Gagal','Format gambar harus JPG, PNG atau WEBP','error');
        </script>";
        exit;
    }

    if($ukuran > 2097152){

        echo "<script>
        Swal.fire('Gagal','Ukuran gambar maksimal 2 MB','error');
        </script>";
        exit;
    }

    $gambar = time().'_'.$gambar;

    move_uploaded_file($tmp,"../uploads/".$gambar);

}else{

    $gambar = "default.png";
}

mysqli_query($conn,"INSERT INTO produk
(nama_produk,harga,stok,gambar,deskripsi,kategori_id)
VALUES
('$nama','$harga','$stok','$gambar','$deskripsi','$kategori')
");

header("Location: produk.php");

}
?>

<!DOCTYPE html>

<html>

<head>

<title>Tambah Produk</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="d-flex">

<?php include "sidebar.php"; ?>

<div class="container-fluid p-4">

<div class="container mt-4">

<h2>Tambah Produk</h2>

<form method="POST" enctype="multipart/form-data">

<input
type="text"
name="nama"
class="form-control mb-3"
placeholder="Nama Produk"
required>

<input
type="number"
name="harga"
class="form-control mb-3"
placeholder="Harga"
required>

<input
type="number"
name="stok"
class="form-control mb-3"
placeholder="Stok"
required>

<select
name="kategori"
class="form-control mb-3">

<?php

$kat=mysqli_query($conn,"SELECT * FROM kategori");

while($k=mysqli_fetch_assoc($kat)){

?>

<option value="<?= $k['id']; ?>">

<?= $k['nama_kategori']; ?>

</option>

<?php } ?>

</select>

<textarea
name="deskripsi"
class="form-control mb-3"
placeholder="Deskripsi"></textarea>

<input
type="file"
name="gambar"
class="form-control mb-3">

<button
class="btn btn-success"
name="simpan">

Simpan

</button>

</form>

</div>

</div>

</div>

</body>

</html>