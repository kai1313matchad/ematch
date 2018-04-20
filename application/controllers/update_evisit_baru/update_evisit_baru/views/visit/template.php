<!DOCTYPE html>
<html lang="en" class="js no-touchevents" style="">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="robots" content="noodp,nodir,noydir">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, minimal-ui">

    <title>E-visit</title>

   
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/evisit/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/evisit/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/sweetalert/sweetalert.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/evisit/bootstrap-quick-search.css">
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/evisit/toastr.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/datepicker/datepicker2.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <style type="text/css">
    .profile-img-card {
        width: 96px;
        height: 96px;
        margin: 0 auto 10px;
        display: block;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
    }
	.svg-icon {
	    width: 48px;
	    height: 53px;
	    display: inline-block;
	    position: relative;
	    -webkit-filter: drop-shadow(2px 1px 2px rgba(0,0,0,0.4));
		filter: drop-shadow(2px 1px 2px rgba(0,0,0,0.4));
		-webkit-filter: contrast(5);
		filter: contrast(5);
	}
    @media (max-width: 480px) {
        .__tiles-section .__item .__item-title {
            line-height: 13px;
            margin-top: -2px;
        }
    }
.__tiles-section .__item .__item-title {
    font-weight: normal;
    font-size: .59091rem;
    display: block;
    text-transform: uppercase;
    color: #494949;
}
	.category-icon img{
		color: green;
		fill: currentColor;
	}
    
    .gm-style .gm-style-cc span,
    .gm-style .gm-style-cc a,
    .gm-style .gm-style-mtc div {
        font-size: 10px
    }
    .gm-style .gm-style-mtc label,
    .gm-style .gm-style-mtc div {
        font-weight: 400
    }
    @media print {
        .gm-style .gmnoprint,
        .gmnoprint {
            display: none
        }
    }

    @media screen {
        .gm-style .gmnoscreen,
        .gmnoscreen {
            display: none
        }
    }
    .gm-style-pbc {
        transition: opacity ease-in-out;
        background-color: rgba(0, 0, 0, 0.45);
        text-align: center
    }

    .gm-style-pbt {
        font-size: 22px;
        color: white;
        font-family: Roboto, Arial, sans-serif;
        position: relative;
        margin: 0;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%)
    }
    #map-canvas {
        margin: 0;
        padding: 0;
        height: 100%;
    }

    #map-canvas {
        width: 100%;
        height: 270px;
    }
    .gm-style {
        font: 400 11px Roboto, Arial, sans-serif;
        text-decoration: none;
    }

    .gm-style img {
        max-width: none;
    }
    .modal {
        margin-top: 80px;
    }
    .modal-body {
        min-height: 250px !important;
    }
    h3.modal-title {
        text-align: center;
        margin: 0 auto;
        display: block;
        font-weight: bolder;
    }

    .datepicker {
        padding: 5px;
    }

    .datepicker td.day:hover {
        border-radius: 5px;
    }
    .datepicker td.day:hover {
      background: #eeeeee;
      cursor: pointer;
      border-radius: 5px;
    }   

    .datepicker td.today {
        background: #006dcc;
        color: #fff;
        border-radius: 5px;
        text-align: center;
    }

    .datepicker td.active,
    .datepicker td.active:hover {
      color: #ffffff;
      background-color: #006dcc;
      background-image: -moz-linear-gradient(top, #0088cc, #0044cc);
      background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#0088cc), to(#0044cc));
      background-image: -webkit-linear-gradient(top, #0088cc, #0044cc);
      background-image: -o-linear-gradient(top, #0088cc, #0044cc);
      background-image: linear-gradient(to bottom, #0088cc, #0044cc);
      background-repeat: repeat-x;
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff0088cc', endColorstr='#ff0044cc', GradientType=0);
      border-color: #0044cc #0044cc #002a80;
      border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
      *background-color: #0044cc;
      /* Darken IE7 buttons by default so they stand out more given they won't have borders */

      filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
      color: #fff;
      text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
    }

    th.prev:hover,
    th.next:hover,
    th.datepicker-switch:hover {
        background: #eeeeee;
        cursor: pointer;
        border-radius: 5px;
    }

    th.prev,
    th.next,
    th.datepicker-switch {
        text-align: center;
    }

    main, .content-body, div.wrapper.secondary, body {
        background-image: url(https://sqy7rm.media.zestyio.com/background-polygons-2x.png), linear-gradient(-90deg,#397ae9 15%,#4789e1 24%,#adf2ab 140%);
        background-position: center, top;
        background-repeat: no-repeat, no-repeat;
        background-size: cover, cover;
        min-height: 600px;
    }

    .btn-primary:hover {
        background-color: #5cb85c !important;
        border-color: #4cae4c !important;
    }

    </style> 

</head>

<body>
    <!--  GO2TOP    -->
    <div id="2top">
        <a href="#myAnchor" class="go-top"><i class="fa fa-angle-up"></i></a>
    </div>

    <div class="off-canvas-wrap" ui-off-canvas="">
        <div class="inner-wrap">

    <!-- header menu -->
            <header role="banner" class="header-navbar  __mod-2 ">
                <div class="container">
                	<!-- LOGO -->
                    <a href="#" class="logo">
				        <img src="<?php echo base_url();?>assets/evisit/maps_logo_google.png" alt="" width="106" data-preload="" style="width: 130px;">
				    </a>
				    <!-- END LOGO -->
				    
                    <a class="right-off-canvas-toggle menu-icon pull-right" aria-expanded="false" ui-off-canvas-toggle2=""><span></span></a>
                </div>
                <!-- END NAVBAR DESKTOP -->
                <!-- NAVBAR MOBILE -->
                <div class="hidden-md hidden-lg mobile-navbar">
                    <aside class="right-off-canvas-menu">
                        <header>
                            <a class="btn btn-primary" href="<?php echo base_url();?>login/logout">
					            LOGOUT
					        </a>
                            <div class="close pull-right">
                                <a class="exit-off-canvas" ui-off-canvas-hide="">×</a>
                            </div>
                        </header>
                        <nav role="navigation">
                            <ul class="list-unstyled font-gotham-medium">
                                <li>
                                    
                                    <?php if ($this->uri->segment(3) == 'dashboard') {
                                                echo '<a href="'.base_url('index').'" >HOME EMATCH</a>';
                                            } elseif ($this->uri->segment(3) == 'printView') {
                                                echo '<a href="'.base_url('Evisit/visit/show').'">BACK LIST</a>';
                                            } elseif ($this->uri->segment(3) == 'printViewBy') {
                                                echo '<a href="'.base_url('Evisit/visit/history').'">BACK HISTORY</a>';
                                            } else {
                                                echo '<a href="'.base_url('Evisit/visit/dashboard').'">HOME</a>';
                                            }
                                    ;?> 
                                </li>
                                <li><a href="<?php echo base_url();?>doku/Dokumentasi">DOCUMENTATION</a></li>
                                
                            </ul>
                        </nav>
                       
                    </aside>
                </div>
                <!-- END NAVBAR MOBILE -->
            </header>

            <header role="banner" class="header-navbar hidden-xs hidden-sm  __mod-sticky  __sticky-header __active" ux-sticky-header-pivot=".btn-block-xs.btn-primary" ux-sticky-header="">
                <div class="container">
                	<!-- LOGO -->
                    <a href="#" class="logo">
			        	<img src="<?php echo base_url();?>assets/evisit/maps_logo_google.png" alt="Upwork" width="106" data-preload="" style="width: 160px;">
			      	</a>
			      	<!-- END LOGO -->
			      	<!-- NAVBAR DESKTOP -->
                    <div class="visible-md visible-lg desktop-navbar">
                        <nav class="nav font-gotham-medium">
                            <ul class="site-links list-inline pull-left">
                                <li>
                                    <?php if ($this->uri->segment(3) == 'dashboard') {
                                                echo '<a href="'.base_url('index').'" class="text-uppercase">HOME EMATCH</a>';
                                            } elseif ($this->uri->segment(3) == 'printView') {
                                                echo '<a href="'.base_url('Evisit/visit/show').'">BACK LIST</a>';
                                            } elseif ($this->uri->segment(3) == 'printViewBy') {
                                                echo '<a href="'.base_url('Evisit/visit/history').'">BACK HISTORY</a>';
                                            } else {
                                                echo '<a href="'.base_url('Evisit/visit/dashboard').'" class="text-uppercase">HOME</a>';
                                            }
                                    ;?>  
                                </li>
                                <li><a href="<?php echo base_url();?>doku/Dokumentasi" class="text-uppercase">DOCUMENTATION</a></li>
                                
                            </ul>
                            <ul class="user-links list-inline pull-right">
                                <li>
                                	<a href="<?php echo base_url();?>login/logout" class="btn btn-primary header-cta-feh">Logout
          							</a>
          						</li>
                            </ul>
                        </nav>
                    </div>
                    <div class="visible-md visible-lg desktop-navbar">
                        <nav class="nav font-gotham-medium">
                            
                        </nav>
                    </div>
                </div>
            </header>

<!-- end header menu -->

            <main role="main">

                <?php $this->load->view($content);?>

            </main> 

        </div>
    </div>
    



<script type="text/javascript" src="<?php echo base_url('assets/sweetalert/sweetalert.min.js'); ?>"></script>
<script>
	$('.right-off-canvas-toggle').on('click', function() {
		$('.off-canvas-wrap').toggleClass('move-left');
	});
	$('.exit-off-canvas').on('click', function() {
		$('.off-canvas-wrap').toggleClass('move-left');
	});
</script>

<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>

<script type="text/javascript">
	$("#dept").change(function(){
		$("#imgLoad").html("<img src='<?php echo base_url();?>assets/img/loader-1.gif'>");
    	var dept_id = {dept_id:$("#dept").val()};
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('Evisit/visit/get_name');?>",
			data: dept_id, 
			success: function(resp){
        		//alert($("#negara").val());
        		$("#imgLoad").html("");
        		$('#name').html(resp);

			},
	      	error: function(){
	        	alert("Error");
	      	}
		});
	});	
</script> 

<script type="text/javascript">
	$('#btnRoute').click(function() {
		var data = {id:$('#name').val(), tgl_awal:$('#tgl_awal').val(), tgl_akhir:$('#tgl_akhir').val()};
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('Evisit/visit/getRouteMap');?>",
			data: data,
			error: function() {
				alert('error');
			}
		});	
	});
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
 	$('.datepicker').datepicker({
        autoclose: 1,
        todayHighlight: true,
    })
    
</script>

<script>
    $(document).ready(function() {
        let inputSubmit = $('input[type="submit"]#tombol');
        let selectTwo = $('select#name');
        let inputAwal = $('#start');
        let inputAkhir = $('#akhir');

        inputAwal.attr('disabled', 'true');
        inputAkhir.attr('disabled', 'true');
        inputSubmit.attr('disabled', 'true');

        selectTwo.change(function() {
            inputAwal.removeAttr('disabled');
            inputAkhir.removeAttr('disabled');
        });

        $('#akhir').blur(function() {
            if (!$('#start').val()) {
                alert('input awal belum diisi');
            } else {
                inputSubmit.removeAttr('disabled');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        let submitTombol = $('input[type="submit"]#tombol2');
        let inputMulai = $('#mulai');
        let inputAkhiri = $('#akhiri');

        submitTombol.attr('disabled', 'true');
        inputAkhiri.blur(function() {
            if (!$('#mulai').val()) {
                alert('input awal belum diisi');
            } else {
                submitTombol.removeAttr('disabled');
            }
        })        
    });
</script>

<script>
$("#tombol").click(function() {
	if ( $("#info").is(":hidden")) {
	    $("#info" ).slideDown("slow");
	    $("#info").addClass('kasat')
	} else {
	    $( "#info" ).hide();
	}
  	// $( "#info" ).slideDown( "slow", function() {
   //  	// Animation complete.
  	// });
});
</script>

<script>
var save_method; //for save method string
var table;

function edit_book(id) {
    save_method = 'update';
    // $('#form')[0].reset(); // reset form on modals
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('Evisit/Visit/ajax_edit')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id);
            $('[name="note"]').val(data.note);
 
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
 
function save() {
    // ajax adding data to database
    $.ajax({
        url : "<?php echo site_url('Evisit/Visit/visits_update')?>",
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
           //if success close modal and reload ajax table
           $('#modal_form').modal('hide');
          // location.reload();// for reload a page
            // alert('data berhasil di update');
            swal(
                'Success!', 
                'data berhasil di update!',
                'success'
            );
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // alert('Error adding / update data');
            swal(
              'Oops...',
              'Something went wrong!',
              'error'
            )
        }
    });
}    
</script>


    <!-- <script type="text/javascript" src="<?php echo base_url();?>assets/evisit/js"></script> -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRLyfpZFV4Un7iP3AaT45e2cIanre21Hs&callback=initialize"></script>
    <script type="text/javascript">
    var element = $(this);
    var map;

    function initialize(myCenter) {
        var marker = new google.maps.Marker({
            position: myCenter,
            // title: 'Uluru (Ayers Rock)'
        });

        var mapProp = {
            center: myCenter,
            zoom: 17,
            //draggable: false,
            //scrollwheel: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("map-canvas"), mapProp);
        marker.setMap(map);
    };

    function initMulti() {

        var locations = <?php echo isset($location) ? str_replace('"', '', $location) : 'zero';?>;

        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            zoom: 14,
            center: new google.maps.LatLng(<?php echo isset($center) ? $center : '';?>),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var infowindow = new google.maps.InfoWindow();
        var marker, i;

        for (i = 0; i < locations.length; i++) { 
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][0], locations[i][1]),
                map: map
            });
        }
    }

    $('#myMapModal').on('shown.bs.modal', function(e) {
        var element = $(e.relatedTarget);
        var data = element.data("lat").split(',');
        if (element.data("lat").length > 0) {
            initialize(new google.maps.LatLng(data[0], data[1]));
        } 
        else {
            initMulti();
        }
        google.maps.event.trigger(map, 'resize');
    });
    </script>
