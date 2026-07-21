<?php
include "config/koneksi.php";
include "includes/header.php";
include "includes/navbar.php";

/* ==========================
   Ambil Data Kategori
========================== */
$qKategori = mysqli_query($conn,"SELECT * FROM kategori ORDER BY nama_kategori ASC");

/* ==========================
   Query Produk
========================== */

$sql = "SELECT produk.*, kategori.nama_kategori
        FROM produk
        LEFT JOIN kategori
        ON produk.kategori_id = kategori.id";

$where = [];

/* Harga Minimum */
if(isset($_GET['min']) && $_GET['min']!=""){
    $min = (int)$_GET['min'];
    $where[] = "produk.harga >= $min";
}

/* Harga Maksimum */
if(isset($_GET['max']) && $_GET['max']!=""){
    $max = (int)$_GET['max'];
    $where[] = "produk.harga <= $max";
}

/* Filter Kategori */
if(isset($_GET['kategori']) && $_GET['kategori']!=""){
    $kategori = (int)$_GET['kategori'];
    $where[] = "produk.kategori_id = $kategori";
}

/* Gabungkan WHERE */

if(count($where)>0){
    $sql .= " WHERE ".implode(" AND ",$where);
}

$sql .= " ORDER BY produk.id DESC";

$data = mysqli_query($conn,$sql);

if(!$data){
    die(mysqli_error($conn));
}
?>

<div class="container mt-4">

	<form method="GET">

	<div class="row mb-4">

	<div class="col-md-3">
		<input
		type="number"
		name="min"
		class="form-control"
		placeholder="Harga Minimum"
		value="<?= isset($_GET['min'])?$_GET['min']:''; ?>">
	</div>

	<div class="col-md-3">
		<input
		type="number"
		name="max"
		class="form-control"
		placeholder="Harga Maksimum"
		value="<?= isset($_GET['max'])?$_GET['max']:''; ?>">
	</div>

	<div class="col-md-3">

		<select name="kategori" class="form-control">

			<option value="">Semua Kategori</option>

				<?php while($k=mysqli_fetch_assoc($qKategori)){ ?>

			<option
				value="<?= $k['id']; ?>"

				<?= (isset($_GET['kategori']) && $_GET['kategori']==$k['id'])?'selected':''; ?>>

				<?= $k['nama_kategori']; ?>

			</option>

		<?php } ?>

		</select>

	</div>

	<div class="col-md-3">

		<button class="btn btn-primary w-100">

			Filter

		</button>

		</div>

	</div>

	</form>

	<div class="row">

		<?php

		if(mysqli_num_rows($data)>0){

		while($p=mysqli_fetch_assoc($data)){

		?>

		<div class="col-md-3 mb-4">

			<div class="card h-100 shadow">

			<img src="uploads/<?= $p['gambar']; ?>"
			class="card-img-top"
			style="height:220px;object-fit:cover;">

			<div class="card-body d-flex flex-column">

			<h5><?= $p['nama_produk']; ?></h5>

			<p class="text-muted mb-1">
				<?= $p['nama_kategori']; ?>
			</p>

			<h4 class="text-success">

				Rp <?= number_format($p['harga'],0,',','.'); ?>

			</h4>

			<p>

				<?= substr($p['deskripsi'],0,60); ?>...

			</p>

				<a
					href="detail.php?id=<?= $p['id']; ?>"
					class="btn btn-success mt-auto">

					Detail

				</a>

				</div>

			</div>

		</div>

		<?php

		}

		}else{

		?>

			<div class="col-md-12">

				<div class="alert alert-danger">

					Produk tidak ditemukan.

				</div>

			</div>

		<?php } ?>

	</div>

</div>

<?php
include "includes/footer.php";
?>