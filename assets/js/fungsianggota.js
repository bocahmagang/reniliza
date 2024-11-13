//--------------------------------------------RAGISTRASI ANGGOTA BEGIN
function ceknomoranggota1(){
    if($("#nomoranggota0").val()==""){
        $("#pesannomoranggota1").html("");
        $("#pesannomoranggota1").css("display","none");
    } else {
        var nomoranggota2 = $("#nomoranggota0").val();

        $.ajax({
            type    : "POST",
            url     : "profile/ceknomoranggota.php",
            data    : {nomor_anggota:nomoranggota2},
            success : function(response){
                $("#pesannomoranggota1").html(response);
                $("#pesannomoranggota1").css("display","block");
            }
        })

        /* alert(nomoranggota2); */

        /* $("#pesannomoranggota1").html($("#nomoranggota1").val());
        $("#pesannomoranggota1").css("display","block"); */
    }
}

function ceknik1(){
    if($("#nik0").val()==""){
        $("#pesannik1").html("");
        $("#pesannik1").css("display","none");
    } else {
        var nik2 = $("#nik0").val();

        $.ajax({
            type    : "POST",
            url     : "profile/ceknik.php",
            data    : {nik:nik2},
            success : function(response){
                $("#pesannik1").html(response);
                $("#pesannik1").css("display","block");
                $("#username0").val(nik2);
            }
        })
        /* $("#pesannik1").html($("#nik1").val());
        $("#pesannik1").css("display","block"); */
    }
}


function cekhp1(){
    if($("#hp0").val()==""){
        $("#pesanhp1").html("");
        $("#pesanhp1").css("display","none");
    } else {
        var hp2 = $("#hp0").val();

        $.ajax({
            type    : "POST",
            url     : "profile/cekhp.php",
            data    : {hp:hp2},
            success : function(response){
                $("#pesanhp1").html(response);
                $("#pesanhp1").css("display","block");
            }
        })
        /* $("#pesanhp1").html($("#hp1").val());
        $("#pesanhp1").css("display","block"); */
    }
}

function cekemail1(){
    if($("#email0").val()==""){
        $("#pesanemail1").html("");
        $("#pesanemail1").css("display","none");
    } else {
        var email2 = $("#email0").val();

        $.ajax({
            type    : "POST",
            url     : "profile/cekemail.php",
            data    : {email:email2},
            success : function(response){
                $("#pesanemail1").html(response);
                $("#pesanemail1").css("display","block");
            }
        })
        /* $("#pesanemail1").html($("#email1").val());
        $("#pesanemail1").css("display","block"); */
    }
}

function cekusername1(){
    if($("#username0").val()==""){
        $("#pesanusername1").html("");
        $("#pesanusername1").css("display","none");
    } else {
        var user2 = $("#username0").val();

        $.ajax({
            type    : "POST",
            url     : "profile/cekusername.php",
            data    : {username:user2},
            success : function(response){
                $("#pesanusername1").html(response);
                $("#pesanusername1").css("display","block");
            }
        })
        /* $("#pesanusername1").html($("#username1").val());
        $("#pesanusername1").css("display","block"); */
    }
}

$("#formdaftar").submit(function(){
    var nas = $("#pesannomoranggota1").html(),
        niks = $("#pesannik1").html(),
        hps = $("#pesanhp1").html(),
        emails = $("#pesanemail1").html(),
        uss = $("#pesanusername1").html();
    let nasok = nas.includes("check"),
        niksok = niks.includes("check"),
        hpsok = hps.includes("check"),
        emailsok = emails.includes("check"),
        ussok = uss.includes("check");

    if((nasok) && (niksok) && (hpsok) && (emailsok) && (ussok)){
        /* alert("wokeh lanjut"); */
        return true;
    } else {
        /* alert(nasok+' '+niksok+' '+hpsok+' '+emailsok+' '+ussok); */
        alert("CEK INPUTAN KEMBALI !!!")
        return false;
    }
    /* alert('Nomor anggota : '+nas+' '+niks+' '+hps+' '+emails+' '+uss); */
    /* return false; */
})






