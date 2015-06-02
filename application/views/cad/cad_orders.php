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
                <div class="tab-pane active" id="tab1">    
                    <section class="panel">                    
                        <div class="table-responsive">
                            <table class="table table-striped m-b-none">   
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
                                            get_table_tr_for_cad($order, "high1");
                                        }
                                    }
                                    if (!empty($normal)) {
                                        ?>                            
                                        <tr class="medium">      
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>                       
                                        </tr>                       
                                        <?php
                                        foreach ($normal as $med) {
                                            get_table_tr_for_cad($med, "medium1");
                                        }
                                    }
                                    if (!empty($low)) {
                                        ?>        
                                        <tr class="low">       
                                            <td></td><td></td><td></td><td></td><td></td><td></td><td></td>         
                                        </tr> 
                                        <?php
                                        foreach ($low as $lowprio) {
                                            get_table_tr_for_cad($lowprio, "low1");
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
<div id="cad_dialog_box" title="Order #test" style="display:none;"></div>
<?php

function get_table_tr_for_cad($data, $priority) {
    ?>
    <tr>                               
        <td><?php echo date("Y-m-d", strtotime($data['ad_dt'])); ?></td>   
        <td><a data-priority="<?php echo $priority; ?>"
               data-reference-id="<?php echo $data['order_code']; ?>"
               data-item-id="<?php echo $data['ord_id']; ?>"
               data-engg-id="<?php echo $data['ad_by']; ?>" 
               href="#"
               class="cad_popup button">
                <?php echo $data['order_code']; ?>
            </a>
        </td>                
        <td><?php echo $data['cust_name']; ?></td>                                
        <td><?php
            echo $data['contact_name'];
            echo $data['contact_no'];
            ?></td>          
        <td><?php // echo $data['due_date'];                     ?></td>         
        <td><?php
            if ($data['cad_status'] == '1') {
                echo "Working";
            } else if ($data['cad_status'] == '2') {
                echo 'Completed';
            } else {
                echo 'Not yet Started';
            }
            ?></td></td>    
    <td><?php //echo $data['due_date'];                   ?></td>        
    </tr>
    <?php
}
?>
<script>
    $(document).ready(function () {
//        $("#cad_dialog_box").dialog({
//            autoOpen: false,
//            width: '100%',
//        });
        opts = {
            autoOpen: false,
            width: '100%',
        };
        //get help btn number user clicked on and show appr. help info 
        $('.cad_popup').click(function () {
            // e.preventDefault();
            var job_id = $(this).attr("data-item-id");
            var engg_id = $(this).attr("data-engg-id");
            var order_reference_number_id = $(this).attr("data-reference-id");
            var job_priority = $(this).attr("data-priority");
            $.ajax({
                data: {job_id: job_id, engg_id: engg_id},
                type: "GET",
                dataType: "text",
                url: "<?php echo base_url('cad/cad_new_job'); ?>",
                success: function (response) {
                    $("#cad_dialog_box").html(response);
                    var theDialog = $("#cad_dialog_box").dialog(opts);
                    theDialog.dialog("open");
                    $("#cad_dialog_box").parent("div").removeClass("high1").removeClass("low1").removeClass("medium1").addClass(job_priority);
                    $("#cad_dialog_box").prev("div").find("span.ui-dialog-title").html("Order #" + order_reference_number_id);

                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        /**
         * Upload files to archive
         */
        $("body").on("click", ".archive", function (e) {
            e.preventDefault();
            $(".archive1").click();
        });

        /**
         * Upload files to laser
         */
        $("body").on("click", ".lsrjscn", function (e) {
            e.preventDefault();
            $(".lsrjscn1").click();
        });


        $("body").on("change", "#file_upload", function (e) {
            e.preventDefault();
            var file_data = $('#file_upload').prop('files')[0];
            var current_order_id = $('#current_order_id').val();
            var form_data = new FormData();
            form_data.append('file', file_data);
            form_data.append('order_id', current_order_id);
            form_data.append('type_of_upload', 1);
            //alert(form_data);
            $.ajax({
                url: "<?php echo base_url('/cad/upload_to_archive'); ?>",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {
                    var res = $.parseJSON(response);
                    if (res.status == "success")
                        alert('File uploaded successfully');
                    else {
                        var wrapped = res.error;
                        $(wrapped).find("p").remove();
                        alert($(wrapped).html());
                    }
                }
            });
        });

        $("body").on("change", "#file_laser", function (e) {
            e.preventDefault();
            var file_data = $('#file_laser').prop('files')[0];
            var current_order_id = $('#current_order_id').val();
            var form_data = new FormData();
            form_data.append('file', file_data);
            //alert(form_data);
            form_data.append('order_id', current_order_id);
            form_data.append('type_of_upload', 2);
            $.ajax({
                url: "<?php echo base_url('/cad/upload_to_archive'); ?>",
                dataType: 'text',
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (response) {
                    var res = $.parseJSON(response);
                    if (res.status == "success")
                        show_notification_message(res.message, "success");
                    else {
                        var wrapped = res.error;
                        wrapped.find(selector).remove();
                        alert(wrapped.html());
                        show_notification_message(res.message, "error");
                    }
                }
            });
        });
        /**
         * Dialog box Initiate
         */
        $("#mail_box").dialog({
            autoOpen: false,
            resizable: false,
            position: 'center',
            width: 'auto',
            modal: false
        });

        $("#checklist").dialog({
            autoOpen: false,
            resizable: false,
            position: 'center',
            width: 'auto',
            modal: false
        });
        /**
         * Query to Customer 
         */

        $('body').on("click", "#mail_to_customer", function (e) {
            e.preventDefault();
            var ord_id = $(this).attr("data-order-id");
            var engg_id = $(this).attr("data-engg-id");
            $.ajax({
                url: "<?php echo base_url("cad/cad_mail_to_customer") ?>",
                data: {ord_id: ord_id, engg_id: engg_id},
                type: "GET",
                success: function (response) {
                    $('#mail_box').html(response);
                    var theDialog = $("#mail_box").dialog(opts);
                    theDialog.dialog("open");
                }
            });
        });

        /**
         * Job Completed Status
         */

        $('body').on("click", ".cad_completion", function (e) {
            e.preventDefault();
            var notes = $("#notes").val();
            var id = $(this).attr("data-item-id");
            $.ajax({
                url: "<?php echo base_url('cad/send_to_laser'); ?>",
                data: {update_remarks: notes, ord_id: id},
                type: "POST",
                success: function (response) {
                    var res = $.parseJSON(response);
                    if (res.status) {
                        $("#cad_dialog_box").dialog('close');
                        $(".wrapper").load(location.href + " .wrapper");
                        show_notification_message(res.message, "success");
                    } else {
                        show_notification_message(res.message, "error");
                    }
                }
            });
        });

        /**
         *  Checklist Popup Box Open
         */

        $('body').on("click", ".checklist", function (e) {
            e.preventDefault();
//            var notes = $("#notes").val();
            var id = $(this).attr("data-item-id");
            var order_sts_id = $(this).attr("data-order-sts-id");
            $.ajax({
                url: "<?php echo base_url('cad/checklist'); ?>",
                data: {ord_id: id, ord_sts_id: order_sts_id},
                type: "POST",
                success: function (response) {
                    $('#checklist').html(response);
                    var theDialog = $("#checklist").dialog(opts);
                    theDialog.dialog("open");
                    var availableTags = [
<?php echo get_frame_sizes(); ?>
                    ];
                    $("#cl_frame_used").autocomplete({
                        source: availableTags
                    });
//                    $('#checklist').dialog('open');
                }
            });
        });

        /**
         * Working Status Change
         */
        $('body').on('click', ".working_status", function (e) {
            e.preventDefault();
//            var notes = $("#notes").val();
            var href = $(this).attr("href");
            var elem = $(this);
//            var order_id = $(this).attr("data-order-id");
            $.ajax({
                url: href,
//                data: {order_id: order_id},
                type: "POST",
                success: function (response) {
                    var res = $.parseJSON(response);
                    if (res.status) {
                        $(elem).removeClass("not-working").addClass("working");
                        show_notification_message(res.message, "success");
                    } else {
                        show_notification_message(res.message, "error");
                    }

                }
            });
        });
    });
</script>

<!--Check List Javascripts Starts Here-->
<script>
    $(document).ready(function () {
        $("body").on("blur", "#cl_frame_used", function () {
            var value = $(this).val();
            $.ajax({
                url: "<?php echo base_url('cad/get_borders'); ?>",
                data: {value: value},
                type: "POST",
                success: function (response) {
                    $("#cl_border_used").html(response);
                }
            });
        });

        //Text Box Validations
        $("body").on("blur", ".cad_check_ajax", function () {
            var elem = $(this).attr('id');
            // var check = $("#cl_aperture_content").val();
            var id = $(this).val();
            var ord_id = $(this).attr('data-order-id');
            alert(id);
            $.ajax({
                url: "<?php echo base_url('cad/compare_check_list'); ?>",
                data: {cl_data: elem, cl_value: id, ord_id: ord_id},
                type: "POST",
                success: function (response) {
                   // alert(id);
                    // $(elem)
                }
            });
        });
        //Checkbox Validations
        $("body").on("click", ".cad_ajax_chkboxes", function () {
            var order_id = $("#check_list_order_id").val();
            // var check = $("#cl_aperture_content").val();
            var value = $(this).prop('checked');
            var to_check = $(this).attr("id");
            var elem = $(this);
            $.ajax({
                url: "<?php echo base_url('cad/compare_check_list'); ?>",
                data: {order_id: order_id, value: value, to_check: to_check},
                type: "POST",
                success: function (response) {
                    var res = $.parseJSON(response);
                    if (!res.status) {
                        show_notification_message(res.message, "error");
                        if ($(elem).is(":checked")) {
                            $(elem).prop("checked", "false");
                        } else {
                            $(elem).prop("checked");
                        }
                    }
                }
            });
        });
        //Multiple Text Box Validations
        $("body").on("blur", ".cad_check_multi_ajax", function () {
            var elem = $(this).attr('id');
            // var check = $("#cl_aperture_content").val();
            var id = $("input[name='cl_foil_thickness[]']").serialize();
            var order_id = $("#check_list_order_id").val();
            $.ajax({
                url: "<?php echo base_url('cad/compare_check_multi_list'); ?>",
                data: id + '&order_id=' + order_id,
                type: "POST",
                success: function (response) {
                    alert(id);
                    // $(elem)
                }
            });
        });
        $("body").on("click", ".add_more_in_chklist", function (e) {
            e.preventDefault();
            var divLength = $(this).parent("div").parent("div").find("div").length;
            if (divLength <= 5) {
                if (divLength == 3) {
                    $(this).parent("div").parent("div").append("");
                }
                $(this).parent("div").parent("div").append($(this).parent("div").prev("div").clone());
                if (divLength != 4) {
                    $(this).parent("div").parent("div").append($(this).parent("div").clone());
                }
                $(this).parent("div").remove();
            }
        });
    })
</script>
<!--Check List Javascripts Ends Here-->