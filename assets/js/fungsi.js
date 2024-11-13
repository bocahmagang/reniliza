function ceknomoranggota1(){
    if($("#nomoranggota1").val()==""){
        $("#pesannomoranggota1").html("");
        $("#pesannomoranggota1").css("display","none");
    } else {
        $("#pesannomoranggota1").html($("#nomoranggota1").val());
        $("#pesannomoranggota1").css("display","block");
    }
}

function ceknik1(){
    if($("#nik1").val()==""){
        $("#pesannik1").html("");
        $("#pesannik1").css("display","none");
    } else {
        $("#pesannik1").html($("#nik1").val());
        $("#pesannik1").css("display","block");
    }
}


function cekhp1(){
    if($("#hp1").val()==""){
        $("#pesanhp1").html("");
        $("#pesanhp1").css("display","none");
    } else {
        $("#pesanhp1").html($("#hp1").val());
        $("#pesanhp1").css("display","block");
    }
}

function cekemail1(){
    if($("#email1").val()==""){
        $("#pesanemail1").html("");
        $("#pesanemail1").css("display","none");
    } else {
        $("#pesanemail1").html($("#email1").val());
        $("#pesanemail1").css("display","block");
    }
}

function cekusername1(){
    if($("#username1").val()==""){
        $("#pesanusername1").html("");
        $("#pesanusername1").css("display","none");
    } else {
        $("#pesanusername1").html($("#username1").val());
        $("#pesanusername1").css("display","block");
    }
}