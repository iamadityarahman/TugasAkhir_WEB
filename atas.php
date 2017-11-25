<?php
	session_start();
?>
<!doctype html>
<html>
	<head>
		<title><?=$title?></title>
		<!-- load stlye dari 23 -->
		<link rel="stylesheet" type="text/css" href="css/w3.css"/>
		<link rel="stylesheet" type="text/css" href="css/warna.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<!-- load bootsrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>

		<!-- load jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- load pannellum -->
		<script src="js/pannellum.js"></script>
		<link rel="stylesheet" href="css/pannellum.css">

		<style>
			/** lain lain **/
            html, body {
				height: 100%;
				width: 100%;
            }
			google-map {
				height: 700px;
				width: 100%;
			}
			#map {
				height: 100%;
			}
			.limitTampil {
				display: none;
			}

			/* style auto komlit */
			.kostkost {
				width: auto;
			}
			.tt-menu {
				background-color: #FFFFFF;
				border: 1px solid rgba(0, 0, 0, 0.2);
				border-radius: 8px;
				box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
				margin-top: 12px;
				padding: 8px 0;
			}
			.tt-suggestion {
				text-align: left;
				font-size: 22px;  /* Set suggestion dropdown font size */
				padding: 3px 20px;
			}
			.tt-suggestion:hover {
				cursor: pointer;
				background-color: #0097CF;
				color: #FFFFFF;
			}
			.tt-suggestion p {
				margin: 0;
			}
			/* auto komplit sampai sini */

			.warna-1 {
				background-color: #001a75;
				color: white;
			}

			/*membuat rating*/
			.checked {
			    color: orange;
			}


		</style>
  </head>
  <body>
<!-- membuat bar -->
<div class="w3-top">
	<div class="w3-bar w3-xlarge w3-theme-d4" style="letter-spacing:4px;">
		<button href="javascript:void(0)" onclick="myFunction()" class="w3-hide-large w3-hide-medium w3-bar-item w3-button w3-hover-theme">
			<b><i class="fa fa-bars" aria-hidden="true"></i></b>
		</button>

		<div class="w3-bar-item"><b>KOS-Q</b>
		</div>

		<button onclick="location.href='index.php'" class="w3-hide-small w3-bar-item w3-button w3-hover-theme <?=$home?>">
			<b><i class="fa fa-home" aria-hidden="true"></i></b>
		</button>

		<button onclick="location.href='banding.php'" class="w3-hide-small w3-bar-item w3-button w3-hover-theme <?=$aktifBanding?>">
			<b>BANDINGKAN</b>
		</button>

		<!-- tombol login -->
		<?php if(isset($_SESSION['userBiasa']) && isset($_SESSION['pass'])) { ?>

			<!-- tulisan login waktu besar sama sedang -->
			<div class="w3-dropdown-hover w3-hover-theme w3-right w3-hide-small">
				<button class="w3-button">
					<i class="fa fa-user-circle-o" aria-hidden="true"></i>
				</button>

				<div class="w3-dropdown-content w3-bar-block w3-medium" style="right:0">
					<div class="w3-row w3-padding">
						<button class="w3-button w3-green">PROFILE</button>
						<button onclick="location.href='logout.php'" class="w3-button w3-red">LOGOUT</button>
					</div>
		      	</div>
		    </div>

		    <!-- tanda login waktu kecil -->
		    <button onclick="location.href='profile.php'" class="w3-hide-large w3-hide-medium w3-bar-item w3-button w3-hover-theme w3-right">
				<b><i class="fa fa-user-circle-o" aria-hidden="true"></i></b>
			</button>

			<?php } else { ?>

			<button onclick="document.getElementById('formulir').style.display='block'" class="w3-hover-theme w3-bar-item w3-right w3-margin-right w3-button w3-hide-small">
				<i class="fa fa-sign-in" aria-hidden="true"></i>
			</button>

		<?php } ?>
	</div>

	<div id="demo" class="w3-bar-block w3-theme-d4 w3-hide w3-hide-large w3-hide-medium">
		<button onclick="location.href='index.php'" class="w3-bar-item w3-button w3-hover-theme">
			<i class="fa fa-home" aria-hidden="true"></i> Home
		</button>
		<button onclick="location.href='banding.php'" class="w3-bar-item w3-button">
			<i class="fa fa-exchange" aria-hidden="true"></i> Bandingkan
		</button>
		<?php if(isset($_SESSION['userBiasa']) && isset($_SESSION['pass'])) { ?>
			<button onclick="location.href='logout.php'" class="w3-bar-item w3-button">
				<i class="fa fa-sign-out" aria-hidden="true"></i> Keluar
			</button>
		<?php } else { ?>
			<button onclick="document.getElementById('formulir').style.display='block'" class="w3-bar-item w3-button">
				<i class="fa fa-sign-in" aria-hidden="true"></i> Masuk
			</button>
		<?php
			}
		?>

	</div>
</div>



<!-- form login -->
<div id="formulir" class="w3-modal" style="align: center;">
	<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center"><br>
        	<span onclick="document.getElementById('formulir').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
        	<div class="w3-xxlarge"><b>LOGIN USER KOS-Q</b></div>  
        </div>

        <div class="w3-container">
			<form id="formLogin">
				<fieldset style="border-style:hidden">
					<div class="w3-section">
						<label><b>Username</b></label>
						<input class="w3-input w3-border w3-margin-bottom" type="text" name="user" id="user"/>
						<label><b>Password</b></label>
						<input class="w3-input w3-border w3-margin-bottom" type="password" name="pass" id="pass"/>
					</div>
				</fieldset>
			</form>
		</div>

		<div id="warningLogin"></div>
		<div id="gagalLogin"></div>
		<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
			<a charset="w3-large" onclick="location.href='daftarAkun.php'">Belum punya akun?daftar disini</a>
			<button type="submit" id="login" name="login" class="w3-right w3-button w3-theme-dark w3-hover-theme">LOGIN</button>
		</div>

			
		</div>
</div>
<script>
	function myFunction() {
	    var x = document.getElementById("demo");
	    if (x.className.indexOf("w3-show") == -1) {
	        x.className += " w3-show";
	    } else { 
	        x.className = x.className.replace(" w3-show", "");
	    }
	}


	 $(function() {
		$("button#login").click(function(){
		   	$.ajax({
    		   	type: "POST",
				url: "prosesLogin.php",
				data: $('form#formLogin').serialize(),
        		success: function(msg){
 	          		$("#warningLogin").html(msg);
 		        	document.getElementById('formulir').style.display=('block');	
 		        },
				error: function(){
					$("#gagalLogin").html("<div class='w3-bar w3-red w3-center w3-padding'><b>GAGAL LOGIN!</b></div>");
				}
      		});
		});
		$("#formLogin input").keydown(function(e) {
			if (e.keyCode == 13) {
				$.ajax({
	    		   	type: "POST",
					url: "prosesLogin.php",
					data: $('form#formLogin').serialize(),
	        		success: function(msg){
	 	          		$("#warningLogin").html(msg);
	 		        	document.getElementById('formulir').style.display=('block');
	 		        },
					error: function(){
						$("#gagalLogin").html("<div class='w3-bar w3-red w3-center w3-padding'><b>GAGAL LOGIN!</b></div>");
					}
	      		});
			}
		})
	});
</script>

