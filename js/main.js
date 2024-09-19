/* ================================================
----------- Geass ---------- */
(function ($) {
	"use strict";
	var Geass = {
		initialised: false,
		mobile: false,
		container: $('#portfolio-item-container'),
		blogContainer : $('#blog-container'),
		portfolioItemsAnimated: false,
		lastActivePos: null,
		init: function () {

			if (!this.initialised) {
				this.initialised = true;
			} else {
				return;
			}

			// Call Geass Functions
			this.checkMobile();
			this.darkMode();
			this.fullHeightFixForMobile();
			this.videoBg();
			this.fitTexts();
			this.scrollAnimations();
			this.menuScrollToAnimation();
			this.stickyMenu();
			this.owlCarousels();
			this.singlePortfolioOwl();
			this.scrollToTopAnimation();
			this.scrollToClass();
			this.tooltip();
            this.popover();
			this.toasts();
			this.countTo();
			this.progressBars();
			this.registerKnob();
			this.contactForm();
			this.contactFormFixes();
			
			var self = this;
			if (typeof imagesLoaded === 'function') {
				/* Gallery pages Animation of gallery elements and isotope filter plugin*/
				imagesLoaded(self.container, function() {
					self.calculateWidth();
					self.isotopeActivate();
					self.scrollTriggerforPortfolioAnim();
					// hover animation
					self.hoverAnimation();
					// recall for plugin support
					self.isotopeFilter();
					// load portfolio projects
					self.openProject();
				});
				
				/* Masonry Blog */
				imagesLoaded(self.blogContainer, function() {
					self.masonryBlog();
				});
			}
		},
		checkMobile: function () {
			/* Mobile Detect*/
			if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
				this.mobile = true;
				document.body.classList.add('mobile');
			} else {
				this.mobile = false;
			}
		},
		darkMode: function () {
			// Toggle dark mode via mode switch button
			var modeToggler = document.getElementById('mode-switch');

			// check for dark mode
			if(localStorage.getItem('mode') === 'dark') {
				modeToggler.checked= true;
				document.body.classList.add('dark');
			}
			
			// check for event for dark-light mode
			if (document.getElementById('mode-switch')) {
				modeToggler.addEventListener('change', function () {
					document.body.classList.toggle('dark');

					// if checked store value
					if (modeToggler.checked) {
						localStorage.setItem('mode', 'dark');
					} else {
						localStorage.setItem('mode', 'light');
					}
					
				});
			}
			
		},
		fullHeightFixForMobile: function () {
			if (this.mobile) {
				const doc = document.documentElement;
				doc.style.setProperty('--app-height', `${window.innerHeight}px`);
			}
		},
		videoBg: function () {
			// for index3.html if mobile add class for bg "homebg"
			// This plugin doesnt work on mobile devices
			if ($.fn.mb_YTPlayer) {
				$(".player").mb_YTPlayer();
			} else {
				return;
			}
		},
		fitTexts: function () {
			/* Better responsive texts with fittext plugin */
			if ($.fn.fitText) {
				
				$('.section-title').fitText(1.3, {minFontSize: '40px', maxFontSize: '75px' });
				$('.parallax-title').fitText(1.4, {minFontSize: '22px', maxFontSize: '36px' });

				$('.page-title').fitText(1.2, {minFontSize: '50px', maxFontSize: '120px' });
			}
		},
		stickyMenu: function () {
			// Stickymenu with waypoint and waypoint sticky plugins
			if($.fn.waypoint && $('.navbar').length) {
				var calcOffset,
					fixedClass = 'fixed-top';

				// To calculate offset for fixed menu
				if ($('.navbar').hasClass('navbar-transparent')) {
					calcOffset = -300;
				} else {
					calcOffset = -100;
				}

				/* Add Header fixed-bottom to make nav menu fixed bottom*/
				if ($('#header').hasClass('fixed-bottom')) {
					fixedClass = 'fixed-bottom'
				}

				// Init sticky header
				new Waypoint.Sticky({
					element: $('.navbar')[0],
					stuckClass: fixedClass +' fixed-animated',
					offset: calcOffset
				})
			}
		},
		checkSupport: function(elemname, pluginname) {
			/* Simple check element and plugin */
			return (elemname.length && pluginname) ? true : false;
		},
		owlCarousels: function () {
			var self = this;
			
			var testimonialsCarousel = $('.owl-carousel.testimonials-carousel'),
				tweetsCarousel = $('.twitter-feed');

			/* Testimonials carousel */
			if (self.checkSupport(testimonialsCarousel, $.fn.owlCarousel)) {
				testimonialsCarousel.owlCarousel({
					singleItem:true,
					slideSpeed: 600,
					autoPlay: 9000,
					stopOnHover: true,
					navigation: true,
					navigationText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
					pagination: false,
					responsive: true,
					autoHeight : false,
					transitionStyle : "backSlide"
				});
			}

			// Tweets Carousel
			if (self.checkSupport(tweetsCarousel, $.fn.owlCarousel)) {
				tweetsCarousel.owlCarousel({
					singleItem:true,
					slideSpeed: 600,
					autoPlay: 8200,
					stopOnHover: true,
					navigation: true,
					navigationText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
					pagination: false,
					responsive: true,
					autoHeight : false,
					transitionStyle : "backSlide",
				});
			}
		},
		singlePortfolioOwl: function () {
			/* this will need to reinit after ajax */
			var self = this;
				
			/* Single portfolio Slider - single-portfolio.html */
			var  singlePortfolioSlider = $('.single-portfolio-slider.owl-carousel');
			if (self.checkSupport(singlePortfolioSlider, $.fn.owlCarousel)) {
				singlePortfolioSlider.owlCarousel({
					singleItem:true,
					slideSpeed: 400,
					autoPlay: 8800,
					stopOnHover: true,
					navigation: true,
					navigationText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
					pagination: true,
					responsive: true,
					mouseDrag: true,
					autoHeight : false,
					transitionStyle : "fade",
					afterAction : syncPosition,
					responsiveRefreshRate : 100
				});
			}

			/* Related portfolio - single-portfolio.html */
			var  sliderSyncCarousel = $('.slider-thumb-nav.owl-carousel');
			if (self.checkSupport(sliderSyncCarousel, $.fn.owlCarousel)) {
				sliderSyncCarousel.owlCarousel({
					items: 4,
					itemsDesktop : [1199,4],
					itemsDesktopSmall: [979,4],
					itemsTablet: [768,3],
					itemsMobile : [479,2],
					slideSpeed: 400,
					autoPlay: 8800,
					stopOnHover: true,
					navigation: false,
					pagination: false,
					responsive: true,
					mouseDrag: true,
					autoHeight : false,
					responsiveRefreshRate : 100,
					afterInit : function(el){
						el.find(".owl-item").eq(0).addClass("active");
					}
				});
			}

			if (!singlePortfolioSlider.length && !sliderSyncCarousel.length) {
				return;
			}


		    /* Sync Carousels for single-portfolio page */
			function syncPosition(el) {
				var current = this.currentItem;

				$('.slider-thumb-nav.owl-carousel')
					.find(".owl-item")
					.removeClass("active")
					.eq(current)
					.addClass("active");

				if($('.slider-thumb-nav.owl-carousel').data("owlCarousel") !== undefined){
					center(current);
				}
			}

			$('.slider-thumb-nav.owl-carousel').on("click", ".owl-item", function(e){
				e.preventDefault();
				var number = $(this).data("owlItem");
				singlePortfolioSlider.trigger("owl.goTo",number);
			});

			function center(number){
				var sync2visible = sliderSyncCarousel.data("owlCarousel").owl.visibleItems,
					num = number,
					found = false,
					i;

				for (i in sync2visible) {
					if (num === sync2visible[i]) {
						found = true;
					}
				}

				if (found === false){
					if (num>sync2visible[sync2visible.length-1]){
						sliderSyncCarousel.trigger("owl.goTo", num - sync2visible.length+2)
					} else {
						if (num - 1 === -1){
						num = 0;
					}
						sliderSyncCarousel.trigger("owl.goTo", num);
					}
				} else if (num === sync2visible[sync2visible.length-1]) {
					sliderSyncCarousel.trigger("owl.goTo", sync2visible[1])
				} else if (num === sync2visible[0]) {
					sliderSyncCarousel.trigger("owl.goTo", num-1)
				}

			}
		},
		scrollTopBtnAppear: function () {
			// Show/Hide scrolltop button while scrolling
			var windowTop = $(window).scrollTop(),
					scrollTop = $('#scroll-top');

			if (windowTop >= 200) {
				scrollTop.addClass('fixed');
			} else {
				scrollTop.removeClass('fixed');
			}
			
		},
		scrollToAnimation: function (speed, offset, e) {
			/* General scroll to function */
			var targetEl = $(this).attr("href"),
				toTop = false,
				elem = $(targetEl);

			if (!elem.length) {
				if (targetEl === "#top") {
					targetPos = 0;
					toTop = true;
				} else {
					return;
				}
			} else {
				var targetPos = offset ? ( elem.offset().top + offset ) : elem.offset().top;
			}
			
			if (targetEl || toTop) {
					$('html, body').animate({
					'scrollTop': targetPos
					}, speed || 1200);
				e.preventDefault();
			}
		},
		menuScrollToAnimation: function () {
			var self = this,
				$mainMenu = $('#main-menu');
			// Scroll animation to sections when menu links are clicked
			$mainMenu.find('a').on('click', function (e) {
				if( !$(this).hasClass('dropdown-toggle') ) {
					self.scrollToAnimation.call(this, 1000, 0, e);

					$(this)
						.closest('li')
						.addClass('active')
						.siblings()
						.removeClass('active');
				}
					
			});
		},
		scrollToTopAnimation: function () {
			var self = this;
			// Scroll to top animation when the scroll-top button is clicked
			$('#scroll-top').on('click', function (e) {
				self.scrollToAnimation.call(this, 1000, 0, e);
			});
		},
		scrollToClass: function () {
			var self = this;
			// Scroll to animation - predefined class
			// Just add this to any class and add href attribute to target id
			$('.scrollto').on('click', function (e) {
				self.scrollToAnimation.call(this, 1000, 0, e);
			});
		},
		tooltip: function() {
            // Bootstrap tooltip
			document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(tooltip) {
				new bootstrap.Tooltip(tooltip, {
					trigger: 'hover',
					animation:  false
				})
			});
        },
        popover: function() {
            // Bootstrap popover
			document.querySelectorAll('[data-bs-toggle="popover"]').forEach(function(popover) {
				new bootstrap.Popover(popover, {
					trigger: 'focus'
				})
			});
        },
		toasts: function () {
			// Bootstrap Toasts
			var toastElList = [].slice.call(document.querySelectorAll('.toast'))
			var toastList = toastElList.map(function (toastEl) {
				return new bootstrap.Toast(toastEl);
			});
		},
		countTo: function () {
			// CountTo plugin used count animations for homepages
			if ($.fn.countTo) {
				if ($.fn.waypoint) {
					document.querySelectorAll('.count').forEach( elem => {
						new Waypoint({
							element: elem,
							handler: function() {
								var $elem = $(elem).countTo(); 
	
							},
							offset: function() {
								return ( $(window).height() - 10);
							},
							triggerOnce: true 
						})
					})
				} else {
					$('.count').countTo();
				}	
			} else { 
				// fallback if count plugin doesn't included
				// Get the data-to value and add it to element
				$('.count').each(function () {
					var $this = $(this),
						countValue = $this.data('to');

						$this.text(countValue);
				});
			}
		},
		progressBars: function () {
			var self = this;
			// Calculate and Animate Progress 
			// With waypoing plugin calculate width of the progress bar
			
			if ($.fn.waypoint) {
				document.querySelectorAll('.progress-animate').forEach( elem => {
					new Waypoint({
						element: elem,
						handler: function() {
							var $elem = $(elem); 

							// if progres animated do nothing.
							if ($elem.hasClass('progress-animated')) {
								return;
							}

							if (!$elem.hasClass('circle-progress')) {
								var progressVal = $elem.data('width'),
								progressText = $elem.find('.progress-text');

								$elem.css({ 'width' : progressVal + '%'}, 400).addClass('progress-animated');
								progressText.fadeIn(500, function () {
									$(this).removeClass('progress-animate');
								});
							} else {
								// Animate knob --- Circle progrss bars
								self.animateKnob($elem);
							}
						},
						offset: function() {
							return ( $(window).height() - 10);
						}
					})
				})
			} else {
				// Fallback if the waypoint plugin isn't inclueded
				// Get the value and calculate width of progress bar
				$('.progress-animate').each(function () {
					var $this = $(this),
						progressVal = $(this).data('width'),
						progressText = $this.find('.progress-text');

					$this.css({ 'width' : progressVal + '%'}, 400);
					progressText.fadeIn(500);
				});

			}
		},
		registerKnob: function() {
			// Register knob plugin
			if ($.fn.knob) {
				$('.knob').knob({
					bgColor : '#eee'
				});
			}
		},
		animateKnob: function($elem) {
			// Animate knob
			if ($.fn.knob) {
				var $this = $elem.find('.knob'),
					container = $elem.closest('.progress-animate'),
					animateTo = $this.data('animateto');
					
				$this.animate(
					{ value: animateTo }, 
					{   duration: 1000,
						easing: 'swing',
					progress: function() {
						$this.val(Math.round(this.value)).trigger('change');
					},
					complete: function () {
						container.removeClass('progress-animate').addClass('progress-animated');
					}
				});
			}
		},
		scrollAnimations: function () {
			// Check for class WOW // You need to call wow.min.js and animate.css for scroll animations to work
			if (typeof WOW === 'function') {
				new WOW({
					boxClass:     'wow',      // default
					animateClass: 'animated', // default
					offset:       0          // default
				}).init();
			}

		},
		contactForm: function () {
			// Contact form basic valitation with validate jquery plugin
			// Ajax php files hasn't included so it is not functional yet
			// it will be added if there are requests for it
			if ($.fn.validate) {
				$('#contact-form').validate({
					rules: {
						contactname: 'required',
						contactemail: {
							required: true,
							email: true
						},
						contactmessage: {
							required: true,
							minlength: 50
						}
					},
					messages: {
						contactname: "This field is required. Please enter your name.",
						contactemail: {
							required: "This field is required. Please enter your email address.",
							email: "Please enter a valid email address."
						},
						contactmessage: {
							required: "This field is required. Please enter your message.",
							minlength: "Your message must be at least 50 characters long."
						}
					},
					submitHandler: function (form) {

						/* ajax request will be updated here */
						$.ajax({
							type: 'post',
							url: 'php/mail.php',
							data: $(form).serialize(),
						}).done(function( data ) {
							if ( data == 'success') {
								alert('Email has been sent successfully!')
							} else if ( data == 'already') {
								alert( 'You already sent a message. Please try again later' );
							} else {
								alert( 'There is an error please try again later!' );
							}
						}).error(function() {
							alert( 'There is an error please try again later!' );
						});

						return false;
					}
				});
			}
		},
		contactFormFixes: function () {
			/* Contact form label animation check*/
			/* if contact form input values are not empty, do not back move  its label*/
			var contactFrom = $('#contact-form');
			contactFrom.find('input, textarea').on('blur', function () {
				var $this = $(this),
					inputVal = $this.val(),
					animatedLabel = $this.siblings('.animated-label');

				if (inputVal !== '') {
					animatedLabel.addClass('not-empty');
				} else {
					animatedLabel.removeClass('not-empty');
				}
			});

			/* Fix for reset button Remove the not-empty class when reset button is clicked */
			contactFrom.find('input[type="reset"]').on('click', function () {
				contactFrom.find('.animated-label').removeClass('not-empty');
			});
		},
		scrollSpyRefresh: function () {
			/* When using scrollspy in conjunction with adding or removing of elements 
			from the Dom, we need to use this function to refresh scrollspy like so: */
			var dataSpyList = [].slice.call(document.querySelectorAll('[data-bs-spy="scroll"]'))
			dataSpyList.forEach(function (dataSpyEl) {
				bootstrap.ScrollSpy.getInstance(dataSpyEl).refresh()
			});
		},
		masonryBlog:function () {
			// Trigger for isotope for blog // example: index14.html
			if($.fn.isotope) {
				this.blogContainer.isotope({
					itemSelector: '.article',
					layoutMode: 'masonry'
				});
			}
		},
		// Portfolio/Gallery pages isotope
		calculateWidth: function () {
			// Calculate portfolio items width for better responsive items
			var widthPort = $(window).width(),
                    contWidth = this.container.width(),
                    maxColumn = this.container.data('maxcolumn'),
                    itemW;

            if (widthPort > 1170) {
				itemW = (maxColumn) ? maxColumn: 5;
            } else if (widthPort > 960) {
                itemW = (maxColumn) ? ( (maxColumn > 4 ) ? 4 : 3 ) : 4;
            } else if (widthPort > 767) {
                itemW = 3;
            } else if (widthPort > 540) {
                itemW = 2;
            } else {
                itemW = 1;
            }

            var targetItems = this.container.find('.portfolio-item');
            if (itemW >= 4 && targetItems.hasClass('wide')) {
            	this.container.find('.wide').css('width', (Math.floor(contWidth / itemW) * 2 ));
				targetItems.not('.wide').css('width', Math.floor(contWidth / itemW ));
            } else {
				targetItems.css('width', Math.floor(contWidth / itemW));
            }
			
		},
		isotopeActivate: function() {
			// Trigger for isotop plugin
			if($.fn.isotope) {
				var container = this.container,
					layoutMode = container.data('layoutmode');

				var iso = container.isotope({
					itemSelector: '.portfolio-item',
					layoutMode: (layoutMode) ? layoutMode : 'masonry',
					transitionDuration: 0
				}).data('isotope');
			}
		},
		isotopeReinit: function () {
			// Recall for isotope plugin
			if($.fn.isotope) {
				this.container.isotope('destroy');
				this.isotopeActivate();

				this.blogContainer.isotope('destroy');
				this.masonryBlog();
			}
		},
		isotopeFilter: function () {
			// Isotope plugin filter handle
			// Isotope plugin filter handle
			var self = this,
				filterContainer = $('#portfolio-filter');

			filterContainer.find('a').on('click', function(e) {
				var $this = $(this),
					selector = $this.attr('data-filter'),
					animationclass = self.container.data('animationclass'),
					customAnimation = (animationclass) ? animationclass : 'fadeInUp';

				filterContainer.find('.active').removeClass('active');

				// Delete css Animation and class 
				// They effects filtering
				self.container.find('.portfolio-item').removeClass('animate-item '+ customAnimation);

				// And filter now
				self.container.isotope({
					filter: selector,
					transitionDuration: '0.8s'
				});
				
				$this.addClass('active');
				e.preventDefault();
			});
		},
		elementsAnimate: function () {
			// Appear animation on load for gallery/portfolio items
			var animationclass = this.container.data('animationclass'),
				customAnimation = (animationclass) ? animationclass : 'fadeInUp',
				elemLen = this.container.find('.animate-item').length,
				count = 0; // to keep element count


			this.container.find('.animate-item').each(function() {
                var $this = $(this),
                    time = $this.data('animate-time');

				++count;
				
                setTimeout(function() {
                    $this.addClass('animated ' +customAnimation);
                }, time);
                
                if (count === elemLen) {
					this.portfolioItemsAnimated = true;
                }
            });
            /* relayout isotope after animation */
            if($.fn.isotope && this.portfolioItemsAnimated) {
				this.container.isotope('layout');
			}
		},
		scrollTriggerforPortfolioAnim:function () {
			if($.fn.waypoint) {
				/* Trigger Portfolio item Animations */
				this.container.waypoint( 
					Geass.elementsAnimate.bind(this),
					{ 
						offset: '90%',
						triggerOnce: true 
					}
				);
			} else {
				Geass.elementsAnimate();
			}
		},
		hoverAnimation: function () {
			// Hover animation for gallery/portfolio pages
			var rotate3d = this.container.data('rotateanimation'),
				rotate3dActive = ( rotate3d ) ? rotate3d : false;
				
				if ($.fn.hoverdir) {
					this.container.find('li').each(function ()  {
						$(this).hoverdir({
							speed: 400,
							hoverDelay: 0,
							hoverElem: '.portfolio-overlay',
							rotate3d : rotate3dActive
						});
					});
				}
		},
		openProject: function () {
			// Open portfolio project with custom animations
			var self = this,
				targetEl = $('#portfolio-single-content'),
				targetElIn = targetEl.find('.single-portfolio');


			$('.open-btn').on('click', function (e) {
				e.preventDefault();
				var $this = $(this),
					parentEl = $this.closest('.portfolio-item');

				self.lastActivePos = parentEl.offset().top;

				if(!targetEl.is(':hidden')) {

					self.container.find('.portfolio-item.active').removeClass('active');

					self.loadProject.call($this, targetEl, parentEl);

				} else {

					self.loadProject.call(this, targetEl, parentEl);

				}
			});
		},
		loadProject: function (targetEl, parentEl) {
			var $this= $(this),
				targetPro = $this.attr('href');

			if(targetPro === '') {
				alert('Path is empyt! Please use right path for the project!');
				return;
			}

			if (targetPro.indexOf('.html') == -1) {
				alert('Not a valid path! Please use right path for the project!');
				return;
			}

			var ajaxCall = new $.Deferred();

			$.when(ajaxCall).done(function(data) {

				targetEl.animate({'height': 'show'}, 600, function () {

					var targetPosition = ( ( targetEl.offset().top ) - 110 );
					$('html, body').animate({'scrollTop' : targetPosition}, 700);
					
					// Refresh scrollspyt
					/*$('[data-spy="scroll"]').each(function () {
						var $spy = $(this).scrollspy('refresh')
					});
					*/
					parentEl.addClass('active');
				});

				Geass.closeProject();
				Geass.singlePortfolioOwl();
			});

			targetEl.load(targetPro+' #project-content', function (response, status, xhr) {
				ajaxCall.resolve();
			});

		},
		closeProject: function () {
			// Close Projects
			var self = this,
				targetEl = $('#portfolio-single-content'),
				targetElIn = targetEl.find('.single-portfolio');

			$('.portfolio-close').on('click', function (e) {

				$(targetEl).animate({'height': 'hide'}, 400, function () {
					self.container.find('.portfolio-item.active').removeClass('active');
					$(this).html('');
					$('html, body').animate({'scrollTop' : self.lastActivePos}, 700);
				});

				e.preventDefault();
			});

		}
	};

	Geass.init();

	// Scroll Event
	$(window).on('scroll', function () {
		/* Display Scrol to Top Button */
		Geass.scrollTopBtnAppear();
	});

	// Resize Event 
	// Smart resize if plugin not found window resize event
	var resizeFixWinWidth = $(window).width();
	$(window).on('resize', function () {
		var resizeCheckWinWidth = $(window).width();
		if ($(window).width() !== resizeFixWinWidth) {
			/* Portfolio items / isotope retrigger */
			Geass.calculateWidth();
			Geass.isotopeReinit();

			/* Refresh scrollspy */
			Geass.scrollSpyRefresh();
			resizeFixWinWidth = resizeCheckWinWidth;
		}
	});

	// Orientationchange trigger fullscreen fix
	window.addEventListener("orientationchange", function(event) {
		Geass.fullHeightFixForMobile();
	});

	// Google Map - Contact Map
	if (document.getElementById("map") && typeof google === "object") {
		var locations = [
			['<div class="map-info-box">' +
				'<ul class="contact-info-list">' +
					'<li><span><i class="fa fa-home fa-fw"></i></span> ' + 
						'Mimar Sinan Mh., Konak/İzmir, Türkiye' +
					'</li>' + 
					'<li><span><i class="fa fa-phone fa-fw"></i></span> ' +
						'0 (0911) 324 11 83' +
					'</li>' + 
				'</ul>' + 
			'</div>', 38.396652, 27.090560, 9],
			['<div class="map-info-box">' +
				'<ul class="contact-info-list">' +
					'<li><span><i class="fa fa-home fa-fw"></i></span> ' + 
						'Kültür Mh., Konak/İzmir, Türkiye' +
					'</li>' + 
					'<li><span><i class="fa fa-phone fa-fw"></i></span> ' +
						'0 (0911) 324 11 84' +
					'</li>' + 
				'</ul>' + 
			'</div>', 38.432742, 27.159140, 8]
		];

		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 13,
			center: new google.maps.LatLng(38.414592, 27.143122),
			scrollwheel: false,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});

		var infowindow = new google.maps.InfoWindow();


		var marker, i;

		for (i = 0; i < locations.length; i++) {  
			marker = new google.maps.Marker({
				position: new google.maps.LatLng(locations[i][1], locations[i][2]),
				map: map,
				animation: google.maps.Animation.DROP,
				icon: 'images/pin.png',
			});

			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					infowindow.setContent(locations[i][0]);
					infowindow.open(map, marker);
				}
			})(marker, i));
		}
	}
	
})(jQuery);