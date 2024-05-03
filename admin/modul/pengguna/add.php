 
<!-- start:main -->
<div class="container">
    <div id="main">
        <!-- start:breadcrumb -->
        <ol class="breadcrumb">
            <li>
                <a href="index.php">Beranda</a>
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
                $nim           = $_POST['nim'];
                $nama          = $_POST['nama'];
                $tempat_lahir  = $_POST['tempat_lahir'];
                $tanggal_lahir = $_POST['tanggal_lahir'];
                $alamat        = $_POST['alamat'];
                $notelp        = $_POST['notelp'];
                
                $cek = mysqli_query($koneksi, "SELECT * FROM data WHERE nim='$nim'");
                if(mysqli_num_rows($cek) == 0){
                        $insert = mysqli_query($koneksi, "INSERT INTO data(nim, nama, tempat_lahir, tanggal_lahir, alamat, notelp)
                                                            VALUES('$nim','$nama', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$notelp')") or die(mysqli_error());
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
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>NIM Sudah Ada..!
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
                        <form name="form1" id="form1" class="form-horizontal row-fluid tasi-form" action="peker" method="POST" >
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">NIM</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nim" id="nim" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nama" id="nama" placeholder="Nama Mahasiswa" class="form-control span8 tip" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tempat Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" class="form-control span8 tip" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <input name="tanggal_lahir" id="tanggal_lahir" class="form-control span8 tip" type="text" placeholder="yyyy/mm/dd" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Alamat</label>
                                            <div class="col-sm-10">
                                                <input name="alamat" id="alamat" class=" form-control span8 tip" type="text" placeholder="Alamat" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">No Telepon</label>
                                            <div class="col-sm-10">
                                                <input name="notelp" id="notelp" class=" form-control span8 tip" type="text" placeholder="No Telepon" required />
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



        
                                          
    