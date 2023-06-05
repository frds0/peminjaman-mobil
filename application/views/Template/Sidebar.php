				<!-- Sidebar Menu -->
			<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               	<li class="nav-item">
		            <a href="<?php echo site_url('CTR_Login/logout')?>" class="nav-link text-danger">
		              <i class="nav-icon fas fa-sign-out-alt"></i>
		              <p>
		                <strong>Logout</strong>
		              </p>
		            </a>
		        </li>
               	<li class="nav-item">
						<a href="<?php echo site_url('CTR_User/index')?>" class="nav-link <?php if($this->uri->segment(1)=='CTR_User') echo 'active'?>">
						<i class="nav-icon fas fa-home"></i>
						<p>Dashboard</p>
						</a>
				</li>

				<li class="nav-header">TRANSAKSI</li>
		          <li class="nav-item">
		            <a href="<?php echo site_url('CTR_Permintaan/index')?>" class="nav-link <?php if($this->uri->segment(1)=='CTR_Permintaan') echo 'active'?>">
		              <i class="far fa-circle nav-icon"></i>
		              <p>Permintaan</p>
		            </a>
		          </li>
		          <li class="nav-item">
		            <a href="<?php echo site_url('CTR_Penyelesaian/index')?>" class="nav-link <?php if($this->uri->segment(1)=='CTR_Penyelesaian') echo 'active'?>">
		              <i class="far fa-circle nav-icon"></i>
		              <p>Penyelesaian</p>
		            </a>
		          </li>

			</nav>
				<!-- /.sidebar-menu -->
				</div>
				<!-- /.sidebar -->
				</aside>