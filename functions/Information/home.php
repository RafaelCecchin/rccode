<?php 

    add_action('wp_ajax_return_message_html', 'return_message_html');

    add_action('wp_ajax_nopriv_return_messages', 'return_messages');
    add_action('wp_ajax_return_messages', 'return_messages');

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
        // Adicionar sessão mensagens
        add_settings_section(
            'messages_section_settings',
            '',
            '', 
            'home'
        );

        // Adiciona configuração de mensagens

        register_setting(
            'home_group_settings',
            'message',
            //'sanitize_text_field'
        ); 

        add_settings_field(
            'message',
            'Message',
            'message_html', // function which prints the field
            'home', // page slug
            'messages_section_settings', // section ID

            array( 
                'label_for' => 'message',
                'class' => 'information message-option', // for <tr> element
            )
        );
    }

    function message_html() {
        $messages = return_messages();

        printf(
            '<input type="button" class="button button-primary add-message" value="Add" />'
        );

        if (is_array($messages)) {
            foreach ($messages as $message) {
                return_message_html($message);
            }
        } else {
            return_message_html($messages);
        }   
    }

    function return_message_html($value = '') {
        $message_html = '<span class="message"><input type="text" id="message" name="message[]" value="'.esc_attr( $value ).'" /><span class="button up-message">↑</span><span class="button down-message">↓</span><span class="rem-message">—</span></span>';

        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'return_message_html') {
                echo json_encode($message_html);
                wp_die();
            }
        }

        echo $message_html;
    }

    function return_messages() {
        $messages = get_option( 'message' );

        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'return_messages') {
                echo json_encode($messages);
                wp_die();
            }
        }

        return $messages;
    }