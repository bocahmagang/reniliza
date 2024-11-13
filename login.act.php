<?php
include("template/session.php");
include("config/connect.php");
date_default_timezone_set("Asia/Jakarta");

$aksi = $_GET['a'];

if($aksi=='login'){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(($username=='renilizainayah') && ($password=='1608052024')){
        $oklogin = 1;
    } else {
        $oklogin = 0;
    }

    if($oklogin<1){

        $_SESSION['reniliza_logine_gagal'] = 1;

        $lokasi = "location:index";

    } else {

        $_SESSION['reniliza_logine_oke'] = 1;

        $_SESSION['reniliza_login'] = "oke";
        $_SESSION['reniliza_user'] = $username;
        
        $lokasi = "location:main?p=dashboard";

    }

} else {

    unset($_SESSION['reniliza_login']);
    unset($_SESSION['reniliza_user']);
    //session_destroy(); 

    $lokasi="location:index";

}

header($lokasi);
?>