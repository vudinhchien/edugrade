jQuery(document).ready(function($) {
	"use strict"; 
	/**
   * When user clicks on button...
   *
   */
  $('#gramotech-register-form').on('click', function(event) {
 
    /**
     * Prevent default action, so when user clicks button he doesn't navigate away from page
     *
     */
    if (event.preventDefault) {
        event.preventDefault();
    } else {
        event.returnValue = false;
    }
 
    // Show 'Please wait' loader to user, so she/he knows something is going on
    $('.indicator').show();
 
    // If for some reason result field is visible hide it
    $('.result-message').hide();
 
    // Collect data from inputs
    var reg_nonce = $('#register_new_user_nonce').val();
    var first_name  = $('#first_name').val();
    var last_name  = $('#last_name').val();
    var username  = $('#username').val();
    var user_email  = $('#user_email').val();
    var user_url  = $('#user_url').val();
    var user_pass  = $('#user_pass').val();
 
    /**
     * AJAX URL where to send data
     * (from localize_script)
    */
    var ajax_url = gramotech_reg_vars.gramotech_ajax_url;
 
    // Data to send
    data = {
      action: 'register_user',
      nonce: reg_nonce,
      first_name: first_name,
      last_name: last_name,
      username: username,
      user_email: user_email,
      user_url: user_url,
      user_pass: user_pass,
    };
 
    // Do AJAX request
    $.post( ajax_url, data, function(response) {
 
      // If we have response
      if( response ) {
 
        // Hide 'Please wait' indicator
        $('.indicator').hide();
 
        if( response === '1' ) {
          // If user is created
          $('.result-message').html('Your submission is complete.'); // Add success message to results div
          $('.result-message').addClass('alert-success'); // Add class success to results div
          $('.result-message').show(); // Show results div
        } else {
          $('.result-message').html( response ); // If there was an error, display it in results div
          $('.result-message').addClass('alert-danger'); // Add class failed to results div
          $('.result-message').show(); // Show results div
        }
      }
    });
 
  });
});



jQuery(document).ready(function($) {
 
  /**
   * When user clicks on button...
   *
   */
  $('#gramotech-register-form-header').on('click', function(event) {
 
    /**
     * Prevent default action, so when user clicks button he doesn't navigate away from page
     *
     */
    if (event.preventDefault) {
        event.preventDefault();
    } else {
        event.returnValue = false;
    }
 
    // Show 'Please wait' loader to user, so she/he knows something is going on
    $('.indicator-header').show();
 
    // If for some reason result field is visible hide it
    $('.result-message-header').hide();
 
    // Collect data from inputs
    var reg_nonce = $('#gramotech-ajax-register-header #register_new_user_nonce_top').val();
    var first_name  = $('#gramotech-ajax-register-header #first_name_top_reg').val();
    var last_name  = $('#gramotech-ajax-register-header #last_name_top_reg').val();
    var username  = $('#gramotech-ajax-register-header #username_top_reg').val();
    var user_email  = $('#gramotech-ajax-register-header #user_email_top_reg').val();
    var user_url  = $('#gramotech-ajax-register-header #user_url_top_reg').val();
    var user_pass  = $('#gramotech-ajax-register-header #user_pass_top_reg').val();
 
    /**
     * AJAX URL where to send data
     * (from localize_script)
    */
    var ajax_url = gramotech_reg_vars.gramotech_ajax_url;
 
    // Data to send
    data = {
      action: 'register_user',
      nonce: reg_nonce,
      first_name: first_name,
      last_name: last_name,
      username: username,
      user_email: user_email,
      user_url: user_url,
      user_pass: user_pass,
    };
 
    // Do AJAX request
    $.post( ajax_url, data, function(response) {
 
      // If we have response
      if( response ) {
 
        // Hide 'Please wait' indicator
        $('.indicator-header').hide();
 
        if( response === '1' ) {
          // If user is created
          $('.result-message-header').html('Your submission is complete.'); // Add success message to results div
          $('.result-message-header').addClass('alert-success'); // Add class success to results div
          $('.result-message-header').show(); // Show results div
        } else {
          $('.result-message-header').html( response ); // If there was an error, display it in results div
          $('.result-message-header').addClass('alert-danger'); // Add class failed to results div
          $('.result-message-header').show(); // Show results div
        }
      }
    });
 
  });
});