<div class="dialog_con1 checklist_form">
    <form class="bs-example form-horizontal" id="cad_checklist_form">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Aperture Count</label> 
                    <div class="col-lg-7"> 
                        <input type="hidden" name="check_list_order_sts_id" id="check_list_order_sts_id" value="<?php echo $ord_sts_id; ?>">
                        <input type="hidden" name="check_list_order_id" id="check_list_order_id" value="<?php echo $ord_id; ?>">
                        <input type="text" class="form-control" name="cl_aperture_content" id="cl_aperture_content" data-id="cl_aperture_content">
                        <div id="cl_aperture_content_em" class="errorMessage"></div>
                    </div>
                    
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Frame used</label> 
                    <div class="col-lg-7"> 
                        <input name="cl_frame_used"  data-id="cl_frame_used" id="cl_frame_used" type="text" class="form-control cad_check_ajax">  
                    <div id="cl_frame_used_em" class="errorMessage"></div>
                    </div> 
                    
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Enter BOT Ref. Des. </label> 
                    <div class="col-lg-7"> 
                        <input type="text" class="form-control" name="bot_ref_des" id="bot_ref_des" data-id="bot_ref_des">  
                    <div id="bot_ref_des_em" class="errorMessage"></div>
                    </div>
                    
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Foil Thickness</label> 
                    <div class="col-lg-7" style="padding: 0;">  
                        <div class="col-lg-6">  
                            <label> 
                                <input type="text" class="form-control" name="cl_foil_thik[]" data-id="cl_foil_thik">
                            </label>
                        </div>
                        <div class="col-lg-6">  
                            <label> 
                                <input type="text" class="form-control" name="cl_foil_thik[]" data-id="cl_foil_thik">
                            </label>
                        </div>
                        <div class="col-lg-6">  
                            <label> 
                                <input type="text" class="form-control" name="cl_foil_thik[]" data-id="cl_foil_thik">
                            </label>
                        </div>
<!--                        <div class="col-lg-6">
                            <a href="#" class="add_more_in_chklist">Add more</a>
                        </div>-->
                        <div id="cl_foil_thik_em" class="errorMessage"></div>
                    </div>
                    

                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">CAD Engineer</label> 
                    <div class="col-lg-7"> 
                        <input readonly="" type="text" class="form-control" name="cad_design_engineer" id="cad_design_engineer" value="<?php echo $this->session->userdata("user_name"); ?>">  
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Fiducial Quantity</label> 
                    <div class="col-lg-7" style="padding: 0;">  
                        <div class="col-lg-6">  
                            <label> <input type="text" class="form-control" name="cl_fiducial_qty[]" id="cl_fiducial_qty" data-id="cl_fiducial_qty"></label> 
                        </div><div class="col-lg-6">
                            <label> <input type="text" class="form-control" name="cl_fiducial_qty[]" id="cl_fiducial_qty" data-id="cl_fiducial_qty"></label> 
                        </div><div class="col-lg-6">
                            <label> <input type="text" class="form-control" name="cl_fiducial_qty[]" id="cl_fiducial_qty" data-id="cl_fiducial_qty"></label> 
                        </div>
<!--                        <div class="col-lg-6">
                            <a href="#" class="add_more_in_chklist">Add more</a>
                        </div>-->
                         <div id="cl_fiducial_qty_em" class="errorMessage"></div>
                    </div>
                   
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Fiducial Dcode</label> 
                    <div class="col-lg-7" style="padding: 0;">  
                        <div class="col-lg-6">  
                            <label> <input type="text" class="form-control" name="cl_fiducial_dcode[]" id="cl_fiducial_dcode" data-id="cl_fiducial_dcode"> </label> 
                        </div><div class="col-lg-6">
                            <label> <input type="text" class="form-control" name="cl_fiducial_dcode[]" id="cl_fiducial_dcode" data-id="cl_fiducial_dcode"> </label> 
                        </div><div class="col-lg-6">
                            <label> <input type="text" class="form-control" name="cl_fiducial_dcode[]" id="cl_fiducial_dcode" data-id="cl_fiducial_dcode"> </label> 
                        </div>
