<?php
//include("config/connect.php");
include("template/session.php");
include("template/headermain.php");

if(!isset($_SESSION['reniliza_login'])){
    header("location:index");
} else {
    include("modul/dashboard.php");
}

include("template/footermain.php");
?>

