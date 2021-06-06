<?php
	class groups{
		
		function group_list() 
		{
			$query = "SELECT * FROM app_modul_group"; 
			$this->db = new database(); 
			$data = mysqli_query($this->db->koneksi,$query);
			$hasil = array();
			while($row = mysqli_fetch_array($data)){
				$hasil[] = $row;
			}
			return $hasil;
		}
	}

	class moduls{
		function modul_list($GroupModulID) 
		{
			$query = "SELECT * FROM app_modul WHERE GroupModulID=$GroupModulID"; 
			$this->db = new database(); 
			$data = mysqli_query($this->db->koneksi,$query);
			$hasil = array();
			while($row = mysqli_fetch_array($data)){
				$hasil[] = $row;
			}
			return $hasil;
		}
	}
?>
