<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
   Remove this if you use the .htaccess -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!-- <meta name="viewport" content="initial-scale=1.0, target-densitydpi=device-dpi" />
<meta name="viewport" content="initial-scale=1.0, width=device-height"> -->
	<title>log form</title>
	<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/libs/modernizr.js"></script>
	<style>
		/*
 * Specific styles of signin component
 */
/*
 * General styles
 */
 @-ms-viewport{
  width: device-width;
}
body, html {
    height: 100%;
    background-repeat: no-repeat;
    *background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
}

.card-container.card {
    max-width: 350px;
    padding: 30px 40px;
}

/*@media(min-width: 1200px) {
    .card-container.card {
        max-width: 350px;
        padding: 30px 40px;
    }
}

@media(max-width: 400px) {
    .card-container {
        *min-width: 350px;
        width: 100%;
    }
    .card {
        font-size: 16px;
    }
}*/

.btn {
    font-weight: 700;
    *height: 36px;
    -moz-user-select: none;
    -webkit-user-select: none;
    user-select: none;
    cursor: default;
}

/*
 * Card component
 */
.card {
    background-color: #F7F7F7 !important;
    /* just in case there no content*/
    padding: 20px 25px 30px;
    margin: 0 auto 25px;
    margin-top: 50px;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    z-index: 9999
}

.profile-img-card {
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}

/*
 * Form styles
 */
.profile-name-card {
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}

#jabatan, #waktu, #address, #latLong {
    text-align: center;
    margin: 10px 0 0;
    min-height: 1em;
}

#jabatan, #waktu, #address {
    font-weight: bold;
}

#latLong {
    text-transform: inherit;
    *font-weight: bold;
}

.reauth-email {
    display: block;
    color: #404040;
    line-height: 2;
    margin-bottom: 10px;
    font-size: 14px;
    text-align: center;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin #inputEmail,
.form-signin #inputPassword {
    direction: ltr;
    height: 44px;
    font-size: 16px;
}

.form-signin input[type=email],
.form-signin input[type=password],
.form-signin input[type=text],
.form-signin button,
.form-signin textarea {
    width: 100%;
    display: block;
    margin-bottom: 10px;
    z-index: 1;
    position: relative;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}

.form-signin .form-control:focus {
    border-color: rgb(104, 145, 162);
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgb(104, 145, 162);
}

.btn.btn-signin,
.btn.btn-refresh {
    /*background-color: #4d90fe; */
    *background-color: rgb(104, 145, 162);
    /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
    padding: 0px;
    font-weight: 700;
    font-size: 20px;
    height: 56px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: none;
    -o-transition: all 0.218s;
    -moz-transition: all 0.218s;
    -webkit-transition: all 0.218s;
    transition: all 0.218s;
}

.btn.btn-refresh {
    *background-color: rgb(0,255,127);
    background-color: #38711e;
    font-size: 16px;
    height: 36px;
}

.btn.btn-signin:hover,
.btn.btn-signin:active,
.btn.btn-signin:focus {
    background-color: rgb(12, 97, 33);
}

.btn.btn-refresh:hover,
.btn.btn-refresh:active,
.btn.btn-refresh:focus {
    *background-color: rgb(152,251,152);
    background-color: #37a000;
}

.forgot-password {
    color: rgb(104, 145, 162);
}

.forgot-password:hover,
.forgot-password:active,
.forgot-password:focus{
    color: rgb(12, 97, 33);
}

