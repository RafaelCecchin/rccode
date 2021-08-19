<?php
    $post_type_obj = get_post_type_object( get_post_type() );
    $title = apply_filters('post_type_archive_title', $post_type_obj->labels->name );
?>
<section class="single-page">
    <div class="content">
        <h1 class="only-semantics"><?= $title ?></h1>
        <?php 
            the_post(); 
            get_template_part( 'parts/loop', 'custom-single' );
        ?>     
    </div>
</section>