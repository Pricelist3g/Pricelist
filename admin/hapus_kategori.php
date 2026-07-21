<?php

include "session.php";
include "../config/koneksi.php";

$id=$_GET['id'];

/* Cek apakah kategori masih digunakan */

$cek=mysqli_query($conn,"
SELECT COUNT(*) AS total
FROM produk
WHERE kategori_id='$id'
");

$row=mysqli_fetch_assoc($cek);

if($row['total']>0){

echo "<script>

alert('Kategori tidak bisa dihapus karena masih digunakan oleh produk.');

window.location='kategori.php';

</script>";

exit;

}

mysqli_query($conn,"
DELETE FROM kategori
WHERE id='$id'
");

header("Location:kategori.php");
exit;
?>