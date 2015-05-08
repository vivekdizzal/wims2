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
                                        <header class="panel-heading">
                                            	<div class="col-lg-12 pull-left">
                                                    <div class="col-lg-3">
                                                    <form role="form" class="form-horizontal"> 
                                                        <div class="form-group"> 
                                                            <label for="input-id-1" class="col-sm-4 control-label">From :</label> 
                                                            <div class="col-sm-8"> <input type="text" data-date-format="dd-mm-yyyy" value="12-02-2013" size="16" class="input-sm datepicker-input form-control"> </div> 
                                                        </div> 
                                                    </form>
                                                    </div>
                                                    <div class="col-lg-3">
                                                    <form role="form" class="form-horizontal"> 
                                                        <div class="form-group"> 
                                                            <label for="input-id-1" class="col-sm-4 control-label">To :</label> 
                                                            <div class="col-sm-8"> <input type="text" data-date-format="dd-mm-yyyy" value="12-02-2013" size="16" class="input-sm datepicker-input form-control"> </div> 
                                                        </div> 
                                                    </form>
                                                    </div>
                                                    <div class="col-lg-3">
                                                    <form role="form" class="form-horizontal"> 
                                                        <div class="form-group"> 
                                                            <label for="input-id-1" class="col-sm-4 control-label">View :</label> 
                                                             <div class="col-sm-8"> 
                                                                 <select class="day form-control" style="width: auto;">
                                                                 	<option value="Pending Jobs">Pending Jobs</option>
                                                                  </select> 
                                                              </div> 
                                                        </div> 
                                                    </form>
                                                    </div>
                                                    <div class="col-lg-3">
                                                    	<a href="new_customer.php" class="btn btn-success">Expert</a>
                                                    </div>
                                                </div>
                                            <div class="clearfix"></div> 
                                        </header> 
                                        <div class="table-responsive"> 
                                            <table class="table table-striped m-b-none" data-ride="datatables"> 
                                                <thead> 
                                                    <tr> 
                                                        <th width="">Priority</th> 
                                                        <th width="">Tooling</th> 
                                                        <th width="">Ref No</th> 
                                                        <th width="">Order Date</th> 
                                                        <th width="">Customer Name</th> 
                                                        <th width="">Due Date</th> 
                                                        <th>Mode of Shipment</th>
                                                        <th width="">Job Status</th> 
                                                    </tr> 
                                                 </thead> 
                                                 <tbody> 
                                                 	<tr>
                                                    	<td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                    </tr>
                                                    <tr>
                                                    	<td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
                                                        <td>Test</td>
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