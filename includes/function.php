<?php
	class auth {
		
		function login($Username, $password) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT * FROM user WHERE Username='$Username' and Password='$password'"; 
			$query = mysqli_query($conn,$sql);
			while($result = mysqli_fetch_array($query)){
				$hasil[] = $result;
			}
			return $hasil;
		}	
		
		function register($Nama, $Email, $Username, $Password, $NoTelp) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$sql 	= "SELECT * FROM user WHERE Username='$Username'"; 
			$query 	= mysqli_query($conn,$sql);
			$result = mysqli_num_rows($query);
			if ($result <= 0 ) {
				$sql 	= "INSERT INTO user (Nama, Email, Username, Password, NoTelp, UserLevel) VALUES ('$Nama', '$Email', '$Username', '$Password', '$NoTelp', '5')"; 
				$query 	= mysqli_query($conn,$sql);
				if($query) {
					echo 'sukses';
				} 
				else {
					echo 'gagal';
				}
			}
			else {
				echo 'user_tidak_tersedia';
			}
		}
	}	
	
	class left_menu {
		function getgroupmenu() {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT * FROM app_modul_group";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
		
		function getusermenuList($UserLevelID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$sql = "SELECT ModulID FROM user_hakakses WHERE UserLevelID = '$UserLevelID'";
			$query = mysqli_query( $conn , $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil = $result['ModulID'];
			}
			
			return $hasil;
		}
		
		function getusermenu($GroupMenuID, $UserMenuIDList) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT * FROM app_modul WHERE GroupModulID = $GroupMenuID AND ModulID IN ($UserMenuIDList) ORDER BY Urutan ASC";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}
	}

	class module {
		function getusermodul($userAccessPage) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$text = "SELECT * FROM app_modul WHERE Link LIKE 'index.php?page=$userAccessPage'";
			$query = mysqli_query($conn, $text);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
			}
			return $hasil;
		}
	}
	

	class No {
		function Perkara($new,$UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			// Check No
			$today 		=	date('Y-m-d');
			$sql 	= "SELECT MAX(PerkaraID) AS PerkaraID FROM perkara WHERE TglBuat LIKE '$today%'";
			$query 	= 	mysqli_query($conn,$sql);
			while($result = mysqli_fetch_array($query)){
				$PerkaraID = $result['PerkaraID'];
			}
			//Buat No
			$SubStrNo		= substr($PerkaraID, 7, 2);
			$NoUrutPerkara 	= (int)$SubStrNo;
			$NoUrutPerkara++;
			$pref 		= 	'P';
			$day		=	date('ymd');
			$new_id		=	$pref.$day.sprintf('%02s', $NoUrutPerkara);
			//Masukan ke db
			$sql 		= "INSERT INTO perkara (PerkaraID, UserBuat, TglBuat) VALUES ('$new_id', '$UserID', NOW())";
			$sql2 		= "INSERT INTO manajemen (PerkaraID) VALUES ('$new_id')";
			$result		= 	mysqli_query($conn, $sql);
			$result2		= 	mysqli_query($conn, $sql2);
			if($result && $result2) {
				return $new_id;
			} else {
				echo 'gagal tambah nomorperkara';
				echo $new_id;
			}
		}
	}
		
	?>