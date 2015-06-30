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
			<hr>
		</div>
		<div class="row">
		<h4 class="text-center">TEMPLATE ORDER</h4>
			<div class="col-lg-3">
				<label class="col-lg-12 control-label">TYPE OF TEMPLATE:</label>
			</div>
			<div class="col-lg-2">
				<input type="checkbox" id="smt_only"> <label for="smt_only">SMT ONLY</label>
			</div>
			<div class="col-lg-2">
				<input type="checkbox" id="smt_pth"> <label for="smt_pth">SMT & PTH </label>
			</div>
			<div class="col-lg-5">
				<div class="col-lg-6"><input type="checkbox" id="other_spc"> <label for="other_spc">OTHER (specify)</label></div>
				<div class="col-lg-6"><input type="text" class="form-control"></div>
			</div>
		</div>
		<div class="row padding">
			<div class="col-lg-12">
				<input type="checkbox" id="Ensure_size1"> <label for="Ensure_size1">Ensure the min. opening size is greater than 45 mils </label>
			</div>
			<div class="col-lg-12">
				<input type="checkbox" id="Ensure_size2"> <label for="Ensure_size2">Ensure the polarity Dcode is assigned to D666  </label>
			</div>
			<div class="col-lg-8">
				<div class="row padding">
					<div class="col-lg-4"><input type="checkbox" id="temp_size"> <label for="temp_size">TEMPLATE SIZE :</label></div>
					<div class="col-lg-3"><input type="text" class="form-control"></div>
					<div class="col-lg-1">x</div>
					<div class="col-lg-3"><input type="text" class="form-control"></div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="col-lg-4 pull-right form-group">
					<label class="col-lg-4 control-label">QTY:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control">
					</div>
				</div>
			</div>
			<div class="row">
			<div class="col-lg-6 form-group">
				<label class="col-lg-4 control-label">CAD DESIGN BY:</label>
				<div class="col-lg-8">
					<input type="text" class="form-control">
				</div>
			</div>
			</div>
			<div class="row">
			<div class="col-lg-6 form-group">
				<label class="col-lg-4 control-label">COSIGN BY:</label>
				<div class="col-lg-8">
					<input type="text" class="form-control">
				</div>
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
