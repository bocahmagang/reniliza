<?php
//include("config/connect.php");
include("template/session.php");
include("template/header.php");

if(!isset($_SESSION['reniliza_login'])){
    ?>
    <div class="row m-0 p-0 p-1 mt-5">
        <div class="col-12 py-3 mx-auto">

            <p class="text-center">
                <img src="file/login.jpeg" class="rounded" style="width:15%;" alt="gambartok">            
            </p>
            
            <h6 class="text-center text-muted">- LOGIN -</h6>

            <!-- Login Form -->
            <div class="col-md-6 col-lg-4 mx-auto mt-1">
                <div class="card p-3">
                    <form class="form-group pb-2" id="masukya" method="POST" action="login.act?a=login">
                        <label for="username" class="form-label ms-2">Username:</label>
                        <input type="text" id="us" class="form-control bg-muted text-muted" name="username" placeholder="Username" autofocus required>
                        
                        <label for="password" class="form-label pt-3 ms-2">Password:</label>
                        <input type="password" id="ps" class="form-control bg-muted text-muted" name="password" placeholder="Password" required>
                        
                        <div class="d-flex flex-row-reverse mt-2">
                            <button type="submit" class="btn btn-primary btn-sm" name="tombollogin"><i class="fa fa-sign-in-alt me-1"></i>Masuk</button>
                        </div>
                    </form>

                    <?php
                    if(!isset($_SESSION['ksu_login'])){
                    } else if((isset($_SESSION['ksu_login'])) && ($_SESSION['ksu_login']=="gagal")){
                        ?>
                        <p class="alert alert-danger text-center mt-2">Cek Username dan Password Anda !</p>
                        <?php
                    } else if((isset($_SESSION['ksu_login'])) && ($_SESSION['ksu_login']=="sukses")){
                    }
                    unset($_SESSION['ksu_login']);
                    ?>
                </div>
            </div>
            <!-- Login Form -->

        </div>
    </div>
    
	<?php
    include("template/footer.php");

    if(isset($_SESSION['reniliza_logine_oke'])){
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
        unset($_SESSION['reniliza_logine_oke']);
    } else if(isset($_SESSION['reniliza_logine_gagal'])){
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
        unset($_SESSION['reniliza_logine_gagal']);
    }

} else {
    header("location:login");
}
?>

