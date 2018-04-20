<!DOCTYPE html>
<html>
<head>
    <title>Laporan Karyawan</title>
    <link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url(); ?>assets/css/extra.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript" scr="<?php echo base_url(); ?>/assets/js/jquery-1.11.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">



    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>

<style type="text/css">
      /*untuk tab bulanan*/
      @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,600,700');
    @import url('https://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css');

    *, *:before, *:after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
    }

    body {
      font: 14px/1 'Open Sans', sans-serif;
      color: #555;
      background: #eee;
    }

    h1 {
      padding: 50px 0;
      font-weight: 400;
      text-align: center;
    }

    p {
      margin: 0 0 20px;
      line-height: 1.5;
    }

    main {
      min-width: 320px;
     /* max-width: 1000px;*/
      /*padding: 50px;*/
      margin: 0 auto;
      background: #fff;
      border-radius: 0px 0px 20px 20px;
    }

    section {
      display: none;
      padding: 20px 0 0;
      border-top: 1px solid #ddd;
    }

    input {
      display: none;
    }

    label {
    
    text-align: center;
      display: inline-block;
      margin: 0 0 -1px;
      padding: 15px 17px;
      font-weight: 600;
      text-align: center;
      color: #bbb;
      border: 1px solid transparent;
    }

    label:before {
      font-family: fontawesome;
      font-weight: normal;
      margin-right: 10px;
    }

    /*label[for*='1']:before { content: '\f1cb'; }
    label[for*='2']:before { content: '\f17d'; }
    label[for*='3']:before { content: '\f16b'; }
    label[for*='4']:before { content: '\f1a9'; }*/

    label:hover {
      color: #e85858;
      cursor: pointer;
    }

    input:checked + label {
      color: #e85858;
      border: 1px solid #ddd;
      border-top: 2px solid #e85858;
      border-bottom: 1px solid #fff;
    }

    #tab1:checked ~ #content1,
    #tab2:checked ~ #content2,
    #tab3:checked ~ #content3,
    #tab4:checked ~ #content4,
    #tab5:checked ~ #content5,
    #tab6:checked ~ #content6,
    #tab7:checked ~ #content7,
    #tab8:checked ~ #content8,
    #tab9:checked ~ #content9,
    #tab10:checked ~ #content10,
    #tab11:checked ~ #content11,
    #tab12:checked ~ #content12 {
      display: block;
    }

    @media screen and (max-width: 650px) {
      label {
        font-size: 0;
      }
      label:before {
        margin: 0;
        font-size: 18px;
      }
    }

    @media screen and (max-width: 400px) {
      label {
        padding: 15px;
      }
    }
</style>

<style type="text/css">
    #container {
    width: auto;
    margin: 0 auto;
    padding-right: 30px;
    padding-left: 30px;
}


.navbar-login
{
    width: 305px;
    padding: 10px;
    padding-bottom: 0px;
}

.navbar-login-session
{
    padding: 10px;
    padding-bottom: 0px;
    padding-top: 0px;
}

.icon-size
{
    font-size: 87px;
}

/*mulai css tab*/



body {
  background-color: #2c2c2d;
   /*background-image: -webkit-radial-gradient(center, circle farthest-corner, #FFEFEB 0%, #b71212 70%);*/
  color: #efedef;
  font-size: 16px;
  font-weight: 300;
  letter-spacing: 0.01em;
  line-height: 1.6em;
  margin: 0;
  padding: 100px; }
  
@media only screen and (max-width: 500px) {
    body {
    padding-right: 10px;
    padding-left: 10px;
    }
}

h1 {
  font-size: 40px;
  line-height: 0.8em;
  color: rgba(255,255,255,0.2);}

button:focus,
input:focus,
textarea:focus,
select:focus {
  outline: none; }

.tabs {
  display: block;
  display: -webkit-flex;
  display: -moz-flex;
  display: flex;
  -webkit-flex-wrap: wrap;
  -moz-flex-wrap: wrap;
  flex-wrap: wrap;
  margin: 0;
  overflow: hidden; }
  .tabs [class^="tab"] label,
  .tabs [class*=" tab"] label {
    color: black;
    cursor: pointer;
    background-color: #fff;
    display: block;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1em;
    padding: 2rem 0;
    text-align: center; }

    .tabs [class^="tab"] label:hover,
  .tabs [class*=" tab"] label :hover{
    
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    background-color: #eee;
    color: #e85858;
  }


  .tabs [class^="tab"] [type="radio"],
  .tabs [class*=" tab"] [type="radio"] {
    border-bottom: 3px solid white;
    cursor: pointer;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    display: block;
    width: 100%;
    -webkit-transition: all 0.5s ease-in-out;
    -moz-transition: all 0.5s ease-in-out;
    -o-transition: all 0.5s ease-in-out;
    transition: all 0.5s ease-in-out; }
    .tabs [class^="tab"] [type="radio"]:hover, .tabs [class^="tab"] [type="radio"]:focus,
    .tabs [class*=" tab"] [type="radio"]:hover,
    .tabs [class*=" tab"] [type="radio"]:focus {
      border-bottom: 3px solid #fd264f; }
    .tabs [class^="tab"] [type="radio"]:checked,
    .tabs [class*=" tab"] [type="radio"]:checked {
      border-bottom: 3px solid #fd264f;}
    .tabs [class^="tab"] [type="radio"]:checked + div,
    .tabs [class*=" tab"] [type="radio"]:checked + div {
      opacity: 1; }
    .tabs [class^="tab"] [type="radio"] + div,
    .tabs [class*=" tab"] [type="radio"] + div {
      display: block;
      opacity: 0;
      padding: 2rem 0;
      width: 90%;
      -webkit-transition: all 0.5s ease-in-out;
      -moz-transition: all 0.5s ease-in-out;
      -o-transition: all 0.5s ease-in-out;
      transition: all 0.5s ease-in-out; }
  .tabs .tab-2 {
    width: 50%; }
    .tabs .tab-2 [type="radio"] + div {
      width: 200%;
      margin-left: 200%; }
    .tabs .tab-2 [type="radio"]:checked + div {
        background-color: white;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
      margin-left: 0; }
    .tabs .tab-2:last-child [type="radio"] + div {
      margin-left: 100%; }
    .tabs .tab-2:last-child [type="radio"]:checked + div {
        background-color: white;
        border-bottom-right-radius: 20px;
        border-bottom-left-radius: 20px;
      margin-left: -100%; }
      /*selesai tab*/
</style>

  <style>
  /*css untuk tab utama*/
        /* Style the tab */
    div.tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #fff;
        color: black;
        border-radius: 15px 15px 0px 0px;
    }

    /* Style the buttons inside the tab */
    div.tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        width: 200px
    }

    /* Change background color of buttons on hover */
    div.tab button:hover {
        background-color: #eee;
        color: #e85858;
    }

    /* Create an active/current tablink class */
    div.tab button.active {
        background-color: #e85858;
        color: white;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        /*padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;*/
    }
     
  </style>

