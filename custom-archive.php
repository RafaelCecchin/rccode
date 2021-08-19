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
        <section class="posts<?= !($paged)?' first':'' ?>">
            <h2 class="only-semantics">Posts</h2>
                <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
            
                <!-- To see additional archive styles, visit the /parts directory -->
                <?php get_template_part( 'parts/loop', 'custom-archive' );	?>
                <?php endwhile; ?>	
                <?php else : ?>
                    <?php get_template_part( 'parts/content', 'missing' ); ?>
                <?php endif; ?>	

        </section>
        <section class="paginate-links">
            <h2 class="only-semantics">Paginação</h2>
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
        </section>
    </div>
</section>