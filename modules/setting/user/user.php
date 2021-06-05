<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <?php if ($UserLevel == '1' || $UserLevel == '2') {
                echo '
				    <button class="btn btn-primary float-right" href="" alt="Tambah User" title="Tambah User"
                    data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                    data-action="tambah" data-header="Tambah User" data-sub-header="" data-module="user"
                    data-submodule="" data-form="user" data-folder="setting" data-id=""
                    data-UserID="<?php echo $UserID;?>">Tambah User</button>
                    ';
                } else {

                }
                ?>
                <h1 class=" card-title">Daftar User</h1>
            </div>
            <div class="card-body">
                <table id="list-user" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">No</th>
                            <th class="text-center align-middle">Nama Lengkap</th>
                            <th class="text-center align-middle">Username</th>
                            <th class="text-center align-middle">Email</th>
                            <th class="text-center align-middle">No. Telp</th>
                            <th class="text-center align-middle">Level</th>
                            <th class="text-center align-middle">Status</th>
                            <th class="text-center align-middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
							$no = 1;
							
                            if ($UserLevel == '1' || $UserLevel == '2') {
                                $UserByLevel = '';
                            } else {
                                $UserByLevel = $UserID;
                            }
                            $user = new user_data();
 							foreach($user->user($UserByLevel) as $row){ 
								$id		        =	$row['UserID'];
								$Nama	        =	$row['Nama'];
								$Username		=	$row['Username'];
								$Email	        =	$row['Email'];
								$NoTelp     	=	$row['NoTelp'];
								$UserLevel		=	$row['UserLevel'];
                                $StatusID		=	$row['StatusID'];
                                $Status		    =	$row['Status'];
							?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $Nama;?></td>
                            <td><?php echo $Username;?></td>
                            <td><?php echo $Email;?></td>
                            <td><?php echo $NoTelp;?></td>
                            <td><?php echo $UserLevel;?></td>
                            <td>
                                <?php 
									if ($StatusID == '12') {
									echo '<span class="badge badge-warning">'.$Status.'</span>';
									}
									else if ($StatusID == '11') {
									echo '<span class="badge badge-success">'.$Status.'</span>';
									}
								?>
                            </td>
                            <td>
							<a class="align-middle text-center" href="" alt="Detail User"
                                    title="Detail User" data-target="#newModal" data-toggle="modal"
                                    data-backdrop="static" data-size="sm" data-action="lihat"
                                    data-header="Detail User"
                                    data-sub-header="" data-module="user"
                                    data-submodule="" data-form="user"
                                    data-folder="setting" data-id="<?php echo $id;?>"
                                    data-UserID="<?php echo $UserID;?>">
                                    <i class="align-middle" data-feather="zoom-in"></i>
                                </a>
                                <a class="align-middle text-center" href="" alt="Ubah User"
                                    title="Ubah User" data-target="#newModal" data-toggle="modal"
                                    data-backdrop="static" data-size="sm" data-action="ubah"
                                    data-header="Ubah User"
                                    data-sub-header="" data-module="user"
                                    data-submodule="" data-form="user"
                                    data-folder="setting" data-id="<?php echo $id;?>"
                                    data-UserID="<?php echo $UserID;?>">
                                    <i class="align-middle" data-feather="edit-3"></i>
                                </a>
                                <a class="align-middle text-center" href="" alt="Hapus User"
                                    title="Hapus User" data-target="#newModal" data-toggle="modal"
                                    data-backdrop="static" data-size="sm" data-action="hapus"
                                    data-header="Hapus User"
                                    data-sub-header="" data-module="user"
                                    data-submodule="" data-form="user"
                                    data-folder="setting" data-id="<?php echo $id;?>"
                                    data-UserID="<?php echo $UserID;?>">
                                    <i class="align-middle" data-feather="trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
							}
						?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>