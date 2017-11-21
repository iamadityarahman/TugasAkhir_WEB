<?php
    session_start();
    if(!isset($_SESSION['user']) && !isset($_SESSION['pass'])) {
        echo "  <script>
                    window.open('./index.php', '_SELF');
                </script>";
    }
    include "./config.php";
    include "admin/updateData.php";
    if(!isset($_GET['page']) || $_GET['page'] == "home") {
        $namaHalaman = "KOST-QU MYADMIN";
    } elseif($_GET['page'] == "edit") {
        $namaHalaman = "EDIT KOST";
    } elseif($_GET['page'] == "daftar") {
        $namaHalaman = "DAFTAR KOST";
    } elseif($_GET['page'] == "tambah") {
        $namaHalaman = "TAMBAH KOST";
    } elseif($_GET['page'] == "user") {
        $namaHalaman = "MANAJEMEN USER";
    } elseif($_GET['page'] == "foto") {
        $namaHalaman = "MANAJEMEN FOTO KOST";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title><?=$namaHalaman?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./css/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            html,body,h1,h2,h3,h4,h5 {
                font-family: "Raleway", sans-serif;
            }
            #map {
                height: 400px;
            }
        </style>
    </head>
<body class="w3-white">
    <!-- Top container -->
    <div class="w3-bar w3-top w3-teal w3-xlarge" style="z-index:4">
        <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i>  Menu</button>
        <span class="w3-bar-item w3-left">KOST-QU MYADMIN</span>
        <a href="./admin/logout.php" class="w3-bar-item w3-right w3-margin-right w3-hover-red">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
        </a>
    </div>

    <!-- Sidebar/menu -->
    <nav class="w3-sidebar w3-collapse w3-teal" style="z-index:3;width:300px;margin-top:20px;" id="mySidebar"><br>
        <div class="w3-container w3-center">
            <img src="./img/admin.ico" class="w3-image w3-circle w3-white" style="width: 100px" />
            <div class="w3-row-padding w3-margin-top w3-margin-bottom">
                    <button onclick="window.open('index.php', '_SELF')" class="w3-button w3-yellow w3-black">SITE</button>
                    <button class="w3-button w3-yellow w3-black">PROFILE</button>
            </div>
        </div>
        <div class="w3-bar-block">
            <a href="#" class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>  Close Menu</a>
            <a href="?page=home" class="w3-bar-item w3-hover-white w3-button w3-padding <? if($_GET['page'] == "home") echo "w3-black" ?>"><i class="fa fa-home fa-fw"></i>  Home</a>
            <a href="?page=tambah" class="w3-bar-item w3-hover-white w3-button w3-padding <? if($_GET['page'] == "tambah") echo "w3-black" ?>"><i class="fa fa-plus fa-fw"></i>  Tambah Kost</a>
            <a href="?page=daftar" class="w3-bar-item w3-hover-white w3-button w3-padding <? if($_GET['page'] == "daftar" || $_GET['page'] == "edit" || $_GET['page'] == "foto") echo "w3-black" ?>"><i class="fa fa-wrench fa-fw"></i>  Manajemen Kost</a>
            <a href="?page=user" class="w3-bar-item w3-hover-white w3-button w3-padding <? if($_GET['page'] == "user") echo "w3-black" ?>"><i class="fa fa-users fa-fw"></i>  Manajemen User</a>
        </div>
    </nav>

    <!-- Overlay effect when opening sidebar on small screens -->
    <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <!-- sidebar menu selesi -->

    <!-- isi inya -->
    <div class="w3-main" style="margin-left:300px;margin-top:30px;">
        <?php
            if (!isset($_GET['page'])) {
                include "./admin/home.php";
            } elseif($_GET['page'] == "tambah") {
                include "./admin/tambah.php";
            } elseif($_GET['page'] == "daftar") {
                include "./admin/daftar.php";
            } elseif($_GET['page'] == "home") {
                include "./admin/home.php";
            } elseif($_GET['page'] == "edit") {
                include "./admin/edit.php";
            } elseif($_GET['page'] == "user") {
                include "./admin/user.php";
            } elseif($_GET['page'] == "foto") {
                include "./admin/foto.php";
            }
        ?>
    </div>
    <!-- isi sampai sini -->
    
    <script>
        // Get the Sidebar
        var mySidebar = document.getElementById("mySidebar");

        // Get the DIV with overlay effect
        var overlayBg = document.getElementById("myOverlay");

        // Toggle between showing and hiding the sidebar, and add overlay effect
        function w3_open() {
            if (mySidebar.style.display === 'block') {
                mySidebar.style.display = 'none';
                overlayBg.style.display = "none";
            } else {
                mySidebar.style.display = 'block';
                overlayBg.style.display = "block";
            }
        }

        // Close the sidebar with the close button
        function w3_close() {
            mySidebar.style.display = "none";
            overlayBg.style.display = "none";
        }
    </script>
</body>
</html>

