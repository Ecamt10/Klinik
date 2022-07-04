<?php 
    session_start();
	if($_SESSION['status']!="login"){
		header("location:/tugas-crud/auth/login.php?pesan=belum_login");
	}
?>