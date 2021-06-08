<?php
	error_reporting(E_ALL);
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id			= isset($_POST['ID']) 		? $_POST['ID'] 		: NULL;
	$modul 		= isset($_POST['modul']) 	? $_POST['modul'] 	: NULL;
	$submodul	= isset($_POST['submodul']) ? $_POST['submodul']: NULL;
	$UserID		= isset($_POST['UserID']) 	? $_POST['UserID'] 	: NULL;
	
	if ($modul == 'tambah_user' && $submodul == 'login') {
		$Username 		= '';
		$Password		= '';
		$UserLevelID 	= '';
		$StatusID 		= '';
		$UserBuat 		= '';
		$TglBuat 		= '';
		$UserEdit 		= '';
		$TglEdit 		= '';
		
	}
	if ($modul == 'tambah_user' && $submodul == 'level') {
		$UserLevel		= '';
		$StatusID 		= '';	
	}

	if ($modul == 'tambah_user' && $submodul == 'akses') {
		$UserLevelID		= '';
		$DModulID		= array();
	}

	if ($modul == 'ubah_user' && $submodul == 'login') {
		$user = new user_data();
		foreach ($user->user($id) as $row) {
			$Username 		= $row['Username'];
			$Password 		= $row['Password'];
			$UserLevelID 	= $row['UserLevelID'];
			$StatusID 		= $row['StatusID'];
			$Status			= $row['Status'];
		}
	}
	if ($modul == 'ubah_user' && $submodul == 'level') {
		$level = new level_data();
		foreach ($level->level($id) as $row) {
			$UserLevel 		= $row['UserLevel'];
			$StatusID 		= $row['StatusID'];
		}
	}
	if ($modul == 'ubah_user' && $submodul == 'akses') {
		$user = new hakakses_data();
		foreach($user->hakakses($id) as $row){ 
			$UserLevelID    =	$row['UserLevelID'];
			$DModulID		=	explode(',',$row['ModulID']);
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
	if ($modul == 'tambah_user' && $submodul == 'login' || $modul == 'ubah_user' && $submodul == 'login') {
	?>
	<div class="row">
		<div class="col-md-12"> <!-- UserID -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">UserID</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="ID" name="ID" value="<?php echo $id;?>" readonly>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- Username -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Username</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="Username" name="Username" value="<?php echo $Username;?>" required>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- Password -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Password</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="Password" name="Password" value="" autocomplete="off" <?php if ($modul == 'tambah_user') {echo "required";}?>>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- User Level -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Level</label>
				<div class="col-sm-8">
					<select class="form-control" id="UserLevelID" name="UserLevelID" required>
						<option value=""></option>
						<?php
							$level = new level_data();
							foreach ($level->level('') as $row) {
							?>
							<option value="<?php echo $row['UserLevelID'];?>" <?php if ($UserLevelID == $row['UserLevelID']) { echo "selected='selected'";} ?>><?php echo $row['UserLevel'];?></option>
							<?php
							}
						?>
					</select>
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
	if ($modul == 'tambah_user' && $submodul == 'level' || $modul == 'ubah_user' && $submodul == 'level') {
	?>
	<div class="row">
		<div class="col-md-12"> <!-- UserLevelID -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">ID</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="UserLevelID" name="UserLevelID" value="<?php echo $id;?>" required>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- Nama-->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Level </label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="UserLevel" name="UserLevel" value="<?php echo $UserLevel;?>" required>
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
	if ($modul == 'tambah_user' && $submodul == 'akses' || $modul == 'ubah_user' && $submodul == 'akses') {
	?>
		<div class="row">
			<div class="col-md-12"> <!-- User Level -->
				<div class="form-group row">
					<label class="col-form-label col-sm-4 text-sm-left">Level</label>
					<div class="col-sm-8">
						<select class="form-control" id="UserLevelID" name="UserLevelID" required>
							<option value=""></option>
							<?php
								$level = new level_data();
								foreach ($level->level('') as $row) {
								?>
								<option value="<?php echo $row['UserLevelID'];?>" <?php if ($UserLevelID == $row['UserLevelID']) { echo "selected='selected'";} ?>><?php echo $row['UserLevel'];?></option>
								<?php
								}
							?>
						</select>
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<label class="col-form-label col-sm-12 text-sm-center">Modul</label>
				<hr class="my-2">
			</div>
			<?php
				$groups = new groups();
				foreach ($groups->group_list() as $row) {
					$GroupModulID	=	$row['GroupModulID'];
					$GroupModul		=	$row['GroupModul'];
			?>
			<div class="col-md-12"> <!-- Modul-->
				<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left align-middle"><?php echo $GroupModul;?></label>
				<div class="col-sm-8">
					<div class="input-group">
						<?php 
						$moduls = new moduls();
						foreach ($moduls->modul_list($GroupModulID) as $row) {
							$ModulID 	=	$row['ModulID'];
							$Modul 		=	$row['Modul'];
						?>
						<label class="custom-control custom-checkbox form-check-inline">
							<input type="checkbox" class="custom-control-input" id="ModulID[<?php echo $ModulID;?>]" name="ModulID[]" value="<?php echo $ModulID;?>" <?php if (in_array($ModulID,$DModulID)) { echo 'checked'; };?>>
							<span class="custom-control-label"><?php echo $Modul;?></span>
						</label>
						<?php
						}
						?>
					</div>
				</div>
				</div>
			</div>					
			<?php
				}
			?>
			
		</div>
		<?php
	}
	if ($modul == 'hapus_user' && $submodul == 'login') {
	?>
	<div class="row">
		<div class="col-md-12 text-center"> 
			Hapus User dengan ID : <?php echo $id;?> ?
		</div>
	</div>
	<?php
	}
	if ($modul == 'hapus_user' && $submodul == 'level') {
	?>
		<div class="row">
			<div class="col-md-12 text-center"> 
				Hapus Level dengan ID : <?php echo $id;?> ?
			</div>
		</div>
	<?php
	}
	if ($modul == 'hapus_user' && $submodul == 'akses') {
		?>
			<div class="row">
				<div class="col-md-12 text-center"> 
					Hapus Level dengan ID : <?php echo $id;?> ?
				</div>
			</div>
		<?php
		}
?>
---
<?php if ($modul == 'tambah_user' || $modul == 'ubah_user') { ?>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	<button type="submit" class="btn btn-primary">Simpan</button>
	<?php 
	} 
	if ($modul == 'hapus_user') { 
	?>
	<button type="submit" class="btn btn-danger">Hapus</button>
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
				var formData  = new FormData(form);
				$.ajax({
					type : 'POST',
					url : '../modules/setting/user/user.process.php',
					processData: false,
					contentType: false,
					data: formData,
					success : function(hasil){
						if (hasil=='sukses	') {
							location.href = "/index.php?page=user"
							} else {
							$('#modal-data').html(hasil);
						}
					}
				});
			}
		});
	});
</script>
