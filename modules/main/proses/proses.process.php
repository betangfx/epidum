<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id				= isset($_POST['ID']) 				? $_POST['ID'] 		: NULL;
	$ProsesID   	= isset($_POST['ProsesID']) 		? $_POST['ProsesID'] 	: NULL;
    $PerkaraID  	= isset($_POST['PerkaraID']) 		? $_POST['PerkaraID'] : NULL;
	$modul 			= isset($_POST['modul']) 			? $_POST['modul'] 	: NULL;
	$submodul		= isset($_POST['submodul']) 		? $_POST['submodul']: NULL;
	$UserID			= isset($_POST['UserID']) 			? $_POST['UserID'] 	: NULL;
	$BerkasID 		= isset($_POST['BerkasID']) 		? $_POST['BerkasID'] : NULL;
	$MulaiProses 	= isset($_POST['MulaiProses']) 		? $_POST['MulaiProses'] : NULL;
	$AkhirProses 	= isset($_POST['AkhirProses']) 		? $_POST['AkhirProses'] : NULL;
	$StatusID 		= isset($_POST['StatusID']) 		? $_POST['StatusID'] : NULL;
	$Catatan		= isset($_POST['Catatan']) 			? $_POST['Catatan'] : NULL;

	if ($modul == 'tambah_proses' && $submodul == 'berkas') {
		$Aksi = new aksi_proses();
		$result = $Aksi->tambah($id, $ProsesID, $PerkaraID, $BerkasID, $MulaiProses, $AkhirProses, $StatusID, $Catatan, $UserID);
		echo $result;
	}
	
	if ($modul == 'ubah_proses' && $submodul == 'berkas') {
		$Aksi = new aksi_proses();
		$result = $Aksi->ubah($id, $ProsesID, $PerkaraID, $BerkasID, $MulaiProses, $AkhirProses, $StatusID, $Catatan, $UserID);
		echo $result;
	}
	
	if ($modul == 'hapus_proses' && $submodul == 'berkas') {
		$Aksi = new aksi_proses();
		$result = $Aksi->hapus($id);
		echo $result;
	}

?>