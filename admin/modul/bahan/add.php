 
<!-- start:main -->
<div class="container">
    <div id="main">
        <!-- start:breadcrumb -->
        <ol class="breadcrumb">
            <li>
                <a href="beranda">Beranda</a>
            </li>
            <li>
                <a href="bahan">Bahan</a>
            </li>
            <li class="active">Tambah Bahan</li>
        </ol>
        <!-- end:breadcrumb -->
        <div class="row" id="home-content">
            <div class="col-lg-12" >
                <h3 class="text-center" style="margin-bottom: 20px;">
                            TAMBAH 
                    <strong>BAHAN</strong>
                </h3>
                <?php
            if(isset($_POST['input'])){
                $kode_bahan    = $_POST['kode_bahan'];
                $nama_bahan        = $_POST['nama_bahan'];
                $jenis_bahan   = $_POST['jenis_bahan'];
                
                $cek = mysqli_query($koneksi, "SELECT * FROM bahan WHERE kode_bahan='$kode_bahan'");
                if(mysqli_num_rows($cek) == 0){
                        $insert = mysqli_query($koneksi, "INSERT INTO bahan (kode_bahan, nama_bahan, jenis_bahan)
                                                            VALUES('$kode_bahan','$nama_bahan', '$jenis_bahan')") or die(mysqli_error());
                        if($insert){
                            echo '
                <div class="alert alert-success alert-bordered alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Warning!</strong> Data bahan berhasil disimpan.
                </div>';
                        }else{
                            echo '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data bahan Gagal Di simpan !
                </div>';
                        }
                }else{
                    echo '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kode bahan Sudah Ada..!
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
                        <form name="form1" id="form1" class="form-horizontal row-fluid tasi-form" action="addbahan" method="POST" >
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Kode Bahan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kode_bahan" id="kode_bahan" placeholder="Kode Bahan" class="form-control span8 tip" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama Bahan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_bahan" id="nama_bahan" placeholder="Nama Bahan" class="form-control span8 tip" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Jenis Bahan</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="jenis_bahan" id="jenis_bahan" placeholder="Jenis Bahan" class="form-control span8 tip" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <button type="submit" name="input" id="input" class="btn btn-drop btn-sm btn-primary">Simpan</button>
                                                        <a href="bahan" class="btn btn-drop btn-sm btn-danger">Kembali</a>
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



        
                                          
    