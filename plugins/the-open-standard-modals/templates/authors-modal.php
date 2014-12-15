<div class="close-button">
  <a data-modal-close href="#"><img src="<?php theme_image_src('x.svg'); ?>"></a>
</div>

<div class="overlay header">
    <div class="row">
        <div class="medium-8 medium-centered columns">
            <h1 class="tab-section-title"><?php echo ucfirst($modal); ?></h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="columns medium-8 medium-centered">
<!--        <div class="tabs">
            <a class="toggle-author <?php if ($modal == 'authors'): print 'active'; endif; ?>" href="#authors">Authors</a>
            <a class="toggle-author <?php if ($modal == 'contributors'): print 'active'; endif; ?>" href="#contributors">Contributors</a>
        </div> -->
    </div>
</div>
<br>
<div class="row">
    <div class="medium-8 medium-centered columns">
        <div class="tab content <?php if ($modal == 'authors'): print 'active'; endif; ?>" id="authors">
            <?php 
            global $coauthors_plus;
            $authors = $coauthors_plus->search_authors();

            $author_ids = array();
            foreach ($authors as $author) {
                $author_ids[] = $author->ID;
            }

            foreach ($authors as $author) {
                if (!count(get_posts_assigned_to_author($author->data->user_nicename)->posts) && $author->type != 'guest-author')
                    continue;
                include('author-listing-item.php');
            }
            ?>          
        </div>
        <div class="tab content <?php if ($modal == 'contributors'): print 'active'; endif; ?>" id="contributors">
            <?php
            $contributors = get_users(array(
                'role' => 'contributor',
                'fields' => 'ID'
            ));
            foreach ($contributors as $author_id) {
                include('author-listing-item.php');
            }
            ?>
        </div>
    </div>
</div>