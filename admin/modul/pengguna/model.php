<?php

include "../../config.php";

if(isset($_POST['update'])){
						$nim	       = $_POST['nim'];
						$nama		   = $_POST['nama'];
						$tempat_lahir  = $_POST['tempat_lahir'];
						$tanggal_lahir = $_POST['tanggal_lahir'];
						$alamat        = $_POST['alamat'];
		                $notelp        = $_POST['notelp'];
						
						$update = mysqli_query($koneksi, "UPDATE data SET nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', notelp='$notelp' WHERE nim='$nim'") or die(mysqli_error());
						if($update){
							echo "
<script>alert('Data Berhasil di Update!'); window.location = '../../index.php?page=pekerja'</script>";
						}else{
							echo "
<script>alert('Data Gagal di Update!'); window.location = '../../index.php?page=pekerja'</script>";
						}
					} else {
// mendapatkan request get/post global
$requestData= $_REQUEST;

$columns = array( 
// kolom index database tabel 
	0 => 'nim',
    1 => 'nama', 
	2 => 'tempat_lahir',
	3 => 'tanggal_lahir',
    4 => 'alamat',
    5 => 'notelp'  
);

// mendapatkan total data tanpa pencarian
$sql = "SELECT nim, nama, tempat_lahir, tanggal_lahir, alamat, notelp ";
$sql.=" FROM data";
$query=mysqli_query($koneksi, $sql) or die("model.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  
// when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT nim, nama, tempat_lahir, tanggal_lahir, alamat, notelp ";
	$sql.=" FROM data";
	$sql.=" WHERE nama LIKE '".$requestData['search']['value']."%' ";    // $requestData['search']['value'] contains search parameter
	$sql.=" OR tempat_lahir LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR tanggal_lahir LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR alamat LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR notelp LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO");
	$totalFiltered = mysqli_num_rows($query); 
	// when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 

	// $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.

	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO"); 
	// again run query with limit
	
} else {	

	$sql = "SELECT nim, nama, tempat_lahir, tanggal_lahir, alamat, notelp ";
	$sql.=" FROM data";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["nim"];
    $nestedData[] = $row["nama"];
	$nestedData[] = $row["tempat_lahir"];
	$nestedData[] = $row["tanggal_lahir"];
    $nestedData[] = $row["alamat"];
    $nestedData[] = $row["notelp"];
    $nestedData[] = '
<td>
	<center>
		<a href="index.php?page=edit&hal=edit&kd='.$row['nim'].'"  data-toggle="tooltip" title="Edit" class="btn btn-sm btn-warning">
			<i class="fa fa-pencil-square-o aria-hidden="true""></i>
		</a>
		<a href="index.php?page=pekerja&hal=hapus&kd='.$row['nim'].'"  data-toggle="tooltip" title="Hapus" class="btn btn-sm btn-danger">
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
