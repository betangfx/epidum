<?php
	error_reporting(0);
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id			= isset($_POST['ID']) 		? $_POST['ID'] 		: NULL;
	$modul 		= isset($_POST['modul']) 	? $_POST['modul'] 	: NULL;
	$submodul	= isset($_POST['submodul']) ? $_POST['submodul']: NULL;
	$UserID		= isset($_POST['UserID']) 	? $_POST['UserID'] 	: NULL;
	
	// Mulai SET Variable
	if ($modul == 'ubah_proses' || $modul == 'hapus_proses') {
        $proses = new proses_data();
        foreach($proses->proses($id) as $row){ 
            $id		        =	$row['ProsesID'];
            $NoPerkara        =	$row['PerkaraID'];
            $NoSPDP	        =	$row['NoSPDP'];
            $PerkaraID	    =	$row['PerkaraID'];
            $Tersangka	    =	$row['Tersangka'];
            $Pelanggaran    =	$row['Pelanggaran'];
            $JaksaID        =	$row['JaksaID'];
            $NamaLengkap    =	$row['NamaLengkap'];
            $Catatan        =	$row['Catatan'];
        }
    }
	?>
<div class="row">
    <!-- Form Hidden Value -->
    <div class="col-md-12">
        <div class="form-group row">
            <div class="col-sm-9">
                <div class="input-group">
                    <input type="hidden" class="form-control" id="ID" name="ID" value="<?php echo $id;?>">
                </div>
                <div class="input-group">
                    <input type="hidden" class="form-control" id="modul" name="modul" value="<?php echo $modul;?>">
                </div>
                <div class="input-group">
                    <input type="hidden" class="form-control" id="submodul" name="submodul" value="<?php echo $submodul;?>">
                </div>
                <div class="input-group">
                    <input type="hidden" class="form-control" id="UserID" name="UserID" value="<?php echo $UserID;?>">
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    if ($modul == 'ubah_proses' && $submodul == 'umum') {
?>
<div class="row">
    <!-- Analisa Form Standar Value -->
    <div class="col-md-6">
        <!-- No. Perkara -->
        <div class="form-group row">
            <label class="col-form-label col-sm-12 text-sm-left">No. Perkara</label>
            <div class="col-sm-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" class="form-control" id="NoPerkara" name="NoPerkara" value="<?php echo $NoPerkara;?>" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- No. SPDP -->
        <div class="form-group row">
            <label class="col-form-label col-sm-12 text-sm-left">No. SPDP</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="NoSPDP" name="NoSPDP" value="<?php echo $NoSPDP;?>" disabled>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- Nama Tersangka -->
        <div class="form-group row">
            <label class="col-form-label col-sm-12 text-sm-left">Tersangka</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="Tersangka" name="Tersangka" value="<?php echo $Tersangka;?>" disabled>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- Pelanggaran -->
        <div class="form-group row">
            <label class="col-form-label col-sm-12 text-sm-left">Pelanggaran</label>
            <div class="col-sm-12">
                <input type="text" class="form-control" id="Pelanggaran" name="Pelanggaran" value="<?php echo $Pelanggaran;?>" disabled>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <!-- JaksaID -->
        <div class="form-group row">
            <label class="col-form-label col-sm-12 text-sm-left">Jaksa</label>
            <div class="col-sm-12">
                <select class="form-control" id="JaksaID" name="JaksaID" disabled>
                    <?php
							$user_manajemen = new manajemen_user();
							foreach ($user_manajemen->user_manajemen() as $row) {
							?>
                    <option value="<?php echo $row['UserID'];?>" <?php if ($JaksaID == $row['UserID']) { echo "selected='selected'";} ?>><?php echo $row['Nama'];?></option>
                    <?php
							}
						?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group row">
            <label class="col-form-label col-sm-12 text-sm-center">Berkas - Berkas</label>
        </div>
    </div>

    <div class="col-md-12">
        <table id="ProsesBerkas_Umum" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle">Berkas</th>
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
                        <a class="align-middle text-center" href="" alt="Proses Perkara" title="Proses Perkara" data-target="#secondmodal" data-toggle="modal" data-backdrop="static" data-size="md"
                            data-action="ubah" data-header="Proses Perkara" data-sub-header="" data-module="proses" data-submodule="umum" data-form="proses" data-folder="main"
                            data-id="<?php echo $id;?>" data-UserID="<?php echo $UserID;?>">
                            Edit
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        <a class="align-middle text-center" href="" alt="Proses Perkara" title="Proses Perkara" data-target="#2ndmodal" data-toggle="modal" data-backdrop="static" data-size="md"
                            data-action="ubah" data-header="Proses Perkara" data-sub-header="" data-module="proses" data-submodule="umum" data-form="proses" data-folder="main"
                            data-id="<?php echo $id;?>" data-UserID="<?php echo $UserID;?>">
                            Edit
                        </a>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label for="Catatan">Catatan</label>
            <textarea id="Catatan" name="Catatan" class="form-control"><?php echo $Catatan;?></textarea>
        </div>
    </div>
</div>
<?php 
}
if ($modul == 'hapus_manajemen' && $submodul == 'umum') {
?>
<div class="row">
    <div class="col-md-12 text-center">
        Hapus Perkara dengan ID : <?php echo $id;?> ?
    </div>
</div>
<?php
}
?>
---
<?php if ($modul == 'ubah_proses' && $submodul == 'umum') { ?>
<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
<?php 
	} 
	if ($modul == 'hapus_perkara') { 
?>
<button type="submit" class="btn btn-danger">Hapus</button>
<?php 
	}
?>
<script type="text/javascript">
$(document).ready(function() {

    $('#Catatan').summernote({
        placeholder: '',
        tabsize: 2,
        height: 150,
        toolbar: [
            ['font', ['bold', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']]
        ]
    });

    $("#newForm").validate({
        errorElement: 'div',
        errorClass: 'help-block',
        focusInvalid: true,
        messages: {},
        highlight: function(e) {
            $(e).closest('.form-group').removeClass('has-info').addClass('has-error');
        },
        success: function(e) {
            $(e).closest('.form-group').removeClass('has-error'); //.addClass('has-info');
            $(e).remove();
        },
        submitHandler: function(form, event) {
            event.preventDefault();
            var formData = new FormData(form);
            $.ajax({
                type: 'POST',
                url: '../modules/main/proses/proses.process.php',
                processData: false,
                contentType: false,
                data: formData,
                success: function(hasil) {
                    if (hasil == 'sukses' || hasil == 'sukses	') {
                        location.href = "/index.php?page=proses"
                    } else {
                        $('#modal-data').html(hasil);
                    }
                }
            });
        }
    });
});
</script>