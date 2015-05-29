<div class="dialog_con1">

    <div class="row">

        <div class="col-lg-6">

            <h3>JOB Details</h3>
            <form accept-charset="utf-8" method="post" action="<?php echo base_url('admin/view_job_info'); ?>">

                <table class="table1">

                    <tr><td><?php
                            echo 'Job Ref No / Date';
                            ?> :</td>

                        <td><input type="hidden" id="ord_id" value="<?php echo $user[0]['ord_id']; ?>" name="ord_id">

                            <?php                            //print_r($updates);
                            echo $updates[0]->order_code;
                            ?> / <?php echo $updates[0]->ord_dt; ?>

                        </td></tr>

                    <tr><td><?php echo 'Customer Name'; ?> :</td> <td><?php echo $customer[0]->cust_name; ?></td></tr>



                    <tr><td><?php echo 'Due Date & Time'; ?> :</td> <td> <?php echo $updates[0]->ship_by_date; ?></td></tr>



                    <tr><td><?php echo 'Mode of Shipment'; ?> :</td> <td> <?php echo $updates[0]->ship_by_date; ?></td></tr>



                    <tr><td><?php echo 'Priority'; ?> :</td> <td> <?php if ($jobs[0]->job_priority == 2) { ?><img src="<?php echo base_url('/assets/images/high-pri.png'); ?>">

                            <?php } else if ($jobs[0]->job_priority == 1) { ?><img src="<?php echo base_url('/assets/images/medium-pri.png'); ?>">

                            <?php } else { ?> <img src="<?php echo base_url('/assets/images/low-pri.png'); ?>"> <?php } ?></td></tr>



                    <tr><td><?php echo 'Tooling'; ?> :</td> <td> <?php if ($jobs[0]->job_tooling == 1) { ?><img src="<?php echo base_url('/assets/images/low-pri.png'); ?>"> <?php } ?></td></tr>



                    <tr><td><?php echo 'JOB Status'; ?> :</td> <td> <?php
                            if ($jobs[0]->job_status == -1) {
                                echo 'Cancelled';
                            } else if ($jobs[0]->job_status == 1) {
                                echo 'Pending';
                            }
                            ?></td></tr>



                    <tr><td colspan="2"><?php echo $jobs[0]->job_remarks; ?></td></tr>

<!--                    <tr><td style="border:none;">
                    <tr><td style="border:none;">
                            <label class=" control-label" for="update_type">Update type</label></td> <td style="border:none;"><select class="form-control" name="update_type">
                                <option value="0">Update Remarks</option>
                                <option value="1">Cancel Order</option>
                                <option value="2">Reset Order</option>
                            </select>
                        </td></tr>
 <tr><td colspan="2" style="border:none;">
                    <textarea id="update_remarks" rows="3" cols="40" name="update_remarks"></textarea> </td></tr>-->
<!--                    <tr><td colspan="2" style="border:none;">
                            <input type="submit" class="btn btn-success" value="Update" name="submit">
                        </td></tr>-->

                </table>
                <!--</form>-->
        </div>





        <div class="col-lg-6">

            <h3>JOB History</h3>

            <table class="table1">

                <?php
                // print_r($user); 

                foreach ($user as $update) {
                    ?>

                    <tr><td><?php echo $update['update_remarks']; ?> by </td>     <td> <?php echo $update['usr_name']; ?> </td></tr>



                <?php }
                ?></table>

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