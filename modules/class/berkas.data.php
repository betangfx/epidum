<?php
	class berkas_data {
		function berkas($BerkasID) {
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			if ($BerkasID != '') {
				$sql = "SELECT a.*, b.Status FROM berkas a 
						LEFT JOIN master_status b ON a.StatusID = b.StatusID
						WHERE a.BerkasID=$BerkasID";
			} else {
				$sql = "SELECT a.*, b.Status FROM berkas a
						LEFT JOIN master_status b ON a.StatusID = b.StatusID";
			}
			$query = mysqli_query($conn, $sql);
			while($result = mysqli_fetch_array($query,MYSQLI_ASSOC))
			{
				$hasil[] = $result;
				
			}
			return $hasil;
		}
	}

	class aksi_berkas {

		function tambah($id, $KodeBerkas, $Keterangan, $WaktuProses, $StatusID, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "INSERT INTO berkas (KodeBerkas, Keterangan, WaktuProses, StatusID, UserBuat, TglBuat) VALUES ('$KodeBerkas', '$Keterangan', '$WaktuProses', '$StatusID', '$UserID', NOW())";
			$result		= mysqli_query($conn,$sql);
			if ($result) {
				$hasil = 'sukses';
			} else {
				$hasil = 'gagal tambah data';
			}
			return $hasil;	
		}

		function ubah($id, $KodeBerkas, $Keterangan, $WaktuProses, $StatusID, $UserID) {
			$this->db 	= new database();
			$conn 		= $this->db->koneksi;
			$sql 		= "UPDATE berkas SET KodeBerkas='$KodeBerkas', Keterangan='$Keterangan', WaktuProses='$WaktuProses', StatusID='$StatusID',UserEdit='$UserID', TglEdit=NOW() WHERE BerkasID ='$id' ";
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
			$sql 		= "DELETE FROM berkas WHERE BerkasID='$id'";
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
