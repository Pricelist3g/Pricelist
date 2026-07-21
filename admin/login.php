<?php
session_start();
include "../config/koneksi.php";

if(isset($_SESSION['admin'])){
    header("Location: dashboard.php");
}

if(isset($_POST['login'])){

$username = mysqli_real_escape_string($conn,$_POST['username']);
$password = $_POST['password'];

$query = mysqli_query($conn,"SELECT * FROM admin WHERE username='$username'");

if(mysqli_num_rows($query)>0){

$data=mysqli_fetch_assoc($query);

if(password_verify($password,$data['password'])){

$_SESSION['admin']=$data['nama'];
$_SESSION['id_admin']=$data['id'];

header("Location: dashboard.php");

}else{

$error="Password Salah";

}

}else{

$error="Username Tidak Ditemukan";

}

}

$stmt = mysqli_prepare($conn,"SELECT * FROM admin WHERE username=?");
mysqli_stmt_bind_param($stmt,"s",$username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

?>

<!DOCTYPE html>
<html>
<head>

<title>Login Admin</title>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center">

<div class="col-md-4">

<div class="card mt-5">

<div class="card-header bg-success text-white text-center">

<h3>Login Admin</h3>

</div>

<div class="card-body">

<?php
if(isset($error)){
?>

<div class="alert alert-danger">

<?php echo $error; ?>

</div>

<?php } ?>

<form method="POST">

<input
type="text"
name="username"
class="form-control mb-3"
placeholder="Username"
required>

<input
type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required>

<button
class="btn btn-success w-100"
name="login">

Login

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>