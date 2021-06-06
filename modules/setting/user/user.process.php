<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id				= isset($_POST['ID']) 				? 	$_POST['ID'] 			:   NULL;
	$modul 			= isset($_POST['modul']) 			? 	$_POST['modul'] 		:   NULL;
	$submodul		= isset($_POST['submodul']) 		? 	$_POST['submodul']		:   NULL;
	$UserID			= isset($_POST['UserID']) 			? 	$_POST['UserID'] 		:   NULL;
	$NamaLengkap	= isset($_POST['NamaLengkap'])		?	$_POST['NamaLengkap']	:   NULL;
	$Username		= isset($_POST['Username'])		    ?	$_POST['Username']		:	NULL;
	$Password		= isset($_POST['Password'])			?	$_POST['Password']		:	NULL;
	$Email      	= isset($_POST['Email'])	        ?	$_POST['Email']	        :	NULL;
	$NoTelp			= isset($_POST['NoTelp'])			?	$_POST['NoTelp']		:	NULL;
	$UserLevelID	= isset($_POST['UserLevelID'])		?	$_POST['UserLevelID']	:	NULL;
	$UserLevel		= isset($_POST['UserLevel'])		?	$_POST['UserLevel']		:	NULL;
	$ModulID		= isset($_POST['ModulID'])			?	$_POST['ModulID']		:	NULL;
	$StatusID		= isset($_POST['StatusID'])		    ?	$_POST['StatusID']	    :	NULL;

	if ($modul == 'tambah_user' && $submodul == 'login') {
		$Aksi = new aksi_user();
		$result = $Aksi->tambah($id, $NamaLengkap, $Username, $Password, $Email, $NoTelp, $UserLevelID, $StatusID, $UserID);
		echo $result;
	}
	if ($modul == 'ubah_user' && $submodul == 'login') {
		$Aksi = new aksi_user();
		$result = $Aksi->ubah($id, $NamaLengkap, $Username, $Password, $Email, $NoTelp, $UserLevelID, $StatusID, $UserID);
		echo $result;
	}
	if ($modul == 'hapus_user' && $submodul == 'login') {
		$Aksi = new aksi_user();
		$result = $Aksi->hapus($id);
		echo $result;
	}

	if ($modul == 'tambah_user' && $submodul == 'level') {
		$Aksi = new aksi_level();
		$result = $Aksi->tambah($UserLevelID, $UserLevel, $StatusID, $UserID);
		echo $result;
	}
	if ($modul == 'ubah_user' && $submodul == 'level') {
		$Aksi = new aksi_level();
		$result = $Aksi->ubah($id, $UserLevelID, $UserLevel, $StatusID, $UserID);
		echo $result;

	}
	if ($modul == 'hapus_user' && $submodul == 'level') {
		$Aksi = new aksi_level();
		$result = $Aksi->hapus($id);
		echo $result;
	}

	if ($modul == 'tambah_user' && $submodul == 'akses') {
		$Modul = implode(',',$ModulID);
		$Aksi = new aksi_hakakses();
		$result = $Aksi->tambah($UserLevelID, $Modul, $UserID);
		echo $result;
	}
	if ($modul == 'ubah_user' && $submodul == 'akses') {
		$Modul = implode(',',$ModulID);
		$Aksi = new aksi_hakakses();
		$result = $Aksi->ubah($id, $UserLevelID, $Modul, $UserID);
		echo $result;

	}
	if ($modul == 'hapus_user' && $submodul == 'akses') {
		$Aksi = new aksi_hakakses();
		$result = $Aksi->hapus($id);
		echo $result;
	}
?>	