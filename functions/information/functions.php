<?php

    add_action('wp_ajax_return_message_html', 'return_message_html');
    add_action('wp_ajax_nopriv_return_messages', 'return_messages');
    add_action('wp_ajax_return_messages', 'return_messages');

    function create_custom_option($name, $title, $type, $section, $group, $page, $sanitization_function = null) {
        $obj = new CustomOption($name, $title, $type, $section, $group, $page, $sanitization_function = null);
    }
    
    class CustomOption {
        private $name;
        private $title;
        private $type;
        private $section;
        private $group;
        private $page;
        private $sanitization_function;

        public function __construct($name, $title, $type, $section, $group, $page, $sanitization_function = null) {
            $this->name = $name;
            $this->title = $title;
            $this->type = $type;
            $this->section = $section;
            $this->group = $group;
            $this->page = $page;
            $this->sanitization_function = $sanitization_function;

            $this->create_option();
        }

        private function create_option() {
            $class = '';
            
            if ($this->type == 'arraytext')
                $class = 'message-option';
            
            if ($this->type == 'image')
                $class = 'image-option';

            register_setting(
                $this->group, // settings group name
                $this->name, // option name
                $this->sanitization_function // sanitization function
            );
    
            add_settings_field(
                $this->name,
                $this->title,
                array($this, 'field_html'), // function which prints the field
                $this->page, // page slug
                $this->section, // section ID
    
                array( 
                    'label_for' => $this->name,
                    'class' => 'information '.$class, // for <tr> element
                )
            );
        }

        public function field_html() {
            $value = get_option($this->name);

            switch($this->type) {
                case 'text':
                    printf(
                        '<input type="text" id="%s" name="%s" value="%s" />',
                        $this->name, 
                        $this->name, 
                        esc_attr( $value )
                    );

                    break;
                case 'textarea':
                    printf(
                        '<textarea id="%s" name="%s" style="resize: both; width: 350px; height: 200px;"/> %s </textarea>',
                        $this->name, 
                        $this->name, 
                        esc_attr( $value )
                    );

                    break;
                case 'email':
                    printf(
                        '<input type="email" id="%s" name="%s" value="%s" />',
                        $this->name, 
                        $this->name, 
                        esc_attr( $value )
                    );

                    break;
                case 'arraytext':

                    printf(
                        '<input type="button" class="button button-primary add-message" value="Add" />'
                    );
            
                    if (is_array($value)) {
                        foreach ($value as $v) {
                            return_message_html($v);
                        }
                    } else {
                        return_message_html($value);
                    }   
                    
                    break;
                case 'image':

                    $text = 'Select image';
                    $remove_open = '';
            
                    if ($value) {
                        $text = 'Update image';
                        $remove_open = 'open';
                    }
            
                    printf(
                        '<input type="hidden" class="%s" id="%s" name="%s" value="%s" /><span id="select-image" class="button button-primary select-image">%s</span><span class="button remove-image %s">Remove image</span>',
                        $this->name,
                        $this->name,
                        $this->name,
                        esc_attr( $value ),
                        $text,
                        $remove_open
                    );
                    break;
            }
        }
    }

    class CustomSection {
        private $name;
        private $title;
        private $page;

        public function __construct($name, $title, $page) {
            $this->name = $name;
            $this->title = $title;
            $this->page = $page;

            $this->create_section();
        }

        private function create_section() {
            add_settings_section(
                $this->name, // section ID
                $this->title, // title (if needed)
                '', // callback function (if needed)
                $this->page // page slug
            );
        }

        public function create_custom_option($name, $title, $type, $group, $sanitization_function = null) {

            $obj = new CustomOption($name, $title, $type, $this->name, $group, $this->page, $sanitization_function = null);

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