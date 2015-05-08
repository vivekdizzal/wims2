<div class="dialog_con1">
    <div class="row">
        <div class="col-lg-6">
            <h3>JOB PRIORITY - Updates</h3>
            <?php
            echo form_open('admin/update_priority');
            ?><table class="table1">
                <tr><td><?php
                        echo 'Ref No / Due Date';
                        ?> :</td><td>
                        <?php
                        echo form_input(array('id' => 'job_id', 'type' => 'hidden', 'name' => 'job_id', 'value' => $jobs[0]->job_id));
                        echo $jobs[0]->job_id;
                        ?> / <?php echo $jobs[0]->job_date; ?></td></tr>
                <tr><td>
                        <?php echo 'Customer Name'; ?> : </td><td><?php echo $customer[0]->cust_name; ?></td></tr>
                <tr><td>
                        <?php echo 'Due Date & Time'; ?> : </td><td> <?php echo $jobs[0]->due_date; ?></td></tr>

                <tr><td><?php echo 'Priority'; ?> : </td><td> <?php
                        // echo form_label('Priority', 'job_priority', array('class' => 'col-sm-4 control-label', 'label' => false ));
                        $options = array(
                            '0' => 'Priority',
                            '1' => 'Normal',
                            '2' => 'High Priority',
                        );
                        echo form_dropdown('job_priority', $options, '', 'class = "form-control"');
                        ?></td></tr>

                <tr><td colspan="2" style="border:none;"><?php echo 'Remarks'; ?></td></tr>

                <tr><td colspan="2" style="border:none;"><?php echo form_textarea(array('id' => 'update_remarks', 'name' => 'update_remarks', 'rows' => '3')); ?></td></tr>

                <tr><td colspan="2" style="border:none;"> <?php echo form_submit(array('name' => 'submit', 'class' => 'btn btn-success', 'value' => 'Update')); ?></td></tr>
            </table>
            <?php echo form_close(); ?>
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

