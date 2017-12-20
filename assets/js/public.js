$ = new jQuery.noConflict();

$( document ).ready( function() {
    $( '#fontend_ajax_form' ).submit( function( event ){
        event.preventDefault()

        var first_name      = $( '#first_name' ).val()
        var last_name       = $( '#last_name' ).val()
        var user_name       = $( '#user_name' ).val()
        var phone           = $( '#phone' ).val()
        var email           = $( '#email' ).val()
        var password        = $( '#password' ).val()
        var password2       = $( '#password2' ).val()

        //
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'im_ajax_form',
                first_name: first_name,
                last_name: last_name,
                user_name: user_name,
                phone: phone,
                email: email,
                password: password,
                password2: password2,
            },
            success: function( data ){
                alert( data )
            },
            error: function(){
                alert( 'Error' )
            }
        })
    } )
} );