//--------------------------------------------UBAH ANGGOTA BEGIN
function ceknomoranggota2(){
    if($("#nomoranggota2").val()==""){
        $("#pesannomoranggota2").html("");
        $("#pesannomoranggota2").css("display","none");
    } else {
        var nomoranggotabaru = $("#nomoranggota2").val();
        var nomoranggotalama = $("#nomoranggotalama_id").val();

        if(nomoranggotabaru===nomoranggotalama){
            /* $("#pesannomoranggota2").html("<span class='text-success'><i class='fa fa-check-circle me-1'></i><span class='text-muted'>OK</span></span>"); */
            /* $("#pesannomoranggota2").css("display","block"); */
            $("#pesannomoranggota2").html("cok");
            $("#pesannomoranggota2").css("display","none");
        } else {
            /* alert("sejen"); */
            $.ajax({
                type    : "POST",
                url     : "profile/ceknomoranggota.php",
                data    : {nomor_anggota:nomoranggotabaru},
                success : function(response){
                    $("#pesannomoranggota2").html(response);
                    $("#pesannomoranggota2").css("display","block");
                }
            })
        }

        /* alert(nomoranggotau+' '+nomoranggotalama); */

        /* $("#pesannomoranggota1").html($("#nomoranggota1").val());
        $("#pesannomoranggota1").css("display","block"); */
    }
}

function ceknik2(){
    if($("#nik2").val()==""){
        $("#pesannik2").html("");
        $("#pesannik2").css("display","none");
    } else {
        var nikbaru = $("#nik2").val();
        var niklama = $("#niklama_id").val();

        if(nikbaru===niklama){
            /* $("#pesannik2").html("<span class='text-success'><i class='fa fa-check-circle me-1'></i><span class='text-muted'>OK</span></span>"); */
            /* $("#pesannik2").css("display","block"); */
            $("#pesannik2").html("cok");
            $("#pesannik2").css("display","none");
        } else {
            $.ajax({
                type    : "POST",
                url     : "profile/ceknik.php",
                data    : {nik:nikbaru},
                success : function(response){
                    $("#pesannik2").html(response);
                    $("#pesannik2").css("display","block");
                }
            })
        }
        /* $("#pesannik1").html($("#nik1").val());
        $("#pesannik1").css("display","block"); */
    }
}

function cekhp2(){
    if($("#hp2").val()==""){
        $("#pesanhp2").html("");
        $("#pesanhp2").css("display","none");
    } else {
        var hpbaru = $("#hp2").val();
        var hplama = $("#hplama_id").val();

        if(hpbaru===hplama){
            /* $("#pesanhp2").html("<span class='text-success'><i class='fa fa-check-circle me-1'></i><span class='text-muted'>OK</span></span>"); */
            /* $("#pesanhp2").css("display","block"); */
            $("#pesanhp2").html("cok");
            $("#pesanhp2").css("display","none");
        } else {
            $.ajax({
                type    : "POST",
                url     : "profile/cekhp.php",
                data    : {hp:hpbaru},
                success : function(response){
                    $("#pesanhp2").html(response);
                    $("#pesanhp2").css("display","block");
                }
            })
        }
        /* $("#pesanhp1").html($("#hp1").val());
        $("#pesanhp1").css("display","block"); */
    }
}

function cekemail2(){
    if($("#email2").val()==""){
        $("#pesanemail2").html("");
        $("#pesanemail2").css("display","none");
    } else {
        var emailbaru = $("#email2").val();
        var emaillama = $("#emaillama_id").val();

        if(emailbaru===emaillama){
            /* $("#pesanemail2").html("<span class='text-success'><i class='fa fa-check-circle me-1'></i><span class='text-muted'>OK</span></span>"); */
            /* $("#pesanemail2").css("display","block"); */
            $("#pesanemail2").html("cok");
            $("#pesanemail2").css("display","none");
        } else {
            $.ajax({
                type    : "POST",
                url     : "profile/cekemail.php",
                data    : {email:emailbaru},
                success : function(response){
                    $("#pesanemail2").html(response);
                    $("#pesanemail2").css("display","block");
                }
            })
        }
        /* $("#pesanemail1").html($("#email1").val());
        $("#pesanemail1").css("display","block"); */
    }
}

function cekusername2(){
    if($("#username2").val()==""){
        $("#pesanusername2").html("");
        $("#pesanusername2").css("display","none");
    } else {
        var userbaru = $("#username2").val();
        var userlama = $("#usernamelama_id").val();

        if(userbaru===userlama){
            /* $("#pesanusername2").html("<span class='text-success'><i class='fa fa-check-circle me-1'></i><span class='text-muted'>OK</span></span>"); */
            /* $("#pesanusername2").css("display","block"); */
            $("#pesanusername2").html("cok");
            $("#pesanusername2").css("display","none");
        } else {
            $.ajax({
                type    : "POST",
                url     : "profile/cekusername.php",
                data    : {username:userbaru},
                success : function(response){
                    $("#pesanusername2").html(response);
                    $("#pesanusername2").css("display","block");
                }
            })
        }
        /* $("#pesanusername1").html($("#username1").val());
        $("#pesanusername1").css("display","block"); */
    }
}

