<?php
	include "config.php";

	if(isset($_POST['kirim']) && ($_POST['password1'] == $_POST['password2'])) {
		$depan = $_POST['depan'];
		$belakang = $_POST['belakang'];
		$userBiasa = $_POST['username'];
		$email = $_POST['email'];
		$pass1 = $_POST['password1'];

		mysql_query("INSERT INTO userBiasa VALUES('', '$depan', '$belakang', '$userBiasa', '$email', '$pass1', '0')");
	} elseif (isset($_POST['kirim']) && ($_POST['password1'] != $_POST['password2'])) {
		echo "<script>alert('Password tidak sama!');</script>";
	}
?>