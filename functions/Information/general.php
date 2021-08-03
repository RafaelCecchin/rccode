<?php 

    function display_general_submenu() {

        echo '<div class="wrap">
        <h1>General</h1>
        <form method="post" action="options.php">';
                
            settings_fields( 'home_general_settings' ); // settings group name
            do_settings_sections( 'general' ); // just a page slug
            submit_button();

        echo '</form></div>';

    }

    add_action('admin_init', 'register_general_settings');

    function register_general_settings() {
        // Adicionar sessão geral
        add_settings_section(
            'general_section_settings',
            '',
            '',
            'general'
        ); 

        // Adiciona configuração de logo

        register_setting(
            'home_general_settings', // settings group name
            'logo', // option name
            //'' // sanitization function
        );

        add_settings_field(
            'logo',
            'Logo',
            'logo_html', // function which prints the field
            'general', // page slug
            'general_section_settings', // section ID

            array( 
                'label_for' => 'select-image',
                'class' => 'information logo-option', // for <tr> element
            )
        );
    }

    function logo_html(){

        $logo = get_option( 'logo' );

        $text = 'Select image';
        $remove_open = '';

        if ($logo) {
            $text = 'Update image';
            $remove_open = 'open';
        }

        printf(
            '<input type="hidden" class="logo" id="logo" name="logo" value="%s" /><span id="select-image" class="button button-primary select-image">%s</span><span class="button remove-image %s">Remove image</span>',
            esc_attr( $logo ),
            $text,
            $remove_open
        );
    }