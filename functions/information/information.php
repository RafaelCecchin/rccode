<?php

    function register_information_cm() {
        add_menu_page('Informações', 'Informações', 'manage_options', 'information', 'display_information_menu', 'dashicons-pressthis');
        //add_submenu_page( 'information', 'General', 'General', 'manage_options', 'general', 'display_general_submenu', 1);
        add_submenu_page( 'information', 'Home', 'Home', 'manage_options', 'home', 'display_home_submenu', 2);
        add_submenu_page( 'information', 'Sobre mim', 'Sobre mim', 'manage_options', 'about_me', 'display_about_me_submenu', 3);
        add_submenu_page( 'information', 'Serviços', 'Serviços', 'manage_options', 'services', 'display_services_submenu', 4);
        add_submenu_page( 'information', 'Contato', 'Contato', 'manage_options', 'contact', 'display_contact_submenu', 5);
    }

    add_action('admin_menu', 'register_information_cm');

    function display_information_menu() {

        echo '<div class="wrap information">

        <img class="admin-image" src="'.get_stylesheet_directory_uri().'/assets/images/admin.svg" alt="Menu administrativo"/>

        <h1>Informações</h1>
        <p>Use os submenus para alterar as informações do site.</p>
        ';
    } 

    add_action('admin_init', 'add_functions');

    function add_functions() {
        // Adiciona funções gerais
        require_once(get_stylesheet_directory().'/functions/information/functions.php');
    }

    // Adiciona a página de configurações gerais
    require_once(get_stylesheet_directory().'/functions/information/general.php'); 
    
    // Adiciona a configuração para a página home
    require_once(get_stylesheet_directory().'/functions/information/home.php'); 
    
    // Adiciona a configuração para a página sobre mim
    require_once(get_stylesheet_directory().'/functions/information/about-me.php'); 

    // Adiciona a configuração para a página serviços
    require_once(get_stylesheet_directory().'/functions/information/services.php'); 

    // Adiciona a configuração para a página contato
    require_once(get_stylesheet_directory().'/functions/information/contact.php'); 