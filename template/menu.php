<div class="offcanvas offcanvas-start" style="width:15rem;" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header m-0 p-0 p-1 border-bottom">
        <!-- SAPAAN -->
        <span class="m-0 p-0 p-1">
            Hi, <b><?=$_SESSION['ksu_nama']?></b>
        </span>
        <button type="button" class="btn-close btn-sm small me-1" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body m-0 p-0">
        <div class="row m-0 p-0 p-1">
            <div class="col-12 card ">
                <?php
                $qa = "SELECT * FROM tb_foto_profil WHERE nik='$_SESSION[ksu_nik]'";
                $ea = mysqli_query($koneksi,$qa);
                $ha = mysqli_fetch_array($ea);
                if(empty($ha['foto']) || ($ha['foto']=='')){
                    $fotone = "nopic.png";
                } else {
                    $fotone = $ha['foto'];
                }
                ?>
                <img src="file/profil/<?=$fotone?>" class="rounded mx-auto d-block p-1" alt="pp" style="width:80%;">
                <p class="text-center small mt-2">
                    <a href="main?p=profile">Lihat Profil</a>
                </p>
                
                <div class="row m-0 p-0 border-top" style="font-size:0.75em;">
                    <div class="col p-1">
                        <a href="" class="m-0 p-0 text-danger" id="div_keranjang" style="padding:5px;font-size:1.5em;text-decoration:none;border-radius:50%;">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="bg-primary position-absolute text-light badge rounded-pill" id="keranjangCek" style="font-size:0.5em; margin-top:2px;margin-left:-10px;"></span>
                                <script>
                                    $(document).ready(function(){
                                        $.ajax({
                                            url: 'modul/toko/cekkeranjang.php',
                                            type: 'post',
                                            data: {},
                                            success: function(response) { 
                                                $("#keranjangCek").html(response);
                                            }
                                        })
                                    })
                                </script>
                        </a>
                    </div>
                    <div class="col text-end p-1">
                        <?php
                        //cari poin
                        $qpoin = "SELECT *,SUM(poin_masuk) as jpm,SUM(poin_keluar) as jpk FROM tb_poin WHERE id_anggota='$_SESSION[ksu_id]'";
                        $epoin = mysqli_query($koneksi,$qpoin);
                        $hpoin = mysqli_fetch_array($epoin);

                        if(empty($hpoin['jpm'])){
                            $poinmu = "0";
                        } else {
                            $poinmu = $hpoin['jpm']-$hpoin['jpk'];
                        }
                        ?>
                        <p class="m-0 p-0 p-1"><i>Poinmu : <b><?=number_format($poinmu,0,",",".")?></b></i></p>
                    </div>
                </div>
                <div class="row m-0 p-0 border-top">
                    <div class="col p-1">
                        <span class="text-muted small"><i><?=$_SESSION['ksu_akses']?></i></span>
                    </div>
                    <div class="col text-end p-1">
                        <a href="#" class="small text-danger m-0 p-0 p-1" onclick="kliklogout()">Logout</a>
                        <script>
                            function kliklogout(){
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
                
            </div>
        </div>
        <div class="row m-0 p-0 p-1">
            <?php
            $darinya = "";
            $sampainya = "";
            $bgakordIcon = "";
            $bgakordIconSubAdm = "";
            $bgakordIconSubKasir = "";

            /* ---- sTatus User Login ---- */
            if($_SESSION['ksu_akses']=='SuperUser'){ //-----------SuperUser
                $aksesadmtoko1 = "";
                $aksesadmtoko2 = "";
                $aksesadmbarang1 = "";
                $aksesadmbarang2 = "";
                $aksesadmsimpin1 = "";
                $aksesadmsimpin2 = "";
                $akseskasir1 = "";
                $akseskasir2 = "";
                $aksessu1 = "";
                $aksessu2 = "";
                $aksesanggota1 = "";
                $aksesanggota2 = "";
            } else if($_SESSION['ksu_akses']=='Anggota') { //-----------Anggota
                $aksesadmtoko1 = "<!--";
                $aksesadmtoko2 = "-->";
                $aksesadmbarang1 = "<!--";
                $aksesadmbarang2 = "-->";
                $aksesadmsimpin1 = "<!--";
                $aksesadmsimpin2 = "-->";
                $akseskasir1 = "<!--";
                $akseskasir2 = "-->";
                $aksessu1 = "<!--";
                $aksessu2 = "-->";
                $aksesanggota1 = "";
                $aksesanggota2 = "";
            } else if($_SESSION['ksu_akses']=='Kasir') { //-----------KasirToko
                $aksesadmtoko1 = "<!--";
                $aksesadmtoko2 = "-->";
                $aksesadmbarang1 = "<!--";
                $aksesadmbarang2 = "-->";
                $aksesadmsimpin1 = "<!--";
                $aksesadmsimpin2 = "-->";
                $akseskasir1 = "";
                $akseskasir2 = "";
                $aksessu1 = "<!--";
                $aksessu2 = "-->";
                $aksesanggota1 = "";
                $aksesanggota2 = "";
            } else if($_SESSION['ksu_akses']=='Admin Toko') { //-----------AdminToko
                $aksesadmtoko1 = "";
                $aksesadmtoko2 = "";
                $aksesadmbarang1 = "<!--";
                $aksesadmbarang2 = "-->";
                $aksesadmsimpin1 = "<!--";
                $aksesadmsimpin2 = "-->";
                $akseskasir1 = "";
                $akseskasir2 = "";
                $aksessu1 = "<!--";
                $aksessu2 = "-->";
                $aksesanggota1 = "";
                $aksesanggota2 = "";
            } else if($_SESSION['ksu_akses']=='Admin Simpin') { //-----------AdminSimpin
                $aksesadmtoko1 = "<!--";
                $aksesadmtoko2 = "-->";
                $aksesadmbarang1 = "<!--";
                $aksesadmbarang2 = "-->";
                $aksesadmsimpin1 = "";
                $aksesadmsimpin2 = "";
                $akseskasir1 = "<!--";
                $akseskasir2 = "-->";
                $aksessu1 = "<!--";
                $aksessu2 = "-->";
                $aksesanggota1 = "";
                $aksesanggota2 = "";
            } else if($_SESSION['ksu_akses']=='Admin Barang') { //-----------AdminBarang
                $aksesadmtoko1 = "<!--";
                $aksesadmtoko2 = "-->";
                $aksesadmbarang1 = "";
                $aksesadmbarang2 = "";
                $aksesadmsimpin1 = "<!--";
                $aksesadmsimpin2 = "-->";
                $akseskasir1 = "<!--";
                $akseskasir2 = "-->";
                $aksessu1 = "<!--";
                $aksessu2 = "-->";
                $aksesanggota1 = "";
                $aksesanggota2 = "";
            }
            /* ---- sTatus User Login ---- */
            ?>

            <div class="col-12 m-0 p-0 text-success" style="font-size:0.85em;">
                <div class="card m-0 p-0 p-1 mb-1 text-success text-center">
                    MENU
                </div>
                
                <!-- TOKO -->
                <div class="card m-0 p-0 p-1 mb-1 mt-2 bg-success text-white text-center" data-bs-toggle="collapse" data-bs-target="#menutokoid" aria-expanded="false">
                    <b>#Unit Usaha Toko</b>
                </div>

                    <div id="menutokoid" class="collapse m-0 p-0">
                        
                        <!-- ANGGOTA -->
                        <?=$aksesanggota1?>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-success">
                            <p class="m-0 p-0 p-1"><i class="fas fa-shopping-cart me-1"></i>Kunjungi Toko</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-success">
                            <p class="m-0 p-0 p-1"><i class="fas fa-credit-card me-1"></i>BON Toko Berjalan</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-success">
                            <p class="m-0 p-0 p-1"><i class="fas fa-shopping-bag me-1"></i>Belanja (diproses)</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-success">
                            <p class="m-0 p-0 p-1"><i class="fas fa-history me-1"></i>Riwayat Belanja</p>
                        </a>
                        <?=$aksesanggota2?>

                        <!-- KASIR TOKO -->
                        <?=$akseskasir1?>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-danger">
                            <p class="m-0 p-0 p-1"><i class="fas fa-cash-register me-1"></i>Penjualan</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-danger">
                            <p class="m-0 p-0 p-1"><i class="fas fa-cash-register me-1"></i>PPOB</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-danger">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file me-1"></i>Pesanan</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-danger">
                            <p class="m-0 p-0 p-1"><i class="fas fa-undo me-1"></i>Retur</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-danger">
                            <p class="m-0 p-0 p-1"><i class="fas fa-microchip me-1"></i>Stock Opname</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-danger">
                            <p class="m-0 p-0 p-1"><i class="fas fa-times-circle me-1"></i>Closing Kasir</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-danger">
                            <p class="m-0 p-0 p-1"><i class="fas fa-tags me-1"></i>Label Harga</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-danger">
                            <p class="m-0 p-0 p-1"><i class="fas fa-star me-1"></i>Terlaris</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-danger">
                            <p class="m-0 p-0 p-1"><i class="fas fa-tag me-1"></i>Cek Harga</p>
                        </a>
                        <?=$akseskasir2?>

                        <!-- ADMIN TOKO -->
                        <?=$aksesadmtoko1?>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-key me-1"></i>Master <b>Barang</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-key me-1"></i>Master <b>Jenis</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-key me-1"></i>Master <b>Merk</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-key me-1"></i>Master <b>Suppllier</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-key me-1"></i>Master <b>Promo</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-key me-1"></i>Master <b>Rak</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-key me-1"></i>Master <b>Satuan</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-key me-1"></i>Master <b>Poin</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-key me-1"></i>Master <b>Item PPOB</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-cash-register me-1"></i>Pembelian</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Rekap Pembelian</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file me-1"></i>Detail Pembelian</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Rekap Penjualan</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file me-1"></i>Detail Penjualan</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Rekap Penjualan <b>BON</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Rekap Penjualan <b>PPOB</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Rekap <b>Retur</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-clipboard-list me-1"></i>Kartu Stok</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-battery-empty me-1"></i>Stok <b>Terbatas</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-history me-1"></i>Riwayat Closing</p>
                        </a>
                        <?=$aksesadmtoko2?>
                    
                    </div>
                <!-- TOKO -->

                <!-- SIMPIN -->
                <div class="card m-0 p-0 p-1 mb-1 mt-2 bg-success text-white text-center" data-bs-toggle="collapse" data-bs-target="#menusimpinid" aria-expanded="false">
                    <b>#Unit SIMPIN</b>
                </div>
                
                    <div id="menusimpinid" class="collapse m-0 p-0">
                        <!-- ANGGOTA -->
                        <?=$aksesanggota1?>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-success">
                            <p class="m-0 p-0 p-1"><i class="fas fa-credit-card me-1"></i>Pinjaman SIMPIN</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-success">
                            <p class="m-0 p-0 p-1"><i class="fas fa-history me-1"></i>Riwayat SIMPIN</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-success">
                            <p class="m-0 p-0 p-1"><i class="fas fa-credit-card me-1"></i>Pembiayaan Lain</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-success">
                            <p class="m-0 p-0 p-1"><i class="fas fa-table me-1"></i>Simulasi Pinjaman</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-success">
                            <p class="m-0 p-0 p-1"><i class="fas fa-exclamation-triangle me-1"></i>Informasi Simpin</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-success">
                            <p class="m-0 p-0 p-1"><i class="fas fa-exclamation-triangle me-1"></i>S&K Simpin</p>
                        </a>
                        <?=$aksesanggota2?>

                        <!-- ADMIN SIMPIN -->
                        <?=$aksesadmsimpin1?>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-key me-1"></i>Master <b>SYARAT</b> Simpin</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-key me-1"></i>Master <b>INFORMASI</b> Simpin</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-key me-1"></i>Master <b>JASA</b> Simpin</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-key me-1"></i>Master <b>PLAFON</b> Simpin</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-key me-1"></i>Master <b>JENIS</b> Biaya Lain</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-download me-1"></i>Input Simpin [<b>Bulk</b>]</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-plus-square me-1"></i><b>INPUT</b> Simpin</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Rekap <b>DATA</b> Simpin</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Rekap <b>POTONGAN</b> Simpin</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Rekap <b>ANGSURAN</b> Simpin</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Rekap <b>SISA HUTANG</b> Simpin</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-download me-1"></i>Input Biaya Lain [<b>Bulk</b>]</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-plus-square me-1"></i><b>INPUT</b> Biaya Lain</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Rekap <b>DATA</b> Biaya Lain</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Rekap <b>POTONGAN</b> Biaya Lain</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-handshake me-1"></i><b>REKAP PENGAJUAN</b> Simpin</p>
                        </a>
                        <?=$aksesadmsimpin2?>

                    </div>
                <!-- SIMPIN -->

                <!-- BARANG -->
                <div class="card m-0 p-0 p-1 mb-1 mt-2 bg-success text-white text-center" data-bs-toggle="collapse" data-bs-target="#menubarangid" aria-expanded="false">
                    <b>#Unit BARANG</b>
                </div>

                    <div id="menubarangid" class="collapse m-0 p-0">
                        
                        <!-- ANGGOTA -->
                        <?=$aksesanggota1?>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-success">
                            <p class="m-0 p-0 p-1"><i class="fas fa-credit-card me-1"></i>Pinjaman BARANG</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-success">
                            <p class="m-0 p-0 p-1"><i class="fas fa-history me-1"></i>Riwayat Peminjaman BARANG</p>
                        </a>
                        <?=$aksesanggota2?>

                        <!-- ADMIN BARANG -->
                        <?=$aksesadmbarang1?>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-key me-1"></i>Master <b>JASA</b> Barang</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-download me-1"></i>Input Barang <b>BULK</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-plus-square me-1"></i>INPUT</b> Pinjaman Barang</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i><b>REKAP</b> Pinjaman Barang</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Rekap <b>POTONGAN</b> Barang</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Rekap <b>ANGSURAN</b> Barang</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Rekap <b>SISA HUTANG</b> Barang</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-handshake me-1"></i><b>REKAP PENGAJUAN</b> Pinjaman Barang</p>
                        </a>
                        <?=$aksesadmbarang2?>

                    </div>
                <!-- BARANG -->

                <!-- TABUNGAN/SIMPANAN MENU -->
                <div class="card m-0 p-0 p-1 mb-1 mt-2 bg-success text-white text-center" data-bs-toggle="collapse" data-bs-target="#menutabunganid" aria-expanded="false">
                    <b>#Tabungan / Simpanan</b>
                </div>

                    <div id="menutabunganid" class="collapse m-0 p-0">

                        <!-- ANGGOTA -->
                        <?=$aksesanggota1?>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-success">
                            <p class="m-0 p-0 p-1"><i class="fas fa-coins me-1"></i>Simpanan Pokok dan Wajib</p>
                        </a>
                        <?=$aksesanggota2?>

                        <!-- ADMIN SIMPIN -->
                        <?=$aksesadmsimpin1?>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Potongan <b>Pokok</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Potongan <b>Wajib</b></p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Rekap Simpanan</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-coins me-1"></i>Besaran Pokok & Wajib</p>
                        </a>
                        <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                            <p class="m-0 p-0 p-1"><i class="fas fa-money-bill me-1"></i>Setoran Manual</p>
                        </a>
                        <?=$aksesadmsimpin2?>

                    </div>
                <!-- TABUNGAN/SIMPANAN MENU -->

                <!-- PANTUAN ANGGOTA -->
                <?php
                if($_SESSION['ksu_akses']=="Anggota"){
                } else {
                    ?>
                    <div class="card m-0 p-0 p-1 mb-1 mt-2 bg-success text-white text-center" data-bs-toggle="collapse" data-bs-target="#menupantauanid" aria-expanded="false">
                        <b>#Pantauan Anggota</b>
                    </div>

                        <div id="menupantauanid" class="collapse m-0 p-0">
                        
                            <!-- ADMIN -->
                            <a href="" class="card m-0 p-0 p-1 m-1 text-primary">
                                <p class="m-0 p-0 p-1"><i class="fas fa-file-alt me-1"></i>Pantauan Anggota</p>
                            </a>

                        </div>
                    <?php
                }
                ?>
                <!-- PANTUAN ANGGOTA -->

                <!-- SU MENU -->
                 <?PHP
                if($_SESSION['ksu_akses']=="SuperUser"){
                    ?>
                    <div class="card m-0 p-0 p-1 mb-1 mt-2 bg-danger text-white text-center" data-bs-toggle="collapse" data-bs-target="#menusuid" aria-expanded="false">
                        <b>#SUPERUSER MENU</b>
                    </div>

                        <div id="menusuid" class="collapse m-0 p-0">
                        
                            <!-- SU -->
                            <a href="" class="card m-0 p-0 p-1 m-1 text-danger">
                                <p class="m-0 p-0 p-1"><i class="fas fa-sitemap me-1"></i>Master <b>DEPARTEMEN</b></p>
                            </a>
                            <a href="" class="card m-0 p-0 p-1 m-1 text-danger">
                                <p class="m-0 p-0 p-1"><i class="fas fa-sitemap me-1"></i>Master <b>BAGIAN</b></p>
                            </a>
                            <a href="" class="card m-0 p-0 p-1 m-1 text-danger">
                                <p class="m-0 p-0 p-1"><i class="fas fa-sitemap me-1"></i>Master <b>SUB BAGIAN</b></p>
                            </a>
                            <a href="" class="card m-0 p-0 p-1 m-1 text-danger">
                                <p class="m-0 p-0 p-1"><i class="fas fa-user-lock me-1"></i>Master <b>LEVEL</b> Anggota</p>
                            </a>
                            <a href="" class="card m-0 p-0 p-1 m-1 text-danger">
                                <p class="m-0 p-0 p-1"><i class="fas fa-users me-1"></i>Master <b>ANGGOTA</b></p>
                            </a>
                            <a href="" class="card m-0 p-0 p-1 m-1 text-danger">
                                <p class="m-0 p-0 p-1"><i class="fas fa-sliders me-1"></i><b>ADJUSTMENT</b></p>
                            </a>
                        
                        </div>
                    <?php
                } else {
                }
                ?>

                <!-- SU MENU -->

            </div>
        </div>
    </div>
</div>