<?php

    function display_services_submenu() {

        echo '<div class="wrap">
        <h1>Services</h1>
        <form method="post" action="options.php">';
                
            settings_fields( 'services_group_settings' ); // settings group name
            do_settings_sections( 'services' ); // just a page slug
            submit_button();

        echo '</form></div>';

    }

    add_action( 'admin_init',  'register_services_settings' );

    function register_services_settings() {

        // Adiciona a sessão principal
        add_settings_section(
            'services_section_settings', // section ID
            '', // title (if needed)
            '', // callback function (if needed)
            'services' // page slug
        );

        // Services - Título
        register_setting(
            'services_group_settings', // settings group name
            'services_title', // option name
            //'sanitize_text_field' // sanitization function
        );

        add_settings_field(
            'services_title',
            'Title',
            'services_title_html', // function which prints the field
            'services', // page slug
            'services_section_settings', // section ID

            array( 
                'label_for' => 'services_title',
                'class' => 'information', // for <tr> element
            )
        );






        // Adiciona a sessão 1
        add_settings_section(
            'services_box1_settings', // section ID
            'First box', // title (if needed)
            '', // callback function (if needed)
            'services' // page slug
        );

        register_setting(
            'services_group_settings', // settings group name
            'services_box1_title', // option name
            //'sanitize_text_field' // sanitization function
        );

        add_settings_field(
            'services_box1_title',
            'Title',
            'services_box1_title_html', // function which prints the field
            'services', // page slug
            'services_box1_settings', // section ID

            array( 
                'label_for' => 'services_box1_title',
                'class' => 'information', // for <tr> element
            )
        );

        register_setting(
            'services_group_settings', // settings group name
            'services_box1_text', // option name
            //'sanitize_text_field' // sanitization function
        );

        add_settings_field(
            'services_box1_text',
            'Text',
            'services_box1_text_html', // function which prints the field
            'services', // page slug
            'services_box1_settings', // section ID

            array( 
                'label_for' => 'services_box1_text',
                'class' => 'information', // for <tr> element
            )
        );





        // Adiciona a sessão 2
        add_settings_section(
            'services_box2_settings', // section ID
            'Second box', // title (if needed)
            '', // callback function (if needed)
            'services' // page slug
        );

        register_setting(
            'services_group_settings', // settings group name
            'services_box2_title', // option name
            //'sanitize_text_field' // sanitization function
        );

        add_settings_field(
            'services_box2_title',
            'Title',
            'services_box2_title_html', // function which prints the field
            'services', // page slug
            'services_box2_settings', // section ID

            array( 
                'label_for' => 'services_box1_title',
                'class' => 'information', // for <tr> element
            )
        );

        register_setting( 
            'services_group_settings', // settings group name
            'services_box2_text', // option name
            //'sanitize_text_field' // sanitization function
        );

        add_settings_field(
            'services_box2_text',
            'Text',
            'services_box2_text_html', // function which prints the field
            'services', // page slug
            'services_box2_settings', // section ID

            array( 
                'label_for' => 'services_box2_text',
                'class' => 'information', // for <tr> element
            )
        );



        // Adiciona a sessão 3
        add_settings_section(
            'services_box3_settings', // section ID
            'Third box', // title (if needed)
            '', // callback function (if needed)
            'services' // page slug
        );

        register_setting(
            'services_group_settings', // settings group name
            'services_box3_title', // option name
            //'sanitize_text_field' // sanitization function
        );

        add_settings_field(
            'services_box3_title',
            'Title',
            'services_box3_title_html', // function which prints the field
            'services', // page slug
            'services_box3_settings', // section ID

            array( 
                'label_for' => 'services_box3_title',
                'class' => 'information', // for <tr> element
            )
        );

        register_setting(
            'services_group_settings', // settings group name
            'services_box3_text', // option name
            //'sanitize_text_field' // sanitization function
        );

        add_settings_field(
            'services_box3_text',
            'Text',
            'services_box3_text_html', // function which prints the field
            'services', // page slug
            'services_box3_settings', // section ID

            array( 
                'label_for' => 'services_box3_text',
                'class' => 'information', // for <tr> element
            )
        );
    }


    // Título geral
    function services_title_html(){

        $text = get_option( 'services_title' );

        printf(
            '<input type="text" id="services_title" name="services_title" value="%s" />',
            esc_attr( $text )
        );
    }

    // Box 1
    function services_box1_title_html(){

        $text = get_option( 'services_box1_title' );

        printf(
            '<input type="text" id="services_box1_title" name="services_box1_title" value="%s" />',
            esc_attr( $text )
        );
    }

    function services_box1_text_html(){

        $text = get_option( 'services_box1_text' );

        printf(
            '<textarea id="services_box1_text" name="services_box1_text" style="resize: both; width: 350px; height: 200px;"/> %s </textarea>',
            esc_attr( $text )
        );
    }




    //Box 2
    function services_box2_title_html(){

        $text = get_option( 'services_box2_title' );

        printf(
            '<input type="text" id="services_box2_title" name="services_box2_title" value="%s" />',
            esc_attr( $text )
        );
    }

    function services_box2_text_html(){

        $text = get_option( 'services_box2_text' );

        printf(
            '<textarea id="services_box2_text" name="services_box2_text" style="resize: both; width: 350px; height: 200px;"/> %s </textarea>',
            esc_attr( $text )
        );
    }



    //Box 3
    function services_box3_title_html(){

        $text = get_option( 'services_box3_title' );

        printf(
            '<input type="text" id="services_box3_title" name="services_box3_title" value="%s" />',
            esc_attr( $text )
        );
    }

    function services_box3_text_html(){

        $text = get_option( 'services_box3_text' );

        printf(
            '<textarea id="services_box3_text" name="services_box3_text" style="resize: both; width: 350px; height: 200px;"/> %s </textarea>',
            esc_attr( $text )
        );
    }




    
