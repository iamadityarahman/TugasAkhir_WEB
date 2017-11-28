<?php
	include "config.php";

	if(isset($_POST['kirim'])) {
		$depan = $_POST['depan'];
		$belakang = $_POST['belakang'];
		$userBiasa = $_POST['username'];
		$email = $_POST['email'];
		$namaKost = $_POST['namaKost'];
		$pass1 = $_POST['password1'];
		$pass2 = $_POST['password2'];

		$dfbg = mysql_query("SELECT *, COUNT(*) AS jumlah FROM userBiasa WHERE userBiasa = '$userBiasa'");
		$bgd = mysql_fetch_array($dfbg);

		$tidak = 1;

		if($depan == "" || $belakang == "") { ?>
			<script type="text/javascript">
				var depan = document.getElementById('depan');
				var belakang = document.getElementById('belakang');

				depan.focus();
				document.getElementById('pesanNama').innerHTML = "Nama tidak boleh kosong";
			</script>
<?php
			$tidak = 0;
		} 
		if($userBiasa == "") { ?>
			<script type="text/javascript">
				var userBiasa = document.getElementById('username');

				userBiasa.focus();
				document.getElementById('pesanUser').innerHTML = "Username tidak boleh kosong";
			</script>
<?php
			$tidak = 0;
		}
		if($email == "") { ?>
			<script type="text/javascript">
				var email = document.getElementById('email');

				email.focus();
				document.getElementById('pesanEmail').innerHTML = "Email tidak boleh kosong";
			</script>
<?php
			$tidak = 0;
		}
		if($pass1 == null) { ?>
			<script type="text/javascript">
				var pass1 = document.getElementById('password1');

				pass1.focus();
				document.getElementById('pesanPass').innerHTML = "Password tidak boleh kosong";
			</script>
<?php
			$tidak = 0;
		}
		if($pass2 == null) { ?>
			<script type="text/javascript">
				var pass2 = document.getElementById('password2');

				pass2.focus();
				document.getElementById('pesanKonfir').innerHTML = "Konfirmasi password tidak boleh kosong";
			</script>
<?php
			$tidak = 0;
		}

		if($bgd['jumlah'] >= 1 && $tidak == 1) {
			echo "	<script>
						alert('Username sudah digunakan!!!');
						username.focus();
					</script>";
		} elseif(($pass1 != $pass2) && $tidak == 1) {
			echo "	<script>
						var pass1 = document.getElementById('password1');
						document.getElementById('pesanKonfir').innerHTML = 'Password dan Konfirmasi tidak sama';
						pass1.focus();
					</script>";
		} elseif(($pass1 == $pass2) && $tidak == 1) {

			$ghfgf = mysql_fetch_array(mysql_query("SELECT * FROM dataKost WHERE nama = '$namaKost'"));
			$ffdgg = mysql_fetch_array(mysql_query("SELECT * FROM kapasitasKost WHERE id_kost = $ghfgf[id]"));
			if($ffdgg['kapasitas'] > 0) {
				mysql_query("INSERT INTO userBiasa VALUES('', '$depan', '$belakang', '$userBiasa', '$email', '$namaKost', '$pass1', '0')");
				mysql_query("UPDATE kapasitasKost SET kapasitas = kapasitas - 1 WHERE id_kost = $ghfgf[id]");
				echo "<script>alert('Pendaftaran sukses, silahkan tunggu di verifikasi Admin');</script>";
				unset($_POST);
			} else {
				echo "
				<script>
					alert('Kost sudah penuh!');
					var password1 = document.getElementById('depan');
					password1.focus();
				</script>";
			}
			
		}
	}
?>