
// $('.welcomeSliderleft').slick({
//     slidesToShow: 1,
//     fade: true,
//     focusOnSelect: true,
//     autoplay: true,
//     infinite: true,
//     draggable: true,
//     swipeToSlide: true,
//     dots: false,
//     arrows: false,
//     pauseOnHover: false,
//     cssEase: 'ease-in-out',
//     autoplaySpeed: 10000,
//     cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
// }).on('afterChange', function(event, slick, currentSlide, nextSlide) {
//     console.log('yes');
//     // var dataId = $(slick.$slides[currentSlide]).data('index');
//     // $('.content').hide();
//     // $('.content[data-id=' + dataId + ']').show();
//     $(".commontypewrite").find("span").remove();
//     // $('.commontypewrite').removeClass('typewrite');
//     $(slick.$slides[currentSlide-1]).find('h1').removeClass('typewrite');
//     // $(slick.$slides[currentSlide-1]).find("span").html('');
//     $(slick.$slides[currentSlide-1]).find("span").remove();
//     $(slick.$slides[currentSlide]).find('h1').addClass('typewrite');
//     var elements = document.getElementsByClassName('typewrite');
//     // for (var i=0; i<elements.length; i++) {
//         var toRotate = elements[0].getAttribute('data-type');
//         var period = elements[0].getAttribute('data-period');
//         if (toRotate) {
//             new TxtType(elements[0], JSON.parse(toRotate), period);
//         }
//     // }
//     // INJECT CSS
//     var css = document.createElement("style");
//     css.type = "text/css";
//     css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
//     document.body.appendChild(css);
// });



//Home ABout Highlight slider
$('.highlightSlider').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: false,
    pauseOnHover: false,
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 2, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 590,
            settings: {slidesToShow: 1,}
        },
    ]
});
//Home ABout Highlight slider

//Clients Slider Start

$('.clientSliderOne').slick({
    slidesToShow: 1,
    fade: true,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: false,
    pauseOnHover: false,
    cssEase: 'ease-in-out',
    autoplaySpeed: 4000,
    cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
});

$('.clientSliderTwo').slick({
    slidesToShow: 1,
    fade: true,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: false,
    pauseOnHover: false,
    cssEase: 'ease-in-out',
    autoplaySpeed: 5000,
    cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
});

$('.clientSliderThree').slick({
    slidesToShow: 1,
    fade: true,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: false,
    pauseOnHover: false,
    cssEase: 'ease-in-out',
    autoplaySpeed: 6000,
    cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
});

//Clients Slider End

//Home Services slider
$('.homeServicesSlider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: true,
    arrows: false,
    pauseOnHover: false,
    autoplaySpeed: 4500,
    speed: 1000,
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 1, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 1,}
        },
        {
            breakpoint: 590,
            settings: {slidesToShow: 1,}
        },
    ]
});
//Home Services slider

//Home Case Slider

var rev = $('.rev_slider');
rev.on('init', function(event, slick, currentSlide) {
    var
        cur = $(slick.$slides[slick.currentSlide]),
        next = cur.next(),
        next2 = cur.next().next(),
        prev = cur.prev(),
        prev2 = cur.prev().prev();
    prev.addClass('slick-sprev');
    next.addClass('slick-snext');
    cur.removeClass('slick-snext').removeClass('slick-sprev');
    slick.$prev = prev;
    slick.$next = next;
}).on('beforeChange', function(event, slick, currentSlide, nextSlide) {

    var
        cur = $(slick.$slides[nextSlide]);
    console.log(slick.$prev, slick.$next);
    slick.$prev.removeClass('slick-sprev');
    slick.$next.removeClass('slick-snext');
    slick.$prev.prev().removeClass('slick-sprev2');
    slick.$next.next().removeClass('slick-snext2');
    next = cur.next(),
        prev = cur.prev();
    //prev2.prev().prev();
    //next2.next().next();
    prev.addClass('slick-sprev');
    next.addClass('slick-snext');
    prev.prev().addClass('slick-sprev2');
    next.next().addClass('slick-snext2');
    slick.$prev = prev;
    slick.$next = next;
    cur.removeClass('slick-next').removeClass('slick-sprev').removeClass('slick-next2').removeClass('slick-sprev2');
});

rev.slick({
    speed: 1000,
    dots: true,
    focusOnSelect: true,
    infinite: true,
    centerMode: true,
    slidesPerRow: 1,
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.revSliderDetails',
    centerPadding: '0',
    autoplaySpeed: 7500,
    autoplay: true,
    swipe: true,
    pauseOnHover: true,
    customPaging: function(slider, i) {
        return '';
    },
    /*infinite: false,*/
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 1, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 1, dots: false,arrows: false,}
        },
        {
            breakpoint: 590,
            settings: {slidesToShow: 1, dots: false,arrows: false,}
        },
    ]
});

$('.revSliderDetails').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    dots: false,
    // draggable: false,
    pauseOnHover: true,
    cssEase: 'ease-in-out',
    autoplaySpeed: 7500,
    asNavFor: '.rev_slider',
    adaptiveHeight: false,
    arrows: false,
    fade: true,
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 1, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 1,arrows: true, appendArrows: $('.slick-slider-nav-sp'),}
        },
        {
            breakpoint: 590,
            settings: {slidesToShow: 1,arrows: true, appendArrows: $('.slick-slider-nav-sp'),}
        },
    ]
});

//Home Case Slider



//Portfolio Filter Start

