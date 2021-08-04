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
        add_settings_section('services_section_settings', '', '', 'services');
        create_custom_option('services_title', 'Title', 'text', 'services_section_settings', 'services_group_settings', 'services');

        // Adiciona a sessão 1
        add_settings_section('services_box1_settings', 'First box', '', 'services');
        create_custom_option('services_box1_title', 'Title', 'text', 'services_box1_settings', 'services_group_settings', 'services');
        create_custom_option('services_box1_text', 'Text', 'textarea', 'services_box1_settings', 'services_group_settings', 'services');

        // Adiciona a sessão 2
        add_settings_section('services_box2_settings', 'Second box', '', 'services');
        create_custom_option('services_box2_title', 'Title', 'text', 'services_box2_settings', 'services_group_settings', 'services');
        create_custom_option('services_box2_text', 'Text', 'textarea', 'services_box2_settings', 'services_group_settings', 'services');

        // Adiciona a sessão 3
        add_settings_section('services_box3_settings', 'Third box', '', 'services');
        create_custom_option('services_box3_title', 'Title', 'text', 'services_box3_settings', 'services_group_settings', 'services');
        create_custom_option('services_box3_text', 'Text', 'textarea', 'services_box3_settings', 'services_group_settings', 'services');
    }