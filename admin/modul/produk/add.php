 
<!-- start:main -->
<div class="container">
    <div id="main">
        <!-- start:breadcrumb -->
        <ol class="breadcrumb">
            <li>
                <a href="beranda">Beranda</a>
            </li>
            <li>
                <a href="produk">Produk</a>
            </li>
            <li class="active">Tambah Produk</li>
        </ol>
        <!-- end:breadcrumb -->
        <div class="row" id="home-content">
            <div class="col-lg-12" >
                <h3 class="text-center" style="margin-bottom: 20px;">
                            TAMBAH 
                    <strong>PRODUK</strong>
                </h3>
                <?php
            if(isset($_POST['input'])){
                $kode_produk   = $_POST['kode_produk'];
                $nama_produk   = $_POST['nama_produk'];
                $unit          = $_POST['unit'];
                $kode_bahan    = $_POST['kode_bahan'];

                $cek = mysqli_query($koneksi, "SELECT * FROM produk WHERE kode_produk='$kode_produk'");
                if(mysqli_num_rows($cek) == 0){
                        $insert = mysqli_query($koneksi, "INSERT INTO produk(kode_produk, nama_produk, unit, kode_bahan)
                                                            VALUES('$kode_produk','$nama_produk', '$unit', '$kode_bahan')") or die(mysqli_error());
                        if($insert){
                            echo '
                <div class="alert alert-success alert-bordered alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Warning!</strong> Data produk berhasil disimpan.
                </div>';
                        }else{
                            echo '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data produk Gagal Di simpan !
                </div>';
                        }
                }else{
                    echo '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kode Produk Sudah Ada..!
                </div>';
                }
            }
            ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading"></header>
                    <div class="panel-body">
                        <form name="form1" id="form1" class="form-horizontal row-fluid tasi-form" action="addproduk" method="POST" >
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Kode Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kode_produk" id="kode_produk" placeholder="Kode Produk" class="form-control span8 tip" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama Produk</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_produk" id="nama_produk" placeholder="Nama Produk" class="form-control span8 tip" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Unit</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="unit" id="unit" placeholder="Unit" class="form-control span8 tip" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Kode Bahan</label>
                                            <div class="col-sm-10">
                                             <select name="kode_bahan" id="kode_bahan" class="form-control span8 tip"  required>
                                        <option value="" disabled selected> -- Pilih Kode Bahan --</option>
                                             <?php
                                          include 'config.php';
                                           $result = mysqli_query($koneksi, "SELECT * FROM bahan");
                                                while ($row = mysqli_fetch_array ($result)) {
                                                echo "<option value=".$row['kode_bahan'].">".$row['kode_bahan']."</option>";
                                            }
                                            ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <button type="submit" name="input" id="input" class="btn btn-drop btn-sm btn-primary">Simpan</button>
                                                        <a href="produk" class="btn btn-drop btn-sm btn-danger">Kembali</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:main -->



        
                                          
    