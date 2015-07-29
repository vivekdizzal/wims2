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
                            <table class="table table-striped m-b-none scrollable_tab1"> 
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
                                        foreach ($high as $order) {
                                            get_new_order_table($order);
                                        }
                                    } if (!empty($medium)) {
                                        ?>
                                        <tr class="medium"> 
                                            <td colspan="14"></td>
                                        </tr>
                                        <?php
                                        foreach ($medium as $med) {
                                            //  $med['updates'] = get_order_status($med['ord_id']);
                                            get_new_order_table($med);
                                        }
                                    } if (!empty($low)) {
                                        ?> 

                                        <tr class="low">
                                            <td colspan="14"></td>
                                        </tr>
                                        <?php
                                        foreach ($low as $lowprio) {
                                            get_new_order_table($lowprio);
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
<?php

function get_new_order_table($order) {
    ?>
    <tr><?php 
        if ($order['job_priority'] == 2) {
            $image = base_url('/assets/images/high-pri.png');
        } elseif ($order['job_priority'] == 1) {
            $image = base_url('/assets/images/medium-pri.png');
        } else {
            $image = base_url('/assets/images/low-pri.png');
        }
        ?>
        <td><?php if (user_has_right(TOOLING_AND_PRIORITY)) { ?>
                <a data-item-id="<?php echo $order['ord_id']; ?>" data-status-id="<?php echo $order['id']; ?>" href="#" data-priority="high1" class="prioritypop button">
                    <img src="<?php echo $image; ?>">
                </a>
                <?php
            } else {
                ?><img src="<?php echo $image; ?>"><?php } ?></td>
        <td><?php if (user_has_right(TOOLING_AND_PRIORITY)) { ?> 
                <div class="job_tooling btn" data-item-id="<?php echo $order['ord_id']; ?>" data-tooling="<?php echo $order['job_tooling']; ?>">
                    <?php if ($order['job_tooling'] == 1) { ?>
                        <a href="#" data-priority="high1" class="tooling button">
                            <img src="<?php echo base_url('/assets/images/low-pri.png'); ?>">
                        </a><?php } ?></div>
                <?php
            } else {
                if ($order['job_tooling'] == 1) {
                    ?>

                    <img src="<?php echo base_url('/assets/images/low-pri.png'); ?>">
                    <?php
                }
            }
            ?>
        </td>
        <td><?php echo $order['cust_name']; ?></td>
        <td><a data-status-id="<?php echo $order['id']; ?>" data-item-id="<?php echo $order['ord_id']; ?>" href="#" data-priority="high1" class="jobinfo button"><?php echo $order['order_code']; ?></a></td>
        <td><?php echo $order['ship_by_date']; ?></td>
        <td><?php //echo $order['due_time'];    ?></td>
        <td> <div class="job_hold btn" data-item-id="<?php echo $order['ord_id']; ?>" data-hold="<?php echo $order['is_hold']; ?>"></div></td>
        <?php $order['updates'] = get_cad_order_status($order['id'], 1, 5); ?>
        <td class="<?php echo "job_cad_status" . $order['job_priority'] . $order['cad_status']; ?>">
            <div class="btn1 btn">
                <a href="/wims2/admin/job_history" class="job_history" data-status-id="<?php echo $order['id']; ?>" data-item-id="<?php echo $order['ord_id']; ?>" data-max ="5" data-min="1" data-priority="high1">
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
                <a href="/wims2/admin/job_history" class="job_history" data-status-id="<?php echo $order['id']; ?>" data-item-id="<?php echo $order['ord_id']; ?>" data-max ="10" data-min="6" data-priority="high1">
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
                        $aper_count = get_aper_count($order['id'], 'sc_aperture_count', TBL_CAD_CHECKLIST);
                       
                        if(!empty($aper_count))echo $aper_count[0]->sc_aperture_count;
                        ?><br/><?php  echo $order['foil_thick']; ?><br/><?php
                        $border = get_aper_count($order['id'], 'sc_border_used', TBL_CAD_CHECKLIST);
                        if(!empty($border))echo $border[0]->sc_border_used;
                    } elseif ($order['laser_status'] == 2) { if(!empty($update['update_time'])){
                        $update_time = date('m-d-Y', strtotime($update['update_time'])) . "<br>" . date('h:i A', strtotime($update['update_time']));
                        echo $update_time;
                    }
                    }
                    ?></a></div></td><?php $order['updates'] = get_order_status($order['ord_id'], 11, 14); ?>
        <td class="<?php echo "job_production_status" . $order['job_priority'] . $order['production_status']; ?>"> 
            <div class="btn1 btn">
                <a href="/wims2/admin/job_history" class="job_history" data-status-id="<?php echo $order['id']; ?>" data-item-id="<?php echo $order['ord_id']; ?>" data-max ="14" data-min="11" data-priority="high1">
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
                <a href="/wims2/admin/job_history" class="job_history" data-status-id="<?php echo $order['id']; ?>" data-item-id="<?php echo $order['ord_id']; ?>" data-max ="17" data-min="15" data-priority="high1"> <?php
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
                <a href="">

                </a></div></td>
        <td></td>
        <td></td>
    </tr>
    <?php
}
?>
<script>
    $(document).ready(function () {
job_priority = '';
        $('body').on('click', '.job_tooling', function (e) {
            e.preventDefault();
            var ord_id = $(this).attr("data-item-id");
            var job_tooling = $(this).attr("data-tooling");
            $.ajax({
                url: "<?php echo base_url('/admin/update_tooling'); ?>",
                data: {ord_id: ord_id, job_tooling: job_tooling},
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

        $('body').on('click', '.job_history', function (e) {
            e.preventDefault();
            var ord_id = $(this).attr("data-item-id");
            var status_id = $(this).attr("data-status-id");
            var max = $(this).attr("data-max");
            var min = $(this).attr("data-min");
            var url = $(this).attr("href");
            $.ajax({
                url: url,
                data: {ord_id: ord_id, status_id: status_id, max: max, min: min},
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