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

<!--[if lt IE 9]> <script src="<?php echo base_url(); ?>assets/js/ie/respond.min.js" cache="false"></script> <script src="<?php echo base_url(); ?>assets/js/ie/html5.js" cache="false"></script> <script src="js/ie/fix.js" cache="false"></script> <![endif]-->
    </head>
    <body> 
        <div class="se-pre-con"></div>
        <section class="hbox stretch"> <!-- .aside --> 
            <aside class="bg-success dker aside-sm nav-vertical" id="nav"> 
                <section class="vbox"> 
                    <header class="bg-black nav-bar"> 
                        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> 
                        <a href="#" class="nav-brand">WIMS</a> 
                        <a class="btn btn-link visible-xs" data-toggle="collapse" data-target=".navbar-collapse"> <i class="fa fa-comment-o"></i> </a> 
                    </header> 
                    <section> <!-- nav -->
                        <nav class="nav-primary hidden-xs"> 
                            <ul class="nav"> 

                                <li> <a href="<?php echo base_url(); ?>admin/order_status"> <i class="fa fa-compass"></i> <span>Order Status</span> </a></li> 
                                <li> <a href="<?php echo base_url(); ?>admin/customer_list"> <i class="fa fa-list"></i> <span>Customer Master List</span> </a></li> 
                                <li> <a href="reports.php"> <i class="fa fa-bar-chart-o"></i> <span>Reports</span> </a> </li> 
                                <li> <a href="<?php echo base_url(); ?>admin/user_list"> <i class="fa fa-user"></i> <span>Users</span> </a> </li> 
                                <li> <a href=""> <i class="fa fa-sitemap"></i> <span>DB Backup</span> </a> </li>  
                            </ul> 
                        </nav> <!-- / nav --> 
                    </section>
                </section> 
            </aside> <!-- /.aside --> <!-- .vbox --> 
            <section id="content"> 
                <section class="vbox"> 
                    <header class="header bg-black navbar navbar-inverse"> 
                        <div class="collapse navbar-collapse pull-in"> 
                            <ul class="nav navbar-nav m-l-n"> 
                                <li class="active"><a href="<?php echo base_url(); ?>admin">Dashboard</a></li> 
                            </ul> 	
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
                                        <li> <a href="<?php echo base_url("index.php/welcome/logout") ?>">Logout</a> </li> 
                                    </ul> 
                                </li> 
                            </ul> 
                        </div> 
                    </header> 


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
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/datatables/datatables.css" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/jquery-ui-1.7.2.custom.css">

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui-1.7.2.custom.min.js"></script>
        <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>

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
            $(".datatable").dataTable({"aaSorting": [], "bSort": false});
            $(document).ready(function () {
                $('body').on('click', '.job_tooling', function (e) {
                    e.preventDefault();
                    var job_id = $(this).attr("data-item-id");
                    var job_tooling = $(this).attr("data-tooling");
                    $.ajax({
                        url: "<?php echo base_url('/admin/update_tooling'); ?>",
                        data: {job_id: job_id, job_tooling: job_tooling},
                        type: "POST",
                        success: function (response) {
                            location.reload();
                        }
                    });
                });
                $("#dialog_box").dialog({
            autoOpen: false,
            resizable: false,
            position: 'center',
            width: 'auto',
            modal: false
        });
        //get help btn number user clicked on and show appr. help info
        $('.prioritypop').click(function () {
            // e.preventDefault();
            var job_id = $(this).attr("data-item-id");
            var priority = $(this).attr("data-priority");
            $.ajax({
                url: "<?php echo base_url('/admin/set_priority'); ?>",
                data: {job_id: job_id},
                type: "GET",
                success: function (response) {
                    $("#dialog_box").html(response);
                    $("#dialog_box").dialog("open");

                    $("#dialog_box").parent("div").removeClass("high1").removeClass("medium1").removeClass("low1").addClass(priority);

                }
            });
        });

        $('.jobinfo').click(function () {
            // e.preventDefault();
            var job_id = $(this).attr("data-item-id");
            var priority = $(this).attr("data-priority");
            $.ajax({
                url: "<?php echo base_url('admin/view_job_info'); ?>",
                data: {job_id: job_id},
                type: "GET",
                success: function (response) {
                    $("#dialog_box").html(response);
                    $("#dialog_box").dialog("open");
                    $("#dialog_box").parent("div").removeClass("high1").removeClass("medium1").removeClass("low1").addClass(priority);
                }
            });
        });
            });
        </script>

        <footer>
            <div id="helpDialog1" title="Order #test" style="display:none;">
                <div class="dialog_con1">
                    <div class="bar"><img src="images/tick-512.png"></div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="doc-buttons">
                                <a id="helpBtn2" class="btn btn-s-md btn-default help button" href="#">Display <br>Order Form</a>
                                <a id="helpBtn3" class="btn btn-s-md btn-default help button" href="#">Download Job</a>
                                <a id="helpBtn5" class="btn btn-s-md btn-default help button" href="#">Mail <br>To Customer</a>
                                <a id="" class="btn btn-s-md btn-default help button" href="#">Download <br>Comlete Job</a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <section class="panel">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <tr>
                                            <th>Date & Time</th><th>Status</th><th>User</th>
                                        </tr>
                                        <tr>
                                            <td>Test</td><td>Test</td><td>Test</td>
                                        </tr>
                                        <tr>
                                            <td>Test</td><td>Test</td><td>Test</td>
                                        </tr>
                                        <tr>
                                            <td>Test</td><td>Test</td><td>Test</td>
                                        </tr>
                                        <tr>
                                            <td>Test</td><td>Test</td><td>Test</td>
                                        </tr>
                                        <tr>
                                            <td>Test</td><td>Test</td><td>Test</td>
                                        </tr>
                                    </table>

                                </div>
                            </section>
                            <label>Notes</label>
                            <input type="text">
                        </div>


                        <div class="col-lg-3">
                            <div class="doc-buttons">
                                <a class="btn btn-s-md btn-default laser" data-toggle="tab" href="#tab3">Send To<br> Laser Dept</a>
                                <a class="btn btn-s-md btn-default" href="#">Upload To<br> Archive</a>
                                <a class="btn btn-s-md btn-default" href="#">Upload <br> LSRJSCN</a>
                                <a class="btn btn-s-md btn-default" href="#">Check List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="helpDialog2" title="Order Form #test" style="display:none;">
                <div class="dialog_con1">
                    <div class="bar"><img src="images/tick-512.png"></div>
                    <div class="row">
                        <div class="col-lg-12">
                            Beam On
                        </div>
                    </div>

                </div>
            </div>

            <div id="helpDialog3" title="Download Confirmation" style="display:none;">
                <div class="dialog_con2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="bar">Whould You Like to Download and Design?</div>
                            <div class="doc-buttons dialog_btn">
                                <a id="helpBtn4" class="btn btn-s-md btn-default help button" href="#">Yes</a><a id="ex-close" class="btn btn-s-md btn-default" href="#">No, Just Download</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div id="helpDialog4" title="Attention!" style="display:none;">
                <div class="dialog_con2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="bar">Job has been Downloaded already and in design. Download anyway?</div>
                            <div class="doc-buttons dialog_btn">
                                <a class="btn btn-s-md btn-default" href="#">Yes</a><a id="ex-close" class="btn btn-s-md btn-default" href="#">No</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div id="helpDialog5" title="Approval Request" style="display:none;">
                <div class="dialog_con1">
                    <div class="row">
                        <div class="col-lg-12">
                            <form class="form-horizontal">
                                <div class="form-group"> <label class="col-sm-2 control-label" for="input-id-1">To</label> <div class="col-sm-10"> <input type="email" class="form-control" id="input-id-1"> </div> </div>
                                <div class="form-group"> <label class="col-sm-2 control-label" for="input-id-1">Cc</label> <div class="col-sm-10"> <input type="email" class="form-control" id="input-id-1"> </div> </div>
                                <div class="form-group"> <label class="col-sm-2 control-label" for="input-id-1">Attachments</label> <div class="col-sm-10"> <input type="file" class="form-control" id="input-id-1"> </div> </div>
                                <div class="form-group"> <label class="col-sm-2 control-label" for="input-id-1">Subject</label> <div class="col-sm-10"> <textarea class="form-control"></textarea> </div> </div>
                                <div class="form-group"> <label class="col-sm-2 control-label" for="input-id-1"></label> <div class="col-sm-10"> <button class="btn btn-primary" type="submit">Send</button></div> </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>

            <div id="helpDialog6" title="Ref #test" style="display:none;">
                <div class="dialog_con3">
                    <div class="bar"><a class="btn btn-s-md btn-default" href="#">Priority #2</a></div>
                    <div class="row">

                        <div class="col-lg-4 extra_pad">
                            <a class="btn btn-s-md btn-default" href="#">Foil Thickness: <br>5 Miles</a>
                        </div>
                        <div class="col-lg-4 extra_pad">
                            <a class="btn btn-s-md btn-default" href="#">Frame Size: <br> Foli Only</a>
                        </div>
                        <div class="col-lg-4 extra_pad">
                            <a class="btn btn-s-md btn-default" href="#">Foil Type:<br>Z2</a>
                        </div>
                        <div class="col-lg-4 extra_pad">
                            <a class="btn btn-s-md btn-default" href="#">Lead Free</a>
                        </div>
                        <div class="col-lg-4 extra_pad">
                            <a class="btn btn-s-md btn-default" href="#">Electro Polish</a>
                        </div>


                        <div class="col-lg-6 extra_pad">
                            <a class="btn btn-s-md btn-default" href="#">Compliance Sheet REQUIRED</a>
                            <div class="col-sm-12 extra_pad"> Yes</div> 
                        </div>
                        <div class="col-lg-6 extra_pad">
                            <div class="form-group"> 
                                <label class="col-sm-3 control-label" for="input-id-1">Note</label> 
                                <div class="col-sm-9"> Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text</div> 
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="bar">
                            <a class="btn btn-s-md btn-default" href="#">Print QR</a>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    </body>
</html>