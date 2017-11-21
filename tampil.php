<?php
    include "config.php";
    include "fungsiFasilitas.php";
    $sqlTampil = "SELECT * FROM dataKost dk INNER JOIN kapasitasKost kk ON dk.id = kk.id_kost 
                                            INNER JOIN fotoKost fk ON dk.id = fk.id 
                                            INNER JOIN kontakKost ko ON dk.id = ko.id 
                                            INNER JOIN ratingKost rk ON dk.id = rk.id
                                            INNER JOIN spesifikasiKost sk ON dk.id = sk.id
                                            WHERE dk.id='$_GET[id]'";
    $data = mysql_query($sqlTampil);
    $z = mysql_fetch_array($data);

    $title = strtoupper($z['nama']);
    include "atas.php";
?>
<div class="w3-display-container">
    <div id="header360" style="height:400px;width:100%"></div>
    <div class="w3-display-bottomleft">
        <h1 class="w3-jumbo w3-text-white w3-wide w3-margin-left"><b><?=strtoupper($z['nama'])?></b></h1>
    </div>
    <div class="w3-display-bottomright w3-medium">
        <h1 class=" w3-text-white w3-wide w3-margin-right">
            <b>
                <i class="fa fa-check-circle-o" aria-hidden="true" style="color:green;"></i>
                <?=strtoupper($z['kapasitas'])?> Kamar
            </b>
        </h1>
    </div>
</div>

