<?php
	class perkara_data {
		function perkara($PerkaraID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if (!empty($PerkaraID)) {
				$sql = "SELECT a.* FROM perkara a WHERE a.PerkaraID ='$PerkaraID'";
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
			$sql2 		= "INSERT INTO proses (PerkaraID) VALUES ('$new_id')";
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

	class aksi_perkara {

		function tambah($id, $NoSPDP, $Tersangka, $Pelanggaran, $TglTerima, $Catatan, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			//$sql 		= "INSERT INTO perkara (NoSPDP, Tersangka, Pelanggaran, TglTerima, Catatan, UserBuat, TglBuat) VALUES ('$NoSPDP', '$Tersangka', '$Pelanggaran', '$TglTerima', '$Catatan', '$UserID', NOW())";
			$sql 		= "UPDATE perkara SET NoSPDP='$NoSPDP', Tersangka='$Tersangka', Pelanggaran='$Pelanggaran', TglTerima='$TglTerima', Catatan='$Catatan' WHERE PerkaraID ='$id' ";
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
			$sql2 		= "DELETE FROM proses WHERE PerkaraID='$id'";
			$result		= mysqli_query($conn,$sql);
			$result2	= mysqli_query($conn,$sql2);
			if ($result && $result2) {
				$hasil = 'sukses';
			} else {
				$hasil = 'gagal hapus data';
			}
			return $hasil;
		}
	}
	
?>