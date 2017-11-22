<?php
	if(isset($_GET['id'])) {
		include "../config.php";
		$sqlHapus = mysql_query("DELETE FROM user WHERE id = $_GET[id]");
		echo "<script>location.href='../admin.php?page=user'</script>";
	}
?>