</head>
<body class="semua">


<!---Mulai navbar account!-->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation" style="color: black">
        <div class="container-fluid"> 
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span> 
                </button>
                <!--<?php print_r($this->session->all_userdata());?>!-->
                <a href="<?php echo base_url(); ?>home" class="navbar-brand"><span class="glyphicon glyphicon-home"></span> KPIM Online.</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active dropdown">
                      <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Grafik Report Karyawan <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>reportkaryawan/rata2">Grafik Rata-Rata Semua karyawan</a></li>
                      </ul>
                    </li>

                    <?php 
                    if ($this->session->userdata('level') == 1 ) { ?>                    
                     <li><a href="<?php echo base_url(); ?>Laporan">Laporan Entry Karyawan</a></li>
                    <li><a href="<?php echo base_url(); ?>nilai">Nilai Rata-Rata Karyawan</a></li>
                    <?php } ?>
                     <?php 
        if ($this->session->userdata('level') == 1 ) {
          $base = base_url();
          echo '<li class="dropdown">
                          <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Data Karyawan
                          <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu"> 
                              <li><a href="'.$base.'Addkaryawan">Tambah Karyawan</a></li>
                              <li><a href="'.$base.'Karyawan">Data Karyawan</a></li>
                          </ul>
                       </li>';
      }
      ?>           
                 </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- <span class="glyphicon glyphicon-user"></span>  -->
                          <span style="position: absolute; margin-left: -40px; margin-top: -3px"><?php
                foreach ($profilku as $row) { 
              ?>  
                            <!-- <span class="glyphicon glyphicon-user icon-size"></span> -->
                            <img class="img-responsive" src="<?php echo base_url() ?>/assets/ft_profil/resized/<?php echo $row->img; ?>" alt="<?php echo $row->username; ?>" title="Foto <?php echo $row->username; ?>" style=" border-radius: 50%; width: 2em; height: auto;">
                            <?php } ?>
                            </span>
                          <strong><?php echo $this->session->userdata('username'); ?></strong>
                          <span class="glyphicon glyphicon-chevron-down"></span>
                      </a>
                      <ul class="dropdown-menu" style="width: 250px">
                          <li>
                              <div class="navbar-login">
                                  <div class="row">
                                      <div class="col-lg-4">
                                          <p class="text-center">
                                          <?php
                          foreach ($profilku as $row) { 
                        ?>  
                                              <!-- <span class="glyphicon glyphicon-user icon-size"></span> -->
                                              <img class="img-responsive" src="<?php echo base_url() ?>/assets/ft_profil/resized/<?php echo $row->img; ?>" alt="<?php echo $row->username; ?>" title="Foto <?php echo $row->username; ?>" style=" border-radius: 50%; border: solid 3px gray; margin-left: 10px">
                                              <?php } ?>
                                            </p>
                                        </div>
                                        <div class="col-lg-8">
                                            <p class="text-left" style="max-width: 120px"><strong><?php echo $this->session->userdata('nama_karyawan'); ?></strong></p>
                                            <p class="text-left small" style="max-width: 120px">
                                                <?php
                                                    foreach ($jabatan->result() as $row) { 
                                                ?>      
                                                    <i><?php echo $row->nama_akses; ?></i>
                                                <?php   }
                                                ?>
                                                -
                                                <?php
                                                    foreach ($dept->result() as $row) { 
                                                ?>      
                                                    <b><?php echo $row->nama_dept; ?></b>
                                                <?php   }
                                                ?>

                                            </p>
                                            <!--<p class="text-left">
                                                <a href="#" class="btn btn-primary btn-block btn-sm">Actualizar Datos</a>
                                            </p>!-->
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="navbar-login navbar-login-session">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <p>
                                                <a href="<?php echo base_url();?>login/logout" class="btn btn-danger btn-block" style="font-family: 'Exo 2', sans-serif; margin: 0px 25px ">Logout</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--selesai navbar-->



    <style>
  #chart
  {
   z-index:-10;
   padding-right: 30px;
    padding-left: 30px;
  }
   
</style>

<?php $idku = $nama->nama_karyawan;?>

<?php
  foreach ($deptnya->result() as $row) { 
?>    
  <b><?php $namadept = $row->deptini; ?></b>

<?php } ?>

<?php $namajab = $nama->nama_akses;?>

<!-- <?php echo $deptnya->nama_dept;?> -->

