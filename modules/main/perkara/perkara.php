<h1 class="h3 mb-3"><?php echo $ModuleNM;?></h1>
<div class="row">

    <div class="col-12">
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist" id="AdminTab">
                <li class="nav-item"><a class="nav-link active" href="#umum" data-toggle="tab" role="tab">Umum</a></li>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="umum" role="tabpanel">
                    <div class="row">
                        <div class="col-12 text-center">
                            <button class="btn btn-primary" href="#" alt="Tambah Perkara" title="Register Perkara" data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                data-action="tambah" data-header="Register Perkara" data-sub-header="" data-module="perkara" data-submodule="umum" data-form="perkara" data-folder="main" data-id=""
                                data-userid="<?php echo $UserID;?>">
                                Register Perkara
                            </button>
                        </div>
                    </div>
                    <table id="Perkara_Umum" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">No. SPDP</th>
                                <th class="text-center align-middle">Tersangka</th>
                                <th class="text-center align-middle">Pelanggaran</th>
                                <th class="text-center align-middle">Tanggal Terima</th>
                                <th class="text-center align-middle">Catatan</th>
                                <th class="text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $perkara = new perkara_data();
                                foreach($perkara->perkara('') as $row){ 
                                    $id		        =	$row['PerkaraID'];
                                    $NoSPDP		    =	$row['NoSPDP'];
                                    $Tersangka	    =	$row['Tersangka'];
                                    $Pelanggaran    =	$row['Pelanggaran'];
                                    $TglTerima	    =	$row['TglTerima'];
                                    $Catatan        =	$row['Catatan'];
                                ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $NoSPDP;?></td>
                                <td><?php echo $Tersangka;?></td>
                                <td><?php echo $Pelanggaran;?></td>
                                <td><?php echo $TglTerima;?></td>
                                <td><?php echo $Catatan?></td>
                                <td>
                                    <a class="align-middle text-center" href="" alt="Ubah Perkara" title="Ubah Perkara" data-target="#newModal" data-toggle="modal" data-backdrop="static"
                                        data-size="sm" data-action="ubah" data-header="Ubah Perkara" data-sub-header="" data-module="perkara" data-submodule="umum" data-form="perkara"
                                        data-folder="main" data-id="<?php echo $id;?>" data-UserID="<?php echo $UserID;?>">
                                        <i class="align-middle" data-feather="edit-3"></i>
                                    </a>
                                    <a class="align-middle text-center" href="" alt="Hapus Perkara" title="Hapus Perkara" data-target="#newModal" data-toggle="modal" data-backdrop="static"
                                        data-size="sm" data-action="hapus" data-header="Hapus Perkara" data-sub-header="" data-module="perkara" data-submodule="umum" data-form="perkara"
                                        data-folder="main" data-id="<?php echo $id;?>" data-UserID="<?php echo $UserID;?>">
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
</div>