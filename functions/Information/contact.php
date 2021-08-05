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
        $emails_section = new CustomSection('email_section_settings', 'E-mail', 'contact');
        $emails_section->create_custom_option('email_title', 'Title', 'text', 'contact_group_settings');
        $emails_section->create_custom_option('email', 'E-mail', 'email', 'contact_group_settings');

        // Adicionar sessão de whatsapp
        $whatsapp_section = new CustomSection('whatsapp_section_settings', 'Whatsapp', 'contact');
        $whatsapp_section->create_custom_option('whatsapp_title', 'Title', 'text', 'contact_group_settings');
        $whatsapp_section->create_custom_option('whatsapp', 'WhatsApp', 'text', 'contact_group_settings');
        $whatsapp_section->create_custom_option('whatsapp_link', 'WhatsApp Link', 'text', 'contact_group_settings');

        // Adicionar sessão de linkedin
        $linkedin_section = new CustomSection('linkedin_section_settings', 'LinkedIn', 'contact');
        $linkedin_section->create_custom_option('linkedin_title', 'Title', 'text', 'contact_group_settings');
        $linkedin_section->create_custom_option('linkedin', 'LinkedIn', 'text', 'contact_group_settings');
        $linkedin_section->create_custom_option('linkedin_link', 'LinkedIn Link', 'text', 'contact_group_settings');
    }