<!--                        <div class="col-lg-6">
                            <a href="#" class="add_more_in_chklist">Add more</a>
                        </div>-->
                        <div id="cl_fiducial_dcode_em" class="errorMessage"></div>
                    </div>
                </div>
                
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Border used</label> 
                    <div class="col-lg-7"> 
                        <select class="form-control" name="cl_border_used" id="cl_border_used" data-id="cl_border_used" STYLE="padding:0;">
                            <option>Select Border</option>
                        </select>
                        <div id="cl_border_used_em" class="errorMessage"></div>
                    </div> 
                </div>
                
            </div>
        </div>
        <div class="row cad_form">
            <div class="col-lg-5">
                <div class="form-group"> 
                    <input type="checkbox" name="lead_free_mark" id="lead_free_mark" class="cad_ajax_chkboxes" value="Lead Free" data-id="lead_free_mark"> 
                    <label class="col-lg-5 control-label lead_free_mark" for="lead_free_mark">
                        Lead Free
                    </label> 
                    <input type="checkbox" name="ship_tooling" id="ship_tooling" class="cad_ajax_chkboxes" value="Ship W/ Tooling" data-id="ship_tooling">
                    <label class="col-lg-5 control-label"  for="ship_tooling">
                        Ship W/ Tooling
                    </label> 
                    <div id="lead_free_mark_em" class="errorMessage"></div>
                <div id="ship_tooling_em"  class="errorMessage" style="text-align: right;"></div>
                </div> 
                
                <div class="form-group"> 
                        <input type="checkbox" name="fg_material" id="fg_material" class="cad_ajax_chkboxes" value="Datum FG" data-id="fg_material">
                    <label for="fg_material" class="col-lg-5 control-label">
                        Datum FG
                    </label>
                        <input type="checkbox" name="inspect_template" id="inspect_template" class="cad_ajax_chkboxes" value="Ship W/ Template" data-id="inspect_template">
                    <label for="inspect_template" class="col-lg-5 control-label">
                        Ship W/ Template
                    </label> 
                        <div id="fg_material_em" class="errorMessage"></div>
            <div id="inspect_template_em" class="errorMessage" style="text-align: right;"></div>
                </div>
                
            </div>
            
            
            
            <div class="col-lg-7">
                <div class="form-group"> 
                    <input type="checkbox" name="epo_coat" id="electropolish" class="cad_ajax_chkboxes" value="Electropolish" data-id="epo_coat">
                    <label for="electropolish" class="col-lg-3 control-label" style="width: 172px;">
                        Electropolish
                    </label> 
                       <input type="checkbox" name="nano_coat" id="nano_coat" class="cad_ajax_chkboxes" value="Nano Coat" data-id="epo_coat">
                    <label for="nano_coat" class="col-lg-3 control-label">
                        Nano Coat
                    </label> 
                    <input type="checkbox" name="film_plots" id="film_plots" class="cad_ajax_chkboxes" value="Ship W/ Plot" data-id="film_plots">
                    <label for="film_plots" class="col-lg-3 control-label">
                        Ship W/ Plot
                    </label> 
                    <div id="electropolish_em" class="errorMessage"></div>
                    <div id="nano_coat_em" class="errorMessage"  style="text-align: center;"></div>
                <div id="film_plots_em" class="errorMessage" style="text-align: right;"></div>
                </div>
                

                <div class="form-group"> 
<!--                    <input type="checkbox" name="nano_coat" id="nano_coat" class="cad_ajax_chkboxes" value="Nano Coat" data-id="epo_coat">
                    <label for="nano_coat" class="col-lg-3 control-label">
                        Nano Coat
                    </label> -->

                    <input type="checkbox" name="premium" id="premium" class="cad_ajax_chkboxes" data-id="premium">
                    <label for="premium" class="col-lg-3 control-label" style="width: 172px;">
                        Premium
                    </label> 
                    <input type="checkbox" name="s_sample"  id="s_sample" class="cad_ajax_chkboxes" data-id="s_sample">
                    <label for="s_sample" class="col-lg-3 control-label">
                        S&R using sample
                    </label> 
                    <input type="checkbox" name="scaling" id="scaling" class="cad_ajax_chkboxes" data-id="scaling">
                    <label for="scaling" class="col-lg-3 control-label">
                        Scaling
                    </label> 
                </div>
<!--                <div class="form-group"> 
                    <input type="checkbox" name="s_sample"  id="s_sample" class="cad_ajax_chkboxes" data-id="s_sample">
                    <label for="s_sample" class="col-lg-3 control-label">
                        S&R using sample
                    </label> 
                    <input type="checkbox" name="scaling" id="scaling" class="cad_ajax_chkboxes" data-id="scaling">
                    <label for="scaling" class="col-lg-3 control-label">
                        Scaling
                    </label> 

                </div>-->
            </div>
        </div>
<!--        <div id="lead_free_mark_em" class="errorMessage" style="text-align: right;"></div>-->

        <div class="row">
            <div class="col-lg-12"> 
                <div class="form-group">
                    <label class="col-lg-9 control-label">Review customer instructions. Don't proceed if unclear</label> 
                    <div class="checkbox"> <input type="checkbox" name="cust_instr" id="cust_instr" data-id="cust_instr" class="control-label-check cad_ajax_chkboxes" > </div>
                </div><div id="cust_instr_em" class="errorMessage"></div>
                <div class="form-group">
                    <label class="col-lg-9 control-label">Check all .pdf,.dxf,.dwg,.hpg or other drawing files to see if board is panelised</label> 
                    <div class="checkbox"> <input type="checkbox" name="check_drawing" id="check_drawing" data-id="check_drawing" class="control-label-check cad_ajax_chkboxes" > </div>
                </div><div id="check_drawing_em" class="errorMessage"></div>
                <div class="form-group">
                    <label class="col-lg-9 control-label">Verify ther are no missing smt pads by checking against silkscreen and mask.</label> 
                    <div class="checkbox"> <input type="checkbox" name="silkscr_check" id="silkscr_check" data-id="silkscr_check" class="control-label-check cad_ajax_chkboxes" > </div>
                </div><div id="silkscr_check_em" class="errorMessage"></div>
                <div class="form-group">
                    <label class="col-lg-9 control-label">Reverify customer special instructions.</label> 
                    <div class="checkbox"> <input type="checkbox" name="spl_instr" id="spl_instr" data-id="spl_instr" class="control-label-check cad_ajax_chkboxes" > </div>
                </div><div id="spl_instr_em" class="errorMessage"></div>
                <div class="form-group">
                    <label class="col-lg-12">Notes</label> 
                    <div class="col-lg-12">
                        <textarea style="height: auto;" name="notes" placeholder="Notes" data-required="true" data-minwords="6" rows="2" class="form-control parsley-validated"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input id="notes_to_laser" class="form-control" type="file" value="Attach file" >
                        <input class="pull-right" type="submit" value="Submit">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">

                    </div>
                </div>
            </div>
        </div> 
    </form>
</div>