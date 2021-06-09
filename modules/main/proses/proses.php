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
                    <table id="Manajemen_Umum" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">No. Perkara</th>
                                <th class="text-center align-middle">Tersangka</th>
                                <th class="text-center align-middle">Pelanggaran</th>
                                <th class="text-center align-middle">Jaksa</th>
                                <th class="text-center align-middle">Catatan</th>
                                <th class="text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $manajemen = new manajemen_data();
                                foreach($manajemen->manajemen('') as $row){ 
                                    $id		        =	$row['ManajemenID'];
                                    $PerkaraID	    =	$row['PerkaraID'];
                                    $Tersangka	    =	$row['Tersangka'];
                                    $Pelanggaran    =	$row['Pelanggaran'];
                                    $NamaLengkap    =	$row['NamaLengkap'];
                                    $Catatan        =	$row['Catatan'];
                                ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $PerkaraID;?></td>
                                <td><?php echo $Tersangka;?></td>
                                <td><?php echo $Pelanggaran;?></td>
                                <td><?php echo $NamaLengkap;?></td>
                                <td><?php echo $Catatan?></td>
                                <td>
                                    <a class="align-middle text-center" href="" alt="Manajemen Perkara" title="Manajemen Perkara" data-target="#newModal" data-toggle="modal" data-backdrop="static"
                                        data-size="sm" data-action="ubah" data-header="Manajemen Perkara" data-sub-header="" data-module="manajemen" data-submodule="umum" data-form="manajemen"
                                        data-folder="main" data-id="<?php echo $id;?>" data-UserID="<?php echo $UserID;?>">
                                        <i class="align-middle" data-feather="edit-3"></i>
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