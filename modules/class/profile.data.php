<?php
	class profil_data {
		function profil($UserID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT a.*, b.Username, b.UserLevelID, c.UserLevel FROM user_profile a
					LEFT JOIN user b ON a.UserID = b.UserID
					LEFT JOIN user_level c ON b.UserLevelID = c.UserLevelID
					WHERE a.UserID = '$UserID'";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
	}

	class aksi_profil {

		function tambah($NIP, $Pangkat, $Jabatan, $Nama, $TempatLahir, $TanggalLahir, $Email, $NoTelp, $Alamat, $Kota, $Provinsi, $Kodepos, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "INSERT INTO user_profile (UserID, NIP, PangkatID, JabatanID, Nama, TempatLahir, TanggalLahir, Email, NoTelp, Alamat, Kota, Provinsi, Kodepos, UserBuat, TglBuat) VALUES ('$UserID', '$NIP', '$Pangkat', '$Jabatan', '$Nama', '$TempatLahir', '$TanggalLahir', '$Email', '$NoTelp', '$Alamat', '$Kota', '$Provinsi', '$Kodepos', '$UserID', NOW())";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				$hasil = 'sukses';
			} else {
				$hasil = 'gagal tambah data';
			}
			return $hasil;	
		}

		function ubah($NIP, $Pangkat, $Jabatan, $Nama, $TempatLahir, $TanggalLahir, $Email, $NoTelp, $Alamat, $Kota, $Provinsi, $Kodepos, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE user_profile SET NIP='$NIP', PangkatID='$Pangkat', JabatanID='$Jabatan', Nama='$Nama', TempatLahir='$TempatLahir', TanggalLahir='$TanggalLahir', Email='$Email', NoTelp='$NoTelp', Alamat='$Alamat', Kota='$Kota', Provinsi='$Provinsi', Kodepos='$Kodepos', TglEdit=NOW(), UserEdit='$UserID' WHERE UserID ='$UserID' ";
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
	
	

?>
