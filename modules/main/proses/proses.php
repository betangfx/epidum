<h1 class="h3 mb-3"><?php echo $ModuleNM;?></h1>
<?php
$pid			= isset($_GET['pid']) 				? $_GET['pid'] 		: NULL;
$PerkaraID		= isset($_GET['perkara']) 			? $_GET['perkara'] : NULL;

if ($pid != '') {
    $perkara = new perkara_data();
    foreach($perkara->perkara($PerkaraID) as $row){ 
        $PerkaraID	    =	$row['PerkaraID'];
        $NoSPDP		    =	$row['NoSPDP'];
        $Tersangka	    =	$row['Tersangka'];
        $Pelanggaran    =	$row['Pelanggaran'];
        $TglTerima	    =	$row['TglTerima'];
        $Catatan        =	$row['Catatan'];
    }
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-2 text-center">
                    <strong>DETAIL</strong>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="font-weight-bold">No. Register:</div>
                        <strong><?php echo $PerkaraID;?></strong>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <div class="font-weight-bold">No. SPDP:</div>
                        <strong><?php echo $NoSPDP;?></strong>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="font-weight-bold">Tersangka</div>
                        <strong><?php echo $Tersangka;?></strong>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <div class="font-weight-bold">Pelanggaran</div>
                        <strong><?php echo $Pelanggaran;?></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="mb-0 text-center">
                    <strong>Berkas - Berkas</strong>
                </div>
                <table id="ProsesBerkas_Umum" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center align-middle">No</th>
                            <th class="text-center align-middle">Kode Berkas</th>
                            <th class="text-center align-middle">Mulai</th>
                            <th class="text-center align-middle">Akhir</th>
                            <th class="text-center align-middle">Status</th>
                            <th class="text-center align-middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $proses = new proses_berkas_data();
                        foreach($proses->berkas($pid) as $row){ 
                            $id             =	$row['ProsesBerkasID'];
                            $KodeBerkas	    =	$row['KodeBerkas'];
                            $MulaiProses	=	$row['MulaiProses'];
                            $AkhirProses    =	$row['AkhirProses'];
                            $StatusID       =	$row['StatusID'];
                            $Status         =	$row['Status'];
                    ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $KodeBerkas;?></td>
                            <td><?php echo $MulaiProses;?></td>
                            <td><?php echo $AkhirProses;?></td>
                            <td>
                            <?php 
                                if ($StatusID == '1') {
                                echo '<span class="badge badge-success">'.$Status.'</span>';
                                }
                                else if ($StatusID == '2') {
                                echo '<span class="badge badge-warning">'.$Status.'</span>';
                                }
                            ?>
                            </td>
                            <td>
                                <a class="align-middle text-center" href="" alt="Ubah Berkas" title="Ubah Berkas" data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                    data-action="ubah" data-header="Ubah Berkas Perkara" data-sub-header="" data-module="proses" data-submodule="berkas" data-form="proses" data-folder="main"
                                    data-perkara="<?php echo $PerkaraID;?>" data-pid="<?php echo $pid;?>" data-id="<?php echo $id;?>" data-UserID="<?php echo $UserID;?>">
                                    <i class="align-middle" data-feather="edit-3"></i>
                                </a>
                                <a class="align-middle text-center" href="" alt="Hapus Berkas" title="Hapus Berkas" data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                    data-action="hapus" data-header="Hapus Berkas" data-sub-header="" data-module="proses" data-submodule="berkas" data-form="proses" data-folder="main"
                                    data-perkara="<?php echo $PerkaraID;?>" data-pid="<?php echo $pid;?>" data-id="<?php echo $id;?>" data-UserID="<?php echo $UserID;?>">
                                    <i class="align-middle" data-feather="trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                        }
                    ?>
                    </tbody>
                </table>
                <div class="col-12 text-center">
                    <button class="btn btn-primary" href="#" alt="Tambah Berkas Perkara" title="Tambah Berkas Perkara" data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                        data-action="tambah" data-header="Tambah Berkas Perkara" data-sub-header="" data-module="proses" data-submodule="berkas" data-form="proses" data-folder="main"
                        data-perkara="<?php echo $PerkaraID;?>" data-pid="<?php echo $pid;?>" data-id="" data-userid="<?php echo $UserID;?>">
                        Tambah Berkas
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
} else {
?>
<div class="row">
    <div class="col-12">
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist" id="AdminTab">
                <li class="nav-item"><a class="nav-link active" href="#umum" data-toggle="tab" role="tab">Umum</a></li>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="umum" role="tabpanel">
                    <table id="Proses_Umum" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-center align-middle">No</th>
                                <th class="text-center align-middle">No. Berkas</th>
                                <th class="text-center align-middle">Tersangka</th>
                                <th class="text-center align-middle">Pelanggaran</th>
                                <th class="text-center align-middle">Jaksa</th>
                                <th class="text-center align-middle">Berkas</th>
                                <th class="text-center align-middle">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                if ($UserLevelID == '0' || $UserLevelID == '1') {
                                    $AksesID = '';
                                } else {
                                    $AksesID = $UserID;
                                }
                                $proses = new proses_data();
                                foreach($proses->proses('', $AksesID) as $row){ 
                                    $id		        =	$row['ProsesID'];
                                    $PerkaraID	    =	$row['PerkaraID'];
                                    $Tersangka	    =	$row['Tersangka'];
                                    $Pelanggaran    =	$row['Pelanggaran'];
                                    $Nama           =	$row['Nama'];
                                    $Catatan        =	$row['Catatan'];
                                ?>
                            <tr>
                                <td><?php echo $no++;?></td>
                                <td><?php echo $PerkaraID;?></td>
                                <td><?php echo $Tersangka;?></td>
                                <td><?php echo $Pelanggaran;?></td>
                                <td><?php echo $Nama;?></td>
                                <td><?php echo $Catatan?></td>
                                <td>
                                <a href="/index.php?page=proses&perkara=<?php echo $PerkaraID;?>&pid=<?php echo $id;?>">Proses</a>
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
<?php
}
?>