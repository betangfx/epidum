<?php
	error_reporting(E_ALL);
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id			= isset($_POST['ID']) 		? $_POST['ID'] 		: NULL;
	$modul 		= isset($_POST['modul']) 	? $_POST['modul'] 	: NULL;
	$submodul	= isset($_POST['submodul']) ? $_POST['submodul']: NULL;
	$UserID		= isset($_POST['UserID']) 	? $_POST['UserID'] 	: NULL;
	
	if ($modul == 'tambah_user') {
		$NamaLengkap 	= '';
		$Username 		= '';
		$Password		= '';
		$Email 			= '';
		$NoTelp 		= '';
		$UserLevelID 	= '';
		$StatusID 		= '';
		$UserBuat 		= '';
		$TglBuat 		= '';
		$UserEdit 		= '';
		$TglEdit 		= '';
		
	}
	if ($modul == 'ubah_user' || $modul == 'lihat_user') {
		$user = new user_data();
		foreach ($user->user($id) as $row) {
			$NamaLengkap 	= $row['Nama'];
			$Username 		= $row['Username'];
			$Password 		= $row['Password'];
			$Email 			= $row['Email'];
			$NoTelp 		= $row['NoTelp'];
			$UserLevelID 	= $row['UserLevelID'];
			$StatusID 		= $row['StatusID'];
			$Status		= $row['Status'];
			$UserBuat 		= $row['UserBuat'];
			$TglBuat 		= $row['TglBuat'];
			$UserEdit 		= $row['UserEdit'];
			$TglEdit 		= $row['TglEdit'];
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
	if ($modul == 'tambah_user' || $modul == 'ubah_user') {
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
		<div class="col-md-12"> <!-- Nama-->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Nama Lengkap</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="NamaLengkap" name="NamaLengkap" value="<?php echo $NamaLengkap;?>" required>
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
		<div class="col-md-12"> <!-- Email -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Email</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="Email" name="Email" value="<?php echo $Email;?>" required>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- No. Telp -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">No. Telp</label>
				<div class="col-sm-8">
					<input type="text" class="form-control text-center" id="NoTelp" name="NoTelp" value="<?php echo $NoTelp;?>" required>
				</div>
			</div>
		</div>
		<div class="col-md-12"> <!-- User Level -->
			<div class="form-group row">
				<label class="col-form-label col-sm-4 text-sm-left">Level</label>
				<div class="col-sm-8">
					<select class="form-control id="UserLevelID" name="UserLevelID" required>
						<option value=""></option>
						<?php
							$level = new level_data();
							foreach ($level->level() as $row) {
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
	if ($modul == 'hapus_user') {
	?>
	<div class="row">
		<div class="col-md-12 text-center"> 
			Hapus User dengan ID : <?php echo $id;?> ?
		</div>
	</div>
	<?php
	} 
	if ($modul == 'lihat_user') {
	?>
	<div class="row">
		<div class="col-12">
			<table id="mytable" class="table table-borderless table-sm">
				<thead>
					<tr>
						<th></th>
						<th class="text-right"></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>UserID</td>
						<td class="text-right"><?php echo $id;?></td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td class="text-right"><?php echo $NamaLengkap;?></td>
					</tr>
					<tr>
						<td>Username</td>
						<td class="text-right"><?php echo $Username;?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td class="text-right"><?php echo $Email;?></td>
					</tr>
					<tr>
						<td>No Telp</td>
						<td class="text-right"><?php echo $NoTelp;?></td>
					</tr>
					<tr>
						<td>Tgl Buat</td>
						<td class="text-right"><?php echo $TglBuat;?></td>
					</tr>
					<tr>
						<td>Status</td>
						<td class="text-right">
							<?php 
								if ($StatusID == '12') {
								echo '<span class="badge badge-warning">'.$Status.'</span>';
								}
								else if ($StatusID == '11') {
								echo '<span class="badge badge-success">'.$Status.'</span>';
								}
							?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	
	
	<?php
	}
?>
---
<?php if ($modul == 'tambah_user') { ?>
	<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
	<button type="submit" class="btn btn-primary">Simpan</button>
	<?php 
	} 
	if ($modul == 'ubah_user') { 
	?>
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