<?php $thnku = $thn;?>




  

    <!-- ini tab utama -->
    <div>
    <!-- <?php $baruawaljan = date("d-m-Y", strtotime($awaljanuari->tanggal));?>
    <?php $baruakhirjan = date("d-m-Y", strtotime($akhirjanuari->tanggal));?>

    <?php $baruawalfeb = date("d-m-Y", strtotime($awalfebruari->tanggal));?>
    <?php $baruakhirfeb = date("d-m-Y", strtotime($akhirfebruari->tanggal));?>

    <?php $baruawalmar = date("d-m-Y", strtotime($awalmaret->tanggal));?>
    <?php $baruakhirmar = date("d-m-Y", strtotime($akhirmaret->tanggal));?>

    <?php $baruawalapr = date("d-m-Y", strtotime($awalapril->tanggal));?>
    <?php $baruakhirapr = date("d-m-Y", strtotime($akhirapril->tanggal));?>

    <?php $baruawalmei = date("d-m-Y", strtotime($awalmei->tanggal));?>
    <?php $baruakhirmei = date("d-m-Y", strtotime($akhirmei->tanggal));?>

    <?php $baruawaljun = date("d-m-Y", strtotime($awaljuni->tanggal));?>
    <?php $baruakhirjun = date("d-m-Y", strtotime($akhirjuni->tanggal));?>

    <?php $baruawaljul = date("d-m-Y", strtotime($awaljuli->tanggal));?>
    <?php $baruakhirjul = date("d-m-Y", strtotime($akhirjuli->tanggal));?>

    <?php $baruawalagu = date("d-m-Y", strtotime($awalagustus->tanggal));?>
    <?php $baruakhiragu = date("d-m-Y", strtotime($akhiragustus->tanggal));?>

    <?php $baruawalsep = date("d-m-Y", strtotime($awalseptember->tanggal));?>
    <?php $baruakhirsep = date("d-m-Y", strtotime($akhirseptember->tanggal));?>

    <?php $baruawalokt = date("d-m-Y", strtotime($awaloktober->tanggal));?>
    <?php $baruakhirokt = date("d-m-Y", strtotime($akhiroktober->tanggal));?>

    <?php $baruawalnov = date("d-m-Y", strtotime($awalnovember->tanggal));?>
    <?php $baruakhirnov = date("d-m-Y", strtotime($akhirnovember->tanggal));?>

    <?php $baruawaldes = date("d-m-Y", strtotime($awaldesember->tanggal));?>
    <?php $baruakhirdes = date("d-m-Y", strtotime($akhirdesember->tanggal));?> -->
   
    <div class="tab">
      <button id="defaultOpen" class="tablinks" onclick="openCity(event, 'Tahun')">Tahun</button>
      <button class="tablinks" onclick="openCity(event, 'Bulan')">Bulan</button>

      <div style="float: right; padding: 10px 15px 7px 7px"><a class= "btn btn-danger" href="<?php echo base_url(); ?>Reportkaryawan" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-arrow-left"></span><h7><i> Kembali</i></h7></a></div>

    </div>

    <div id="Bulan" class="tabcontent">
      <main>
              <input id="tab1" type="radio" name="tabs" checked>
              <label for="tab1">Januari</label>
                
              <input id="tab2" type="radio" name="tabs">
              <label for="tab2">Februari</label>
                
              <input id="tab3" type="radio" name="tabs">
              <label for="tab3">Maret</label>
                
              <input id="tab4" type="radio" name="tabs">
              <label for="tab4">April</label>
              
              <input id="tab5" type="radio" name="tabs">
              <label for="tab5">Mei</label>

              <input id="tab6" type="radio" name="tabs">
              <label for="tab6">Juni</label>

              <input id="tab7" type="radio" name="tabs">
              <label for="tab7">Juli</label>

              <input id="tab8" type="radio" name="tabs">
              <label for="tab8">Agustus</label>

              <input id="tab9" type="radio" name="tabs">
              <label for="tab9">September</label>

              <input id="tab10" type="radio" name="tabs">
              <label for="tab10">Oktober</label>

              <input id="tab11" type="radio" name="tabs">
              <label for="tab11">November</label>

              <input id="tab12" type="radio" name="tabs">
              <label for="tab12">Desember</label>

              <section id="content1">

              <!-- mulai script bulanan -->
              <div id="januari" style="padding: 30px 50px 30px 30px"></div>
                    
                  <script type="text/javascript">
                      var sampai = " sampai ";
                      var tanggal = ". Tanggal : ";
                       var idku = "<?php echo $idku;?>";
                      var thn = "<?php echo $thnku;?>"; 
                      var dept = "<?php echo $namadept;?>";
                      var jab = "<?php echo $namajab;?>";
                      var awal = "<?php echo $baruawaljan;?>"
                      var akhir = "<?php echo $baruakhirjan;?>"
                      if (awal == '01-01-1970' ) {
                          var awal = 'Januari ';
                          var akhir = thn;
                          var sampai = '';
                          var tanggal = '. Bulan : ';
                      }
                  
                      var chart = Highcharts.chart('januari', {

                              title: {
                                  text: 'Laporan KPIM Karyawan - Bulanan'
                              },
                                credits: {
                            enabled: false
                          },

                              subtitle: {
                                  text: idku+ ", " + jab + " - "+ dept + tanggal + awal + sampai + akhir
                              },

                               yAxis: {max: 75, title: {text: 'Persentase Maksimal 75 % '}},
                               xAxis: {
                                  categories: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']
                              },



                              plotOptions: {
                                  series: {
                                      borderWidth: 0,
                                      dataLabels:
                                      {
                                          enabled: true,
                                          // formatter: function () {
                                          //     return Highcharts.numberFormat(this.y,  0, ',') + ' %';
                                          // },
                                           formatter: function () {
                                              return Highcharts.numberFormat(this.y,  2) + ' %';
                                              },

                                          }
                                      }
                                  },

                              series: [{
                                  name:'Nilai',
                                  type: 'column',
                                  colorByPoint: true,
                                  //data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                                  data: <?php echo json_encode($Januari); ?>,
                                  showInLegend: false 
                              }]

                          });
                  </script>
              <!-- selesai script -->
                
              </section>
                
              <section id="content2">
                <!-- mulai script bulanan -->
                <div id="Februari" style="padding: 30px 50px 30px 30px"></div>
                    <script type="text/javascript">
                          var sampai = " sampai ";
                            var tanggal = ". Tanggal : ";
                         var idku = "<?php echo $idku;?>";
                        var thn = "<?php echo $thnku;?>"; 
                        var dept = "<?php echo $namadept;?>";
                        var jab = "<?php echo $namajab;?>";
                        var awal = "<?php echo $baruawalfeb;?>"
                      var akhir = "<?php echo $baruakhirfeb;?>"
                      if (awal == '01-01-1970' ) {
                          var awal = 'Februari ';
                          var akhir = thn;
                          var sampai = '';
                          var tanggal = '. Bulan : ';
                      }
                    
                        var chart = Highcharts.chart('Februari', {

                                title: {
                                    text: 'Laporan KPIM Karyawan - Bulanan'
                                },
                                  credits: {
                              enabled: false
                            },

                                subtitle: {
                                    text: idku+ ", " + jab + " - "+ dept + tanggal + awal + sampai + akhir
                                },

                                 yAxis: {max: 75, title: {text: 'Persentase Maksimal 75 %'}}, xAxis: {
                                    categories: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']
                                },

                                plotOptions: {
                                  series: {
                                      borderWidth: 0,
                                      dataLabels:
                                      {
                                          enabled: true,
                                          // formatter: function () {
                                          //     return Highcharts.numberFormat(this.y,  0, ',') + ' %';
                                          // },
                                           formatter: function () {
                                              return Highcharts.numberFormat(this.y,  2) + ' %';
                                              },

                                          }
                                      }
                                  },


                                series: [{
                                    name:'Nilai',
                                    type: 'column',
                                    colorByPoint: true,
                                    //data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                                    data: <?php echo json_encode($Februari); ?>,
                                    showInLegend: false 
                                }]

                            });
                    </script>
                <!-- selesai script -->
            
              </section>
                
              <section id="content3">
                <!-- mulai script bulanan -->
                  <div id="Maret" style="padding: 30px 50px 30px 30px"></div>
                      <script type="text/javascript">
                            var sampai = " sampai ";
                            var tanggal = ". Tanggal : ";
                           var idku = "<?php echo $idku;?>";
                          var thn = "<?php echo $thnku;?>"; 
                          var dept = "<?php echo $namadept;?>";
                          var jab = "<?php echo $namajab;?>"; 
                          var awal = "<?php echo $baruawalmar;?>"
                          var akhir = "<?php echo $baruakhirmar;?>"
                          if (awal == '01-01-1970' ) {
                          var awal = 'Maret ';
                          var akhir = thn;
                          var sampai = '';
                          var tanggal = '. Bulan : ';
                      }
                      
                          var chart = Highcharts.chart('Maret', {

                                  title: {
                                      text: 'Laporan KPIM Karyawan - Bulanan'
                                  },
                                    credits: {
                                enabled: false
                              },

                                  subtitle: {
                                      text: idku+ ", " + jab + " - "+ dept + tanggal + awal + sampai + akhir
                                  },

                                   yAxis: {max: 75, title: {text: 'Persentase Maksimal 75 %'}}, xAxis: {
                                      categories: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']
                                  },

                                plotOptions: {
                                  series: {
                                      borderWidth: 0,
                                      dataLabels:
                                      {
                                          enabled: true,
                                          // formatter: function () {
                                          //     return Highcharts.numberFormat(this.y,  0, ',') + ' %';
                                          // },
                                           formatter: function () {
                                              return Highcharts.numberFormat(this.y,  2) + ' %';
                                              },

                                          }
                                      }
                                  },


                                  series: [{
                                      name:'Nilai',
                                      type: 'column',
                                      colorByPoint: true,
                                      //data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                                      data: <?php echo json_encode($Maret); ?>,
                                      showInLegend: false 
                                  }]

                              });
                      </script>
                  <!-- selesai script -->
            
              </section>
                
              <section id="content4">
                <!-- mulai script bulanan -->
                  <div id="April" style="padding: 30px 50px 30px 30px"></div>
                      <script type="text/javascript">
                            var sampai = " sampai ";
                            var tanggal = ". Tanggal : ";
                           var idku = "<?php echo $idku;?>";
                          var thn = "<?php echo $thnku;?>"; 
                          var dept = "<?php echo $namadept;?>";
                          var jab = "<?php echo $namajab;?>";            
                          var awal = "<?php echo $baruawalapr;?>"
                          var akhir = "<?php echo $baruakhirapr;?>"
                          if (awal == '01-01-1970' ) {
                          var awal = 'April ';
                          var akhir = thn;
                          var sampai = '';
                          var tanggal = '. Bulan : ';
                      }           
                      
                          var chart = Highcharts.chart('April', {

                                  title: {
                                      text: 'Laporan KPIM Karyawan - Bulanan'
                                  },
                                    credits: {
                                enabled: false
                              },

                                  subtitle: {
                                      text: idku+ ", " + jab + " - "+ dept + tanggal + awal + sampai + akhir
                                  },

                                   yAxis: {max: 75, title: {text: 'Persentase Maksimal 75 %'}}, xAxis: {
                                      categories: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']
                                  },

                                  plotOptions: {
                                  series: {
                                      borderWidth: 0,
                                      dataLabels:
                                      {
                                          enabled: true,
                                          // formatter: function () {
                                          //     return Highcharts.numberFormat(this.y,  0, ',') + ' %';
                                          // },
                                           formatter: function () {
                                              return Highcharts.numberFormat(this.y,  2) + ' %';
                                              },

                                          }
                                      }
                                  },


                                  series: [{
                                      name:'Nilai',
                                      type: 'column',
                                      colorByPoint: true,
                                      //data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                                      data: <?php echo json_encode($April); ?>,
                                      showInLegend: false 
                                  }]

                              });
                      </script>
                  <!-- selesai script -->
              
              </section>

               <section id="content5">
                 <!-- mulai script bulanan -->
                  <div id="Mei" style="padding: 30px 50px 30px 30px"></div>
                      <script type="text/javascript">
                            var sampai = " sampai ";
                            var tanggal = ". Tanggal : ";
                           var idku = "<?php echo $idku;?>";
                          var thn = "<?php echo $thnku;?>"; 
                          var dept = "<?php echo $namadept;?>";
                          var jab = "<?php echo $namajab;?>";  
                          var awal = "<?php echo $baruawalmei;?>"
                          var akhir = "<?php echo $baruakhirmei;?>"
                          if (awal == '01-01-1970' ) {
                          var awal = 'Mei ';
                          var akhir = thn;
                          var sampai = '';
                          var tanggal = '. Bulan : ';
                      }                     
                      
                          var chart = Highcharts.chart('Mei', {

                                  title: {
                                      text: 'Laporan KPIM Karyawan - Bulanan'
                                  },
                                    credits: {
                                enabled: false
                              },

                                  subtitle: {
                                      text: idku+ ", " + jab + " - "+ dept + tanggal + awal + sampai + akhir
                                  },

                                   yAxis: {max: 75, title: {text: 'Persentase Maksimal 75 %'}},

                                  xAxis: {
                                      categories: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']
                                  },

                                  plotOptions: {
                                  series: {
                                      borderWidth: 0,
                                      dataLabels:
                                      {
                                          enabled: true,
                                          // formatter: function () {
                                          //     return Highcharts.numberFormat(this.y,  0, ',') + ' %';
                                          // },
                                           formatter: function () {
                                              return Highcharts.numberFormat(this.y,  2) + ' %';
                                              },

                                          }
                                      }
                                  },

                                  series: [{
                                      name:'Nilai',
                                      type: 'column',
                                      colorByPoint: true,
                                      //data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                                      data: <?php echo json_encode($Mei); ?>,
                                      showInLegend: false 
                                  }]

                              });
                      </script>
                  <!-- selesai script -->
              
              </section>

               <section id="content6">

               <!-- mulai script bulanan -->
              <div id="juni" style="padding: 30px 50px 30px 30px"></div>
                  <script type="text/javascript">
                        var sampai = " sampai ";
                            var tanggal = ". Tanggal : ";
                       var idku = "<?php echo $idku;?>";
                      var thn = "<?php echo $thnku;?>"; 
                      var dept = "<?php echo $namadept;?>";
                      var jab = "<?php echo $namajab;?>"; 
                      var awal = "<?php echo $baruawaljun;?>"
                      var akhir = "<?php echo $baruakhirjun;?>"
                      if (awal == '01-01-1970' ) {
                          var awal = 'Juni ';
                          var akhir = thn;
                          var sampai = '';
                          var tanggal = '. Bulan : ';
                      }                      
                  
                      var chart = Highcharts.chart('juni', {

                              title: {
                                  text: 'Laporan KPIM Karyawan - Bulanan'
                              },
                                credits: {
                            enabled: false
                          },

                              subtitle: {
                                  text: idku+ ", " + jab + " - "+ dept + tanggal + awal + sampai + akhir
                              },

                               yAxis: {max: 75, title: {text: 'Persentase Maksimal 75 %'}},
                              xAxis: {
                                  categories: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']
                              },

                              plotOptions: {
                                  series: {
                                      borderWidth: 0,
                                      dataLabels:
                                      {
                                          enabled: true,
                                          // formatter: function () {
                                          //     return Highcharts.numberFormat(this.y,  0, ',') + ' %';
                                          // },
                                           formatter: function () {
                                              return Highcharts.numberFormat(this.y,  2) + ' %';
                                              },

                                          }
                                      }
                                  },

                 
                              series: [{
                                  name:'Nilai',
                                  type: 'column',
                                  colorByPoint: true,
                                  //data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                                  data: <?php echo json_encode($Juni); ?>,
                                  showInLegend: false 
                              }]

                          });
                  </script>
              <!-- selesai script -->
              
              </section>

               <section id="content7">
                 <!-- mulai script bulanan -->
                  <div id="Juli" style="padding: 30px 50px 30px 30px"></div>
                      <script type="text/javascript">
                            var sampai = " sampai ";
                            var tanggal = ". Tanggal : ";
                           var idku = "<?php echo $idku;?>";
                          var thn = "<?php echo $thnku;?>"; 
                          var dept = "<?php echo $namadept;?>";
                          var jab = "<?php echo $namajab;?>";
                          var awal = "<?php echo $baruawaljul;?>"
                          var akhir = "<?php echo $baruakhirjul;?>"
                          if (awal == '01-01-1970' ) {
                          var awal = 'Juli ';
                          var akhir = thn;
                          var sampai = '';
                          var tanggal = '. Bulan : ';
                      }                       
                      
                          var chart = Highcharts.chart('Juli', {

                                  title: {
                                      text: 'Laporan KPIM Karyawan - Bulanan'
                                  },
                                    credits: {
                                enabled: false
                              },

                                  subtitle: {
                                      text: idku+ ", " + jab + " - "+ dept + tanggal + awal + sampai + akhir
                                  },

                                   yAxis: {max: 75, title: {text: 'Persentase Maksimal 75 %'}},

                                  xAxis: {
                                      categories: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']
                                  },

                                  plotOptions: {
                                  series: {
                                      borderWidth: 0,
                                      dataLabels:
                                      {
                                          enabled: true,
                                          // formatter: function () {
                                          //     return Highcharts.numberFormat(this.y,  0, ',') + ' %';
                                          // },
                                           formatter: function () {
                                              return Highcharts.numberFormat(this.y,  2) + ' %';
                                              },

                                          }
                                      }
                                  },

                                  series: [{
                                      name:'Nilai',
                                      type: 'column',
                                      colorByPoint: true,
                                      //data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                                      data: <?php echo json_encode($Juli); ?>,
                                      showInLegend: false 
                                  }]

                              });
                      </script>
                  <!-- selesai script -->
              </section>

               <section id="content8">
                 <!-- mulai script bulanan -->
                  <div id="Agustus" style="padding: 30px 50px 30px 30px"></div>
                      <script type="text/javascript">
                            var sampai = " sampai ";
                            var tanggal = ". Tanggal : ";
                           var idku = "<?php echo $idku;?>";
                          var thn = "<?php echo $thnku;?>"; 
                          var dept = "<?php echo $namadept;?>";
                          var jab = "<?php echo $namajab;?>";
                          var awal = "<?php echo $baruawalagu;?>"
                          var akhir = "<?php echo $baruakhiragu;?>"
                          if (awal == '01-01-1970' ) {
                          var awal = 'Agustus ';
                          var akhir = thn;
                          var sampai = '';
                          var tanggal = '. Bulan : ';
                      }                       
                      
                          var chart = Highcharts.chart('Agustus', {

                                  title: {
                                      text: 'Laporan KPIM Karyawan - Bulanan'
                                  },
                                    credits: {
                                enabled: false
                              },

                                  subtitle: {
                                      text: idku+ ", " + jab + " - "+ dept + tanggal + awal + sampai + akhir
                                  },

                                   yAxis: {max: 75, title: {text: 'Persentase Maksimal 75 %'}}, 
                                  xAxis: {
                                      categories: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']
                                  },

                                  plotOptions: {
                                  series: {
                                      borderWidth: 0,
                                      dataLabels:
                                      {
                                          enabled: true,
                                          // formatter: function () {
                                          //     return Highcharts.numberFormat(this.y,  0, ',') + ' %';
                                          // },
                                           formatter: function () {
                                              return Highcharts.numberFormat(this.y,  2) + ' %';
                                              },

                                          }
                                      }
                                  },

                                  series: [{
                                      name:'Nilai',
                                      type: 'column',
                                      colorByPoint: true,
                                      //data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                                      data: <?php echo json_encode($Agustus); ?>,
                                      showInLegend: false 
                                  }]

                              });
                      </script>
                  <!-- selesai script -->
              
              </section>

               <section id="content9">
                  <!-- mulai script bulanan -->
                  <div id="September" style="padding: 30px 50px 30px 30px"></div>
                      <script type="text/javascript">
                            var sampai = " sampai ";
                            var tanggal = ". Tanggal : ";
                           var idku = "<?php echo $idku;?>";
                          var thn = "<?php echo $thnku;?>"; 
                          var dept = "<?php echo $namadept;?>";
                          var jab = "<?php echo $namajab;?>";
                          var awal = "<?php echo $baruawalsep;?>"
                          var akhir = "<?php echo $baruakhirsep;?>"
                          if (awal == '01-01-1970' ) {
                          var awal = 'September ';
                          var akhir = thn;
                          var sampai = '';
                          var tanggal = '. Bulan : ';
                      }                       
                      
                          var chart = Highcharts.chart('September', {

                                  title: {
                                      text: 'Laporan KPIM Karyawan - Bulanan'
                                  },
                                    credits: {
                                enabled: false
                              },

                                  subtitle: {
                                      text: idku+ ", " + jab + " - "+ dept + tanggal + awal + sampai + akhir
                                  },

                                   yAxis: {max: 75, title: {text: 'Persentase Maksimal 75 %'}}, 
                                  xAxis: {
                                      categories: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']
                                  },

                                  plotOptions: {
                                  series: {
                                      borderWidth: 0,
                                      dataLabels:
                                      {
                                          enabled: true,
                                          // formatter: function () {
                                          //     return Highcharts.numberFormat(this.y,  0, ',') + ' %';
                                          // },
                                           formatter: function () {
                                              return Highcharts.numberFormat(this.y,  2) + ' %';
                                              },

                                          }
                                      }
                                  },

                                  series: [{
                                      name:'Nilai',
                                      type: 'column',
                                      colorByPoint: true,
                                      //data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                                      data: <?php echo json_encode($September); ?>,
                                      showInLegend: false 
                                  }]

                              });
                      </script>
                  <!-- selesai script -->
              
              </section>

               <section id="content10">
               <!-- mulai script bulanan -->
                  <div id="Oktober" style="padding: 30px 50px 30px 30px"></div>
                      <script type="text/javascript">
                            var sampai = " sampai ";
                            var tanggal = ". Tanggal : ";
                           var idku = "<?php echo $idku;?>";
                          var thn = "<?php echo $thnku;?>"; 
                          var dept = "<?php echo $namadept;?>";
                          var jab = "<?php echo $namajab;?>";
                          var awal = "<?php echo $baruawalokt;?>"
                          var akhir = "<?php echo $baruakhirokt;?>"
                          if (awal == '01-01-1970' ) {
                          var awal = 'Oktober ';
                          var akhir = thn;
                          var sampai = '';
                          var tanggal = '. Bulan : ';
                      }                       
                      
                          var chart = Highcharts.chart('Oktober', {

                                  title: {
                                      text: 'Laporan KPIM Karyawan - Bulanan'
                                  },
                                    credits: {
                                enabled: false
                              },

                                  subtitle: {
                                      text: idku+ ", " + jab + " - "+ dept + tanggal + awal + sampai + akhir
                                  },

                                   yAxis: {max: 75, title: {text: 'Persentase Maksimal 75 %'}}, 
                                  xAxis: {
                                      categories: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']
                                  },

                                  plotOptions: {
                                  series: {
                                      borderWidth: 0,
                                      dataLabels:
                                      {
                                          enabled: true,
                                          // formatter: function () {
                                          //     return Highcharts.numberFormat(this.y,  0, ',') + ' %';
                                          // },
                                           formatter: function () {
                                              return Highcharts.numberFormat(this.y,  2) + ' %';
                                              },

                                          }
                                      }
                                  },

                                  series: [{
                                      name:'Nilai',
                                      type: 'column',
                                      colorByPoint: true,
                                      //data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                                      data: <?php echo json_encode($Oktober); ?>,
                                      showInLegend: false 
                                  }]

                              });
                      </script>
                  <!-- selesai script -->
              </section>

               <section id="content11">
              <!-- mulai script bulanan -->
                  <div id="November" style="padding: 30px 50px 30px 30px"></div>
                      <script type="text/javascript">
                            var sampai = " sampai ";
                            var tanggal = ". Tanggal : ";
                           var idku = "<?php echo $idku;?>";
                          var thn = "<?php echo $thnku;?>"; 
                          var dept = "<?php echo $namadept;?>";
                          var jab = "<?php echo $namajab;?>";
                          var awal = "<?php echo $baruawalnov;?>"
                          var akhir = "<?php echo $baruakhirnov;?>"
                          if (awal == '01-01-1970' ) {
                          var awal = 'November ';
                          var akhir = thn;
                          var sampai = '';
                          var tanggal = '. Bulan : ';
                      }                       
                      
                          var chart = Highcharts.chart('November', {

                                  title: {
                                      text: 'Laporan KPIM Karyawan - Bulanan'
                                  },
                                    credits: {
                                enabled: false
                              },

                                  subtitle: {
                                      text: idku+ ", " + jab + " - "+ dept + tanggal + awal + sampai + akhir
                                  },

                                   yAxis: {max: 75, title: {text: 'Persentase Maksimal 75 %'}}, 
                                  xAxis: {
                                      categories: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']
                                  },

                                  plotOptions: {
                                  series: {
                                      borderWidth: 0,
                                      dataLabels:
                                      {
                                          enabled: true,
                                          // formatter: function () {
                                          //     return Highcharts.numberFormat(this.y,  0, ',') + ' %';
                                          // },
                                           formatter: function () {
                                              return Highcharts.numberFormat(this.y,  2) + ' %';
                                              },

                                          }
                                      }
                                  },

                                  series: [{
                                      name:'Nilai',
                                      type: 'column',
                                      colorByPoint: true,
                                      //data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                                      data: <?php echo json_encode($November); ?>,
                                      showInLegend: false 
                                  }]

                              });
                      </script>
                  <!-- selesai script -->
              </section>

              <section id="content12">
              <!-- mulai script bulanan -->
                  <div id="Desember" style="padding: 30px 50px 30px 30px"></div>
                      <script type="text/javascript">
                            var sampai = " sampai ";
                            var tanggal = ". Tanggal : ";
                           var idku = "<?php echo $idku;?>";
                          var thn = "<?php echo $thn;?>"; 
                          var dept = "<?php echo $namadept;?>";
                          var jab = "<?php echo $namajab;?>";
                          var awal = "<?php echo $baruawaldes;?>"
                          var akhir = "<?php echo $baruakhirdes;?>"
                          if (awal == '01-01-1970' ) {
                          var awal = 'Desember ';
                          var akhir = thn;
                          var sampai = '';
                          var tanggal = '. Bulan : ';
                      }                       
                      
                          var chart = Highcharts.chart('Desember', {

                                  title: {
                                      text: 'Laporan KPIM Karyawan - Bulanan'
                                  },
                                    credits: {
                                enabled: false
                              },

                                  subtitle: {
                                      text: idku+ ", " + jab + " - "+ dept + tanggal + awal + sampai + akhir
                                  },

                                  yAxis: {max: 75,
                                   title: {
                              text: 'Persentase Maksimal 75 %'
                             }}, 

                                  xAxis: {
                                      categories: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4']
                                  },

                                  plotOptions: {
                                  series: {
                                      borderWidth: 0,
                                      dataLabels:
                                      {
                                          enabled: true,
                                          // formatter: function () {
                                          //     return Highcharts.numberFormat(this.y,  0, ',') + ' %';
                                          // },
                                           formatter: function () {
                                              return Highcharts.numberFormat(this.y,  2) + ' %';
                                          },

                                      }
                                  }
                              },

                                  series: [{
                                      name:'Nilai',
                                      type: 'column',
                                      colorByPoint: true,
                                      //data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                                      data: <?php echo json_encode($Desember); ?>,
                                      showInLegend: false 
                                  }]

                              });
                      </script>
                  <!-- selesai script -->
              </section>
                
            </main>
    </div>

    <div id="Tahun" class="tabcontent">
     <!-- mulai script Tahun -->
          <div class="tabs">
            <div class="tab-2">
              <label for="tab2-1">Diagram Batang</label>
              <input id="tab2-1" name="tabs-two" type="radio" checked="checked">
              <div>
              <!-- <text style="padding-left: 25px; color: black"><i><?php echo $nama->nama_karyawan;?>, <?php echo $nama->nama_akses;?> - <?php echo $nama->nama_dept;?></i></text>       -->
                <p>
                    <div id="container"></div>
                    <br/>
                  <center >
                  <button type="button" class="btn btn-danger" id="plain" style="font-family: 'Exo 2', sans-serif;"><span class="glyphicon glyphicon-stats"></span> Plain</button>
                  <button type="button" class="btn btn-danger" id="inverted" style="font-family: 'Exo 2', sans-serif;">Inverted</button>
                  <button type="button" class="btn btn-danger" id="polar" style="font-family: 'Exo 2', sans-serif;">Polar</button>
                  </center>

                       <script type="text/javascript">
                       var idku = "<?php echo $idku;?>";
                      var thn = "<?php echo $thn;?>"; 
                      var dept = "<?php echo $namadept;?>";
                      var jab = "<?php echo $namajab;?>";            
                  
                      var chart = Highcharts.chart('container', {

                              title: {
                                  text: 'Laporan KPIM Karyawan - Tahunan'
                              },
                                credits: {
              enabled: false
            },

                              subtitle: {
                                  text: idku+ ", " + jab + " - "+ dept + '. Tahun : ' + thn 
                              },

                              yAxis: {max: 75,
                              title: {
                              text: 'Persentase Maksimal KPIM = 75%'
                             }},
                               xAxis: {
                                  categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                              },

                              plotOptions: {
                                  
                                  series: {
                                      borderWidth: 0,
                                      dataLabels:
                                      {
                                          enabled: true,
                                          // formatter: function () {
                                          //     return Highcharts.numberFormat(this.y,  0, ',') + ' %';
                                          // },
                                           formatter: function () {
                                              return Highcharts.numberFormat(this.y,  2) + ' %';
                                          },

                                      }
                                  }
                              },

                              tooltip: {
                                valueSuffix: ' %',
                            },



                              series: [{
                                  name:'Nilai',
                                  type: 'column',

                                  colorByPoint: true,
                                  //data: [29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                                  data: <?php echo json_encode($grafik); ?>,
                                  showInLegend: false 
                              }]

                          });


                          $('#plain').click(function () {
                              chart.update({
                                  chart: {
                                      inverted: false,
                                      polar: false
                                  },
                                  subtitle: {
                                      text: idku+ ", " + jab + " - "+ dept + '. Tahun : ' + thn 
                                  }

                                  
                              });
                          });

                          $('#inverted').click(function () {
                              chart.update({
                                  chart: {
                                      inverted: true,
                                      polar: false
                                  },
                                  subtitle: {
                                      text: idku+ ", " + jab + " - "+ dept + '. Tahun : ' + thn 
                                  }
                              });
                          });



                          $('#polar').click(function () {
                              chart.update({
                                  chart: {
                                      inverted: false,
                                      polar: true
                                  },
                                    credits: {
                                    enabled: false
                                  },
                                  subtitle: {
                                      text: idku+ ", " + jab + " - "+ dept + '. Tahun : ' + thn 
                                  }
                              });
                          });
                  </script>
                </p>
              </div>
            </div>
            <div class="tab-2">
              <label for="tab2-2">Diagram Garis</label>
              <input id="tab2-2" name="tabs-two" type="radio">
              <div>
                
                <p>
                    <div id="chart">
                      </div>
                      
                      <script type="text/javascript">
                      var idku = "<?php echo $idku;?>";
                      var thn = "<?php echo $thn;?>";
                      var dept = "<?php echo $namadept;?>";
                      var jab = "<?php echo $namajab;?>";
                      jQuery(function(){
                       new Highcharts.Chart({
                        chart: {
                         renderTo: 'chart',
                         type: 'line',
                        },
                        title: {
                         text: 'Laporan KPIM Karyawan Tahunan', 
                         x: -20

                        },
                        credits: {
                          enabled: false
                        },
                        subtitle: {
                         text: idku+ ", " + jab + " - "+ dept + '. Tahun : ' + thn ,
                         x: -20
                        },
                        xAxis: {
                         categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                                          'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des']
                        },
                        yAxis: {max:75,
                         title: {
                          text: 'Persentase Maksimal KPIM = 75%'
                         }
                        },

                        plotOptions: {
                            series: {
                                borderWidth: 0,
                                dataLabels:
                                      {
                                          enabled: true,
                                          // formatter: function () {
                                          //     return Highcharts.numberFormat(this.y,  0, ',') + ' %';
                                          // },
                                           formatter: function () {
                                              return Highcharts.numberFormat(this.y,  2) + ' %';
                                          },

                                      }
                            }
                        },


                        series: [{
                         name: 'Nilai',
                         data: <?php echo json_encode($grafik); ?>
                        }]
                       });
                      }); 

                      
                      </script>

                      <script>
                      // javascript untuk tab utama
                      function openCity(evt, cityName) {
                          var i, tabcontent, tablinks;
                          tabcontent = document.getElementsByClassName("tabcontent");
                          for (i = 0; i < tabcontent.length; i++) {
                              tabcontent[i].style.display = "none";
                          }
                          tablinks = document.getElementsByClassName("tablinks");
                          for (i = 0; i < tablinks.length; i++) {
                              tablinks[i].className = tablinks[i].className.replace(" active", "");
                          }
                          document.getElementById(cityName).style.display = "block";
                          evt.currentTarget.className += " active";
                      }

                      document.getElementById("defaultOpen").click();
                      </script>
                </p>
              </div>
            </div>
          </div>
    </div>
    <!-- selesai tab utama -->


      
    <br/>

    <br>
    <div style="float: left;">

    <button class="btn btn-default" id="show" style="font-family: 'Exo 2', sans-serif;">Tampilkan Parameter Nilai</button>
    <button class="btn btn-danger ini" id="hide" style="font-family: 'Exo 2', sans-serif; display: none">Sembunyikan</button>    
    </div>
