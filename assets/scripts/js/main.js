(function($) {
    $(document).ready(function(){
        /* MENU MOBILE */
            
        $('.menu-mobile-button').on('click',function() {
            $(this).toggleClass('menu-active');
            jQuery('.menu-mobile').toggleClass('menu-active');
        });

        $('.menu-mobile a').on('click',function() {
            $('.menu-mobile-button').toggleClass('menu-active');
            jQuery('.menu-mobile').toggleClass('menu-active');
        });

        /* TEXTO ABAIXO DO NOME */
        
        let messages;

        if ($('.front-page').length) { 
            $.ajax({
                type: "POST",
                url: location.origin+'/wp-admin/admin-ajax.php',
                dataType: "json",
                data: {
                    action: "return_messages"
                },
                success: function(r) {
                    messages = r;
    
                    const description = new Typewriter('#home .description', {
                        strings: messages,
                        autoStart: true,
                        loop: true,
                    });
                }
            });
        }
        
        /* CARROSSEL DE PROJETOS */
        $('#portfolio-home .slider-container').slick();

        /* SCROLL SUAVE*/

        // Header
        $('.header nav ul a').on('click', function(e) {
            e.preventDefault();
            let id = $(this).attr('href');
            let targetOffset = $(id).offset().top;
            
            if (id=="#blog-home") {
                targetOffset += 180;
            }
           
            $('html, body').animate({ 
                scrollTop: targetOffset - 100
            }, 500, 'easeInOutExpo');
        });

        //Botão avançar
        $('.avancar').on('click', function(e) {
            e.preventDefault();
            let id = $(this).attr('href');
            let targetOffset = $(id).offset().top;
                    
            $('html, body').animate({ 
                scrollTop: targetOffset - 100
            }, 500, 'easeInOutExpo');
        });

        //Botão topo
        $('.topo').on('click', function(e) {
            e.preventDefault();
            let id = $(this).attr('href');
            let targetOffset = $(id).offset().top;
                    
            $('html, body').animate({ 
                scrollTop: targetOffset - 100
            }, 500, 'swing');
        });

        //Botão conhecer
        $('.botao-conhecer').on('click', function(e) {
            e.preventDefault();
            let id = $(this).attr('href');
            let targetOffset = $(id).offset().top;
                    
            $('html, body').animate({ 
                scrollTop: targetOffset - 100
            }, 500, 'easeInOutExpo');
        });

        //Botão servicos
        $('.botao-servicos').on('click', function(e) {
            e.preventDefault();
            let id = $(this).attr('href');
            let targetOffset = $(id).offset().top;
                    
            $('html, body').animate({ 
                scrollTop: targetOffset - 100
            }, 500, 'easeInOutExpo');
        });

        //Botão contato
        $('.botao-contato').on('click', function(e) {
            e.preventDefault();
            let id = $(this).attr('href');
            let targetOffset = $(id).offset().top;
                    
            $('html, body').animate({ 
                scrollTop: targetOffset - 100
            }, 500, 'easeInOutExpo');
        });


        /* FAZER BOTÃO TOPO APARECER AO ROLAR O SCROLL */

        document.addEventListener('scroll', function () {
            let sobre = $('#home').offset().top + 600;

            if ($(this).scrollTop() > sobre) {
                $('.topo').addClass('opened');
            } else {
                $('.topo').removeClass('opened');
            }
        }, true);

        /* ALTERAR A COR DO BOTÃO TOPO NAS DIFERENTES SESSÕES */

        let home = 0;
        let servicos = $('#sobre').offset().top - 60;
        let portfolio = $('#servicos').offset().top - 300;
        let blog = $('#portfolio-home').offset().top - 150;
        let contato = $('#blog-home').offset().top + 220;

        document.addEventListener('scroll', function () {
            
            if ($(this).scrollTop() > contato) {
                $('.topo').removeClass('black');
                $('.topo').addClass('white');
            } else if ($(this).scrollTop() > blog) {
                $('.topo').removeClass('white');
                $('.topo').addClass('black');
            } else if ($(this).scrollTop() > portfolio) {
                $('.topo').removeClass('black');
                $('.topo').addClass('white');
            } else if ($(this).scrollTop() > servicos) {
                $('.topo').removeClass('black');
                $('.topo').addClass('white');
            } else {
                $('.topo').removeClass('black');
                $('.topo').addClass('white');
            } 
        }, true);

        /* EFEITO DO MENU DE CONTATO */

        let suporte = $('#contato svg').offset().top + 100;

        document.addEventListener('scroll', function () {

            if ($(this).scrollTop() > contato) {
                $('#contato .suporte').addClass('opened');
            }
        });

    });    
})(jQuery);