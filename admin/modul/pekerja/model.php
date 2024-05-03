<?php

include "../../config.php";

if(isset($_POST['update'])){
						$kode_pekerja  = $_POST['kode_pekerja'];
						$nama_tim	   = $_POST['nama_tim'];
						$jumlah_pekerja  = $_POST['jumlah_pekerja'];
					
						
						$update = mysqli_query($koneksi, "UPDATE pekerja SET nama_tim='$nama_tim', jumlah_pekerja='$jumlah_pekerja' WHERE kode_pekerja='$kode_pekerja'") or die(mysqli_error());
						if($update){
							echo "
<script>alert('Data Berhasil di Update!'); window.location = '../../pekerja'</script>";
						}else{
							echo "
<script>alert('Data Gagal di Update!'); window.location = '../../pekerja'</script>";
						}
					} else {
// mendapatkan request get/post global
$requestData= $_REQUEST;

$columns = array( 
// kolom index database tabel 
	0 => 'kode_pekerja',
    1 => 'nama_tim', 
	2 => 'jumlah_pekerja'
);

// mendapatkan total data tanpa pencarian
$sql = "SELECT kode_pekerja, nama_tim, jumlah_pekerja ";
$sql.=" FROM pekerja";
$query=mysqli_query($koneksi, $sql) or die("model.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  
// when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT kode_pekerja, nama_tim, jumlah_pekerja";
	$sql.=" FROM pekerja";
	$sql.=" WHERE nama_tim LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR jumlah_pekerja LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO");
	$totalFiltered = mysqli_num_rows($query); 
	// when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 

	// $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.

	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO"); 
	// again run query with limit
	
} else {	

	$sql = "SELECT kode_pekerja, nama_tim, jumlah_pekerja";
	$sql.=" FROM pekerja";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["kode_pekerja"];
    $nestedData[] = $row["nama_tim"];
	$nestedData[] = $row["jumlah_pekerja"];
    $nestedData[] = '
<td>
	<center>
		<a href="index.php?page=editpekerja&hal=edit&kd='.$row['kode_pekerja'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning">
			<i class="fa fa-pencil-square-o aria-hidden="true""></i>
		</a>
		<a href="index.php?page=pekerja&hal=hapus&kd='.$row['kode_pekerja'].'"  data-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger">
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
