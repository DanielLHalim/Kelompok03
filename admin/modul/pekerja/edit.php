 
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
			<li class="active">Edit Pekerja</li>
		</ol>
		<!-- end:breadcrumb -->
		<div class="row" id="home-content">
			<div class="col-lg-12" >
				<h3 class="text-center" style="margin-bottom: 20px;">
                            PERUBAHAN DATA 
					<strong>PEKERJA</strong>
				</h3>
				<?php
			           $kd = $_GET['kd'];
						$sql = mysqli_query($koneksi, "SELECT * FROM pekerja WHERE kode_pekerja='$kd'");
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
						<form name="form1" id="form1" class="form-horizontal row-fluid tasi-form" action="modul/pekerja/model.php" method="POST" >
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label">Kode Pekerja</label>
								<div class="col-sm-10">
									<input type="text" name="kode_pekerja" id="kode_pekerja" value="<?php echo $row['kode_pekerja']; ?>" placeholder="Tidak perlu di isi" class="form-control span8 tip" readonly="readonly">
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label">Nama Tim</label>
									<div class="col-sm-10">
										<input type="text" name="nama_tim" id="nama_tim" value="<?php echo $row['nama_tim']; ?>" placeholder="nama_tim Mahasiswa" class="form-control span8 tip" required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 col-sm-2 control-label">Jumlah Pekerja</label>
										<div class="col-sm-10">
											<input name="jumlah_pekerja" id="jumlah_pekerja" value="<?php echo $row['jumlah_pekerja']; ?>" class="form-control span8 tip" type="text" placeholder="Tempat Lahir" required />
											</div>
										</div>
													<div class="form-group">
														<label class="col-sm-2 col-sm-2 control-label"></label>
														<div class="col-sm-10">
															<div class="control-group">
																<div class="controls">
																	<button type="submit" name="update" id="update" value="Update"  class="btn btn-drop btn-sm btn-primary">Update</button>
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



        
                                          
        


												
										
												
											
												
											
												
										
												