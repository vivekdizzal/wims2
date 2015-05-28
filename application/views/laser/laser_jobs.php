 <section class="scrollable" id="pjax-container">     
    <header>         
        <div class="row b-b m-l-none m-r-none">
            <div class="col-sm-4">  
                <h3 class="m-t m-b-none">Welcome to WIMS</h3>     
                <p class="block text-muted"></p>  
            </div>         
        </div>    
    </header>  
    <?php // print_r($normal); ?>
    <section class="vbox">
        <section class="wrapper">   
            <header class="bg-light">   
                <?php $this->view('order/order_header'); ?>  
            </header> 
            <div class="tab-content">
                <div class="tab-pane active">    
                    <section class="panel">                    
                        <div class="table-responsive">             
                            <table class="table table-striped dataTable datatable m-b-none">   
                                <thead>       
                                    <tr>                            
                                        <th width="">Due Date</th>             
                                        <th width="">Ref #</th>                     
                                        <th width="">Company</th>                            
                                        <th width="">Contact</th>            
                                        <th width="">Designer</th>       
                                        <th width="">Status</th>        
                                        <th width="">Notes</th>         
                                    </tr>                       
                                </thead>                       
                                <tbody> <?php if (!empty($high)) { ?>                    
                                        <tr class="high">         
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>                                 
                                        </tr>                       
                                        <?php
                                        foreach ($high as $order) {
                                            ?> 
                                            <tr>                                          
                                                <td><?php echo $order['due_date']; ?></td>    
                                                <td><a data-item-id="<?php echo $order['job_id']; ?>" href="#" class="laser_popup button"><?php echo $order['job_code']; ?></a></td>     
                                                <td><?php echo $order['cust_name']; ?></td>                               
                                                <td><?php
                                                    echo $order['contact_name'];
                                                    echo $order['contact_no'];
                                                    ?></td>    
                                                <td><?php echo $order['due_date']; ?></td>                                          
                                                <td><?php echo $order['job_status']; ?></td>                 
                                                <td><?php echo $order['due_date']; ?></td>                   
                                            </tr>                               
                                        <?php }
                                    } if (!empty($normal)) {
                                        ?>                            
                                        <tr class="medium">      
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>                       
                                        </tr>                       
                                        <?php
                                        foreach ($normal as $med) {
                                            ?>      
                                            <tr>             
                                                <td><?php echo $med['due_date']; ?></td>       
                                                <td><a data-item-id="<?php echo $med['job_id']; ?>" href="#" class="laser_popup button"><?php echo $med['job_code']; ?></td>           
                                                <td><?php echo $med['cust_name']; ?></td>                                  
                                                <td><?php
                                                    echo $med['contact_name'];
                                                    echo $order['contact_no'];
                                                    ?></td>                      
                                                <td><?php echo $med['job_id']; ?></td>            
                                                <td><?php
                                                    echo $med['job_status'];
                                                    echo $order['contact_no'];
                                                    ?></td>   
                                                ?></td>                               
                                                <td><?php echo $med['job_id']; ?></td>          
                                            </tr>                         
                                        <?php }
                                    } if (!empty($low)) {
                                        ?>        
                                        <tr class="low">       
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>         
                                        </tr> 
                                        <?php
                                        foreach ($low as $lowprio) {
                                            ?>    
                                            <tr>                               
                                                <td><?php echo $lowprio['due_date']; ?></td>   
                                                <td><a data-item-id="<?php echo $lowprio['job_id']; ?>" href="#" class="laser_popup button"><?php echo $lowprio['job_code']; ?></td>                
                                                <td><?php echo $lowprio['cust_name']; ?></td>                                
                                                <td><?php
                                                    echo $lowprio['contact_name'];
                                                    echo $lowprio['contact_no'];
                                                    ?></td>          
                                                <td><?php echo $lowprio['due_date']; ?></td>         
                                                <td><?php echo $lowprio['job_status']; ?></td>    
                                                <td><?php echo $lowprio['due_date']; ?></td>        
                                            </tr>                                    <?php }
                            }
                                            ?>                 
                                </tbody>                             </table>        
                        </div>          
                    </section>          
                </div>         
            </div>       
        </section>    
    </section>
</section>
<div id="laser_dialog_box" title="Priority" style="display:none;"></div>
<script>
    $(document).ready(function () {
        $("#laser_dialog_box").dialog({
            autoOpen: false,
            resizable: false,
            position: 'center',
            width: 'auto',
            modal: false
        });
        //get help btn number user clicked on and show appr. help info 
        $('body').on("click", ".laser_popup", function (e) {
             $.ajax({
                url: "laser/laser_popup",
                //data: {job_id: job_id},
                //type: "GET",
                success: function (response) {
                    $("#laser_dialog_box").html(response);
                    $("#laser_dialog_box").dialog("open");

                    //$("#laser_dialog_box").parent("div").removeClass("high1").removeClass("medium1").removeClass("low1").addClass(priority);
                }
           });
        });
    });
</script>