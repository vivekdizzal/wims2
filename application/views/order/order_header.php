<ul class="nav nav-tabs"> 
    <li class="<?php echo ($this->uri->segment(1) == "admin" && $this->uri->segment(2) == 'order_status') ? 'active' : ''; ?>"><a href="<?php echo base_url('index.php/admin/order_status');?>">ALL</a></li> 
    <li class="<?php echo ($this->uri->segment(1) == "cad") ? 'active' : ''; ?>"><a href="<?php echo base_url('index.php/cad');?>">CAD</a></li> 
    <li class=""><a href="#tab3" data-toggle="tab">LASER</a></li> 
    <li class=""><a href="#tab4" data-toggle="tab">PRODUCTION</a></li> 
    <li class=""><a href="#tab5" data-toggle="tab">HISTORY</a></li> 
    <li class=""><a href="#tab6" data-toggle="tab">ONHOLD</a></li> 
</ul>