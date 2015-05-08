	
	<section id="pjax-container" class="scrollable"><section class="vbox">
	<header> 
                        <div class="row b-b m-l-none m-r-none"> 
                            <div class="col-sm-4"> 
                                <h3 class="m-t m-b-none">WIMS</h3> 
                                <p class="block text-muted"></p> 
                            </div> 
                        </div> 
                    </header>
	<section class="wrapper">
	<div class="row">
	<div class="col-sm-12">
<section class="panel">
<header class="panel-heading font-bold">Edit Customer Account</header>
<div class="panel-body">
    <?php
echo form_open_multipart('admin/update_profile', array('id' => 'edit_user', 'class' => 'm-b-sm form-horizontal'));
?> <div class="col-lg-6">
	<div class="form-group"><?php
    echo form_input(array('id' => 'usr_id','type' => 'hidden','name' => 'usr_id', 'value' => $profile['usr_id']));
    echo form_label('Username', 'username', array('class' => 'col-sm-4 control-label'));?>
	<div class="col-sm-8">
	<?php
    echo form_input(array('id' => 'usr_name','name' => 'usr_name', 'value' => $profile['usr_name'], 'class' => 'validate[required] form-control'));
    ?>
	</div>
	</div>
	<div class="form-group"><?php
    echo form_label('Login Username', 'logname', array('class' => 'col-sm-4 control-label'));?>
	<div class="col-sm-8">
	<?php
    echo form_input(array('id' => 'usr_logname','name' => 'usr_logname', 'value' => $profile['usr_logname'], 'class' => 'validate[required] form-control'));
    ?></div> 
	</div>
	<div class="form-group"><?php
    echo form_label('Password', 'password', array('class' => 'col-sm-4 control-label'));?>
	<div class="col-sm-8">
	<?php
    echo form_password(array('id' => 'usr_logpwd','name' => 'usr_logpwd', 'value' => $profile['usr_logpwd'], 'class' => 'validate[required] form-control'));
    ?>
	</div> 
	</div>
	<div class="form-group"><?php
        echo form_label('Usertype', 'usertype', array('class' => 'col-sm-4 control-label'));?>
	<div class="col-sm-8">
	<?php $options = array(
                  '1'  => 'WIMS Admin',
                  '2'    => 'WIMS CAD User',
                  '3'   => 'WIMS User',
                  );
        echo form_dropdown('usr_type', $options, $profile['usr_type'], array('class' => 'form-control'));?>
       
    </div>
	</div>
	<div class="form-group"><?php
	echo form_label('User Designation', 'userdesignation', array('class' => 'col-sm-4 control-label'));?>
	<div class="col-sm-8">
	<?php
	echo form_input(array('id' => 'usr_designation','name' => 'usr_designation', 'value' => $profile['usr_designation'], 'class' => 'validate[required] form-control'));
	?>
	</div> 
	</div>
	<div class="form-group"><?php
    echo form_label('User Mobile', 'usermobile', array('class' => 'col-sm-4 control-label'));?>
	<div class="col-sm-8">
	<?php
    echo form_input(array('id' => 'usr_mobile','name' => 'usr_mobile', 'value' => $profile['usr_mobile'], 'class' => 'validate[required] form-control'));
    ?> 
	</div>
	</div>
	<div class="form-group"><?php
	echo form_label('User Email', 'useremail', array('class' => 'col-sm-4 control-label'));?>
	<div class="col-sm-8">
	<?php
	echo form_input(array('id' => 'usr_email','name' => 'usr_email', 'value' => $profile['usr_email'], 'class' => 'validate[requiredcustom[email] form-control'));
	?> 
	</div>
	</div>
	<div class="form-group"><?php
	echo form_label('User City', 'usercity', array('class' => 'col-sm-4 control-label'));?>
	<div class="col-sm-8">
	<?php
	echo form_input(array('id' => 'usr_city','name' => 'usr_city', 'value' => $profile['usr_city'], 'class' => 'validate[required] form-control'));
	?> 
	</div>
	</div>
	<div class="form-group"><?php
	echo form_label('User Photo', 'userphoto', array('class' => 'col-sm-4 control-label'));?>
	<div class="col-sm-8">
	<?php
	echo form_upload(array('id' => 'usr_photo','name' => 'usr_photo', 'value' => $profile['usr_photo'], 'class' => 'form-control'));
	if(!empty($profile['usr_photo'])) { ?> <img width="100" height="120" src="<?php echo base_url(); ?>upload/<?php echo $profile['usr_photo']; ?> "><?php } ?>
	</div>
	</div>
	</div>
	<div class="col-sm-8">
	<div class="form-group"><?php
	echo form_submit(array( 'name' => 'submit','class' => 'btn btn-success pull-right', 'value' => 'Update'));
   
	?>
	</div>
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
        $("#edit_user").validationEngine();
    });
</script>