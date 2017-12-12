<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="index.html">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Tables</a></li>
    </ul>
    <div style="color:red">
        <?php echo $this->session->flashdata('message'); ?>
    </div>
    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>Post Id</th>
                            <th>Post Ttile</th>
                            <th>Post Image</th>
                            <th>Publication Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php foreach ($get_all_post_info as $single_post) { ?> 
                            <tr>
                                <td class="center"><?php echo $single_post->post_id; ?></td>
                                <td class="center"><?php echo $single_post->post_title; ?></td>
                                <td class="center"><img src="<?php echo base_url() ?>post_image/<?php echo $single_post->post_image; ?>" style="width:200px;height:70px"/></td>
                                <td class="center">
                                    <?php if ($single_post->pstatus == 1) { ?>
                                        <span class="label label-success">Published</span>
                                    <?php } else {
                                        ?>
                                        <span class="label label-danger">UnPublished</span>
                                    <?php }
                                    ?>
                                </td>
                                <td class="center">
                                    <?php if ($single_post->pstatus == 1) { ?>
                                        <a class="btn btn-danger" onclick="return confirm('Are You Sure Unpublished Post')" href="<?php echo base_url()?>Post/unpublished_post/<?php echo $single_post->post_id; ?>">
                                            <i class="halflings-icon white thumbs-down"></i>  
                                        </a>
                                    <?php } 
                                    else {
                                        ?>
                                        <a class="btn btn-success" onclick="return confirm('Are You Sure Published Post')" href="<?php echo base_url()?>Post/published_post/<?php echo $single_post->post_id; ?>">
                                            <i class="halflings-icon white thumbs-up"></i>  
                                        </a>
                                    <?php }
                                    ?>
                                    <a class="btn btn-info" onclick="return confirm('Are You Sure Edit Category')" href="<?php echo base_url()?>Post/edit_post/<?php echo $single_post->post_id; ?>">
                                        <i class="halflings-icon white edit"></i>  
                                    </a>
                                    <a class="btn btn-danger" onclick="return confirm('Are You Sure Delete Post')" href="<?php echo base_url()?>Post/deleted_post/<?php echo $single_post->post_id; ?>">
                                        <i class="halflings-icon white trash"></i> 
                                    </a>
                                </td>
                            </tr>
                        <?php } ?> 
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->




</div><!--/.fluid-container-->

<!-- end: Content -->