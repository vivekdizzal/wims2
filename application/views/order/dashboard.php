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
            <div class="tab-content">  
                <div class="" id="datatable">   
                    <section class="panel">                 
                        <header class="panel-heading"> 
                            Orders to Complete Today 
                            <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>  
                        </header>   
                        <div class="table-responsive scrollable_tab1">      
                            <table class="table table-striped datatable m-b-none">     
                                <thead>             
                                    <tr>           
                                        <th width="70">Priority</th>      
                                        <th width="70">Tooling</th>
                                        <th width="">Due Date</th>   
                                        <th width="">Ref #</th>    
                                        <th width="">Company</th>  
                                        <th width="">Contact</th>   
                                        <th width="">Status</th>   
                                    </tr>                 
                                </thead>               
                                <tbody>              
                                    <?php if (!empty($high) && $high[0]['job_status'] != '-1') { ?>    
                                        <tr class="high">                    
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
                                        </tr>                     
                                        <?php foreach ($high as $order) { ?>    
                                            <tr>                  
                                                <td><?php if (user_has_right(TOOLING_AND_PRIORITY)) { ?>
                                                    <a data-item-id="<?php echo $order['ord_id']; ?>" href="#" data-priority="high1" data-status-id="<?php echo $order['id']; ?>" class="prioritypopup button">
                                                        <img src="<?php echo base_url('/assets/images/high-pri.png'); ?>">
                                                </a><?php }else{?> 
                                                    <a data-item-id="<?php echo $order['ord_id']; ?>" href="#" data-priority="high1" class="button">
                                                        <img src="<?php echo base_url('/assets/images/high-pri.png'); ?>">
                                                </a><?php }?>
                                                </td>    
                                                <td>       
                                                    <div class="job_tooling btn" data-item-id="<?php echo $order['ord_id']; ?>" data-tooling="<?php echo $order['job_tooling']; ?>">
                                                        <?php if ($order['job_tooling'] == 1) { ?>          
                                                            <a data-item-id="<?php echo $order['ord_id']; ?>" data-tooling="<?php echo $order['job_tooling']; ?>" href="#" data-priority="high1" class="tooling button">
                                                                <img src="<?php echo base_url('/assets/images/low-pri.png'); ?>">
                                                            </a>
                                                        <?php } ?> 
                                                    </div>  
                                                </td>     
                                                <td>    
                                                    <?php echo $order['due_date']; ?>
                                                </td>   
                                                <td>
                                                    <a data-item-id="<?php echo $order['ord_id']; ?>" href="#" data-priority="high1" data-status-id="<?php echo $order['id']; ?>" class="jobinfo button">
                                                        <?php echo $order['order_code']; ?>
                                                    </a
                                                </td>
                                                <td>
                                                    <?php echo $order['cust_name']; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $order['contact_name'];
                                                    echo $order['contact_no'];
                                                    ?>
                                                </td> 
                                                <td>
                                                    <?php
                                                    if ($order['job_status'] == '1') {
                                                        echo "Working";
                                                    } else if ($order['job_status'] == '0') {
                                                        echo 'Hold';
                                                    } else if ($order['job_status'] == '-1') {
                                                        echo 'Cancelled';
                                                    }
                                                    ?>
                                                </td> 
                                            </tr>   
                                            <?php
                                        }
                                    } if (!empty($medium) && $medium[0]['job_status'] != '-1') {
                                        ?> 
                                        <tr class="medium"> 
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td> 
                                        </tr>    
                                        <?php foreach ($medium as $med) { ?>     
                                            <tr>      
                                                <td><?php if (user_has_right(TOOLING_AND_PRIORITY)) { ?>
                                                    <a data-item-id="<?php echo $med['ord_id']; ?>" href="#" data-priority="medium1" data-status-id="<?php echo $med['id']; ?>" class="prioritypopup button">
                                                        <img src="<?php echo base_url('/assets/images/medium-pri.png'); ?>">
                                                </a><?php }else{?> 
                                                    <a data-item-id="<?php echo $med['ord_id']; ?>" href="#" data-priority="medium1" class="button">
                                                        <img src="<?php echo base_url('/assets/images/medium-pri.png'); ?>">
                                                </a><?php }?>
                                                   </td> 
                                                <td>
                                                    <div class="job_tooling btn" data-item-id="<?php echo $med['ord_id']; ?>" data-tooling="<?php echo $med['job_tooling']; ?>">
                                                        <?php if ($med['job_tooling'] == 1) { ?> 
                                                            <a data-item-id="<?php echo $med['ord_id']; ?>" data-tooling="<?php echo $med['job_tooling']; ?>" href="#" data-priority="high1" class="tooling button">
                                                                <img src="<?php echo base_url('/assets/images/low-pri.png'); ?>">
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo $med['due_date']; ?>
                                                </td>
                                                <td>
                                                    <a data-item-id="<?php echo $med['ord_id']; ?>" href="#" data-priority="medium1" data-status-id="<?php echo $med['id']; ?>" class="jobinfo button">
                                                        <?php echo $med['order_code']; ?>
                                                    </a>
                                                </td> 
                                                <td>
                                                    <?php echo $med['cust_name']; ?>
                                                </td> 
                                                <td>
                                                    <?php
                                                    echo $med['contact_name'];
                                                    echo $med['contact_no'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($med['job_status'] == '1') {
                                                        echo "Working";
                                                    } else if ($med['job_status'] == '0') {
                                                        echo 'Hold';
                                                    } else {
                                                        echo 'Cancelled';
                                                    }
                                                    ?>
                                                </td> 
                                                <?php
                                            }
                                        } if (!empty($low) && $low[0]['job_status'] != '-1') {
                                            ?>         
                                        <tr class="low">  
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                        </tr>  
                                        <?php foreach ($low as $lowprio) { ?>   
                                            <tr>        
                                                <td><?php if (user_has_right(TOOLING_AND_PRIORITY)) { ?>
                                                    <a data-item-id="<?php echo $lowprio['ord_id']; ?>" href="#" data-priority="low1" data-status-id="<?php echo $lowprio['id']; ?>" class="prioritypopup button">
                                                        <img src="<?php echo base_url('/assets/images/low-pri.png'); ?>">
                                                </a><?php }else{?> 
                                                    <a data-item-id="<?php echo $lowprio['ord_id']; ?>" href="#" data-priority="low1" class="button">
                                                        <img src="<?php echo base_url('/assets/images/low-pri.png'); ?>">
                                                </a><?php }?>
                                                </td>
                                                <td>
                                                    <div class="job_tooling btn" data-item-id="<?php echo $lowprio['ord_id']; ?>" data-tooling="<?php echo $lowprio['job_tooling']; ?>">
                                                        <?php if ($lowprio['job_tooling'] == 1) { ?> 
                                                            <a data-item-id="<?php echo $lowprio['ord_id']; ?>" data-tooling="<?php echo $lowprio['job_tooling']; ?>" href="#" data-priority="high1">
                                                                <img src="<?php echo base_url('/assets/images/low-pri.png'); ?>">
                                                            </a>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <?php echo $lowprio['due_date']; ?>
                                                </td> 
                                                <td>
                                                    <a data-item-id="<?php echo $lowprio['ord_id']; ?>" href="#" data-priority="low1" data-status-id="<?php echo $lowprio['id']; ?>" class="jobinfo button">
                                                        <?php echo $lowprio['order_code']; ?>
                                                    </a>
                                                </td>
                                                <td>
                                                    <?php echo $lowprio['cust_name']; ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    echo $lowprio['contact_name'];
                                                    echo $lowprio['contact_no'];
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    if ($lowprio['job_status'] == '1') {
                                                        echo "Working";
                                                    } else if ($lowprio['job_status'] == '0') {
                                                        echo 'Hold';
                                                    } else {
                                                        echo 'Cancelled';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
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
<script>
    $(document).ready(function() {
        $('body').on('click', '.prioritypopup', function (e) {
            e.preventDefault();
            var ord_id = $(this).attr("data-item-id");
            var priority = $(this).attr("data-priority");
            var id = $(this).attr("data-status-id");
            $.ajax({
                url: "<?php echo base_url('/admin/set_priority'); ?>",
                data: {ord_id: ord_id, id: id},
                type: "GET",
                success: function (response) {
                    $("#dialog_box").html(response);
                    $("#dialog_box").dialog("open");

                    $("#dialog_box").parent("div").removeClass("high1").removeClass("medium1").removeClass("low1").addClass(priority);

                }
            });
        });

        $('body').on('click', '.jobinfo', function (e) {
            e.preventDefault();
            var ord_id = $(this).attr("data-item-id");
            var priority = $(this).attr("data-priority");
            var id = $(this).attr("data-status-id");
            $.ajax({
                url: "<?php echo base_url('admin/view_job_info'); ?>",
                data: {ord_id: ord_id, id: id},
                type: "GET",
                success: function (response) {
                    $("#dialog_box").html(response);
                    $("#dialog_box").dialog("open");
                    $("#dialog_box").parent("div").removeClass("high1").removeClass("medium1").removeClass("low1").addClass(priority);
                }
            });
        }); 
    });
    </script>