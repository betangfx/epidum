<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id			= isset($_POST['ID']) 		? $_POST['ID'] 		: NULL;
	$modul 		= isset($_POST['modul']) 	? $_POST['modul'] 	: NULL;
	$submodul	= isset($_POST['submodul']) ? $_POST['submodul']: NULL;
	$UserID		= isset($_POST['UserID']) 	? $_POST['UserID'] 	: NULL;
	
	//pre
	if ($modul == 'tambah_master' && $submodul == 'jabatan') {
		$JabatanID	=	'';
		$Jabatan	=	'';
	}
	if (($modul == 'ubah_master' && $submodul == 'jabatan') || ($modul == 'hapus_master' && $submodul == 'jabatan')) {
		$jabatan = new master();
		foreach ($jabatan->jabatan('read',$id,'',$UserID) as $row) {
			$JabatanID	=	$row['JabatanID'];
			$Jabatan	=	$row['Jabatan'];
		}
	}
	// form body
	if (($modul == 'tambah_master' && $submodul == 'jabatan') || ($modul == 'ubah_master' && $submodul == 'jabatan')) {
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
	<div class="row"> <!-- show -->
		<div class="col-md-12"> <!-- ID -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">ID</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="JabatanID" name="JabatanID" value="<?php echo $JabatanID;?>" readonly>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- Jabatan -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Jabatan</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="Jabatan" name="Jabatan" value="<?php echo $Jabatan;?>" required>
				</div>
			</div>
		</div>
	</div>
	<?php 
	} 	
	if ($modul == 'hapus_master' && $submodul == 'jabatan') {
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
	<div class="row"><!-- show -->
		<div class="col-md-12 text-center"> <!-- Rangkaian -->
			Hapus Jabatan dengan ID : <?php echo $id;?> ?
		</div>
	</div>
	<?php
	}
?>
---
<?php // form submit
	if ($modul == 'tambah_master') {
	?>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	<button type="submit" id="submit" class="btn btn-primary">Simpan</button>
</form>
<?php 
}
if ($modul == 'ubah_master') {
?>
<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
<button type="submit" class="btn btn-primary">Simpan</button>
<?php
}
if ($modul == 'hapus_master') {
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
					url : '../modules/setting/master/master.process.php',
					processData: false,
					contentType: false,
					data: formData,
					success : function(hasil){
						if (hasil=='sukses') {
							location.href = "/index.php?page=master"
							} else {
							$('#modal-data').html(hasil);
						}
					}
				});
			}
		});
	});
</script>
