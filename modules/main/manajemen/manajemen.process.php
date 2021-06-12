<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id				= isset($_POST['ID']) 				? $_POST['ID'] 		: NULL;
	$modul 			= isset($_POST['modul']) 			? $_POST['modul'] 	: NULL;
	$submodul		= isset($_POST['submodul']) 		? $_POST['submodul']: NULL;
	$UserID			= isset($_POST['UserID']) 			? $_POST['UserID'] 	: NULL;
	$JaksaID 		= isset($_POST['JaksaID']) 			? $_POST['JaksaID'] : NULL;
	$Catatan		= isset($_POST['Catatan']) 			? $_POST['Catatan'] : NULL;

	// if ($modul == 'tambah_manajemen' && $submodul == 'umum') {
	// 	$Aksi = new aksi_manajemen();
	// 	$result = $Aksi->tambah($id, $JaksaID, $Catatan, $UserID);
	// 	echo $result;
	// }
	
	if ($modul == 'ubah_manajemen' && $submodul == 'umum') {
		$Aksi = new aksi_manajemen();
		$result = $Aksi->ubah($id, $JaksaID, $Catatan, $UserID);
		echo $result;
	}
	
	// if ($modul == 'hapus_manajemen' && $submodul == 'umum') {
	// 	$Aksi = new aksi_manajemen();
	// 	$result = $Aksi->hapus($id);
	// 	echo $result;
	// }

?>