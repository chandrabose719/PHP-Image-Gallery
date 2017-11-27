$(document).ready(function(){
      // Preloader Part
      $(window).load(function(){ 
            jQuery("#preloader").delay(100).fadeOut("slow");
            jQuery("#load").delay(100).fadeOut("slow");
      });
      // Div fadeIn Part
      wow = new WOW({}).init();
      // Nice Scroll
      $("html").niceScroll();
      //jQuery for page scrolling feature
      $(function(){
            $('.navbar-nav li a').bind('click', function(event) {
                  var $anchor = $(this);
                  $('html, body').stop().animate({
                        scrollTop: $($anchor.attr('href')).offset().top
                  }, 1500, 'easeInOutExpo');
                  event.preventDefault();
            });
      });
      // About Us Part
      $(function(){ 
            $('.project-content-1').show();
            $('#about-image-1').hover(function() {
                $('.project-content-1').show();
                $('.project-content-2').hide();
                $('.project-content-3').hide();
                $('.project-content-4').hide();
                $('.project-content-5').hide();
                $('.project-content-6').hide();
            });
                  
            $('#about-image-2').hover(function() {
                $('.project-content-2').show();
                $('.project-content-1').hide();
                $('.project-content-3').hide();
                $('.project-content-4').hide();
                $('.project-content-5').hide();
                $('.project-content-6').hide();
            });
                  
            $('#about-image-3').hover(function() {
                $('.project-content-3').show();
                $('.project-content-1').hide();
                $('.project-content-2').hide();
                $('.project-content-4').hide();
                $('.project-content-5').hide();
                $('.project-content-6').hide();
            });

            $('#about-image-4').hover(function() {
                $('.project-content-4').show();
                $('.project-content-1').hide();
                $('.project-content-2').hide();
                $('.project-content-3').hide();
                $('.project-content-5').hide();
                $('.project-content-6').hide();
            });

            $('#about-image-5').hover(function() {
                $('.project-content-5').show();
                $('.project-content-1').hide();
                $('.project-content-2').hide();
                $('.project-content-3').hide();
                $('.project-content-4').hide();
                $('.project-content-6').hide();
            });

            $('#about-image-6').hover(function() {
                $('.project-content-6').show();
                $('.project-content-1').hide();
                $('.project-content-2').hide();
                $('.project-content-3').hide();
                $('.project-content-4').hide();
                $('.project-content-5').hide();
            });
      });
      // Program Deriction Part
      $(function(){
            $(' #da-thumbs > li ').each(function(){ 
                  $(this).hoverdir(); 
            });
      });
});
