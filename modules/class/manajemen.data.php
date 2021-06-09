<?php
	class manajemen_data {
		function manajemen($ManajemenID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if ($ManajemenID != '') {
				$sql = "SELECT a.ManajemenID, a.JaksaID, a.PerkaraID, b.NoSPDP, b.Tersangka, b.Pelanggaran, c.NamaLengkap, a.Catatan FROM manajemen a
						LEFT JOIN perkara b ON a.PerkaraID = b.PerkaraID
						LEFT JOIN user_profile c ON a.JaksaID = c.UserID
						WHERE a.ManajemenID=$ManajemenID";
			} else {
				$sql = "SELECT a.ManajemenID, a.PerkaraID, b.NoSPDP, b.Tersangka, b.Pelanggaran, c.NamaLengkap, a.Catatan FROM manajemen a
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
			$sql = "SELECT a.UserID, b.NamaLengkap FROM user a
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

	class aksi_manajemen {

		function tambah($id, $NoSPDP, $Tersangka, $Pelanggaran, $TglTerima, $Catatan, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "INSERT INTO perkara (NoSPDP, Tersangka, Pelanggaran, TglTerima, Catatan, UserBuat, TglBuat) VALUES ('$NoSPDP', '$Tersangka', '$Pelanggaran', '$TglTerima', '$Catatan', '$UserID', NOW())";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				$hasil = 'sukses';
			} else {
				$hasil = 'gagal tambah data';
			}
			return $hasil;	
		}

		function ubah($id, $JaksaID, $Catatan, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE manajemen SET JaksaID='$JaksaID', Catatan='$Catatan', UserBuat='$UserID', TglBuat=NOW() WHERE ManajemenID ='$id' ";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal ubah data';
			}		
		}

		function hapus($id){
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "DELETE FROM perkara WHERE PerkaraID='$id'";
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
