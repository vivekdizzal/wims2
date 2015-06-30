<div class="dialog_con1">
    <div class="bar"><img src="<?php echo base_url('assets/images/tick-512.png'); ?>"></div>
    <div class="row">
        <div class="col-lg-3">
            <div class="doc-buttons">
                <a id="helpBtn2" class="btn btn-s-md btn-default help button" href="<?php ?>">
                    Display <br>Order Form
                </a>
                <input type="hidden" name="current_order_id" id="current_order_id" value="<?php echo $order_id; ?>">
                <input type="hidden" name="order_reference_id" id="order_reference_id" value="<?php echo $ord_ref_id; ?>">
                <input type="hidden" name="order_status_id" id="order_status_id" value="<?php echo $order_status['id']; ?>">
                <!--                <a id="helpBtn3" class="btn btn-s-md btn-default help button" href="#">Download Job</a>-->
                <a id="helpBtn3" class="<?php echo ($order_status["cad_status"] == 1) ? 'working' : 'not-working'; ?> btn btn-s-md btn-default help button working_status" data-order-id ="<?php echo $order_id; ?>" href="<?php echo base_url('cad/change_cad_status') . "/" . $order_id; ?>">
                    Working
                </a>
                <a data-order-id="<?php echo $order_id; ?>" data-engg-id="<?php echo $engg_id; ?>" id="mail_to_customer" class="btn btn-s-md btn-default help button" href="#">Mail <br>To Customer</a>
                <!--                <a id="" class="btn btn-s-md btn-default help button" href="#">Download <br>Complete Job</a>-->
            </div>
        </div>
        <div class="col-lg-6">
            <section class="panel">
                <div class="table-responsive scrollable_tab">
                    <table class="table1">
                        <tr>
                            <th>Date & Time</th>
                            <th>Status</th>
                            <th>User</th>
                        </tr>
                        <?php
                        // print_r($user);
                        if (!empty($user)) {
                            foreach ($user as $update) {
                                ?>
                                <tr>
                                    <td><?php echo $update['update_time']; ?></td>
                                    <td><?php echo $update['update_remarks']; ?></td>
                                    <td><?php echo $update['usr_name']; ?></td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?><tr>
                                <td rowspan="3">No Status Available</td>
                            </tr>

                            <?php
                        }
                        ?>
                    </table>
                </div>
            </section>
            <label>Notes</label>
            <input type="text"  id="notes" class="notes" name="notes_to_laser" value="<?php echo $order_status['cad_remarks']; ?>">
        </div>
        <div class="col-lg-3">
            <div class="doc-buttons">
                <a class="btn btn-s-md btn-default cad_completion <?php echo ($order_status["cad_checklist_completed"]) ? '' : 'disabled'; ?>" id="send_to_laser" href="<?php echo base_url("cad/send_to_laser"); ?>" data-item-id="<?php echo $order_id; ?>">Send To<br> Laser Dept</a>
                <div> <?php $upload_files = get_upload_details($order_status['id'], 1);                       // echo $upload_files; ?>
                    <a id="archive_upload" class="btn btn-s-md btn-default <?php echo ($upload_files == TRUE) ? 'archive_upload' : 'archive'; ?>" href="#">Upload To<br> Archive</a>
                    <input style="display:none;" class="file_upload" type="file" name="file_archive" id="file_archive">
                    <input type="hidden" name="files_name" id="files_name">  
                </div>
                <div> <?php $upload_laser = get_upload_details($order_status['id'], 2); ?>
                    <a id="laser_upload" class="btn btn-s-md btn-default <?php echo ($upload_laser == TRUE) ? 'laser_upload' : 'lsrjscn'; ?> " href="#">Upload <br> LSR</a>
                    <input style="display:none;" class="lsrjscn1" type="file" name="laser_file" id="file_laser">
                    <a class="btn btn-s-md btn-default checklist <?php echo ($order_status["cad_checklist_completed"]) ? 'disabled' : ''; ?>" id="check_list_disable" data-order-sts-id="<?php echo $order_status['id']; ?>" data-item-id ="<?php echo $order_id; ?>" href="#">Check List</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="mail_box" title="Approval Request" style="display:none;"> </div>
<div id="checklist" title="Checklist" style="display:none;"> </div>
<div id="popup-modal-div" class="bMulti" style="display:none;">
<!--    <span class="button b-close">
        <span>X</span>
    </span>-->
    <h3>Upload Files</h3>
    <form id="upload_form" enctype="multipart/form-data" method="post">
        <input type="file" name="upload_data" id="upload_data"><br><br>
        <ul id="upload_ul">
        </ul><br>
        <!--<input type="button" class="INPUT-BTN" value="Upload File" onclick="upload()">-->
        <progress id="progressBar" value="0" max="100" style="width:300px;"></progress>
        <!--<h3 id="status"></h3>-->
        <p id="loaded_n_total"></p>
    </form>
</div>
<?php $Url = base_url() . 'cad/upload_to_archive'; ?>
<script>
    $(document).ready(function () {
        $("#popup-modal-div").dialog({
            autoOpen: false,
            resizable: false,
            position: 'center',
            width: 'auto',
            modal: false
        });
        $('#popup-modal-div:first').closest('.ui-dialog').addClass('upload_files_size');
        $("body").on("click", ".archive_upload", function (e) {
            e.preventDefault();
            if (confirm('File already uploaded.Do you want to upload again?')) {
                $(".file_upload").click();
            }
        });
        $("body").on("click", ".laser_upload", function (e) {
            e.preventDefault();
            if (confirm('File already uploaded.Do you want to upload again?')) {
                $(".lsrjscn1").click();
            }
        });

    });


    $(function ($) {
        $("#file_archive").on("change", function () {
            var elem = $(this);
            $('<div/>', {
                id: 'progress_bar',
                class: 'progress progress-bar-success progress-bar-striped active',
                role: 'progressbar',
                "aria-valuenow": "0",
                "aria-valuemin": "0",
                "aria-valuemax": "100",
            }).appendTo("#archive_upload");
            $('<div/>', {
                class: 'bar',
            }).appendTo("#progress");
            upload_File($(elem).attr("id"), 1);
//                var res = $.parseJSON(response);
//             if (res.status = "success") {
            $("#archive_upload").removeClass(".archive").addClass(".archive_upload");
//}
        });
        $("#file_laser").on("change", function () {
            var elem = $(this);
            $('<div/>', {
                id: 'progress_bar',
                class: 'progress progress-bar-success progress-bar-striped active',
                role: 'progressbar',
                "aria-valuenow": "0",
                "aria-valuemin": "0",
                "aria-valuemax": "100",
            }).appendTo("#laser_upload");
            $('<div/>', {
                class: 'bar',
            }).appendTo("#progress");
            upload_File($(elem).attr("id"), 2);
//            var res = $.parseJSON(response);
//            if (res.status = "success") {
                $("#laser_upload").removeClass("lsrjscn").addClass("laser_upload");
//            }
        });
    });
    function _(el) {
        return document.getElementById(el);
    }
    function upload_File(id, type_of_upload) {
        var file = _(id).files[0];
        var order_reference_id = $("#order_reference_id").val();
        var order_status_id = $("#order_status_id").val();
        var formdata = new FormData();
        formdata.append("file1", file);
        formdata.append("ord_reference_id", order_reference_id);
        formdata.append("order_status_id", order_status_id);
        formdata.append("type_of_upload", type_of_upload);
        var ajax = new XMLHttpRequest();
        ajax.upload.addEventListener("progress_bar", progress_Handler, false);
        ajax.addEventListener("load", complete_Handler, false);
        ajax.open("POST", "<?php echo $Url; ?>");
        ajax.send(formdata);
    }
    function progress_Handler(event) {
        var percent = (event.loaded / event.total) * 100;
        alert(percent);
        _("progress_bar").css('width', percent + '%').attr('aria-valuenow', Math.round(percent));
    }
    function complete_Handler(event) {
        var response = event.target.responseText;
        var res = $.parseJSON(response);
        if (res.status == "success") {
            _("progress_bar").value = 0;
            _("progress_bar").remove();
            show_notification_message(res.message, "success");
        } else {
            show_notification_message(res.message, "error");
            _("progress_bar").remove();
        }
    }



</script>

<style>
    .upload_files_size{
        width:auto !important;
        height:auto !important;
    }
</style>