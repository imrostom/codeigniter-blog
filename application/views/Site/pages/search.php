
        <div class="content">
            <div class="container">
                <div class="content-grids">
                    <div class="col-md-8 content-main">
                        <?php if(!empty($search)){?>
                        <div class="pages">
                           
                            <p>Your Are Search <b style="color:red"><?php echo $search?></b></p>
                           
                        </div>
                        <?php }?>
                        
                       <?php 
                       if($get_all_post_info){
                       foreach($get_all_post_info as $single_post_info){?>

                        <div class="content-grid-sec">
                            <div class="content-sec-info">
                                <h3><a href="<?php echo base_url()?>Site/single/<?php echo $single_post_info->post_id?>"><?php echo $single_post_info->post_title?></a></h3>
                                <h4>Jul 23, 2014, Posted by : <a href="#"><?php echo $single_post_info->admin_name?></a></h4>
                                <p><?php echo $single_post_info->post_description?></p>
                                <img src="<?php echo base_url()?>post_image/<?php echo $single_post_info->post_image?>" alt=""/>
                                <a class="bttn" href="<?php echo base_url()?>Site/single/<?php echo $single_post_info->post_id?>">MORE</a>
                            </div>
                        </div>
                       <?php 
                       
                       
                       }
                       }
                       else{
                           ?>
                        <h2>Your Content Not Found</h2>
                        <?php
                       }
                       ?>	
                        <?php if(!empty($this->pagination->create_links())){?>
                        <div class="pages">
                            <?php echo $this->pagination->create_links();?>
                           
                        </div>
                        <?php }?>
                    </div>
                    
                    <?php echo $sidebar;?>
                    
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
       