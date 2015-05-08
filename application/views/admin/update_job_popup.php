<div class="dialog_con1">
<div class="row">
<div class="col-lg-6">
<h3>JOB Details</h3>
<?php
echo form_open('admin/update_job');
?><table class="table1">
<tr><td><?php
echo 'Job Ref No / Date';

?> :</td>
<td>
<?php  echo form_input(array('id' => 'job_id','type' => 'hidden','name' => 'job_id', 'value' => $jobs[0]->job_id));
echo $jobs[0]->job_id; ?> / <?php echo $jobs[0]->job_date; ?>
</td></tr>
<tr><td><?php echo 'Customer Name'; ?> :</td> <td><?php echo $customer[0]->cust_name; ?></td></tr>

<tr><td><?php echo 'Due Date & Time'; ?> :</td> <td> <?php echo $jobs[0]->job_date; ?></td></tr>

<tr><td><?php echo 'Mode of Shipment'; ?> :</td> <td> <?php echo $jobs[0]->job_date; ?></td></tr>

<tr><td><?php echo 'Priority'; ?> :</td> <td> <?php if($jobs[0]->job_priority == 2) {?><img src="<?php echo base_url('/assets/images/high-pri.png');?>">
    <?php } else if($jobs[0]->job_priority == 1) {?><img src="<?php echo base_url('/assets/images/medium-pri.png');?>">
    <?php } else { ?> <img src="<?php echo base_url('/assets/images/low-pri.png');?>"> <?php } ?></td></tr>
    
 <tr><td><?php echo 'Tooling'; ?> :</td> <td> <?php if($jobs[0]->job_tooling == 1) {?><img src="<?php echo base_url('/assets/images/low-pri.png');?>"> <?php } ?></td></tr>

  <tr><td><?php echo 'JOB Status'; ?> :</td> <td> <?php if($jobs[0]->job_tooling == 1) { echo 'Completed';}  else {echo 'Pending';}?></td></tr>

  <tr><td colspan="2"><?php echo $jobs[0]->job_remarks; ?></td></tr>
  <tr><td style="border:none;">
<?php
    echo form_label('Update type', 'update_type', array('class' => ' control-label'));?></td> <td style="border:none;"><?php
    $options = array(
        '0' => 'Update Remarks',
        '1' => 'Cancel Order',
        '2' => 'Reset Order',
    );
    echo form_dropdown('update_type', $options, '', 'class = "form-control"','id = "update_type"');?></td></tr><tr><td colspan="2" style="border:none;"><?php
  echo form_textarea(array('id' => 'update_remarks', 'name' => 'update_remarks', 'rows' =>'3')); ?></td></tr>
<tr><td colspan="2" style="border:none;">
    <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success', 'value' => 'Update')); ?></td></tr>
	</table>
    <?php echo form_close(); ?>

	</div>


<div class="col-lg-6">
    <h3>JOB History</h3>
    <table class="table1">
 <?php // print_r($user); 
  foreach($user as $update) {
     ?>
<tr><td><?php echo $update['update_to'] ; ?> by<br><span style="color:red;"><?php echo $update['update_remarks'];?><span> </td><td> <?php echo $update['usr_name'];?> </td></tr>
     
     <?php
 } ?></table>
 </div>
 </div>


</div>
<style>
.table1 td {
    border-bottom: 1px solid #e0e4e8;
    font-size: 12px;
    padding: 6px 0;
    width: 50%;
}
</style>