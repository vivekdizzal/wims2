<div class="dialog_con1 pull-left checklist_form">
	<form class="bs-example form-horizontal" id="cad_checklist_form">
        <div class="row">
			<div class="col-lg-4 form-group">
				<label class="col-lg-4 control-label">REF. #</label>
				<div class="col-lg-8">
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="col-lg-4 form-group">
				<label class="col-lg-4 control-label">CUSTOMER</label>
				<div class="col-lg-8">
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="col-lg-4 form-group">
				<label class="col-lg-4 control-label">DATE:</label>
				<div class="col-lg-8">
					<input type="text" class="form-control">
				</div>
			</div>
		</div>
		<div class="row">
			<hr style="margin-bottom:0;">
		</div>
		<div class="row">
			<h4 class="text-center">FIXIT</h4>
			<div class="col-lg-12">
				<input type="checkbox" id="review_order"> <label for="review_order">REVIEW ORDER FORM TO DETERMINE REASON FOR FIXIT</label>
			</div>
			<div class="col-lg-12">
				<input type="checkbox" id="rename_files"> <label for="rename_files">RENAME FILES TO ADD AN "F"</label>
			</div>
			<div class="col-lg-12">
				<input type="checkbox" id="save_layer"> <label for="save_layer">SAVE LAYER WITH ADDITIONS AS " *.FIX " AND OLD JOB LAYER AS " *.NOW " </label>
			</div>
			<div class="col-lg-12">
				<input type="checkbox" id="print_high"> <label for="print_high">PRINT THE COMBINED .FIX AND .NOW LAYER WITHOUT THE BORDER AND HIGHLIGHT THE ALIGNMENT POINTS</label>
			</div>
			<div class="col-lg-12">
				<input type="checkbox" id="target_layer"> <label for="target_layer">ENSURE THE TARGETS ARE CONVERTED TO DONUT IN FIX LAYER.</label>
			</div>
			<div class="col-lg-12 padding">
				<div class="col-lg-6 pull-left form-group">
					<label class="col-lg-5 control-label">CAD DESIGN BY :</label>
					<div class="col-lg-7">
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="col-lg-6 pull-right form-group">
					<label class="col-lg-6 control-label">ESTIMATED PAD COUNT:</label>
					<div class="col-lg-6">
						<input type="text" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<label class="col-lg-2 control-label">NOTE TO LASER:</label>
				<div class="col-lg-10">
					<textarea class="form-control" style="height:200px;"></textarea>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="col-lg-3 control-label pull-right text-right">
					<input class="btn btn-success" type="submit" value="submit">
				</div>
			</div>
		</div>
	</form>
</div>