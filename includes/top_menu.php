<?php
	$hitung = new check_proses;
	$total_perkara_baru = count($hitung->hitung_perkara_baru($UserID));
	$total_perkara_lama = count($hitung->hitung_perkara_lama($UserID));
?>
<nav class="navbar navbar-expand navbar-light bg-white" style="height: 50px;">
    <a class="sidebar-toggle d-flex mr-2">
        <i class="hamburger align-self-center"></i>
    </a>

    <div class="navbar-collapse collapse">
        <ul class="navbar-nav ml-auto">
			<?php 
				if ($UserLevelID == '3') {
			?>
            <li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-toggle="dropdown">
                    <div class="position-relative">
                        <i class="align-middle" data-feather="message-circle"></i>
                        <span class="indicator">!</span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right py-0" aria-labelledby="messagesDropdown">
                    <div class="dropdown-menu-header">
                        <div class="position-relative">
                            Belum Ada Berkas: <?php echo $total_perkara_baru;?> Perkara
                        </div>
                    </div>
                    <div class="list-group">
                        <?php 
							$detail = new check_proses;
							foreach ($detail->hitung_perkara_baru($UserID) as $row) {
						?>
                        <a href="/index.php?page=proses&perkara=<?php echo $row['PerkaraID'];?>&pid=<?php echo $row['ProsesID'];?>" class="list-group-item">
                            <div class="row no-gutters align-items-center">
                                <div class="col-12 pl-2">
                                    <div class="text-dark"><?php echo $row['PerkaraID'];?></div>
                                </div>
                            </div>
                        </a>
                        <?php
							}
						?>
                    </div>

                    <div class="dropdown-menu-header">
                        <div class="position-relative">
                            Berkas Belum Selesai: <?php echo $total_perkara_lama;?> Perkara
                        </div>
                    </div>
					<div class="list-group">
                    	<?php 
							$detail = new check_proses;
							foreach ($detail->hitung_perkara_lama($UserID) as $row) {
						?>
                    
                        <a href="/index.php?page=proses&perkara=<?php echo $row['PerkaraID'];?>&pid=<?php echo $row['ProsesID'];?>" class="list-group-item">
                            <div class="row no-gutters align-items-center">
                                <div class="col-12 pl-2">
                                    <div class="text-dark"><?php echo $row['PerkaraID'];?></div>
                                </div>
                            </div>
                        </a>
                        <?php
							}
						?>
                    </div>
                    <div class="dropdown-menu-footer">
                        <a href="/index.php?page=proses" class="text-muted">Lihat Semua Perkara</a>
                    </div>
                </div>
            </li>
            <?php
				}
			?>
			<li class="nav-item dropdown">
                <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-toggle="dropdown">
                    <i class="align-middle" data-feather="settings"></i>
                </a>

                <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-toggle="dropdown">
                    <img src="<?php echo $site_url;?>/images/avatars/user-login.jpg" class="avatar img-fluid rounded-circle mr-1" alt="<?php echo $Username;?>"> <span
                        class="text-dark"><?php echo $Username;?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="/index.php?page=profile"><i class="align-middle mr-1" data-feather="user"></i> Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout.php">Keluar</a>
                </div>
            </li>
        </ul>
    </div>
</nav>