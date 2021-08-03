<?php 

    function display_contact_submenu() {

        echo '<div class="wrap">
        <h1>Contact</h1>
        <form method="post" action="options.php">';
                
            settings_fields( 'contact_group_settings' ); // settings group name
            do_settings_sections( 'contact' ); // just a page slug
            submit_button();

        echo '</form></div>';

    }

    add_action( 'admin_init',  'register_contact_settings' );

    function register_contact_settings() {
        // Adicionar sessão de emails
        add_settings_section(
            'email_section_settings',
            'E-mail',
            '',
            'contact'
        );

        // Adiciona configuração de email

        register_setting(
            'contact_group_settings', // settings group name
            'email_title', // option name
            'sanitize_text_field' // sanitization function
        );

        add_settings_field(
            'email_title',
            'Title',
            'email_title_html', // function which prints the field
            'contact', // page slug
            'email_section_settings', // section ID

            array( 
                'label_for' => 'email_title',
                'class' => 'information', // for <tr> element
            )
        );

        register_setting(
            'contact_group_settings', // settings group name
            'email', // option name
            'sanitize_email' // sanitization function
        );

        add_settings_field(
            'email',
            'Email',
            'email_html', // function which prints the field
            'contact', // page slug
            'email_section_settings', // section ID

            array( 
                'label_for' => 'email',
                'class' => 'information', // for <tr> element
            )
        );






        // Adicionar sessão de whatsapp
        add_settings_section(
            'whatsapp_section_settings',
            'Whatsapp',
            '',
            'contact'
        );

        // Adiciona configuração de email

        register_setting(
            'contact_group_settings', // settings group name
            'whatsapp_title', // option name
            'sanitize_text_field' // sanitization function
        );

        add_settings_field(
            'whatsapp_title',
            'Title',
            'whatsapp_title_html', // function which prints the field
            'contact', // page slug
            'whatsapp_section_settings', // section ID

            array( 
                'label_for' => 'whatsapp_title',
                'class' => 'information', // for <tr> element
            )
        );

        register_setting(
            'contact_group_settings', // settings group name
            'whatsapp', // option name
            //'' // sanitization function
        );

        add_settings_field(
            'whatsapp',
            'Whatsapp',
            'whatsapp_html', // function which prints the field
            'contact', // page slug
            'whatsapp_section_settings', // section ID

            array( 
                'label_for' => 'whatsapp',
                'class' => 'information', // for <tr> element
            )
        );

        register_setting(
            'contact_group_settings', // settings group name
            'whatsapp_link', // option name
            'esc_url_raw' // sanitization function
        );

        add_settings_field(
            'whatsapp_link',
            'Link',
            'whatsapp_link_html', // function which prints the field
            'contact', // page slug
            'whatsapp_section_settings', // section ID

            array( 
                'label_for' => 'whatsapp_link',
                'class' => 'information', // for <tr> element
            )
        );



        // Adicionar sessão de linkedin
        add_settings_section(
            'linkedin_section_settings',
            'Linkedin',
            '',
            'contact'
        );

        // Adiciona configuração de email

        register_setting(
            'contact_group_settings', // settings group name
            'linkedin_title', // option name
            'sanitize_text_field' // sanitization function
        );

        add_settings_field(
            'linkedin_title',
            'Title',
            'linkedin_title_html', // function which prints the field
            'contact', // page slug
            'linkedin_section_settings', // section ID

            array( 
                'label_for' => 'linkedin_title',
                'class' => 'information', // for <tr> element
            )
        );

        register_setting(
            'contact_group_settings', // settings group name
            'linkedin', // option name
            //'' // sanitization function
        );

        add_settings_field(
            'linkedin',
            'Linkedin',
            'linkedin_html', // function which prints the field
            'contact', // page slug
            'linkedin_section_settings', // section ID

            array( 
                'label_for' => 'linkedin',
                'class' => 'information', // for <tr> element
            )
        );

        register_setting(
            'contact_group_settings', // settings group name
            'linkedin_link', // option name
            'esc_url_raw' // sanitization function
        );

        add_settings_field(
            'linkedin_link',
            'Link',
            'linkedin_link_html', // function which prints the field
            'contact', // page slug
            'linkedin_section_settings', // section ID

            array( 
                'label_for' => 'linkedin_link',
                'class' => 'information', // for <tr> element
            )
        );
    }


    // Email
    function email_title_html(){ 

        $text = get_option( 'email_title' );

        printf(
            '<input type="text" id="email_title" name="email_title" value="%s" />',
            esc_attr( $text )
        );
    }

    function email_html(){

        $text = get_option( 'email' );

        printf(
            '<input type="email" id="email" name="email" value="%s" />',
            esc_attr( $text )
        );
    }


    // Whatsapp
    function whatsapp_title_html(){

        $text = get_option( 'whatsapp_title' );

        printf(
            '<input type="text" id="whatsapp_title" name="whatsapp_title" value="%s" />',
            esc_attr( $text )
        );
    }

    function whatsapp_html(){

        $text = get_option( 'whatsapp' );

        printf(
            '<input type="tel" id="whatsapp" name="whatsapp" value="%s" />',
            esc_attr( $text )
        );
    }

    function whatsapp_link_html(){

        $text = get_option( 'whatsapp_link' );

        printf(
            '<input type="text" id="whatsapp_link" name="whatsapp_link" value="%s" />',
            esc_attr( $text )
        );
    }

    // Linkedin
    function linkedin_title_html(){

        $text = get_option( 'linkedin_title' );

        printf(
            '<input type="text" id="linkedin_title" name="linkedin_title" value="%s" />',
            esc_attr( $text )
        );
    }

    function linkedin_html(){

        $text = get_option( 'linkedin' );

        printf(
            '<input type="text" id="linkedin" name="linkedin" value="%s" />',
            esc_attr( $text )
        );
    }

    function linkedin_link_html(){

        $text = get_option( 'linkedin_link' );

        printf(
            '<input type="text" id="linkedin_link" name="linkedin_link" value="%s" />',
            esc_attr( $text )
        );
    }