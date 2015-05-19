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
                            <table class="table table-striped m-b-none"> 
                                <thead> 
                                    <tr align="center"> 
                                        <td rowspan="2" width="5px">Priority</td>
                                        <td rowspan="2" width="5px">Tooling</td>
                                        <td rowspan="2" width="11px">Customer Name</td> 
                                        <td rowspan="2" width="6px">Ref #</td> 
                                        <td colspan="2" width="15px">Due</td> 
                                        <td colspan="8" width="58px">Status</td> 
                                    </tr>
                                    <tr>
                                        <td>Date</td>
                                        <td>Time</td>
                                        <td>HOLD</td>
                                        <td><a href="">CAD</a></td>
                                        <td><a href="">Laser</a></td>
                                        <td><a href="">Production</a></td>
                                        <td>Shipped</td>
                                        <td>Invoice</td>
                                        <td>Pack Slip</td>
                                        <td>Completed</td>
                                    </tr>
                                </thead>
                                <tbody> 
                                    <?php if (!empty($high)) { ?>
                                        <tr class="high">
                                            <td colspan="14"></td>
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
                                                <td><?php echo $order['cust_name']; ?></td>
                                                <td><a data-item-id="<?php echo $order['job_id']; ?>" href="#" data-priority="high1" class="jobinfo button"><?php echo $order['job_code']; ?></a></td>
                                                <td><?php echo $order['due_date']; ?></td>
                                                <td><?php echo $order['due_time']; ?></td>
                                                <td></td>
                                                <td><?php echo $order['aper_content']; ?><br/>
                                                    <?php echo $order['foil_thick']; ?><br/>
                                                <?php echo $order['bord']; ?><br/></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php
                                        }
                                    } if (!empty($medium)) {
                                        ?>
                                        <tr class="medium"> 
                                            <td colspan="14"></td>
                                        </tr>
                                        <?php foreach ($medium as $med) { ?>
                                            <tr>
                                                <td><a data-item-id="<?php echo $med['job_id']; ?>" href="#" data-priority="medium1" class="prioritypop button"><img src="<?php echo base_url('/assets/images/medium-pri.png'); ?>"></a></td>
                                                <td> <div class="job_tooling btn" data-item-id="<?php echo $med['job_id']; ?>" data-tooling="<?php echo $med['job_tooling']; ?>">
                                                        <?php if ($med['job_tooling'] == 1) { ?>
                                                            <a href="#" data-priority="medium1" class="tooling button">
                                                                <img src="<?php echo base_url('/assets/images/low-pri.png'); ?>">
                                                            </a>
                                                        <?php } ?>
                                                    </div></td>
                                                <td><?php echo $med['cust_name']; ?></td>
                                                <td><a data-item-id="<?php echo $med['job_id']; ?>" href="#" data-priority="medium1" class="jobinfo button"><?php echo $med['job_code']; ?></a></td>
                                                <td><?php echo $med['due_date']; ?></td>
                                                <td><?php echo $med['due_time']; ?></td>
                                                <td> <div class="job_hold btn" data-item-id="<?php echo $med['job_id']; ?>" data-hold="<?php echo $med['job_status']; ?>"></div></td>
                                                <td><?php echo $med['aper_content']; ?><br/>
                                                    <?php echo $med['foil_thick']; ?><br/>
                                                <?php echo $med['bord']; ?><br/></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php
                                        }
                                    } if (!empty($low)) {
                                        ?> 

                                        <tr class="low">
                                            <td colspan="14"></td>
                                        </tr>
                                        <?php foreach ($low as $lowprio) { ?>
                                            <tr>
                                                <td><a data-item-id="<?php echo $lowprio['job_id']; ?>" href="#" data-priority="low1" class="prioritypop button"><img src="<?php echo base_url('/assets/images/low-pri.png'); ?>"></a></td>
                                                <td> <div class="job_tooling btn" data-item-id="<?php echo $lowprio['job_id']; ?>" data-tooling="<?php echo $lowprio['job_tooling']; ?>">
                                                        <?php if ($lowprio['job_tooling'] == 1) { ?>
                                                            <a href="#" data-priority="low1" class="tooling button">
                                                                <img src="<?php echo base_url('/assets/images/low-pri.png'); ?>">
                                                            </a>
                                                        <?php } ?>
                                                    </div></td>
                                                <td><?php echo $lowprio['cust_name']; ?></td>
                                                <td><a data-item-id="<?php echo $lowprio['job_id']; ?>" href="#" data-priority="low1" class="jobinfo button"><?php echo $lowprio['job_code']; ?></a></td>
                                                <td><?php echo $lowprio['due_date']; ?></td>
                                                <td><?php echo $lowprio['due_time']; ?></td>
                                                <td></td>
                                                <td><?php echo $lowprio['aper_content']; ?><br/>
                                                    <?php echo $lowprio['foil_thick']; ?><br/>
                                                <?php echo $lowprio['bord']; ?><br/></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
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