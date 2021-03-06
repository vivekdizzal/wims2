<div class="dialog_con1 pull-left checklist_form" id="fixit_checklist">
    <form class="bs-example form-horizontal to_submit" action="<?php echo base_url("cad/checklist_submit"); ?>" id="cad_fixit_checklist_form">
        <input type="hidden" name="order_status_id" id="check_list_order_sts_id" value="<?php echo $order_status_id; ?>">
        <input type="hidden" name="fc_completed" value="1">
        <div class="row">
            <hr style="margin-top:0;">
        </div>
        <div class="row check_style">
            <h4 class="text-center">FIXIT</h4>
            <div class="col-lg-12">
                <input type="checkbox" name="fc_cp_1" id="review_order"> <label for="review_order">Review Order Form To Determine Reason For Fixit</label>
            </div>
            <div class="col-lg-12">
                <input type="checkbox" name="fc_cp_2" id="rename_files"> <label for="rename_files">Rename Files To Add An "F"</label>
            </div>
            <div class="col-lg-12">
                <input type="checkbox" name="fc_cp_3" id="save_layer"> <label for="save_layer">Save Layer With Additions As " *.FIX " And Old Job Layer As " *.NOW " </label>
            </div>
            <div class="col-lg-12">
                <input type="checkbox" name="fc_cp_4" id="print_high"> <label for="print_high">Print The Combined .FIX And .NOW Layer Without The Border And Highlight The Alignment Points</label>
            </div>
            <div class="col-lg-12">
                <input type="checkbox" name="fc_cp_5" id="target_layer"> <label for="target_layer">Ensure The Targets Are Converted To Donut In Fix Layer.</label>
            </div>
            <!--            <div class="col-lg-12 form-group" style="padding-top:20px;">
                                            <label class="col-lg-3">CAD Design By:</label>
                                            <div class="col-lg-5">
                                                    <input type="text" class="form-control">
                                            </div>
                                    </div>-->
            <div class="col-lg-12 padding">
                <label class="col-lg-3">Estimated Pad Count:</label>
                <div class="col-lg-5">
                    <input type="text" name="fc_pad_count" class="form-control">
                </div>
            </div>
            <div class="col-lg-12 form-group">
                <label class="col-lg-3">Note to Laser:</label>
                <div class="col-lg-9">
                    <textarea class="form-control" name="fc_notes" style="height:200px;"></textarea>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="col-lg-3 control-label pull-right text-right">
                    <input class="btn btn-success" type="submit" value="Submit">
                </div>
                <div class="col-lg-3 control-label pull-right text-right">
                    <a target="_blank" href="<?php echo base_url('cad/print_checklist'); ?>" class="pull-right print_checklist btn btn-success">Print</a>
                </div>
            </div>
        </div>
    </form>
</div>
</div>