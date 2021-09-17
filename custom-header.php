<!doctype html>
<html class="no-js"  <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <!-- Force IE to use the latest rendering engine available -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta class="foundation-mq">
        <!-- If Site Icon isn't set in customizer -->
        <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
            <!-- Icons & Favicons -->
            <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png">
            <link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />	
        <?php } ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        
        <?php 
            function astra_force_remove_style() {
                add_filter( 'print_styles_array', function($styles) {
            
                    // Set styles to remove.
                    $styles_to_remove = array('astra-theme-css', 'astra-addon-css');
                    if(is_array($styles) AND count($styles) > 0){
                        foreach($styles AS $key => $code){
                            if(in_array($code, $styles_to_remove)){
                                unset($styles[$key]);
                            }
                        }
                    }
                    return $styles;
                }); 
            }
            add_action('wp_enqueue_scripts', 'astra_force_remove_style', 99);
            
            wp_head(); 
        ?>
    </head>
			
	<body <?php body_class(); ?>>

		<header class="header" role="banner">
            <div class="content">
                <div class="logo-container">
                    <h1 class="only-semantics">RCCODE</h1>
                    <?php the_custom_logo() ?>
                </div>
                <nav>
                    <h2 class="only-semantics">Barra de nagevação</h2>
                    <div class="menu-desktop">
                        <?php
                            wp_nav_menu( array( 
                                'theme_location' => 'frontpage-nav', 
                                'container'       => false) ); 
                        ?>
                    </div>
                    <div class="menu-mobile">
                        <?php
                            wp_nav_menu( array( 
                                'theme_location' => 'frontpage-nav', 
                                'container'       => false) ); 
                        ?>
                    </div>
                    <div class="menu-mobile-button">
                        <div class="stick-container">
                            <div class="stick"></div>
                            <div class="stick"></div>
                        </div>
                    </div>
                </nav>
                <div class="social-icons">
                    <a target="_blank" rel=”noopener” rel=”noreferrer” href="<?= get_option( 'linkedin_link'  ) ?>"><img title="LinkedIn RCCODE" alt="LinkedIn RCCODE" width="34px" height="34px" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/linkedin.svg"/></a>
                    <a target="_blank" rel=”noopener” rel=”noreferrer” href="<?= get_option(  'whatsapp_link'  ) ?>"><img title="WhatsApp RCCODE" alt="WhatsApp RCCODE" width="34px" height="34px" src="<?php echo get_stylesheet_directory_uri() ?>/assets/images/whatsapp.svg"/></a>
                </div>
            </div>
        </header>