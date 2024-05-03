<?php



include "../../config.php";

if(isset($_POST['update'])){
						$nama_produk	       = $_POST['nama_produk'];
						$nama		   = $_POST['nama'];
						$tempat_lahir  = $_POST['tempat_lahir'];
						$tanggal_lahir = $_POST['tanggal_lahir'];
						$alamat        = $_POST['alamat'];
		                $notelp        = $_POST['notelp'];
						
						$update = mysqli_query($koneksi, "UPDATE data SET nama='$nama', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', notelp='$notelp' WHERE nama_produk='$nama_produk'") or die(mysqli_error());
						if($update){
							echo "
<script>alert('Data Berhasil di Update!'); window.location = 'laporan'</script>";
						}else{
							echo "
<script>alert('Data Gagal di Update!'); window.location = 'laporan'</script>";
						}
					} else {
// mendapatkan request get/post global
$requestData= $_REQUEST;

$columns = array( 
// kolom index database tabel 
	0 => 'nama_produk',
    1 => 'jenis_bahan', 
	2 => 'nama_bahan',
	3 => 'tanggal',
    4 => 'harga',
    5 => 'jumlah'  
);

// mendapatkan total data tanpa pencarian
$sql = "SELECT produk.nama_produk, bahan.jenis_bahan, bahan.nama_bahan, produksi.tanggal, produksi.harga, produksi.jumlah ";
$sql.=" FROM produksi JOIN produk on produksi.kode_produk = produk.kode_produk JOIN bahan on produk.kode_bahan = bahan.kode_bahan";
$query=mysqli_query($koneksi, $sql) or die("model.php: get InventoryItems");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  
// when there is no search parameter then total number rows = total number filtered rows.


if( !empty($requestData['search']['value']) ) {
	// if there is a search parameter
	$sql = "SELECT produk.nama_produk, bahan.jenis_bahan, bahan.nama_bahan, produksi.tanggal, produksi.harga, produksi.jumlah";
	$sql.=" FROM produksi JOIN produk on produksi.kode_produk = produk.kode_produk JOIN bahan on produk.kode_bahan = bahan.kode_bahan";
	$sql.=" WHERE nama_produk LIKE '".$requestData['search']['value']."%' ";// $requestData['search']['value'] contains search parameter
	$sql.=" OR jenis_bahan LIKE '".$requestData['search']['value']."%' ";
	$sql.=" OR nama_bahan LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR tanggal LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR harga LIKE '".$requestData['search']['value']."%' ";
    $sql.=" OR jumlah LIKE '".$requestData['search']['value']."%' ";
	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO");
	$totalFiltered = mysqli_num_rows($query); 
	// when there is a search parameter then we have to modify total number filtered rows as per search result without limit in the query 

	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   "; 

	// $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc , $requestData['start'] contains start row number ,$requestData['length'] contains limit length.

	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO"); 
	// again run query with limit
	
} else {	

	$sql = "SELECT produk.nama_produk, bahan.jenis_bahan, bahan.nama_bahan, produksi.tanggal, produksi.harga, produksi.jumlah ";
	$sql.=" FROM produksi JOIN produk on produksi.kode_produk = produk.kode_produk JOIN bahan on produk.kode_bahan = bahan.kode_bahan";
	$sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."   LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
	$query=mysqli_query($koneksi, $sql) or die("model.php: get PO");
	
}

$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $row["nama_produk"];
    $nestedData[] = $row["jenis_bahan"];
	$nestedData[] = $row["nama_bahan"];
	$nestedData[] = $row["tanggal"];
    $nestedData[] = $row["harga"];
    $nestedData[] = $row["jumlah"];
   
	
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
