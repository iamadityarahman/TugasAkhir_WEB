<?php
session_start();
//koneksi ke database
$conn = mysql_connect('localhost','root','');
$db	  = mysql_select_db('kost',$conn);
if(isset($_POST['var_usn']) AND isset($_POST['var_pwd'])){
	$username = addslashes($_POST['var_usn']);
	$password = addslashes($_POST['var_pwd']);
	$check    = mysql_query('select * from dataKost where Usn="'.$username.'" AND Pwd="'.$password.'" ');
	if(mysql_num_rows($check)==0){
		echo 'Username atau Password Salah !';
	}
	else{
		$_SESSION['login']['usn'] = $username;
		$_SESSION['login']['pwd'] = $password;
		echo 'ok';
	}
}
?>