/*------------------ #2 Method -------------------*/
#background_animated { 
 -webkit-box-sizing: initial;
 -moz-box-sizing: initial;
 box-sizing: initial; 
 z-index: 888
}
#background_animated .et_pb_row {
 *z-index: 1; 
}
#background_animated{
content: "";
 *position: absolute;
 top: 0; left: 0; bottom: 0; right: 0;
 -o-animation: colorandom 15s infinite; 
 -moz-animation: colorandom 15s infinite; 
 -webkit-animation: colorandom 15s infinite; 
 animation: colorandom 15s infinite; 
 filter: alpha(opacity=75);
 *-moz-opacity: 0.75;
 *-khtml-opacity: 0.75;
 *opacity: 0.75;
}
@-o-keyframes colorandom { 
 0% {background: #3ba3ff;} 
 20% {background: #2e48b4;}
 40% {background: #ee6a68;} 
 60% {background: #92bdcf;} 
 80% {background: #ff973b;} 
 100% {background: #3ba3ff;} 
}
@-moz-keyframes colorandom { 
 0% {background: #3ba3ff;} 
 20% {background: #2e48b4;} 
 40% {background: #ee6a68;} 
 60% {background: #92bdcf;} 
 80% {background: #ff973b;} 
 100% {background: #3ba3ff;} 
}
@-webkit-keyframes colorandom { 
 0% {background: #3ba3ff;} 
 20% {background: #2e48b4;} 
 40% {background: #ee6a68;} 
 60% {background: #92bdcf;} 
 80% {background: #ff973b;} 
 100% {background: #3ba3ff;}
}
@keyframes colorandom { 
 0% {background: #3ba3ff;} 
 20% {background: #2e48b4;} 
 40% {background: #ee6a68;} 
 60% {background: #92bdcf;} 
 80% {background: #ff973b;} 
 100% {background: #3ba3ff;}
}

.logo {
    top: 30px;
    display: block;
    margin: 0 auto;
    text-align: center;
    margin-bottom: -40px;
}
.logo img {
    width: 200px;
    height: auto;
}    

.ghost-button {
    color: #009688;
    background: transparent;
    border: 2px solid #009688;
    font-size: 16px;
    padding: 6px 16px;
    font-weight: bold;
    margin: 6px 0;
    margin-right: 12px;
    display: inline-block;
    text-decoration: none;
    font-family: 'Open Sans', sans-serif;
    *min-width: 120px;
    *position: absolute;
    top: 0;
    right: 0;
}

.ghost-button:hover, .ghost-button:active {
  color:#fff;
  background:#009688;
}

a:hover {
    text-decoration: none;
}
.btn-back {
    border-radius: 3px;
    cursor: pointer;
    font-size: 16px;
}

/***************signature********************/
#signatureparent {
        color:darkblue;
        background-color:darkgrey;
        /*max-width:600px;*/
        padding:20px;
    }
    
    /*This is the div within which the signature canvas is fitted*/
    #signature {
        border: 2px dotted black;
        background-color:lightgrey;
        *width: 70%;
        height: 300px;
    }

    canvas.jSignature {
        height: 300px !important;
    }


    @media(max-width: 767px) {
        #signature {
            width: 100%;
            min-height: 300px
        }
        canvas {
            min-height: 300px;
        }
    }

    /* Drawing the 'gripper' for touch-enabled devices */ 
    html.touch #content {
        float:left;
        width:92%;
    }
    html.touch #scrollgrabber {
        float:right;
        width:4%;
        margin-right:2%;
        *background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAAFCAAAAACh79lDAAAAAXNSR0IArs4c6QAAABJJREFUCB1jmMmQxjCT4T/DfwAPLgOXlrt3IwAAAABJRU5ErkJggg==)
    }
    html.borderradius #scrollgrabber {
        border-radius: 1em;
    }
     
    input[type="text"]#ver_code {
        margin: 0 auto;
        width: 35%;
        height: 44px;
        padding: 6px 12px;
        font-size: 18px;
        font-weight: bold;
        line-height: 1.42857143;
        letter-spacing: 5px;
        color: #555;
    }

    #signature input[type="button"] {
        background-color: #4d90fe;
        color: #fff;
        padding: 3px 6px;
    }

    #loadGif img {
        width: 100%;

    }
	</style>

</head>
<body id="background_animated">

<div >
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->

    <div class="logo row">
        <a href="<?php echo base_url();?>Evisit/Visit/dashboard">
            <img src="<?php echo base_url();?>assets/evisit/maps_logo_google.png">
        </a>
    </div>
    <div class="container" >
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3" style="background-color: #fff; padding: 25px 20px; border-radius: 7px; margin-top: 50px">
        <!-- <div class="card card-container" id="card"> -->
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="<?php echo base_url();?>assets/ft_profil/<?php echo $this->session->userdata('foto'); ?>" />
            <p id="profile-name" class="profile-name-card"><?php echo $this->session->userdata('nama_karyawan');?></p>
            <p id="jabatan"><i class="glyphicon glyphicon-briefcase"></i> <?php echo $this->session->userdata('jabatannya');?></p>
            <p id="jabatan"><i class="glyphicon glyphicon-link"></i> <?php echo seperate($dept); ?></p>
            <p id="waktu"><i class="glyphicon glyphicon-calendar"></i> <span id="hari"></span></p>
            <p id="waktu"><i class="glyphicon glyphicon-time"></i> <span id="jam"></span></p>
            <p id="latLong"></p>
            <!-- <p><?php echo $this->session->userdata('id_dept');?></p> -->
            <p id="address"><i class="glyphicon glyphicon-map-marker"></i> <span id="addr"></span></p>
            
            <!-- <form class="form-signin" method="POST" action="<?php echo base_url();?>Evisit/Visit/insert"> -->
            <form id="enter_data" class="form-signin" name="firstForm">    
            	<input type="hidden" name="log_lokasi" value="" id="locate">
            	<input type="hidden" name="log_lat" value="" id="lati">
            	<input type="hidden" name="log_long" value="" id="longi">
                <span id="reauth-email" class="reauth-email"></span>
                
                <input type="text" id="inputCompany" class="form-control" placeholder="Nama Perusahaan/Tempat" name="company" required autofocus>
                <input type="text" id="inputPic" class="form-control" placeholder="PIC dan Jabatan" name="pic" required>
                <input type="text" id="inputTelp" class="form-control" name="no_telp" placeholder="No Telepon" maxlength="13" required>
                <input type="email" class="form-control" name="email_address" id="email_address" placeholder="Enter Email" required>
                <!-- <h4 id="cekMail"></h4> -->
                <textarea id="inputKeterangan" class="form-control" placeholder="Hasil Kunjungan" name="keterangan" required></textarea>
                
                
                <!-- <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div> -->
                <!-- <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Visit</button> -->
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Send Code</button>
                <input type="button" name="" class="btn btn-lg btn-success btn-block btn-refresh" onclick="getLocation()" value="Refresh">
                <a href="<?php echo base_url();?>Evisit/Visit/dashboard" class="btn btn-lg btn-danger btn-block btn-back">Back Home</a>
            </form><!-- /form -->
            <!-- <button class="btn btn-lg btn-primary btn-block btn-refresh" onclick="ref()">Refresh</button> -->
            <!-- <a href="#" class="forgot-password">
                Forgot the password?
            </a> -->

            <div id="verify_code" style="display: none;">
                <!-- <h1 id="verification_code"></h1> -->
                <div id="mail_address" style="text-align: center; margin-top: 10px;"></div>
                <form id="enter_code" style="margin-top: 20px;">
                    <p style="text-align: center; font-size: 16px; font-weight: bold;">Enter verification code:</p>
                    <p><input type="hidden" name="email_address" id="alamat_email"></p>
                    <p><input type="hidden" name="id_visit" id="id_visit"></p>
                    <div id="status" style="color: red; text-align: center;"></div>
                    <p><input type="text" class="form-control" name="ver_code" id="ver_code" maxlength="4" style="text-transform: uppercase; text-align: center;" /></p>
                    <p style="text-align: center;">
                        <input type="submit" class="btn btn-primary" name="submit" value="Verify" />
                        &nbsp; &nbsp;
                        <input type="button" class="btn btn-danger" name="" value="Resend" id="resendBtn">
                        &nbsp; &nbsp;
                        <input type="button" class="btn btn-warning" name="" value="Skip" id="" data-toggle="modal" data-target="#modalSkip">
                        <!-- <a href="#" class="btn btn-lg btn-default" data-toggle="modal" data-target="#modalSkip">Skip</a> -->
                    </p>
                </form>
            </div>

            <div id="input_signature" style="display: block; margin-top: 20px;">
                <!-- <form class="" method="POST" action="<?php echo base_url();?>Evisit/Visit/insertSign"> -->
                <form id="enter_sign">    
                    <div id="signature"></div>
                    <input type="hidden" id="visit_id" name="id_visit2" />
                    <input type="text" id="hiddenSigData" name="hiddenSigData" />
                    <div style="margin-top: 10px; text-align: center;">
                        <div id="btnKonv" style="margin-top: 10px !important;">
                            <br>
                            <div id="msgSig" style="color: red; text-align: center;"></div>
                            <button type="button" class="btn btn-lg btn-block btn-success btn-refresh" id="btnSave" style="padding: 6px 12px; margin: 15px 0; font-size: 20px;">Konversi</button>
                            <!-- <a href="#" class="btn btn-lg btn-block btn-danger" data-toggle="modal" data-target="#modalNext">Next</a> -->
                        </div>
                        <div id="btnReg" style="display: none; margin-top: 10px;">
                            <br>
                            <input type="button" class="btn btn-lg btn-block btn-primary" id="sendSign" value="Simpan">
                            
                            <!-- <input type="button" class="btn btn-danger" name="" value="Next"> -->
                        </div>
                    </div>
                    
                </form>
            </div>

            <div id="loadGif" style="display: none;">
                <img src="<?php echo base_url()?>assets/evisit/Loading_icon.gif">
            </div>

            <!-- <div id="input_signature" style="display: none;">
                <div id="signature"></div>
                
                <input type="hidden" id="hiddenSigData" name="hiddenSigData" />    
            </div> -->

        </div>
        <!-- </div>/card-container -->
    </div><!-- /container -->

<div class="modal fade" id="modalNext">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Apakah anda yakin melewati TTD ?</h4>
            </div>
            
            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <a href="<?php echo base_url();?>Evisit/visit/show" class="btn btn-danger" id="">Ya</a>
                <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalSkip">
    <div class="modal-dialog">
        <div class="modal-content" style="margin-top:100px;">
            
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Apakah anda yakin melewatkan Verifikasi Kode ?</h4>
            </div>
            
            <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                <a href="<?php echo base_url();?>Evisit/visit/show" class="btn btn-danger" id="">Ya</a>
                <button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

</div>    

<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/src/jSignature.js"></script>
<script src="<?php echo base_url();?>assets/src/plugins/jSignature.CompressorBase30.js"></script>
<script src="<?php echo base_url();?>assets/src/plugins/jSignature.CompressorSVG.js"></script>
<script src="<?php echo base_url();?>assets/src/plugins/jSignature.UndoButton.js"></script> 
<script src="<?php echo base_url();?>assets/src/plugins/signhere/jSignature.SignHere.js"></script> 

<script>
    $(document).ready(function() {
        var $sigdiv = $("#signature").jSignature({'UndoButton':true});
    })
</script>

<script>
///////////START VERIFICATION///////////////
$(document).ready(function(){
    $("#enter_data").submit(function(e) {
        e.preventDefault();
        $("#loadGif").fadeIn();
        $("#enter_data").fadeOut();
        if (document.firstForm.log_lokasi.value == '') {
            alert('Please refresh this page!');
        } else {
            initiateCall();
        }
    });

    $("#inputTelp").keypress(validateNumber);

    function validateNumber(event) {
        var key = window.event ? event.keyCode : event.which;
        if (event.keyCode === 8 || event.keyCode === 46) {
            return true;
        } else if ( key < 48 || key > 57 ) {
            return false;
        } else {
            return true;
        }
    };

    

    

    $("#resendBtn").click(function() {
        $.post("<?php echo site_url('Evisit/Visit/resend')?>", {
            address : $("#locate").val(), 
            latitude : $("#lati").val(),
            longitude : $("#longi").val(),
            email_address : $("#email_address").val(), 
            company : $("#inputCompany").val(),
            pic : $("#inputPic").val(),
            keterangan : $("#inputKeterangan").val(),
            id_visit : $("#id_visit").val()
        }, null, "json")
            .fail(
                function(data) {
                    showErrors(data.errors);
                })
            .done(
                function(data) {
                    showCodeForm(data.verification_code, data.visit_id);
                    $('#status').text('Kode Verifikasi baru telah terkirim..');
                })
        ;
    });
});

function initiateCall() {
    var address = $("#email_address").val();
    var gif = $("#loadGif");
    gif.show();
    $.post("<?php echo site_url('Evisit/Visit/insertDB')?>", { 
        address : $("#locate").val(), 
        latitude : $("#lati").val(),
        longitude : $("#longi").val(),
        email_address : $("#email_address").val(), 
        company : $("#inputCompany").val(),
        pic : $("#inputPic").val(),
        no_telp : $("#inputTelp").val(),
        keterangan : $("#inputKeterangan").val() 
    }, null, "json")
        .fail(
            function(data) {
                showErrors(data.errors);
            })
        .done(
            function(data) {
                gif.fadeOut();    
                showCodeForm(data.verification_code, data.visit_id);
            })
    ;
    //checkStatus();
    $("#mail_address").text(address);
    $("#alamat_email").val(address);
}

$(document).ready(function(){
    $("#enter_code").submit(function(e) {
        e.preventDefault();
        verifiCode();
    });
});

function verifiCode() {
    $.post("<?php echo site_url('Evisit/Visit/matchVerificationCode')?>", { email_address : $("#email_address").val(), verification_code : $("#ver_code").val(), id : $("#id_visit").val() }, function(data) { updateStatus(data); }, "json");
}

function updateStatus(current) {
    let redirectURL = "<?php echo base_url('Evisit/Visit/show')?>";
    if (current.status === "unverified") {
        $("#status").text(current.errors);
        setTimeout(verifiCode, 3000);
    }
    else {
        window.location = redirectURL;
        showSuccess(current.status);
    }
}

function showErrors(errors) {
    $("#errors").text(errors);
}

function errorShow(data) {
    $("#msg").text(data);
    $("#verify_code").fadeOut();
    $("#input_signature").fadeOut();
    $("#enter_data").fadeOut();
}

function showSuccess(data) {
    $("#msg").text(data);
    $("#verify_code").fadeOut();
    $("#enter_data").fadeOut();
}

function showCodeForm(code, id) {
    $("#verification_code").text(code);
    $("#id_visit").val(id);
    $("#visit_id").val(id);
    $("#verify_code").fadeOut();
    $("#input_signature").fadeIn();
    $("#enter_data").fadeOut();
    $("#latLong").fadeOut();
}

function showVerifyForm(id) {
    $("#id_visit").val(id);
    $("#visit_id").val(id);
    $("#verify_code").fadeIn();
    $("#input_signature").fadeOut();
    $("#enter_data").fadeOut();
    $("#latLong").fadeOut();
}

/////////////END VERIFICATION/////////////////////////

////////////////////SIGNATURE/////////////////////////
$('#btnSave').click(function(){
    var sigData = $('#signature').jSignature('getData','image');
    $('#hiddenSigData').val(sigData);
    let c = checkSig();
    if (c == false) {
        console.log('tidak ada ttd'); 
        $('#msgSig').text('Wajib tanda tangan!');  
        $("#btnReg").hide();
        $("#btnKonv").show();
    } else {
        $("#btnReg").show();
        $("#btnKonv").hide();
    }

    $('input[value^="Undo"]').hide();
    

//     $.post("<?php echo site_url('Evisit/Visit/insertSignature')?>", { 
//         id_visit : $("#id_visit").val(),
//         image : $("#hiddenSigData").val() 
//     }, null, "json")
//         .fail(
//             function(data) {
//                 alert(data.errors);
//             })
//         .done(
//             function(data) {
//                 alert(data.success);
//             })
//     ;
});

// function checkEmpty() {
//     let c = checkSig();
//     if (c == false) {
//         console.log('tidak ada ttd');   
//         $("#btnReg").hide();
//         $("#btnKonv").show();
//         return false;
//     } else {
//         $("#btnReg").show();
//         $("#btnKonv").hide();
//         return true;
//     }
// }


$("#sendSign").click(function() {
    $.post("<?php echo site_url('Evisit/Visit/logSignature')?>", {
        signature : $("#hiddenSigData").val(),
        visit_id : $("#visit_id").val()
    }, null, "json")
        .fail(
            function(data) {
                showErrors(data.errors);
            })
        .done(
            function(data) {
                showVerifyForm(data.visit_id);
            })
    ;    
});

function checkSig() {
    let a = $('#hiddenSigData').val();
    let b = 'image/png;base64,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';
    if (a === b) {
        return false;
    }
}
////////////////////END SIGNATURE/////////////////////

getLocation();

function getLocation() {
    if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(geoSuccess, geoError);
    } else {
         alert("Geolocation is not supported by this browser.");
    }
}

// You'll also need to write your success function:

function geoSuccess(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    var x = document.getElementById("latLong");
    //alert("lat:" + lat + " lng:" + lng);
    x.innerHTML = "Lat : " + lat + "<br>" + "Long : " + lng;
    document.getElementById('lati').value = lat;
    document.getElementById('longi').value = lng;
    var geocoder = new google.maps.Geocoder();
    codeLatLng(lat, lng);
    var point = new google.maps.LatLng(lat, lng);
	findAddress(point);
    // showForm()
}

// And then an error function:

function geoError() {
    alert("Geocoder failed.");
}

// And here's the code for that function:

var geocoder;
function initialize() {
    geocoder = new google.maps.Geocoder();
}

function codeLatLng(lat, lng) {
    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if(status == google.maps.GeocoderStatus.OK) {
          console.log(results)
          if(results[1]) {
              //formatted address
              var address = results[0].formatted_address;
              // alert("address = " + address);
          } else {
              alert("No results found");
          }
      } else {
          alert("Geocoder failed due to: " + status);
      }
    });
}

function findAddress(point) {
	var geocoder = new google.maps.Geocoder();
	geocoder.geocode({latLng: point}, function(results, status) {
	  	if (status == google.maps.GeocoderStatus.OK) {
			if (results[0]) {
				var address = results[0].formatted_address;
				document.getElementById('addr').innerHTML = address;
				document.getElementById('locate').value = address;
              	// alert("address = " + address);
          	} else {
              	alert("No results found");
          	}
	  	}
	});
}

// get date now
var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
var date = new Date();
var day = date.getDate();
var month = date.getMonth();
var thisDay = date.getDay(),
    thisDay = myDays[thisDay];
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;
document.getElementById('hari').innerHTML = thisDay + ', ' + day + ' ' + months[month] + ' ' + year;

// get hour now
function showTime() {
    var a_p = "";
    var today = new Date();
    var curr_hour = today.getHours();
    var curr_minute = today.getMinutes();
    var curr_second = today.getSeconds();
    if (curr_hour < 12) {
        a_p = "AM";
    } else {
        a_p = "PM";
    }
    if (curr_hour == 0) {
        curr_hour = 12;
    }
    if (curr_hour > 12) {
        curr_hour = curr_hour - 12;
    }
    curr_hour = checkTime(curr_hour);
    curr_minute = checkTime(curr_minute);
    curr_second = checkTime(curr_second);
 	document.getElementById('jam').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
}

function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
setInterval(showTime, 500);

function showForm() {
	document.getElementById('card').style.display = 'block';
}

</script>    
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRLyfpZFV4Un7iP3AaT45e2cIanre21Hs&callback=initialize"></script>
</body>
</html>