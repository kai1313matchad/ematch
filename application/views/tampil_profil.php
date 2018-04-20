<!DOCTYPE html>
<html>
<head>
    <title>Profil <?php echo $this->session->userdata('username') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
    <link href="<?php echo base_url(); ?>assets/css/extra.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet"></link>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <!-- <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script> -->
    <script src="<?php echo base_url();?>assets/js/jquery-2.1.4.min.js"></script>

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
.center {
    display: block;
    float: center
    margin: auto;
    width: 50%;
    padding: 10px;
}
.jarak {
            margin-top: 8px;
        }

.ft-profi{
    border-radius: 5px 5px 0 0;
}
</style>
<body class="semua home">
    <?php if ($this->session->flashdata('msg')) { ?>
    <div class="alert alert-danger alert-dismissable">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <?= $this->session->flashdata('msg') ?>
    </div>
    
<?php } ?>
<br><br>
<div class="row">
<a href="<?php echo base_url();?>index"><button type="button" class="btn btn-default btn-sm col-md-2 col-md-offset-5 col-sm-offset-5"><span class="glyphicon glyphicon-home"></span><text style="text-transform: capitalize;"> Home</text></button></a>
</div>
<br>



    <div class="container center" >
        <div class="row"  >
            <div class="col-xs-12 col-sm-12 col-md-12" >
                        <?php if ($this->session->flashdata('message_name')) { ?>
                            <div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <?= $this->session->flashdata('message_name') ?>
                            </div>
                            
                        <?php } ?>
                <div class="well well-sm" style="box-shadow: 0px 0px 10px grey;">
                    <div class="row">
                    <?php 
                    $no = 1;
                    
                    foreach($table as $dataku){ 
                    ?>

                        <div class="col-sm-6 col-md-4">
                            <center><!-- <span class="glyphicon glyphicon-user icon-size"></span> -->
                            <?php $alamatfoto =  $dataku->img; 
                            if (empty($alamatfoto)) {
                                $alamatfoto = 'kosong.png';
                            }?>
                            <img class="img-responsive" src="<?php echo base_url() ?>/assets/ft_profil/resized/<?php echo $alamatfoto; ?>" alt="<?php echo $dataku->username; ?>" title="Foto <?php echo $dataku->username; ?>" style=" border-radius: 50%; border: solid 3px gray; margin-left: 10px">

                            </center>
                        </div>
                        <div class="col-sm-6 col-md-8" style="line-height: 150%">
                            <h3><?php echo $dataku->username; ?> | <?php echo $dataku->nama_karyawan; ?></h3>
                            <small><cite title="<?php echo $dataku->nama_akses ?>"><span class="glyphicon glyphicon-star-empty"></span> <?php echo $dataku->nama_akses ?></cite> | <span class="glyphicon glyphicon-envelope"></span> <?php echo $dataku->email ?></small>
                            <p>
                                <i class="glyphicon glyphicon-briefcase"></i> <?php echo $dataku->jabatannya ?> 
                                <br />
                                <i class="glyphicon glyphicon-tag"></i> <?php echo $dataku->deptini ?>
                                <br />
                                <!-- <i class="glyphicon glyphicon-globe"></i><a href="//www.jquery2dotnet.com">www.jquery2dotnet.com</a>
                                <br />
                                <i class="glyphicon glyphicon-gift"></i>June 02, 1988</p> -->
                            <!-- Split button -->
                            <!-- <div class="btn-group">
                                <button type="button" class="btn btn-primary">
                                    Social</button>
                                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span><span class="sr-only">Social</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Twitter</a></li>
                                    <li><a href="https://plus.google.com/+Jquery2dotnet/posts">Google +</a></li>
                                    <li><a href="https://www.facebook.com/jquery2dotnet">Facebook</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Github</a></li>
                                </ul>
                            </div> -->
                            <div class="btn-group">
                                <button data-toggle="modal" data-target="#myModal<?php echo $dataku->id_karyawan ?>" type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span><text style="text-transform: capitalize;"> Edit</text></button>

                                <button data-toggle="modal" data-target="#gantipass<?php echo $dataku->id_karyawan ?>" type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span><text style="text-transform: capitalize;"> Ganti Password</text></button>

                                <button data-toggle="modal" data-target="#myModalfoto<?php echo $dataku->id_karyawan ?>" type="button" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-edit"></span><text style="text-transform: capitalize;"> Ganti Foto</text></button>
                            </div>







                            <!-- Modal edit profil-->
                              <div class="modal fade" id="myModal<?php echo $dataku->id_karyawan ?>" role="dialog">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Edit</h4>
                                    </div>

                                    <!-- isi modal -->
                                    <div class="modal-body">
                                    <form id="form_kpim" action="<?php echo base_url();?>Profil/updateprofil/<?php echo $dataku->id_karyawan ?>" method="POST">
                                        <div class="row jarak">
                                            <div class="col-lg-4">
                                                <div style="">Username :</div>
                                            </div>
                                            
                                            <div class="col-lg-8">
                                                <input value="<?php echo $dataku->username ?>" type="text" class="form-control" name="username" placeholder="Username Baru" required>
                                            </div>
                                        </div>

                                        <div class="row jarak">
                                            <div class="col-lg-4">
                                                <div style="">Alamat Email :</div>
                                            </div>
                                            
                                            <div class="col-lg-8">
                                                <input value="<?php echo $dataku->email ?>" type="text" class="form-control" name="email" placeholder="Alamat Email" required>
                                            </div>
                                        </div>

                                    
                                    </div>

                                    <div class="modal-footer">
                                    <button type="submit" id='checkBtn' style="font-family: 'Exo 2', sans-serif;" name="input"  class="btn btn-primary">Save changes</button>
                                      <button type="button" class="btn btn-default" style="font-family: 'Exo 2', sans-serif;" data-dismiss="modal">Close</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>

                              <!-- modal selesai -->

                              <!-- Modal password-->
                              <div class="modal fade" id="gantipass<?php echo $dataku->id_karyawan ?>" role="dialog">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Ganti Password</h4>
                                    </div>

                                    <!-- isi modal -->
                                    <div class="modal-body">
                                    <form id="form_kpim" action="<?php echo base_url();?>Profil/update/<?php echo $dataku->id_karyawan ?>" method="POST">

                                        <div class="row jarak">
                                            <div class="col-lg-4">
                                                <div style="">Password Lama :</div>
                                            </div>
                                            
                                            <div class="col-lg-8">
                                                <input type="Password" class="form-control" name="passwordlama" placeholder="Password Lama" required>
                                            </div>
                                        </div>


                                        <div class="row jarak">
                                            <div class="col-lg-4">
                                                <div style="">Password Baru :</div>
                                            </div>
                                            
                                            <div class="col-lg-8">
                                                <input type="Password" class="form-control" name="password" placeholder="Password Baru" required>
                                            </div>
                                        </div>

                                    
                                    </div>

                                    <div class="modal-footer">
                                    <button type="submit" id='checkBtn' style="font-family: 'Exo 2', sans-serif;" name="input"  class="btn btn-primary">Save changes</button>
                                      <button type="button" class="btn btn-default" style="font-family: 'Exo 2', sans-serif;" data-dismiss="modal">Close</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>

                              <!-- modal selesai -->


                              <!-- Modalfoto -->
                              <div class="modal fade" id="myModalfoto<?php echo $dataku->id_karyawan ?>" role="dialog">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                      <h4 class="modal-title">Edit</h4>
                                    </div>


                                    <!-- isi modal -->
                                    <div class="modal-body">
                                    <form id="form_kpim" action="<?php echo base_url();?>Profil/ganti/<?php echo $dataku->id_karyawan ?>" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                Foto Profil :<br>
                                                <small style="color: red">*Ukuran Maks 2 MB. <br> usahakan ukuran foto persegi</small>
                                            </div>

                                            <div class="col-sm-9">
                                                <span class="btn btn-default btn-file" style="background-color: white">
                                                <input type="file" name="ft_profil" style="cursor: pointer;">
                                                </span>
                                            </div>
                                            
                                        </div>

                                    
                                    </div>

                                    <div class="modal-footer">
                                    <button type="submit" id='checkBtn' style="font-family: 'Exo 2', sans-serif;" name="input"  class="btn btn-primary">Save changes</button>
                                      <button type="button" class="btn btn-default" style="font-family: 'Exo 2', sans-serif;" data-dismiss="modal">Close</button>
                                    </div>
                                    </form>
                                  </div>
                                </div>
                              </div>

                              <!-- modal selesai -->


                            
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
<!--
 
$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
 
});
//-->
</script>
</body>
</html>