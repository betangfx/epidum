<?php
	include ($_SERVER['DOCUMENT_ROOT'] . '/config.php');
	$id				= isset($_POST['ID']) 				? 	$_POST['ID'] 			:   NULL;
	$modul 			= isset($_POST['modul']) 			? 	$_POST['modul'] 		:   NULL;
	$submodul		= isset($_POST['submodul']) 		? 	$_POST['submodul']		:   NULL;
	$UserID			= isset($_POST['UserID']) 			? 	$_POST['UserID'] 		:   NULL;
	$NIP			= isset($_POST['NIP'])				?	$_POST['NIP']			:   NULL;
	$Pangkat		= isset($_POST['Pangkat'])			?	$_POST['Pangkat']		:   NULL;
	$Jabatan		= isset($_POST['Jabatan'])			?	$_POST['Jabatan']		:   NULL;
	$Nama			= isset($_POST['Nama'])				?	$_POST['Nama']			:   NULL;
	$TempatLahir	= isset($_POST['TempatLahir'])		?	$_POST['TempatLahir']	:	NULL;
	$TanggalLahir	= isset($_POST['TanggalLahir'])		?	$_POST['TanggalLahir']	:	NULL;
	$Email      	= isset($_POST['Email'])	        ?	$_POST['Email']	        :	NULL;
	$NoTelp			= isset($_POST['NoTelp'])			?	$_POST['NoTelp']		:	NULL;
	$Alamat			= isset($_POST['Alamat'])			?	$_POST['Alamat']		:	NULL;
	$Kota			= isset($_POST['Kota'])		   		?	$_POST['Kota']	    	:	NULL;
	$Provinsi		= isset($_POST['Provinsi'])		   	?	$_POST['Provinsi']	    :	NULL;
	$Kodepos		= isset($_POST['Kodepos'])		   	?	$_POST['Kodepos']	    :	NULL;

	$profil = new profil_data();
	$row = count($profil->profil($UserID));
	if ($row > 0) {
			$Aksi = new aksi_profil();
			$result = $Aksi->ubah($NIP, $Pangkat, $Jabatan, $Nama, $TempatLahir, $TanggalLahir, $Email, $NoTelp, $Alamat, $Kota, $Provinsi, $Kodepos, $UserID);
			echo $result;
			
		} else	{
			$Aksi = new aksi_profil();
			$result = $Aksi->tambah($NIP, $Pangkat, $Jabatan, $Nama, $TempatLahir, $TanggalLahir, $Email, $NoTelp, $Alamat, $Kota, $Provinsi, $Kodepos, $UserID);
			echo $result;
		}
?>