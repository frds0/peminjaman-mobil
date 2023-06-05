				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
						<li class="nav-item">
							<a href="<?php echo site_url('CTR_Login/logout') ?>" class="nav-link text-danger">
								<i class="nav-icon fas fa-sign-out-alt"></i>
								<p>
									<strong>Logout</strong>
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('CTR_Admin/index') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'CTR_Admin') echo 'active' ?>">
								<i class="nav-icon fas fa-home"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>

						<li class="nav-header">DATA MASTER</li>
						<li class="nav-item">
							<a href="<?php echo site_url('CTR_Pengguna/index') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'CTR_Pengguna') echo 'active' ?>">
								<i class="nav-icon fa fa-users"></i>
								<p>Data Pengguna</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('CTR_Mobil/index') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'CTR_Mobil') echo 'active' ?>">
								<i class="nav-icon fa fa-car"></i>
								<p>Data Mobil</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('CTR_Driver/index') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'CTR_Driver') echo 'active' ?>">
								<i class="nav-icon fas fa-id-card"></i>
								<p>Data Driver</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('CTR_Emoney/index') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'CTR_Emoney') echo 'active' ?>">
								<i class="nav-icon fas fa-credit-card"></i>
								<p>Data E-Money</p>
							</a>
						</li>

						<li class="nav-header">TRANSAKSI</li>
						<li class="nav-item">
							<a href="<?php echo site_url('CTR_APermintaan/index') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'CTR_APermintaan') echo 'active' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Permintaan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('CTR_APenyelesaian/index') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'CTR_APenyelesaian') echo 'active' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Penyelesaian</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?php echo site_url('CTR_ALaporan/index') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'CTR_ALaporan') echo 'active' ?>">
								<i class="nav-icon fas fa-chart-line"></i>
								<p>Laporan</p>
							</a>
						</li>
				</nav>
				<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
				</aside>