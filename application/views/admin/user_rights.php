	
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
<header class="panel-heading font-bold">User Rights</header>
<div class="panel-body">
<div class="col-lg-8">
<?php //print_r($usr_id);
if(!empty($givenright)) {
$given = array();
    foreach ($givenright['user'] as $givn) {
        array_push($given, $givn["sm_id"]);
    } 
    echo form_open('admin/update_rights',array('id' => 'update_rights', 'class' => 'form-horizontal'));
    
   // echo form_input(array('id' => 'usr_id','type' => 'hidden','name' => 'usr_id', 'value' => $usr_id));
    foreach ($rights as $right) {

    if (in_array($right->sm_index, $given)) {
        $checked = TRUE;
    } else {
        $checked = '';
    }echo form_input(array('id' => 'usr_id','type' => 'hidden','name' => 'usr_id', 'value' => $usr_id));
	?>
   <div class="col-sm-4">
   <?php
     echo form_input(array('id' => 'mm_id','type' => 'hidden','name' => 'mm_id', 'value' => $givn['mm_id']));
    echo form_checkbox('sm_id[]', $right->sm_index, $checked);
	 echo form_label($right->sm_name);
	 ?>
	 </div>
	 <?php
} ?>
<div class="col-sm-12">
<?php
echo form_submit(array( 'name' => 'submit','class' => 'btn btn-success pull-right', 'value' => 'Submit'));
?>
</div>
<?php 
echo form_close();
} else { 
    echo form_open('admin/update_rights',array('id' => 'update_rights', 'class' => 'form-horizontal'));
   // print_r($rights);
   // echo form_input(array('id' => 'usr_id','type' => 'hidden','name' => 'usr_id', 'value' => $usr_id));
    foreach ($rights as $right) {

    echo form_input(array('id' => 'usr_id','type' => 'hidden','name' => 'usr_id', 'value' => $usr_id));
    echo form_input(array('id' => 'mm_id','type' => 'hidden','name' => 'mm_id', 'value' => $givn['mm_id']));
	?>
   <div class="col-sm-4">
   <?php
     echo form_input(array('id' => 'mm_id','type' => 'hidden','name' => 'mm_id', 'value' => ''));
    echo form_checkbox('sm_id[]', $right->sm_index);
	 echo form_label($right->sm_name);
	 ?>
	 </div>
	 <?php
} ?>
<div class="col-sm-12">
<?php
echo form_submit(array( 'name' => 'submit','class' => 'btn btn-success pull-right', 'value' => 'Submit'));
?>
</div>
<?php 
echo form_close();
}
?>
</div>
</div>
</section>
</div>
</div>
</section>
</section>
</section>
