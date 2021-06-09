<?php
	class perkara_data {
		function perkara($PerkaraID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if ($PerkaraID != '') {
				$sql = "SELECT a.* FROM perkara a
						WHERE a.PerkaraID=$PerkaraID";
			} else {
				$sql = "SELECT a.* FROM perkara a";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
	}

	class aksi_perkara {

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

		function ubah($id, $NoSPDP, $Tersangka, $Pelanggaran, $TglTerima, $Catatan, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE perkara SET NoSPDP='$NoSPDP', Tersangka='$Tersangka', Pelanggaran='$Pelanggaran', TglTerima='$TglTerima', Catatan='$Catatan', UserEdit='$UserID', TglEdit=NOW() WHERE PerkaraID ='$id' ";
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
