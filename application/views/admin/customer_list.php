
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
                        <header class="panel-heading"> Customer Master List <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> <div class="pull-right">
                                <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/admin/new_customer">Add New Customer</a></div>
                            <div class="clearfix"></div>
                        </header> 
                        <div class="table-responsive"> 
                            <table class="table table-striped m-b-none datatable"> 
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
                                    <?php foreach ($customers as $customer) { ?>
                                        <tr>
                                            <td><?php echo $customer->cust_ref; ?></td>
                                            <td><?php echo $customer->cust_name; ?></td>
                                            <td><?php echo $customer->contact_name; ?></td>
                                            <td><?php echo $customer->cust_email; ?></td>
                                            <td><?php echo $customer->contact_no; ?></td>
                                            <td>
                                                <div class="btn-group"> 
                                                    <a href="<?php echo base_url(); ?>index.php/admin/edit_customer/<?php echo $customer->cust_id; ?>">Edit</a>/
                                                    <a href="<?php echo base_url(); ?>index.php/admin/delete_customer/<?php echo $customer->cust_id; ?>">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table> 
                        </div> 
                    </section> 
                </div> 
            </div> 
        </section> 
    </section>

</section> 
