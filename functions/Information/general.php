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
        $general_section = new CustomSection('general_section_settings', '', 'general');
        $general_section->create_custom_option('logo', 'Logo', 'image', 'general_group_settings');
    }