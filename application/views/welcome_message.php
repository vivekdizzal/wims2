<!DOCTYPE html><html lang="en">

    <head> 
        <meta charset="utf-8" /> 
        <title>Web Application | WIMS</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.v2.css" type="text/css" /> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font.css" type="text/css" cache="false" />
        <!--[if lt IE 9]> <script src="js/ie/respond.min.js" cache="false"></script> <script src="js/ie/html5.js" cache="false"></script> <script src="js/ie/fix.js" cache="false"></script> <![endif]-->
    </head>
    <body style="background:#524982;"> 
        <section id="content" class="m-t-lg wrapper-md animated fadeInUp"> 
            <a class="nav-brand" href="" style="color:#fff;">WIMS</a> 
            <div class="row m-n"> 
                <div class="col-md-4 col-md-offset-4 m-t-lg"> 
                    <section class="panel"> 
                        <header class="panel-heading text-center"> Sign in </header> 
                        <form method="POST" class="panel-body">
                            <?php echo validation_errors(); ?>
                            <div class="form-group"> <label class="control-label">Username</label> <input value="<?php echo set_value('usr_logname'); ?>" name="usr_logname" id="usr_logname" type="text" placeholder="johndoe" class="form-control"> </div> 
                            <div class="form-group"> <label class="control-label">Password</label> <input value="<?php echo set_value('usr_logpwd'); ?>" name="usr_logpwd" type="password" id="usr_logpwd" placeholder="Password" class="form-control"> </div> 
                            <a href="#" class="pull-right m-t-xs"><small>Forgot password?</small></a> 
                            <button name="submit-login" type="submit" class="btn btn-info">Sign in</button>
                        </form> 
                    </section> 
                </div> 
            </div> 
        </section>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-1.3.2.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/app.v2.js"></script> 
        <script src="<?php echo base_url(); ?>assets/js/libs/jquery.pjax.js" cache="false"></script>
        <script src="<?php echo base_url(); ?>assets/js/charts/morris/raphael-min.js" cache="false"></script> 
        <script src="<?php echo base_url(); ?>assets/js/charts/morris/morris.min.js" cache="false"></script>
    </body>
</html>
