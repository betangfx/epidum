<h1 class="h3 mb-3"><?php echo $ModuleNM;?></h1>
<?php
$id = isset($_GET['id']) 		? $_GET['id']: NULL;
if ($id != '') {
?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-6">
                        a
                    </div>
                    <div class="col-md-6">
                        b
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
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
                        $proses = new proses_berkas();
                        foreach($proses->berkas($id) as $row){ 
                            $id		        =	$row['ProsesBerkasID'];
                            $KodeBerkas	    =	$row['KodeBerkas'];
                            $MulaiProses	=	$row['MulaiProses'];
                            $AkhirProses    =	$row['AkhirProses'];
                            $StatusID       =	$row['StatusID'];
                    ?>
                        <tr>
                            <td><?php echo $no++;?></td>
                            <td><?php echo $KodeBerkas;?></td>
                            <td><?php echo $MulaiProses;?></td>
                            <td><?php echo $AkhirProses;?></td>
                            <td><?php echo $StatusID;?></td>
                            <td>
                                <a class="align-middle text-center" href="" alt="Proses Berkas" title="Proses Berkas" data-target="#newModal" data-toggle="modal" data-backdrop="static" data-size="sm"
                                    data-action="ubah" data-header="Proses Berkas" data-sub-header="" data-module="proses" data-submodule="umum" data-form="proses" data-folder="main"
                                    data-id="<?php echo $id;?>" data-UserID="<?php echo $UserID;?>">
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
                                $proses = new proses_data();
                                foreach($proses->proses('') as $row){ 
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
                                    <a class="align-middle text-center" href="/index.php?page=proses&id=<?php echo $id;?>" alt="Proses Berkas" title="Proses Berkas">
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
<?php
}
?>