<script type="text/javascript" src="<?php echo base_url();?>assets/evisit/jquery.easeScroll.js"></script>
<script>
    $("html").easeScroll();
</script>

<script>
/*Add class when scroll down*/
$(window).scroll(function(event){
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
        $(".go-top").addClass("show");
    } else {
        $(".go-top").removeClass("show");
    }
});
/*Animation anchor*/
$('#2top a').click(function(){
    $("html, body").animate({ 
        scrollTop:0 
    }, 1000);
});
</script>

<script type="text/javascript" src="<?php echo base_url();?>assets/evisit/list.js"></script>
<script>
    var monkeyList = new List('test-list', {
  valueNames: ['lokasi', 'company'],
  page: 5,
  pagination: true
});
</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Beri Catatan</h3>
            </div>
            <div class="modal-body form" style="height: 200px;">
                <form action="#" id="form" class="">
                    <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Catatan</label>
                                <textarea name="note" class="form-control" style="height: 160px"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->   

<script src="<?php echo base_url();?>assets/evisit/toastr.js"></script>

<!-- SHOW TOASTR NOTIFIVATION -->
<?php if ($this->session->flashdata('flashMessage') != ""):?>

<script type="text/javascript">
    toastr.error('<?php echo $this->session->flashdata("flashMessage");?>');
</script>

<?php endif;?>

<script type="text/javascript">
    function confirm_modal(delete_url)
    {
        jQuery('#modal-4').modal('show', {backdrop: 'static'});
        document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

</body>
</html>