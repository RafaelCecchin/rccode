(function($) {
    //Adicionar mensagens

    let messages;
    
    if ($('.message-option').length) {
        $.ajax({
            type: "POST",
            url: location.origin+'/wp-admin/admin-ajax.php',
            dataType: "json",
            data: {
                action: "return_message_html"
            },
            success: function(r) {
                messages = r;
            }
        });
    }

    $(document).on('click', '.add-message', function() {
        $(this).parent().append(messages);
    });

    // Remover mensagens
    $(document).on('click', '.rem-message', function() {
        $(this).parent('.message').remove();
    });

    // Mover para cima

    $(document).on('click', '.up-message', function() {
        $(this).parent('.message').insertBefore($(this).parent('.message').prev('.message'));
    });

    // Mover para baixo

    $(document).on('click', '.down-message', function() {
        $(this).parent('.message').insertAfter($(this).parent('.message').next('.message'));
    });


    // Logo

    if ($('.image-option').length > 0) {

        // Select logo

        $('.image-option .select-image').on('click', function(e) {
            var button = $(this);
            var input = button.prev();

            const file_frame = wp.media({
                title: 'Imagem',
                button: {
                    text: 'Select',
                },
                library: {
                    type: 'image'
                },
                multiple: false,
                frame:    'select'
            });

            file_frame.on( 'select', function() {
                attachment = file_frame.state().get('selection').first().toJSON();
                
                input.val(attachment.id);

                $('.image-option .select-image').html('Update image');
                $('.image-option .remove-image').addClass('open');

                
            });

            file_frame.on( 'open', function() {
                var selection = file_frame.state().get('selection');

                attachment = wp.media.attachment(input.val());
                attachment.fetch();
                selection.add(attachment ? [attachment] : []);
            });

            file_frame.open();
        });

        $(document).on('click', '.image-option .remove-image', function() {
            $('.image-option .logo').val('');
            $('.image-option .select-image').html('Select image');
            $('.image-option .remove-image').removeClass('open');
        });
    }

})(jQuery);