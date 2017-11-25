<!doctype html>
<html>
	<head>
		<title>DAFTAR AKUN</title>
		<!-- load stlye dari 23 -->
		<link rel="stylesheet" type="text/css" href="css/w3.css"/>
		<link rel="stylesheet" type="text/css" href="css/warna.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- load bootsrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>

		<!-- load jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	</head>
  	<body>
		<!-- membuat bar -->
		<div>
			<div class="w3-bar w3-xlarge w3-theme-d4" style="letter-spacing:4px;">
				<div class="w3-bar-item"><b>KOS-Q</b>
				</div>

				<button onclick="location.href='index.php'" class="w3-bar-item w3-button w3-hover-theme <?=$home?>">
					<b><i class="fa fa-home" aria-hidden="true"></i></b>
				</button>
			</div>
		</div>

		<!-- membuat bar waktu kecil dan sedang-->
		<div class="w3-top">
			<div class="w3-bar w3-xlarge w3-theme-d4" style="letter-spacing:4px;">
				<div class="w3-bar-item"><b>KOS-Q</b>
				</div>

				<button onclick="location.href='index.php'" class="w3-bar-item w3-button w3-hover-theme <?=$home?>">
					<b><i class="fa fa-home" aria-hidden="true"></i></b>
				</button>
			</div>
		</div>

		<div class="w3-content w3-padding w3-margin-bottom">
			<div class="w3-row w3-center w3-xxlarge w3-margin-bottom">
				<b>Buat akun KOS-Q</b>
			</div>
			<div class="w3-col l6 m12 s12 w3-center">
				<h2>Cari kost yang sesuai kebutuhanmu disini</h2>
				Masukan lokasimu, maka kami akan memberikan saran yang terbaik.
				<div class="w3-container w3-padding-large w3-hide-small">
					<img src="img/signup.png" class="w3-image" />
				</div>


			</div>
			<div class="w3-col l6 m12 s12 w3-padding w3-margin-bottom">
				<form method="POST">
				<div class="w3-light-grey w3-padding w3-border w3-margin-top">
					<div class="w3-row-padding w3-margin-top w3-hide-small">
						 <div class="w3-half">
						 	<input class="w3-input w3-border" type="text" name="depan" placeholder="Nama depan">
						 </div>
						 <div class="w3-half">
						 	<input class="w3-input w3-border" type="text" name="belakang" placeholder="Nama belakang">
						 </div>
					</div>					
					<div class="w3-row-padding">
						<div class="w3-row-padding">
							<div class="w3-row w3-section w3-hide-large w3-hide-medium">
								<input class="w3-input w3-border" type="text" name="depan" placeholder="Nama depan">
							</div>
							<div class="w3-row w3-section w3-hide-large w3-hide-medium">
								<input class="w3-input w3-border" type="text" name="belakang" placeholder="Nama belakang">
							</div>
							<div class="w3-row w3-section">
								<input class="w3-input w3-border" name="username" type="text" placeholder="Username">
							</div>					
							<div class="w3-row w3-section">
								<input class="w3-input w3-border" name="email" type="email" placeholder="Email">
							</div>							
							<div class="w3-row w3-section">
								<input class="w3-input w3-border" name="password1" type="password" placeholder="Password">
							</div>						
							<div class="w3-row w3-section">
								<input class="w3-input w3-border" name="password2" type="password" placeholder="Konfirmasi password">
							</div>					
							<div class="w3-row w3-section">
								<input class="w3-input w3-border w3-flat-belize-hole w3-hover-dark-grey" name="kirim" type="submit" value="Next">
							</div>
						</div>
					</div>		
				</div>
				</form>
			</div>
			<?php
				include "daftarAkunNext.php";
			?>
		</div>

		<!-- bar bawah waktu gede -->
		<div class="w3-bar w3-theme-light w3-center w3-border-top w3-border-theme w3-bottom w3-hide-medium w3-hide-small">
			<div class="w3-xxlarge w3-margin">
				<b class="w3-text-theme">KOS-Q</b>
			</div>
			<div class="w3-row w3-margin-bottom">
				<i onclick="window.open('//twitter.com/mykosq')" class="fa fa-twitter w3-xlarge w3-button w3-padding w3-hover-theme" aria-hidden="true"></i>
				<i onclick="window.open('//fb.me/mykosq')" class="fa fa-facebook w3-xlarge w3-button w3-padding w3-hover-theme" aria-hidden="true"></i>
				<i onclick="window.open('//www.instagram.com/mykosq/')" class="fa fa-instagram w3-xlarge w3-button w3-padding w3-hover-theme" aria-hidden="true"></i>
			</div>
			<div class="w3-row w3-margin-bottom">
				<i class="fa fa-envelope-o" aria-hidden="true"></i> care@kosq.info &nbsp;&nbsp;
				<i class="fa fa-whatsapp" aria-hidden="true"></i> +6281234567890 &nbsp;&nbsp;
				<i class="fa fa-weixin" aria-hidden="true"></i> kosqkosq
			</div>
		</div>

		<!-- bar bawah waktu sedang -->		
		<div class="w3-bar w3-theme-light w3-center w3-border-top w3-border-theme w3-hide-large w3-hide-small">
			<div class="w3-xxlarge w3-margin">
				<b class="w3-text-theme">KOS-Q</b>
			</div>
			<div class="w3-row w3-margin-bottom">
				<i onclick="window.open('//twitter.com/mykosq')" class="fa fa-twitter w3-xlarge w3-button w3-padding w3-hover-theme" aria-hidden="true"></i>
				<i onclick="window.open('//fb.me/mykosq')" class="fa fa-facebook w3-xlarge w3-button w3-padding w3-hover-theme" aria-hidden="true"></i>
				<i onclick="window.open('//www.instagram.com/mykosq/')" class="fa fa-instagram w3-xlarge w3-button w3-padding w3-hover-theme" aria-hidden="true"></i>
			</div>
			<div class="w3-row w3-margin-bottom">
				<i class="fa fa-envelope-o" aria-hidden="true"></i> care@kosq.info &nbsp;&nbsp;
				<i class="fa fa-whatsapp" aria-hidden="true"></i> +6281234567890 &nbsp;&nbsp;
				<i class="fa fa-weixin" aria-hidden="true"></i> kosqkosq
			</div>
		</div>

		<!-- bar waktu kecil -->
		<div class="w3-bar w3-theme-light w3-center w3-border-top w3-border-theme w3-bottom w3-hide-medium w3-hide-large">
			<div class="w3-large">
				<b class="w3-text-theme">KOS-Q</b>
			</div>
			<div class="w3-row">
				<i onclick="window.open('//twitter.com/mykosq')" class="fa fa-twitter w3-large w3-button w3-padding w3-hover-theme" aria-hidden="true"></i>
				<i onclick="window.open('//fb.me/mykosq')" class="fa fa-facebook w3-large w3-button w3-padding w3-hover-theme" aria-hidden="true"></i>
				<i onclick="window.open('//www.instagram.com/mykosq/')" class="fa fa-instagram w3-large w3-button w3-padding w3-hover-theme" aria-hidden="true"></i>
			</div>
			<div class="w3-row w3-margin-bottom w3-small">
				<i class="fa fa-envelope-o" aria-hidden="true"></i> care@kosq.info &nbsp;&nbsp;
				<i class="fa fa-whatsapp" aria-hidden="true"></i> +6281234567890 &nbsp;&nbsp;
				<i class="fa fa-weixin" aria-hidden="true"></i> kosqkosq
			</div>
		</div>

	</body>
</html>