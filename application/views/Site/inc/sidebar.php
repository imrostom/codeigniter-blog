<div class="col-md-4 content-main-right">
    <div class="search">
        <h3>SEARCH HERE</h3>
        <form action="<?php echo base_url(); ?>Site/search" method="post">
            <input name="search" type="text">
            <input type="submit" value="">
        </form>
    </div>
    <div class="categories">
        <h3>CATEGORIES</h3>
        <?php foreach ($get_all_category_info as $single_category) { ?>
            <li><a href="<?php echo base_url() ?>Site/all_category_post_by_id/<?php echo $single_category->category_id ?>"><?php echo $single_category->category_name ?></a></li>
        <?php } ?>
    </div>
    <div class="archives">
        <h3>Recent Post</h3>
        <?php foreach ($get_all_recent_post_info as $rpost) { ?>
            <li><a href="<?php echo base_url() ?>Site/single/<?php echo $rpost->post_id ?>"><?php echo $rpost->post_title; ?></a></li>
        <?php } ?>
    </div>

    <div class="archives">
        <h3>Popular Post</h3>
        <?php foreach ($get_all_popular_post_info as $popu_post) { ?>
            <li><a href="<?php echo base_url() ?>Site/single/<?php echo $popu_post->post_id ?>"><?php echo $popu_post->post_title; ?></a></li>
        <?php } ?>
    </div>
</div>