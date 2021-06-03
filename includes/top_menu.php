
<nav class="navbar navbar-expand navbar-light bg-white" style="height: 50px;">
	<a class="sidebar-toggle d-flex mr-2">
		<i class="hamburger align-self-center"></i>
	</a>

	<div class="navbar-collapse collapse">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item dropdown">
			</li>
			<li class="nav-item dropdown">
				<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
					<div class="position-relative">
						<i class="align-middle" data-feather="message-circle"></i>
						<span class="indicator">0</span>
					</div>
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
					<div class="dropdown-menu-header">
						<div class="position-relative">
							0 New Messages
						</div>
					</div>
					<div class="list-group">
						<!--
						<a href="#" class="list-group-item">
							<div class="row no-gutters align-items-center">
								<div class="col-2">
									<img src="<?php echo $site_url;?>/images/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Ashley Briggs">
								</div>
								<div class="col-10 pl-2">
									<div class="text-dark">Ashley Briggs</div>
									<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
									<div class="text-muted small mt-1">15m ago</div>
								</div>
							</div>
						</a>
						<a href="#" class="list-group-item">
							<div class="row no-gutters align-items-center">
								<div class="col-2">
									<img src="<?php echo $site_url;?>/images/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="Carl Jenkins">
								</div>
								<div class="col-10 pl-2">
									<div class="text-dark">Carl Jenkins</div>
									<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
									<div class="text-muted small mt-1">2h ago</div>
								</div>
							</div>
						</a>
						<a href="#" class="list-group-item">
							<div class="row no-gutters align-items-center">
								<div class="col-2">
									<img src="<?php echo $site_url;?>/images/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Stacie Hall">
								</div>
								<div class="col-10 pl-2">
									<div class="text-dark">Stacie Hall</div>
									<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
									<div class="text-muted small mt-1">4h ago</div>
								</div>
							</div>
						</a>
						<a href="#" class="list-group-item">
							<div class="row no-gutters align-items-center">
								<div class="col-2">
									<img src="<?php echo $site_url;?>/images/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Bertha Martin">
								</div>
								<div class="col-10 pl-2">
									<div class="text-dark">Bertha Martin</div>
									<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
									<div class="text-muted small mt-1">5h ago</div>
								</div>
							</div>
						</a>
						-->
					</div>
					<div class="dropdown-menu-footer">
						<a href="#" class="text-muted">Show all messages</a>
					</div>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
					<i class="align-middle" data-feather="settings"></i>
				</a>
				
				<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
					<img src="<?php echo $site_url;?>/images/avatars/user-login.jpg" class="avatar img-fluid rounded-circle mr-1" alt="<?php echo $Username;?>"> <span class="text-dark"><?php echo $Username;?></span>
				</a>
				<div class="dropdown-menu dropdown-menu-right">
					<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
					<a class="dropdown-item" href="#"><i class="align-middle mr-1" data-feather="pie-chart"></i> Analytics</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Settings & Privacy</a>
					<a class="dropdown-item" href="#">Help</a>
					<a class="dropdown-item" href="/logout.php">Sign out</a>
				</div>
			</li>
		</ul>
	</div>
</nav>
