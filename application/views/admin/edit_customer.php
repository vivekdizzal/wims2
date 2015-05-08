
<section class="scrollable" id="pjax-container"> 
    <header> 
        <div class="row b-b m-l-none m-r-none"> 
            <div class="col-sm-4"> 
                <h3 class="m-t m-b-none">Welcome to WIMS</h3> 
                <p class="block text-muted"></p> 
            </div> 
        </div> 
    </header> 
    <header class="panel-heading"> <div class="pull-right"><a href="<?php echo base_url(); ?>index.php/admin/customer_list" class="btn btn-success">Customer's List</a></div>
        <div class="clearfix"></div>
    </header>
    <section class="vbox"> 
        <section class="wrapper">
            <div class="row"> 
                <div class="col-sm-8"> 
                    <section class="panel"> 

                        <header class="panel-heading font-bold">Edit Customer Account</header> 
                        <div class="panel-body"> <?php echo form_open('admin/update_customer', array('id' => 'edit_customer', 'class' => 'form-horizontal')); ?> 
                            <?php echo form_input(array('id' => 'cust_id', 'type' => 'hidden', 'name' => 'cust_id', 'value' => $customer['cust_id'])); ?>
                            <div class="form-group"> <?php echo form_label('Customer / Company Name *', 'cust_name', array('class' => 'col-sm-4 control-label')); ?>
                                <div class="col-sm-8"> <?php echo form_input(array('id' => 'cust_name', 'name' => 'cust_name', 'class' => 'form-control validate[required]', 'value' => $customer['cust_name'])); ?>  </div>
                            </div>
                            <div class="form-group"> <?php echo form_label('Customer Ref. No *', 'cust_ref', array('class' => 'col-sm-4 control-label')); ?>
                                <div class="col-sm-8"> <?php echo form_input(array('id' => 'cust_ref', 'name' => 'cust_ref', 'class' => 'form-control validate[required,custom[integer]]', 'value' => $customer['cust_ref'])); ?>  </div>
                            </div>
                            <div class="form-group"> <?php echo form_label('Contact Person', 'contact_name', array('class' => 'col-sm-4 control-label')); ?> 
                                <div class="col-sm-8"> <?php echo form_input(array('id' => 'contact_name', 'name' => 'contact_name', 'class' => 'form-control', 'value' => $customer['contact_name'])); ?>  </div>
                            </div>
                            <div class="form-group"> <?php echo form_label('Contact No', 'contact_no', array('class' => 'col-sm-4 control-label')); ?> 
                                <div class="col-sm-8"> <?php echo form_input(array('id' => 'contact_no', 'name' => 'contact_no', 'class' => 'form-control', 'value' => $customer['contact_no'])); ?>  </div>
                            </div>
                            <div class="form-group"> <?php echo form_label('Email ID ', 'cust_email', array('class' => 'col-sm-4 control-label')); ?>
                                <div class="col-sm-8"> <?php echo form_input(array('id' => 'cust_email', 'name' => 'cust_email', 'class' => 'form-control validate[required,custom[email]]', 'value' => $customer['cust_email'])); ?>  </div>
                            </div>
                            <div class="form-group"> <?php echo form_label('Address / City', 'cust_city', array('class' => 'col-sm-4 control-label')); ?>
                                <div class="col-sm-8"> <?php echo form_input(array('id' => 'cust_city', 'name' => 'cust_city', 'class' => 'form-control validate[required]', 'value' => $customer['cust_city'])); ?>  </div>
                            </div>
                            <div class="col-sm-3 pull-right">
                                <?php
                                echo form_submit(array('name' => 'submit', 'class' => 'btn btn-sm btn-default pull-left', 'value' => 'Submit'));
                                echo form_input(array('type' => 'button','name' => 'cancel','id' => 'cancel','class' => 'btn btn-sm btn-default pull-left', 'value' => 'Cancel'));
                                ?></div>
                            <?php
                            echo form_close();
                            ?>

                        </div> 
                    </section> 
                </div>  
            </div>
        </section> 
    </section>
</section> 

<script>
    $(document).ready(function () {
        $("#edit_customer").validationEngine();
        
        $('#cancel').click(function(){
   window.location.href='<?php echo base_url('index.php/admin/customer_list'); ?>';
})
    });
</script>
