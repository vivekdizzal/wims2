<div class="dialog_con1">    <div class="bar"><img src="<?php echo base_url('assets/images/tick-512.png'); ?>"></div>    <div class="row">        <div class="col-lg-3">            <div class="doc-buttons">                <a id="helpBtn2" class="btn btn-s-md btn-default help button" href="#">Display <br>Order Form</a>                <a id="helpBtn3" class="btn btn-s-md btn-default help button" href="#">Download Job</a>                <a id="mail_to_customer" class="btn btn-s-md btn-default help button" href="#">Mail <br>To Customer</a>                <!--                <a id="" class="btn btn-s-md btn-default help button" href="#">Download <br>Complete Job</a>-->            </div>        </div>        <div class="col-lg-6">            <section class="panel">                <div class="table-responsive">                    <table class="table table-striped">                        <tr>                            <th>Date & Time</th><th>Status</th><th>User</th>                        </tr>                        <?php                                  foreach ($user as $update) {                            if (!($update['update_for'] >= '3')) {                                ?>                                <tr>                                    <td><?php echo $update['update_time']; ?></td>                                    <td><?php echo $update['update_to']; ?></td>                                    <td><?php echo $update['usr_name']; ?> </td>                                </tr>    <?php }} ?>                    </table>                </div>            </section>            <label>Notes</label>            <input type="text"  id="notes" class="notes" name="notes_to_laser" value="">        </div>        <div class="col-lg-3">            <div class="doc-buttons">                <a class="btn btn-s-md btn-default laser" href="<?php echo base_url("cad/send_to_laser"); ?>" data-item-id="<?php echo $user[0]['job_id']; ?>">Send To<br> Laser Dept</a>                <a class="btn btn-s-md btn-default" href="#">Upload To<br> Archive</a>                <a class="btn btn-s-md btn-default" href="#">Upload <br> LSRJSCN</a>                <a class="btn btn-s-md btn-default" href="#">Check List</a>            </div>        </div>    </div></div><div id="mail_box" title="Approval Request" style="display:none;"> </div><script>    $(document).ready(function () {        $("#mail_box").dialog({            autoOpen: false,            resizable: false,            position: 'center',            width: 'auto',            modal: false        });        $('body').on("click", "#mail_to_customer", function (e) {            e.preventDefault();            $.ajax({                url: "<?php echo base_url('cad/cad_mail_to_customer'); ?>",                success: function (response) {                    $('#mail_box').html(response);                    $('#mail_box').dialog('open');                }            });        });                          $('body').on("click", ".laser", function (e) {            e.preventDefault();            var notes = $("#notes").val();            var id = $(this).attr("data-item-id");            $.ajax({                url: "<?php echo base_url('cad/send_to_laser'); ?>",                data: {update_remarks: notes, job_id: id},                type: "POST",                 success: function (response) {                   window.location.href = '<?php echo base_url('cad');?>';                }            });        });    });</script>