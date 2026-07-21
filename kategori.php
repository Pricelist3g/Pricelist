<?php

include "config/koneksi.php";
include "includes/header.php";
include "includes/navbar.php";

?>

	<div class="container mt-4">

		<h3>Kategori Produk</h3>

			<div class="list-group">

			<?php

				$kat=mysqli_query($conn,"
				SELECT * FROM kategori
				");

				while($k=mysqli_fetch_assoc($kat)){
				?>

				<a
					href="kategori.php?id=<?php echo $k['id'];?>"
					class="list-group-item list-group-item-action">

					<?php
					echo $k['nama_kategori'];
					?>

				</a>

			<?php } ?>

			</div>

			<hr>

				<div class="row">

				<?php

				if(isset($_GET['id'])){

				$id=$_GET['id'];

					$produk=mysqli_query($conn,"
					SELECT * FROM produk
					WHERE kategori_id='$id'
					");

						while($p=mysqli_fetch_assoc($produk)){
						?>

			<div class="col-md-3 mb-4">

				<div class="card">

					<img src="uploads/<?php echo $p['gambar'];?>"
						class="card-img-top">

						<div class="card-body">

						<h5>
							<?php echo $p['nama_produk'];?>
						</h5>

						<h5 class="text-success">

							Rp
							<?php echo number_format($p['harga']);?>

						</h5>

						<a
						href="detail.php?id=<?php echo $p['id'];?>"
						class="btn btn-success w-100">

						Detail

						</a>

					</div>

				</div>

			</div>

			<?php

			}

			}

			?>

		</div>

	</div>

<?php
include "includes/footer.php";
?>