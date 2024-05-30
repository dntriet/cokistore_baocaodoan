<?php
	include('../database/connect.php');
?>

<?php
if(isset($_GET['xoa'])){
	$del=$_GET['xoa'];
	$sql = "DELETE FROM user WHERE email =?";
	$stmt = mysqli_stmt_init($connect);
	mysqli_stmt_prepare($stmt, $sql);
	mysqli_stmt_bind_param($stmt,"s",$del);
	mysqli_stmt_execute($stmt);
	header('location: ../admin/thongtinkhachhang.php');
	exit;
}