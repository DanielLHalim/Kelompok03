<?php

include "../../config.php";

if(isset($_POST['update'])){
						$kode_produksi = $_POST['kode_produksi'];
						$tanggal	  = $_POST['tanggal'];
						$kode_produk  = $_POST['kode_produk'];
						$kode_pekerja = $_POST['kode_pekerja'];
						$jumlah       = $_POST['jumlah'];
		                $harga        = $_POST['harga'];
						
						$update = mysqli_query($koneksi, "UPDATE produksi SET tanggal='$tanggal', kode_produk='$kode_produk', kode_pekerja='$kode_pekerja', jumlah='$jumlah', harga='$harga' WHERE kode_produksi='$kode_produksi'") or die(mysqli_error());
						if($update){
							echo "
<script>alert('Data Berhasil di Update!'); window.location = '../../pembuatan'</script>";
						}else{
							echo "
<script>alert('Data Gagal di Update!'); window.location = '../../pembuatan'</script>";
						}
					} else {
// mendapatkan request get/post global
$requestData= $_REQUEST;

$columns = array( 
// kolom index database tabel 
	0 => 'kode_produksi',
    1 => 'tanggal', 
	2 => 'kode_produk',
	3 => 'kode_pekerja',
    4 => 'jumlah',
    5 => 'harga'  
);

// mendapatkan total data tanpa pencarian
$sql = "SELECT kode_produksi, tanggal, kode_produk, kode_pekerja, jumlah, harga ";
$sql.=" FROM produksi";
$query=mysqli_query($koneksi, $sql) or die("model.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  
// when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT kode_produksi, tanggal, kode_produk, kode_pekerja, jumlah, harga ";
	$sql.=" FROM produksi";
	$sql.=" WHERE tanggal LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR kode_produk LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR kode_pekerja LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR jumlah LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR harga LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO");
	$totalFiltered = mysqli_num_rows($query); 
	// when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 

	// $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.

	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO"); 
	// again run query with limit
	
} else {	

	$sql = "SELECT kode_produksi, tanggal, kode_produk, kode_pekerja, jumlah, harga ";
	$sql.=" FROM produksi";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO");
	
}

$data = array();


function tanggalid($date){
    // hasil post -> yyyy/mm/dd
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl   = substr($date, 8, 2);
    $result = $tgl."-".$bulan."-".$tahun;     
    return($result);
}
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["kode_produksi"];
    $nestedData[] = tanggalid($row["tanggal"]);
	$nestedData[] = $row["kode_produk"];
	$nestedData[] = $row["kode_pekerja"];
    $nestedData[] = $row["jumlah"];
    $nestedData[] = $row["harga"];
    $nestedData[] = '
<td>
	<center>
		<a href="index.php?page=editpembuatan&hal=edit&kd='.$row['kode_produksi'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning">
			<i class="fa fa-pencil-square-o aria-hidden="true""></i>
		</a>
		<a href="index.php?page=pembuatan&hal=hapus&kd='.$row['kode_produksi'].'"  data-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger">
			<i class="fa fa-trash" aria-hidden="true"></i>
		</a>
	</center>
</td>';	
	
	$data[] = $nestedData;
    
}

$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   
			// for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  
			// total number of records
			"recordsFiltered" => intval( $totalFiltered ), 
			// total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   
			// total data array
			);

echo json_encode($json_data);  
// send data as json format

}

?>
