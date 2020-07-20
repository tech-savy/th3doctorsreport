	/*----------------------------------------------------*/
  	/* Smooth Scrolling
  	------------------------------------------------------ */
  	$('.smoothscroll').on('click', function (e) {
	 	
        e.preventDefault();

      var target = this.hash,
       $target = $(target);

       $('html, body').stop().animate({
          'scrollTop': $target.offset().top
     }, 800, 'swing', function () {
         window.location.hash = target;
     });

     });  
 
     /*----------------------------------------------------*/
  	/* Flexslider
  	/*----------------------------------------------------*/
  	$(window).load(function() {

        $('#hero-slider').flexslider({
         namespace: "flex-",
        controlsContainer: ".hero-container",
        animation: 'fade',
        controlNav: true,
        directionNav: false,
        smoothHeight: true,
        slideshowSpeed: 7000,
        animationSpeed: 600,
        randomize: false,
        before: function(slider){
             $(slider).find(".animated").each(function(){
                 $(this).removeAttr("class");
                });			  	
          },
          start: function(slider){
             $(slider).find(".flex-active-slide")
                         .find("h1").addClass("animated fadeInDown show")
                         .next().addClass("animated fadeInUp show");
                             
             $(window).trigger('resize');		  			 
          },
          after: function(slider){
               $(slider).find(".flex-active-slide")
                         .find("h1").addClass("animated fadeInDown show")
                         .next().addClass("animated fadeInUp show");			  
          }
     });

     $('#testimonial-slider').flexslider({
         namespace: "flex-",
        controlsContainer: "",
        animation: 'slide',
        controlNav: true,
        directionNav: false,
        smoothHeight: true,
        slideshowSpeed: 7000,
        animationSpeed: 600,
        randomize: false,
     });

 });

    /*----------------------------------------------------*/
  	/* FitText Settings
  	------------------------------------------------------ */
  	setTimeout(function() {

        $('#hero-slider h1').fitText(1, { minFontSize: '30px', maxFontSize: '49px' });
 
       }, 100);
 

