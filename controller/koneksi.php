<?php
	session_start();
	$_SESSION['pesan'] = [];
	$host = "localhost";
	$user = "root";
	$pass = "";
	$dbname = "tb_pbd";

	// $conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
	$conn = mysqli_connect("$host","$user","$pass","$dbname");

	// Check connection
	if (mysqli_connect_errno()){
		die("Koneksi database gagal : " . mysqli_connect_error());
	}
?>
