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
        $main_section = new CustomSection('services_section_settings', '', 'services');
        $main_section->create_custom_option('services_title', 'Title', 'text', 'services_group_settings');

        // Adiciona a sessão 1
        $box1_section = new CustomSection('services_box1_settings', 'First box', 'services');
        $box1_section->create_custom_option('services_box1_title', 'Title', 'text', 'services_group_settings');
        $box1_section->create_custom_option('services_box1_text', 'Text', 'textarea', 'services_group_settings');

        // Adiciona a sessão 2
        $box2_section = new CustomSection('services_box2_settings', 'Second box', 'services');
        $box2_section->create_custom_option('services_box2_title', 'Title', 'text', 'services_group_settings');
        $box2_section->create_custom_option('services_box2_text', 'Text', 'textarea', 'services_group_settings');

        // Adiciona a sessão 3
        $box3_section = new CustomSection('services_box3_settings', 'Third box', 'services');
        $box3_section->create_custom_option('services_box3_title', 'Title', 'text', 'services_group_settings');
        $box3_section->create_custom_option('services_box3_text', 'Text', 'textarea', 'services_group_settings');
    }