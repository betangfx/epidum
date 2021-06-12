<?php
	class proses_data {
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

	class proses_berkas {
		function berkas($ProsesID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT a.ProsesBerkasID, a.BerkasID, b.KodeBerkas, a.MulaiProses, a.AkhirProses, a.StatusID FROM proses_berkas a
					LEFT JOIN berkas b ON a.BerkasID = b.BerkasID
					WHERE a.ProsesID='$ProsesID'";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
	}

	class aksi_proses {

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
	}
	
?>
