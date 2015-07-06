<!DOCTYPE html><html lang="en">
    <head> 
        <meta charset="utf-8" /> 
        <title>Web Application | WIMS</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/app.v2.css" type="text/css" /> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font.css" type="text/css" cache="false" />
        <link type="text/css" href="<?php echo base_url(); ?>assets/js/fuelux/fuelux.css" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/datepicker/datepicker.css" type="text/css" /> 
        <script src="<?php echo base_url(); ?>assets/js/app.v2.js"></script> 
        <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validationEngine.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.validationEngine-en.js"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/validationEngine.jquery.css" type="text/css"/>

<!--[if lt IE 9]> <script src="<?php // echo base_url(); ?>assets/js/ie/respond.min.js" cache="false"></script> <script src="<?php // echo base_url(); ?>assets/js/ie/html5.js" cache="false"></script> <script src="js/ie/fix.js" cache="false"></script> <![endif]-->
    </head>
    <body> 
        <div class="se-pre-con"></div>
         <section class="hbox"> 
               <aside class="bg-success dker  nav-vertical aside-sm" id="nav"> 
                    <section class="vbox"> 
                    <header class="bg-black nav-bar"> 
                        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> 
                        <a href="#" class="nav-brand">WIMS</a> 
                        <a class="btn btn-link visible-xs" data-toggle="collapse" data-target=".navbar-collapse"> <i class="fa fa-comment-o"></i> </a> 
                    </header> 
                </section> 
               </aside>
             <section id="content"> 
                <section class="vbox"> 
                    <header class="header bg-black navbar navbar-inverse"> 
                        <div class="collapse navbar-collapse pull-in"> 
                            <?php if($_SESSION['user_type'] == 1) {    ?>
                            <ul class="nav navbar-nav m-l-n"> 
                                <li class="active"><a href="<?php echo base_url(); ?>users">Dashboard</a></li> 
                            </ul> <?php } ?>	
                            <form class="navbar-form navbar-left m-t-sm" role="search"> 
                                <div class="form-group"> 
                                    <div class="input-group input-s"> 
                                        <input type="text" class="form-control input-sm no-border bg-dark" placeholder="Search"> <span class="input-group-btn"> <button type="submit" class="btn btn-sm btn-success btn-icon"><i class="fa fa-search"></i></button> </span> 
                                    </div> 
                                </div> 
                            </form> 
                            <ul class="nav navbar-nav navbar-right"> 
                                <li class="dropdown"> <a href="#" class="user dropdown-toggle" data-toggle="dropdown"> Welcome <?php echo $_SESSION['user_name']; ?> <b class="caret"></b> </a> 
                                    <ul class="dropdown-menu animated fadeInLeft"> 
                                        <li> <a href="<?php echo base_url("/welcome/logout") ?>">Logout</a> </li> 
                                    </ul> 
                                </li> 
                            </ul> 
                        </div> 
                    </header> 
                </section>
               </section>
         </section>
        <section class="hbox stretch"> <!-- .aside --> 
            <?php if($_SESSION['user_type'] == 1) {    ?>
            <aside class="bg-success dker aside-sm nav-vertical" id="nav"> 
                <section class="vbox"> 
                    <section> <!-- nav -->
                        <nav class="nav-primary hidden-xs"> 
                            <ul class="nav"> 
                                <li> <a href="<?php echo base_url(); ?>admin/order_status"> <i class="fa fa-compass"></i> <span>New Orders</span> </a></li> 
                                <li> <a href="<?php echo base_url(); ?>admin/order_status"> <i class="fa fa-compass"></i> <span>Order Status</span> </a></li> 
                                <li> <a href="<?php echo base_url(); ?>admin/customer_list"> <i class="fa fa-list"></i> <span>Customer Master List</span> </a></li> 
                                <li> <a href="reports.php"> <i class="fa fa-bar-chart-o"></i> <span>Reports</span> </a> </li> 
                                <li> <a href="<?php echo base_url(); ?>admin/user_list"> <i class="fa fa-user"></i> <span>Users</span> </a> </li> 
                                <li> <a href="<?php echo base_url(); ?>cad/view_mail_templates"> <i class="fa fa-envelope"></i> <span>Mail Templates</span> </a> </li>  

<!--                                <li> <a href=""> <i class="fa fa-sitemap"></i> <span>DB Backup</span> </a> </li>  -->
                            </ul> 
                        </nav> <!-- / nav --> 

                    </section>
                </section> 
            </aside> <!-- /.aside --> <!-- .vbox --> <?php  }   ?>
            <section id="content"> 
                <section class="vbox"> 
                    


                    <?php echo $template['body']; ?>


                </section> 
                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> 
            </section> <!-- /.vbox --> 
        </section>


        <script src="<?php echo base_url(); ?>assets/js/datepicker/bootstrap-datepicker.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fuelux/fuelux.js"></script> 
        <script src="<?php echo base_url(); ?>assets/js/parsley/parsley.min.js" cache="false"></script> 
        <script src="<?php echo base_url(); ?>assets/js/parsley/parsley.extend.js" cache="false"></script> <!-- select2 --> 
        <script src="<?php echo base_url(); ?>assets/js/libs/jquery.pjax.js" cache="false"></script>
        <script src="<?php echo base_url(); ?>assets/js/charts/morris/raphael-min.js" cache="false"></script> 
        <script src="<?php echo base_url(); ?>assets/js/charts/morris/morris.min.js" cache="false"></script>
        <script src="<?php echo base_url(); ?>assets/js/notify.min.js" cache="false"></script>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/datatables/datatables.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui-1.7.2.custom.css">

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.7.2.custom.min.js"></script>
        <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="http://www.beamon.com/wims2/assets/ckeditor/ckeditor.js"></script>
        <!--link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/ckeditor/contents.css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckeditor/styles.js"></script-->
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/ckfinder/ckfinder.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
        <script>
            //paste this code under head tag or in a seperate js file.
            // Wait for window load
            $(window).load(function () {
                // Animate loader off screen
                $(".se-pre-con").fadeOut("slow");
                ;
            });
            $(document).ajaxStart(function () {
                $(".se-pre-con").show();
            });
            $(document).ajaxStop(function () {
                $(".se-pre-con").hide();
            });
        </script>
        <div id="dialog_box" title="Ref #test" style="display:none;">

        </div>

        <script type="text/javascript">
//            $(".datatable").dataTable({"aaSorting": [], "bSort": false});
            $(document).ready(function () {
                $("#dialog_box").dialog({
                    autoOpen: false,
                    resizable: false,
                    position: 'center',
                    width: 'auto',
                    modal: false
                });
            
// notifications

            });

            function show_notification_message(message, type) {
                $.notify(message, type);
            }

        </script>

        <footer>

            <style>
                #helpDialog7 label {
                    font-size: 12px;
                }
                .control-label-check{
                    margin: 2px 5px !important;
                }
                #helpDialog7 .form-group {
                    margin-bottom: 2px;
                }
            </style>
        </footer>
    </body>
</html>