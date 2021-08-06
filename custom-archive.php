<section class="archive-page">
    <div class="content">
        <h1><?php post_type_archive_title() ?></h1>
        <?php 
            global $paged;

            $loop = new WP_Query(array(
                'posts_per_page'    => 12,
                'paged'             => $paged,
                'post_type'         => get_post_type()
            )); 
        ?>
        <div class="posts<?= !($paged)?' first':'' ?>">
            <h2 class="only-semantics">Posts</h2>
                <?php if ( $loop->have_posts() ) {
                    while ( $loop->have_posts() ) {
                        $loop->the_post();
                        ?>
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
                        <?php
                    }
                }
            ?>
        </div>
        <div class="paginate-links">
            <?php
                $big = 999999999;
                
                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', get_pagenum_link($big) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $loop->max_num_pages,
                    'prev_text' => '',
                    'next_text' => ''
                ) );
            ?>
        </div>
    </div>
</section>