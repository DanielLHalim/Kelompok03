 
<!-- start:main -->
<div class="container">
    <div id="main">
        <!-- start:breadcrumb -->
        <ol class="breadcrumb">
            <li>
                <a href="beranda">Beranda</a>
            </li>
            <li>
                <a href="pembuatan">Produksi</a>
            </li>
            <li class="active">Tambah Produksi</li>
        </ol>
        <!-- end:breadcrumb -->
        <div class="row" id="home-content">
            <div class="col-lg-12" >
                <h3 class="text-center" style="margin-bottom: 20px;">
                            TAMBAH 
                    <strong>PRODUKSI</strong>
                </h3>
                <?php
                function tanggal($date){
                    // hasil post -> mm/dd/yyyy
                    $tahun = substr($date, 6, 4);
                    $bulan = substr($date, 0, 2);
                    $tgl   = substr($date, 3, 2);
                    $result = $tahun."-".$bulan."-".$tgl;     
                    return($result);
                }

                if(isset($_POST['input'])){
                $kode_produksi  = $_POST['kode_produksi'];
                $tanggal        = tanggal($_POST['tanggal']);
                $kode_produk    = $_POST['kode_produk'];
                $kode_pekerja   = $_POST['kode_pekerja'];
                $jumlah         = $_POST['jumlah'];
                $harga          = $_POST['harga'];

                
                
                $cek = mysqli_query($koneksi, "SELECT * FROM produksi WHERE kode_produksi='$kode_produksi'");
                if(mysqli_num_rows($cek) == 0){
                        $insert = mysqli_query($koneksi, "INSERT INTO produksi(kode_produksi, tanggal, kode_produk, kode_pekerja, jumlah, harga)
                VALUES('$kode_produksi','$tanggal', '$kode_produk', '$kode_pekerja', '$jumlah', '$harga')") or die(mysqli_error());
                        if($insert){
                            echo '
                <div class="alert alert-success alert-bordered alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Warning!</strong> Data produksi berhasil disimpan.
                </div>';
                        }else{
                            echo '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Produksi Gagal Di simpan !
                </div>';
                        }
                }else{
                    echo '
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Kode Produksi Sudah Ada..!
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
                        <form name="form1" id="form1" class="form-horizontal row-fluid tasi-form" action="addpembuatan" method="POST" >
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Kode Produksi</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kode_produksi" id="kode_produksi" placeholder="Kode Produksi" class="form-control span8 tip" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <div class="input-group date datepicker-me" data-provide="datepicker">
                                          <input type="text" class="form-control span8 tip" name="tanggal" id="tanggal" placeholder="dd/mm/yyyy"  required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                        </div>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Kode Produk</label>
                                        <div class="col-sm-10">
                                        <select name="kode_produk" id="kode_produk" class="form-control span8 tip" required>
                                        <option value="" disabled selected> -- Pilih Kode Produk --</option>
                                             <?php
                                          include 'config.php';
                                           $result = mysqli_query($koneksi, "SELECT * FROM produk");
                                                while ($row = mysqli_fetch_array ($result)) {
                                                echo "<option value=".$row['kode_produk'].">".$row['kode_produk']."</option>";
                                            }
                                            ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Kode Pekerja</label>
                                            <div class="col-sm-10">
                                             <select name="kode_pekerja" id="kode_pekerja" class="form-control span8 tip" required>
                                        <option value="" disabled selected> -- Pilih Kode Pekerja --</option>
                                             <?php
                                          include 'config.php';
                                           $result = mysqli_query($koneksi, "SELECT * FROM pekerja");
                                                while ($row = mysqli_fetch_array ($result)) {
                                                echo "<option value=".$row['kode_pekerja'].">".$row['kode_pekerja']."</option>";
                                            }
                                            ?>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
                                            <div class="col-sm-10">
                                                <input name="jumlah" id="jumlah" class=" form-control span8 tip" type="text" placeholder="Jumlah" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Harga</label>
                                            <div class="col-sm-10">
                                                <input name="harga" id="harga" class=" form-control span8 tip" type="text" placeholder="Harga" required />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label"></label>
                                            <div class="col-sm-10">
                                                <div class="control-group">
                                                    <div class="controls">
                                                        <button type="submit" name="input" id="input" class="btn btn-drop btn-sm btn-primary">Simpan</button>
                                                        <a href="pembuatan" class="btn btn-drop btn-sm btn-danger">Kembali</a>
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



        
                                          
    