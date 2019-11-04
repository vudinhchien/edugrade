jQuery(document).ready(function($) {
    "use strict"
	
	// ------- Main Slider ------- //
    if ($('#home1-slider').length) {
        $('#home1-slider').owlCarousel({
            margin: 0,
            loop: true,
            items: 1,
            dots: false,
        })
    }
	
	if ($('#h1news').length) {
		$('#h1news').masonry({
			itemSelector: '.item',
			columnWidth: 380
		});
		//update columns size on window resize
		$( window ).on('resize', function(e) {
			clearTimeout(time);
			time = setTimeout(function(){
			$('.item').msrItems('refresh');
			}, 200);
		});
	}

    // ------- Main Slider ------- //
    if ($('#award-slider').length) {
        $('#award-slider').owlCarousel({
            margin: 0,
            loop: true,
            items: 1,
            dots: true,
			autoplay:true,
			autoplayTimeout:3000,
        })
    }

    // ------- Department Slider ------- //
    if ($('#h3-dprt').length) {
        $('#h3-dprt').owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 5,
                    nav: true,
                    loop: false
                }
            }
        })
    }

    // ------- Testimonials ------- //
    if ($('#h3-testim').length) {
        $('#h3-testim').owlCarousel({
            loop: true,
            margin: 30,
            dots: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 1,
                    nav: false
                },
                1000: {
                    items: 2,
                    nav: true,
                    loop: false
                }
            }
        })
    }

    // ------- event gallery ------- //
    if ($('#event-gallery').length) {
        $('#event-gallery').owlCarousel({
            loop: true,
            margin: 0,
            dots: false,
            responsiveClass: true,
			arrow:true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 2,
                    nav: false
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: false
                }
            }
        })
    }
	
	// ------- Tweets ------- //
    if ($('#tweets-bg').length) {
        $('#tweets-bg').owlCarousel({
            loop: true,
            margin: 0,
            dots: false,
            responsiveClass: true,
			arrow:true,
			autoplay:true,
			autoplayTimeout:3000,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                600: {
                    items: 1,
                    nav: false
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: false
                }
            }
        })
    }

    // ------- CountDown ------- //
    if ($('#defaultCountdown').length) {
        var austDay = new Date();
        austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
        $('#defaultCountdown').countdown({
            until: austDay
        });
        $('#year').text(austDay.getFullYear());
    }
	
	    // ------- Comming Soon Countdown ------- //
    if ($('#cs-countdown').length) {
        var austDay = new Date();
        austDay = new Date(austDay.getFullYear() + 1, 1 - 1, 26);
        $('#cs-countdown').countdown({
            until: austDay
        });
        $('#year').text(austDay.getFullYear());
    }

    // ------- Testimonials ------- //
    if ($('.gallery').length) {
        $("area[data-rel^='prettyPhoto']").prettyPhoto();
        $(".gallery:first a[data-rel^='prettyPhoto']").prettyPhoto({
            animation_speed: 'normal',
            theme: 'light_square',
            slideshow: 3000,
            autoplay_slideshow: false
        });
        $(".gallery:gt(0) a[data-rel^='prettyPhoto']").prettyPhoto({
            animation_speed: 'fast',
            slideshow: 10000,
            hideflash: false
        });
    }
	
	
	
	 // ------- Filter Gallery Start ------- //
    if ($('.filter-gallery').length) {
        if ($('.filter-gallery .isotope').length) {
            var $container = $('.filter-gallery .isotope');
            $container.isotope({
                itemSelector: '.item',
                transitionDuration: '0.6s',
                masonry: {
                    columnWidth: $container.width() / 12
                },
                layoutMode: 'masonry'
            });
            $(window).on("resize", function() {
                $container.isotope({
                    masonry: {
                        columnWidth: $container.width() / 12
                    }
                });
            });
        }
        if ($('.filter-gallery #filters').length) {
            $('.filter-gallery #filters').on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $container.isotope({
                    filter: filterValue
                });
            });
            // change is-checked class on buttons
            $('.filter-gallery .button-group').each(function(i, buttonGroup) {
                var $buttonGroup = $(buttonGroup);
                $buttonGroup.on('click', 'button', function() {
                    $buttonGroup.find('.is-checked').removeClass('is-checked');
                    $(this).addClass('is-checked');
                });
            });

        }
    }
	
	// ------- Filter Gallery Start ------- //
    if ($('.filter-news').length) {
        if ($('.filter-news .isotope').length) {
            var $container = $('.filter-news .isotope');
            
            $container.imagesLoaded( function() {
				$container.isotope({
					itemSelector: '.item',
					transitionDuration: '0.6s',
					masonry: {
						columnWidth: $container.width() / 12
					},
					layoutMode: 'masonry'
				});
            });
        }
    }
	
	// ------- TimeLine Start ------- //
	 if ($('.timeline').length) {
        $('.timeline').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.timeline-nav'
        });
    }

    if ($('.timeline-nav').length) {
        $('.timeline-nav').slick({
            slidesToShow: 5,
            slidesToScroll: 2,
            asNavFor: '.timeline',
            dots: false,
            arrows: false,
            centerMode: true,
            focusOnSelect: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: false,
                        dots: false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    }
	// ------- TimeLine End ------- //	
	
	// join-our-movement form
	$('form.footer-newsletter').on('submit', function(e){
		$('form.footer-newsletter div.status').show().text(login_object.loading);
		
		var TL_AJAX_URL = $(this).attr('data-ajax');

		 $.ajax({
            type: 'POST',
            dataType: 'json',
            url: TL_AJAX_URL,
            data: { 
                'action': 'mailchimp_subscription', 
                'email': $('form.footer-newsletter #email_address').val(),  
				'fname': $('form.footer-newsletter #fname').val(), 
			},
            success: function(data){			
                $('form.footer-newsletter div.status').text(data.message);
                if (data.success == true){
				
				}
            }
        });
      e.preventDefault();
	});	
	
	/*
	 * Let's begin with validation functions
	 */
	jQuery.extend(jQuery.fn, {
		/*
		 * check if field value lenth more than 3 symbols ( for name and comment ) 
		 */
		validate: function () {
			if (jQuery(this).val().length < 3) {jQuery(this).addClass('error');return false} else {jQuery(this).removeClass('error');return true}
		},
		/*
		 * check if email is correct
		 * add to your CSS the styles of .error field, for example border-color:red;
		 */
		validateEmail: function () {
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/,
				emailToValidate = jQuery(this).val();
			if (!emailReg.test( emailToValidate ) || emailToValidate == "") {
				jQuery(this).addClass('error');return false
			} else {
				jQuery(this).removeClass('error');return true
			}
		},
	});
	 
	jQuery(function($){
	
		/*
		 * On comment form submit
		 */
		$( '#commentform' ).on('submit',function(e){
			e.preventDefault();
			// define some vars
			var button = $('#submit'), // submit button
				respond = $('#respond'), // comment form container
				commentlist = $('#gramotech-comment'), // comment list container
				cancelreplylink = $('#cancel-comment-reply-link');
	 
			// if user is logged in, do not validate author and email fields
			if( $( '#author' ).length )
				if($( '#author' ).validate()){
					$("#author").css("border","1px solid green");
				}else{
					$("#author").css("border","1px solid red");
				}
	 
			if( $( '#email' ).length )
				if($( '#email' ).validateEmail()){
					$("#email").css("border","1px solid green");
				}else{
					$("#email").css("border","1px solid red");
				}
				
			// validate comment in any case
			if($( '#comment' ).validate()){
				$("#comment").css("border","1px solid green");
			}else{
				$("#comment").css("border","1px solid red");
			}
	 
			// if comment form isn't in process, submit it
			if ( !button.hasClass( 'loadingform' ) && !$( '#author' ).hasClass( 'error' ) && !$( '#email' ).hasClass( 'error' ) && !$( '#comment' ).hasClass( 'error' ) ){
	 
				// ajax request
				$.ajax({
					type : 'POST',
					url : login_object.ajaxurl, // admin-ajax.php URL
					data: $(this).serialize() + '&action=ajaxcomments', // send form data + action parameter
					beforeSend: function(xhr){
						// what to do just after the form has been submitted
						button.addClass('loadingform').val('Loading...');
					},
					error: function (request, status, error) {
						if( status == 500 ){
							alert( 'Error while adding comment' );
						} else if( status == 'timeout' ){
							alert('Error: Server doesn\'t respond.');
						} else {
							// process WordPress errors
							var wpErrorHtml = request.responseText.split("<p>"),
								wpErrorStr = wpErrorHtml[1].split("</p>");
	 
							alert( wpErrorStr[0] );
						}
					},
					success: function ( addedCommentHTML ) {
	 
						// if this post already has comments
						if( commentlist.length > 0 ){
	 
							// if in reply to another comment
							if( respond.parent().hasClass( 'comment' ) ){
	 
								// if the other replies exist
								if( respond.parent().children( '.children' ).length ){	
									respond.parent().children( '.children' ).append( addedCommentHTML );
								} else {
									// if no replies, add <ul class="children">
									addedCommentHTML = '<ul class="children">' + addedCommentHTML + '</ul>';
									respond.parent().append( addedCommentHTML );
								}
								// close respond form
								cancelreplylink.trigger("click");
							} else {
								// simple comment
								commentlist.append( addedCommentHTML );
							}
						}else{
							// if no comments yet
							addedCommentHTML = '<div class="post-reviews"><h4 class="section-title">Comments on Post</h4><ul id="gramotech-comment" class="comments">' + addedCommentHTML + '</ul></div>';
							respond.before( $(addedCommentHTML) );
							//commentlist.append(addedCommentHTML);
						}
						// clear textarea field
						$('#comment').val('');
					},
					complete: function(){
						// what to do after a comment has been added
						button.removeClass( 'loadingform' ).val( 'Submit' );
					}
				});
			}
			return false;
		});
	});
	
	$(document).on( 'click', '.load-more-news', function( event ) {
		event.preventDefault();
		var this_var = $(this);
		var blog_cat = $('.blog-cat').val();
		var blog_descrp = $('.blog-descrp').val();
		var blog_titles = $('.blog-titles').val();
		var page = $('.page-number').val();
		$.ajax({
			url: login_object.ajaxurl,
			type: 'post',
			data: {
				page:page,
				blog_cat:blog_cat,
				blog_descrp:blog_descrp,
				blog_titles:blog_titles,
				action: 'load_more_pagination'
			},
			beforeSend: function() {
				$('.home1-news').children('.isotope').children('.load-more-news').remove();
				$('.home1-news').children('.isotope').children('.page-number').remove();
				$('.home1-news').children('.isotope').append( '<div class="ajax-loader"><div class="page-content" id="load-more"></div></div>' );
			},
			success: function( html ) {
				$('.home1-news').children('.isotope').children('.ajax-loader').remove();
				$(html).hide().appendTo($('.home1-news').children('.isotope')).fadeIn(2000);
				
			}
		});
	});
	
	(function( $ ) {
		'use strict';
		$(document).on('click', '.gramotech-button', function() {
			var button = $(this);
			var post_id = button.attr('data-post-id');
			var security = button.attr('data-nonce');
			var iscomment = button.attr('data-iscomment');
			var allbuttons;
			if ( iscomment === '1' ) { /* Comments can have same id */
				allbuttons = $('.gramotech-comment-button-'+post_id);
			} else {
				allbuttons = $('.gramotech-button-'+post_id);
			}
			var loader = allbuttons.next('.gramotech-loader');
			if (post_id !== '') {
				$.ajax({
					type: 'POST',
					url: login_object.ajaxurl,
					data : {
						action : 'gramotech_process_simple_like',
						post_id : post_id,
						nonce : security,
						is_comment : iscomment,
					},
					beforeSend:function(){
						loader.html('&nbsp;<div class="loader">Loading...</div>');
					},	
					success: function(response){
						var icon = response.icon;
						var count = response.count;
						allbuttons.html(icon+count);
						if(response.status === 'unliked') {
							var like_text = login_object.like;
							allbuttons.prop('title', like_text);
							allbuttons.removeClass('liked');
						} else {
							var unlike_text = login_object.unlike;
							allbuttons.prop('title', unlike_text);
							allbuttons.addClass('liked');
						}
						loader.empty();					
					}
				});
				
			}
			return false;
		});
	})( jQuery );
	
}); //End