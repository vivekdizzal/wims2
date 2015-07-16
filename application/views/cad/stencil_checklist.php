<div class="dialog_con1 pull-left checklist_form" id="print_checklist">
    <form class="bs-example form-horizontal" id="cad_stencil_checklist_form">
        <div class="row">
            <hr style="margin-top:0;">
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group"> 
                    <input type="hidden" name="order_status_id" id="check_list_order_sts_id" value="<?php echo $order_status_id; ?>">
                    <input type="hidden" name="order_id" id="check_list_order_id" value="<?php echo $order_id; ?>">
                    <label class="col-lg-5 text-left1 control-label">Aperture Count</label> 
                    <div class="col-lg-7"> 
                        <input type="text" class="form-control" name="sc_aperture_content" id="sc_aperture_content" data-id="sc_aperture_content">
                        <div id="sc_aperture_content_em" class="errorMessage"></div>
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 text-left1 control-label">Frame used</label> 
                    <div class="col-lg-7"> 
                        <input name="sc_frame_used"  data-id="sc_frame_used" id="sc_frame_used" type="text" class="form-control cad_check_ajax" autocomplete="on">  
                        <div id="sc_frame_used_em" class="errorMessage"></div>
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 text-left1 control-label">Enter BOT Ref. Des. </label> 
                    <div class="col-lg-7"> 
                        <input type="text" class="form-control" name="sc_bot_ref_des" id="bot_ref_des" data-id="bot_ref_des">  
                        <div id="bot_ref_des_em" class="errorMessage"></div>
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 text-left1 control-label">Foil Thickness</label> 
                    <div class="col-lg-7" style="padding: 0;">  
                        <div class="col-lg-4 row_padd">  
                            <label> 
                                <input type="text" class="" name="sc_foil_thik[]" placeholder="Primary" data-id="sc_foil_thik">
                            </label>
                        </div>
                        <div class="col-lg-4 row_padd">  
                            <label> 
                                <input type="text" class="" name="sc_foil_thik[]" placeholder="1st Step" data-id="sc_foil_thik">
                            </label>
                        </div>
                        <div class="col-lg-4 row_padd">  
                            <label> 
                                <input type="text" class="" name="sc_foil_thik[]" placeholder="2nd Step" data-id="sc_foil_thik">
                            </label>
                        </div>
                        <div id="sc_foil_thik_em" class="errorMessage"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"> 
                    <label class="col-lg-5 text-left1 control-label">Fiducial Quantity</label> 
                    <div class="col-lg-7" style="padding: 0;">  
                        <div class="col-lg-3 text_original">  
                            <label> <input type="text" maxlength="2" class="" name="sc_fiducial_qty[]" id="sc_fiducial_qty" data-id="sc_fiducial_qty"></label> 
                        </div><div class="col-lg-3 text_original">
                            <label> <input type="text" maxlength="2" class="" name="sc_fiducial_qty[]" id="sc_fiducial_qty" data-id="sc_fiducial_qty"></label> 
                        </div><div class="col-lg-3 text_original">
                            <label> <input type="text" maxlength="2" class="" name="sc_fiducial_qty[]" id="sc_fiducial_qty" data-id="sc_fiducial_qty"></label> 
                        </div>
                        <div class="col-lg-3 text_original">
                            <label> <input type="text" maxlength="2" class="" name="sc_fiducial_qty[]" id="sc_fiducial_qty" data-id="sc_fiducial_qty"></label> 
                        </div>
                        <div id="sc_fiducial_qty_em" class="errorMessage"></div>
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 text-left1 control-label">Fiducial Dcode</label> 
                    <div class="col-lg-7" style="padding: 0px 7px 0px 0px;">  
                        <div class="col-lg-3 text_original" style="padding-right: 8px;">  
                            <label> <input type="text" maxlength="4" class="" name="sc_fiducial_dcode[]" id="sc_fiducial_dcode" data-id="sc_fiducial_dcode"> </label> 
                        </div>
                        <div class="col-lg-3 text_original" style="padding-right: 8px;">
                            <label> <input type="text" maxlength="4" class="" name="sc_fiducial_dcode[]" id="sc_fiducial_dcode" data-id="sc_fiducial_dcode"> </label> 
                        </div>
                        <div class="col-lg-3 text_original" style="padding-right: 8px;">
                            <label> <input type="text" maxlength="4" class="" name="sc_fiducial_dcode[]" id="sc_fiducial_dcode" data-id="sc_fiducial_dcode"> </label> 
                        </div>
                        <div class="col-lg-3 text_original" style="padding-right: 8px;">
                            <label> <input type="text" maxlength="4" class="" name="sc_fiducial_dcode[]" id="sc_fiducial_dcode" data-id="sc_fiducial_dcode"> </label> 
                        </div>
                        <!--                        <div class="col-lg-6">
                                                    <a href="#" class="add_more_in_chklist">Add more</a>
                                                </div>-->
                        <div id="sc_fiducial_dcode_em" class="errorMessage"></div>
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 text-left1 control-label">Border used</label> 
                    <div class="col-lg-7"> 
                        <select class="form-control" name="sc_border_used" id="sc_border_used" data-id="sc_border_used" STYLE="padding:0;">
                            <option>Select Border</option>
                        </select>
                        <div id="sc_border_used_em" class="errorMessage"></div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="row cad_form">
            <div class="col-lg-5">
                <div class="form-group"> 
                    <input type="checkbox" name="sc_lead_free_mark" id="lead_free_mark" class="cad_ajax_chkboxes" value="Lead Free" data-id="lead_free_mark"> 
                    <label class="col-lg-5 control-label lead_free_mark" for="lead_free_mark">
                        Lead Free
                    </label> 
                    <input type="checkbox" name="sc_ship_tooling" id="ship_tooling" class="cad_ajax_chkboxes" value="Ship W/ Tooling" data-id="ship_tooling">
                    <label class="col-lg-5 control-label"  for="ship_tooling">
                        Ship W/ Tooling
                    </label> 
                    <div id="lead_free_mark_em" class="errorMessage"></div>
                    <div id="ship_tooling_em"  class="errorMessage" style="text-align: right;"></div>
                </div> 

                <div class="form-group"> 
                    <input type="checkbox" name="sc_fg_material" id="fg_material" class="cad_ajax_chkboxes" value="Datum FG" data-id="fg_material">
                    <label for="fg_material" class="col-lg-5 control-label">
                        Datum FG
                    </label>
                    <input type="checkbox" name="sc_inspect_template" id="inspect_template" class="cad_ajax_chkboxes" value="Ship W/ Template" data-id="inspect_template">
                    <label for="inspect_template" class="col-lg-5 control-label">
                        Ship W/ Template
                    </label> 
                    <div id="fg_material_em" class="errorMessage"></div>
                    <div id="inspect_template_em" class="errorMessage" style="text-align: right;"></div>
                </div>
                <div class="form-group"> 
                    <input type="checkbox" name="sc_back_etch" id="back_etch" class="cad_ajax_chkboxes" value="Datum FG" data-id="back_etch">
                    <label for="back_etch" class="col-lg-5 control-label">
                        Back Etch
                    </label>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="form-group"> 
                    <input type="checkbox" name="sc_epo_coat" id="epo_coat" class="cad_ajax_chkboxes" value="Electropolish" data-id="epo_coat">
                    <label for="epo_coat" class="col-lg-3 control-label" style="width: 172px;">
                        Electropolish
                    </label> 
                    <input type="checkbox" name="sc_nano_coat" id="nano_coat" class="cad_ajax_chkboxes" value="Nano Coat" data-id="epo_coat">
                    <label for="nano_coat" class="col-lg-3 control-label">
                        Nano Coat
                    </label> 
                    <input type="checkbox" name="sc_film_plots" id="film_plots" class="cad_ajax_chkboxes" value="Ship W/ Plot" data-id="film_plots">
                    <label for="film_plots" class="col-lg-3 control-label">
                        Ship W/ Plot
                    </label> 
                    <div id="epo_coat_em" class="errorMessage"></div>
                    <div id="nano_coat_em" class="errorMessage"  style="text-align: center;"></div>
                    <div id="film_plots_em" class="errorMessage" style="text-align: right;"></div>
                </div>


                <div class="form-group"> 
                    <input type="checkbox" name="sc_premium" id="premium" class="" data-id="premium">
                    <label for="premium" class="col-lg-3 control-label" style="width: 172px;">
                        Premium
                    </label> 
                    <input type="checkbox" name="sc_s_sample"  id="s_sample" class="" data-id="s_sample">
                    <label for="s_sample" class="col-lg-3 control-label">
                        S&R using sample
                    </label> 
                    <input type="checkbox" name="sc_scaling" id="scaling" class="" data-id="scaling">
                    <label for="scaling" class="col-lg-3 control-label">
                        Scaling
                    </label> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 check_style"> 
                <div class="form-group col-lg-12">
                    <input type="checkbox" name="sc_cp_1" id="cust_instr" data-id="cust_instr" class="control-label-check" ><label for="cust_instr" class="">Review customer instructions. Don't proceed if unclear</label> 
                </div>
                <div id="cust_instr_em" class="errorMessage"></div>
                <div class="form-group col-lg-12">
                    <input type="checkbox" name="sc_cp_2" id="check_drawing" data-id="check_drawing" class="control-label-check" ><label for="check_drawing" class="">Check all .pdf,.dxf,.dwg,.hpg or other drawing files to see if board is panelised</label> 

                </div><div id="check_drawing_em" class="errorMessage"></div>
                <div class="form-group col-lg-12">
                    <input type="checkbox" name="sc_cp_3" id="silkscr_check" data-id="silkscr_check" class="control-label-check" ><label for="silkscr_check" class="">Verify ther are no missing smt pads by checking against silkscreen and mask.</label> 

                </div><div id="silkscr_check_em" class="errorMessage"></div>
                <div class="form-group col-lg-12">
                    <input type="checkbox" name="sc_cp_4" id="spl_instr" data-id="spl_instr" class="control-label-check" ><label for="spl_instr" class="">Reverify customer special instructions.</label> 

                </div><div id="spl_instr_em" class="errorMessage"></div>
            </div>
        </div>
        <div class="row padding">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="col-lg-3">Notes</label> 
                    <div class="col-lg-9">
                        <textarea style="height: auto;" name="sc_notes" placeholder="Notes" data-required="true" data-minwords="6" rows="2" class="form-control parsley-validated"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <div class="col-sm-10">
                        <input id="notes_to_laser" class="form-control" type="file" value="Attach file" >
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="col-lg-2 control-label pull-right text-right">
                            <input class="btn btn-success" type="submit" value="Submit">
                        </div>
                        <div class="col-lg-2 control-label pull-right text-right">
                            <a target="_blank" href="<?php echo base_url('cad/print_stncil_checklist'); ?>" class="pull-right print_stencil btn btn-success">Print</a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </form>
</div>
