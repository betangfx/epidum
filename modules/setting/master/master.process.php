<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id			= isset($_POST['ID']) 		? $_POST['ID'] 		: NULL;
	$modul 		= isset($_POST['modul']) 	? $_POST['modul'] 	: NULL;
	$submodul	= isset($_POST['submodul']) ? $_POST['submodul']: NULL;
	$UserID		= isset($_POST['UserID']) 	?$_POST['UserID'] 	: NULL;
	
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

	if ($modul == 'tambah_akun' && $submodul == 'transaksi') {
		$AkunID 		= $_POST['ID'];
		$TransaksiID 	= $_POST['Transaksi'];
		$Nominal 		= $_POST['Nominal'];
		$TglTransaksi 	= $_POST['TglTransaksi'];
		
		$transaksi 	= new settingAkun(); 
		$result = $transaksi->infoTransaksi('create', '', $AkunID, $TransaksiID, $Nominal, $TglTransaksi, $UserID);
		echo $result;
	}
	
	if ($modul == 'ubah_akun' && $submodul == 'transaksi') {
		$AkunTransaksiID 	= $_POST['ID'];
		$TransaksiID 		= $_POST['Transaksi'];
		$Nominal 			= $_POST['Nominal'];
		$TglTransaksi 		= $_POST['TglTransaksi'];
		
		$transaksi 	= new settingAkun(); 
		$result = $transaksi->infoTransaksi('update', $AkunTransaksiID, '', $TransaksiID, $Nominal, $TglTransaksi, $UserID);
		echo $result;
	}
	
	if ($modul == 'hapus_akun' && $submodul == 'transaksi') {
		$AkunTransaksiID 	= $_POST['ID'];
		
		$transaksi 	= new settingAkun(); 
		$result = $transaksi->infoTransaksi('delete', $AkunTransaksiID, '', '', '', '', $UserID);
		echo $result;
	}
?>