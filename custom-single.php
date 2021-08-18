<section class="archive-page">
    <div class="content">
        <h1><?php post_type_archive_title() ?></h1>
        <article class="post">
            <h2 class="only-semantics">Post</h2>
                <?php if ($loop->have_posts()) : while ($loop->have_posts()) : $loop->the_post(); ?>
		 
                <!-- To see additional archive styles, visit the /parts directory -->
                <?php get_template_part( 'parts/loop', 'archive-licitacao' );	?>
                
                <?php endwhile; ?>	

                    <?php joints_page_navi(); ?>
                    
                <?php else : ?>
                                            
                    <?php get_template_part( 'parts/content', 'missing' ); ?>
                        
                <?php endif; ?>	
        </article>
    </div>
</section>