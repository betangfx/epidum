<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id			= isset($_POST['ID']) 			? $_POST['ID'] 			: NULL;
	$modul 		= isset($_POST['modul']) 		? $_POST['modul'] 		: NULL;
	$submodul	= isset($_POST['submodul']) 	? $_POST['submodul']	: NULL;
	$UserID		= isset($_POST['UserID']) 		? $_POST['UserID'] 		: NULL;
	$UserLevel	= isset($_POST['UserLevel']) 	? $_POST['UserLevel'] 	: NULL;
	
	//pre
	if ($modul == 'tambah_berkas' && $submodul == 'umum') {
		$KodeBerkas		=	'';
		$Keterangan		=	'';
		$WaktuProses	=	'';
		$StatusID		=	'';
	}
	if (($modul == 'ubah_berkas' && $submodul == 'umum') || ($modul == 'hapus_berkas' && $submodul == 'umum')) {
		$berkas = new berkas_data();
		foreach ($berkas->berkas($id) as $row) {
			$KodeBerkas		=	$row['KodeBerkas'];
			$Keterangan		=	$row['Keterangan'];
			$WaktuProses	=	$row['WaktuProses'];
			$StatusID       =	$row['StatusID'];
		}
	}
	?>
	<div class="row"> <!-- hidden -->
		<div class="col-md-12"> <!-- Data -->
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
	// form body
	if (($modul == 'tambah_berkas' && $submodul == 'umum') || ($modul == 'ubah_berkas' && $submodul == 'umum')) {
	?>
	<div class="row"> <!-- show -->
		<div class="col-md-12"> <!-- ID -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">ID</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="ID" name="ID" value="<?php echo $id;?>" disabled>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- Kode Berkas -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Kode Berkas</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="KodeBerkas" name="KodeBerkas" value="<?php echo $KodeBerkas;?>" required>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- Keterangan-->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Keterangan</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="Keterangan" name="Keterangan" value="<?php echo $Keterangan;?>" required>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- Waktu Proses-->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Waktu Proses</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="WaktuProses" name="WaktuProses" value="<?php echo $WaktuProses;?>" required>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- Status -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Status</label>
				<div class="col-sm-8">
					<label class="col-md-12 form-check form-check-inline">
						<input class="form-check-input" type="radio" id="StatusID" name="StatusID" value="11"
							<?php if ($StatusID == '11') { echo 'checked="checked"';}?>>
						<span class="form-check-label">
							Aktif
						</span>
					</label>
					<label class="col-md-12 form-check form-check-inline">
						<input class="form-check-input" type="radio" id="StatusID" name="StatusID" value="12"
							<?php if ($StatusID == '12') { echo 'checked="checked"';}?>>
						<span class="form-check-label">
							Tidak Aktif
						</span>
					</label>
				</div>
			</div>
		</div>
	</div>

	<?php 
	} 	
	if ($modul == 'hapus_berkas' && $submodul == 'umum') {
	?>
	<div class="row"><!-- Hapus -->
		<div class="col-md-12 text-center"> <!-- ID Berkas Umum -->
			Hapus Berkas dengan ID : <?php echo $id;?> ?
		</div>
	</div>
	<?php
	}
?>
---
<?php // form submit
	if ($modul == 'tambah_berkas' || $modul == 'ubah_berkas' ) {
	?>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	<button type="submit" id="submit" class="btn btn-primary">Simpan</button>
</form>
<?php 
}
if ($modul == 'hapus_berkas') {
?>
<button type="submit" class="btn btn-danger">Ya. Hapus!</button>
</form>
<?php
}
?>
<script type="text/javascript">
	$(document).ready(function() {	

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
				var modul = $('#modul').val();
				var submodul = $('#submodul').val();
				var formData  = new FormData(form);
				$.ajax({
					type : 'POST',
					url : '../modules/setting/berkas/berkas.process.php',
					processData: false,
					contentType: false,
					data: formData,
					success : function(hasil){
						if (hasil=='sukses') {
							location.href = "/index.php?page=berkas"
							} else {
							$('#modal-data').html(hasil);
						}
					}
				});
			}
		});
	});
</script>
