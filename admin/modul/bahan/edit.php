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
			<li class="active">Edit Bahan</li>
		</ol>
		<!-- end:breadcrumb -->
		<div class="row" id="home-content">
			<div class="col-lg-12" >
				<h3 class="text-center" style="margin-bottom: 20px;">
                            PERUBAHAN DATA 
					<strong>BAHAN</strong>
				</h3>
				<?php
			           $kd = $_GET['kd'];
						$sql = mysqli_query($koneksi, "SELECT * FROM bahan WHERE kode_bahan='$kd'");
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
						<form name="form1" id="form1" class="form-horizontal row-fluid tasi-form" action="modul/bahan/model.php" method="POST" >
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Kode Bahan</label>
								<div class="col-sm-10">
									<input type="text" name="kode_bahan" id="kode_bahan" value="<?php echo $row['kode_bahan']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nama Bahan</label>
									<div class="col-sm-10">
										<input type="text" name="nama_bahan" id="nama_bahan" value="<?php echo $row['nama_bahan']; ?>" placeholder="Nama Bahan" class="form-control span8 tip" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Jenis Bahan</label>
										<div class="col-sm-10">
											<input name="jenis_bahan" id="jenis_bahan" value="<?php echo $row['jenis_bahan']; ?>" class="form-control span8 tip" type="text" placeholder="Tempat Lahir" required />
											</div>
										</div>
													<div class="form-group">
														<label class="col-sm-2 col-sm-2 control-label"></label>
														<div class="col-sm-10">
															<div class="control-group">
																<div class="controls">
																	<button type="submit" name="update" id="update" value="Update"  class="btn btn-drop btn-sm btn-primary">Update</button>
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

        
                                          
        


												
										
												
											
												
											
												
										
												