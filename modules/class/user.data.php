<?php
	class user_data {
		function user($UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if (!empty($UserID)) {
				$sql = "SELECT a.*, b.UserLevel, b.UserLevelID, c.Status FROM user a
						LEFT JOIN user_level b ON a.UserLevel = b.UserLevelID
						LEFT JOIN status c ON a.StatusID = c.StatusID WHERE UserID=$UserID";
			} else {
				$sql = "SELECT a.*, b.UserLevel, b.UserLevelID, c.Status FROM user a
				LEFT JOIN user_level b ON a.UserLevel = b.UserLevelID
				LEFT JOIN status c ON a.StatusID = c.StatusID";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
	}

	class aksi_user {

		function tambah($id, $NamaLengkap, $Username, $Password, $Email, $NoTelp, $UserLevelID, $StatusID, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "INSERT INTO user (Nama, Username, Password, Email, NoTelp, UserLevel, StatusID, UserBuat, TglBuat) VALUES ('$NamaLengkap', '$Username', MD5('$Password'), '$Email', '$NoTelp', '$UserLevelID', '$StatusID', '$UserID', NOW())";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				$hasil = 'sukses';
			} else {
				$hasil = 'gagal tambah data';
			}
			return $hasil;	
		}

		function ubah($id, $NamaLengkap, $Username, $Password, $Email, $NoTelp, $UserLevelID, $StatusID, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			if (!empty($Password)) {
				$newpass = md5($Password);
				$sql 		= "UPDATE user SET Nama='$NamaLengkap', Username='$Username', Password='$newpass', Email='$Email', NoTelp='$NoTelp', UserLevel='$UserLevelID', StatusID='$StatusID', TglEdit=NOW(), UserEdit='$UserID' WHERE UserID ='$id' ";
			} else {
				$sql 		= "UPDATE user SET Nama='$NamaLengkap', Username='$Username', Email='$Email', NoTelp='$NoTelp', UserLevel='$UserLevelID', StatusID='$StatusID', TglEdit=NOW(), UserEdit='$UserID' WHERE UserID ='$id' ";
			}
			
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal ubah data';
			}		
		}

		function hapus($UserID){
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "DELETE FROM user WHERE UserID='$UserID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				$hasil = 'sukses';
			} else {
				$hasil = 'gagal hapus data';
			}
			return $hasil;
		}
	}
	
	class level_data {
		function level($UserLevelID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if (!empty($UserLevelID)) {
				$sql = "SELECT * FROM user_level WHERE UserLevelID=$UserLevelID";
			}
			else {
				$sql = "SELECT * FROM user_level";
			}
			
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
	}

	class aksi_level {

		function tambah($UserLevelID, $UserLevel, $StatusID, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "INSERT INTO user_level (UserLevelID, UserLevel, StatusID, UserBuat, TglBuat) VALUES ('$UserLevelID', '$UserLevel', '$StatusID', '$UserID', NOW())";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				$hasil = 'sukses';
			} else {
				$hasil = 'gagal tambah data';
			}
			return $hasil;	
		}

		function ubah($id, $UserLevelID, $UserLevel, $StatusID, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE user_level SET UserLevelID='$UserLevelID', UserLevel='$UserLevel', StatusID='$StatusID', UserEdit='$UserID', TglEdit=NOW() WHERE UserLevelID='$id' ";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal ubah data';
			}	
		}

		function hapus($UserLevelID){
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "DELETE FROM user_level WHERE UserLevelID='$UserLevelID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				$hasil = 'sukses';
			} else {
				$hasil = 'gagal hapus data';
			}
			return $hasil;
		}
	}

	class hakakses_data {
		function hakakses($HakAksesID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if (!empty($HakAksesID)) {
			$sql = "SELECT a.HakAksesID, a.UserLevelID, b.UserLevel, a.ModulID FROM user_hakakses a 
					LEFT JOIN user_level b ON a.UserLevelID = b.UserLevelID
					WHERE a.HakAksesID = $HakAksesID";
			} else {
			$sql = "SELECT a.HakAksesID, a.UserLevelID, b.UserLevel, a.ModulID FROM user_hakakses a 
				LEFT JOIN user_level b ON a.UserLevelID = b.UserLevelID";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}

		function hakaksesmodul($ModulID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT * FROM app_modul WHERE ModulID IN ($ModulID)";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
	}

	class aksi_hakakses {

		function tambah($UserLevelID, $Modul, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "INSERT INTO user_hakakses (UserLevelID, ModulID, UserBuat, TglBuat) VALUES ('$UserLevelID', '$Modul', '$UserID', NOW())";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				$hasil = 'sukses';
			} else {
				$hasil = 'gagal tambah data';
			}
			return $hasil;	
		}

		function ubah($id, $UserLevelID, $Modul, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE user_hakakses SET UserLevelID='$UserLevelID', ModulID='$Modul', UserEdit='$UserID', TglEdit=NOW() WHERE HakAksesID='$id' ";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal ubah data';
			}	
		}

		function hapus($HakAksesID){
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "DELETE FROM user_hakakses WHERE HakAksesID='$HakAksesID'";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				$hasil = 'sukses';
			} else {
				$hasil = 'gagal hapus data';
			}
			return $hasil;
		}
	}

?>