$("#formubah").submit(function(){
    var nas2 = $("#pesannomoranggota2").html(),
        niks2 = $("#pesannik2").html(),
        hps2 = $("#pesanhp2").html(),
        emails2 = $("#pesanemail2").html(),
        uss2 = $("#pesanusername2").html();

        let nas2ok = nas2.includes("check"),
            niks2ok = niks2.includes("check"),
            hps2ok = hps2.includes("check"),
            emails2ok = emails2.includes("check"),
            uss2ok = uss2.includes("check");
        
        let nas2e = nas2.includes("cok"),
            niks2e = niks2.includes("cok"),
            hps2e = hps2.includes("cok"),
            emails2e = emails2.includes("cok"),
            uss2e = uss2.includes("cok");

    /* if(((nas2==="OK") || (nas2==="")) && ((niks2==="OK") ||(niks2==="")) && ((hps2==="OK") ||(hps2==="")) && ((emails2==="OK") || (emails2==="")) && ((uss2==="OK") || (uss2===""))){ */
    if(((nas2ok) || (nas2e)) && ((niks2ok) ||(niks2e)) && ((hps2ok) ||(hps2e)) && ((emails2ok) || (emails2e)) && ((uss2ok) || (uss2e))){
        /* alert("wokeh lanjut"); */
        /* alert(nas2ok+' '+nas2e+' '+niks2ok+' '+niks2e+' '+hps2ok+' '+hps2e+' '+emails2ok+' '+emails2e+' '+uss2ok+' '+uss2e); */
        return true;
    } else {
        alert("CEK INPUTAN KEMBALI");
        /* alert(nas2ok+' '+nas2e+' '+niks2ok+' '+niks2e+' '+hps2ok+' '+hps2e+' '+emails2ok+' '+emails2e+' '+uss2ok+' '+uss2e); */
        return false;
    }
    /* alert(nas2ok+' '+niks2ok+' '+hps2ok+' '+emails2ok+' '+uss2ok+' '+nas2e+' '+niks2e+' '+hps2e+' '+emails2e+' '+uss2e); */
    /* alert(nas2ok+' '+niks2ok+' '+hps2ok+' '+emails2ok+' '+uss2ok+' '+nas2e+' '+niks2e+' '+hps2e+' '+emails2e+' '+uss2e);
    return false; */
})






/* BAGIAN UBAH PROFIL OLEH ANGGOTA */
function cekhp3(){
    if($("#hp3").val()==""){
        $("#pesanhp3").html("");
        $("#pesanhp3").css("display","none");
    } else {
        var hpbaru = $("#hp3").val();
        var hplama = $("#hplama_id3").val();

        if(hpbaru===hplama){
            /* $("#pesanhp2").html("<span class='text-success'><i class='fa fa-check-circle me-1'></i><span class='text-muted'>OK</span></span>"); */
            /* $("#pesanhp2").css("display","block"); */
            $("#pesanhp3").html("cok");
            $("#pesanhp3").css("display","none");
        } else {
            $.ajax({
                type    : "POST",
                url     : "profile/cekhp.php",
                data    : {hp:hpbaru},
                success : function(response){
                    $("#pesanhp3").html(response);
                    $("#pesanhp3").css("display","block");
                }
            })
        }
        /* $("#pesanhp1").html($("#hp1").val());
        $("#pesanhp1").css("display","block"); */
    }
}

function cekemail3(){
    if($("#email3").val()==""){
        $("#pesanemail3").html("");
        $("#pesanemail3").css("display","none");
    } else {
        var emailbaru = $("#email3").val();
        var emaillama = $("#emaillama_id3").val();

        if(emailbaru===emaillama){
            /* $("#pesanemail2").html("<span class='text-success'><i class='fa fa-check-circle me-1'></i><span class='text-muted'>OK</span></span>"); */
            /* $("#pesanemail2").css("display","block"); */
            $("#pesanemail3").html("cok");
            $("#pesanemail3").css("display","none");
        } else {
            $.ajax({
                type    : "POST",
                url     : "profile/cekemail.php",
                data    : {email:emailbaru},
                success : function(response){
                    $("#pesanemail3").html(response);
                    $("#pesanemail3").css("display","block");
                }
            })
        }
        /* $("#pesanemail1").html($("#email1").val());
        $("#pesanemail1").css("display","block"); */
    }
}

