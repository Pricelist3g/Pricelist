<?php

include "config/koneksi.php";
include "includes/header.php";
include "includes/navbar.php";

?>

<div class="container mt-4">

<div class="banner text-center" id="banner">
    <div class="overlay">
        <h1>Selamat Datang</h1>

        <p>Website Pricelist Online 3G Group</p>

        <a href="produk.php" class="btn btn-light">
            Lihat Produk
        </a>
    </div>
</div>

<div class="row mt-5">

<?php

    $data=mysqli_query($conn,"SELECT * FROM produk LIMIT 4");

    while($d=mysqli_fetch_array($data)){

?>

<div class="col-lg-3 col-md-4 col-sm-6 mb-4">

    <div class="card h-100 shadow-sm border-0">

        <img src="uploads/<?php echo $d['gambar']; ?>" class="card-img-top">

    <div class="card-body d-flex flex-column">

                    <h5 class="product-title">

                        <?php echo $d['nama_produk']; ?>

                    </h5>

                    <p class="product-desc">

                        <?php echo $d['deskripsi'];?>

                    </p>

                        <h4 class="mt-auto">

                            Rp <?php echo number_format($d['harga']); ?>

                        </h4>

                    <a href="detail.php?id=<?php echo $d['id']; ?>" class="btn btn-success w-100">

                    Lihat Detail

                    </a>

                </div>

            </div>

        </div>

<?php
    
    }

?>

    </div>

</div>

<?php
include "includes/footer.php";
?>