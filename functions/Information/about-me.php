<?php

    function display_about_me_submenu() {

        echo '<div class="wrap">
        <h1>About me</h1>
        <form method="post" action="options.php">';
                
            settings_fields( 'about_me_group_settings' ); // settings group name
            do_settings_sections( 'about_me' ); // just a page slug
            submit_button();

        echo '</form></div>';

    }

    add_action( 'admin_init',  'register_about_me_settings' );

    function register_about_me_settings() {

        // Adiciona a sessão
        add_settings_section(
            'about_me_section_settings', // section ID
            '', // title (if needed)
            '', // callback function (if needed)
            'about_me' // page slug
        );

        // Sobre mim - Título
        register_setting(
            'about_me_group_settings', // settings group name
            'about_me_title', // option name
            //'sanitize_text_field' // sanitization function
        );

        add_settings_field(
            'about_me_title',
            'Title',
            'about_me_title_html', // function which prints the field
            'about_me', // page slug
            'about_me_section_settings', // section ID

            array( 
                'label_for' => 'about_me_title',
                'class' => 'information', // for <tr> element
            )
        );

        // Sobre mim - Texto
        register_setting(
            'about_me_group_settings', // settings group name
            'about_me_text', // option name
            //'sanitize_text_field' // sanitization function
        );

        add_settings_field(
            'about_me_text',
            'Text',
            'about_me_text_html', // function which prints the field
            'about_me', // page slug
            'about_me_section_settings', // section ID

            array( 
                'label_for' => 'about_me_text',
                'class' => 'information', // for <tr> element
            )
        );
    }

    function about_me_title_html(){

        $text = get_option( 'about_me_title' );

        printf(
            '<input type="text" id="about_me_title" name="about_me_title" value="%s" />',
            esc_attr( $text )
        );
    }

    function about_me_text_html(){

        $text = get_option( 'about_me_text' );

        printf(
            '<textarea id="about_me_text" name="about_me_text" style="resize: both; width: 350px; height: 200px;"/> %s </textarea>',
            esc_attr( $text )
        );

    }