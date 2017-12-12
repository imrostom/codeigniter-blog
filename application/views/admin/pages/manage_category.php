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
        <?php echo $this->session->flashdata('message');?>
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
                            <th>Ctegory Id</th>
                            <th>Category Name</th>
                            <th>CAtegory Description</th>
                            <th>Publication Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php foreach($get_all_category as $single_category){?>
                        <tr>
                            <td><?php echo $single_category->category_id;?></td>
                            <td class="center"><?php echo $single_category->category_name;?></td>
                            <td class="center"><?php echo $single_category->category_description;?></td>
                            <td class="center">
                                <?php if($single_category->publication_status==1){?>
                                <span class="label label-success">Published</span>
                                <?php }
                                else{?>
                                <span class="label label-danger">UnPublished</span>
                                <?php }?>
                            </td>
                            <td class="center">
                                <?php if($single_category->publication_status==1){?>
                                <a class="btn btn-danger" onclick="return confirm('Are You Sure Unpublished Category')" href="<?php echo base_url();?>Category/unpublished_category/<?php echo $single_category->category_id;?>">
                                    <i class="halflings-icon white thumbs-down"></i>  
                                </a>
                                <?php }else{?>
                                <a class="btn btn-success" onclick="return confirm('Are You Sure Published Category')" href="<?php echo base_url();?>Category/published_category/<?php echo $single_category->category_id;?>">
                                    <i class="halflings-icon white thumbs-up"></i>  
                                </a>
                                <?php } ?>
                                <a class="btn btn-info" onclick="return confirm('Are You Sure Edit Category')" href="<?php echo base_url();?>Category/edit_category/<?php echo $single_category->category_id;?>">
                                    <i class="halflings-icon white edit"></i>  
                                </a>
                                <a class="btn btn-danger" onclick="return confirm('Are You Sure Delete Category')"href="<?php echo base_url();?>Category/delete_category/<?php echo $single_category->category_id;?>">
                                    <i class="halflings-icon white trash"></i> 
                                </a>
                            </td>
                        </tr>
                        
                        <?php }?>
                        
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->

   


</div><!--/.fluid-container-->

<!-- end: Content -->