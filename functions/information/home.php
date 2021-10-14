<?php 

    

    function display_home_submenu() {

        echo '<div class="wrap">
        <h1>Home</h1>
        <form method="post" action="options.php">';
                
            settings_fields( 'home_group_settings' ); // settings group name
            do_settings_sections( 'home' ); // just a page slug
            submit_button();

        echo '</form></div>';

    }


    add_action('admin_init', 'register_home_settings'); 

    function register_home_settings() {
        $messages_section = new CustomSection('messages_section_settings', '', 'home');
        $messages_section->create_custom_option('message', 'Mensagem', 'arraytext', 'home_group_settings');
    }

    

    