<?php 
    include "../config.php";

    $hal = 5; //batasan halaman
    
    $page = isset($_GET['hal'])? (int)$_GET["hal"]:1;
    
    $mulai = ($page>1) ? ($page * $hal) - $hal : 0;

    $query = mysql_query("select * from dataKost LIMIT $mulai, $hal");
    $sql = mysql_query("select * from dataKost");
    $total = mysql_num_rows($sql);
    $pages = ceil($total/$hal); 
    for ($i=1; $i<=$pages ; $i++){ ?>
        <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
    <?php } 

?>