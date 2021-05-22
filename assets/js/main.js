$(document).ready(function($) {
  $('#shop_accordion').find('.shop_accordion-toggle').click(function(){
      $(this).next().slideToggle('fast');
      $(".accordion-content").not($(this).next()).slideUp('fast');
    });
    
      $('.shop_accordion_replace').find('.shop_accordion-toggle').click(function(){
      $(this).next().slideToggle('fast');
      $(".accordion-content").not($(this).next()).slideUp('fast');
    });
    
    
  });

  $(document).ready(function(){
    $('.carousel').slick({
      // speed: 500,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      dots:false,
      centerMode: false,
      prevArrow: '<button type="button" data-role="none" class="slick-prev" role="button" aria-required="false" tabindex="0">prev</button>',
      nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button">Next</button>',
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          // centerMode: true,
  
        }
  
      }, {
        breakpoint: 800,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          dots: true,
          infinite: true,
  
        }
      },  {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          infinite: true,
          autoplay: true,
          autoplaySpeed: 2000,
        }
      }]
    });
  }); 
  
  $(document).ready(function(){
    $('.box_carousel').slick({
      // speed: 500,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 3000,
      dots:false,
      accessibility: true,
      focusOnSelect: true,
      centerMode: false,
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          // centerMode: true,
  
        }
  
      }, {
        breakpoint: 800,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          dots: true,
          infinite: true,
  
        }
      },  {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          infinite: true,
          autoplay: true,
          autoplaySpeed: 2000,
        }
      }]
    });

  });
$(document).ready(function(){
    $('.testimonials').slick({
      // speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      dots:true,
      accessibility: true,
      focusOnSelect: true,
      centerMode: false,
      responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          // centerMode: true,
  
        }
  
      }, {
        breakpoint: 800,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          infinite: true,
  
        }
      },  {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          infinite: true,
          autoplay: true,
          autoplaySpeed: 2000,
        }
      }]
    });

  });

  $(document).ready(function(){
    $("ul.sub-menu").parent().addClass("dropdown add_icon");
    $("li.add_icon a").append(' <i class="fas fa-chevron-down"></i>');
    $("ul.sub-menu").addClass("dropdown-menu");
    $("ul#menuid li.dropdown a").addClass("dropdown-toggle dropdown-item");
    $("ul.sub-menu li a").removeClass("dropdown-toggle"); 
    $('.navbar .dropdown-toggle').append('');
    $('a.dropdown-toggle').attr('data-toggle', 'dropdown');


    // Toggle Btn 

    $('.shop_togglemenu i').click( function() {
      $('#navbarSupportedContent').toggle('300');
      return false;
    });
});


if (window.matchMedia("(max-width: 768px)").matches) {
  $(document).ready(function(){

    $('.mobile_slider').slick({
      mobileFirst: true ,
      responsive: [
                  {
                      breakpoint: 2000,
                      settings: "unslick"
                  },
                  {
                      breakpoint: 1600,
                      settings: "unslick"
                  },
                  {
                      breakpoint: 1024,
                      settings: "unslick"
                  },
                  // {
                  //     breakpoint: 600,
                  //     settings: "unslick"
                  // },
                  {
                      breakpoint:768,
                      settings: {
                          arrows: false,
                          fade: true,
                          infinite: true,
                          slidesToShow: 2,
                          slidesToScroll: 2,
                          infinite: true,
                      }
                  } 
                ]
  
    });
  
  });

  
}





// Slick POp

$(document).ready(function($) {
$('.produt_pop').magnificPopup({
  type: 'image',
  closeBtnInside: true,
  mainClass: 'mfp-with-zoom mfp-img-mobile',

  image: {
    verticalFit: true,
    titleSrc: function(item) {
      
      var caption = item.el.attr('title');
      
      var pinItURL = "https://pinterest.com/pin/create/button/";
      
      // Refer to https://developers.pinterest.com/pin_it/
      pinItURL += '?url=' + 'http://dimsemenov.com/plugins/magnific-popup/';
      pinItURL += '&media=' + item.el.attr('href');
      pinItURL += '&description=' + caption;

      return caption + ' <a class="pin-it" href="'+pinItURL+'" target="_blank">';
    }
  },


  gallery: {
    enabled: true 
  }, 



  callbacks: {
    open: function() {
      this.wrap.on('click.pinhandler', '.pin-it', function(e) {
        
      });
    },
    beforeClose: function() {
     
    }
  }

});






});