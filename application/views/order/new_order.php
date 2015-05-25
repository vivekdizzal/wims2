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
                <?php $this->view('order/order_header'); print_r($medium); ?>
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
                                        <td><a href="/wims2/admin/order_status/cad_status.asc" class="sort_items">CAD</a></td>
                                        <td><a href="/wims2/admin/order_status/laser_status.asc" class="sort_items">Laser</a></td>
                                        <td><a href="/wims2/admin/order_status/production_status.asc" class="sort_items">Production</a></td>
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
                                        foreach ($high as $order) {                                         //   print_r($order);exit;
                                            ?>
                                            <tr>
                                                <td><a data-item-id="<?php echo $order['ord_id']; ?>" href="#" data-priority="high1" class="prioritypop button"><img src="<?php echo base_url('/assets/images/high-pri.png'); ?>"></a></td>
                                                <td> <div class="job_tooling btn" data-item-id="<?php echo $order['ord_id']; ?>" data-tooling="<?php echo $order['job_tooling']; ?>">
                                                        <?php if ($order['job_tooling'] == 1) { ?>
                                                            <a href="#" data-priority="high1" class="tooling button">
                                                                <img src="<?php echo base_url('/assets/images/low-pri.png'); ?>">
                                                            </a>
                                                        <?php } ?>
                                                    </div></td>
                                                <td><?php echo $order['cust_name']; ?></td>
                                                <td><a data-item-id="<?php echo $order['ord_id']; ?>" href="#" data-priority="high1" class="jobinfo button"><?php echo $order['order_code']; ?></a></td>
                                                <td><?php echo $order['due_date']; ?></td>
                                                <td><?php echo $order['due_time']; ?></td>
                                                <td> <div class="job_hold btn" data-item-id="<?php echo $order['ord_id']; ?>" data-hold="<?php echo $order['is_hold']; ?>"></div></td>
                                                <?php $order['updates'] = get_cad_order_status($order['ord_id'], 1, 5); ?>
                                                <td class="<?php echo "job_cad_status" . $order['job_priority'] . $order['cad_status']; ?>">
                                                    <div class="btn1 btn">
                                                        <a href="/wims2/admin/job_history" class="job_history" data-item-id="<?php echo $order['ord_id']; ?>" data-max ="5" data-min="1" data-priority="high1">
                                                            <?php
                                                            if ($order['cad_status'] != 0) {
                                                                foreach ($order['updates'] as $update) {
                                                                    switch ($update['update_status']):
                                                                        case "5":
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                        case "1":
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                    endswitch;
                                                                }
                                                            }
                                                            ?>
                                                        </a></div>
                                                </td>
                                                <?php $order['updates'] = get_order_status($order['ord_id'], 6, 10); ?>
                                                <td class="<?php echo "job_laser_status" . $order['job_priority'] . $order['laser_status']; ?>">
                                                    <div class="btn1 btn">
                                                        <a href="/wims2/admin/job_history" class="job_history" data-item-id="<?php echo $order['ord_id']; ?>" data-max ="10" data-min="6" data-priority="high1">
                                                            <?php
                                                            if ($order['laser_status'] != 0 && $order['cad_status'] == 2) {
                                                                foreach ($order['updates'] as $update) {
                                                                    switch ($update['update_status']):
                                                                        case "10";
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                        case "6";
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                        default:
                                                                            echo "";
                                                                            break;
                                                                    endswitch;
                                                                }
                                                            }elseif ($order['cad_status'] == 2 && $order['laser_status'] == 0) {
                                                                echo $order['aper_content'];
                                                                ?><br/><?php echo $order['foil_thick']; ?><br/><?php
                                                                echo $order['bord'];
                                                            }
                                                            ?></a></div></td><?php $order['updates'] = get_order_status($order['ord_id'], 11, 14); ?>
                                                <td class="<?php echo "job_production_status" . $order['job_priority'] . $order['production_status']; ?>"> 
                                                    <div class="btn1 btn">
                                                        <a href="/wims2/admin/job_history" class="job_history" data-item-id="<?php echo $order['ord_id']; ?>" data-max ="14" data-min="11" data-priority="high1">
                                                            <?php
                                                            if ($order['production_status'] != 0) {
                                                                foreach ($order['updates'] as $update) {
                                                                    switch ($update['update_status']):
                                                                        case "14";
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                        case "11";
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                        default:
                                                                            echo "";
                                                                            break;
                                                                    endswitch;
                                                                }
                                                            }
                                                            ?></a></div></td>
                                                <?php $order['updates'] = get_order_status($order['ord_id'], 15, 17); ?>
                                                <td class="<?php echo "job_shipped_status" . $order['job_priority'] . $order['shipment_status']; ?>"> 
                                                    <div class="btn1 btn">
                                                        <a href="/wims2/admin/job_history" class="job_history" data-item-id="<?php echo $order['ord_id']; ?>" data-max ="17" data-min="15" data-priority="high1"> <?php
                                                            if ($order['shipment_status'] != 0) {
                                                                foreach ($order['updates'] as $update) {
                                                                    if ($update['update_status'] == 17) {
                                                                        $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                        echo $update_time;
                                                                    } elseif ($update['update_status'] == 15) {
                                                                        $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                        echo $update_time;
                                                                    }
                                                                }
                                                            }
                                                            ?></a></div></td>
                                                <td><div class="btn1 btn">
                                                        <a href=""><?php
//                                                            if ($order['overall_status'] == 7)
//                                                                $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
//                                                            echo $update_time;
                                                            ?></a></div></td>
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
                                        <?php
                                        foreach ($medium as $med) {
                                            //  $med['updates'] = get_order_status($med['ord_id']);
                                            ?>
                                            <tr>
                                                <td><a data-item-id="<?php echo $med['ord_id']; ?>" href="#" data-priority="medium1" class="prioritypop button"><img src="<?php echo base_url('/assets/images/medium-pri.png'); ?>"></a></td>
                                                <td> <div class="job_tooling btn" data-item-id="<?php echo $med['ord_id']; ?>" data-tooling="<?php echo $med['job_tooling']; ?>">
                                                        <?php if ($med['job_tooling'] == 1) { ?>
                                                            <a href="#" data-priority="medium1" class="tooling button">
                                                                <img src="<?php echo base_url('/assets/images/low-pri.png'); ?>">
                                                            </a>
                                                        <?php } ?>
                                                    </div></td>
                                                <td><?php echo $med['cust_name']; ?></td>
                                                <td><a data-item-id="<?php echo $med['ord_id']; ?>" href="#" data-priority="medium1" class="jobinfo button"><?php echo $med['order_code']; ?></a></td>
                                                <td><?php echo $med['due_date']; ?></td>
                                                <td><?php echo $med['due_time']; ?></td>
                                                <td> <div class="job_hold btn" data-item-id="<?php echo $med['ord_id']; ?>" data-hold="<?php echo $med['is_hold']; ?>"></div></td>
                                                <?php $med['updates'] = get_cad_order_status($med['ord_id'], 1, 5); ?>
                                                <td class="<?php echo "job_cad_status" . $med['job_priority'] . $med['cad_status']; ?>">
                                                    <div class="btn1 btn">
                                                        <a href="/wims2/admin/job_history" class="job_history" data-item-id="<?php echo $med['ord_id']; ?>" data-max ="5" data-min="1" data-priority="medium1">
                                                            <?php
                                                            if ($med['cad_status'] != 0) {
                                                                // echo "<pre>",print_r($order['updates'],true),"</pre>";
                                                                // exit;                                             
                                                                foreach ($med['updates'] as $update) {
                                                                    switch ($update['update_status']):
                                                                        case "5":
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                        case "1":
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                    endswitch;
                                                                }
                                                            }
                                                            ?>
                                                        </a></div>
                                                </td>
                                                <?php $med['updates'] = get_order_status($med['ord_id'], 6, 10); ?>
                                                <td class="<?php echo "job_laser_status" . $med['job_priority'] . $med['laser_status']; ?>">
                                                    <div class="btn1 btn">
                                                        <a href="/wims2/admin/job_history" class="job_history" data-item-id="<?php echo $med['ord_id']; ?>" data-max ="10" data-min="6" data-priority="medium1">
                                                            <?php
                                                            if ($med['laser_status'] != 0 && $med['cad_status'] == 2) {
                                                                foreach ($med['updates'] as $update) {
                                                                    switch ($update['update_status']):
                                                                        case "10";
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                        case "6";
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                        default:
                                                                            echo "";
                                                                            break;
                                                                    endswitch;
                                                                }
                                                            }
                                                            ?></a></div></td><?php $med['updates'] = get_order_status($med['ord_id'], 11, 14); ?>
                                                <td class="<?php echo "job_production_status" . $med['job_priority'] . $med['laser_status']; ?>"> 
                                                    <div class="btn1 btn">
                                                        <a href="/wims2/admin/job_history" class="job_history" data-item-id="<?php echo $med['ord_id']; ?>" data-max ="14" data-min="11" data-priority="medium1">
                                                            <?php
                                                            if ($med['production_status'] != 0) {
                                                                foreach ($med['updates'] as $update) {
                                                                    switch ($update['update_status']):
                                                                        case "14";
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                        case "11";
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                        default:
                                                                            echo "";
                                                                            break;
                                                                    endswitch;
                                                                }
                                                            }
                                                            ?></a></div></td>
                                                <?php $med['updates'] = get_order_status($med['ord_id'], 15, 17); ?>
                                                <td class="<?php echo "job_shipped_status" . $med['job_priority'] . $med['shipment_status']; ?>"> 
                                                    <div class="btn1 btn">
                                                        <a href="/wims2/admin/job_history" class="job_history" data-item-id="<?php echo $med['ord_id']; ?>" data-max ="17" data-min="15" data-priority="medium1"> <?php
                                                            if ($med['shipment_status'] != 0) {
                                                                foreach ($med['updates'] as $update) {
                                                                    if ($update['update_status'] == 17) {
                                                                        $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                        echo $update_time;
                                                                    } elseif ($update['update_status'] == 15) {
                                                                        $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                        echo $update_time;
                                                                    }
                                                                }
                                                            }
                                                            ?></a></div></td>
                                                <td><div class="btn1 btn">
                                                        <a href=""><?php
//                                                            if ($med['overall_status'] == 7)
//                                                                $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
//                                                            echo $update_time;
                                                            ?></a></div></td>
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
                                        <?php
                                        foreach ($low as $lowprio) {
                                            //  $lowprio['updates'] = get_order_status($lowprio['ord_id']);
                                            // print_r($lowprio['updates']);
                                            // if($lowprio['job_status']!='0') { 
                                            ?>
                                            <tr>
                                                <td><a data-item-id="<?php echo $lowprio['ord_id']; ?>" href="#" data-priority="low1" class="prioritypop button"><img src="<?php echo base_url('/assets/images/low-pri.png'); ?>"></a></td>
                                                <td> <div class="job_tooling btn" data-item-id="<?php echo $lowprio['ord_id']; ?>" data-tooling="<?php echo $lowprio['job_tooling']; ?>">
                                                        <?php if ($lowprio['job_tooling'] == 1) { ?>
                                                            <a href="#" data-priority="low1" class="tooling button">
                                                                <img src="<?php echo base_url('/assets/images/low-pri.png'); ?>">
                                                            </a>
                                                        <?php } ?>
                                                    </div></td>
                                                <td><?php echo $lowprio['cust_name']; ?></td>
                                                <td><a data-item-id="<?php echo $lowprio['job_id']; ?>" href="#" data-priority="low1" class="jobinfo button"><?php echo $lowprio['order_code']; ?></a></td>
                                                <td><?php echo $lowprio['due_date']; ?></td>
                                                <td><?php echo $lowprio['due_time']; ?></td>
                                                <td> <div class="job_hold btn" data-item-id="<?php echo $lowprio['ord_id']; ?>" data-hold="<?php echo $lowprio['is_hold']; ?>"></div></td>
                                                <?php $lowprio['updates'] = get_cad_order_status($lowprio['ord_id'], 1, 5); ?>
                                                <td class="<?php echo "job_cad_status" . $lowprio['job_priority'] . $lowprio['cad_status']; ?>">
                                                    <div class="btn1 btn">
                                                        <a href="/wims2/admin/job_history" class="job_history" data-item-id="<?php echo $lowprio['ord_id']; ?>" data-max ="5" data-min="1" data-priority="low1">
                                                            <?php
                                                            if ($lowprio['cad_status'] != 0) {
                                                                // echo "<pre>",print_r($order['updates'],true),"</pre>";
                                                                // exit;                                             
                                                                foreach ($lowprio['updates'] as $update) {
                                                                    switch ($update['update_status']):
                                                                        case "5":
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                        case "1":
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                    endswitch;
                                                                }
                                                            }
                                                            ?>
                                                        </a></div>
                                                </td>
                                                <?php $lowprio['updates'] = get_order_status($lowprio['ord_id'], 6, 10); ?>
                                                <td class="<?php echo "job_laser_status" . $lowprio['job_priority'] . $lowprio['laser_status']; ?>">
                                                    <div class="btn1 btn">
                                                        <a href="/wims2/admin/job_history" class="job_history" data-item-id="<?php echo $lowprio['ord_id']; ?>" data-max ="10" data-min="6" data-priority="low1">
                                                            <?php
                                                            if ($lowprio['laser_status'] != 0 && $lowprio['cad_status'] == 2) {
                                                                foreach ($lowprio['updates'] as $update) {
                                                                    switch ($update['update_status']):
                                                                        case "10";
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                        case "6";
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                        default:
                                                                            echo "";
                                                                            break;
                                                                    endswitch;
                                                                }
                                                            }
                                                            ?></a></div></td><?php $lowprio['updates'] = get_order_status($lowprio['ord_id'], 11, 14); ?>
                                                <td class="<?php echo "job_production_status" . $lowprio['job_priority'] . $lowprio['production_status']; ?>"> 
                                                    <div class="btn1 btn">
                                                        <a href="/wims2/admin/job_history" class="job_history" data-item-id="<?php echo $lowprio['ord_id']; ?>" data-max ="14" data-min="11" data-priority="low1">
                                                            <?php
                                                            if ($lowprio['shipment_status'] != 0) {
                                                                foreach ($lowprio['updates'] as $update) {
                                                                    switch ($update['update_status']):
                                                                        case "14";
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                        case "11";
                                                                            $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                            echo $update_time;
                                                                            break;
                                                                        default:
                                                                            echo "";
                                                                            break;
                                                                    endswitch;
                                                                }
                                                            }
                                                            ?></a></div></td>
                                                <?php $lowprio['updates'] = get_order_status($lowprio['ord_id'], 15, 17); ?>
                                                <td class="<?php echo "job_shipped_status" . $lowprio['job_priority'] . $lowprio['shipment_status']; ?>"> 
                                                    <div class="btn1 btn">
                                                        <a href="/wims2/admin/job_history" class="job_history" data-item-id="<?php echo $lowprio['ord_id']; ?>" data-max ="16" data-min="15" data-priority="low1"> <?php
                                                            if ($lowprio['shipment_status'] != 0) {
                                                                foreach ($lowprio['updates'] as $update) {
                                                                    if ($update['update_status'] == 17) {
                                                                        $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                        echo $update_time;
                                                                    } elseif ($update['update_status'] == 15) {
                                                                        $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                                                                        echo $update_time;
                                                                    }
                                                                }
                                                            }
                                                            ?></a></div></td>
                                                <td><div class="btn1 btn">
                                                        <a href=""><?php
//                                                            if ($lowprio['overall_status'] == 7)
//                                                                $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
//                                                            echo $update_time;
                                                            ?></a></div></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <?php
                                        }
                                    }
//}
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
    $(document).ready(function () {

        $('body').on('click', '.job_tooling', function (e) {
            e.preventDefault();
            var job_id = $(this).attr("data-item-id");
            var job_tooling = $(this).attr("data-tooling");
            $.ajax({
                url: "<?php echo base_url('/admin/update_tooling'); ?>",
                data: {job_id: job_id, job_tooling: job_tooling},
                type: "POST",
                success: function (response) {
                    $(".wrapper").load(location.href + " .wrapper");
                }
            });
        });


        $('body').on('click', '.sort_items', function (e) {
            e.preventDefault();
            var to_url = $(this).attr("href");
            $(".wrapper").load(to_url + " .wrapper");
        });

        $('body').on('click', '.prioritypop', function (e) {
            e.preventDefault();
            var ord_id = $(this).attr("data-item-id");
            var priority = $(this).attr("data-priority");
            $.ajax({
                url: "<?php echo base_url('/admin/set_priority'); ?>",
                data: {ord_id: ord_id},
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
            $.ajax({
                url: "<?php echo base_url('admin/view_job_info'); ?>",
                data: {ord_id: ord_id},
                type: "GET",
                success: function (response) {
                    $("#dialog_box").html(response);
                    $("#dialog_box").dialog("open");
                    $("#dialog_box").parent("div").removeClass("high1").removeClass("medium1").removeClass("low1").addClass(priority);
                }
            });
        });

        $('body').on('click', '.job_history', function (e) {
            e.preventDefault();
            var ord_id = $(this).attr("data-item-id");
            var max = $(this).attr("data-max");
            var min = $(this).attr("data-min");
            var url = $(this).attr("href");
            $.ajax({
                url: url,
                data: {ord_id: ord_id, max: max, min: min},
                type: "GET",
                success: function (response) {
                    $("#dialog_box").html(response);
                    $("#dialog_box").dialog("open");
                    //  $("#dialog_box").parent("div").removeClass("high1").removeClass("medium1").removeClass("low1").addClass(priority);
                }
            });
        });

        $('body').on('click', '.job_hold', function (e) {
            e.preventDefault();
            var ord_id = $(this).attr("data-item-id");
            var is_hold = $(this).attr("data-hold");
            $.ajax({
                url: "<?php echo base_url('/admin/update_job_status'); ?>",
                data: {ord_id: ord_id, is_hold: is_hold},
                type: "GET",
                success: function (response) {
                    $("#dialog_box").html(response);
                    $("#dialog_box").dialog("open");
                    // $("#dialog_box").parent("div").removeClass("high1").removeClass("medium1").removeClass("low1").addClass(priority);
                }
            });
        });

        $('body').on('click', '.cad_history', function (e) {
            e.preventDefault();
            var ord_id = $(this).attr("data-item-id");
            var is_hold = $(this).attr("data-hold");
            $.ajax({
                url: "<?php echo base_url('/admin/get_job_history'); ?>",
                data: {ord_id: ord_id, is_hold: is_hold},
                type: "GET",
                success: function (response) {
                    $("#dialog_box").html(response);
                    $("#dialog_box").dialog("open");
                    // $("#dialog_box").parent("div").removeClass("high1").removeClass("medium1").removeClass("low1").addClass(priority);
                }
            });
        });

    });
</script>