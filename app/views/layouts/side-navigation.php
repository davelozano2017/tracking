<?php extract($data);?>
	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<div class="sidebar sidebar-light sidebar-main sidebar-expand-md">

			<!-- Sidebar mobile toggler -->
			<div class="sidebar-mobile-toggler text-center">
				<a href="#" class="sidebar-mobile-main-toggle">
					<i class="icon-arrow-left8"></i>
				</a>
				Navigation
				<a href="#" class="sidebar-mobile-expand">
					<i class="icon-screen-full"></i>
					<i class="icon-screen-normal"></i>
				</a>
			</div>
			<!-- /sidebar mobile toggler -->


			<!-- Sidebar content -->
			<div class="sidebar-content">

				<!-- User menu -->
				<div class="sidebar-user-material">
					<div class="sidebar-user-material-body">
						<div class="card-body text-center">
							<a href="#">
								<img src="https://vignette.wikia.nocookie.net/sims/images/3/33/John_Doe.png/revision/latest?cb=20131001222124" class="img-fluid rounded-circle shadow-1 mb-3" width="80" height="80" alt="">
							</a>
							<h6 class="mb-0 text-white text-shadow-dark"><?=$user[0]['name']?></h6>
						</div>
													
						<div class="sidebar-user-material-footer">
							<a href="#user-nav" class="d-flex justify-content-between align-items-center text-shadow-dark dropdown-toggle" data-toggle="collapse"><span>My Account</span></a>
						</div>
					</div>

					<div class="collapse" id="user-nav">
						<ul class="nav nav-sidebar">
							<?php if($_SESSION['role'] == 'Admin') { ?>
							<li class="nav-item">
								<a href="<?=site_url('admin/profile')?>" class="nav-link">
									<i class="icon-user-plus"></i>
									<span>Profile</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?=site_url('admin/logout')?>" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						<?php } elseif($_SESSION['role'] == 'Courier') { ?>
							<li class="nav-item">
								<a href="<?=site_url('courier/profile')?>" class="nav-link">
									<i class="icon-user-plus"></i>
									<span>Profile</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?=site_url('courier/logout')?>" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						<?php } elseif($_SESSION['role'] == 'Driver') { ?>
							<li class="nav-item">
								<a href="<?=site_url('driver/profile')?>" class="nav-link">
									<i class="icon-user-plus"></i>
									<span>Profile</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?=site_url('driver/logout')?>" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						<?php } elseif($_SESSION['role'] == 'Customer') { ?>
							<li class="nav-item">
								<a href="<?=site_url('customer/profile')?>" class="nav-link">
									<i class="icon-user-plus"></i>
									<span>Profile</span>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?=site_url('customer/logout')?>" class="nav-link">
									<i class="icon-switch2"></i>
									<span>Logout</span>
								</a>
							</li>
						<?php } ?>
						</ul>
					</div>
				</div>
				<!-- /user menu -->


				<!-- Main navigation -->
				<div class="card card-sidebar-mobile">
					<ul class="nav nav-sidebar" data-nav-type="accordion">
						<?php if($_SESSION['role'] == 'Admin') { ?> 
						<!-- Main -->
						<li class="nav-item">
							<a href="<?=site_url('admin/dashboard')?>" class="nav-link"><i class="icon-home5"></i><span>Dashboard</span></a>
						</li>
          
            <li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Transactions</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="<?=site_url('admin/transactions/all')?>" class="nav-link">All</a></li>
              <li class="nav-item"><a href="<?=site_url('admin/transactions/create')?>" class="nav-link">Create</a></li>
							</ul>
            </li>
            
            <li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-users"></i> <span>Users</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="<?=site_url('admin/users/all')?>" class="nav-link">All</a></li>
              <li class="nav-item"><a href="<?=site_url('admin/users/create')?>" class="nav-link">Create</a></li>
							</ul>
            </li>
            

            <li class="nav-item">
							<a href="<?=site_url('admin/reports')?>" class="nav-link"><i class="icon-graph"></i><span>Reports</span></a>
            </li>
            
            <li class="nav-item">
							<a href="<?=site_url('admin/settings')?>" class="nav-link"><i class="icon-gear"></i><span>Settings</span></a>
						</li>
						<!-- /main -->
						<?php } elseif($_SESSION['role'] == 'Courier') { ?>
							<!-- Main -->
						<li class="nav-item">
							<a href="<?=site_url('courier/dashboard')?>" class="nav-link"><i class="icon-home5"></i><span>Dashboard</span></a>
						</li>

						<li class="nav-item">
							<a href="<?=site_url('courier/transactions/all')?>" class="nav-link"><i class="icon-copy"></i><span>Transactions</span></a>
						</li>

						<li class="nav-item nav-item-submenu">
							<a href="#" class="nav-link"><i class="icon-users"></i> <span>Drivers</span></a>
							<ul class="nav nav-group-sub" data-submenu-title="Layouts">
								<li class="nav-item"><a href="<?=site_url('courier/drivers/all')?>" class="nav-link">All</a></li>
              <li class="nav-item"><a href="<?=site_url('courier/drivers/create')?>" class="nav-link">Create</a></li>
							</ul>
            </li>

						<li class="nav-item">
							<a href="<?=site_url('courier/dashboard')?>" class="nav-link"><i class="icon-graph"></i><span>Reports</span></a>
						</li>

					
						<!-- /main -->
						<?php } elseif($_SESSION['role'] == 'Driver') { ?>
							<li class="nav-item">
								<a href="<?=site_url('driver/dashboard')?>" class="nav-link"><i class="icon-home5"></i><span>Dashboard</span></a>
							</li>

							<li class="nav-item nav-item-submenu">
								<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Transactions</span></a>
								<ul class="nav nav-group-sub" data-submenu-title="Layouts">
									<li class="nav-item"><a href="<?=site_url('driver/transactions/all')?>" class="nav-link">All</a></li>
								</ul>
							</li>
						<?php } elseif($_SESSION['role'] == 'Customer') { ?>
							<li class="nav-item">
								<a href="<?=site_url('customer/dashboard')?>" class="nav-link"><i class="icon-home5"></i><span>Dashboard</span></a>
							</li>

							<li class="nav-item nav-item-submenu">
								<a href="#" class="nav-link"><i class="icon-copy"></i> <span>Transactions</span></a>
								<ul class="nav nav-group-sub" data-submenu-title="Layouts">
									<li class="nav-item"><a href="<?=site_url('customer/transactions/all')?>" class="nav-link">All</a></li>
								</ul>
							</li>
						<?php } ?>
				
					</ul>
				</div>
				<!-- /main navigation -->

			</div>
			<!-- /sidebar content -->
			
		</div>
		<!-- /main sidebar -->
