<?php

//koneksi database
mysql_connect("localhost","root","");
mysql_select_db("kost");


$batas=5; //jumlah data yang ditampilkan
//$jumlahrecord=25;

$jumlahrecord = mysql_query("SELECT COUNT(*) as jumlah FROM dataKost"); //menghitung jumlah record
$jumlahrecord = mysql_fetch_array($jumlahrecord);
$jumlahhalaman = ceil($jumlahrecord['jumlah']/$batas); //mendapatkan jumlah halaman
echo "Jumlah Hal = $jumlahhalaman<br>"; 

//mendapatkan halaman aktif menggunakan GET

if(!isset($_GET['hal'])){
	$hal=1;
}else{
	$hal=$_GET['hal'];
}

$awal = ($hal - 1) * $batas; //mendapatkan nilai awal paging, misalnya awalnya 0 dimulai dari index ke 0 (row pertama)

//data yang tampil

$q=mysql_query("select * from dataKost limit $awal,5");//hal=3
while($d=mysql_fetch_array($q)){
echo $d['nama'];
echo "<br/>";
}

//membuat link halaman
//tombol prev
$prev=$hal-1;
if($prev+1==1){
	echo "awal ";
	echo "sebelumnya ";
}else{
	echo "<a href='?hal=1'>awal</a> ";
	echo "<a href='?hal=$prev'>sebelumnya</a> ";
}

//membuat halaman dengan numeric

for($i=1;$i<=$jumlahhalaman;$i++){
	if($i==$hal)
		echo "$i "; //pada saat dihalaman itu, misalnya dihalaman 4 ya brarti 4 tidak aktif
	else
		echo "<a href='?hal=$i'>$i</a> "; //tidak aktif (tidak pada halaman itu sendiri)
}

//tombol next
$next=$hal+1;
if($next-1==$jumlahhalaman){
	echo "selanjutnya ";
	echo "akhir";
}else{
	echo "<a href='?hal=$next'>selanjutnya</a> ";
	echo "<a href='?hal=$jumlahhalaman'>akhir</a>";
}
?>