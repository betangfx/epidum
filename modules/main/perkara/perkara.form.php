<?php
	error_reporting(0);
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id			= isset($_POST['ID']) 		? $_POST['ID'] 		: NULL;
	$modul 		= isset($_POST['modul']) 	? $_POST['modul'] 	: NULL;
	$submodul	= isset($_POST['submodul']) ? $_POST['submodul']: NULL;
	$UserID		= isset($_POST['UserID']) 	? $_POST['UserID'] 	: NULL;
	
	// Mulai SET Variable
	if ($modul == 'tambah_perkara') {
        $NoSPDP         =   '';
        $Tersangka      =   ''; 
        $Pelanggaran    =   '';
        $TglTerima      =   '';
        $Catatan        =   '';
           
	}
	else if ($modul == 'ubah_perkara' || $modul == 'hapus_perkara') {
        $perkara = new perkara_data();
        foreach($perkara->perkara($id) as $row){ 
            $id		        =	$row['PerkaraID'];
            $NoSPDP		    =	$row['NoSPDP'];
            $Tersangka	    =	$row['Tersangka'];
            $Pelanggaran    =	$row['Pelanggaran'];
            $TglTerima	    =	$row['TglTerima'];
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
    if ($modul == 'tambah_perkara' && $submodul == 'umum' || $modul == 'ubah_perkara' && $submodul == 'umum') {
?>
<div class="row">
    <!-- Analisa Form Standar Value -->
    <div class="col-md-12">
        <!-- No. Perkara -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">No. Perkara</label>
            <div class="col-sm-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">@</span>
                    </div>
                    <input type="text" class="form-control" id="NoPerkara" name="NoPerkara" value="<?php echo $id;?>" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- No. SPDP -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">No. SPDP</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="NoSPDP" name="NoSPDP" value="<?php echo $NoSPDP;?>" required>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- Nama Tersangka -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Tersangka</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Tersangka" name="Tersangka" value="<?php echo $Tersangka;?>" required>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- Pelanggaran -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Pelanggaran</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Pelanggaran" name="Pelanggaran" value="<?php echo $Pelanggaran;?>" required>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- Tanggal Terima -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Tanggal Terima</label>
            <div class="col-sm-8">
                <div class="input-group date" id="TglTerimaID" data-target-input="nearest">
                    <input type="text" id="TglTerima" name="TglTerima" class="form-control datetimepicker-input" data-target="#TglTerimaID" value="<?php echo $TglTerima;?>">
                    <div class="input-group-append" data-target="#TglTerimaID" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
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
if ($modul == 'hapus_perkara' && $submodul == 'umum') {
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
<?php if ($modul == 'tambah_perkara' || $modul == 'ubah_perkara') { ?>
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

    $('#TglTerimaID').datetimepicker({
        format: 'YYYY-MM-DD',
        defaultDate: $('#TglTerima').val(),
        maxDate: new Date(),
        sideBySide: true
    });

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
			messages: {
			},
			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},
			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
				$(e).remove();
			},
			submitHandler: function(form, event) {
				event.preventDefault();
				var formData  = new FormData(form);
				$.ajax({
					type : 'POST',
					url : '../modules/main/perkara/perkara.process.php',
					processData: false,
					contentType: false,
					data: formData,
					success : function(hasil){
						if (hasil=='sukses'|| hasil=='sukses	') {
							location.href = "/index.php?page=perkara"
							} else {
							$('#modal-data').html(hasil);
						}
					}
				});
			}
		});
});
</script>