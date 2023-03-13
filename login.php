<?php
include 'koneksi.php';
$name = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT id, uname, upass FROM tab_user WHERE uname = '$name' AND upass = '$pass'";
$result = $koneksi->query($sql);
if ($result->num_rows > 0){
	header("Location: home.php");
}
else{
	header("Location: index.php");
}
$koneksi->close();
?>