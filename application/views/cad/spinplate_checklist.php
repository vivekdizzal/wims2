<div class="dialog_con1 pull-left checklist_form">
    <form class="bs-example form-horizontal to_submit" action="<?php echo base_url("cad/checklist_submit"); ?>" id="cad_spinplate_checklist_form">
         <input type="hidden" name="order_status_id" id="check_list_order_sts_id" value="<?php echo $order_status_id; ?>">
                        <!--<input type="hidden" name="order_id" id="check_list_order_id" value="<?php // echo $order_id; ?>">-->
    
        <div class="row">
            <hr style="margin-top:0;">
        </div>
        <div class="row check_style">
            <h4 class="text-center">GERBER EDITING</h4>
            <div class="col-lg-12">
                <input type="checkbox" name="spc_cp_1" id="silkscreen"> <label for="silkscreen">Combine Bottom Paste Layer and Silkscreen Together</label>
            </div>
            <div class="col-lg-12">
                <input type="checkbox" name="spc_cp_2" id="mirror"> <label for="mirror">Mirror The File So That It Is "WRONG READING"</label>
            </div>
            <div class="col-lg-12">
                <input type="checkbox" name="spc_cp_3" id="rectangle"> <label for="rectangle">Create a New Layer That Has a Rectangular Outline of the Boards Extents Use A .001 Draw and Include</label>
            </div>
            <div class="col-lg-12">
                <input type="checkbox" name="spc_cp_4" id="compositive"> <label for="compositive">Add Text To Composite Layer Using .015 Draw</label>
            </div>
            <div class="col-lg-12">
                <input type="checkbox" name="spc_cp_5" id="beamlogo"> <label for="beamlogo">Add <b>BEAM ON</b> Logo</label>
            </div>
            <div class="col-lg-12">
                <input type="checkbox" name="spc_cp_6" id="outline"> <label for="outline">Save Outline File RS-274S With ".CUT" Extension And Send To Laser</label>
            </div>
            <div class="col-lg-12">
                <input type="checkbox" name="spc_cp_7" id="plot"> <label for="plot">Save Composite File FIRE9XXX And Send To Plot</label>
            </div>
<!--            <div class="col-lg-12 padding">
                <div class="col-lg-8 pull-left form-group">
                    <label class="col-lg-3 text-left">CAD:</label>
                    <div class="col-lg-5">
                        <input type="text" class="form-control">
                    </div>
                </div>
            </div>-->
            <div class="col-lg-12 padding">
                <label class="col-lg-2 text-left">Special Instructions:</label>
                <div class="col-lg-10">
                    <textarea class="form-control" name="spc_spl_instr" style="height:175px;"></textarea>
                </div>
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