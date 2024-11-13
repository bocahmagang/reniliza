<?php
include("template/session.php");

if(!isset($_SESSION['reniliza_login'])){
    $lokasi = "location:login";
} else {
    $lokasi = "location:modul/main";
}
header($lokasi);
?>