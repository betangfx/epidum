<?php
	/* ePidum
		*
		* Developed by betangit.com
		* Copyright (c) 2021, BetangIT 
		*
		* Author: Karisma Putra Purwanto, S.Kom
	*/
	/*---------------- Web Mode ----------------*/
	$site_mode 			=	'prod'; // 
	/*---------------- TimeZone ----------------*/
	date_default_timezone_set('Asia/Jakarta');
	/*---------------- Site Config ----------------*/
	if ($site_mode == 'live') {
		$site_url			= "https://epidum.kejari-palangkaraya.go.id";	
	} else if ($site_mode == 'prod') {
		$site_url			= "http://epidum.betangit.com";
	} else {
		echo 'Aplikasi Sedang Dalam Tahap Perbaikan';
	}
	$vendors			= "BetangIT";
	$appname			= "e-Pidum";
	$version			= "0.1";
	
	/*---------------- Folder Config ----------------*/
	
	$site_folder		= $_SERVER['DOCUMENT_ROOT'] . '/';
	$site_assets		= $site_folder . 'assets/';
	$img_folder			= $site_folder . 'images/';
	$inc_folder			= $site_folder . 'includes/';
	$mod_folder			= $site_folder . 'modules/';
	$class_module		= $mod_folder . 'class/*';
	
	/*---------------- Required Files ----------------*/
	if ($site_mode == 'live') {
		define('db', dirname(__FILE__));
		include $inc_folder . 'live-db.php';
		include $inc_folder . 'live-dbold.php';
	} else if ($site_mode == 'prod') {
		define('db', dirname(__FILE__));
		include $inc_folder . 'prod-db.php';
		include $inc_folder . 'prod-dbold.php';
	}
	include $inc_folder . 'function.php';
	foreach(glob($class_module) as $file) 
	{
		include $file;
	}
?>