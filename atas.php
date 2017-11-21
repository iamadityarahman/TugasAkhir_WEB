<?php
	session_start();
?>
<!doctype html>
<html>
	<head>
		<title><?=$title?></title>
		<!-- load stlye dari 23 -->
		<link rel="stylesheet" type="text/css" href="./css/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			
		<!-- load gambar 360 -->
        <script src="./js/three.min.js"></script>
		<script src="./js/photo-sphere-viewer.min.js"></script>

		<!-- load bootsrap -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

		<!-- load jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- font -->
		<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">

		<!-- load pannellum -->
		<script src="./js/pannellum.js"></script>
		<link rel="stylesheet" href="./css/pannellum.css">

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
            .w3-myfont {
                font-family: 'Josefin Sans', sans-serif;
            }
			.limitTampil {
				display: none;
			}

			/* style auto komlit */
			.kostkost {
				width: 300px;
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


		</style>
  </head>
  <body>
<!-- membuat bar -->
<div class="w3-top">
	<div class="w3-bar w3-dark-grey w3-xlarge" style="letter-spacing:4px;">
		<div class="w3-bar-item"><b>KOST-QU</b></div>
		<a href="./index.php" class="w3-bar-item w3-hover-red w3-button <?=$home?>">
			<i class="fa fa-home" aria-hidden="true"></i>
		</a>
		<a href="./banding.php" class="w3-bar-item w3-hover-yellow w3-text-white  <?=$aktifBanding?>">
			<b>VERSUS</b>
		</a>

		<!-- tombol login -->
		<?php if(isset($_SESSION['user']) && isset($_SESSION['pass'])) { ?>
			<button onclick="window.open('admin.php', '_SELF')" class="w3-bar-item w3-dark-grey w3-right w3-margin-right w3-hover-green">
				<i class="fa fa-user-circle-o w3-text-white" aria-hidden="true"></i>
			</button>
			<?php } else { ?>
			<button onclick="document.getElementById('formulir').style.display='block'" class="w3-bar-item w3-dark-grey w3-right w3-margin-right w3-hover-green">
				<i class="fa fa-user-circle-o w3-text-white" aria-hidden="true"></i>
			</button>
			<?php } ?>
	</div>
</div>

<!-- form login -->
<div id="formulir" class="w3-modal" style="align: center; ">
	<div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center"><br>
        	<span onclick="document.getElementById('formulir').style.display='none'" class="w3-button w3-xlarge w3-transparent w3-display-topright" title="Close Modal">×</span>
        	<div class="w3-xxlarge"><b>LOGIN ADMIN</b></div>  
        </div>

        <div class="w3-container">
			<form id="formLogin">
				<fieldset style="border-style:hidden">
					<div class="w3-section">
						<label><b>Username</b></label>
						<input class="w3-input w3-border w3-margin-bottom" type="text" name="user">
						<label><b>Password</b></label>
						<input class="w3-input w3-border w3-margin-bottom" type="password" name="pass">
					</div>
				</fieldset>
			</form>
		</div>

		<div id="warningLogin"></div>
		<div id="gagalLogin"></div>
		<div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
			<button type="submit" id="login" name="login" class="w3-right w3-button w3-blue">LOGIN</button>
		</div>

			
		</div>
</div>
<script>
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
	});
</script>
