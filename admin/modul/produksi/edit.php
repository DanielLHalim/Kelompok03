 
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
			<li class="active">Edit Produksi</li>
		</ol>
		<!-- end:breadcrumb -->
		<div class="row" id="home-content">
			<div class="col-lg-12" >
				<h3 class="text-center" style="margin-bottom: 20px;">
                            PERUBAHAN DATA <strong>PRODUKSI</strong>
				</h3>
				<?php
			           $kd = $_GET['kd'];
						$sql = mysqli_query($koneksi, "SELECT * FROM produksi WHERE kode_produksi='$kd'");
						if(mysqli_num_rows($sql) == 0){
							header("Location: index.php");
						}else{
							$row = mysqli_fetch_assoc($sql);
						}

						?>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
					<header class="panel-heading"></header>
					<div class="panel-body">
						<form name="form1" id="form1" class="form-horizontal row-fluid tasi-form" action="modul/produksi/model.php" method="POST" >
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Kode Produksi</label>
								<div class="col-sm-10">
									<input type="text" name="kode_produksi" id="kode_produksi" value="<?php echo $row['kode_produksi']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label"a>Tanggal</label>
									<div class="col-sm-10">
										<input type="text" name="tanggal" id="tanggal" value="<?php echo $row['tanggal']; ?>" placeholder="Tanggal" class="form-control span8 tip" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Kode Produk</label>
										<div class="col-sm-10">
											<input name="kode_produk" id="kode_produk" value="<?php echo $row['kode_produk']; ?>" class="form-control span8 tip" type="text" placeholder="Kode Produk" required />
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-2 col-sm-2 control-label">Kode Pekerja</label>
											<div class="col-sm-10">
												<input name="kode_pekerja" id="kode_pekerja" value="<?php echo $row['kode_pekerja']; ?>" class="form-control span8 tip" type="text" placeholder="Kode Pekerja" required />
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-2 col-sm-2 control-label">Jumlah</label>
												<div class="col-sm-10">
													<input name="jumlah" id="jumlah" value="<?php echo $row['jumlah']; ?>" class="form-control span8 tip" type="text" placeholder="Jumlah" required />
													</div>
												</div>
												<div class="form-group">
													<label class="col-sm-2 col-sm-2 control-label">Harga</label>
													<div class="col-sm-10">
														<input name="harga" id="harga" value="<?php echo $row['harga']; ?>" class=" form-control span8 tip" type="text" placeholder="Harga" required />
														</div>
													</div>
													<div class="form-group">
														<label class="col-sm-2 col-sm-2 control-label"></label>
														<div class="col-sm-10">
															<div class="control-group">
																<div class="controls">
																	<button type="submit" name="update" id="update" value="Update"  class="btn btn-drop btn-sm btn-primary">Update</button>
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



        
                                          
        


												
										
												
											
												
											
												
										
												