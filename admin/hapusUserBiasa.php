<?php
	include "../config.php";

	mysql_query("DELETE FROM userBiasa WHERE id = $_GET[id]");

	mysql_query("DELETE FROM reviewKost WHERE idUser = $_GET[id]");

	mysql_query("ALTER TABLE userBiasa DROP id");
	mysql_query("ALTER TABLE userBiasa ADD id BIGINT(20) NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (id)");

	echo "<script>location.href='index.php?page=userBiasa';</script>";
?>