<div class="w3-row w3-margin-top">
    <div class="w3-col m8">
        <div class="w3-margin-left">

            <!-- memberi nama -->
            <div class='w3-bar w3-teal w3-padding'>
                <div class='w3-large'><b>LOKASI KOST</b></div>
            </div>
            <!-- menampilkan maps -->
            <div>
                <input id="latlng" type="text" value="<?=$z['lat']?>,<?=$z['long']?>" hidden>
            </div>
            <div id="map" style="height:300px" class="w3-margin-bottom"></div>
            <!-- selesai menampilkan map -->

            <!-- rating -->
            <div class='w3-bar w3-teal w3-padding w3-margin-top'>
                <div class='w3-large'><b>RATING</b></div>
            </div>
            <div class='w3-bar w3-padding'>
                <div class='w3-large'>
                    <div class="w3-row-padding w3-margin-top w3-center">

                        <div class="w3-third">
                            <?php
                                $nyaman = $z['kenyamanan'];
                                for($a=0; $a<$nyaman; $a++) {
                                    echo "<i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>";
                                }
                                for($a=0; $a<abs($nyaman-5); $a++) {
                                    echo "<i class='fa fa-star-o' aria-hidden='true' style='color:gray;'></i>";
                                }
                            ?><br/>
                            KENYAMANAN
                        </div>

                        <div class="w3-third">
                            <?php
                                $aman = $z['keamanan'];
                                for($a=0; $a<$aman; $a++) {
                                    echo "<i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>";
                                }
                                for($a=0; $a<abs($aman-5); $a++) {
                                    echo "<i class='fa fa-star-o' aria-hidden='true' style='color:gray;'></i>";
                                }
                            ?><br/>
                            KEAMANAN
                        </div>
                        

                        <div class="w3-third">
                            <?php
                                $bersih = $z['kebersihan'];
                                for($a=0; $a<$bersih; $a++) {
                                    echo "<i class='fa fa-star' aria-hidden='true' style='color:orange;'></i>";
                                }
                                for($a=0; $a<abs($bersih-5); $a++) {
                                    echo "<i class='fa fa-star-o' aria-hidden='true' style='color:gray;'></i>";
                                }
                            ?><br/>
                            KEBERSIHAN
                        </div>
                    </div>
                </div>
            </div>

            <!-- fasilitas kost -->
            <div class='w3-bar w3-teal w3-padding w3-margin-top'>
                <div class='w3-large'><b>FASILITAS KAMAR</b></div>
            </div>

            <div class="w3-row-padding w3-margin-top w3-center">
                <?php
                    $sqlsql = mysql_query("SELECT kamarIcon FROM fasilitasKamar WHERE id=$_GET[id]");
                    while($b = mysql_fetch_array($sqlsql)) {
                        echo "
                            <div class='w3-third'>
                                <img src='img/fasilitas/kamar_". $b['kamarIcon'] .".png' style='height:50px'>
                                <div class='w3-container'>
                                    <h4>". convertKamar($b['kamarIcon']) ."</h4>
                                </div>
                            </div>
                        ";
                    }
                ?>
            </div>

            <div class='w3-bar w3-teal w3-padding w3-margin-top'>
                <div class='w3-large'><b>FASILITAS KAMAR MANDI</b></div>
            </div>

            <div class="w3-row-padding w3-margin-top w3-center">
                <?php
                    $sqlsql = mysql_query("SELECT mandiIcon FROM fasilitasMandi WHERE id=$_GET[id]");
                    while($b = mysql_fetch_array($sqlsql)) {
                        echo "
                            <div class='w3-third'>
                                <img src='img/fasilitas/mandi_". $b['mandiIcon'] .".png' style='height:50px'>
                                <div class='w3-container'>
                                    <h4>". convertMandi($b['mandiIcon']) ."</h4>
                                </div>
                            </div>
                        ";
                    }
                ?>
            </div>

            <!-- deskripsi kost -->
            <div class='w3-bar w3-teal w3-padding  w3-margin-top'>
                <div class='w3-large'><b>DESKRIPSI KOST</b></div>
            </div>
            
            <div class="w3-container w3-margin-top">
                <div class="w3-justify">
                    <p>
                        <?=$z['intro']?>
                    </p>
                </div><hr/>
                
                <b>Spesifikasi:</b>
                <table class="w3-table w3-bordered">
                    <tr>
                        <td>Luas kamar</td>
                        <td>: <?=$z['panjangKamar']?> meter x <?=$z['lebarKamar']?> meter</td>
                    </tr>
                    <tr>
                        <td>Tagihan air</td>
                        <td>: <?=$z['air']?></td>
                    </tr>
                    <tr>
                        <td>Tagihan listrik</td>
                        <td>: <?=$z['listrik']?></td>
                    </tr>
                    <tr>
                        <td>Tagihan internet</td>
                        <td>: <?=$z['internet']?></td>
                    </tr>
                    <tr>
                        <td>Jam malam</td>
                        <td>: Pukul <?=$z['malam']?> WIB</td>
                    </tr>
                    <tr>
                        <td>Peraturan tambahan</td>
                        <td>: <?=$z['peraturan']?></td>
                    </tr>
                </table>
            </div>
            <br/><br/>
        </div>
    </div>
    <div class="w3-col m4">
        <div class="w3-container">
            <div class="w3-center">
                <div class="w3-bar w3-black w3-col m12 w3-margin-bottom">
                    <h4>Rp. <?=number_format($z['harga'],0,",",".")?>,-/bulan</h4>
                </div>
                <div class="w3-display-container w3-margin-bottom">
                    <img src="<?=$z['fotoKT']?>" class="w3-image w3-margin-bottom"/>
                    <div class="w3-display-bottomright">
                        <button type="button" class="w3-button w3-circle w3-green w3-xlarge"  onClick="alert('No telpon: <?=$z['phone']?>')">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="w3-button w3-circle w3-green w3-xlarge" onClick="window.open('mailto:<?=$z['email']?>')">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>        
            <div class="w3-container">
                 <?php
                    $sqlpp = mysql_query("SELECT * FROM fotoFoto WHERE id = $_GET[id]");
                    $xyz = 0;
                    while ($iii = mysql_fetch_array($sqlpp)) { $xyz++; $fgh = "id" . $xyz;
                        if($iii['jenis'] == "360") { ?>
                            <div onclick="document.getElementById('<?=$fgh?>').style.display='block'" class="w3-third w3-display-container">
                                <div style="width:100%;height:150px;overflow:hidden;">
                                    <img style="width: 100%; height: 150px;" class="w3-hover-opacity" src="<?=$iii['namaFoto']?>">
                                </div>
                                <div class="w3-display-middle w3-xlarge">360&deg;</div>
                            </div>
                            
                            <div id="<?=$fgh?>" class="w3-modal w3-black">
                                <span onclick="document.getElementById('<?=$fgh?>').style.display='none'" class="w3-xxlarge w3-button w3-display-topright">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </span>
                                <div class="w3-modal-content w3-round-medium w3-black">
                                    <div class="w3-container w3-padding-16">
                                        <iframe width="100%" height="500px" style="border-style:none;" src="htm/pannellum.htm?panorama=http://localhost/kost/<?=$iii['namaFoto']?>&amp;autoLoad=true"></iframe>
                                        <div class="w3-center w3-margin-top w3-large">FOTO <?=strtoupper($z['nama'])?> <?=$xyz?></div>
                                    </div>
                                </div>
                            </div>
                <?
                        } else { ?>
                            <div onclick="document.getElementById('<?=$fgh?>').style.display='block'" class="w3-third">
                                <div style="width:100%;height:150px;overflow:hidden;">
                                    <img style="width: 100%; height: 150px;" class="w3-hover-opacity" src="<?=$iii['namaFoto']?>"/>
                                </div>
                            </div>
                            
                            <div id="<?=$fgh?>" class="w3-modal w3-black">
                                <span onclick="document.getElementById('<?=$fgh?>').style.display='none'" class="w3-xxlarge w3-button w3-display-topright">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </span>
                                <div class="w3-modal-content w3-round-medium w3-black">
                                    <div class="w3-container w3-center">
                                        <img height="500px" src="<?=$iii['namaFoto']?>">
                                        <div class="w3-center w3-margin-top w3-large">FOTO KOST <?=$xyz?></div>
                                    </div>
                                </div>
                            </div>
                <?
                        }
                    }
                ?>
            </div>
    </div>

    <input type="text" name="foto360" id="foto360" value="<?=$z['fotoKM']?>" hidden/>
    <script>
        // Modal Image Gallery
        function foto360(element) {
          document.getElementById("img01").src = element.src;
          document.getElementById("modal01").style.display = "block";
        }

        var lokasi = document.getElementById('foto360').value;
		var div = document.getElementById('header360');
		var PSV = new PhotoSphereViewer({
				panorama: lokasi,
				container: div,
				time_anim: false
			});
	</script>

    <?php
    include "tampil_map.php";
    include "bawah.php";
?>