
            </section> 
    			<a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> 
        </section> <!-- /.vbox --> 
	</section>
<script src="js/app.v2.js"></script> 
<script src="js/datepicker/bootstrap-datepicker.js"></script>
<script src="js/fuelux/fuelux.js"></script> 
<script src="js/parsley/parsley.min.js" cache="false"></script> 
<script src="js/parsley/parsley.extend.js" cache="false"></script> <!-- select2 --> 
<script src="js/libs/jquery.pjax.js" cache="false"></script>
<script src="js/charts/morris/raphael-min.js" cache="false"></script> 
<script src="js/charts/morris/morris.min.js" cache="false"></script>
<link rel="stylesheet" href="js/datatables/datatables.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.2.custom.css">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script src="js/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.7.2.custom.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
	$(".laser").click(function(){
		$(".nav-tabs li").removeClass("active");
$(".nav-tabs li").eq(2).addClass("active");
$('[id^=helpDialog]').dialog('close');
});
});
$().ready( function () {
    $(function(){
    
            // jQuery UI Dialog
            //for position of dialog (do in click function for viewport change):
            //subtract link width and height so dialog covers link
            //add/subtract 1 because browsers round the offset to nearest integer   
    
            $('[id^=helpDialog]').dialog({
                autoOpen: false,
                modal: false,
                resizable: false,
				width:'auto'
            });
            });
			$(document).on('click', '#ex-close', function() {
   $('[id^=helpDialog]').dialog('close');
});
            //get help btn number user clicked on and show appr. help info
            $('.help').click(function() {
            	//strip off prefix of buttin id to get number for dialog
                var helpBtnIdPrefix = 'helpBtn';
                var helpBtnNum = $(this).attr('id').substring((helpBtnIdPrefix.length));
                
                //offset returns top and left of element
                var helpBtnOffset = $('#helpBtn' + helpBtnNum).offset();
                //width of element
                var helpBtnWidth = $('#helpBtn' + helpBtnNum).width();
                //width of dialog box
                var dialogWidth = $('#helpDialog' + helpBtnNum).dialog('option', 'width');
                
                //x and y positions of dialog box
                //x position: add btn width and subtract dialog width from btn left offset
                //y postion: subtract window top postion from btn top offset if user scrolled
                $('#helpDialog' + helpBtnNum).dialog('option','position',[helpBtnOffset.left+helpBtnWidth-dialogWidth,helpBtnOffset.top-$(window).scrollTop()]);
                $('#helpDialog' + helpBtnNum).dialog('open');
            });
            
            //added close btn at bottom of dialog
            $('[id^=closeHelp]').click(function() {
                var closeHelpPrefix = 'closeHelp';
                var closeHelpNum = $(this).attr('id').substring((closeHelpPrefix.length));
                $('#helpDialog' + closeHelpNum).dialog('close');
            });
});            
</script>


<div id="helpDialog1" title="Order #test" style="display:none;">
	<div class="dialog_con1">
	<div class="bar"><img src="images/tick-512.png"></div>
	<div class="row">
        <div class="col-lg-3">
        	<div class="doc-buttons">
        	<a id="helpBtn2" class="btn btn-s-md btn-default help button" href="#">Display <br>Order Form</a>
            <a id="helpBtn3" class="btn btn-s-md btn-default help button" href="#">Download Job</a>
            <a id="helpBtn5" class="btn btn-s-md btn-default help button" href="#">Mail <br>To Customer</a>
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
</div>

<div id="helpDialog2" title="Order Form #test" style="display:none;">
<div class="dialog_con1">
	<div class="bar"><img src="images/tick-512.png"></div>
    <div class="row">
    	<div class="col-lg-12">
        	Beam On
        </div>
    </div>
	
</div>
</div>

<div id="helpDialog3" title="Download Confirmation" style="display:none;">
<div class="dialog_con2">
    <div class="row">
    	<div class="col-lg-12">
        	<div class="bar">Whould You Like to Download and Design?</div>
            <div class="doc-buttons dialog_btn">
            	<a id="helpBtn4" class="btn btn-s-md btn-default help button" href="#">Yes</a><a id="ex-close" class="btn btn-s-md btn-default" href="#">No, Just Download</a>
            </div>
        </div>
    </div>
	
</div>
</div>

<div id="helpDialog4" title="Attention!" style="display:none;">
<div class="dialog_con2">
    <div class="row">
    	<div class="col-lg-12">
        	<div class="bar">Job has been Downloaded already and in design. Download anyway?</div>
            <div class="doc-buttons dialog_btn">
            	<a class="btn btn-s-md btn-default" href="#">Yes</a><a id="ex-close" class="btn btn-s-md btn-default" href="#">No</a>
            </div>
        </div>
    </div>
	
</div>
</div>

<div id="helpDialog5" title="Approval Request" style="display:none;">
<div class="dialog_con1">
    <div class="row">
    	<div class="col-lg-12">
        <form class="form-horizontal">
        	<div class="form-group"> <label class="col-sm-2 control-label" for="input-id-1">To</label> <div class="col-sm-10"> <input type="email" class="form-control" id="input-id-1"> </div> </div>
            <div class="form-group"> <label class="col-sm-2 control-label" for="input-id-1">Cc</label> <div class="col-sm-10"> <input type="email" class="form-control" id="input-id-1"> </div> </div>
            <div class="form-group"> <label class="col-sm-2 control-label" for="input-id-1">Attachments</label> <div class="col-sm-10"> <input type="file" class="form-control" id="input-id-1"> </div> </div>
            <div class="form-group"> <label class="col-sm-2 control-label" for="input-id-1">Subject</label> <div class="col-sm-10"> <textarea class="form-control"></textarea> </div> </div>
            <div class="form-group"> <label class="col-sm-2 control-label" for="input-id-1"></label> <div class="col-sm-10"> <button class="btn btn-primary" type="submit">Send</button></div> </div>
            
            
            </form>
        </div>
    </div>
	
</div>
</div>

<div id="helpDialog6" title="Ref #test" style="display:none;">
<div class="dialog_con3">
<div class="bar"><a class="btn btn-s-md btn-default" href="#">Priority #2</a></div>
    <div class="row">
    	
        <div class="col-lg-4 extra_pad">
        	<a class="btn btn-s-md btn-default" href="#">Foil Thickness: <br>5 Miles</a>
        </div>
        <div class="col-lg-4 extra_pad">
        	<a class="btn btn-s-md btn-default" href="#">Frame Size: <br> Foli Only</a>
        </div>
        <div class="col-lg-4 extra_pad">
        	<a class="btn btn-s-md btn-default" href="#">Foil Type:<br>Z2</a>
        </div>
        <div class="col-lg-4 extra_pad">
        	<a class="btn btn-s-md btn-default" href="#">Lead Free</a>
        </div>
        <div class="col-lg-4 extra_pad">
        	<a class="btn btn-s-md btn-default" href="#">Electro Polish</a>
        </div>
        
        
        <div class="col-lg-6 extra_pad">
        	<a class="btn btn-s-md btn-default" href="#">Compliance Sheet REQUIRED</a>
            <div class="col-sm-12 extra_pad"> Yes</div> 
        </div>
        <div class="col-lg-6 extra_pad">
        	<div class="form-group"> 
                <label class="col-sm-3 control-label" for="input-id-1">Note</label> 
                <div class="col-sm-9"> Dummy Text Dummy Text Dummy Text Dummy Text Dummy Text</div> 
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="bar">
        	<a class="btn btn-s-md btn-default" href="#">Print QR</a>
        </div>
    </div>
	
</div>
</div>

</body>
</html>