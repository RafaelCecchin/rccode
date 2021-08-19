<article class="post">
    <?php the_post_thumbnail('full', array('class'=>'thumb')); ?>
    <h1><?php the_title(); ?></h1>
    <div class="the-content">
        <?php the_content(); ?>
    </div>
</article>