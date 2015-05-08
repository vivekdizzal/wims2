	
<section id="pjax-container" class="scrollable"><section class="vbox">
        <header> 
            <div class="row b-b m-l-none m-r-none"> 
                <div class="col-sm-4"> 
                    <h3 class="m-t m-b-none">Welcome to WIMS</h3> 
                    <p class="block text-muted"></p> 
                </div> 
            </div> 
        </header>
        <section class="wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading font-bold">User Rights</header>
                        <div class="panel-body">
                            <div class="col-lg-8">
                                <?php
                                if (!empty($givenright)) {
                                    $given = array();
                                    foreach ($givenright['user'] as $givn) {
                                        array_push($given, $givn["sm_id"]);
                                    }
                                    ?>

                                    <form accept-charset="utf-8" method="post" class="form-horizontal" id="update_rights" action="">


                                        <input type="hidden" id="usr_id" value="<?php echo $usr_id; ?>" name="usr_id">
                                        <input type="hidden" id="mm_id" value="<?php echo $givn['mm_id']; ?>" name="mm_id">

                                        <?php
                                        foreach ($rights as $right) {


                                            if (in_array($right->sm_index, $given)) {
                                                $checked = 'checked ="checked"';
                                            } else {
                                                $checked = '';
                                            }
                                            ?>
                                            <div class="col-sm-4">
                                                <input type="checkbox" value="<?php echo $right->sm_index; ?>" name="sm_id[]" <?php echo $checked; ?>>
                                                <label><?php echo $right->sm_name; ?></label>	 </div>
                                        <?php }
                                        ?>
                                        <div class="col-sm-12">
                                            <input type="submit" class="btn btn-success pull-right" value="Submit" name="submit">

                                        </div></form></div>
                            <?php } else {
                                ?>   <form accept-charset="utf-8" method="post" class="form-horizontal" id="update_rights" action="">

                                    <input type="hidden" id="usr_id" value="<?php echo $usr_id; ?>" name="usr_id">
                                    <?php foreach ($rights as $right) { ?>

                                        <input type="hidden" id="mm_id" value="<?php echo $right->mm_id; ?>" name="mm_id">
                                        <div class="col-sm-4">
                                            <input type="checkbox" value="<?php echo $right->sm_index; ?>" name="sm_id[]">
                                            <label><?php echo $right->sm_name; ?></label>	 </div>

                            <?php }
                            ?>
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-success pull-right" value="Submit" name="submit">
                            </div> </form></div>
                    <?php
                }
                ?>
            </div>
            </div>
        </section>
        </div>
        </div>
    </section>
</section>
