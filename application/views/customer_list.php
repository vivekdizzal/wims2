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
    
                    <section class="vbox">
                        <section class="wrapper"> 
                            <div class="tab-content"> 
                                <div class="" id="datatable"> 
                                    <section class="panel"> 
                                        <header class="panel-heading"> Customer Master List <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> <div class="pull-right"><a class="btn btn-success" href="new_customer.php">Add New Customer</a></div>
                                        <div class="clearfix"></div>
                                        </header> 
                                        <div class="table-responsive"> 
                                            <table class="table table-striped m-b-none" data-ride="datatables"> 
                                                <thead> 
                                                    <tr> 
                                                        <th width="">Ref. Number</th> 
                                                        <th width="">Customer Name</th> 
                                                        <th width="">Contact Person</th> 
                                                        <th width="">E-Mail ID</th> 
                                                        <th width="">Mobile</th> 
                                                        <th width="">Actions</th>
                                                    </tr> 
                                                 </thead> 
                                                 <tbody> 
                                                 	<tr>
                                                    	<td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>
                                                        <div class="btn-group"> 
                                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Click Here</a> 
                                                        <ul class="dropdown-menu pull-right"> 
                                                        <li><a href="#">Edit</a></li> <li><a href="#">Delete</a></li> 
                                                        </ul> </div>
                                                         </td>
                                                    </tr>
                                                    <tr>
                                                    	<td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>
                                                        <div class="btn-group"> 
                                                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">Clixk Here</a> 
                                                        <ul class="dropdown-menu pull-right"> 
                                                        <li><a href="#">Edit</a></li> <li><a href="#">Delete</a></li> 
                                                        </ul> </div>
                                                        </td>
                                                    </tr>
                                                 </tbody> 
                                            </table> 
                                        </div> 
                                    </section> 
                                </div> 
                            </div> 
                        </section> 
                    </section>
    
                </section> 
          <?php include'footer.php' ?>