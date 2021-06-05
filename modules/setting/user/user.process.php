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
	$StatusID		= isset($_POST['StatusID'])		    ?	$_POST['StatusID']	    :	NULL;

	if ($modul == 'tambah_user') {
		$Aksi = new aksi_user();
		$result = $Aksi->tambah($id, $NamaLengkap, $Username, $Password, $Email, $NoTelp, $UserLevelID, $StatusID, $UserID);
		echo $result;
	}
	if ($modul == 'ubah_user') {
		$Aksi = new aksi_user();
		$result = $Aksi->ubah($id, $NamaLengkap, $Username, $Password, $Email, $NoTelp, $UserLevelID, $StatusID, $UserID);
		echo $result;
	}
	if ($modul == 'hapus_user') {
		$Aksi = new aksi_user();
		$result = $Aksi->hapus($id);
		echo $result;
	}
?>	