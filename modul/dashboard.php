<?php
if(!isset($_SESSION['reniliza_login'])){

} else {
    ?>
    <div class="row m-0 p-0 border-bottom pb-1">
        <div class="col-11 m-0 p-0 p-1 text-center mx-auto">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="nama file" id="textfilterid" onkeyup="filterfile();">
                <button class="btn btn-danger text-white" type="button" onclick="alert('belum tersedia modul pencarian');"><i class="fas fa-search"></i></button>
                <button class="btn btn-primary text-white" type="button" data-bs-toggle="modal" data-bs-target="#upload"><i class="fas fa-upload"></i></button>
            </div>

            <form method="post" enctype="multipart/form-data" action="modul/upload?a=upload">
            <?php $rand = rand(); $_SESSION['rand'] = $rand;?>
            <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
                <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-warning">
                                <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
                                <a href="#" class="text-warning" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </a>
                            </div>
                            <div class="modal-body">
                                <div class="row m-0 p-0">
                                    <div class="col-12 m-0 p-0 px-1">
                                        <input type="file" class="form-control" name="berkas" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary btn-sm" name="f_submit"><i class="fas fa-save me-1"></i>Save</button>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal"><i class="fas fa-times me-1"></i>Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <div class="row m-0 p-0 p-1">
            <?php
            // nama folder direktori
            $dir    ="file/tempatfile";
            
            // membuka folder direktori
            $open   = opendir($dir) or die('Folder tidak ditemukan ...!');
            while ($file    =readdir($open)) {
                if($file !='.' && $file !='..'){   
                    $files[]=$file;
                }
            }

            if(!isset($files)){
                $jumlah_file = 0;
                ?>
                <p class="text-danger text-center">Tidak ada file dalam folder.</p>
                <?php
            } else {
                $jumlah_file = count($files);

                for($i=0;$i<($jumlah_file);$i++){
                    $ext0 = explode(".",$files[$i]);
                    $cext0 = count($ext0);
                    $ext = $ext0[($cext0-1)];
                    
                    ?>
                    <div class="col-12 col-md-6 p-2" id="file<?=$i?>">
                        <div class="card border-danger">
                            <div class="card-body p-2 text-center">
                                <p class="text-muted text-start m-0 p-0 p-1 ps-2 small"><?=$ext?></p>

                                <a href="<?=$dir."/".$files[$i]?>" target="_blank" class="text-success">
                                    <b><?=$files[$i]?></b>
                                </a>

                                <p class="small m-0 p-0 p-1 pe-2 text-end">
                                    <a href="modul/upload?a=hapus&f=<?=$dir."/".$files[$i]?>" class="text-danger">
                                        <i class="fas fa-times"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                }
                ?>
                <p class="mt-2 p-2 small text-muted border-top">Jumlah File: <b><?=$jumlah_file?></b></p>
                <?php
            }
            
            ?>
    </div>    
    <?php

    if(isset($_SESSION['reniliza_upload_ok'])){
        ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Proses Berhasil', 
                showConfirmButton: true,
                focusConfirm: true,
                confirmButtonText:
                    '<i class="fa fa-thumbs-up"></i> OK !',
                confirmButtonAriaLabel: 'Thumbs up, OK!',
                timer: 1000
            })
        </script>
        <?php
        unset($_SESSION['reniliza_upload_ok']);
    } else if(isset($_SESSION['reniliza_upload_gagal'])){
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Maaf Proses Gagal',
                showConfirmButton: true,
                focusConfirm: true,
                confirmButtonText:
                    '<i class="fa fa-thumbs-down"></i> OK !',
                confirmButtonAriaLabel: 'Thumbs down, OK!',
                timer: 1500
            })
        </script>
        <?php
        unset($_SESSION['reniliza_upload_gagal']);
    } else if(isset($_SESSION['reniliza_file_exist'])){
        ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'File sudah Ada',
                showConfirmButton: true,
                focusConfirm: true,
                confirmButtonText:
                    '<i class="fa fa-thumbs-down"></i> OK !',
                confirmButtonAriaLabel: 'Thumbs down, OK!',
                timer: 1500
            })
        </script>
        <?php
        unset($_SESSION['reniliza_file_exist']);
    }
}
?>

