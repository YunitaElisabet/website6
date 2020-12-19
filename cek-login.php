<?php 
session_start();
 
include("koneksi.php");

$username = $_POST['username'];
$password = $_POST['password'];

$login = mysqli_query($koneksi,"SELECT * FROM login WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
	header("location:fes.php");
}

 
 ?>