<div class="dialog_con1 checklist_form">
    <form class="bs-example form-horizontal">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Aperture Count</label> 
                    <div class="col-lg-7"> 
                        <input type="hidden" name="check_list_order_sts_id" id="check_list_order_sts_id" value="<?php echo $ord_sts_id; ?>">
                        <input type="hidden" name="check_list_order_id" id="check_list_order_id" value="<?php echo $ord_id; ?>">
                        <input type="text" class="form-control" name="cl_aperture_content" id="cl_aperture_content">  
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Frame used</label> 
                    <div class="col-lg-7"> 
                        <input name="cl_frame_used" id="cl_frame_used" type="text" class="form-control cad_check_ajax">  
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Enter BOT Ref. Des. </label> 
                    <div class="col-lg-7"> <input type="text" class="form-control">  
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Foil Thickness</label> 
                    <div class="col-lg-7" style="padding: 0;">  
                        <div class="col-lg-6">  
                            <label> 
                                <input type="text" class="form-control cad_check_multi_ajax" name="cl_foil_thickness[]" data-id="cl_foil_thickness">
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <a href="#" class="add_more_in_chklist">Add more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">CAD Engineer</label> 
                    <div class="col-lg-7"> 
                        <input type="text" class="form-control" name="cad_design_engineer" id="cad_design_engineer">  
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Fiducial Quantity</label> 
                    <div class="col-lg-7" style="padding: 0;">  
                        <div class="col-lg-6">  
                            <label> <input type="text" class="form-control" name="cl_fiducial_qty" id="cl_fiducial_qty"></label> 
                        </div>
                        <div class="col-lg-6">
                            <a href="#" class="add_more_in_chklist">Add more</a>
                        </div>
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Fiducial Dcode</label> 
                    <div class="col-lg-7" style="padding: 0;">  
                        <div class="col-lg-6">  
                            <label> <input type="text" class="form-control" name="cl_fiducial_dcode" id="cl_fiducial_dcode"> </label> 
                        </div>
                        <div class="col-lg-6">
                            <a href="#" class="add_more_in_chklist">Add more</a>
                        </div>
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Border used</label> 
                    <div class="col-lg-7"> 
                        <select class="form-control" name="cl_border_used" id="cl_border_used">
                            <option>Select Border</option>
                        </select>
                    </div> 
                </div>
            </div>
        </div>
        <div class="row cad_form">
            <div class="col-lg-6">
                <div class="form-group"> 
                    <input type="checkbox" name="lead_free_mark" id="lead_free_mark" class="cad_ajax_chkboxes"> <label class="col-lg-5 control-label" for="lead_free_mark">Lead Free</label> 
                    <input type="checkbox" name="" id="Tooling" class="cad_ajax_chkboxes"><label class="col-lg-5 control-label"  for="Tooling">Ship W/ Tooling</label> 
                </div>
                <div class="form-group"> 
                    <input type="checkbox" name="fg_material" id="fg_material" class="cad_ajax_chkboxes"><label for="fg_material" class="col-lg-5 control-label">Datum FG</label> 
                    <input type="checkbox" name="inspect_template" id="inspect_template" class="cad_ajax_chkboxes"><label for="inspect_template" class="col-lg-5 control-label">Ship W/ Template</label> 
                </div>

            </div>
            <div class="col-lg-6">
                <div class="form-group"> 
                    <input type="checkbox" name="epo_coat" id="epo_coat" class="cad_ajax_chkboxes"><label for="epo_coat" class="col-lg-5 control-label">Electropolish</label> 

                    <input type="checkbox" name="film_plots" id="film_plots" class="cad_ajax_chkboxes"><label for="film_plots" class="col-lg-5 control-label">Ship W/ Plot</label> 

                </div>
                <div class="form-group"> 
                    <input type="checkbox" name="epo_coat" id="epo_coat" class="cad_ajax_chkboxes"><label for="epo_coat" class="col-lg-5 control-label">COAT Nano Coat</label> 

                    <input type="checkbox" name="" id="premium"><label for="premium" class="col-lg-5 control-label">Premium</label> 

                </div>
                <div class="form-group"> 
                    <input type="checkbox" name="" id="s_sample"><label for="s_sample" class="col-lg-5 control-label">S&R using sample</label> 


                    <input type="checkbox" name="" id="Scaling"><label for="Scaling" class="col-lg-5 control-label">Scaling</label> 

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12"> 
                <div class="form-group">
                    <label class="col-lg-9 control-label">Review customer instructions. Don't proceed if unclear</label> 
                    <div class="checkbox"> <input type="checkbox" class="control-label-check cad_ajax_chkboxes"> </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-9 control-label">Check all .pdf,.dxf,.dwg,.hpg or other drawing files to see if board is panelised</label> 
                    <div class="checkbox"> <input type="checkbox" class="control-label-check cad_ajax_chkboxes"> </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-9 control-label">Verify ther are no missing smt pads by checking against silkscreen and mask.</label> 
                    <div class="checkbox"> <input type="checkbox" class="control-label-check cad_ajax_chkboxes"> </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-9 control-label">Reverify customer special instructions.</label> 
                    <div class="checkbox"> <input type="checkbox" class="control-label-check cad_ajax_chkboxes"> </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-12">Notes</label> 
                    <div class="col-lg-12">
                        <textarea style="height: auto;" placeholder="Notes" data-required="true" data-minwords="6" rows="2" class="form-control parsley-validated"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <input id="input-id-1" class="form-control" type="file" value="Attach file">
                    </div>
                </div>
            </div> 
        </div>
    </form>
</div>
</div>