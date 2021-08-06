<?php

    /**
    * Registra o CPT portfolio
    */

    function register_portfolio_cpt()
    {
        register_post_type('portfolio', [
            'labels' => [
                'name'               => 'Portfólio',
                'singular_name'      => 'Portfólio',
                'menu_name'          => 'Portfólio',
                'name_admin_bar'     => 'Portfólio',
                'add_new'            => 'Adicionar novo projeto',
                'add_new_item'       => 'Adicionar projeto',
                'new_item'           => 'Novo projeto',
                'edit_item'          => 'Editar projeto',
                'view_item'          => 'Ver projeto',
                'all_items'          => 'Todos os projetos',
                'search_items'       => 'Buscar projetos',
                'parent_item_colon'  => 'Projeto Pai:',
                'not_found'          => 'Nenhum projeto encontrado.',
                'not_found_in_trash' => 'Nenhum projeto encontrado na lixeira.',
            ],
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'show_in_nav_menus'  => true,
            'query_var'          => true,
            'rewrite'            => array( 'slug' => 'portfolio' ),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon'          => 'dashicons-images-alt2',
            'supports'           => array('title', 'editor', 'thumbnail', 'custom-fields'),
        ]);
    }
    add_action('init', 'register_portfolio_cpt', 1);

    function get_portfolio($quantidade = null)
    {
        $args = [
            'post_type'     => 'portfolio',
            'post_status'   => 'publish',
            'orderby'       => 'title',
            'order'         => 'DESC',
            'posts_per_page' => $quantidade?$quantidade:999999,
        ];

        $query = new WP_Query( $args );

        $projetos = [];
        if ( $query->have_posts() ) {
            while ( $query->have_posts() ) {
                $query->the_post();
                
                $titulo = esc_html( get_the_title() );
                $link = esc_html( get_the_content() );
                $thumb = esc_html( get_the_post_thumbnail(get_the_ID(), "full") );
                $resumo = esc_html( get_the_excerpt() );
                
                $projetos[] = [
                    'titulo'     => $titulo,
                    'link'       => $link,
                    'thumb'      => $thumb,
                    'resumo'     => $resumo
                ];
            }
        }

        wp_reset_postdata();

        return $projetos;
    }