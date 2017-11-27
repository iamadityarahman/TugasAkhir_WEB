<?php
	include "config.php";



	if(isset($_POST['kirim']) && ($_POST['password1'] == $_POST['password2'])) {
		$depan = $_POST['depan'];
		$belakang = $_POST['belakang'];
		$userBiasa = $_POST['username'];
		$email = $_POST['email'];
		$namaKost = $_POST['namaKost'];
		$pass1 = $_POST['password1'];

		$dfbg = mysql_query("SELECT *, COUNT(*) AS jumlah FROM userBiasa WHERE userBiasa = '$userBiasa'");
		$bgd = mysql_fetch_array($dfbg);

		if($bgd['jumlah'] >= 1) {
			echo "	<script>
						alert('Username sudah digunakan!!!');
						username.focus();
					</script>";
		} else {
			mysql_query("INSERT INTO userBiasa VALUES('', '$depan', '$belakang', '$userBiasa', '$email', '$namaKost', '$pass1', '0')");
			echo "<script>alert('Pendaftaran sukses, silahkan tunggu di verifikasi Admin');</script>";
			unset($_POST);
		}
	} elseif (isset($_POST['kirim']) && ($_POST['password1'] != $_POST['password2'])) {
		echo "	<script>
					alert('Password tidak sama!');
					var password1 = document.getElementById('password1');
					password1.focus();
				</script>";
	}
?>