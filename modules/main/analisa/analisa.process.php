<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id				= isset($_POST['ID']) 								? $_POST['ID'] 		: NULL;
	$AnalisaID 		= isset($_POST['AnalisaID']) 						? $_POST['AnalisaID'] 	: NULL;
	$modul 			= isset($_POST['modul']) 							? $_POST['modul'] 	: NULL;
	$submodul		= isset($_POST['submodul']) 						? $_POST['submodul']: NULL;
	$getData		= isset($_POST['getData']) 							? $_POST['getData'] : NULL;
	$UserID			= isset($_POST['UserID']) 							? $_POST['UserID'] 	: NULL;
	$Symbol			= isset($_POST['Symbol']) 							? $_POST['Symbol']	 	: NULL;
	$JangkaWaktu	= isset($_POST['JangkaWaktu']) 						? $_POST['JangkaWaktu'] : NULL;
	$Arah			= isset($_POST['Arah']) 							? $_POST['Arah'] 		: NULL;
	$AnalisaSimple	= isset($_POST['AnalisaSimple']) 					? $_POST['AnalisaSimple'] : NULL;
	$AreaSupply 	= isset($_POST['AreaSupply']) 						? $_POST['AreaSupply'] : NULL;
	$TglAreaSupply	= isset($_POST['TglAreaSupply']) 					? $_POST['TglAreaSupply'] : NULL;
	$TestAreaSupply	= isset($_POST['TestAreaSupply']) 					? $_POST['TestAreaSupply'] : NULL;
	$AreaDemand 	= isset($_POST['AreaDemand']) 						? $_POST['AreaDemand'] : NULL;
	$TglAreaDemand 	= isset($_POST['TglAreaDemand']) 					? $_POST['TglAreaDemand'] : NULL;
	$TestAreaDemand = isset($_POST['TestAreaDemand']) 					? $_POST['TestAreaDemand'] : NULL;
	$AreaResisten 	= isset($_POST['AreaResisten']) 					? $_POST['AreaResisten'] : NULL;
	$TglAreaResisten= isset($_POST['TglAreaResisten']) 					? $_POST['TglAreaResisten'] : NULL;
	$TestAreaResisten= isset($_POST['TestAreaResisten']) 				? $_POST['TestAreaResisten'] : NULL;
	$AreaSupport 	= isset($_POST['AreaSupport']) 						? $_POST['AreaSupport'] : NULL;
	$TglAreaSupport = isset($_POST['TglAreaSupport']) 					? $_POST['TglAreaSupport'] : NULL;
	$TestAreaSupport= isset($_POST['TestAreaSupport']) 					? $_POST['TestAreaSupport'] : NULL;
	$Rangkaian		= isset($_POST['Rangkaian']) 						? $_POST['Rangkaian'] 	: NULL;
	$Struktur		= isset($_POST['Struktur']) 						? $_POST['Struktur'] 	: NULL;
	$Tipe			= isset($_POST['Tipe']) 							? $_POST['Tipe'] 		: NULL;
	$Pola			= isset($_POST['Pola']) 							? $_POST['Pola'] 		: NULL;
	$Posisi			= isset($_POST['Posisi']) 							? $_POST['Posisi'] 		: NULL;
	$Derajat		= isset($_POST['Derajat']) 							? $_POST['Derajat'] 	: NULL;
	$KondisiAturan	= array_filter(isset($_POST['KondisiAturan'])		? $_POST['KondisiAturan'] 		: array()); 	
	$Aturan			= json_encode($KondisiAturan);
	$NilaiSesuai	= isset($_POST['NilaiSesuai']) 						? $_POST['NilaiSesuai'] 		: NULL;
	$CatatanSebelum	= isset($_POST['CatatanSebelum']) 					? $_POST['CatatanSebelum'] 		: NULL;
	$CatatanSesudah	= isset($_POST['CatatanSesudah']) 					? $_POST['CatatanSesudah'] 		: NULL;
	$CaptureSebelum	= isset($_POST['CaptureSebelum']) 					? $_POST['CaptureSebelum'] 		: NULL;
	$CaptureSesudah	= isset($_POST['CaptureSesudah']) 					? $_POST['CaptureSesudah'] 		: NULL;
	$Status			= isset($_POST['Status']) 							? $_POST['Status'] 				: NULL;
	if ($modul == 'tambah_analisa' && $submodul == 'simple') {
		$Aksi 	= new aksi();
		$result = $Aksi->tambah_simple($Symbol, $JangkaWaktu, $Arah, $AnalisaSimple, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $Status, $AnalisaID, $UserID);
		echo $result;
	}
	if ($modul == 'tambah_analisa' && $submodul == 'snd') {
		$Aksi 	= new aksi();
		$result = $Aksi->tambah_snd($Symbol, $JangkaWaktu, $Arah, $AreaSupply, $TglAreaSupply, $TestAreaSupply, $AreaDemand, $TglAreaDemand, $TestAreaDemand, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $Status, $AnalisaID, $UserID);
		echo $result;
	}
	if ($modul == 'tambah_analisa' && $submodul == 'snr') {
		$Aksi 	= new aksi();
		$result = $Aksi->tambah_snr($Symbol, $JangkaWaktu, $Arah, $AreaResisten, $TglAreaResisten, $TestAreaResisten, $AreaSupport, $TglAreaSupport, $TestAreaSupport, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $Status, $AnalisaID, $UserID);
		echo $result;
	}
	if ($modul == 'tambah_analisa' && $submodul == 'elliott') {
		$Aksi 	= new aksi();
		$result = $Aksi->tambah_elliot($Symbol, $JangkaWaktu, $Arah, $Rangkaian, $Struktur, $Tipe, $Pola, $Posisi, $Derajat, $Aturan, $NilaiSesuai, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $Status, $AnalisaID, $UserID);
		echo $result;
	}
	if ($modul == 'ubah_analisa' && $submodul == 'simple') {
		$Aksi 	= new aksi();
		$result = $Aksi->ubah_simple($Symbol, $JangkaWaktu, $Arah, $AnalisaSimple, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $Status, $AnalisaID, $UserID);
		echo $result;
	}
	if ($modul == 'ubah_analisa' && $submodul == 'snd') {
		$Aksi 	= new aksi();
		$result = $Aksi->ubah_snd($Symbol, $JangkaWaktu, $Arah, $AreaSupply, $TglAreaSupply, $TestAreaSupply, $AreaDemand, $TglAreaDemand, $TestAreaDemand, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $Status, $AnalisaID, $UserID);
		echo $result;
	}
	if ($modul == 'ubah_analisa' && $submodul == 'snr') {
		$Aksi 	= new aksi();
		$result = $Aksi->ubah_snr($Symbol, $JangkaWaktu, $Arah, $AreaResisten, $TglAreaResisten, $TestAreaResisten, $AreaSupport, $TglAreaSupport, $TestAreaSupport, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $Status, $AnalisaID, $UserID);
		echo $result;
	}
	if ($modul == 'ubah_analisa' && $submodul == 'elliott') {
		$Aksi 	= new aksi();
		$result = $Aksi->ubah_elliot($Symbol, $JangkaWaktu, $Arah, $Rangkaian, $Struktur, $Tipe, $Pola, $Posisi, $Derajat, $Aturan, $NilaiSesuai, $CatatanSebelum, $CatatanSesudah, $CaptureSebelum, $CaptureSesudah, $Status, $AnalisaID, $UserID);
		echo $result;
	}
	if ($modul == 'hapus_analisa') {
		$Aksi 	= new aksi();
		$result = $Aksi->hapus($submodul,$id,$UserID);
		echo $result;
	}

	if ($getData == 'Struktur') {
		$Struktur = new ewp();
		$result = $Struktur->struktur_by_parent($id);
		echo json_encode($result);
	}
	if ($getData == 'Tipe') {
		$Tipe = new ewp();
		$result = $Tipe->tipe_by_parent($id);
		echo json_encode($result);
	}
	
	if ($getData == 'Pola') {
		$Pola = new ewp();
		$result = $Pola->pola_by_parent($Rangkaian,$Struktur,$id);
		echo json_encode($result);
	}
	
	if ($getData == 'Posisi') {
		$Posisi = new ewp();
		$result = $Posisi->posisi_by_parent($Rangkaian,$Struktur,$id);
		echo json_encode($result);
	}
	
	if ($getData == 'Aturan') {
		$AturanID = new ewp();
		$result = $AturanID->aturan_by_parent($Rangkaian,$Struktur,$id);
		echo json_encode($result);
	}
?>	