<ul class="nav nav-tabs"> 
<?php if(user_has_right(ADMIN)) { ?>
    <li class="<?php echo ($this->uri->segment(1) == "admin" && $this->uri->segment(2) == 'order_status') ? 'active' : ''; ?>"><a href="<?php echo base_url('admin/order_status');?>">ALL</a></li> 
<?php } if(user_has_right(CAD)) { ?>
    <li class="<?php echo ($this->uri->segment(1) == "cad") ? 'active' : ''; ?>"><a href="<?php echo base_url('cad');?>">CAD</a></li> 
<?php } if(user_has_right(LASER)) { ?>
    <li class="<?php echo ($this->uri->segment(1) == "laser") ? 'active' : ''; ?>"><a href="<?php echo base_url('laser');?>">LASER</a></li> 
<?php } if(user_has_right(PRODUCTION)) { ?>
    <li class=""><a href="#tab4" data-toggle="tab">PRODUCTION</a></li> 
<?php } if(user_has_right(COMPLETED)) { ?>
    <li class=""><a href="#tab5" data-toggle="tab">HISTORY</a></li> 
<?php } if(user_has_right(HOLD)) { ?>
    <li class=""><a href="#tab6" data-toggle="tab">ONHOLD</a></li> 
<?php } ?>
</ul>