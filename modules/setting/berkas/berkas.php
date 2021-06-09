<h1 class="h3 mb-3"><?php echo $GroupMenu.' '.$ModuleNM;?></h1>
<div class="row">
    <div class="col-12">
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist" id="BerkasTab">
                <li class="nav-item"><a class="nav-link active" href="#umum" data-toggle="tab" role="tab">Umum</a></li>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="umum" role="tabpanel">
                    <table id="Berkas_Umum" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">Kode Berkas</th>
                                <th class="text-center align-middle">Keterangan</th>
                                <th class="text-center align-middle">Waktu Proses</th>
                                <th class="text-center align-middle">Status</th>
                                <th class="text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $berkas = new berkas_data();
                                foreach($berkas->berkas('') as $row){ 
                                    $id		        =	$row['BerkasID'];
                                    $KodeBerkas		=	$row['KodeBerkas'];
                                    $Keterangan		=	$row['Keterangan'];
                                    $WaktuProses	=	$row['WaktuProses'];
                                    $StatusID       =	$row['StatusID'];
                                    $Status         =   $row['Status'];
                                ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $KodeBerkas;?></td>
                                <td><?php echo $Keterangan;?></td>
                                <td><?php echo $WaktuProses;?></td>
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
                                    <a class="align-middle text-center" href="" alt="Ubah Berkas" title="Ubah Berkas" data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                        data-action="ubah" data-header="Ubah Berkas" data-sub-header="" data-module="berkas" data-submodule="umum" data-form="berkas" data-folder="setting"
                                        data-id="<?php echo $id;?>" data-UserID="<?php echo $UserID;?>">
                                        <i class="align-middle" data-feather="edit-3"></i>
                                    </a>
                                    <a class="align-middle text-center" href="" alt="Hapus Berkas" title="Hapus Berkas" data-target="#newModal" data-toggle="modal" data-backdrop="static"
                                        data-size="sm" data-action="hapus" data-header="Hapus Berkas" data-sub-header="" data-module="berkas" data-submodule="umum" data-form="berkas"
                                        data-folder="setting" data-id="<?php echo $id;?>" data-UserID="<?php echo $UserID;?>">
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
                            <button class="btn btn-primary" href="#" alt="Tambah Data" title="Tambah Data" data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                data-action="tambah" data-header="Tambah Data" data-sub-header="" data-module="berkas" data-submodule="umum" data-form="berkas" data-folder="setting" data-id=""
                                data-userid="<?php echo $UserID;?>">
                                Tambah Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>