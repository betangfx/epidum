<h1 class="h3 mb-3">Pengaturan</h1>
<div class="row">
    <div class="col-12">
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist" id="UserTab">
                <li class="nav-item"><a class="nav-link active" href="#Users" data-toggle="tab" role="tab">Pengguna</a></li>
                <li class="nav-item"><a class="nav-link" href="#Levels" data-toggle="tab" role="tab">Level</a>
                <li class="nav-item"><a class="nav-link" href="#Access" data-toggle="tab" role="tab">Hak Akses</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="Users" role="tabpanel">
                    <table id="Users_Data" class="table table-striped" style="width:100%">
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
                                $user = new user_data();
                                foreach($user->user('') as $row){ 
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
                                        data-submodule="login" data-form="user"
                                        data-folder="setting" data-id="<?php echo $id;?>"
                                        data-UserID="<?php echo $UserID;?>">
                                        <i class="align-middle" data-feather="zoom-in"></i>
                                    </a>
                                    <a class="align-middle text-center" href="" alt="Ubah User"
                                        title="Ubah User" data-target="#newModal" data-toggle="modal"
                                        data-backdrop="static" data-size="sm" data-action="ubah"
                                        data-header="Ubah User"
                                        data-sub-header="" data-module="user"
                                        data-submodule="login" data-form="user"
                                        data-folder="setting" data-id="<?php echo $id;?>"
                                        data-UserID="<?php echo $UserID;?>">
                                        <i class="align-middle" data-feather="edit-3"></i>
                                    </a>
                                    <a class="align-middle text-center" href="" alt="Hapus User"
                                        title="Hapus User" data-target="#newModal" data-toggle="modal"
                                        data-backdrop="static" data-size="sm" data-action="hapus"
                                        data-header="Hapus User"
                                        data-sub-header="" data-module="user"
                                        data-submodule="login" data-form="user"
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
                    <div class="row">
                        <div class="col-12 text-center">
                        <button class="btn btn-primary" href="" alt="Tambah User" title="Tambah User"
                        data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                        data-action="tambah" data-header="Tambah User" data-sub-header="" data-module="user"
                        data-submodule="login" data-form="user" data-folder="setting" data-id=""
                        data-UserID="<?php echo $UserID;?>">Tambah User</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="Levels" role="tabpanel">
                    <table id="Levels_Data" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">Level ID</th>
                                <th class="text-center align-middle">Level</th>
                                <th class="text-center align-middle">Status</th>
                                <th class="text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $user = new level_data();
                                foreach($user->level('') as $row){ 
                                    $UserLevelID    =	$row['UserLevelID'];
                                    $UserLevel		=	$row['UserLevel'];
                                    $StatusID       =	$row['StatusID'];
                                ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td class="text-center align-middle"><?php echo $UserLevelID;?></td>
                                <td><?php echo $UserLevel;?></td>
                                <td class="text-center align-middle">
                                    <?php 
                                        if ($StatusID == '12') {
                                            echo '<span class="badge badge-warning">'.$Status.'</span>';
                                        }
                                        else if ($StatusID == '11') {
                                            echo '<span class="badge badge-success">'.$Status.'</span>';
                                        }
                                    ?>
                                </td>
                                <td class="text-center align-middle">
                                <a class="align-middle text-center" href="" alt="Detail User"
                                        title="Detail User" data-target="#newModal" data-toggle="modal"
                                        data-backdrop="static" data-size="sm" data-action="lihat"
                                        data-header="Detail User"
                                        data-sub-header="" data-module="user"
                                        data-submodule="level" data-form="user"
                                        data-folder="setting" data-id="<?php echo $UserLevelID;?>"
                                        data-UserID="<?php echo $UserID;?>">
                                        <i class="align-middle" data-feather="zoom-in"></i>
                                    </a>
                                    <a class="align-middle text-center" href="" alt="Ubah User"
                                        title="Ubah User" data-target="#newModal" data-toggle="modal"
                                        data-backdrop="static" data-size="sm" data-action="ubah"
                                        data-header="Ubah User"
                                        data-sub-header="" data-module="user"
                                        data-submodule="level" data-form="user"
                                        data-folder="setting" data-id="<?php echo $UserLevelID;?>"
                                        data-UserID="<?php echo $UserID;?>">
                                        <i class="align-middle" data-feather="edit-3"></i>
                                    </a>
                                    <a class="align-middle text-center" href="" alt="Hapus User"
                                        title="Hapus User" data-target="#newModal" data-toggle="modal"
                                        data-backdrop="static" data-size="sm" data-action="hapus"
                                        data-header="Hapus User"
                                        data-sub-header="" data-module="user"
                                        data-submodule="level" data-form="user"
                                        data-folder="setting" data-id="<?php echo $UserLevelID;?>"
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
                    <div class="row">
                        <div class="col-12 text-center">
                        <button class="btn btn-primary" href="" alt="Tambah User" title="Tambah User"
                        data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                        data-action="tambah" data-header="Tambah User" data-sub-header="" data-module="user"
                        data-submodule="level" data-form="user" data-folder="setting" data-id=""
                        data-UserID="<?php echo $UserID;?>">Tambah Level</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="Access" role="tabpanel">
                <table id="Access_Data" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">Level</th>
                                <th class="text-center align-middle">Modul</th>
                                <th class="text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $user = new hakakses_data();
                                foreach($user->hakakses('') as $row){ 
                                    $HakAksesID    =	$row['HakAksesID'];
                                    $UserLevelID    =	$row['UserLevelID'];
                                    $UserLevel		=	$row['UserLevel'];
                                    $ModulID        =	$row['ModulID'];
                                ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $UserLevel;?></td>
                                <td>
                                <?php 
                                foreach($user->hakaksesmodul($ModulID) as $row){
                                    $Modul          =    $row['Modul'];
                                    echo $Modul.', ';
                                }
                                ?>
                                </td>
                                <td class="text-center align-middle">
                                <a class="align-middle text-center" href="" alt="Detail User"
                                        title="Detail User" data-target="#newModal" data-toggle="modal"
                                        data-backdrop="static" data-size="sm" data-action="lihat"
                                        data-header="Detail User"
                                        data-sub-header="" data-module="user"
                                        data-submodule="akses" data-form="user"
                                        data-folder="setting" data-id="<?php echo $HakAksesID;?>"
                                        data-UserID="<?php echo $UserID;?>">
                                        <i class="align-middle" data-feather="zoom-in"></i>
                                    </a>
                                    <a class="align-middle text-center" href="" alt="Ubah User"
                                        title="Ubah User" data-target="#newModal" data-toggle="modal"
                                        data-backdrop="static" data-size="sm" data-action="ubah"
                                        data-header="Ubah User"
                                        data-sub-header="" data-module="user"
                                        data-submodule="akses" data-form="user"
                                        data-folder="setting" data-id="<?php echo $HakAksesID;?>"
                                        data-UserID="<?php echo $UserID;?>">
                                        <i class="align-middle" data-feather="edit-3"></i>
                                    </a>
                                    <a class="align-middle text-center" href="" alt="Hapus User"
                                        title="Hapus User" data-target="#newModal" data-toggle="modal"
                                        data-backdrop="static" data-size="sm" data-action="hapus"
                                        data-header="Hapus User"
                                        data-sub-header="" data-module="user"
                                        data-submodule="akses" data-form="user"
                                        data-folder="setting" data-id="<?php echo $HakAksesID;?>"
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
                    <div class="row">
                        <div class="col-12 text-center">
                        <button class="btn btn-primary" href="" alt="Tambah User" title="Tambah User"
                        data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                        data-action="tambah" data-header="Tambah User" data-sub-header="Hak Akses" data-module="user"
                        data-submodule="akses" data-form="user" data-folder="setting" data-id=""
                        data-UserID="<?php echo $UserID;?>">Tambah Akses</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
