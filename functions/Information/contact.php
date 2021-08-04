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
        // Adiciona a sessão de emails
        add_settings_section('email_section_settings', 'E-mail', '', 'contact');
        create_custom_option('email_title', 'Title', 'text', 'email_section_settings', 'services_group_settings', 'contact');
        create_custom_option('email', 'E-mail', 'email', 'email_section_settings', 'services_group_settings', 'contact');

        // Adicionar sessão de whatsapp
        add_settings_section('whatsapp_section_settings','Whatsapp','','contact');
        create_custom_option('whatsapp_title', 'Title', 'text', 'whatsapp_section_settings', 'services_group_settings', 'contact');
        create_custom_option('whatsapp', 'WhatsApp', 'text', 'whatsapp_section_settings', 'services_group_settings', 'contact');
        create_custom_option('whatsapp_link', 'WhatsApp Link', 'text', 'whatsapp_section_settings', 'services_group_settings', 'contact');

        // Adicionar sessão de linkedin
        add_settings_section('linkedin_section_settings','LinkedIn','','contact');
        create_custom_option('linkedin_title', 'Title', 'text', 'linkedin_section_settings', 'services_group_settings', 'contact');
        create_custom_option('linkedin', 'LinkedIn', 'text', 'linkedin_section_settings', 'services_group_settings', 'contact');
        create_custom_option('linkedin_link', 'LinkedIn Link', 'text', 'linkedin_section_settings', 'services_group_settings', 'contact');
    }