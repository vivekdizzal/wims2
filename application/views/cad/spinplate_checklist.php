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
			<h4 class="text-center">GERBER EDITING</h4>
			<div class="col-lg-12">
				<input type="checkbox" id="silkscreen"> <label for="silkscreen">COMBINE BOTTOM PASTE LAYER AND SILKSCREEN TOGETHER</label>
			</div>
			<div class="col-lg-12">
				<input type="checkbox" id="mirror"> <label for="mirror">MIRROR THE FILE SO THAT IT IS "WRONG READING"</label>
			</div>
			<div class="col-lg-12">
				<input type="checkbox" id="rectangle"> <label for="rectangle">CREATE A NEW LAYER THAT HAS A RECTANGULAR OUTLINE OF THE BOARDS EXTENTS USE A .001 DRAW AND INCLUDE </label>
			</div>
			<div class="col-lg-12">
				<input type="checkbox" id="compositive"> <label for="compositive">ADD TEXT TO COMPOSITE LAYER USING .015 DRAW</label>
			</div>
			<div class="col-lg-12">
				<input type="checkbox" id="beamlogo"> <label for="beamlogo">ADD <b>BEAM ON</b> LOGO</label>
			</div>
			<div class="col-lg-12">
				<input type="checkbox" id="outline"> <label for="outline">SAVE OUTLINE FILE RS-274X WITH ".CUT" EXTENSION AND SEND TO LASER</label>
			</div>
			<div class="col-lg-12">
				<input type="checkbox" id="plot"> <label for="plot">SAVE COMPOSITE FILE FIRE9XXX AND SEND TO PLOT</label>
			</div>
			<div class="col-lg-12">
				<div class="col-lg-4 pull-right form-group">
					<label class="col-lg-4 control-label">CAD:</label>
					<div class="col-lg-8">
						<input type="text" class="form-control">
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<label class="col-lg-3 control-label">SPECIAL INSTRUCTIONS:</label>
				<div class="col-lg-9">
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