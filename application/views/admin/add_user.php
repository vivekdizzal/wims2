	
	<section id="pjax-container" class="scrollable"><section class="vbox">
	<header> 
                        <div class="row b-b m-l-none m-r-none"> 
                            <div class="col-sm-4"> 
                                <h3 class="m-t m-b-none">Welcome to WIMS</h3> 
                                <p class="block text-muted"></p> 
                            </div> 
                        </div> 
                    </header>
	<section class="wrapper">
	<div class="row">
	<div class="col-sm-12">
<section class="panel">
<header class="panel-heading font-bold">Create Customer Account <div class="pull-right"><a href="<?php echo base_url(); ?>index.php/admin/user_list" class="btn btn-success">Users List</a></div>
        <div class="clearfix"></div>
    </header></header>
<div class="panel-body">
<?php
echo form_open_multipart('', array('id' => 'add_user', 'class' => 'm-b-sm form-horizontal'));
?> <div class="col-lg-6">
	<div class="form-group"><?php
    echo form_label('Username', 'username', array('class' => 'col-sm-4 control-label'));?>
	<div class="col-sm-8">
	<?php
    echo form_input(array('id' => 'usr_name','name' => 'usr_name', 'class' => 'validate[required] form-control'));
    ?>
	</div>
</div>
<div class="form-group"><?php
    echo form_label('Login Username', 'logname', array('class' => 'col-sm-4 control-label'));?>
	<div class="col-sm-8">
	<?php
    echo form_input(array('id' => 'usr_logname','name' => 'usr_logname', 'class' => 'validate[required] form-control'));
    ?></div> </div>
	<div class="form-group"><?php
    echo form_label('Password', 'password', array('class' => 'col-sm-4 control-label'));?>
	<div class="col-sm-8">
	<?php
    echo form_password(array('id' => 'usr_logpwd','name' => 'usr_logpwd', 'class' => 'validate[required] form-control'));
    ?></div> </div>
	<div class="form-group"><?php echo form_label('Usertype', 'usr_type', array('class' => 'col-sm-4 control-label'));
    $options = array(
                  '1'  => 'WIMS Admin',
                  '2'    => 'WIMS CAD User',
                  '3'   => 'WIMS User',
                  );
				  ?>
	<div class="col-sm-8">
	<?php
        echo form_dropdown('usr_type', $options, '', 'class = "form-control"');?>
        <?php //echo form_input(array('id' => 'usr_type','name' => 'usr_type', 'class' => 'validate[required]'));
        ?> </div>
		</div>
		
		<div class="form-group"><?php
        echo form_label('User Designation', 'userdesignation', array('class' => 'col-sm-4 control-label')); ?>
	<div class="col-sm-8">
	<?php
        echo form_input(array('id' => 'usr_designation','name' => 'usr_designation', 'class' => 'validate[required] form-control'));
        ?></div> 
		</div>
		<div class="form-group"><?php
        echo form_label('User Mobile', 'usermobile', array('class' => 'col-sm-4 control-label')); ?>
	<div class="col-sm-8">
	<?php
        echo form_input(array('id' => 'usr_mobile','name' => 'usr_mobile', 'class' => 'validate[required] form-control'));
        ?> </div>
		</div>
		<div class="form-group"><?php
        echo form_label('User Email', 'useremail', array('class' => 'col-sm-4 control-label')); ?>
	<div class="col-sm-8">
	<?php
        echo form_input(array('id' => 'usr_email','name' => 'usr_email', 'class' => 'form-control validate[required,custom[email]'));
        ?> </div>
		</div>
		<div class="form-group"><?php
        echo form_label('User City', 'usercity', array('class' => 'col-sm-4 control-label')); ?>
	<div class="col-sm-8">
	<?php
        echo form_input(array('id' => 'usr_city','name' => 'usr_city', 'class' => 'form-control validate[required]'));
        ?> </div>
		</div>
		<div class="form-group"><?php
        echo form_label('User Photo', 'userphoto', array('class' => 'col-sm-4 control-label')); ?>
	<div class="col-sm-8">
	<?php
        echo form_upload(array('id' => 'usr_photo','name' => 'usr_photo', 'class' => 'form-control validate[required]'));
        ?> </div></div>
		</div>
		
		<div class="col-sm-8">
		<div class="form-group"><?php
        echo form_submit(array( 'name' => 'submit','class' => 'btn btn-success pull-right', 'value' => 'Submit'));
       
        ?></div>
		</div>
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
        $("#add_user").validationEngine();
    });
</script>