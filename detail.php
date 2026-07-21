<?php

include "config/koneksi.php";

$id=$_GET['id'];

$data=mysqli_query($conn,"
SELECT * FROM produk
WHERE id='$id'
");

$d=mysqli_fetch_assoc($data);

include "includes/header.php";
include "includes/navbar.php";

?>

<div class="container mt-4">

<div class="row">

<div class="col-md-5 text-center">

<img
src="uploads/<?php echo $d['gambar'];?>"
class="img-fluid rounded shadow"
style="width: 350px;height: 350px;object-fit: cover;"> 

</div>

<div class="col-md-7">

<h2>

<?php echo $d['nama_produk'];?>

</h2>

<h3 class="text-success">

Rp
<?php echo number_format($d['harga']);?>

</h3>

<p>

<?php echo $d['deskripsi'];?>

</p>

<h5>

Stok :
<?php echo $d['stok'];?>

</h5>

<a href="produk.php"
class="btn btn-secondary">

Kembali

</a>

</div>

</div>

</div>

<?php
include "includes/footer.php";
?>