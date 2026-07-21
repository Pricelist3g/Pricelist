<?php

$host="localhost";
$user="root";
$pass="";
$db="produk_online";

$conn=mysqli_connect($host,$user,$pass,$db);

if(!$conn){
    die("Koneksi Database Gagal");
}
?>