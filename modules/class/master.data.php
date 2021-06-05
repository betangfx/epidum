<?php
	class master {
		
		function ringkasanAkun($UserID) 
		{
			$this->db = new database();
			$conn = $this->db->koneksi;
			$query = "SELECT a.AkunID, a.UserID,
			COALESCE(SUM(CASE WHEN a.TransaksiID = '1' then a.Nominal end), 0) as TotalTambahDana,
			COALESCE(SUM(CASE WHEN a.TransaksiID = '2' then a.Nominal end), 0) as TotalTarikDana,
			b.SaldoAkhir
			FROM user_akun_transaksi a
			LEFT JOIN user_akun_saldo b ON a.UserID = b.UserID
			WHERE a.UserID ='$UserID'"; 
			$data = mysqli_query($conn,$query);
			while($row = mysqli_fetch_array($data)){
				$hasil[] = $row;
			}
			return $hasil;
		}
		
		function jabatan($action, $JabatanID, $Jabatan, $UserID)
		{
			$this->db = new database();
			$conn = $this->db->koneksi;
			if ($action == 'create') {
				$sql = "INSERT INTO master_jabatan (Jabatan, TglBuat, UserBuat) VALUES ('$Jabatan', NOW(), '$UserID')";
				$query = mysqli_query($conn, $sql);
				if($query){
					$hasil = 'sukses';
					} else {
					$hasil = 'gagal_tambah_data';
				}
				return $hasil;
				} 
				else if  ($action == 'read') {
					$hasil = array();
					if (!empty($JabatanID)) {
						$sql = "SELECT a.JabatanID, a.Jabatan FROM master_jabatan a WHERE a.JabatanID=$JabatanID";
					} else {
						$sql = "SELECT a.JabatanID, a.Jabatan FROM master_jabatan a";
					}
					$query = mysqli_query($conn,$sql);
					while($result = mysqli_fetch_array($query)){
						$hasil[] = $result;
					}
					return $hasil;
				} 
				else if  ($action == 'update') {
					$sql = "UPDATE master_jabatan SET Jabatan = '$Jabatan', TglEdit = NOW(), UserEdit = '$UserID' WHERE JabatanID='$JabatanID'"; 
					$query = mysqli_query($conn,$sql);
					if($query){
						$hasil = 'sukses';
						} else {
						$hasil = 'gagal_tambah_data';
					}
					return $hasil;
				} 
				else if  ($action == 'delete') {
					$sql = "DELETE FROM master_jabatan WHERE JabatanID='$JabatanID'"; 
					$query = mysqli_query($conn,$sql);
					if($query){
						$hasil = 'sukses';
						} else {
						$hasil = 'gagal_tambah_data';
					}
					return $hasil;
				}
		}
		
		function infoTransaksi($action, $AkunTransaksiID, $AkunID, $TransaksiID, $Nominal, $TglTransaksi, $UserID)
		{
			$this->db = new database();
			$conn = $this->db->koneksi;
			if ($action == 'create') {
				$sql = "INSERT INTO user_akun_transaksi (AkunID, UserID, TransaksiID, Nominal, TglTransaksi, UserBuat) VALUES ('$AkunID', '$UserID', '$TransaksiID', '$Nominal', '$TglTransaksi', '$UserID')";
				$query = mysqli_query($conn, $sql);
				if($query){
					$hasil = 'sukses';
					} else {
					$hasil = 'gagal_tambah_data';
				}
				return $hasil;
			}
			else if ($action == 'read') {
				$hasil = array();
				$sql = "SELECT a.AkunID, a.TransaksiID, a.Nominal, a.TglTransaksi, b.Transaksi FROM user_akun_transaksi a 
				LEFT JOIN transaksi b ON a.TransaksiID = b.TransaksiID
				WHERE a.UserID = '$UserID'"; 
				$query = mysqli_query($conn,$sql);
				while($result = mysqli_fetch_array($query)){
					$hasil[] = $result;
				}
				return $hasil;
			}
			else if ($action == 'read_tambah') {
				$hasil = array();
				$sql = "SELECT a.AkunTransaksiID, a.AkunID, a.TransaksiID, a.Nominal, a.TglTransaksi, b.Transaksi FROM user_akun_transaksi a 
				LEFT JOIN transaksi b ON a.TransaksiID = b.TransaksiID
				WHERE a.UserID = '$UserID' AND a.TransaksiID = '1'"; 
				$query = mysqli_query($conn,$sql);
				while($result = mysqli_fetch_array($query)){
					$hasil[] = $result;
				}
				return $hasil;
			}
			else if ($action == 'read_tarik') {
				$hasil = array();
				$sql = "SELECT a.AkunTransaksiID, a.AkunID, a.TransaksiID, a.Nominal, a.TglTransaksi, b.Transaksi FROM user_akun_transaksi a 
				LEFT JOIN transaksi b ON a.TransaksiID = b.TransaksiID
				WHERE a.UserID = '$UserID' AND a.TransaksiID = '2'"; 
				$query = mysqli_query($conn,$sql);
				while($result = mysqli_fetch_array($query)){
					$hasil[] = $result;
				}
				return $hasil;
			}
			else if ($action == 'update') {
				$sql = "UPDATE user_akun_transaksi SET TransaksiID = '$TransaksiID', Nominal = '$Nominal', TglTransaksi = '$TglTransaksi', UserEdit = '$UserID', TglEdit = NOW() WHERE AkunTransaksiID = '$AkunTransaksiID'";
				$query = mysqli_query($conn, $sql);
				if($query){
					$hasil = 'sukses';
					} else {
					$hasil = 'gagal_tambah_data';
				}
				return $hasil;
			}
			else if ($action == 'delete') {
				$sql = "DELETE FROM user_akun_transaksi WHERE AkunTransaksiID = '$AkunTransaksiID'"; 
				$query = mysqli_query($conn,$sql);
				if($query){
					$hasil = 'sukses';
					} else {
					$hasil = 'gagal_tambah_data';
				}
				return $hasil;
			}
		}
	
		function cekSaldoAkun($UserID)
		{
			$this->db = new database();
			$conn = $this->db->koneksi;
			$hasil = array();
			$sql = "SELECT a.SaldoAkhir FROM user_akun_saldo a
				WHERE a.UserID = '$UserID'"; 
				$query = mysqli_query($conn,$sql);
				while($result = mysqli_fetch_array($query)){
					$hasil[] = $result;
				}
				return $hasil;
		}
	}
?>
