<div class="dialog_con1">
    <form class="bs-example form-horizontal">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Aperture Count</label> 
                    <div class="col-lg-7"> 
                        <input type="hidden" name="check_list_order_sts_id" id="check_list_order_sts_id" value="<?php echo $ord_sts_id; ?>">
                        <input type="hidden" name="check_list_order_id" id="check_list_order_id" value="<?php echo $ord_id; ?>">
                        <input type="text" class="form-control cad_check_ajax" name="cl_aperture_content" id="cl_aperture_content">  
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Frame used</label> 
                    <div class="col-lg-7"> 
                        <input name="cl_frame_used" id="cl_frame_used" type="text" class="form-control cad_check_ajax">  
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Foil Thickness</label> 
                    <div class="col-lg-3">  
                        <label> 
                            <input type="text" class="form-control" name="cl_foil_thickness" id="cl_foil_thickness"> 
                        </label>
                    </div>
                    <div class="col-lg-3">
                        <a href="#" class="add_more_in_chklist">Add more</a>
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
                    <div class="col-lg-3">  
                        <label> <input type="text" class="form-control" name="cl_fiducial_qty" id="cl_fiducial_qty">&nbsp; </label> 
                    </div>
                    <div class="col-lg-3">
                        <a href="#" class="add_more_in_chklist">Add more</a>
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Fiducial Dcode</label> 
                    <div class="col-lg-3">  
                        <label> <input type="text" class="form-control" name="cl_fiducial_dcode" id="cl_fiducial_dcode">&nbsp; </label> 
                    </div>
                    <div class="col-lg-3">
                        <a href="#" class="add_more_in_chklist">Add more</a>
                    </div>
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Border used</label> 
                    <div class="col-lg-7"> <input type="text" class="form-control" name="cl_border_used" id="cl_border_used">  
                    </div> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Lead Free</label> 
                    <div class="col-lg-7">  
                        <div class="checkbox"> 
                            <label> 
                                <input type="checkbox" name="lead_free_mark" id="lead_free_mark" class="cad_ajax_chkboxes">&nbsp; 
                            </label> </div>
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label" >Ship W/ Tooling</label> 
                    <div class="col-lg-7">  
                        <div class="checkbox"> 
                            <label>
                                <input type="checkbox"name="" id="" class="cad_ajax_chkboxes">&nbsp; 
                            </label> </div>
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Datum FG</label> 
                    <div class="col-lg-7">  
                        <div class="checkbox"> 
                            <label> 
                                <input type="checkbox" name="fg_material" id="fg_material" class="cad_ajax_chkboxes">&nbsp; 
                            </label> 
                        </div>
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Ship W/ Template</label> 
                    <div class="col-lg-7">  
                        <div class="checkbox">
                            <label> 
                                <input type="checkbox" name="inspect_template" id="inspect_template" class="cad_ajax_chkboxes">&nbsp; 
                            </label>
                        </div>
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Enter BOT Ref. Des. </label> 
                    <div class="col-lg-7"> <input type="text" class="form-control">  
                    </div> 
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Electropolish</label> 
                    <div class="col-lg-7">  
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="epo_coat" id="epo_coat" class="cad_ajax_chkboxes">&nbsp; 
                            </label>
                        </div>
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Ship W/ Plot</label> 
                    <div class="col-lg-7">  
                        <div class="checkbox"> 
                            <label> 
                                <input type="checkbox" name="film_plots" id="film_plots" class="cad_ajax_chkboxes">&nbsp;
                            </label>
                        </div>
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">COAT Nano Coat</label> 
                    <div class="col-lg-7">  
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="" id="" class="cad_ajax_chkboxes">&nbsp; 
                            </label>
                        </div>
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Premium</label> 
                    <div class="col-lg-7">  
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="" id="" class="cad_ajax_chkboxes">&nbsp;
                            </label> 
                        </div>
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">S&R using sample</label> 
                    <div class="col-lg-7">  
                        <div class="checkbox">
                            <label> 
                                <input type="checkbox" name="" id="" class="cad_ajax_chkboxes">&nbsp;
                            </label> 
                        </div>
                    </div> 
                </div>
                <div class="form-group"> 
                    <label class="col-lg-5 control-label">Scaling</label> 
                    <div class="col-lg-7">  
                        <div class="checkbox"> 
                            <label> 
                                <input type="checkbox" name="" id="" class="cad_ajax_chkboxes">&nbsp; 
                            </label> 
                        </div>
                    </div> 
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
                        <textarea placeholder="Notes" data-required="true" data-minwords="6" rows="2" class="form-control parsley-validated"></textarea>
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