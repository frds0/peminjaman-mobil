		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">

			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0"><b>Dashboard Admin</b></h1>
						</div><!-- /.col -->
						<!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<h3 class="text-black"><strong>Total Data Mobil, Data Supir, Data Pengguna</strong></h3>
					<div class="row">
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-info">
								<div class="inner">
									<h3><?php echo $total_mobil; ?></h3>

									<p>Mobil</p>
								</div>
								<div class="icon">
									<i class="fa fa-car"></i>
								</div>
								<a href="<?php echo site_url('CTR_Mobil/index') ?>" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-success">
								<div class="inner">
									<h3><?php echo $total_driver; ?></h3>

									<p>Supir</p>
								</div>
								<div class="icon">
									<i class="fa fa-id-card"></i>
								</div>
								<a href="<?php echo site_url('CTR_Driver/index') ?>" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-warning">
								<div class="inner">
									<h3><?php echo $useraktif; ?></h3>

									<p>Pengguna</p>
								</div>
								<div class="icon">
									<i class="fa fa-users"></i>
								</div>
								<a href="#" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
					</div>
					<br>
					<h3 class="text-black"><strong>Data Mobil Berdasarkan Kondisi</strong></h3>
					<div class="row">
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-info">
								<div class="inner">
									<h3><?php echo $mobiltersedia; ?></h3>

									<p>Mobil Tersedia</p>
								</div>
								<div class="icon">
									<i class="fa fa-check"></i>
								</div>
								<a href="<?php echo site_url('CTR_Mobil/index') ?>" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-success">
								<div class="inner">
									<h3><?php echo $mobildipesan; ?></h3>

									<p>Mobil Di Pesan</p>
								</div>
								<div class="icon">
									<i class="fa fa-times"></i>
								</div>
								<a href="<?php echo site_url('CTR_Mobil/index') ?>" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-danger">
								<div class="inner">
									<h3><?php echo $mobilnonaktif; ?></h3>

									<p>Mobil Nonaktif</p>
								</div>
								<div class="icon">
									<i class="fa fa-ban"></i>
								</div>
								<a href="<?php echo site_url('CTR_Mobil/index') ?>" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
					</div>
					<br>
					<h3 class="text-black"><strong>Data Supir Berdasarkan Kondisi</strong></h3>
					<div class="row">
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-info">
								<div class="inner">
									<h3><?php echo $drivertersedia; ?></h3>

									<p>Supir Tersedia</p>
								</div>
								<div class="icon">
									<i class="fa fa-check"></i>
								</div>
								<a href="<?php echo site_url('CTR_Driver/index') ?>" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-success">
								<div class="inner">
									<h3><?php echo $driverdipesan; ?></h3>

									<p>Supir Di Pesan</p>
								</div>
								<div class="icon">
									<i class="fa fa-times"></i>
								</div>
								<a href="<?php echo site_url('CTR_Driver/index') ?>" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-danger">
								<div class="inner">
									<h3><?php echo $drivernonaktif; ?></h3>

									<p>Supir Nonaktif</p>
								</div>
								<div class="icon">
									<i class="fa fa-ban"></i>
								</div>
								<a href="<?php echo site_url('CTR_Driver/index') ?>" class="small-box-footer">Info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
					</div>
					<br>
					<h3 class="text-black"><strong>Data User Berdasarkan Peminjaman Mobil</strong></h3>
					<div class="row">
						<?php foreach ($rekapPermintaan as $row) { ?>
							<div class="col-lg-3 col-6">
								<div class="small-box bg-warning">
									<div class="inner">
										<h3><?php echo $row->count_permintaan; ?></h3>
										<p>Departemen <?php echo $row->dept_show; ?></p>
									</div>
									<div class="icon">
										<i class="fa fa-users"></i>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
					<!-- /.row (main row) -->
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>