<section class="scrollable" id="pjax-container"> 
    <header> 
        <div class="row b-b m-l-none m-r-none"> 
            <div class="col-sm-4"> 
                <h3 class="m-t m-b-none">Welcome to WIMS</h3> 
                <p class="block text-muted"></p> 
            </div> 
        </div> 
    </header> 
    <section class="vbox"> 
        <section class="wrapper"> 
            <header class="bg-light"> 
                <?php $this->view('order/order_header'); ?>
            </header> 
            <div class="tab-content"> 
                <div class="tab-pane active" id="tab1">
                    <section class="panel">
                        <div class="table-responsive"> 
                            <table class="table table-striped datatable m-b-none"> 
                                <thead> 
                                    <tr> 
                                        <th width="">Priority</th>
                                        <th width="">Tooling</th>
                                        <th width="">Due Date</th> 
                                        <th width="">Ref #</th> 
                                        <th width="">Company</th> 
                                        <th width="">Contact</th> 
                                        <th width="">Designer</th> 
                                        <th width="">Status</th> 
                                        <th width="">Notes</th> 
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    <?php if (!empty($high)  && $high[0]['job_status'] != '-1') { ?>
                                        <tr class="high">
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                        </tr>
                                        <?php
                                        foreach ($high as $order) {
                                            ?>
                                            <tr>
                                                <td><a data-item-id="<?php echo $order['job_id']; ?>" href="#" data-priority="high1" class="prioritypop button"><img src="<?php echo base_url('/assets/images/high-pri.png'); ?>"></a></td>
                                                <td> <div class="job_tooling btn" data-item-id="<?php echo $order['job_id']; ?>" data-tooling="<?php echo $order['job_tooling']; ?>">
                                                        <?php if ($order['job_tooling'] == 1) { ?>
                                                            <a href="#" data-priority="high1" class="tooling button">
                                                                <img src="<?php echo base_url('/assets/images/low-pri.png'); ?>">
                                                            </a>
                                                        <?php } ?>
                                                    </div></td>
                                                <td><?php echo $order['due_date']; ?></td>
                                                <td><a data-item-id="<?php echo $order['job_id']; ?>" href="#" data-priority="high1" class="jobinfo button"><?php echo $order['job_code']; ?></a></td>
                                                <td><?php echo $order['cust_name']; ?></td>
                                                <td><?php
                                                    echo $order['contact_name'];
                                                    echo $order['contact_no'];
                                                    ?></td>
                                                <td><?php echo $order['due_date']; ?></td>
                                                <td><?php if($order['job_status'] == '1') {echo "Working";} 
                                                else if($order['job_status'] == '0'){echo 'Hold';} 
                                                else {echo 'Cancelled';}?></td>
                                                <td><?php echo $order['job_remarks']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } if (!empty($medium)  && $medium[0]['job_status'] != '-1') {
                                        ?>
                                        <tr class="medium"> <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                        </tr>
                                        <?php foreach ($medium as $med) { ?>
                                            <tr>
                                                <td><a data-item-id="<?php echo $med['job_id']; ?>" href="#" data-priority="medium1" class="prioritypop button"><img src="<?php echo base_url('/assets/images/medium-pri.png'); ?>"></a></td>
                                                <td> <div class="job_tooling btn" data-item-id="<?php echo $med['job_id']; ?>" data-tooling="<?php echo $med['job_tooling']; ?>">
                                                        <?php if ($order['job_tooling'] == 1) { ?>
                                                            <a href="#" data-priority="high1" class="tooling button">
                                                                <img src="<?php echo base_url('/assets/images/low-pri.png'); ?>">
                                                            </a>
                                                        <?php } ?>
                                                    </div></td>
                                                <td><?php echo $med['due_date']; ?></td>
                                                <td><a data-item-id="<?php echo $med['job_id']; ?>" href="#" data-priority="medium1" class="jobinfo button"><?php echo $med['job_code']; ?></a></td>
                                                <td><?php echo $med['cust_name']; ?></td>
                                                <td><?php
                                                    echo $med['contact_name'];
                                                    echo $med['contact_no'];
                                                    ?></td>
                                                <td><?php echo $med['job_id']; ?></td>
                                                <td><?php if($med['job_status'] == '1') {echo "Working";} 
                                                else if($med['job_status'] == '0'){echo 'Hold';} 
                                                else {echo 'Cancelled';}?></td>
                                                <td><?php echo $med['job_remarks']; ?></td></tr>
                                            <?php
                                        }
                                    } if (!empty($low)  && $low[0]['job_status'] != '-1') {
                                        ?> 

                                        <tr class="low">
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                        <?php foreach ($low as $lowprio) { ?>
                                            <tr>
                                                <td><a data-item-id="<?php echo $lowprio['job_id']; ?>" href="#" data-priority="low1" class="prioritypop button"><img src="<?php echo base_url('/assets/images/low-pri.png'); ?>"></a></td>
                                                <td> <div class="job_tooling btn" data-item-id="<?php echo $lowprio['job_id']; ?>" data-tooling="<?php echo $lowprio['job_tooling']; ?>">
                                                        <?php if ($lowprio['job_tooling'] == 1) { ?>
                                                            <a href="#" data-priority="high1" class="tooling button">
                                                                <img src="<?php echo base_url('/assets/images/low-pri.png'); ?>">
                                                            </a>
                                                        <?php } ?>
                                                    </div></td>
                                                <td><?php echo $lowprio['due_date']; ?></td>
                                                <td><a data-item-id="<?php echo $lowprio['job_id']; ?>" href="#" data-priority="low1" class="jobinfo button"><?php echo $lowprio['job_code']; ?></a></td>
                                                <td><?php echo $lowprio['cust_name']; ?></td>
                                                <td><?php
                                                    echo $lowprio['contact_name'];
                                                    echo $lowprio['contact_no'];
                                                    ?></td>
                                                <td><?php echo $lowprio['due_date']; ?></td>
                                                <td><?php if($lowprio['job_status'] == '1') {echo "Working";} 
                                                else if($lowprio['job_status'] == '0'){echo 'Hold';} 
                                                else {echo 'Cancelled';}?></td>
                                                <td><?php echo $lowprio['job_remarks']; ?></td></tr>
                                            <?php
                                        }
                                    }
                                    ?> 
                                </tbody> 
                            </table> 
                        </div>  
                    </section>                                        
                </div> 

            </div> 
        </section> 
    </section>

</section>

<div id="priority_dilog_box" title="Ref #test" style="display:none;">

</div>

<!--<script>
    $(document).ready(function () {
        $("#priority_dilog_box").dialog({
            autoOpen: false,
            resizable: false,
            position: 'center',
            width: 'auto',
            modal: false
        });
        //get help btn number user clicked on and show appr. help info
        $('.prioritypopup').click(function () {
            // e.preventDefault();
            var job_id = $(this).attr("data-item-id");
            var priority = $(this).attr("data-priority");
            $.ajax({
                url: "set_priority",
                data: {job_id: job_id},
                type: "GET",
                success: function (response) {
                    $("#priority_dilog_box").html(response);
                    $("#priority_dilog_box").dialog("open");

                    $("#priority_dilog_box").parent("div").removeClass("high1").removeClass("medium1").removeClass("low1").addClass(priority);

                }
            });
        });

        $('.updatejob').click(function () {
            // e.preventDefault();
            var job_id = $(this).attr("data-item-id");
            var priority = $(this).attr("data-priority");
            $.ajax({
                url: "view_job_info",
                data: {job_id: job_id},
                type: "GET",
                success: function (response) {
                    $("#priority_dilog_box").html(response);
                    $("#priority_dilog_box").dialog("open");
                    $("#priority_dilog_box").parent("div").removeClass("high1").removeClass("medium1").removeClass("low1").addClass(priority);
                }
            });
        });
        
        $('body').on("click","tooling",function(e) {
             var job_id = $(this).attr("data-item-id");
             $.ajax({
                url: "job_tooling",
                data: {job_id: job_id},
                type: "GET",
                success: function (response) {
                    $("#priority_dilog_box").html(response);
                    $("#priority_dilog_box").dialog("open");
                    $("#priority_dilog_box").parent("div").removeClass("high1").removeClass("medium1").removeClass("low1").addClass(priority);
                }
            });
        });
    });
</script>-->