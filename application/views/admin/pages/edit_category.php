<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url() ?>Admin/index">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="<?php echo base_url() ?>Category/edit_category">Edit Category</a>
        </li>
    </ul>

    <div style="color:red">
        <?php echo $this->session->flashdata('message'); ?>
    </div>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Category</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form name="edit_category_form" class="form-horizontal" action="<?php echo base_url() ?>Category/update_category" method="post">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Category Name </label>
                            <div class="controls">
                                <input type="text" name="category_name" value="<?php echo $edit_category_by_id->category_name; ?>" class="span6 typeahead" id="typeahead" >
                                <input type="hidden" name="category_id" value="<?php echo $edit_category_by_id->category_id; ?>" class="span6 typeahead" id="typeahead" >
                            </div>
                        </div>

                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Category Description</label>
                            <div class="controls">
                                <textarea name="category_description" class="cleditor" id="textarea2" rows="3">
                                    <?php echo $edit_category_by_id->category_description; ?>
                                </textarea>
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

<script type="text/javascript">
    document.forms['edit_category_form'].elements['publication_status'].value = <?php echo $edit_category_by_id->publication_status; ?>
</script>