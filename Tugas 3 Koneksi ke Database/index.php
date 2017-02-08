<?php 
include 'koneksi.php';
	if (isset($_GET['delete_id'])) {
		$sql_query = "DELETE FROM master WHERE no=".$_GET['delete_id'];
		mysql_query($sql_query);
		header("location: $_SERVER[PHP_SELF]");
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
<script type="text/javascript">
	function edit_id(id) {
		if (confirm('Yakin Akan Mengedit Data?')) {
			window.location.href = 'edit.php?edit_id='+id;
		}
	}
	function delete_id(id) {
		if (confirm('Yakin Akan Menghapus Data?')) {
			window.location.href = 'index.php?delete_id='+id;
		}
	}
</script>
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
<table border="1" width="75%" align="center">
<tr>
<th><a href="tambah.php"><button type="submit">+ tambah</button></a>
</th>
</tr>
<tr>
	<td><center>Nama Pengguna</center></td>
	<td><center>Jabatan</center></td>
	<td><center>Jenis Kelamin</center></td>
	<td><center>Alamat</center></td>
	<td colspan="2"><center>Aksi</center></td>
</tr>
<?php 
	$sql_query = "SELECT * FROM pengguna";
	$result_set = mysqli_query($sql_query);
	if (mysqli_num_rows($result_set) > 0 ) {
		while ($row = mysqli_fetch_array($result_set)) {
?>
<tr>
	<td><?php echo $row[1];?></td>
	<td><?php echo $row[2];?></td>
	<td><?php echo $row[3];?></td>
	<td><?php echo $row[4];?></td>
	<td><a href="javascript:edit_id('<?php echo $row[0];?>')">Edit</a></td>
	<td><a href="javascript:delete_id('<?php echo $row[0];?>')">Delete</a></td>
</tr>
<?php 
		}
	}
	else{
		?>
		<tr>
			<td colspan="6"><center> Data Tidak Di Temukan. </center></td>
		</tr>
		<?php
	}
?>		
</table>
</article>
<footer>Toni_Priatna-14111099</footer>
</div>
</body>
</html>
