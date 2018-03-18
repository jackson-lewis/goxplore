$(document).ready(function() {
    "use strict";
   
    // TOGGLE NAV
	$("#nav-toggle").click(function() {
		$(this).toggleClass('change');
        $("#nav").fadeToggle();
		$('body').toggleClass('no-scroll');
    });


    // TOGGLE SEARCH
	$("#search-toggle").click(function() {
		$('.search-icon img').fadeToggle();
		$('.close').fadeToggle();
        $(".search-container").fadeToggle();
		$('body').toggleClass('no-scroll');

		$('input[name="search-bar"]').focus();
    });

	
	function header_height() {
		var logo = $('.logo img').height(), logo_new;

		logo_new = logo + 12;

		$( 'header' ).height( logo_new );
	}

	setTimeout( header_height, 5100 );


	// SCROLL EVENT - HEADER STATE CHANGES
	function header_state() {
		$( window ).scroll( function() {

			var width 	= $( window ).width(),
				scroll = $( this ).scrollTop(),
				header = $( 'header' );

	    	if ( width < 1023 ) { // MOBILE

				var trigger = 280,
		            hamburger = $( '.hamburger' );

				if ( scroll > trigger ) {
					$( header ).addClass( 'header-bg' );
		            $(' .image-1' ).stop().animate( { "opacity": "0" }, 100 );
		            $( '.bar1, .bar2, .bar3, .cross1, .cross2' ).addClass( 'alt-colour' );
				} 
				
				else if ( scroll < trigger ) {
					$( header ).removeClass( 'header-bg' );
		            $( '.image-1' ).stop().animate( { "opacity": "1" }, 100 );
		            $( '.bar1, .bar2, .bar3, .cross1, .cross2' ).removeClass( 'alt-colour' );
				}

			} else { // DESKTOP

				var trigger = 480;
				
				if ( scroll > trigger ) {

					$( header ).css({ 
						'-webkit-backdrop-filter': 'blur(2px)',
						'background-color': 'rgba(250, 250, 250,.9)'
					}, 200 );

		            $( '.image-1' ).stop().animate( { "opacity": "0" }, 200 );
		            $( header ).addClass( 'alt-login-colour' );
		            $( 'nav ul a' ).addClass( 'alt-text-colour' );
		            $( 'nav ul li' ).addClass( 'alt-hover-colour' );
		            $( '.search' ).addClass( 'alt-search-bar' );
				} 
				
				else if ( scroll < trigger ){

					$( header ).css({ 
						'-webkit-backdrop-filter': 'blur(0px)',
						'background-color': 'rgba(250, 250, 250,0)'
					}, 200);

		            $( '.image-1' ).stop().animate( { "opacity": "1" }, 100 );
		            $( header ).removeClass( 'alt-login-colour' );
		            $( 'nav ul a' ).removeClass( 'alt-text-colour' );
		            $( 'nav ul li' ).removeClass( 'alt-hover-colour' );
		            $( '.search' ).removeClass( 'alt-search-bar' );
				}
			}

		});

	}


	function fade_in() {

		function screen_size(speed) {

			$('.logo').delay(2800 * speed).fadeIn(300 * speed);

			var width 	= $(window).width(),
				x		= [ '767', '1023' ];


		    if ( width < x[1] ) { // MOBILE
		    
		    	$('.search-icon').delay(2950 * speed).fadeIn(200 * speed);
		    	$('.bar1, .bar2, .bar3').delay(2950 * speed).fadeIn(200 * speed);


		    } else { // DESKTOP

		    
		       	$('.search-container').delay(2950 * speed).animate({ opacity: 1 }, 500);
	        	$('#nav li').delay(2950 * speed).animate({ opacity: 1 }, 500);

		    }
		}


		function hero_main(speed) {

			$('.parallax').fadeIn(800 * speed);

		    $('.hero .dual-heading h1').delay(1550 * speed).fadeIn(200 * speed);

		    $('.hero .caption').delay(3000 * speed).fadeIn(100 * speed);

		    $('.hero .prompt').delay(2000 * speed).fadeIn(100 * speed);

			var typewrite = $('.hero .dual-heading h3').text(),
		        length = typewrite.length,
		        change = typewrite.split(''),
		        i = 0,
		        update = [];

		    while ( i < length ) {
		    	update.push( "<span class='letter'>" + change[i] + "</span>" );
		    	i++;
			}

			$('.hero .dual-heading h3').text( "" );
			$('.hero .dual-heading h3').append( update );

			i = 1;
			var j = 950 * speed, k = 30 * speed;

			while ( i <= length ) {
				$('.letter:nth-child(' + i + ')').delay( j ).fadeIn(200 * speed); i++; j = j + k;
			}
		}

		function hero_animation() {

			var first   = $( '.ani-reg-1' ),
				second  = $( '.ani-reg-2' ),
				third   = $( '.ani-reg-3' ),
				fourth   = $( '.ani-reg-4' ),

				cap_1   = first.attr( 'alt' ),
				cap_2   = second.attr( 'alt' ),
				cap_3   = third.attr( 'alt' ),
				cap_4   = fourth.attr( 'alt' ),

				caption = $( 'span.caption' );

			setTimeout( function() {
				first.fadeOut(2000);
				caption.fadeOut(400);
				caption.delay(400).text( cap_2 );
				caption.fadeIn(400);
			}, 12000 );

			setTimeout( function() {
				second.fadeOut(2000);
				caption.fadeOut(400);
				caption.delay(400).text( cap_3 );
				caption.fadeIn(400);
			}, 24000 );

			setTimeout( function() {
				third.fadeOut(2000);
				caption.fadeOut(400);
				caption.delay(400).text( cap_4 );
				caption.fadeIn(400);
			}, 36000 );

		}

		function parallax() {

			var stage = $( window ),
				scrollTop = window.pageYOffset,
				scrollOpa,

				content = $( '#heading-parallax' ),
				content_speed = 2,
				content_offset = content.offset().top,
				content_appr = content.css('opacity');

			stage.on( 'scroll resize', function() {

				scrollTop = window.pageYOffset,
				scrollOpa = scrollTop / 100;

				var y = content_offset + scrollTop / content_speed,
					x = content_appr - scrollOpa / 6;

				content.css({ 
					'top': y,
					'opacity': x
				});

			});
			stage.trigger( 'scroll' );
		};

		function mainAdjust() {

		    $('main').css( 'padding-top', '10rem' );
		}
		

		var hero = $( "body" ).data( "hero" ),
		    h_type = [ 'master', 'reg', 'basic', 'player', 'login', 'system' ];


		if ( hero == h_type[0] ) { // MASTER - HOME LANDING PAGE

			hero_main(2);
			header_state();
			screen_size(1);
			hero_animation();
			parallax();

		} else if ( hero == h_type[1] ) { // REG - DESTINATION PAGES AND GET INSPIRED

			hero_main(1);
			header_state();
			screen_size(1);
			parallax();

			document.title = $( 'h1' ).text() + ' | Goxplore';

			if ($( 'h1' ).text() == 'inspired' ) {
				document.title = 'Get Inspired | Goxplore';
			}

		} else if ( hero == h_type[2] ) { // BASIC - VIDEO, DESTINATIONS, SEARCH PAGES

			var speed = 1;

			var width 	= $(window).width(),
				x		= [ '767', '1023' ];


			var page = $( 'body' ).data( 'page' );

			if ( page == 'search' ) { // IS SEARCH

				if ( width < x[1] ) { // MOBILE
		    		$('.bar1, .bar2, .bar3').delay(500).fadeIn(600);

			    } else { // DESKTOP
			    	$('.search-container').animate({ opacity: 1 }, 500);
			    	$( '.search' ).addClass( 'alt-search-bar' );
			    	$('#nav li').delay(2800).stop().animate({ opacity: 1 }, 500);

			    }

			    var org_height = $( '.item-sea' ).outerHeight(true),
			    	vid_height = $( '.item-vid' ).outerHeight(true),

			    	diff = org_height - vid_height,

			   		old_mar = $( '.item-vid' ).css( 'margin-bottom' ),

			   		old_mar = old_mar.replace( 'px', '' ),
			   		old_marg = parseInt( old_mar ),

			   		new_mar = old_marg + diff;

			   	$( '.item-vid' ).css( 'margin-bottom', new_mar );

			    // SEARCH RESULTS
			    var output = $('#res-count'),
			        items = $('.item-sea'),
			        count = items.length;
			    
			    if (count > 1) {
			        output.text( 'Showing ' + count + ' results' );
			    } else if (count == 1) {
			        output.text( 'Showing ' + count + ' result' );
			    } else {
			        output.text( 'No results found' );
			       
			    }

			} else { // NOT SEARCH

				if ( width < x[1] ) { // MOBILE
		    		$('.search-icon, .bar1, .bar2, .bar3').delay(500).fadeIn(600);

			    } else { // DESKTOP
			    	$('.search-container').animate({ opacity: 1 }, 500);
			    	$( '.search' ).addClass( 'alt-search-bar' );
					$('#nav li').stop().animate({ opacity: 1 }, 500);
			    }
				
			}

			// RESULT COUNTER
			var des = $( '.item-sea' ).length,
				vid = $( '.item-vid' ).length,
				d_counter = $( '#des-counter' ),
				v_counter = $( '#vid-counter' ),
				d_output, v_output;

			if ( des == 0 ) {
				d_output = 'No results found';
			} else if ( des == 1 ) {
				d_output = 'Showing 1 result';
			} else {
				d_output = 'Showing ' + des + ' results';
			}

			if ( vid == 0 ) {
				v_output = 'No results found';
			} else if ( des == 1 ) {
				v_output = 'Showing 1 result';
			} else {
				v_output = 'Showing ' + vid + ' results';
			}

			d_counter.text( d_output );
			v_counter.text( v_output );


			var header = $( 'header' );

			// FADE-INS ON LOAD
			$('.logo').fadeIn(300);
			$( header ).css({ 
				'-webkit-backdrop-filter': 'blur(2px)',
				'background-color': 'rgba(250, 250, 250,.9)'
			}, 200);

            $('.image-1').stop().animate({"opacity": "0"}, 200);
            $( header ).addClass( 'alt-login-colour' );
            $( 'nav ul a' ).addClass( 'alt-text-colour' );
            $( 'nav ul li' ).addClass( 'alt-hover-colour' );
            $( '.bar1, .bar2, .bar3' ).addClass( 'alt-colour' );
            
		    $('main, footer').hide().delay(200).fadeIn(300);

			// CONTENT STATE CHANGES
			
			mainAdjust();

		} else if ( hero == h_type[3] ) { // VIDEO PLAYER PAGE

			screen_size();

			var width 	= $(window).width(),
				x		= [ '767', '1023' ];


			if ( width < x[1] ) { // MOBILE
				$('.logo, .search-icon, .bar1, .bar2, .bar3').delay(500).fadeIn(600);
		    	$('main, footer').hide().delay(800).fadeIn(600);

		    	$( 'textarea' ).attr( 'rows', '4' );

			} else { // DESKTOP
				$('#nav').addClass('nav-alt nav-alt-login');
				$('main, footer').hide().delay(800).fadeIn(600);

				$( 'textarea' ).attr( 'rows', '2' );
			}

			// HEADER STATE CHANGES
			$('header').addClass( 'header-bg-alt' );

			$( 'footer' ).css( 'background', 'none' );

			document.title = $( 'h1' ).text() + ' | Goxplore';

			mainAdjust();

			// ADD COMMENT
			$('.add-comment').submit(function(e) {
		    	e.preventDefault();

		    	var video_id     = $( this ).data( 'video' ),
		    		username     = $( this ).data( 'user' ),
		    		comment_set  = $( this ).children( 'textarea' ).val(),
		    		verify       = true;

		    	var query = $( this ).children( 'textarea' );

		    	if ( query.val() == '' ||
		    		 query.val().length > 600 ) {

		    		verify = false;
		    	}

		    	if ( verify === true ) {
		    		add_comment( video_id, username, comment_set );
		    	}


		    });

		    function add_comment( video, user, comment ) {

		        var xmlhttp = new XMLHttpRequest();
		        xmlhttp.onreadystatechange = function () {
		            if (this.readyState == 4 && this.status == 200) {
						var verify = this.responseText;
						if ( verify !== 'error' ) {
							$( '.add-comment' ).children( 'textarea' ).val( '' );
							$( 'ul.comments-wrap' ).append( verify );

							if ( $( 'li.comment-item' ).has( 'h5' ) ) {
								$( 'li#placehold' ).hide();
							}
						} else {
							alert( 'An unknown error occured :(' );
						}
		            }
		        };
		        xmlhttp.open("GET", "include/functions/comment.php?v=" + video + '&u=' + user + '&c=' + comment, true);
		        xmlhttp.send();
		    }

		} else if ( hero == h_type[4] ) { // LOGIN PAGE

			screen_size();
			hero_main(1);
			$('.form-login').delay(3400).fadeIn(100);

		} else if ( hero == h_type[5] ) { // ADMIN/UPDATE PAGES

			if ( $( 'body' ).data( 'page' ) == 'update' ) {
				document.title = 'Update | Goxplore';
			} else {
				document.title = $( '.page-intro p span' ).text() + ' | Goxplore';
			}

			var speed = 1;

			var width 	= $(window).width(),
				x		= [ '767', '1023' ];

			if ( width < x[1] ) { // MOBILE
	    		$('.search-icon, .bar1, .bar2, .bar3').fadeIn(600);

		    } else { // DESKTOP
		    	$('.search-container').animate({ opacity: 1 }, 500);
		    	$( '.search' ).addClass( 'alt-search-bar' );
				$('#nav li').stop().animate({ opacity: 1 }, 500);
		    }
				

			var header = $( 'header' );

			// FADE-INS ON LOAD
			$('.logo').fadeIn(300);
			$('.search-container').animate({ opacity: 1 }, 500);
	        $('nav ul').animate({ opacity: 1 }, 500);

			$( header ).css({ 
				'-webkit-backdrop-filter': 'blur(2px)',
				'background-color': 'rgba(250, 250, 250,.9)'
			}, 200);

            $('.image-1').stop().animate({"opacity": "0"}, 200);
            $( header ).addClass( 'alt-login-colour' );
            $( 'nav ul a' ).addClass( 'alt-text-colour' );
            $( 'nav ul li' ).addClass( 'alt-hover-colour' );
            $( '.bar1, .bar2, .bar3' ).addClass( 'alt-colour' );
            
		    $('main').hide().fadeIn(600);

			mainAdjust();

			// ADMIN VALIDATION
			$( 'form:not(".update")' ).submit(function(e) {

		    	var name       = $( this ).find( 'input#name' ),
		    		country    = $( this ).find( 'input#country' ),
		    		continent  = $( this ).find( 'input#continent' ),

		    		desc       = $( this ).find( 'textarea#description' ),

		    		vid_id     = $( this ).find( 'input[data-input="video_id"]' );


		    	if ( name.val() == '' ||
		    		 !name.val().match( /^[a-zA-Z\s]*$/ )  ||
		    		 name.val().length > 60 ) {

		    		name.addClass( 'shaker' );
		    		e.preventDefault();
		    	}

		    	if ( country.val() == '' ||
		    		 !country.val().match( /^[a-zA-Z\s]*$/ )  ||
		    		 country.val().length > 60 ) {

		    		country.addClass( 'shaker' );
		    		e.preventDefault();
		    	}

		    	if ( continent.val() == '' ||
		    		 !continent.val().match( /^[a-zA-Z\s]*$/ )  ||
		    		 continent.val().length > 60 ) {

		    		continent.addClass( 'shaker' );
		    		e.preventDefault();
		    	}

		    	if ( desc.val() == '' ||
		    		 !desc.val().match( /^[a-zA-Z\s]*$/ )  ||
		    		 desc.val().length > 600 ) {

		    		desc.addClass( 'shaker' );
		    		e.preventDefault();
		    	}

		    	if ( vid_id.val() == '' || 
		    		 vid_id.val().length > 11 ) {

		    		vid_id.addClass( 'shaker' );
		    		e.preventDefault();
		    	}


		    });

		    $( 'input, textarea' ).focus( function() {
		    	$( this ).removeClass( 'shaker' );
		    });


			// ADMIN FUNCTION SELECTOR
		    $('.admin-nav li').click(function() {

		        var f_type = $(this).data( 'function' );

		        if ( f_type == 1 ) {
		        	$( 'section' ).fadeOut();
		        	$( 'section[data-form="add-destination"]' ).delay(400).fadeIn();
		        } else if ( f_type == 2 ) {
					$( 'section' ).fadeOut();
		        	$( 'section[data-form="update-destination"]' ).delay(400).fadeIn();
		        } else if ( f_type == 3 ) {
					$( 'section' ).fadeOut();
		        	$( 'section[data-form="add-hero"]' ).delay(400).fadeIn();
		        } else if ( f_type == 4 ) {
					$( 'section' ).fadeOut();
		        	$( 'section[data-form="update-hero"]' ).delay(400).fadeIn();
		        } else if ( f_type == 5 ) {
					$( 'section' ).fadeOut();
		        	$( 'section[data-form="manage-user"]' ).delay(400).fadeIn();
		        }

		        setTimeout( set_active, 500 );

		        function set_active() {
		        	if ( $( 'section[data-form="add-destination"]' ).css('display') == 'block') {
				    	$( 'ul.admin-nav li' ).removeClass( 'active' );
				    	$( 'ul.admin-nav li:nth-child(1)' ).addClass( 'active' );

				    } else if ( $( 'section[data-form="update-destination"]' ).css('display') == 'block') {
				    	$( 'ul.admin-nav li' ).removeClass( 'active' );
				    	$( 'ul.admin-nav li:nth-child(2)' ).addClass( 'active' );

				    } else if ( $( 'section[data-form="add-hero"]' ).css('display') == 'block') {
				    	$( 'ul.admin-nav li' ).removeClass( 'active' );
				    	$( 'ul.admin-nav li:nth-child(3)' ).addClass( 'active' );

				    } else if ( $( 'section[data-form="update-hero"]' ).css('display') == 'block') {
				    	$( 'ul.admin-nav li' ).removeClass( 'active' );
				    	$( 'ul.admin-nav li:nth-child(4)' ).addClass( 'active' );

				    } else if ( $( 'section[data-form="manage-user"]' ).css('display') == 'block') {
				    	$( 'ul.admin-nav li' ).removeClass( 'active' );
				    	$( 'ul.admin-nav li:nth-child(5)' ).addClass( 'active' );
				    }

		        }

		    });
		    $( 'section[data-form="add-destination"]' ).fadeIn();
		    $( 'ul.admin-nav li:nth-child(1)' ).addClass( 'active' );
		    
		    // GET DATA
		    $('.selector').submit(function(e) {
		    	e.preventDefault();
		    	
		    	var action = $(this).data( 'form' ),
		    	    query = $(this).children( '.drop-down' ).children( 'select' ).val();

		        admin( action, query );

		    });
		    
		    function admin( action, query ) {

				var xmlhttp = new XMLHttpRequest();
		        xmlhttp.onreadystatechange = function () {
		            if (this.readyState == 4 && this.status == 200) {
		                var result   = JSON.parse(this.responseText);

		                if ( action == 'update-destination' ) {

		                	$( 'input#destination_id' ).val( result[0].des_id );
		                	$( 'input#u_name' ).val( result[0].name );
		                	$( 'input#u_country' ).val( result[0].country );
		                	$( 'input#u_continent' ).val( result[0].continent );
		                	$( 'textarea#u_desc' ).val( result[0].description );
		                	$( 'select#u_loc_type' ).val( result[0].loc_type );

		                	$( 'input#u_video_url' ).val( result[0].video_url );
		                	$( 'input#u_video_time' ).val( result[0].video_time );

		                	$( 'input#u_exp_name_1' ).val( result[0].exp_name );
		                	$( 'textarea#u_exp_desc_1' ).val( result[0].exp_description );
		                	$( 'input#u_exp_video_1' ).val( result[1].video_url );
		                	$( 'input#u_exp_video_time_1' ).val( result[1].video_time );
		                	$( 'select#u_exp_loc_type_1' ).val( result[0].exp_type );

		                	$( 'input#u_exp_name_2' ).val( result[4].exp_name );
		                	$( 'textarea#u_exp_desc_2' ).val( result[4].exp_description );
		                	$( 'input#u_exp_video_2' ).val( result[2].video_url );
		                	$( 'input#u_exp_video_time_2' ).val( result[2].video_time );
		                	$( 'select#u_exp_loc_type_2' ).val( result[4].exp_type );

		                	$( 'input#u_exp_name_3' ).val( result[9].exp_name );
		                	$( 'textarea#u_exp_desc_3' ).val( result[9].exp_description );
		                	$( 'input#u_exp_video_3' ).val( result[3].video_url );
		                	$( 'input#u_exp_video_time_3' ).val( result[3].video_time );
		                	$( 'select#u_exp_loc_type_3' ).val( result[9].exp_type );

		                	$( 'span#d_before' ).text( 'You are updating the destination ' );
					    	$( 'span#d_choice' ).text( result[0].name );

		                } else if ( action == 'update-hero' ) {

		                	$( 'input#hero_id' ).val( result[0].her_id );
			                $( 'input#h_name' ).val( result[0].name );
					    	$( 'input#h_location' ).val( result[0].location );

					    	$( 'span#h_before' ).text( 'You are updating the hero ' );
					    	$( 'span#h_choice' ).text( result[0].name );

		                } else if ( action == 'manage-user' ) {

		                	$( 'input#user_id' ).val( result[0].use_id );
		                	$( 'input#name' ).val( result[0].name );
		                	$( 'input#username' ).val( result[0].username );
		                	$( 'input#email' ).val( result[0].email );
		                	$( 'input#password' ).val( result[0].password );
		                	$( 'select#acc_type' ).val( result[0].acc_type );

		                	$( 'span#u_before' ).text( 'You are viewing the user ' );
					    	$( 'span#u_choice' ).text( result[0].name );

					    	$( 'span#u_date_join' ).text( 'Joined on ' + result[0].date_join );

		                }
		         
		            }
		        };
		        xmlhttp.open("GET", "include/functions/access.php?a=" + action + '&q=' + query, true);
		        xmlhttp.send();

		    };

			// LOG OUT
			$('.log-out').click(function() {

		        var xmlhttp = new XMLHttpRequest();
		        xmlhttp.onreadystatechange = function () {
		            if (this.readyState == 4 && this.status == 200) {
		                location.href = 'login.php';
		            }
		        };
		        xmlhttp.open("GET", "include/functions/logout.php", true);
		        xmlhttp.send();

		    });

		}

	}
	fade_in();


	// INPUT STYLES
	$( 'input, textarea' ).focus( function() {
	    $( this ).addClass( 'blue' );
	});
	$( 'input, textarea' ).blur( function() {
	    $( this ).removeClass( 'blue' );
	});


	// FOOTER TYPE
	var footer = $( 'footer' );
	if ( footer.data( 'footer' ) == 'half' ) {
		footer.css( 'background-image', 'none' );
	}


	// TOGGLE FILTER TYPES
	$('#toggle-continent').click(function() {
        $('#options-continent').slideToggle();
    });


    // TOGGLE FILTER TYPES
	$('#toggle-location').click(function() {
        $('#options-location').slideToggle();
    });


	// TOGGLE FILTER
    $('.filter-toggle').click(function() {
        $('.filter').fadeToggle();
        $('body').toggleClass('no-scroll');
    });


    // TOGGLE REGISTER
    $('.register-toggle').click(function() {
        $('.reg-wrap').fadeToggle();
        $('body').toggleClass('no-scroll');

    });


	// JOIN NEWSLETTER
    $('.form-newsletter').submit(function(e) {
    	e.preventDefault();

    	var name   = $( this ).children( 'input[type="name"]' ),
    		email  = $( this ).children( 'input[type="email"]' ),
    		verify_n = true, verify_e = true;

    	if ( name.val() == '' || 
    		 !name.val().match( /^[a-zA-Z\s]*$/ )  ||
    		 name.val().length > 50 ) {

    		name.addClass( 'shaker' );
    		verify_n = false;
    	} 

    	var at = email.val().indexOf("@"),
		 	dot = email.val().lastIndexOf(".");

		 	console.log( at );

    	if ( email.val() == '' || 
    		 at < 1 || 
    		 dot < at + 2 || 
    		 dot + 2 >= email.val().length ||
    		 !email.val().match( /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ )  ||
    		 email.val().length > 70 ) {

    		email.addClass( 'shaker' );
    		verify_e = false;
    	} 

    	if ( verify_n === true && verify_e === true ) {

    		var xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function () {
	            if (this.readyState == 4 && this.status == 200) {
	                var verify = this.responseText;
					if ( verify == 'success' ) {
						alert( 'You have joined the Goxplore newsletter' );
						$( '.form-newsletter' ).children( 'input[type="name"]' ).val( '' );
						$( '.form-newsletter' ).children( 'input[type="email"]' ).val( '' );
					} else if ( verify == 'error' ) {
						alert( 'Sorry, the email you entered is already signed up!' );
						$( '.form-newsletter' ).children( 'input[type="email"]' ).select();
					} else {
						alert( 'An unknown error occured :(' );
					}
	            }
	        };
	        xmlhttp.open("GET", "include/functions/join.php?name=" + name.val() + '&email=' + email.val(), true);
	        xmlhttp.send();

    	}
    });

    $( '.form-newsletter' ).children( 'input[type="name"]' ).focus( function() {
    	$( this ).removeClass( 'shaker' );
    });

    $( '.form-newsletter' ).children( 'input[type="email"]' ).focus( function() {
    	$( this ).removeClass( 'shaker' );
    });






    ////  ////  //  VALIDATION


    // SEARCH
    $( '.search' ).submit( function(e) {

    	var query = $( this ).children( 'input[type="text"]' );

    	if ( query.val() == '' || 
    		 !query.val().match( /^[a-zA-Z]+$/ )  ||
    		 query.val().length > 50 ) {

    		e.preventDefault();

    		$( this ).removeClass( 'invalid' );

    		if ( $( this ).hasClass( 'invalid' ) ) {
    			$( this ).removeClass( 'invalid' );
    		} else {
    			$( this ).addClass( 'invalid' );
    		}

    	}

    });

    $( '.search' ).children( 'input[type="text"]' ).focus( function() {
    	$( this ).removeClass( 'huffle' );
    });


    // LOGIN
    $( '.form-login' ).submit( function(e) {

    	var username = $( this ).children( 'input[type="name"]' ),
    		password = $( this ).children( 'input[type="password"]' );

    	if ( username.val() == '' || 
    		 !username.val().match( /^[a-zA-Z]+$/ )  ||
    		 username.val().length > 50 ) {

    		e.preventDefault();

    		username.addClass( 'shaker' );
    	}

    	if ( password.val().length < 8 ) {
    		e.preventDefault();

    		password.addClass( 'shaker' );
    	}

    });

    $( '.form-login' ).children( 'input[type="name"]' ).focus( function() {
    	$( this ).removeClass( 'shaker' );
    });

    $( '.form-login' ).children( 'input[type="password"]' ).focus( function() {
    	$( this ).removeClass( 'shaker' );
    });


    // REGISTER
    $( '.form-register' ).submit( function(e) {

    	var name 	   = $( this ).children( 'input[type="name"]' ),
    		username   = $( this ).children( 'input[type="text"]' ),
    		email      = $( this ).children( 'input[type="email"]' ),
    		password_1 = $( this ).children( 'input[id="p_1"]' ),
    		password_2 = $( this ).children( 'input[id="p_2"]' );

    	if ( name.val() == '' || 
    		 !name.val().match( /^[a-zA-Z\s]*$/ )  ||
    		 name.val().length > 50 ) {

    		e.preventDefault();

    		name.addClass( 'shaker' );
    	}

    	if ( username.val() == '' || 
    		 !username.val().match( /^[a-zA-Z]+$/ )  ||
    		 username.val().length > 50 ) {

    		e.preventDefault();

    		username.addClass( 'shaker' );
    	}

    	if ( email.val() == '' || 
    		 !email.val().match( /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/ )  || 
    		 email.val().length > 70 ) {

    		email.addClass( 'shaker' );
    	}

    	if ( password_1.val() !== password_2.val() || password_1.val().length < 8 ) {
    		e.preventDefault();

    		password_2.addClass( 'shaker' );
    	}

    	if ( password_1.val().length < 8 ) {
    		e.preventDefault();

    		password_1.addClass( 'shaker' );
    		password_2.addClass( 'shaker' );
    	}

    });

    $( '.form-register' ).children( 'input[type="name"]' ).focus( function() {
    	$( this ).removeClass( 'shaker' );
    });

    $( '.form-register' ).children( 'input[type="text"]' ).focus( function() {
    	$( this ).removeClass( 'shaker' );
    });

    $( '.form-register' ).children( 'input[type="email"]' ).focus( function() {
    	$( this ).removeClass( 'shaker' );
    });

    $( '.form-register' ).children( 'input[type="password"]' ).focus( function() {
    	$( this ).removeClass( 'shaker' );
    });

});