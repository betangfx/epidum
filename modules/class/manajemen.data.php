<?php
	class manajemen_data {
		function proses($ProsesID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if ($ProsesID != '') {
				$sql = "SELECT a.ProsesID, a.JaksaID, a.PerkaraID, b.NoSPDP, b.Tersangka, b.Pelanggaran, c.Nama, a.Catatan FROM proses a
						LEFT JOIN perkara b ON a.PerkaraID = b.PerkaraID
						LEFT JOIN user_profile c ON a.JaksaID = c.UserID
						WHERE a.ProsesID=$ProsesID";
			} else {
				$sql = "SELECT a.ProsesID, a.PerkaraID, b.NoSPDP, b.Tersangka, b.Pelanggaran, c.Nama, a.Catatan FROM proses a
						LEFT JOIN perkara b ON a.PerkaraID = b.PerkaraID
						LEFT JOIN user_profile c ON a.JaksaID = c.UserID";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
	}

	class manajemen_user {
		function user_manajemen() {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT a.UserID, b.Nama FROM user a
					LEFT JOIN user_profile b ON a.UserID = b.UserID
					WHERE a.UserLevelID='3'";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
	}

	class manajemen_berkas {
		function berkas_manajemen() {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT a.BerkasID, a.KodeBerkas FROM berkas a
					WHERE a.StatusID='11'";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
	}

	class aksi_manajemen {

		// function tambah($id, $NoSPDP, $Tersangka, $Pelanggaran, $TglTerima, $Catatan, $UserID) {
		// 	$this->db 	= new database();
		// 	$conn 		= $this->db->koneksi;
		// 	$sql 		= "INSERT INTO perkara (NoSPDP, Tersangka, Pelanggaran, TglTerima, Catatan, UserBuat, TglBuat) VALUES ('$NoSPDP', '$Tersangka', '$Pelanggaran', '$TglTerima', '$Catatan', '$UserID', NOW())";
		// 	$result		= mysqli_query($conn,$sql);
		// 	if ($result) {
		// 		$hasil = 'sukses';
		// 	} else {
		// 		$hasil = 'gagal tambah data';
		// 	}
		// 	return $hasil;	
		// }

		function ubah($id, $JaksaID, $Catatan, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE proses SET JaksaID='$JaksaID', Catatan='$Catatan', UserBuat='$UserID', TglBuat=NOW() WHERE ProsesID ='$id' ";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal ubah data';
			}		
		}

		// function hapus($id){
		// 	$this->db 	= new database();
		// 	$conn 		= $this->db->koneksi;
		// 	$sql 		= "DELETE FROM perkara WHERE PerkaraID='$id'";
		// 	$result		= mysqli_query($conn,$sql);
		// 	if ($result) {
		// 		$hasil = 'sukses';
		// 	} else {
		// 		$hasil = 'gagal hapus data';
		// 	}
		// 	return $hasil;
		// }
	}
	
?>
