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
<div id="cad_dialog_box" class="heading_style" title="Order #test" style="display:none;"></div>
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
        <td><?php // echo $data['due_date'];                                       ?></td>         
        <td><?php
            if ($data['cad_status'] == '1') {
                echo "Working";
            } else if ($data['cad_status'] == '2') {
                echo 'Completed';
            } else {
                echo 'Not yet Started';
            }
            ?></td></td>    
    <td><?php //echo $data['due_date'];                                     ?></td>        
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
            var ord_id = $(this).attr("data-item-id");
            var engg_id = $(this).attr("data-engg-id");
            var order_reference_number_id = $(this).attr("data-reference-id");
            var job_priority = $(this).attr("data-priority");
            $.ajax({
                data: {ord_id: ord_id, engg_id: engg_id, ord_ref_id: order_reference_number_id},
                type: "GET",
                dataType: "text",
                url: "<?php echo base_url('cad/cad_new_job'); ?>",
                success: function (response) {
                    $("#cad_dialog_box").html(response);
                    var theDialog = $("#cad_dialog_box").dialog(opts);
                    theDialog.dialog("open");
                    $("#cad_dialog_box").parent("div").removeClass("high1").removeClass("low1").removeClass("medium1").addClass(job_priority);
                    $("#cad_dialog_box").prev("div").find("span.ui-dialog-title").html("Order #" + order_reference_number_id);
                    $('#cad_dialog_box:first').closest('.ui-dialog').addClass('head_stye');
                }
            });
        });


        $("body").on("click", ".delete-files", function () {
            var file_name = $(this).attr("file_name");
            var textboxval = $("#files_name").val();
            textboxval = textboxval.replace(file_name + ',', '');
            textboxval = textboxval.replace(',' + file_name, '');
            textboxval = textboxval.replace(file_name, '');
            $("#files_name").val(textboxval);
            $(this).parent('li').remove();
        });
    });
</script>
<?php $Url = base_url() . 'cad/upload_to_archive'; ?>
<script>
    //File Upload
