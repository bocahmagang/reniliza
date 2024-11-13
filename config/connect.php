<?php
	//koneksi-next
	$host 	= "localhost";
	$us		= "root";
	$ps		= "";
	$db		= "korindahdb";
	
	$koneksi = mysqli_connect($host,$us,$ps,$db) or die('koneksi gagal');
	
	if($koneksi){
	    //echo "SUKSES";
	} else {
	    echo"Error Koneksi GAGAL";
	}
	
?>