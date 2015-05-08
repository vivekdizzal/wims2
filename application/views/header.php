<!DOCTYPE html><html lang="en">

<head> 
<meta charset="utf-8" /> 
<title>Web Application | WIMS</title> 
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
<link rel="stylesheet" href="css/app.v2.css" type="text/css" /> 
<link rel="stylesheet" href="css/font.css" type="text/css" cache="false" />
<link type="text/css" href="js/fuelux/fuelux.css" rel="stylesheet">
<link rel="stylesheet" href="js/datepicker/datepicker.css" type="text/css" /> 
<!--[if lt IE 9]> <script src="js/ie/respond.min.js" cache="false"></script> <script src="js/ie/html5.js" cache="false"></script> <script src="js/ie/fix.js" cache="false"></script> <![endif]-->
</head>
<body> 
	<section class="hbox stretch"> <!-- .aside --> 
		<aside class="bg-success dker aside-sm nav-vertical" id="nav"> 
			<section class="vbox"> 
				<header class="bg-black nav-bar"> 
					<a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> 
					<a href="#" class="nav-brand" data-toggle="fullscreen">WIMS</a> 
					<a class="btn btn-link visible-xs" data-toggle="collapse" data-target=".navbar-collapse"> <i class="fa fa-comment-o"></i> </a> 
				</header> 
                <section> <!-- nav -->
                    <nav class="nav-primary hidden-xs"> 
                        <ul class="nav"> 
                            <li> <a href="new_orders.php"> <i class="fa fa-book"></i> <span>New Orders</span> </a> </li> 
                            <li> <a href="new_orders.php"> <i class="fa fa-compass"></i> <span>Order Status</span> </a></li> 
                            <li> <a href="customer_list.php"> <i class="fa fa-list"></i> <span>Customer Master List</span> </a></li> 
                            <li> <a href="reports.php"> <i class="fa fa-bar-chart-o"></i> <span>Reports</span> </a> </li> 
                            <li> <a href="user_list.php"> <i class="fa fa-user"></i> <span>Users</span> </a> </li> 
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
                            <li class="active"><a href="dashboard.php">Dashboard</a></li> 
                        </ul> 	
                        <form class="navbar-form navbar-left m-t-sm" role="search"> 
                            <div class="form-group"> 
                                <div class="input-group input-s"> 
                                    <input type="text" class="form-control input-sm no-border bg-dark" placeholder="Search"> <span class="input-group-btn"> <button type="submit" class="btn btn-sm btn-success btn-icon"><i class="fa fa-search"></i></button> </span> 
                                </div> 
                            </div> 
                        </form> 
                        <ul class="nav navbar-nav navbar-right"> 
                            <li class="dropdown"> <a href="#" class="user dropdown-toggle" data-toggle="dropdown"> Welcome Admin <b class="caret"></b> </a> 
                                <ul class="dropdown-menu animated fadeInLeft"> 
                                    <li> <a href="signin.html">Logout</a> </li> 
                                </ul> 
                            </li> 
                        </ul> 
                    </div> 
                </header> 