function cekusername3(){
    if($("#username3").val()==""){
        $("#pesanusername3").html("");
        $("#pesanusername3").css("display","none");
    } else {
        var userbaru = $("#username3").val();
        var userlama = $("#usernamelama_id3").val();

        if(userbaru===userlama){
            /* $("#pesanusername2").html("<span class='text-success'><i class='fa fa-check-circle me-1'></i><span class='text-muted'>OK</span></span>"); */
            /* $("#pesanusername2").css("display","block"); */
            $("#pesanusername3").html("cok");
            $("#pesanusername3").css("display","none");
        } else {
            $.ajax({
                type    : "POST",
                url     : "profile/cekusername.php",
                data    : {username:userbaru},
                success : function(response){
                    $("#pesanusername3").html(response);
                    $("#pesanusername3").css("display","block");
                }
            })
        }
        /* $("#pesanusername1").html($("#username1").val());
        $("#pesanusername1").css("display","block"); */
    }
}

$("#formubahprofil").submit(function(){
    var hps3 = $("#pesanhp3").html(),
        emails3 = $("#pesanemail3").html(),
        uss3 = $("#pesanusername3").html();

        let hps3ok = hps3.includes("check"),
            emails3ok = emails3.includes("check"),
            uss3ok = uss3.includes("check");
        
        let hps3e = hps3.includes("cok"),
            emails3e = emails3.includes("cok"),
            uss3e = uss3.includes("cok");

    if(((hps3ok) ||(hps3e)) && ((emails3ok) || (emails3e)) && ((uss3ok) || (uss3e))){
        /* alert("wokeh lanjut"); */
        return true;
    } else {
        alert("CEK INPUTAN KEMBALI");
        return false;
    }
    /* alert(hps3ok+' '+hps3e+' '+emails3ok+' '+emails3e+' '+uss3ok+' '+uss3e); */
})





/* BAGIAN UBAH PASWORD OLEH ANGGOTA*/
function cekpassword3(){
    var plama = $("#passwordlama_id3").val(),
        plamainput = $("#password3").val(),
        plamainputmd5 = md5(plamainput);

    if(plama==plamainputmd5){
        $("#pesanpassword3").html("<small class='text-success m-0 p-0 ms-1'><i class='fa fa-check-circle me-1'></i>OK</small>");
        $("#pesanpassword3").css("display","block");
    } else if(plamainput==""){
        $("#pesanpassword3").html("<small class='text-danger m-0 p-0 ms-1'><i class='fa fa-times-circle me-1'></i>MASUKKAN PASSWORD LAMA !</small>");
        $("#pesanpassword3").css("display","block");
    } else {
        $("#pesanpassword3").html("<small class='text-danger m-0 p-0 ms-1'><i class='fa fa-times-circle me-1'></i>PASSWORD SALAH !!!</small>");
        $("#pesanpassword3").css("display","block");
    }
    
}

function cekpassword4(){
    var plama = $("#password4").val(),
        pbaru = $("#password4").val(),
        plamamd5 = md5($("#password3").val()),
        pbarumd5 = md5(pbaru);

    if(pbarumd5==plamamd5){
        $("#pesanpassword4").html("<small class='text-danger ms-1'><i class='fa fa-times-circle me-1'></i>PASSWORD BARU HARUS BERBEDA !!!</small>");
        $("#pesanpassword4").css("display","block");
    } else if((pbaru=="") && (plama=="")){
        $("#pesanpassword4").html("<small class='text-danger ms-1'><i class='fa fa-times-circle me-1'></i>MASUKKAN PASSWORD BARU !</small>");
        $("#pesanpassword4").css("display","block");
    } else {
        $("#pesanpassword4").html("<small class='text-success ms-1'><i class='fa fa-check-circle me-1'></i>OK</small>");
        $("#pesanpassword4").css("display","block");
    }
    
}

function cekpassword5(){
    var pbaru2 = $("#password5").val(),
        pbaru2md5 = md5(pbaru2),
        pbarumd5 = md5($("#password4").val());
        
    if(pbaru2md5==pbarumd5){
        $("#pesanpassword5").html("<small class='text-success ms-1'><i class='fa fa-check-circle me-1'></i>OK</small>");
        $("#pesanpassword5").css("display","block");
    } else{
        $("#pesanpassword5").html("<small class='text-danger ms-1'><i class='fa fa-times-circle me-1'></i>ULANGI PASSWORD BARU !</small>");
        $("#pesanpassword5").css("display","block");
    }
    
}

$("#formubahpassword").submit(function(){
    var pl = $("#pesanpassword3").html(),
        pb1 = $("#pesanpassword4").html(),
        pb2 = $("#pesanpassword5").html();

        var plok = pl.includes("success"),
            pb1ok = pb1.includes("success"),
            pb2ok = pb2.includes("success");

    if(plok && pb1ok && pb2ok){
        /* alert("wokeh lanjut"); */
        return true;
    } else {
        alert("CEK INPUTAN KEMBALI");
        return false;
    }
    /* alert("hostah");
    return false; */
})



/* FUNGSI TOMBOL RESET */
function refresh(){
    location.reload();
}
