<?php

include "../../config.php";


if(isset($_POST['update'])){
						$kode_bahan  = $_POST['kode_bahan'];
						$nama_bahan  = $_POST['nama_bahan'];
						$jenis_bahan  = $_POST['jenis_bahan'];
					
						$update = mysqli_query($koneksi, " UPDATE bahan SET nama_bahan='
							$nama_bahan', jenis_bahan='$jenis_bahan' WHERE kode_bahan='$kode_bahan'") or die(mysqli_error());
						if($update){
							echo "
<script>alert('Data Bahan Berhasil di Update!'); window.location = '../../bahan'</script>";
						}else{
							echo "
<script>alert('Data Bahan Gagal di Update!'); window.location = '../../bahan'</script>";
						}
					} else {
// mendapatkan request get/post global
$requestData= $_REQUEST;

$columns = array( 
// kolom index database tabel 
	0 => 'kode_bahan',
    1 => 'nama_bahan', 
	2 => 'jenis_bahan'
);

// mendapatkan total data tanpa pencarian
$sql = "SELECT kode_bahan, nama_bahan, jenis_bahan ";
$sql.=" FROM bahan";
$query=mysqli_query($koneksi, $sql) or die("model.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  
// when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT kode_bahan, nama_bahan, jenis_bahan";
	$sql.=" FROM bahan";
	$sql.=" WHERE nama_bahan LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR jenis_bahan LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO");
	$totalFiltered = mysqli_num_rows($query); 
	// when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 

	// $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.

	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO"); 
	// again run query with limit
	
} else {	

	$sql = "SELECT kode_bahan, nama_bahan, jenis_bahan";
	$sql.=" FROM bahan";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["kode_bahan"];
    $nestedData[] = $row["nama_bahan"];
	$nestedData[] = $row["jenis_bahan"];
    $nestedData[] = '
<td>
	<center>
		<a href="index.php?page=editbahan&hal=edit&kd='.$row['kode_bahan'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning">
			<i class="fa fa-pencil-square-o aria-hidden="true""></i>
		</a>
		<a href="index.php?page=bahan&hal=hapus&kd='.$row['kode_bahan'].'"  data-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger">
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
