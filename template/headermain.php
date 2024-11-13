<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<link rel="shortcut icon" type="image/jpg" href="file/logoKSU.png"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/custom.css">
		
		<!-- FontAwesome-->
		<link rel="stylesheet" href="assets/fa/css/all.css">

        <!-- jQuery -->	
        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <!-- JS -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <!-- SweetAlert2-->
        <script type="text/javascript" src="assets/sa/dist/sweetalert2.all.min.js"></script>

		<title>Reniliza WebPage</title>
	</head>
    <body style="font-size:1rem;">
        <!-- TOP Nav Bar Begin -->
        <div class="row m-0 p-0 p-1 bg-light fixed-top border-bottom">
            <div class="col-2 m-0 p-0 ps-2 text-start">
                <img src="file/login.jpeg" class="rounded" style="width:35px;" alt="gambartok">
            </div>
            <div class="col-8 m-0 p-0 text-center">
                <p class="text-center text-success m-0 p-0 mt-1">Reniliza Inayah, S.Pd.</p>
            </div>
            <div class="col-2 m-0 p-0 pt-1 text-end pe-2">
                <a href="#" class="small text-danger" onclick="logout();">Logout</a>
                <script>
                    function logout(){
                        Swal.fire({
                            title: "Logout?",
                            icon: "question",
                            showCancelButton: true,
                            confirmButtonText: "<i class='fa fa-thumbs-up me-2'></i> Ya",
                            confirmButtonColor: "#FF5733",
                            cancelButtonText: "<i class='fa fa-thumbs-down me-2'></i>Tidak",
                            cancelButtonColor: "#C70039",
                            focusConfirm: false,
                            focusCancel: true
                        }).then(result => {
                            var getLink="login.act?a=logout";

                            if(result.isConfirmed){
                                window.location.href = getLink
                            }
                        });

                        return false;
                    }
                </script>
            </div>
        </div>
        <!-- TOP Nav Bar end -->

        <!-- Main Body Begin -->
        <div class="container-fluid m-0 p-0 mt-5">
            <?php
            date_default_timezone_set("Asia/Bangkok");
            ?>

        

		
	