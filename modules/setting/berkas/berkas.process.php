<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id			= isset($_POST['ID']) 		? $_POST['ID'] 		: NULL;
	$modul 		= isset($_POST['modul']) 	? $_POST['modul'] 	: NULL;
	$submodul	= isset($_POST['submodul']) ? $_POST['submodul']: NULL;
	$UserID		= isset($_POST['UserID']) 	?$_POST['UserID'] 	: NULL;
	$KodeBerkas 	= isset($_POST['KodeBerkas']) 	? $_POST['KodeBerkas']	: NULL;
	$Keterangan 	= isset($_POST['Keterangan']) 	? $_POST['Keterangan'] 	: NULL;
	$WaktuProses	= isset($_POST['WaktuProses']) 	? $_POST['WaktuProses'] : NULL;
	$StatusID		= isset($_POST['StatusID']) 	? $_POST['StatusID'] : NULL;

	if ($modul == 'tambah_berkas' && $submodul == 'umum') {
		$Aksi = new aksi_berkas();
		$result = $Aksi->tambah($id, $KodeBerkas, $Keterangan, $WaktuProses, $StatusID, $UserID);
		echo $result;
	}
	
	if ($modul == 'ubah_berkas' && $submodul == 'umum') {
		$Aksi = new aksi_berkas();
		$result = $Aksi->ubah($id, $KodeBerkas, $Keterangan, $WaktuProses, $StatusID, $UserID);
		echo $result;
	}
	
	if ($modul == 'hapus_berkas' && $submodul == 'umum') {
		$Aksi = new aksi_berkas();
		$result = $Aksi->hapus($id);
		echo $result;
	}

?>