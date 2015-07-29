<section id="pjax-container" class="scrollable">
    <section class="vbox">
        <header>            
            <div class="row b-b m-l-none m-r-none">   
                <div class="col-sm-4">           
                    <h3 class="m-t m-b-none">WIMS</h3>  
                    <p class="block text-muted"></p>    
                </div>                
            </div>         
        </header>
        <section class="wrapper">
            <div class="row">	
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading font-bold">
                            Mail Functions
                            <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                            <div class="pull-right">
                                <a class="btn btn-success" href="<?php echo base_url(); ?>cad/view_mail_templates">Mail Templates</a></div>
                            <div class="clearfix"></div>
                        </header>
                        <div class="panel-body">
                            <form accept-charset="utf-8" method="post" class="m-b-sm form-horizontal" id="mailing_subject" action="mail_templates"> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="mail_reg">Mail Regarding</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="validate[required] form-control" id="mail_reg" value="" name="mail_reg">
                                        </div>	
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="mail_subject">Mail Subject</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="validate[required] form-control" id="mail_subject" value="" name="mail_subject">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" for="mail_message">Mail Message</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" id="mail_message" name="mail_body" style="width: 323px; height: 300px; resize: none;"></textarea>
                                        </div>
                                    </div>	
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success pull-right" value="Submit">
                                    </div>
                                </div>
                            </form>   
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
</section>
<script>
    $(document).ready(function () {
        $("#mailing_subject").validationEngine();
    });</script>