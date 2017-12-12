
<!--fotter-->
<div class="fotter">
    <div class="container">
        <div class="col-md-4 fotter-info">
            <h3><?php get_option('wid_ab_title'); ?></h3>
            <p><?php get_option('wid_ab_desc'); ?></p>
        </div>
        <div class="col-md-4 fotter-list">
            <h3>Category</h3>
            <ul>
                <?php
                $all_category = $this->Site_Model->get_all_category_info();
                foreach ($all_category as $single_cat) {
                    ?>
                    <li><a href="<?php echo base_url() ?>Site/all_category_post_by_id/<?php echo $single_cat->category_id ?>"><?php echo $single_cat->category_name ?></a></li>
                <?php } ?>
            </ul>
        </div>
        <div class="col-md-4 fotter-media">
            <h3>FOLLOW US ON....</h3>
            <div class="social-icons">
                <a href="<?php get_option('fb_link'); ?>"><span class="fb"> </span></a>
                <a href="<?php get_option('tw_link'); ?>"><span class="twt"> </span></a>
                <a href="<?php get_option('ln_link'); ?>"><span class="in"> </span></a>				 			 
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!---fotter/-->
<div class="copywrite">
    <div class="container">
        <p><?php get_option('copyright'); ?></p>
    </div>
</div>
<!---->
<script type="text/javascript">
    $(document).ready(function () {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear' 
         };
         */
        $().UItoTop({easingType: 'easeOutQuart'});
    });
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


</body>
</html>