<br><br>
    <div class="row ini" style="display: none">
    
      
        <div class="col-sm-3" align="center">
          <style type="text/css">
          .tg  {border-collapse:collapse;border-spacing:0;}
          .tg td{padding:10px 5px;border-style:solid;border-width:1px;}
          .tg th{font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;}
          .tg .tg-5xqe{background-color:#ffd36d;text-align:center;vertical-align:top; color: black}
          .tg .tg-pn40{background-color:#253247;text-align:center; color:white;}
          .tg .tg-giv5{background-color:#fffe65;text-align:center; color: black}
          .tg .tg-wr27{background-color:#ffd36d;text-align:center; color: black}
          .tg .tg-7ygo{background-color:#ffd36d;text-align:center;vertical-align:top; color: black}
          </style>
          <table class="tg" style="float:center;">
            <tr>
              <th class="tg-pn40" colspan="2">Penilaian Karyawan</th>
            </tr>
            <tr>
              <td class="tg-giv5">KPIM</td>
              <td class="tg-wr27">75 %</td>
            </tr>
            <tr>
              <td class="tg-giv5">Disiplin</td>
              <td class="tg-wr27">10 %</td>
            </tr>
            <tr>
              <td class="tg-7ygo">Softskill</td>
              <td class="tg-5xqe">15 %</td>
            </tr>
             <tr>
              <td class="tg-5xqe" style="background-color: white">Total</td>
              <td class="tg-5xqe" style="background-color: white">100 %</td>
            </tr>
          </table>
        </div>
      


        <div class="col-sm-9">            
          <style type="text/css">
          .tg  {border-collapse:collapse;border-spacing:0;}
          .tg td{padding:10px 5px;border-style:solid;border-width:1px;}
          .tg th{font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;}
          .tg .tg-e5lu{background-color:#253247;color:#ffffff;text-align:center;vertical-align:top}
          .tg .tg-ejr1{background-color:#ffd36d;text-align:center;vertical-align:top}
          .tg .tg-bgyt{background-color:#253247;color:#ffffff;text-align:center}
          .tg .tg-giv5{background-color:#fffe65;text-align:center}
          .tg .tg-7ygo{background-color:#fffe65;text-align:center;vertical-align:top}
          .tg .tg-nbme{background-color:#ffd36d;text-align:center}
          </style>
          <table class="tg" style="float:center;">
            <tr>
              <th class="tg-bgyt" colspan="6">Parameter Total Penilaian Akhir (%)</th>
            </tr>
            <tr>
              <th class="tg-bgyt" ></th>
              <th class="tg-bgyt" style="background-color: firebrick">Under Expectation<br/>(Di Bawah Harapan)</th>
              <th class="tg-bgyt" style="background-color: #d18c02">Not Meet Expectation<br/>(Tidak Sesuai Harapan)</th>
              <th class="tg-bgyt" style="background-color: gray">Meet Expectation<br/>(Sesuai Harapan)</th>
              <th class="tg-e5lu" style="background-color: #1d67e0">Exceeds Expectation<br/>(Melebihi Harapan)</th>
              <th class="tg-e5lu" style="background-color: green">Exceptional<br/>(Istimewah)</th>
            </tr>

            <tr>
              <td class="tg-giv5">Score : </td>
              <td class="tg-giv5">0 - 40</td>
              <td class="tg-giv5">>40 - 60</td>
              <td class="tg-giv5">>60 - 75</td>
              <td class="tg-7ygo">>75 - 85</td>
              <td class="tg-7ygo">>85 - 100</td>
            </tr>
            <tr>
              <td class="tg-nbme" style="color: black">Persentase: </td>
              <td class="tg-nbme" style="color: black">0 - 30%</td>
              <td class="tg-nbme" style="color: black">31% - 45%</td>
              <td class="tg-nbme" style="color: black">46% - 56.2%</td>
              <td class="tg-ejr1" style="color: black">56.3% - 63.7%</td>
              <td class="tg-ejr1" style="color: black">63.8% - 75%</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    

      <script> //ini untuk hide show table
        $(document).ready(function(){
            $("#hide").click(function(){
                $(".ini").hide(1000);
            });
            $("#show").click(function(){
                $(".ini").show(1000);
            });

           
        });
      </script>
    <br><br>

        <!-- <center>
        <button type="button" class="btn btn-danger" id="plain">Plain</button>
        <button type="button" class="btn btn-danger" id="inverted">Inverted</button>
        <button type="button" class="btn btn-danger" id="polar">Polar</button>
        </center> -->

          


<script type="text/javascript" src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>
    <script src="<?php echo base_url();?>assets/js/moment.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap-datetimepicker.min.js"></script>
</body>
</html>