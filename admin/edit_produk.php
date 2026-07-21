<?php
include "session.php";
include "../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM produk WHERE id='$id'");
$p = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama = mysqli_real_escape_string($conn,$_POST['nama']);
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $kategori = $_POST['kategori'];
    $deskripsi = mysqli_real_escape_string($conn,$_POST['deskripsi']);

    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    if($gambar!=""){

        $ext = strtolower(pathinfo($gambar, PATHINFO_EXTENSION));

        $allow = array("jpg","jpeg","png","webp");

        if(in_array($ext,$allow)){

            $namaBaru = time()."_".$gambar;

            move_uploaded_file($tmp,"../uploads/".$namaBaru);

            mysqli_query($conn,"UPDATE produk SET
                nama_produk='$nama',
                harga='$harga',
                stok='$stok',
                kategori_id='$kategori',
                deskripsi='$deskripsi',
                gambar='$namaBaru'
                WHERE id='$id'
            ");

        }else{

            echo "<script>alert('Format gambar harus JPG, PNG atau WEBP');</script>";

        }

    }else{

        mysqli_query($conn,"UPDATE produk SET
            nama_produk='$nama',
            harga='$harga',
            stok='$stok',
            kategori_id='$kategori',
            deskripsi='$deskripsi'
            WHERE id='$id'
        ");

    }

    echo "<script>
    alert('Produk berhasil diupdate');
    window.location='produk.php';
    </script>";

}
?>

<!DOCTYPE html>
<html>

<head>

<title>Edit Produk</title>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-4">

<h2>Edit Produk</h2>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label>Nama Produk</label>

<input
type="text"
name="nama"
class="form-control"
value="<?= $p['nama_produk']; ?>"
required>

</div>

<div class="mb-3">

<label>Harga</label>

<input
type="number"
name="harga"
class="form-control"
value="<?= $p['harga']; ?>"
required>

</div>

<div class="mb-3">

<label>Stok</label>

<input
type="number"
name="stok"
class="form-control"
value="<?= $p['stok']; ?>"
required>

</div>

<div class="mb-3">

<label>Kategori</label>

<select
name="kategori"
class="form-control">

<?php

$kat=mysqli_query($conn,"SELECT * FROM kategori");

while($k=mysqli_fetch_assoc($kat)){

?>

<option
value="<?= $k['id']; ?>"
<?= ($k['id']==$p['kategori_id'])?'selected':'';?>>

<?= $k['nama_kategori']; ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Deskripsi</label>

<textarea
name="deskripsi"
class="form-control"
rows="5"><?= $p['deskripsi']; ?></textarea>

</div>

<div class="mb-3">

<label>Foto Saat Ini</label><br>

<img
src="../uploads/<?= $p['gambar']; ?>"
width="200"
class="img-thumbnail">

</div>

<div class="mb-3">

<label>Upload Gambar</label>

<input
type="file"
name="gambar"
id="gambar"
class="form-control"
accept=".jpg,.jpeg,.png,.webp">

</div>

<button
class="btn btn-success"
name="update">

Update Produk

</button>

<a
href="produk.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

<script>

gambar.onchange=function(){

const[file]=gambar.files;

if(file){

preview.src=URL.createObjectURL(file);

}

}

</script>

</body>

</html>