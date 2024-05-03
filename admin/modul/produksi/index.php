 
<!-- awal:main -->
<div class="container">
  <div id="main">
    <!-- awal:breadcrumb -->
    <ol class="breadcrumb">
      <li>
        <a href="beranda">Beranda</a>
      </li>
      <li class="active">Produksi</li>
    </ol>
    <!-- akhir:breadcrumb -->
    <div class="row" id="home-content">
      <div class="col-lg-12" >
        <h3 class="text-center" style="margin-bottom: 20px;">
              DATA <strong>PRODUKSI</strong>
          <div class="pull-right">
            <a href="addpembuatan" class="btn btn-drop btn-sm btn-primary">Tambah Data</a>
          </div>
        </h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <section class="panel">
          <header class="panel-heading"></header>
          <div class="panel-body">
            <!-- informasi alert-->
            <?php
                   include "config.php";

                    if(isset($_GET['hal']) == 'hapus'){
                      $kd_dept = $_GET['kd'];
                      $cek = mysqli_query($koneksi, "SELECT * FROM produksi WHERE kode_produksi='$kd_dept'");
                      if(mysqli_num_rows($cek) == 0){
                        echo '
                        
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data produksi tidak ditemukan.
            </div>';
                      }else{
                        $delete = mysqli_query($koneksi, "DELETE FROM produksi WHERE kode_produksi='$kd_dept'");
                        if($delete){
                          echo '
                          
            <div class="alert alert-success alert-bordered alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                <i class="fa fa-times"></i>
              </button>
              <strong>Warning!</strong> Data produksi berhasil dihapus.
            </div>';
                        }else{
                          echo '
            <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data produksi gagal dihapus.
            </div>';
                        }
                      }
                    }
                    ?>
            <table id="lookup" class="table table-bordered table-hover table-responsive">
              <thead bgcolor="#eeeeee" align="center" >
                <tr>
                  <th>Kode Produksi</th>
                  <th>Tanggal</th>
                  <th>Kode Produk</th>
                  <th>Kode Pekerja</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
<!-- akhir:main -->
    