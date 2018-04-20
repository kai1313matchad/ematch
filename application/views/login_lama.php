<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <link rel="icon" href="<?=base_url()?>/favicon.gif" type="image/gif">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">

    <!-- MetisMenu CSS 
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="assets/css/extra.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,400i" rel="stylesheet">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <!-- Custom Fonts 
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
-->
<style type="text/css">
h3.panel-title{text-align: center;font-weight: bold;text-transform: uppercase;}
</style>
</head>
<style>
input[type=text] {
text-align: center;
}
input[type=password] {
text-align: center;
}
input[type=text]:focus {
 
}
</style>

<body class="semua">
    <?php if ($this->session->flashdata('message_name')) { ?>
        <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        <?= $this->session->flashdata('message_name') ?>
        </div>
    <?php } ?>
<p/>
    <div class="container jarak">
   <br><br><br><br>

        <div class="row" >  
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary" style="border-radius: 10px 10px 25px 25px; border-color: darkred; border-style: solid; border-width: medium;">
                    <div class="panel-heading" style="background-color:darkred; border-radius: 5px 5px 0px 0px">
                   <!--  <center><h1>MATCH AD</h1></center>
                    <br> -->
                        <h3 class="panel-title" style="font-size:12px">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="<?php echo base_url();?>login/getLogin">
                        <center><img src="assets/img/ematchlogo.png" alt="ematch" width="200" /> </center>
                            <fieldset>
                                <div class="form-group">
                                    <!-- <label for="inputEmail"><center>Username</center></label> -->
                                    <input type="text" class="form-control" name="username" id="username" placeholder="username" required>
                                </div>
                                <div class="form-group">
                                    <!-- <label for="inputPassword">Password</label> -->
                                    <input type="password" class="form-control" name="password" id="password" placeholder="password" required>
                                </div>                          
                                <button type="submit" class="btn btn-lg btn-primary btn-block" style="font-family: 'Exo 2', sans-serif;">Login</button>
                                <!-- warning akan muncul disini -->
                                <?php
                                    $info = $this->session->flashdata('info'); //menampung informasi yang di lempar di mode
                                    if(!empty($info)) //jika info tidak kosong maka tampilkan warning
                                    { ?>
                                        <center><span style="color: red"><?= $info?></span></center>
                                    <?php }
                                ?>  
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div align="center" style="color: white; padding-bottom:100px;">Copyright @2017 By Match Advertising</div>
    </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/js/jquery-1.11.0.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.js"></script>

    <script type="text/javascript">
    
     
    $(document).ready(function () {
     
    window.setTimeout(function() {
        $(".alert").fadeTo(1500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 5000);
     
    });
    
    </script>

</body>

</html>
