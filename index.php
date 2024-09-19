<?php
   /*	
    Index
    Autor: Edgar Rafael García
    Fecha: Diciembre 2021
   */
   error_reporting(E_ALL);
   ini_set('display_errors', 'Off');
   include_once(dirname(__FILE__). '/config.inc');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Timotes Machine Shop</title>
      <meta name="description" content="Geass is premium and creative multipurpose onepage template">
      <meta name="author" content="Eon">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;700&display=swap" rel="stylesheet">
      <!-- CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/fontawesome.min.css">
      <link rel="stylesheet" href="css/animate.css">
      <link rel="stylesheet" href="css/jquery.mb.YTPlayer.css">
      <!-- Revolution Slider CSS -->
      <link rel="stylesheet" type="text/css" href="css/settings.css">
      <link rel="stylesheet" type="text/css" href="css/layers.css">
      <link rel="stylesheet" type="text/css" href="css/navigation.css">
      <link rel="stylesheet" href="css/style.css">
      <!-- Pace - page loading animation -->
      <script src="js/pace.min.js"></script>
      <!-- Favicon and Apple Icons -->
      <link rel="shortcut icon" type="image/png" href="images/favicon.ico">
      <link rel="apple-touch-icon" type="image/png" sizes="57x57" href="images/favicon.ico">
      <link rel="apple-touch-icon" type="image/png" sizes="72x72" href="images/favicon.ico">
   </head>
   <body class="header-transparent" data-bs-spy="scroll" data-bs-target="#main-menu">
      <div id="wrapper">
         <?php include_once(DIR_MODULOS.'main.php');?>
      </div>
      <!-- scroltop -->
      <a href="#top" id="scroll-top" title="Go to top"><i class="fas fa-angle-double-up text-yellow"></i></a>
      <!-- Plugins -->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery.waypoints.min.js"></script>
      <script src="js/owl-carousel.min.js"></script>
      <script src="js/jquery.validation.min.js"></script>
      <script src="js/jquery.fittext.js"></script>
      <script src="js/jquery.hoverdir.js"></script>
      <script src="js/wow.min.js"></script>
      <script src="js/jquery.knob.min.js"></script>
      <script src="js/jquery.countTo.js"></script>
      <script src="js/isotope.min.js"></script>
      <script src="js/jquery.mb.YTPlayer.min.js"></script>
      <!-- Revolution Slider -->
      <script src="js/jquery.themepunch.tools.min.js"></script>
      <script src="js/jquery.themepunch.revolution.min.js"></script>
      <!--Revolution Slider Extensions (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->	
      <script src="js/extensions/revolution.extension.actions.min.js"></script>
      <script src="js/extensions/revolution.extension.carousel.min.js"></script>
      <script src="js/extensions/revolution.extension.kenburn.min.js"></script>
      <script src="js/extensions/revolution.extension.layeranimation.min.js"></script>
      <script src="js/extensions/revolution.extension.migration.min.js"></script>
      <script src="js/extensions/revolution.extension.navigation.min.js"></script>
      <script src="js/extensions/revolution.extension.parallax.min.js"></script>
      <script src="js/extensions/revolution.extension.slideanims.min.js"></script>
      <script src="js/extensions/revolution.extension.video.min.js"></script>
      <script src="js/main.js"></script>
      <script>
         var revapi;
         $(document).ready(function() {
         if( $("#rev-slider-3").revolution == undefined ){
             revslider_showDoubleJqueryError("#rev-slider-3");
         } else {
             revapi = $("#rev-slider-3").show().revolution({
                 sliderType:"standard",
                 jsFileLocation:"js/",
                 sliderLayout:"fullscreen",
                 dottedOverlay:"none",
                 delay:9000,
                 navigation: {
                     keyboardNavigation:"off",
                     keyboard_direction: "horizontal",
                     mouseScrollNavigation:"off",
                     mouseScrollReverse:"default",
                     onHoverStop:"off",
                     touch:{
                         touchenabled:"on",
                         swipe_threshold: 75,
                         swipe_min_touches: 1,
                         swipe_direction: "horizontal",
                         drag_block_vertical: false
                     },
                     arrows: {
                         style: "erinyen",
                         enable: true,
                         hide_onmobile: false,
                         hide_onleave: false,
                         hide_under: 768,
                         tmp: '<div class="tp-title-wrap">  	<div class="tp-arr-imgholder"></div>    <div class="tp-arr-img-over"></div>	<span class="tp-arr-titleholder">{{title}}</span> </div>',
                         left: {
                             h_align: "left",
                             v_align: "center",
                             h_offset: 10,
                             v_offset: 0
                         },
                         right: {
                             h_align: "right",
                             v_align: "center",
                             h_offset: 10,
                             v_offset: 0
                         }
                     },
                     bullets: {
                         enable: false,
                         hide_onmobile: false,
                         style: "erinyen",
                         hide_onleave: false,
                         direction: "horizontal",
                         h_align: "center",
                         v_align: "bottom",
                         h_offset: 20,
                         v_offset: 30,
                         space: 5,
                         tmp: ''
                     },
                     thumbnails: {
                         style: "hesperiden",
                         enable: true,
                         width: 100,
                         height: 50,
                         min_width: 100,
                         wrapper_padding: 5,
                         wrapper_color: "transparent",
                         wrapper_opacity: "1",
                         tmp: '<span class="tp-thumb-image"></span><span class="tp-thumb-title">{{title}}</span>',
                         visibleAmount: 5,
                         hide_onmobile: false,
                         hide_onleave: false,
                         hide_under: 768,
                         direction: "vertical",
                         span: false,
                         position: "inner",
                         space: 6,
                         h_align: "left",
                         v_align: "bottom",
                         h_offset: 30,
                         v_offset: 40
                     }
                 },
                 viewPort: {
                     enable:true,
                     outof:"pause",
                     visible_area:"80%",
                     presize:false
                 },
                 responsiveLevels:[1240,1024,778,480],
                 visibilityLevels:[1240,1024,778,480],
                 gridwidth:[1240,1024,778,480],
                 gridheight:[600,600,500,400],
                 lazyType:"all",
                 parallax: {
                     type:"mouse",
                     origo:"slidercenter",
                     speed:2000,
                     levels:[2,3,4,5,6,7,12,16,10,50,47,48,49,50,51,55],
                     type:"mouse",
                 },
                 shadow:0,
                 spinner:"spinner5",
                 stopLoop:"off",
                 stopAfterLoops:-1,
                 stopAtSlide:-1,
                 shuffle:"off",
                 autoHeight:"off",
                 hideThumbsOnMobile:"off",
                 hideSliderAtLimit:0,
                 hideCaptionAtLimit:0,
                 hideAllCaptionAtLilmit:0,
                 debugMode:false,
                 fallbacks: {
                     simplifyAll:"off",
                     nextSlideOnWindowFocus:"off",
                     disableFocusListener:false,
                 }
             });
         }
         });	/*ready*/
      </script>
   </body>
</html>