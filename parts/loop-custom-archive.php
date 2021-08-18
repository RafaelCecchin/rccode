<article class="post">
    <a class="thumb-container" rel="noopener" rel="noreferrer" href="<?= the_permalink() ?>"  title="<?php the_title_attribute(); ?>">
        <?php
        
            if (has_post_thumbnail()) {
                the_post_thumbnail(get_the_ID(), "full");
            } else { 
                echo '<img src="'.get_stylesheet_directory_uri().'/assets/images/default-image.jpg"/>';
            }                            
            ?>
    </a>
    <a class="title-container" rel="noopener" rel="noreferrer" href="<?= the_permalink() ?>"> <h2><?= esc_html( get_the_title() ) ?></h2></a>
</article>