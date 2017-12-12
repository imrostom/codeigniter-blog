<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url()?>Admin/index">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="<?php echo base_url()?>Category/add_post">Add Post</a>
        </li>
    </ul>
    
    <div style="color:red">
        <?php echo $this->session->flashdata('message');?>
    </div>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Post</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo base_url()?>Post/save_post" method="post" enctype="multipart/form-data">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Post Title </label>
                            <div class="controls">
                                <input type="text" name="post_title" class="span6 typeahead" id="typeahead" >
                            </div>
                        </div>
   
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Post Description</label>
                            <div class="controls">
                                <textarea name="post_description" class="cleditor" id="textarea2" rows="3"></textarea>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Select Image</label>
                            <div class="controls">
                                <input type="file" name="post_image" class="span6 typeahead" id="typeahead" >
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Select Category</label>
                            <div class="controls">
                                <select name="post_category">
                                    <?php foreach($get_published_category as $single_published_category){?>
                                    <option value="<?php echo $single_published_category->category_id;?>"><?php echo $single_published_category->category_name;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        
                        
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Publication Status</label>
                            <div class="controls">
                                <select name="publication_status">
                                    <option value="1">Published</option>
                                    <option value="0">UnPublished</option>
                                </select>
                            </div>
                        </div>
                        
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->