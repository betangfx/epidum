<?php

	defined('db') or exit("No direct access allowed");

	
	// Database OOP Note: Gunakan Ini untuk modul selanjutnya
	class database {
		
		var $host = 'localhost';
		var $Username = 'root';
		var $password = '';
		var $database = 'epidum';
		var $koneksi = '';
		function __construct(){
			$this->koneksi = mysqli_connect($this->host, $this->Username, $this->password,$this->database);
			if (mysqli_connect_errno()){
				echo 'Koneksi database gagal! Pesan Error: ' . mysqli_connect_error();
			}
		}
	}
?>