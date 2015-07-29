<div class="col-lg-3 pull-left chick_type">
     <input type="hidden" name="check_list_order_sts_id" id="check_list_order_sts_id" value="<?php echo $ord_sts_id; ?>">
                        <input type="hidden" name="check_list_order_id" id="check_list_order_id" value="<?php echo $ord_id; ?>">
	<div class="form-group">
		<a href="<?php echo base_url("cad/rework_checklist"); ?>" data-id="rework_checklist" class="col-lg-10 btn btn-s-md btn-default rework checklist_type button">
			Rework Product Checklist
		</a>
	</div>
	<div class="form-group">
            <a href="<?php echo base_url("cad/spinplate_checklist"); ?>" data-id="spinplate_checklist" class="col-lg-10 btn btn-s-md btn-default checklist_type button">
			Spinplate Checklist
		</a>
	</div>
	<div class="form-group">
            <a href="<?php echo base_url("cad/template_checklist"); ?>" data-id="template_checklist" class="col-lg-10 btn btn-s-md btn-default checklist_type button">
			Template Checklist
		</a>
	</div>
	<div class="form-group">
            <a href="<?php echo base_url("cad/fixit_checklist"); ?>" data-id="fixit_checklist" class="col-lg-10 btn btn-s-md btn-default checklist_type button">
			Fix it Checklist
		</a>
	</div>
	<div class="form-group">
            <a href="<?php echo base_url("cad/stencil_checklist"); ?>" data-id="stencil_checklist" class="col-lg-10 btn btn-s-md btn-default checklist_type button">
			Stencil Checklist
		</a>
	</div>
</div>
 <div class="row pull-right col-lg-9">
  <div class="row">
    <div class="col-lg-11">
			<div class="col-lg-6 form-group">
				<label class="col-lg-4 control-label">REF.#:</label>
                                <div class="col-lg-8">
                                    <input type="hidden" id="ord_ref" value="<?php echo $order_details['order_code'];?>">
                                    <?php echo $order_details['order_code'];?>
				</div>
			</div>
			<div class="col-lg-6 form-group">
				<label class="col-lg-5 control-label">CUSTOMER:</label>
				<div class="col-lg-7">
					<?php echo $cust_name['cust_name'];?>
				</div>
			</div>
			<div class="col-lg-6 form-group">
				<label class="col-lg-4 control-label">DATE:</label>
				<div class="col-lg-8">
                                    <?php echo date("m-d-Y");?>
				</div>
			</div>
        <div class="col-lg-6 form-group"> 
                    <label class="col-lg-5 text-left1 control-label">CAD Engineer</label> 
                    <div class="col-lg-7"> 
                        <input readonly="" type="text" class="form-control" name="cad_design_engineer" id="cad_design_engineer" value="<?php echo $this->session->userdata("user_name"); ?>">  
                    </div> 
                </div>

<!--		<div class="row">
			<hr style="margin-bottom:10;">
		</div>-->
</div>
</div>
<div id="checklist_form"></div>
