<?php
	include "config.php";
	$home = "w3-light-grey";
	$title = "KOST-QU";
	include "atas.php";
?>

<div class="w3-display-container">
	<div id="header360" style="height:400px;width:100%"></div>
    <div class="w3-display-middle">
		<h1 class="w3-jumbo w3-text-white w3-wide"><b>Mau cari kost?</b></h1>
		<form class="w3-center">
			<input class="w3-input w3-margin-bottom" id="address" type="text" placeholder="Masukan nama tempat...">
  			<input type="button" id="submit" class="w3-bar-item w3-button w3-green" value="CARI KOST DISEKITAR LOKASI"/>
		</form>
	</div>
</div>


<!-- isi dari web -->
<div class="w3-container">
	<div class="w3-row">
		<div class="w3-col m1">
			&nbsp;
		</div>
		<div class="w3-col m10">
			<div class="w3-center w3-margin-bottom">
				<h1 class="w3-margin-top">PILIH KOST YANG KAMU SUKA!</h1>
				<label>Klik di salah satu kost pada peta</label>
			</div>
			<div id="map" class="w3-margin-top w3-margin-bottom" style="height:500px"></div>
			<div class="w3-center w3-margin-bottom">
				<h1 class="w3-margin-top">REKOMENDASI KOST BUAT KAMU!</h1>
				<label>Pilihlah kost-kostnya buatmu yang terbaik</label>
			</div>
			<div class="w3-row-padding w3-margin-top">
			<?php
				$sqlsql = "SELECT * FROM dataKost dk
						   INNER JOIN kapasitasKost kk ON dk.id = kk.id_kost
						   INNER JOIN fotoKost fk ON dk.id = fk.id";
				$queryquery = mysql_query($sqlsql);
				while($k = mysql_fetch_array($queryquery)) { ?>
					<div class="w3-quarter w3-margin-bottom">
						<div class="w3-border limitTampil">
							<div class="w3-bar
								<?php if($k['kapasitas'] == 1) {
									echo "w3-red";
								} elseif ($k['kapasitas'] <= 3) {
									echo "w3-yellow";
								} else {
									echo "w3-green";
								} ?>
							">
								<div class="w3-center w3-padding">
									<b>ADA <?=$k['kapasitas']?> KAMAR</b>
								</div>
							</div>
							<div class="w3-display-container">
								<div class="w3-display-bottomleft w3-blue w3-padding-small">
									<?php echo "".($k['harga']/1000)."K"; ?>
								</div>
								<div style="width:100%;height:200px;overflow:hidden" class="w3-center w3-black">
									<img src="<?=$k['fotoKT']?>" height="200px"/>
								</div>
							</div>
							<div class="w3-medium w3-padding">
								<b><?=$k['nama']?></b>
							</div>
							<div class="w3-bar w3-padding w3-margin-button">
								<i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
								<i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
								<i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
								<i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
								<i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>
							</div>
							<button type="button" class="w3-bar w3-button w3-hover-light-grey w3-dark-grey w3-margin-top" onclick="window.location = 'tampil.php?id=<?=$k['id']?>'">
								SELENGKAPNYA
							</button>
						</div>
					</div>
				<?
				}
			?>
			</div>
			<div class="w3-row-padding w3-center">
				<div id="tampilkanLain" class="w3-button w3-blue">
					TAMPILKAN LAINNYA
				</div>
			</div>
		</div>
		<div class="w3-col m1">
			&nbsp;
		</div>
	</div>
</div>


<br/><br/>
<!-- kumpulan javasript dkk -->
<!-- membuat load more -->
<script>
	/*
		Load more content with jQuery - May 21, 2013
		(c) 2013 @ElmahdiMahmoud
	*/   

	$(function () {
		$(".limitTampil").slice(0, 4).show();
		$("#tampilkanLain").on('click', function (e) {
			e.preventDefault();
			$(".limitTampil:hidden").slice(0, 4).slideDown();
		});
	});
</script>

<!-- import maps -->
<script>
	var locations = [
		<?php
		mysql_select_db("kost");
			$sql = "SELECT * FROM dataKost";
			$hasil = mysql_query($sql);
			while($x = mysql_fetch_object($hasil)){
				?>
				['<?=$x->nama;?>', parseFloat(<?=$x->lat;?>), parseFloat(<?=$x->long;?>)],
			<?
			}
			?>
	];

	function initMap() {
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 16,
			center: {lat: -7.962681, lng: 112.618052}
		});

		// menset maker pada peta
		setMarkers(map, locations);

        // membuat autocompele di kotak pencarian
        var input = document.getElementById('address');
        var searchBox = new google.maps.places.SearchBox(input);
		// fungsi mengembalikan nilai yang mungkin ke kotak pencarian
		map.addListener('bounds_changed', function() {
          	searchBox.setBounds(map.getBounds());
        });




		// membuat geo coder
		var geocoder = new google.maps.Geocoder();
		document.getElementById('submit').addEventListener('click', function() {
			geocodeAddress(geocoder, map);
		});
	}

	function setMarkers(map,locations) {
		var marker, i
		for (i = 0; i < locations.length; i++) {  
			var loan = locations[i][0];
			var lat = locations[i][1];
			var long = locations[i][2];
			var add =  locations[i][1];
			var content = "Loan Number: " + loan +  '</h3>' + "Address: " + add;
			var infowindow = new google.maps.InfoWindow();
			
			latlngset = new google.maps.LatLng(lat, long);
			var marker = new google.maps.Marker({  
				map: map, title: loan , position: latlngset  
			});

			google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
				return function() {
			   		infowindow.setContent(content);
			   		infowindow.open(map,marker);
				};
			})(marker,content,infowindow)); 
		}
	}

	// pencarian geocoder
	function geocodeAddress(geocoder, resultsMap) {
		var address = document.getElementById('address').value;
		geocoder.geocode({'address': address}, function(results, status) {
			if (status === 'OK') {
				resultsMap.setCenter(results[0].geometry.location);
				document.getElementById('lokasi').value = results[0].geometry.location;
			} else {
				alert('Geocode was not successful for the following reason: ' + status);
			}
		});
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPXMBmMqLeLI4U1jgF2V9T7bz3duMSx9M&libraries=places&callback=initMap"
async defer></script>

<script>
	var lokasi = "./img/home.jpg"
	var div = document.getElementById('header360');
	var PSV = new PhotoSphereViewer({
			panorama: lokasi,
			container: div,
			time_anim: 1
		});
</script>


<?php
	include "bawah.php";
?>
