<div class="dialog_con1">
    <div class="bar"><img src="<?php echo base_url('assets/images/tick-512.png'); ?>"></div>
	<div class="row">
        <div class="col-lg-3">
        	<div class="doc-buttons">
        	<a id="helpBtn2" class="btn btn-s-md btn-default help button" href="#">Display <br>Order Form</a>
            <a id="helpBtn3" class="btn btn-s-md btn-default help button" href="#">Download Job</a>
            <a id="mail_to_customer" class="btn btn-s-md btn-default help button" href="#">Mail <br>To Customer</a>
            <a id="" class="btn btn-s-md btn-default help button" href="#">Download <br>Comlete Job</a>
            </div>
        </div>
        <div class="col-lg-6">
        <section class="panel">
			<div class="table-responsive">
        	<table class="table table-striped">
            	<tr>
                	<th>Date & Time</th><th>Status</th><th>User</th>
                </tr>
                <tr>
                	<td>Test</td><td>Test</td><td>Test</td>
                </tr>
                <tr>
                	<td>Test</td><td>Test</td><td>Test</td>
                </tr>
                <tr>
                	<td>Test</td><td>Test</td><td>Test</td>
                </tr>
                <tr>
                	<td>Test</td><td>Test</td><td>Test</td>
                </tr>
                <tr>
                	<td>Test</td><td>Test</td><td>Test</td>
                </tr>
            </table>
            	
            </div>
            </section>
            <label>Notes</label>
                <input type="text">
        </div>
        
        	
        <div class="col-lg-3">
        <div class="doc-buttons">
        	<a class="btn btn-s-md btn-default laser" data-toggle="tab" href="#tab3">Send To<br> Laser Dept</a>
            <a class="btn btn-s-md btn-default" href="#">Upload To<br> Archive</a>
            <a class="btn btn-s-md btn-default" href="#">Upload <br> LSRJSCN</a>
            <a class="btn btn-s-md btn-default" href="#">Check List</a>
            </div>
        </div>
        </div>
</div>
<div id="mail_box" title="Approval Request" style="display:none;"> </div>
<script>
       $(document).ready(function () {
        $("#mail_box").dialog({
    autoOpen: false,
    resizable: false,
    position: 'center',
    width: 'auto',
    modal: false
});
        //get help btn number user clicked on and show appr. help info
        $('#mail_to_customer').click(function () {
            // e.preventDefault();
            var job_id = $(this).attr("data-item-id");

            $.ajax({
            url: "<?php echo base_url('index.php/cad/cad_mail_to_customer'); ?>",
                    data: {job_id: job_id},
                    type: "GET",
                    success: function (response) {
                        $("#mail_box").html(response);
                        $( "#mail_box" ).dialog("open");
                    }
        });
    });
    });
    </script>

