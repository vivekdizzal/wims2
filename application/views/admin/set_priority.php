<div class="dialog_con1">

    <div class="row">

        <div class="col-lg-6">

            <h3>JOB PRIORITY - Updates</h3>


            <form accept-charset="utf-8" method="post" action="set_priority">
                <table class="table1">

                    <tr><td><?php
                            echo 'Ref No / Due Date';
                            ?> :</td><td> <input type="hidden" id="job_id" value="<?php echo $jobs[0]->job_id; ?>" name="job_id">

                            <?php
                            echo $jobs[0]->job_id;
                            ?> / <?php echo $jobs[0]->job_date; ?></td></tr>

                    <tr><td>

                            <?php echo 'Customer Name'; ?> : </td><td><?php echo $customer[0]->cust_name; ?></td></tr>

                    <tr><td>

                            <?php echo 'Due Date & Time'; ?> : </td><td> <?php echo $jobs[0]->due_date; ?></td></tr>

                    <tr><td>Priority : </td><td> <select class="form-control" name="job_priority">
                                <option value="0">Priority</option>
                                <option value="1">Normal</option>
                                <option value="2">High Priority</option>
                            </select>
                        </td></tr>

                    <tr><td colspan="2" style="border:none;"><?php echo 'Remarks'; ?></td></tr>



                    <tr><td colspan="2" style="border:none;"><textarea id="update_remarks" rows="3" cols="40" name="update_remarks"></textarea></td></tr>



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
    ?><tr><td><?php echo $update['update_to']; ?> by <br><span style="color:red;"><?php echo $update['update_remarks']; ?><span> </td><td><?php echo $update['usr_name']; ?> </td></tr>

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



