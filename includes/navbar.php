<nav class="navbar navbar-expand-lg navbar-dark bg-success">
<div class="container">

<a class="navbar-brand fw-bold" href="index.php">
🛒 Pricelist Online
</a>

<button class="navbar-toggler" type="button"
data-bs-toggle="collapse"
data-bs-target="#menu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav me-auto">

<li class="nav-item">
<a class="nav-link" href="index.php">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="produk.php">Produk</a>
</li>

<li class="nav-item">
<a class="nav-link" href="kategori.php">Kategori</a>
</li>

</ul>

<form class="d-flex" action="cari.php" method="GET">

<input
class="form-control me-2"
type="search"
name="keyword"
placeholder="Cari produk">

<button class="btn btn-light">
Cari
</button>

<a href="admin/login.php"
class="btn btn-warning ms-2">
Admin
</a>

</form>


</div>

</div>
</nav>