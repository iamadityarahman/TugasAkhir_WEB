<?php
	session_start();
	
	include "config.php";

	if(isset($_POST['user'])) {
		$user = strip_tags($_POST['user']);
		$pass = strip_tags($_POST['pass']);
	
		$sql = mysql_query("SELECT COUNT(id) AS status FROM user WHERE user = '$user' AND pass = '$pass'");
		$data = mysql_fetch_array($sql);

		if($data['status'] == 1) {
			$_SESSION['user'] = $_POST['user'];
			$_SESSION['pass'] = $_POST['pass'];
			$_SESSION['waktu'] = time();
			echo "	<div class='w3-bar w3-green w3-center w3-padding'><b>LOGIN BERHASIL...!!!</b></div>
					<script>window.open('admin.php', '_SELF');</script>
			";
		} else {
			echo "<div class='w3-bar w3-red w3-center w3-padding'><b>PASSWORD/USERNAME SALAH...!!!</b></div>";
		}
	}
?>