<?php

// pengaturan database
$servername = "localhost";  // alamat server
$username = "root";			// username database
$password = "";				// password database
$dbname = "data";		// nama database

// proses pengecekan
$koneksi = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

$direktori = "hasil";

?>