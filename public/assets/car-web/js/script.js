(function($){

    $(document).ready(function(){

        var searchBtn = $('.mh-search-input');

        searchBtn.on('click', function(){
            $(this).addClass('expand');
            $(this).find('input').focus();
        });

        $("input.search").on('blur', function(){
           if($(this).val().length == 0){
                searchBtn.removeClass('expand');
            }
        });


        var $heroSlider = $('.hero-slider').owlCarousel({
            loop:true,
            margin:100,
            stagePadding:30,
            // autoplay: true,
            // autoplaySpeed: 700,
            loop: true,
            nav: false,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:1,
                    nav:false
                },
                1000:{
                    items:1,
                    loop:false
                }
            }
        });

        $heroSlider.on("changed.owl.carousel", function(e) {
            $(".slider-text").removeClass("animated slideInLeft ");
            $(".slider-img").removeClass("animated slideInLeft ");
          
            var $currentOwlItem = $(".owl-item").eq(e.item.index);
            $currentOwlItem.find(".slider-text").addClass("animated slideInLeft ");
            $currentOwlItem.find(".slider-img").addClass("animated slideInLeft ");
          
          });

        $('.card-slide').owlCarousel({
            loop:true,
            margin:20,
            thumbs: false,
            responsiveClass:true,
            slideTransition: 'ease-in-out',
            navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:4,
                    nav:true,
                    loop:false
                }
            }
        });

        var cardMeta = $(".card-caption > .meta > .show-more");
        var cardInfo = $(".card-img > .info");

        $(document).on('click','.card-caption > .meta',function(e){ 

            var element = e.currentTarget.parentElement.parentElement.parentElement;
            element.classList.add("show");

            $(".card-slide .card").each(function(i, el){
                if(el != element){
                    $(el).removeClass("show"); 
                }
            })

        });
        $(document).on('click','.card-img > .info',function(e){ 

            var element = e.currentTarget.parentElement.parentElement;
            element.classList.remove("show");

        });


        $('.vehicle-imgSlider').owlCarousel({
            autoplay: false,
            autoplayHoverPause: true,
            dots: false,
            nav: true,
            thumbs: true,
            thumbImage: true,
            thumbsPrerendered: true,
            thumbContainerClass: 'owl-thumbs',
            thumbItemClass: 'owl-thumb-item',
            loop: true,
            navText: [
                "<i class='fa fa-chevron-left' aria-hidden='true'></i>",
                "<i class='fa fa-chevron-right' aria-hidden='true'></i>"
            ],
            items: 1,
            responsive: {
                0: {
                items: 1,
                },
                768: {
                items: 1,
                },
                992: {
                items: 1,
                }
            }
        });

        $("#ex18b").slider({
            min: 0,
            max: 10,
            value: [3, 6],
            labelledby: ['ex18-label-2a', 'ex18-label-2b']
        });
         
        
      });

      // Mouse wheel
// $(window).on('mousewheel DOMMouseScroll', function(e){
//     if(typeof e.originalEvent.detail == 'number' && e.originalEvent.detail !== 0) {
//       if(e.originalEvent.detail > 0) {
//         $('.navbar').removeClass('sticky');
//       } else if(e.originalEvent.detail < 0){
//         $('.navbar').addClass('sticky');
//       }
//     } else if (typeof e.originalEvent.wheelDelta == 'number') {
//       if(e.originalEvent.wheelDelta < 45 && $(window).scrollTop() > $('.masthead').innerHeight() - 150) {
//         $('.navbar').removeClass('sticky');
//       } else if(e.originalEvent.wheelDelta > 45) {
//         $('.navbar').addClass('sticky');
//       }
//     }
//   });

})(jQuery)