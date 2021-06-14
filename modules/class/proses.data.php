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

	
	class proses_berkas_data {
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
	
	class proses_berkas {
		function berkas($ProsesBerkasID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT a.ProsesBerkasID, a.ProsesID, a.BerkasID, b.KodeBerkas, a.MulaiProses, a.AkhirProses, a.StatusID, a.Catatan FROM proses_berkas a
					LEFT JOIN berkas b ON a.BerkasID = b.BerkasID
					WHERE a.ProsesBerkasID='$ProsesBerkasID'";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
	}

	class berkas_aktif {
		function berkas() {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT a.BerkasID, a.KodeBerkas FROM berkas a WHERE a.StatusID = '11'";
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
	}

	class aksi_proses {

		function tambah($id, $BerkasID, $MulaiProses, $AkhirProses, $StatusID, $Catatan, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "INSERT INTO proses_berkas (ProsesID, BerkasID, MulaiProses, AkhirProses, StatusID, Catatan, UserBuat, TglBuat) VALUES ('$id', '$BerkasID', '$MulaiProses', '$AkhirProses', '$StatusID', '$Catatan', '$UserID', NOW())";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal tambah data';
			}		
		}

		function ubah($id, $BerkasID, $MulaiProses, $AkhirProses, $StatusID, $Catatan, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE proses_berkas SET BerkasID='$BerkasID', MulaiProses='$MulaiProses', AkhirProses=' $AkhirProses', StatusID='$StatusID', Catatan='$Catatan', UserEdit='$UserID', TglEdit=NOW() WHERE ProsesBerkasID ='$id' ";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal ubah data';
			}		
		}

		function hapus($id) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "DELETE FROM proses_berkas WHERE ProsesBerkasID ='$id' ";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				echo 'sukses';
			} else {
				echo 'gagal ubah data';
			}		
		}
	}
	
?>
