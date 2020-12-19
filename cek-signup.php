 <?php 
session_start();

include("koneksi.php");

$username = $_POST['username'];
$password = $_POST['password'];
$qry = "INSERT INTO login VALUES('', '$username', '$password')";
$sql = mysqli_query($koneksi, $qry);

header("location:index.php");

 ?>