//    function _(el) {
//        return document.getElementById(el);
//    }
//    function upload(type_of_upload) {
//        var file = _("upload_data").files[0];
//        var current_order_id = $('#current_order_id').val();
//        var reference_id = $('#order_reference_id').val();
//        var form_data = new FormData();
//
//        // alert(file.name+" | "+file.size+" | "+file.type);
//        var formdata = new FormData();
//        formdata.append("file1", file);
//        formdata.append('order_id', current_order_id);
//        formdata.append('type_of_upload', type_of_upload);
//        formdata.append('ord_reference_id', reference_id);
//        var ajax = new XMLHttpRequest();
//        ajax.upload.addEventListener("progress", progresshandler, false);
//        ajax.addEventListener("load", completehandler, false);
//        ajax.addEventListener("error", errorhandler, false);
//        ajax.addEventListener("abort", aborthandler, false);
//        ajax.open("POST", "<?php echo $Url; ?>");
//        ajax.send(formdata);
//    }
//    function progresshandler(event) {
//        //_("loaded_n_total").innerHTML = "Uploaded " + event.loaded + " bytes of " + event.total;
//        var percent = (event.loaded / event.total) * 100;
//        _("progressBar").value = Math.round(percent);
////        _("status").innerHTML = Math.round(percent) + "% uploaded... please wait";
//    }
//    function completehandler(event) {
//        var response = event.target.responseText;
//        var res = $.parseJSON(response);
//        var newlink = document.createElement('a');
//        newlink.appendChild(document.createTextNode('x'));
//        newlink.setAttribute('class', 'delete-files');
//        newlink.setAttribute('file_name', res.savedfilename);
//        var node = document.createElement("LI");                 // Create a <li> node
//        var textnode = document.createTextNode(res.filename);         // Create a text node
//        node.appendChild(textnode);
//        node.appendChild(newlink);                              // Append the text to <li>
//        document.getElementById("upload_ul").appendChild(node);
////        _("images_ul").appendChild(node);
//        $("#files_name").val($("#files_name").val() + res.savedfilename + ",");
//        _("progressBar").value = 0;
//    }
//    function errorhandler(event) {
//        _("status").innerHTML = "Upload Failed";
//    }
//    function aborthandler(event) {
//        _("status").innerHTML = "Upload Aborted";
//    }

    $(document).ready(function () {

//        $('body').on("click", '.upload-file', function () {
//            // e.preventDefault();
//            var theDialog = $("#popup-modal-div").dialog(opts);
//            theDialog.dialog("open");
//        });

        $("body").on("click", ".archive", function (e) {
            e.preventDefault();
            $(".file_upload").click();
        });

//        
        $("body").on("click", ".lsrjscn", function (e) {
            e.preventDefault();
            $(".lsrjscn1").click();
        });
        /**
         * Upload files to archive
         */

//        $("body").on("change", "#file_upload", function (e) {
////            e.preventDefault();
////            upload(1);
////        });
////        /**
////         * Upload files to laser
////         */
////        $("body").on("change", "#file_laser", function (e) {
////            e.preventDefault();
////            upload(2);
////        });
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
        $('#checklist:first').closest('.ui-dialog').addClass('upload_files_size');
        /**
         * Query to Customer 
         */

        $('body').on("click", "#mail_to_customer", function (e) {
            e.preventDefault();
            var order_reference_id = $("#order_reference_id").val();;
            var ord_id = $(this).attr("data-order-id");
            var engg_id = $(this).attr("data-engg-id");
            $.ajax({
                url: "<?php echo base_url("cad/cad_mail_to_customer") ?>",
                data: {ord_id: ord_id, engg_id: engg_id, order_reference_id: order_reference_id},
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
            var order_id = $(this).attr("data-order-id");
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
                        if (confirm('Do you want to continue?')) {
                            $.ajax({
                                url: "<?php echo base_url("cad/change_cad_working_status"); ?>",
                                data: {ord_id: order_id},
                                type: "POST",
                                success: function (response) {
                                    var res = $.parseJSON(response);
                                    if (res.status) {
                                        $(elem).removeClass("not-working").addClass("working");
                                        show_notification_message(res.message, "success");
                                    }
                                }
                            });
                        } else {

                            show_notification_message(res.message, "error");
                        }
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
            var form_data = $("#cad_checklist_form").serialize();
            var elem = $(this);
            $.ajax({
                url: "<?php echo base_url('cad/compare_check_list'); ?>",
                data: form_data,
                type: "POST",
                success: function (response) {
                    var res = $.parseJSON(response);
                    var error_field_value = $(elem).attr("data-id") + "_em";
                    $(".errorMessage").html("");
                    $.each(res, function (key, value) {
                        if (key == error_field_value) {
                            $("#" + error_field_value).html(value);
                        }

                    });
                }
            });
        });
        //Checkbox Validations
        $("body").on("change", ".cad_ajax_chkboxes", function () {
            var order_id = $("#check_list_order_id").val();
            //           var form_data = $("#cad_checklist_form").serialize();
            var value = $(this).prop('checked');
            var to_check = $(this).attr("id");
            var label_disp = $("#" + to_check).val();
            var elem = $(this);
            $.ajax({
                url: "<?php echo base_url('cad/compare_check_multi_list'); ?>",
                data: {order_id: order_id, value: value, to_check: to_check, label_disp: label_disp},
                type: "POST",
                success: function (response) {
                    var res = $.parseJSON(response);
                    if (!res.status) {
                        var error_field_value = $(elem).attr("data-id") + "_em";
                        $("#" + to_check).addClass("error_message");
                        $(".errorMessage").html("");
                        $.each(res, function (key, value) {
                            if (key == error_field_value) {
                                $("#" + error_field_value).html(value);
                            }
                        });
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

        $("body").on("submit", "#cad_checklist_form", function (e) {
            e.preventDefault();
            var form_data = $("#cad_checklist_form").serialize();
            $.ajax({
                url: "<?php echo base_url('cad/compare_check_list'); ?>/1",
                data: form_data,
                type: "POST",
                success: function (response) {
                    var res = $.parseJSON(response);
                    $(".errorMessage").html("");
                    if (res.status == "true") {
                        //Close the checklist popup & remove disabled class from the "send to laser button" and add disabled to "checklist button"
                        $(".checklist").dialog("close");
                        $("#check_list_disable").addClass("disabled");
                        $("#send_to_laser").removeClass("disabled");
                    } else {
                        $.each(res, function (key, value) {
                            $("#" + key).html(value);
                        });
                    }
                }
            });
        });
    });
</script>
<!--Check List Javascripts Ends Here-->