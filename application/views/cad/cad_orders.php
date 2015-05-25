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
        <td><?php // echo $data['due_date'];     ?></td>         
        <td><?php
            if ($data['cad_status'] == '1') {
                echo "Working";
            } else if ($data['cad_status'] == '2') {
                echo 'Completed';
            } else {
                echo 'Not yet Started';
            }
            ?></td></td>    
    <td><?php //echo $data['due_date'];   ?></td>        
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
                    $("#cad_dialog_box").parent("div").removeClass("high1").removeClass("low1").removeClass("medium1").addClass(job_priority);
                    $("#cad_dialog_box").prev("div").find("span.ui-dialog-title").html("Order #" + order_reference_number_id);
                    var theDialog = $("#cad_dialog_box").dialog(opts);
                    theDialog.dialog("open");
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {

        $("body").on("click", ".archive", function (e) {
            e.preventDefault();
            $(".archive1").click();
        });
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
                        alert('File uploaded successfully');
                    else {
                        var wrapped = res.error;
                        wrapped.find(selector).remove();
                        alert(wrapped.html());
                    }
                }
            });
        });

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

        $('body').on("click", "#mail_to_customer", function (e) {
            e.preventDefault();
            var job_id = $(this).attr("data-order-id");
            var engg_id = $(this).attr("data-engg-id");
            $.ajax({
                url: "<?php echo base_url("cad/cad_mail_to_customer") ?>",
                data: {job_id: job_id, engg_id: engg_id},
                type: "GET",
                success: function (response) {
                    $('#mail_box').html(response);
                    var theDialog = $("#mail_box").dialog(opts);
                    theDialog.dialog("open");
                }
            });
        });

        $('body').on("click", ".laser", function (e) {
            e.preventDefault();
            var notes = $("#notes").val();
            var id = $(this).attr("data-item-id");
            $.ajax({
                url: "<?php echo base_url('cad/send_to_laser'); ?>",
                data: {update_remarks: notes, job_id: id},
                type: "POST",
                success: function (response) {
                    window.location.href = '<?php echo base_url('cad'); ?>';
                }
            });
        });

        $('body').on("click", ".checklist", function (e) {
            e.preventDefault();
//            var notes = $("#notes").val();
//            var id = $(this).attr("data-item-id");
            $.ajax({
                url: "<?php echo base_url('cad/checklist'); ?>",
//                data: {update_remarks: notes, job_id: id},
//                type: "POST",
                success: function (response) {
                    $('#checklist').html(response);
                    var theDialog = $("#checklist").dialog(opts);
                    theDialog.dialog("open");
//                    $('#checklist').dialog('open');
                }
            });
        });
    });
</script>