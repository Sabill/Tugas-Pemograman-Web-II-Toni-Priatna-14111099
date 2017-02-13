<?php 
session_start();
include 'koneksi.php';
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql_query = "select * form pengguna where username='$username' and password = '$password'";

		if(mysql_query($sql_query)) {
			$num_rows = mysql_num_rows(mysql_query($sql_query));
			if($num_rows == 1) {
				$_session['username'] = $username;
			?>
			<script type="text/javascript">
				alert('Anda Berhasil Login');
				window.location.href='home.php';
			</script>
			<?php } else {
				?>
				<script type="text/javascript">
					alert('Username dan Password tidak cocok');
					window.location.href="index.php"
				</script>
				<?php
				}
			} else {
				?>
				<script type="text/javascript">
					alert('Terjadi Error!!');
					window.location.href="index.php";
				</script>
				<?php
			}
		}
		if(isset($_POST['batal'])) {
			?>
			<script type="text/javascript">
				window.location.href="index.php";
			</script>
			<?php
		}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Operasi CRUD</title>
<style>
div.container {
	width:100px;
	border: 1px solid gray;
}
header, footer {
	padding: 1cm;
	color:#FFFFFF;
	background: brown;
	clear:left;
	text-align :center;
}
nav {
	float:left; 
	max-width: 160px;
	margin:0;
	padding:1cm;
}
nav ul {
	list-style-type:none;
	padding:0;
}
nav ul a{
	text-decoration:none;
}
artitle {
	margin-left:170px;
	border-left:1px solid gray;
	padding:1cm;
	overflow:hidden;
}
</style>
</head>
<body>
<div class="Container">
<header>
	<h1>Operasi CRUD</h1>
</header>
<nav>
	<ul>
		<li><b>MENU</b></li>
		<li><a href="#">Menu 1</a></li>
		<li><a href="#">Menu 2</a></li>
		<li><a href="#">Menu 3</a></li>
	</ul>
</nav>
<article>
<form method="post">
<table width="60%">
<th align="center" colspan="2">Login<a href="daftar.php">-Daftar</a></th>
<tr>
	<td>Username</td>
	<td><Input style="text" name="username" size="80"></td>
</tr>
<tr>
	<td>Password</td>
	<td><input type="password" name="password" size="80"></td>
</tr>
<td colspan="2" align="right">
	<input type="submit" name="login" value="Login" />
	<input type="submit" name="batal" value="Batal" />
</td>
</tr>
</table>
</form>
</article>
<footer>Toni_Priatna-14111099</footer>
</div>
</body>
</html>
