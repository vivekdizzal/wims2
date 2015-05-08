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
                                        <header class="panel-heading"> List of User's <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> <div class="pull-right"><a class="btn btn-success" href="<?php echo base_url(); ?>index.php/admin/add_user">Add New User</a></div>
                                        <div class="clearfix"></div>
                                        </header> 
                                        <div class="table-responsive"> 
                                            <table class="table table-striped m-b-none" data-ride="datatables"> 
                                                <thead> 
                                                    <tr> 
                                                        <th width="">Staff Name</th> 
                                                        <th width="">Login User Name</th> 
                                                        <th width="">User Type</th> 
                                                        <th width="">E-Mail ID</th> 
                                                        <th width="">Mobile</th> 
                                                        <th width="">Actions</th>
                                                    </tr> 
                                                 </thead> 
                                                 <tbody> <?php foreach ($users as $user) { ?>
                                                 	<tr> 
                                                    	<td><?php echo $user->usr_name ; ?></td>
                                                        <td><?php echo $user->usr_logname ; ?></td>
                                                        <td><?php echo $user->usr_type ; ?></td>
                                                        <td><?php echo $user->usr_email ; ?></td>
                                                        <td><?php echo $user->usr_mobile ; ?></td>
                                                        <td>
                                                        <div class="btn-group"> 
                                                        <a href="<?php echo base_url(); ?>index.php/admin/edit_user/<?php echo $user->usr_id; ?>">Edit</a>/
                                                        <a href="<?php echo base_url(); ?>index.php/admin/delete_user/<?php echo $user->usr_id; ?>">Delete</a>/
                                                        <a href="<?php echo base_url(); ?>index.php/admin/user_rights/<?php echo $user->usr_id; ?>">Rights</a>
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
