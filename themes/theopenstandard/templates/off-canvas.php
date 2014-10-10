<?php
    $featured_term_id = get_category_by_slug('featured')->term_id;
    $uncategorized_term_id = get_category_by_slug('uncategorized')->term_id;
    $sponsored_term_id = get_category_by_slug('sponsored')->term_id;
    $lead_term_id = get_category_by_slug('lead')->term_id;

    $categories = get_terms('category', array('hide_empty' => false, 'exclude' => array($featured_term_id, $uncategorized_term_id, $sponsored_term_id, $lead_term_id)));
?>

<aside class="left-off-canvas-menu">
    <!-- NAV -->
    <form role="search" data-search method="get" class="search" action="<?php echo home_url('/search'); ?>">
        <div class="row">
            <div class="medium-12 columns">
                <input type="search" name="s" placeholder="Search The Open Standard">
            </div>
        </div>
    </form>
    <ul class="nav">
        <?php
        foreach ($categories as $category) { 
            $category_posts = get_posts(array('cat' => $category->term_id, 'posts_per_page' => 3)); ?>
            <li class="nav-item">
                <div class="topics-tag-normal <?php echo $category->slug; ?>">
                    <a href="<?php echo get_category_link($category->term_id); ?>"><?php echo $category->name; ?></a>
                </div>
                <ul class="nav-item-list">
                    <?php 
                    foreach ($category_posts as $post) { ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php 
                    }; ?>
                </ul>
            </li>
        <?php
        } ?>

        <li>
            <ul class="social-icon-links inline-list">
                <li><a href="#"><img src="<?php theme_image_src('icons/social-twitter.svg'); ?>"></a></li>
                <li><a href="#"><img src="<?php theme_image_src('icons/social-facebook.svg'); ?>"></a></li>
                <li><a href="#"><img src="<?php theme_image_src('icons/social-google-plus.svg'); ?>"></a></li>
            </ul>
        </li>
    </ul>
</aside>