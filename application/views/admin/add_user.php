	
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
    </header>
<div class="panel-body">
<form accept-charset="utf-8" method="post" enctype="multipart/form-data" class="m-b-sm form-horizontal" id="add_user" action="add_user">
 <div class="col-lg-6">
	<div class="form-group"><label class="col-sm-4 control-label" for="username">Username</label>	<div class="col-sm-8">
	<input type="text" class="validate[required] form-control" id="usr_name" value="" name="usr_name">
	</div>
</div>
<div class="form-group"><label class="col-sm-4 control-label" for="logname">Login Username</label>	<div class="col-sm-8">
	<input type="text" class="validate[required] form-control" id="usr_logname" value="" name="usr_logname">
</div> </div>
	<div class="form-group"><label class="col-sm-4 control-label" for="password">Password</label>	<div class="col-sm-8">
	<input type="password" class="validate[required] form-control" id="usr_logpwd" value="" name="usr_logpwd">
</div> </div>
	<div class="form-group"><label class="col-sm-4 control-label" for="usr_type">Usertype</label>	<div class="col-sm-8">
	<select class="form-control" name="usr_type">
<option value="1">WIMS Admin</option>
<option value="2">WIMS CAD User</option>
<option value="3">WIMS User</option>
</select>
         </div>
		</div>
		
		<div class="form-group"><label class="col-sm-4 control-label" for="userdesignation">User Designation</label>	<div class="col-sm-8">
	<input type="text" class="validate[required] form-control" id="usr_designation" value="" name="usr_designation">
</div> 
		</div>
		<div class="form-group"><label class="col-sm-4 control-label" for="usermobile">User Mobile</label>	<div class="col-sm-8">
	<input type="text" class="validate[required] form-control" id="usr_mobile" value="" name="usr_mobile">
 </div>
		</div>
		<div class="form-group"><label class="col-sm-4 control-label" for="useremail">User Email</label>	<div class="col-sm-8">
	<input type="text" class="form-control validate[required,custom[email]" id="usr_email" value="" name="usr_email">
 </div>
		</div>
		<div class="form-group"><label class="col-sm-4 control-label" for="usercity">User City</label>	<div class="col-sm-8">
	<input type="text" class="form-control" id="usr_city" value="" name="usr_city">
 </div>
		</div>
		<div class="form-group"><label class="col-sm-4 control-label" for="userphoto">User Photo</label>	<div class="col-sm-8">
	<input type="file" class="form-control validate[required]" id="usr_photo" name="usr_photo">
 </div></div>
		</div>
		
		<div class="col-sm-8">
		<div class="form-group"><input type="submit" class="btn btn-success pull-right notification_message" value="Submit" name="submit">
</div>
		</div>
</form>
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