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
        $about_section = new CustomSection('about_me_section_settings', '', 'about_me');
        $about_section->create_custom_option('about_me_title', 'Title', 'text', 'about_me_group_settings', 'about_me');
        $about_section->create_custom_option('about_me_text', 'Text', 'textarea', 'about_me_group_settings', 'about_me');
        $about_section->create_custom_option('about_me_image', 'Image', 'image', 'about_me_group_settings', 'about_me');
    }