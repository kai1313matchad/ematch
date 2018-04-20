<!DOCTYPE html>
<html>
<head>
	<title>log form</title>
	<link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">

	<style>
		/*
 * Specific styles of signin component
 */
/*
 * General styles
 */
body, html {
    height: 100%;
    background-repeat: no-repeat;
    *background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
}

.card-container.card {
    max-width: 350px;
    padding: 30px 40px;
}

.btn {
    font-weight: 700;
    height: 36px;
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

#latLong {
    text-transform: inherit;
    font-weight: bold;
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
    background-color: rgb(104, 145, 162);
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
    background-color: rgb(0,255,127);
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
    background-color: rgb(152,251,152);
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
 -moz-opacity: 0.75;
 -khtml-opacity: 0.75;
 opacity: 0.75;
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
	</style>
</head>
<body onload="getLocation()"">

<div id="background_animated">
<!--
    you can substitue the span of reauth email for a input with the email and
    include the remember me checkbox
    -->
    <div class="container">
        <div class="card card-container" id="card" style="display: none">
            <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
            <img id="profile-img" class="profile-img-card" src="<?php echo base_url();?>assets/ft_profil/<?php echo $this->session->userdata('foto'); ?>" />
            <p id="profile-name" class="profile-name-card"><?php echo $this->session->userdata('nama_karyawan');?></p>
            <p id="jabatan"><i class="glyphicon glyphicon-briefcase"></i> <?php echo $this->session->userdata('jabatannya');?></p>
            <p id="jabatan"><i class="glyphicon glyphicon-link"></i> <?php echo seperate($dept); ?></p>
            <p id="waktu"><i class="glyphicon glyphicon-calendar"></i> <span id="hari"></span></p>
            <p id="waktu"><i class="glyphicon glyphicon-time"></i> <span id="jam"></span></p>
            <p id="address"><i class="glyphicon glyphicon-map-marker"></i> <span id="addr"></span></p>
            <p id="latLong"></p>
            <form class="form-signin" method="POST" action="<?php echo base_url();?>Visit/insert">
            	<input type="hidden" name="log_lokasi" value="" id="locate">
            	<input type="hidden" name="log_lat" value="" id="lati">
            	<input type="hidden" name="log_long" value="" id="longi">
                <span id="reauth-email" class="reauth-email"></span>
                
                <input type="text" id="inputCompany" class="form-control" placeholder="Nama Perusahaan/Tempat" name="company" required autofocus>
                <textarea id="inputKeterangan" class="form-control" placeholder="Hasil Kunjungan" name="keterangan" required></textarea>
                <!-- <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div> -->
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Visit</button>
                <input type="button" name="" class="btn btn-lg btn-primary btn-block btn-refresh" onclick="getLocation()" value="Refresh">
            </form><!-- /form -->
            <!-- <button class="btn btn-lg btn-primary btn-block btn-refresh" onclick="ref()">Refresh</button> -->
            <!-- <a href="#" class="forgot-password">
                Forgot the password?
            </a> -->
        </div><!-- /card-container -->
    </div><!-- /container -->

</div>    

<script src="<?php echo base_url();?>assets/js/jquery-1.11.1.js"></script>
<script type="text/javascript">
	showlocation();
	function showlocation() {
	   // One-shot position request.
	   navigator.geolocation.getCurrentPosition(callback);
	}

	function callback(position) {
	   // document.getElementById('latitude').innerHTML = position.coords.latitude;
	   // document.getElementById('longitude').innerHTML = position.coords.longitude;
	   // document.getElementById('latitudeedit').innerHTML = position.coords.latitude;
	   // document.getElementById('longitudeedit').innerHTML = position.coords.longitude;

	// mulai convert ke alamat ke ajax.php pada folder luar
	   setTimeout(function() {
          $.ajax({
            url: 'ajax.php',
            type: 'POST',
            data: {lat: position.coords.latitude, lng: position.coords.longitude},
            success: function(data){
              $('#addr').html(data);
              $('#locate').val(data);
              // $('.resultgps2').val(data);
              // $('.resultgpsedit').val(data);
            },
            error: function(){
              alert('Error GPS!');
            }
          })
      }
      , 1000);
    };
</script>
<script type="text/javascript">
	$( document ).ready(function() {

		

    // DOM ready

    // Test data
    /*
     * To test the script you should discomment the function
     * testLocalStorageData and refresh the page. The function
     * will load some test data and the loadProfile
     * will do the changes in the UI
     */
    // testLocalStorageData();
    // Load profile if it exits
    loadProfile();
});



/**
 * Function that gets the data of the profile in case
 * thar it has already saved in localstorage. Only the
 * UI will be update in case that all data is available
 *
 * A not existing key in localstorage return null
 *
 */
function getLocalProfile(callback){
    var profileImgSrc      = localStorage.getItem("PROFILE_IMG_SRC");
    var profileName        = localStorage.getItem("PROFILE_NAME");
    var profileReAuthEmail = localStorage.getItem("PROFILE_REAUTH_EMAIL");

    if(profileName !== null
            && profileReAuthEmail !== null
            && profileImgSrc !== null) {
        callback(profileImgSrc, profileName, profileReAuthEmail);
    }
}

/**
 * Main function that load the profile if exists
 * in localstorage
 */
function loadProfile() {
    if(!supportsHTML5Storage()) { return false; }
    // we have to provide to the callback the basic
    // information to set the profile
    getLocalProfile(function(profileImgSrc, profileName, profileReAuthEmail) {
        //changes in the UI
        $("#profile-img").attr("src",profileImgSrc);
        $("#profile-name").html(profileName);
        $("#reauth-email").html(profileReAuthEmail);
        $("#inputEmail").hide();
        $("#remember").hide();
    });
}

/**
 * function that checks if the browser supports HTML5
 * local storage
 *
 * @returns {boolean}
 */
function supportsHTML5Storage() {
    try {
        return 'localStorage' in window && window['localStorage'] !== null;
    } catch (e) {
        return false;
    }
}

/**
 * Test data. This data will be safe by the web app
 * in the first successful login of a auth user.
 * To Test the scripts, delete the localstorage data
 * and comment this call.
 *
 * @returns {boolean}
 */
function testLocalStorageData() {
    if(!supportsHTML5Storage()) { return false; }
    localStorage.setItem("PROFILE_IMG_SRC", "//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" );
    localStorage.setItem("PROFILE_NAME", "César Izquierdo Tello");
    localStorage.setItem("PROFILE_REAUTH_EMAIL", "oneaccount@gmail.com");
}
</script>

<script>
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

// get lat & long

var x = document.getElementById("latLong");
var f = document.getElementById("form"); 
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
        showForm();
        setTimeout(function() {
        	alert('cek kembali lokasi anda otherwise please refresh this page!');
        }, 2000);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
        console.log('error get your location');
    }
}

function showPosition(position) {
    x.innerHTML = "Lat : " + position.coords.latitude + 
    "<br>" + "Long : " + position.coords.longitude; 
    document.getElementById('lati').value = position.coords.latitude;
    document.getElementById('longi').value = position.coords.longitude;
    if (showPosition) {
        
        
    } else {
        console.log('error');
    }
}

function showForm() {
//     f.innerHTML = `<label>name</label>
// <input type="text" name="nama">
// <br>
// <label>email</label>
// <input type="text" name="email">`
	document.getElementById('card').style.display = 'block';
}

function ref() {
    window.location.reload();
    // showlocation();
}

</script>    

</body>
</html>