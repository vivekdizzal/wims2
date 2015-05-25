<div class="dialog_con1">

    <div class="row">

        <div class="col-lg-6">

            <h3>JOB PRIORITY - Updates</h3>


            <form accept-charset="utf-8" method="post" action="<?php echo base_url('admin/set_priority'); ?>">
                <table class="table1">

                    <tr><td><?php
                            echo 'Ref No / Due Date';
                            ?> :</td><td> <input type="hidden" id="job_id" value="<?php echo $jobs[0]->job_id; ?>" name="job_id">
                            <input type="hidden" id="ord_id" value="<?php echo $jobs[0]->ord_id; ?>" name="ord_id">

                            <?php
                            echo $jobs[0]->job_id;
                            ?> / <?php echo $jobs[0]->job_date; ?></td></tr>

                    <tr><td>

                            <?php echo 'Customer Name'; ?> : </td><td><?php echo $customer[0]->cust_name; ?></td></tr>

                    <tr><td>

                            <?php echo 'Due Date & Time'; ?> : </td><td> <?php echo $jobs[0]->due_date; ?></td></tr>
                    <?php if ($jobs[0]->job_priority == 1) ; ?>
                    <tr><td>Priority : </td><td> <select class="form-control" name="job_priority">
                                <option value="0" <?php if ($jobs[0]->job_priority == 0) {
                        echo "selected";
                    } ?>>Priority</option>
                                <option value="1" <?php if ($jobs[0]->job_priority == 1) {
                        echo "selected";
                    } ?>>Normal</option>
                                <option value="2" <?php if ($jobs[0]->job_priority == 2) {
                        echo "selected";
                    } ?>>High Priority</option>
                            </select>
                        </td></tr>

                    <tr><td colspan="2" style="border:none;"> <input type="submit" class="btn btn-success" value="Update" name="submit"></td></tr>

                </table>

            </form>

        </div>

        <div class="col-lg-6">

            <h3>JOB History</h3>

            <table class="table1">

                <?php
// print_r($user); 

                foreach ($user as $update) {
                    ?><tr><td><?php echo $update['update_remarks']; ?> by</td><td><?php echo $update['usr_name']; ?> </td></tr>

<?php }
?></table>

        </div>

    </div>



    <style>

        .table1 td {

            border-bottom: 1px solid #e0e4e8;

            font-size: 12px;

            padding: 6px 0;

            width: 50%;

        }

        .table1 {

            width: 98%;

        }

    </style>



