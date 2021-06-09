<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id				= isset($_POST['ID']) 				? $_POST['ID'] 		: NULL;
	$modul 			= isset($_POST['modul']) 			? $_POST['modul'] 	: NULL;
	$submodul		= isset($_POST['submodul']) 		? $_POST['submodul']: NULL;
	$UserID			= isset($_POST['UserID']) 			? $_POST['UserID'] 	: NULL;
	$NoSPDP 		= isset($_POST['NoSPDP']) 			? $_POST['NoSPDP'] 	: NULL;
	$Tersangka		= isset($_POST['Tersangka']) 		? $_POST['Tersangka'] : NULL;
	$Pelanggaran	= isset($_POST['Pelanggaran']) 		? $_POST['Pelanggaran'] : NULL;
	$TglTerima		= isset($_POST['TglTerima']) 		? $_POST['TglTerima'] : NULL;
	$Catatan		= isset($_POST['Catatan']) 			? $_POST['Catatan'] : NULL;

	if ($modul == 'tambah_perkara' && $submodul == 'umum') {
		$Aksi = new aksi_perkara();
		$result = $Aksi->tambah($id, $NoSPDP, $Tersangka, $Pelanggaran, $TglTerima, $Catatan, $UserID);
		echo $result;
	}
	
	if ($modul == 'ubah_perkara' && $submodul == 'umum') {
		$Aksi = new aksi_perkara();
		$result = $Aksi->ubah($id, $NoSPDP, $Tersangka, $Pelanggaran, $TglTerima, $Catatan, $UserID);
		echo $result;
	}
	
	if ($modul == 'hapus_perkara' && $submodul == 'umum') {
		$Aksi = new aksi_perkara();
		$result = $Aksi->hapus($id);
		echo $result;
	}

?>