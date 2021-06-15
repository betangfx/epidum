<?php
	error_reporting(E_ALL);
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id			= isset($_POST['ID']) 		? $_POST['ID'] 		: NULL;
    $ProsesID   = isset($_POST['pid']) 		? $_POST['pid'] 	: NULL;
    $PerkaraID  = isset($_POST['perkara']) 		? $_POST['perkara'] : NULL;
	$modul 		= isset($_POST['modul']) 	? $_POST['modul'] 	: NULL;
	$submodul	= isset($_POST['submodul']) ? $_POST['submodul']: NULL;
	$UserID		= isset($_POST['UserID']) 	? $_POST['UserID'] 	: NULL;
	
	// Mulai SET Variable
	if ($modul == 'tambah_proses' && $submodul == 'berkas') {
        $BerkasID	    =	'';
        $KodeBerkas     =   ''; 
        $MulaiProses    =   '';
        $AkhirProses    =   '';
        $StatusID       =   '';
        $Catatan        =   '';
           
	}
    if ($modul == 'ubah_proses' && $submodul == 'berkas' || $modul == 'hapus_proses' && $submodul == 'berkas') {
        $proses = new proses_berkas();
        foreach($proses->berkas($id) as $row){ 
            $BerkasID	    =	$row['BerkasID'];
            $MulaiProses	=	$row['MulaiProses'];
            $AkhirProses    =	$row['AkhirProses'];
            $StatusID       =	$row['StatusID'];
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
                    <input type="hidden" class="form-control" id="ProsesID" name="ProsesID" value="<?php echo $ProsesID;?>">
                </div>
                <div class="input-group">
                    <input type="hidden" class="form-control" id="PerkaraID" name="PerkaraID" value="<?php echo $PerkaraID;?>">
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
    if ($modul == 'tambah_proses' && $submodul == 'berkas' || $modul == 'ubah_proses' && $submodul == 'berkas') {
?>
<div class="row">
    <div class="col-md-12">
        <!-- Berkas -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Kode Berkas</label>
            <div class="col-sm-8">
                <select class="form-control" id="BerkasID" name="BerkasID" required>
                    <option></option>
                    <?php
							$berkas = new berkas_aktif();
							foreach ($berkas->berkas() as $row) {
							?>
                    <option value="<?php echo $row['BerkasID'];?>" <?php if ($BerkasID == $row['BerkasID']) { echo "selected='selected'";} ?>><?php echo $row['KodeBerkas'];?></option>
                    <?php
							}
						?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- Mulai Proses -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Mulai Proses</label>
            <div class="col-sm-8">
                <div class="input-group date" id="TglMulaiID" data-target-input="nearest">
                    <input type="text" id="MulaiProses" name="MulaiProses" class="form-control datetimepicker-input" data-target="#TglMulaiID" value="<?php echo $MulaiProses;?>">
                    <div class="input-group-append" data-target="#TglMulaiID" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- Akhir Proses -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Akhir Proses</label>
            <div class="col-sm-8">
                <div class="input-group date" id="TglAkhirID" data-target-input="nearest">
                    <input type="text" id="AkhirProses" name="AkhirProses" class="form-control datetimepicker-input" data-target="#TglAkhirID" value="<?php echo $AkhirProses;?>">
                    <div class="input-group-append" data-target="#TglAkhirID" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <!-- Status -->
        <div class="form-group row">
            <label class="col-form-label col-sm-4 text-sm-left">Status</label>
            <div class="col-sm-8">
                <label class="col-md-12 form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="StatusID" name="StatusID" value="1" <?php if ($StatusID == '1') { echo 'checked="checked"';}?>>
                    <span class="form-check-label">Selesai</span>
                </label>
                <label class="col-md-12 form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="StatusID" name="StatusID" value="2" <?php if ($StatusID == '2') { echo 'checked="checked"';}?>>
                    <span class="form-check-label">Belum Selesai</span>
                </label>
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
if ($modul == 'hapus_proses' && $submodul == 'berkas') {
?>
<div class="row">
    <div class="col-md-12 text-center">
        Hapus Berkas Perkara dengan ID : <?php echo $id;?> ?
    </div>
</div>
<?php
}
?>
---
<?php if ($modul == 'tambah_proses' && $submodul == 'berkas' || $modul == 'ubah_proses' && $submodul == 'berkas') { ?>
<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
<?php 
	} 
	if ($modul == 'hapus_proses') { 
?>
<button type="submit" class="btn btn-danger">Hapus</button>
<?php 
	}
?>
<script type="text/javascript">
$(document).ready(function() {

    $('#TglMulaiID').datetimepicker({
        format: 'YYYY-MM-DD',
        defaultDate: $('#MulaiProses').val(),
        maxDate: new Date(),
        sideBySide: true
    });

    $('#TglAkhirID').datetimepicker({
        format: 'YYYY-MM-DD',
        defaultDate: $('#AkhirProses').val(),
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
                    if (hasil == 'sukses') {
                        var ID = $('#ID').val();
                        var ProsesID = $('#ProsesID').val();
                        var PerkaraID = $('#PerkaraID').val();
                        location.href = "/index.php?page=proses&perkara="+PerkaraID+"&pid="+ProsesID
                    } else {
                        $('#modal-data').html(hasil);
                    }
                }
            });
        }
    });
});
</script>