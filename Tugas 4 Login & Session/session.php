<?php 
	include 'koneksi.php';
	session_start();
	
	$user_check = $_SESSION['username'];

	$mysql_query = "selecet * from pengguna where username = '$user_check'";

	$row = msql_fetch_array(msql_query($msql_query));

	$login_session_name = $row['nama_pengguna'];

	if (isset($_SESSION['username'])){
		header("location:index.php");
	}
?>