jQuery(document).ready(function($) {
	"use strict"; 
    // Perform AJAX login on form submit
    $('form#gramotech-ajax-login').on('submit', function(e){
        $('form#gramotech-ajax-login p.status').show().text(ajax_login_object.loadingmessage);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_login_object.ajaxurl,
            data: { 
                'action': 'gramotech_ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                'username': $('form#gramotech-ajax-login #username').val(), 
                'password': $('form#gramotech-ajax-login #password').val(), 
				'remember': $('form#gramotech-ajax-login #remember').val(), 
                'security': $('form#gramotech-ajax-login #security').val() 
			},
            success: function(data){
                $('form#gramotech-ajax-login p.status').text(data.message);
                if (data.loggedin == true){
                    document.location.href = ajax_login_object.redirecturl;
                }
            }
        });
        e.preventDefault();
    });
	
	
	// Perform AJAX login on form submit
    $('form#gramotech-ajax-login-header').on('submit', function(e){
        $('form#gramotech-ajax-login-header p.status').show().text(ajax_login_object.loadingmessage);
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: ajax_login_object.ajaxurl,
            data: { 
                'action': 'gramotech_ajaxlogin', //calls wp_ajax_nopriv_ajaxlogin
                'username': $('form#gramotech-ajax-login-header #username_top').val(), 
                'password': $('form#gramotech-ajax-login-header #password_top').val(), 
				'remember': $('form#gramotech-ajax-login-header #remember_top').val(), 
                'security': $('form#gramotech-ajax-login-header #security_top').val() 
			},
            success: function(data){
                $('form#gramotech-ajax-login-header p.status').text(data.message);
                if (data.loggedin == true){
                    document.location.href = ajax_login_object.redirecturl;
                }
            }
        });
        e.preventDefault();
    });

});