
<div class="content">
    <div class="container">
        <div class="content-grids">
            <div class="col-md-8 content-main">
                <div class="content-grid">
                    <div class="content-grid-head">
                        <h3>POST OF THE DAY</h3>
                        <h4>July 24, 2014,Posted by: <a href="#"><?php echo $get_all_post_info_by_id->admin_name?></a></h4>
                        <div class="clearfix"></div>
                    </div>
                    <div class="content-grid-single">
                        <h3><?php echo $get_all_post_info_by_id->post_title?></h3>
                        <img class="single-pic" src="<?php echo base_url()?>post_image/<?php echo $get_all_post_info_by_id->post_image?>" alt=""/>
                        <p><?php echo $get_all_post_info_by_id->post_description?></p>
                        
                        <div class="comments">
                            <h3>Comment</h3>
                            <div class="fb-comments" data-href="<?php echo current_url()?>" data-numposts="5"></div>
                        </div>
                    </div>

                </div>			 			 
            </div>

            <?php echo $sidebar;?>
            
            <div class="clearfix"></div>
        </div>
    </div>
</div>