$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        if(value == "all")
        {
            $('.filter').show('1000');
        }
        else
        {
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');

        }

        if ($(".filter-button").removeClass("active")) {
            $(this).removeClass("active");
        }
        $(this).addClass("active");
        if($(this).data('page') == 'portfolio')
            window.scrollTo(0, $('.subHeading').offset().top);
    });

    $(".accordion-about-btn").click(function(){
        $(".accordion-item").removeClass('about_upper_accordion_item');
        $(".accordion-item").removeClass('about_lower_accordion_item');
        $(".accordion-item").removeClass('about_current_accordion_item');
        console.log($(this).data('index-val'));
        var this_val = $(this).data('index-val');
        $(".accordion-about-btn").each(function(key, index) {
            if($(this).data('index-val') < this_val)
                $(this).closest('.accordion-item').addClass( "about_upper_accordion_item" );
            if($(this).data('index-val') > this_val)
                $(this).closest('.accordion-item').addClass( "about_lower_accordion_item" );
            if($(this).data('index-val') == this_val)
                $(this).closest('.accordion-item').addClass( "about_current_accordion_item" );
        });
    });
});

//Portfolio Filter End


//Home Testimonial slider
$('.homeTestimonialSlider').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: true,
    arrows: false,
    pauseOnHover: true,
    autoplaySpeed: 4500,
    speed: 1000,
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 2, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 767,
            settings: {slidesToShow: 1,}
        },
    ]
});
//Home Testimonial slider

//Home Blogs slider
$('.homeBlogSlider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: true,
    arrows: false,
    pauseOnHover: false,
    autoplaySpeed: 4500,
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 3, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 767,
            settings: {slidesToShow: 1,}
        },
    ]
});
//Home Blogs slider

//Recent Project slider
$('.recentProjectSlider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: true,
    appendArrows: $('.slick-slider-nav-sp'),
    pauseOnHover: false,
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 3, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 767,
            settings: {slidesToShow: 1,}
        },
        {
            breakpoint: 600,
            settings: {slidesToShow: 1, appendArrows: $('.slick-slider-nav-sp2'), }
        },
    ]
});
//Recent Project slider



// Blogs Recent slider
$('.blogRecentSlider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: true,
    pauseOnHover: false,
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 1, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 1,}
        },
        {
            breakpoint: 767,
            settings: {slidesToShow: 1,}
        },
    ]
});
// Blogs Recent slider


// Team List Slider


$('.teamSingleSlider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: true,
    pauseOnHover: true,
    autoplaySpeed: 3000,
    lazyLoad: 'ondemand',
    speed: 1000,
    fade: true,
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 1, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 1,}
        },
        {
            breakpoint: 767,
            settings: {slidesToShow: 1,}
        },
    ]
});


$('.teamListSlider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: true,
    pauseOnHover: false,
    autoplaySpeed: 3000,
    lazyLoad: 'ondemand',
    speed: 1000,
    responsive: [
        {
            breakpoint: 1499.98,
            settings: {slidesToShow: 3, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 767,
            settings: {slidesToShow: 1,}
        },
    ]
});

// Team List Slider


// Other Services

$('.otherServicesHomeSlider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: true,
    pauseOnHover: true,
    responsive: [
        {
            breakpoint: 1599.98,
            settings: {slidesToShow: 3, slidesToScroll: 1,}
        },
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 2, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 767,
            settings: {slidesToShow: 1,}
        },
    ]
});

// Other Services


// Other Services

$('.otherServicesSlider').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: true,
    pauseOnHover: false,
    responsive: [
        {
            breakpoint: 1599.98,
            settings: {slidesToShow: 4, slidesToScroll: 1,}
        },
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 3, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 767,
            settings: {slidesToShow: 1,}
        },
    ]
});

// Other Services





//sticky header
$(window).scroll(function () {
    if ($(this).scrollTop() > 150) {
        $('header').addClass('sticky')
    } else {
        $('header').removeClass('sticky')
    }
});
//sticky header




// Mega Menu Start

document.addEventListener("DOMContentLoaded", function(){

    /////// Prevent closing from click inside dropdown
    document.querySelectorAll('.dropdown-menu').forEach(function(element){
        element.addEventListener('click', function (e) {
            e.stopPropagation();
        });
    });

    // make it as accordion for smaller screens
    if (window.innerWidth < 992) {

        // close all inner dropdowns when parent is closed
        document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
            everydropdown.addEventListener('hidden.bs.dropdown', function () {
                // after dropdown is hidden, then find all submenus
                this.querySelectorAll('.megasubmenu').forEach(function(everysubmenu){
                    // hide every submenu as well
                    everysubmenu.style.display = 'none';
                });
            })
        });

        document.querySelectorAll('.has-megasubmenu a').forEach(function(element){
            element.addEventListener('click', function (e) {

                let nextEl = this.nextElementSibling;
                if(nextEl && nextEl.classList.contains('megasubmenu')) {
                    // prevent opening link if link needs to open dropdown
                    e.preventDefault();

                    if(nextEl.style.display == 'block'){
                        nextEl.style.display = 'none';
                    } else {
                        nextEl.style.display = 'block';
                    }

                }
            });
        })
    }
    // end if innerWidth
});

// Mega Menu End

$(".contactSelect").select2({
    placeholder: "Select your service",
    allowClear: true
});








$(window).on('load', function () {
    $('#loading').hide();
});
// $('.slick-slide').on('change', function () {
//     console.log('yes');
//     if($(this).hasClass('slick-active')){
//         $('.commontypewrite').removeClass('typewrite');
//         $(this).find('h1').addClass('typewrite');
//     }
// });

// $('.welcomeSliderleft .slick-slide').each(function (index) {
//     if($(this).hasClass('slick-active')){
//         $('.commontypewrite').removeClass('typewrite');
//         $(this).find('h1').addClass('typewrite');
//     }
// });