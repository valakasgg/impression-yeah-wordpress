// jQuery Start
jQuery(document).ready(function($){

    // Sticky Navigation
    $(window).scroll(function() {
        if ($(this).scrollTop() > 1) {
            $('#header').addClass('header--fixed');
        } else {
            $('#header').removeClass('header--fixed');
        }
    });
    
    // Menu Toggle
    $(".menu-toggle").click(function(){
        $("#menu").fadeToggle();
        $(".fa-bars").toggleClass('fa-times'); 
    });
    
    // Search Toggle
    $(".search-toggle").click(function(){ 
        $("#search").slideToggle();
        $(".fa-magnifying-glass").toggleClass('fa-times');
    });

    // Sub Menu Toggle
    $("#menu .menu-item").hover(function(e){
        e.stopPropagation();
        $(this).find(".sub-menu").slideToggle("slide");
    });
    
    $('.related-case-studies').slick({
        infinite: true,
        arrows : false,
    });

    $('.related-product-categories').slick({
        infinite: true,
        arrows : false,
        slidesToShow: 4,
        adaptiveHeight: true,
        autoplay: true,
        responsive: [
        {
          breakpoint: 1200,
          settings: {
            slidesToShow: 3,
          }
        },
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
          }
        },
      ]
    });

    $('.related-products').slick({
        infinite: true,
        arrows : false,
        slidesToShow: 5,
        autoplay: true,
        responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
          }
        },
      ]
    });
    
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {

        if (this.hash !== "") {
          event.preventDefault();

          var hash = this.hash;

          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){
            window.location.hash = hash;
          });
        }
    });
    
})(jQuery);