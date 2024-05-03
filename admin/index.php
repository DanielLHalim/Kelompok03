<?php

//error_reporting(0);

session_start();
if($_SESSION['status_login']=='')
{
    header("location:../index.php");
}

include "config.php";

include "template/header.php";

if (isset($_GET['page'])){                              
switch($_GET['page']){

 // Bahan
 case "bahan";
 include "modul/bahan/index.php";
 break;

 case "addbahan";
 include "modul/bahan/add.php";
 break;

 case "editbahan";
 include "modul/bahan/edit.php";
 break;

 //Produk
 case "produk";
 include "modul/produk/index.php";
 break;

 case "addproduk";
 include "modul/produk/add.php";
 break;

 case "editproduk";
 include "modul/produk/edit.php";
 break;

 //Produksi
 case "pembuatan";
 include "modul/produksi/index.php";
 break;

 case "addpembuatan";
 include "modul/produksi/add.php";
 break;

 case "editpembuatan";
 include "modul/produksi/edit.php";
 break;
 
 //Pekerja
 case "pekerja";
 include "modul/pekerja/index.php";
 break;

 case "addpekerja";
 include "modul/pekerja/add.php";
 break;

 case "editpekerja";
 include "modul/pekerja/edit.php";
 break;
 
 // Laporan
 case "laporan";
 include "modul/laporan/index.php";
 break;
 
 //Pengguna
 case "pengguna";
 include "modul/pengguna/index.php";
 break;

 case "addpengguna";
 include "modul/pengguna/add.php";
 break;

 case "editpengguna";
 include "modul/pengguna/edit.php";
 break;

 //Default
 case "beranda";
 include "template/home.php";
 break;

 default: 
 	include "template/home.php"; break;
}}else{

	echo "<script>window.location = 'beranda'</script>";
	/*
	$host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$extra = 'beranda';
	header("Location: http://$host$uri/$extra");
	*/

}

include "template/footer.php";

/*
$url   = $_SERVER['QUERY_STRING'];
$pecah = explode('-',$url);
$page  = $pecah[0];
$id	   = $pecah[1];

switch($page){		
	case 'bahan':
		include 'modul/bahan/index.php';
		break;
	
	default:
		include 'template/home.php';
		break;
}
*/

	
?>