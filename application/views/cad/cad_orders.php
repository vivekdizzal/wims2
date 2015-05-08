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
                                <tbody> <?php  if (!empty($pending)) { ?>                    
                                    <tr class="high">         
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>                                 
                                    </tr>                       
                                    <?php
                                        foreach ($pending as $order) {
                                            ?> 
                                            <tr>                                          
                                                <td><?php echo $order['due_date']; ?></td>    
                                                <td><a data-item-id="<?php echo $order['job_id']; ?>" href="#" class="cad_popup button"><?php echo $order['job_code']; ?></a></td>     
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
} if (!empty($hold)) { ?>                            
                                    <tr class="medium">      
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>                       
                                    </tr>                       
<?php 
    foreach ($hold as $med) {
        ?>      
                                            <tr>             
                                                <td><?php echo $med['due_date']; ?></td>       
                                                <td><a data-item-id="<?php echo $med['job_id']; ?>" href="#" class="cad_popup button"><?php echo $med['job_code']; ?></td>           
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
                                    } if (!empty($completed)) {?>        
                                    <tr class="low">       
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>         
                                    </tr> 
<?php 
    foreach ($completed as $lowprio) {
        ?>    
                                            <tr>                               
                                                <td><?php echo $lowprio['due_date']; ?></td>   
                                                <td><a data-item-id="<?php echo $lowprio['job_id']; ?>" href="#" class="cad_popup button"><?php echo $lowprio['job_code']; ?></td>                
                                                <td><?php echo $lowprio['cust_name']; ?></td>                                
                                                <td><?php
                                            echo $lowprio['contact_name'];
                                            echo $lowprio['contact_no'];
                                            ?></td>          
                                                <td><?php echo $lowprio['due_date']; ?></td>         
                                                <td><?php echo $lowprio['job_status']; ?></td>    
                                                <td><?php echo $lowprio['due_date']; ?></td>        
                                            </tr>                                    <?php }
                                    } ?>                 
                                </tbody>                             </table>        
                        </div>          
                    </section>          
                </div>         
            </div>       
        </section>    
    </section>
</section>
<div id="cad_dialog_box" title="Order #test" style="display:none;"></div>
<script>
    $(document).ready(function () {
        $("#cad_dialog_box").dialog({
            autoOpen: false,
            resizable: false,
            position: 'center',
            width: 'auto',
            modal: false
        });
        //get help btn number user clicked on and show appr. help info 
        $('body').on("click", ".cad_popup", function (e) {
            e.preventDefault();
            var job_id = $(this).attr("data-item-id");
            $.ajax({
                url: "cad_new_job",
                data: {job_id: job_id},
                type: "GET",
                success: function (response) {
                    $("#cad_dialog_box").html(response);
                    $("#cad_dialog_box").dialog("open");
                }
            });
        });
    });
</script>