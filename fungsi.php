<?php

	function login($username, $password, $mysqli){
		// Menggunakan perintah prepared statement untuk menghindari SQL injection
	  if($stmt = $mysqli->prepare("SELECT id_user, password_user, nama_user, bank_user, rekening_user FROM tbl_user WHERE username_user = ?")){
			$stmt->bind_param('s', $username); // Menyimpan data inputan username ke variabel "$username"
			$stmt->execute(); // Menjalankan perintah query MySQL diatas
			$stmt->store_result();
			$stmt->bind_result($id_user, $dbpassword, $nama_user, $bank_user, $rekening_user); // Menyimpan nilai hasil query ke variabel
			$stmt->fetch();
		   
	  if($stmt->num_rows == 1){ // Jika user ada/ditemukan
			 if( password_verify($password, $dbpassword)){
				  // Jika sama buat SESSION id dan password
				 $_SESSION['id_user'] = $id_user;
				 $_SESSION['password'] = $dbpassword;
				 $_SESSION['nama_user'] = $nama_user;
				 $_SESSION['bank_user'] = $bank_user;
				 $_SESSION['rekening_user'] = $rekening_user;
				  // Login berhasil
				   return true;
				}else{
				  // Password tidak sesuai
					return false;   
				}
	   }else{
			  // User tidak ditemukan
			 return false;   
			}
	   }
	}
	
	function cek_login($mysqli){
		// Cek apakah semua variabel session ada / tidak
		if(isset($_SESSION['id_user'], $_SESSION['password'])){
					 return true;    
					}else{
					  // User tidak melakukan login
					   return false;   
					}
			   
    }
	
	function idtf() {
		$conn = mysqli_connect("localhost", "root", "", "db_masjid");
		if (!$conn) {
			throw new Exception("Koneksi gagal: " . mysqli_connect_error());
		}
	
		try {
			$query = "SELECT MAX(CAST(SUBSTRING(id_transfer, 4) AS UNSIGNED)) AS maxNum 
					  FROM tbl_transfer 
					  WHERE id_transfer LIKE 'TF-%'";
			
			$result = mysqli_query($conn, $query);
			if (!$result) {
				throw new Exception("Query error: " . mysqli_error($conn));
			}
	
			$data = mysqli_fetch_assoc($result);
			$maxNum = $data['maxNum'] ?? 0;
			$nextNum = $maxNum + 1;
			$newID = sprintf("TF-%03d", $nextNum);
	
			return $newID;
	
		} finally {
			mysqli_close($conn);
		}
	}
	
	
?>