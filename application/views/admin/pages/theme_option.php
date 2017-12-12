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
            <a href="<?php echo base_url()?>ThemeOption/add_option">Add Option</a>
        </li>
    </ul>
    
    <div style="color:red">
        <?php echo $this->session->flashdata('message');?>
    </div>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Option</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo base_url()?>ThemeOption/update_option" method="post">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Theme Logo</label>
                            <div class="controls">
                                <input type="text" name="logo" value="<?php get_option('logo');?>" class="span6 typeahead" id="typeahead" >
                            </div>
                        </div>
                        
                        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Theme Copyright</label>
                            <div class="controls">
                                <input type="text" value="<?php get_option('copyright');?>" name="copyright" class="span6 typeahead" id="typeahead" >
                            </div>
                        </div>
                        
                        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Facebook Link</label>
                            <div class="controls">
                                <input type="text" value="<?php get_option('fb_link');?>" name="fb_link" class="span6 typeahead" id="typeahead" >
                            </div>
                        </div>
                        
                        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Twitter Link</label>
                            <div class="controls">
                                <input type="text" value="<?php get_option('tw_link');?>" name="tw_link" class="span6 typeahead" id="typeahead" >
                            </div>
                        </div>
                        
                        
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Linked In</label>
                            <div class="controls">
                                <input type="text" value="<?php get_option('ln_link');?>" name="ln_link" class="span6 typeahead" id="typeahead" >
                            </div>
                        </div>
                        
                        
   
                        <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Widget About Title</label>
                            <div class="controls">
                                 <input type="text" value="<?php get_option('wid_ab_title');?>" name="wid_ab_title" class="span6 typeahead" id="typeahead" >
                            </div>
                        </div>
                        
                        
                         <div class="control-group hidden-phone">
                            <label class="control-label" for="textarea2">Widget About Description</label>
                            <div class="controls">
                                <textarea name="wid_ab_desc" class="cleditor" id="textarea2" rows="3">
                                     <?php get_option('wid_ab_desc');?>
                                </textarea>
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