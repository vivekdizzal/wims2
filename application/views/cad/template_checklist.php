<div class="dialog_con1 pull-left checklist_form">
    <form class="bs-example form-horizontal to_submit" action="<?php echo base_url("cad/checklist_submit"); ?>" id="cad_template_checklist_form">
         <input type="hidden" name="order_status_id" id="check_list_order_sts_id" value="<?php echo $order_status_id; ?>">
                        <!--<input type="hidden" name="order_id" id="check_list_order_id" value="<?php // echo $order_id; ?>">-->
    
         <div class="row">
             <hr style="margin-top:0;">
         </div>
		<div class="row">
		<h4 class="text-center">TEMPLATE ORDER</h4>
		<div class="row">
			<div class="col-lg-3 radio_style">
				<label class="col-lg-12 text-left1 control-label">TYPE OF TEMPLATE:</label>
			</div>
			<div class="col-lg-2 radio_style">
				<input type="radio" name="tc_template_type" id="smt_only">  <label class="margin-none-label" for="smt_only">SMT ONLY</label>
			</div>
			<div class="col-lg-2 radio_style">
				<input type="radio" name="tc_template_type" id="smt_pth"> <label class="margin-none-label" for="smt_pth">SMT & PTH </label> 
			</div>
			<div class="col-lg-5 radio_style">
				<div class="col-lg-7"><input type="radio" name="tc_template_type" id="other_spc"><label class="margin-none-label" for="other_spc">OTHER (specify)</label>  </div>
				<div class="col-lg-5"><input type="text" class="form-control"></div>
			</div>
		</div>
		</div>
		<div class="row padding check_style">
			<div class="col-lg-12">
				<input type="checkbox" name="tc_cp_1" id="Ensure_size1"> <label for="Ensure_size1">Ensure the min. opening size is greater than 45 mils </label>
			</div>
			<div class="col-lg-12">
				<input type="checkbox" name="tc_cp_2" id="Ensure_size1"> <label for="Ensure_size2">Ensure the polarity Dcode is assigned to D666  </label>
			</div>
			<div class="col-lg-8">
				<div class="row padding">
                                    <div class="col-lg-4"><input type="checkbox" name="tc_temp_size" id="temp_size"> <label for="temp_size">Template Size:</label></div>
					<div class="col-lg-2" style="padding-left: 4px;"><input type="text" name="tc_temp_size1" class="form-control"></div>
					<div class="col-lg-1">x</div>
					<div class="col-lg-2" style="padding-left: 4px;"><input type="text" name="tc_temp_size2" class="form-control"></div>
				</div>
			</div>
			<div class="row">
			<div class="col-lg-12">
				<div class="col-lg-8 pull-left form-group">
					<label class="col-lg-4">Qty:</label>
					<div class="col-lg-2">
						<input type="text" class="form-control">
					</div>
				</div>
			</div>
<!--			<div class="col-lg-12">
			<div class="col-lg-8 form-group">
				<label class="col-lg-4">CAD Design By:</label>
				<div class="col-lg-8">
					<input type="text" class="form-control">
				</div>
			</div>
			</div>
			<div class="col-lg-12">
			<div class="col-lg-8 form-group">
				<label class="col-lg-4">Cosign By:</label>
				<div class="col-lg-8">
					<input type="text" class="form-control">
				</div>
			</div>
			</div>-->
			</div>
			<div class="col-lg-12">
				<div class="col-lg-3 control-label pull-right text-right">
					<input class="btn btn-success" type="submit" value="Submit">
				</div>
			</div>
		</div>
	</form>
</div>
		</div>