<?php

include "config/koneksi.php";
include "includes/header.php";
include "includes/navbar.php";

$keyword=$_GET['keyword'];

?>

<div class="container mt-4">

<h3>

Hasil Pencarian

</h3>

<div class="row">

<?php

$data=mysqli_query($conn,"
SELECT * FROM produk
WHERE nama_produk
LIKE '%$keyword%'
");

while($d=mysqli_fetch_assoc($data)){
?>

<div class="col-md-3 mb-4">

<div class="card">

<img
src="uploads/<?php echo $d['gambar'];?>"
class="card-img-top">

<div class="card-body">

<h5>

<?php echo $d['nama_produk'];?>

</h5>

<h5 class="text-success">

Rp
<?php echo number_format($d['harga']);?>

</h5>

<a
href="detail.php?id=<?php echo $d['id'];?>"
class="btn btn-success w-100">

Detail

</a>

</div>

</div>

</div>

<?php } ?>

</div>

</div>

<?php
include "includes/footer.php";
?>