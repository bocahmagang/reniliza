<?php
session_start();

$a = $_GET['a'];

if($a=='upload'){

    $namaFile = $_FILES['berkas']['name'];
    $x = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($x));
    $ukuranFile = $_FILES['berkas']['size'];
    $file_tmp = $_FILES['berkas']['tmp_name'];
    
    $dirUpload = "../file/tempatfile/";
    $linkBerkas = $dirUpload.$namaFile;
    
    if(file_exists($linkBerkas)){
        $_SESSION['reniliza_file_exist']=1;
    }else{
        $terupload = move_uploaded_file($file_tmp, $linkBerkas);
    
        if($terupload){
            $_SESSION['reniliza_upload_ok']=1;
        } else {
            $_SESSION['reniliza_upload_gagal']=1;
        }
    }     

} else if($a=='hapus'){

    $f = $_GET['f'];
    $hapus = unlink('../'.$f);

    if($hapus){
        $_SESSION['reniliza_upload_ok']=1;
    } else {
        $_SESSION['reniliza_upload_gagal']=1;
    }

}

    header("location:../main?p=dashboard");

?>