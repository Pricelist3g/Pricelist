<?php

include "../config/koneksi.php";

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=produk.xls");

echo "<table border='1'>";

echo "<tr>

<th>Nama</th>
<th>Harga</th>
<th>Stok</th>

</tr>";

$data=mysqli_query($conn,"SELECT * FROM produk");

while($d=mysqli_fetch_assoc($data)){

echo "<tr>";

echo "<td>".$d['nama_produk']."</td>";

echo "<td>".$d['harga']."</td>";

echo "<td>".$d['stok']."</td>";

echo "</tr>";

}

echo "</table>";

