<?php

include "../../config.php";

if(isset($_POST['update'])){
						$kode_produk	       = $_POST['kode_produk'];
						$nama_produk		   = $_POST['nama_produk'];
						$unit  = $_POST['unit'];
						$kode_bahan = $_POST['kode_bahan'];
						
						$update = mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama_produk', unit='$unit', kode_bahan='$kode_bahan' WHERE kode_produk='$kode_produk'") or die(mysqli_error());
						if($update){
							echo "
<script>alert('Data Produk Berhasil di Update!'); window.location = '../../produk'</script>";
						}else{
							echo "
<script>alert('Data Produk Gagal di Update!'); window.location = '../../produk'</script>";
						}
					} else {
// mendapatkan request get/post global
$requestData= $_REQUEST;

$columns = array( 
// kolom index database tabel 
	0 => 'kode_produk',
    1 => 'nama_produk', 
	2 => 'unit',
	3 => 'kode_bahan'
);

// mendapatkan total data tanpa pencarian
$sql = "SELECT kode_produk, nama_produk, unit, kode_bahan ";
$sql.=" FROM produk";
$query=mysqli_query($koneksi, $sql) or die("model.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  
// when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT kode_produk, nama_produk, unit, kode_bahan ";
	$sql.=" FROM produk";
	$sql.=" WHERE nama_produk LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR unit LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR kode_bahan LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO");
	$totalFiltered = mysqli_num_rows($query); 
	// when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 

	// $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.

	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO"); 
	// again run query with limit
	
} else {	

	$sql = "SELECT kode_produk, nama_produk, unit, kode_bahan ";
	$sql.=" FROM produk";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["kode_produk"];
    $nestedData[] = $row["nama_produk"];
	$nestedData[] = $row["unit"];
	$nestedData[] = $row["kode_bahan"];
    $nestedData[] = '
<td>
	<center>
		<a href="index.php?page=editproduk&hal=edit&kd='.$row['kode_produk'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning">
			<i class="fa fa-pencil-square-o aria-hidden="true""></i>
		</a>
		<a href="index.php?page=produk&hal=hapus&kd='.$row['kode_produk'].'"  data-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger">
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
