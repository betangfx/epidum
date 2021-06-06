<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id			= isset($_POST['ID']) 		? $_POST['ID'] 		: NULL;
	$modul 		= isset($_POST['modul']) 	? $_POST['modul'] 	: NULL;
	$submodul	= isset($_POST['submodul']) ? $_POST['submodul']: NULL;
	$UserID		= isset($_POST['UserID']) 	?$_POST['UserID'] 	: NULL;

	if ($modul == 'tambah_master' && $submodul == 'jaksa') {
		$UserIDJaksa 	= isset($_POST['UserIDJaksa']) 		? $_POST['UserIDJaksa']	: NULL;
		$NIP 			= isset($_POST['NIP']) 				? $_POST['NIP'] 		: NULL;
		$JabatanID		= isset($_POST['JabatanID']) 		? $_POST['JabatanID'] 	: NULL;
		
		$jaksa 	= new master();
		$result = $jaksa->jaksa('create', $JabatanID, $Jabatan, $UserID);
		echo $result;
	}
	
	if ($modul == 'ubah_master' && $submodul == 'jaksa') {
		$JabatanID 	= isset($_POST['JabatanID']) 		? $_POST['JabatanID'] 		: NULL;
		$Jabatan 	= isset($_POST['Jabatan']) 			? $_POST['Jabatan'] 		: NULL;
		
		$jabatan 	= new master();
		$result = $jabatan->jabatan('update', $JabatanID, $Jabatan, $UserID);
		echo $result;
	}
	
	if ($modul == 'hapus_master' && $submodul == 'jaksa') {
		$JabatanID 	= $_POST['ID'];		
		$jabatan 	= new master();
		$result = $jabatan->jabatan('delete', $JabatanID, '', $UserID);
		echo $result;
	}

	// process untuk submodul jabatan
	
	if ($modul == 'tambah_master' && $submodul == 'jabatan') {
		$JabatanID 	= isset($_POST['JabatanID']) 		? $_POST['JabatanID'] 		: NULL;
		$Jabatan 	= isset($_POST['Jabatan']) 			? $_POST['Jabatan'] 		: NULL;
		
		$jabatan 	= new master();
		$result = $jabatan->jabatan('create', $JabatanID, $Jabatan, $UserID);
		echo $result;
	}
	
	if ($modul == 'ubah_master' && $submodul == 'jabatan') {
		$JabatanID 	= isset($_POST['JabatanID']) 		? $_POST['JabatanID'] 		: NULL;
		$Jabatan 	= isset($_POST['Jabatan']) 			? $_POST['Jabatan'] 		: NULL;
		
		$jabatan 	= new master();
		$result = $jabatan->jabatan('update', $JabatanID, $Jabatan, $UserID);
		echo $result;
	}
	
	if ($modul == 'hapus_master' && $submodul == 'jabatan') {
		$JabatanID 	= $_POST['ID'];		
		$jabatan 	= new master();
		$result = $jabatan->jabatan('delete', $JabatanID, '', $UserID);
		echo $result;
	}
?>