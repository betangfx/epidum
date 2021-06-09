<?php
	error_reporting(0);
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id			= isset($_POST['ID']) 		? $_POST['ID'] 		: NULL;
	$modul 		= isset($_POST['modul']) 	? $_POST['modul'] 	: NULL;
	$submodul	= isset($_POST['submodul']) ? $_POST['submodul']: NULL;
	$UserID		= isset($_POST['UserID']) 	? $_POST['UserID'] 	: NULL;
	
	// Mulai SET Variable
	if ($modul == 'tambah_manajemen') {
        $NoSPDP         =   '';
        $Tersangka      =   ''; 
        $Pelanggaran    =   '';
        $TglTerima      =   '';
        $Catatan        =   '';
           
	}
	else if ($modul == 'ubah_manajemen' || $modul == 'hapus_manajemen') {
        $manajemen = new manajemen_data();
        foreach($manajemen->manajemen($id) as $row){ 
            $id		        =	$row['ManajemenID'];
            $NoPerkara        =	$row['PerkaraID'];
            $NoSPDP	        =	$row['NoSPDP'];
            $PerkaraID	    =	$row['PerkaraID'];
            $Tersangka	    =	$row['Tersangka'];
            $Pelanggaran    =	$row['Pelanggaran'];
            $JaksaID    =	$row['JaksaID'];
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
    if ($modul == 'ubah_manajemen' && $submodul == 'umum') {
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
                    <input type="text" class="form-control" id="NoPerkara" name="NoPerkara" value="<?php echo $NoPerkara;?>" disabled>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- No. SPDP -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">No. SPDP</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="NoSPDP" name="NoSPDP" value="<?php echo $NoSPDP;?>" disabled>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- Nama Tersangka -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Tersangka</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Tersangka" name="Tersangka" value="<?php echo $Tersangka;?>" disabled>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- Pelanggaran -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Pelanggaran</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="Pelanggaran" name="Pelanggaran" value="<?php echo $Pelanggaran;?>" disabled>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- JaksaID -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Jaksa</label>
            <div class="col-sm-8">
                <select class="form-control" id="JaksaID" name="JaksaID" required>
                    <option value=""></option>
                    <?php
							$user_manajemen = new manajemen_user();
							foreach ($user_manajemen->user_manajemen() as $row) {
							?>
                    <option value="<?php echo $row['UserID'];?>" <?php if ($JaksaID == $row['UserID']) { echo "selected='selected'";} ?>><?php echo $row['NamaLengkap'];?></option>
                    <?php
							}
						?>
                </select>
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
<?php if ($modul == 'ubah_manajemen' && $submodul == 'umum') { ?>
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
                url: '../modules/main/manajemen/manajemen.process.php',
                processData: false,
                contentType: false,
                data: formData,
                success: function(hasil) {
                    if (hasil == 'sukses' || hasil == 'sukses	') {
                        location.href = "/index.php?page=manajemen"
                    } else {
                        $('#modal-data').html(hasil);
                    }
                }
            });
        }
    });
});
</script>