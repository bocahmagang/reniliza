function cekNik(){
    $(".pesanNIK").html("");

    var nik0 = $("#nik").val();
    var validnik = $("#hasil_cek_nik").val();

    $.ajax({
        type    : 'POST',
        url     : 'modul/ceknik.php',
        data    : 'nik='+nik0,
        success : function(data){
            $('.pesanNIK').html(data);
            var hasilceknik = $(".cek_nik").html();
    
            if(hasilceknik==="OK"){
                $("#hasil_cek_nik").val(0);
            } else {
                $("#hasil_cek_nik").val(1);
            }
        }
    })
}

function cekEmail(){
    $(".pesanEmail").html("");

    var email0 = $("#email").val();
    var validemail = $("#hasil_cek_email").val();
    
    $.ajax({
        type    : 'POST',
        url     : 'modul/cekmail.php',
        data    : 'email='+email0,
        success : function(data){
            $(".pesanEmail").html(data);
            var hasilcekemail = $(".cek_email").html();
    
            if(hasilcekemail==="OK"){
                $("#hasil_cek_email").val(0);
            } else {
                $("#hasil_cek_email").val(1);
            }
        }
    })
}

function cekUsername(){

    $(".pesanUsername").html("");

    var username0 = $("#username").val();
    var validusername = $("#hasil_cek_username").val();
    
    $.ajax({
        type    : 'POST',
        url     : 'modul/cekusername.php',
        data    : 'username='+username0,
        success : function(data){
            $(".pesanUsername").html(data);
            var hasilcekus = $(".cek_username").html();
    
            if(hasilcekus==="OK"){
                $("#hasil_cek_username").val(0);
            } else {
                $("#hasil_cek_username").val(1);
            }
        }
        
    })
    
}


$("#form_daftar").submit(function(){
    if(((+$("#hasil_cek_username").val())+(+$("#hasil_cek_email").val())+(+$("#hasil_cek_nik").val()))<1){
        /* alert("OK LANJUTTTTT"); */
        /* return true; */
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Periksa kembali error dalam Form Pendaftaran !',
            footer: '<small class="text-danger">- Admin My Koperasi -</small>'
        })
        return false;
    }
});   