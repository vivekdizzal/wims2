<?php include'header.php' ?>
                <section class="scrollable" id="pjax-container"> 
                    <header> 
                        <div class="row b-b m-l-none m-r-none"> 
                            <div class="col-sm-4"> 
                                <h3 class="m-t m-b-none">Welcome to WIMS</h3> 
                                <p class="block text-muted"></p> 
                            </div> 
                        </div> 
                    </header> 
                    <header class="panel-heading"> <div class="pull-right"><a href="user_list.php" class="btn btn-success">User List</a></div>
                                        <div class="clearfix"></div>
                                        </header>
    				<section class="vbox"> 
                    	<section class="wrapper"> 
                                <section id="wizard" class="tab-pane active"> 
                                    <div class="panel wizard"> 
                                        <div class="wizard-steps clearfix"> 
                                            <ul class="steps"> 
                                                <li class="active" data-target="#step1"><span class="badge badge-info">1</span>General Details</li> 
                                                <li data-target="#step2"><span class="badge">2</span>User Rights</li> 
                                            </ul> 
                                        </div> 
                                        <div class="step-content clearfix"> 
                                            <form class="m-b-sm form-horizontal"> 
                                                <div id="step1" class="step-pane active"> 
                                                	<div class="col-lg-6">
                                                    	<div class="form-group"> 
                                                            <label for="input-id-1" class="col-sm-4 control-label">Staff Name *</label> 
                                                            <div class="col-sm-8"> <input type="text" id="input-id-1" class="form-control"> </div> 
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label for="input-id-1" class="col-sm-4 control-label">User Type </label> 
                                                            <div class="col-sm-8"> <input type="text" id="input-id-1" class="form-control"> </div> 
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label for="input-id-1" class="col-sm-4 control-label">Login User Name *</label> 
                                                            <div class="col-sm-8"> <input type="text" id="input-id-1" class="form-control"> </div> 
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label for="input-id-1" class="col-sm-4 control-label">Password *</label> 
                                                            <div class="col-sm-8"> <input type="text" id="input-id-1" class="form-control"> </div> 
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                    	<div class="form-group"> 
                                                            <label for="input-id-1" class="col-sm-4 control-label">Designation </label> 
                                                            <div class="col-sm-8"> <input type="text" id="input-id-1" class="form-control"> </div> 
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label for="input-id-1" class="col-sm-4 control-label">Mobile No *</label> 
                                                            <div class="col-sm-8"> <input type="text" id="input-id-1" class="form-control"> </div> 
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label for="input-id-1" class="col-sm-4 control-label"> 	Email ID * </label> 
                                                            <div class="col-sm-8"> <input type="email" id="input-id-1" class="form-control"> </div> 
                                                        </div>
                                                        <div class="form-group"> 
                                                            <label for="input-id-1" class="col-sm-4 control-label">Address / City </label> 
                                                            <div class="col-sm-8"> <input type="text" id="input-id-1" class="form-control"> </div> 
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div> 
                                                <div id="step2" class="step-pane">
                                                <div class="col-lg-12">
                                                	<div class="checkbox"> 
                                                        <label class="checkbox-custom"> 
                                                        <input type="checkbox" checked="checked" name="checkboxA"> <i class="fa fa-square-o checked"></i> Rights to Update </label> 
                                                        </div>
                                                </div> 
                                                <div class="col-lg-8">
                                                	<div class="col-sm-4"> <!-- checkbox --> 
                                                        <div class="checkbox"> 
                                                        <label class="checkbox-custom"> 
                                                        <input type="checkbox" checked="checked" name="checkboxA"> <i class="fa fa-square-o checked"></i> CAD </label> 
                                                        </div> 
                                                        <div class="checkbox"> 
                                                        <label class="checkbox-custom"> 
                                                        <input type="checkbox" id="2" name="checkboxB"> <i class="fa fa-square-o"></i>SHIPMENT </label> 
                                                        </div>
                                                        <div class="checkbox"> 
                                                        <label class="checkbox-custom"> 
                                                        <input type="checkbox" id="2" name="checkboxB"> <i class="fa fa-square-o"></i> HOLD </label> 
                                                        </div>
                                                        <div class="checkbox"> 
                                                        <label class="checkbox-custom"> 
                                                        <input type="checkbox" id="2" name="checkboxB"> <i class="fa fa-square-o"></i> REMARKS UPDATE </label> 
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4"> <!-- checkbox --> 
                                                        <div class="checkbox"> 
                                                        <label class="checkbox-custom"> 
                                                        <input type="checkbox" checked="checked" name="checkboxA"> <i class="fa fa-square-o checked"></i> LASER </label> 
                                                        </div>
                                                        <div class="checkbox"> 
                                                        <label class="checkbox-custom"> 
                                                        <input type="checkbox" id="2" name="checkboxB"> <i class="fa fa-square-o"></i> INVOICE </label> 
                                                        </div> 
                                                        <div class="checkbox"> 
                                                        <label class="checkbox-custom"> 
                                                        <input type="checkbox" id="2" name="checkboxB"> <i class="fa fa-square-o"></i> COMPLETED </label> 
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4"> <!-- checkbox --> 
                                                        <div class="checkbox"> 
                                                        <label class="checkbox-custom"> 
                                                        <input type="checkbox" checked="checked" name="checkboxA"> <i class="fa fa-square-o checked"></i> PRODUCTION </label> 
                                                        </div> 
                                                        <div class="checkbox"> 
                                                        <label class="checkbox-custom"> 
                                                        <input type="checkbox" id="2" name="checkboxB"> <i class="fa fa-square-o"></i> PACKING </label> 
                                                        </div>
                                                        <div class="checkbox"> 
                                                        <label class="checkbox-custom"> 
                                                        <input type="checkbox" id="2" name="checkboxB"> <i class="fa fa-square-o"></i> PRIORITY & TOOLING </label> 
                                                        </div>
                                                    </div>
                                                    </div>
                                                    </div>
                                                <div class="clearfix"></div> 
                                            </form> 
                                            <div class="actions pull-left"> 
                                            	<button disabled="disabled" class="btn btn-white btn-sm btn-prev" type="button">Prev</button> 
                                            	<button data-last="Finish" class="btn btn-white btn-sm btn-next" type="button">Next</button> 
                                            </div> 
                                        </div> 
                                    </div> 
                                </section>  
                    	</section> 
                    </section>
    			</section> 
<?php include'footer.php' ?>