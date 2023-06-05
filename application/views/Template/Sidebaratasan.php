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
							<a href="<?php echo site_url('CTR_Atasan/index') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'CTR_Atasan') echo 'active' ?>">
								<i class="nav-icon fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<!-- 
						<li class="nav-header">PERSONAL</li>
						<li class="nav-item">
							<a href="<?php echo site_url('CTR_ATPermintaan/index') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'CTR_ATPermintaan') echo 'active' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Permintaan</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('CTR_ATPenyelesaian/index') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'CTR_ATPenyelesaian') echo 'active' ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Penyelesaian</p>
							</a>
						</li>

						<li class="nav-header">NON PERSONAL</li> -->
						<li class="nav-item">
							<a href="<?php echo site_url('CTR_ATApproved/index') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'CTR_ATApproved') echo 'active' ?>">
								<i class="nav-icon fas fa-check-double"></i>
								<p>Approved</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo site_url('CTR_ATLaporan/index') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'CTR_ATLaporan') echo 'active' ?>">
								<i class="nav-icon fas fa-chart-line"></i>
								<p>Laporan</p>
							</a>
						</li>

				</nav>
				<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
				</aside>