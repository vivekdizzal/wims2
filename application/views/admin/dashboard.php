<section class="scrollable" id="pjax-container"> 
    <header> 
        <div class="row b-b m-l-none m-r-none"> 
            <div class="col-sm-4"> 
                <h3 class="m-t m-b-none">Welcome to WIMS</h3> 
                <p class="block text-muted"></p> 
            </div> 
        </div> 
    </header> 
    <?php //print_r($orders);exit;?>
    <section class="vbox"> 
        <section class="wrapper"> 
            <div class="tab-content"> 
                <div class="tab-pane active" id="tab1">
                    <section class="panel">
                        <div class="table-responsive"> 
                            <table class="table table-striped datatable m-b-none"> 
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
                                <tbody> 

                                    <tr class="high">
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    </tr>
                                    <?php
                                    foreach ($high as $order) {
                                        ?>
                                        <tr>
                                            <td><?php echo $order['due_date']; ?></td>
                                            <td><?php echo $order['job_id']; ?></td>
                                            <td><?php echo $order['cust_name']; ?></td>
                                            <td><?php
                                                echo $order['contact_name'];
                                                echo $order['contact_no'];
                                                ?></td>
                                            <td><?php echo $order['due_date']; ?></td>
                                            <td><?php echo $order['job_status']; ?></td>
                                            <td><?php echo $order['due_date']; ?></td>
                                        </tr>
                                    <?php } ?> 
                                    <tr class="medium"><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                    </tr>
                                    <?php foreach ($medium as $med) { ?>
                                        <tr>
                                            <td><?php echo $med['due_date']; ?></td>
                                            <td><?php echo $med['job_id']; ?></td>
                                            <td><?php echo $med['cust_name']; ?></td>
                                            <td><?php
                                                echo $med['contact_name'];
                                                echo $order['contact_no'];
                                                ?></td>
                                            <td><?php echo $med['job_id']; ?></td>
                                            <td><?php echo $med['job_status']; ?></td>
                                            <td><?php echo $med['job_id']; ?></td>
                                        </tr>
                                    <?php } ?> 

                                    <tr class="low">
                                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                                    <?php foreach ($low as $lowprio) { ?>
                                        <tr>
                                            <td><?php echo $lowprio['due_date']; ?></td>
                                            <td><?php echo $lowprio['job_id']; ?></td>
                                            <td><?php echo $lowprio['cust_name']; ?></td>
                                            <td><?php
                                                echo $lowprio['contact_name'];
                                                echo $lowprio['contact_no'];
                                                ?></td>
                                            <td><?php echo $lowprio['due_date']; ?></td>
                                            <td><?php echo $lowprio['job_status']; ?></td>
                                            <td><?php echo $lowprio['due_date']; ?></td> 
                                        </tr>
                                    <?php } ?>

                                </tbody> 
                            </table> 
                        </div>  
                    </section>                                        
                </div> 

            </div> 
        </section> 
    </section>

</section>

