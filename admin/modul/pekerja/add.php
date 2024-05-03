 
<!-- start:main -->
<div class="container">
    <div id="main">
        <!-- start:breadcrumb -->
        <ol class="breadcrumb">
            <li>
                <a href="beranda">Beranda</a>
            </li>
            <li>
                <a href="pekerja">Pekerja</a>
            </li>
            <li class="active">Tambah Pekerja</li>
        </ol>
        <!-- end:breadcrumb -->
        <div class="row" id="home-content">
            <div class="col-lg-12" >
                <h3 class="text-center" style="margin-bottom: 20px;">
                            TAMBAH 
                    <strong>PEKERJA</strong>
                </h3>
                <?php
            if(isset($_POST['input'])){
                $kode_pekerja     = $_POST['kode_pekerja'];
                $nama_tim         = $_POST['nama_tim'];
                $jumlah_pekerja   = $_POST['jumlah_pekerja'];
                
                $cek = mysqli_query($koneksi, "SELECT * FROM pekerja WHERE kode_pekerja='$kode_pekerja'");
                if(mysqli_num_rows($cek) == 0){
                        $insert = mysqli_query($koneksi, "INSERT INTO pekerja(kode_pekerja, nama_tim, jumlah_pekerja)
                                                            VALUES('$kode_pekerja','$nama_tim', '$jumlah_pekerja')") or die(mysqli_error());
                        if($insert){
                            echo '
                <div class="alert alert-success alert-bordered alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Warning!</strong> Data berhasil disimpan.
                </div>';
                        }else{
                            echo '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !
                </div>';
                        }
                }else{
                    echo '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>kode_pekerja Sudah Ada..!
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
                        <form name="form1" id="form1" class="form-horizontal row-fluid tasi-form" action="addpekerja" method="POST" >
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Kode Pekerja</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kode_pekerja" id="kode_pekerja" placeholder="Kode Pekerja" class="form-control span8 tip" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama Tim</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama_tim" id="nama_tim" placeholder="Nama Tim" class="form-control span8 tip" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Jumlah Pekerja</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="jumlah_pekerja" id="jumlah_pekerja" placeholder="Jumlah Pekerja" class="form-control span8 tip" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <button type="submit" name="input" id="input" class="btn btn-drop btn-sm btn-primary">Simpan</button>
                                                        <a href="pekerja" class="btn btn-drop btn-sm btn-danger">Kembali</a>
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



        
                                          
    