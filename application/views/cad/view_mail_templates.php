<section class="scrollable" id="pjax-container"> 
    <header> 
        <div class="row b-b m-l-none m-r-none"> 
            <div class="col-sm-4"> 
                <h3 class="m-t m-b-none">Welcome to WIMS</h3> 
                <p class="block text-muted"></p> 
            </div> 
        </div> 
    </header> 
    <section class="vbox">
        <section class="wrapper"> 
            <div class="tab-content"> 
                <div class="" id="datatable"> 
                    <section class="panel"> 
                        <header class="panel-heading">Mail Templates<i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
                            <div class="pull-right">
                                <a class="btn btn-success" href="<?php echo base_url(); ?>cad/mail_templates">Add New Template</a></div>
                            <div class="clearfix"></div>
                        </header> 
                        <div class="table-responsive"> 
                            <table class="table table-striped m-b-none" data-ride="datatables"> 
                                <thead> 
                                    <tr> 
                                        <th width="">Mail Regarding</th> 
                                        <th width="">Mailing Subject</th> 
                                        <th width="">Mail Body</th> 
                                        <th width="">Actions</th> 
                                    </tr> 
                                </thead> 
                                <tbody> <?php foreach ($templates as $template) { ?>
                                    <tr> 
                                        <td><?php echo $template->mail_reg; ?></td>
                                        <td><?php echo $template->mail_subject; ?></td>
                                        <td><?php echo $template->mail_body; ?></td>
                                        <td>
                                            <div class="btn-group"> 
                                                <a href="<?php echo base_url(); ?>cad/edit_mail_templates/<?php echo $template->mail_id; ?>">Edit</a>/
                                                <a href="<?php echo base_url(); ?>cad/delete_mail_templates/<?php echo $template->mail_id; ?>">Delete</a>/
                                                 <ul class="dropdown-menu pull-right"> 
                                                    <li><a href="#">Edit</a></li> <li><a href="#">Change Rights</a></li> <li><a href="#">Deactivate</a></li> 
                                                </ul> </div>
                                        </td> <?php } ?>
                                    </tr>
                                </tbody> 
                            </table> 
                        </div> 
                    </section> 
                </div> 
            </div> 
        </section> 
    </section>
</section> 

