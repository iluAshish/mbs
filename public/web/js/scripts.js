//Home slider
$('.homeBannerSlider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    focusOnSelect: false,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: true,
    arrows:true,
    pauseOnHover: true,
    centerMode: false,
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {dots: true, arrows:false,}
        },
    ]
});
//Home slider

//Brands slider
$('.brandsSlider').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    focusOnSelect: false,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    appendArrows: $('.brandsSlider-nav'),
    dots: false,
    arrows:true,
    pauseOnHover: false,
    centerMode: false,
    responsive: [
        {
            breakpoint: 1399.98,
            settings: {slidesToShow: 5,}
        },
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 4,}
        },
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 3,}
        },
        {
            breakpoint: 767.98,
            settings: {slidesToShow: 2,}
        },
    ]
});
//Brands slider

//Home We Do Slider
$('.weDoSlider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows:true,
    appendArrows: $('.weDoSlider-nav'),
    pauseOnHover: false,
    centerMode: false,
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 3,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 525,
            settings: {slidesToShow: 1,}
        },
    ]
});
//Home We Do Slider

//Testimonial slider
$('.testimonialSlider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    focusOnSelect: false,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows:true,
    appendArrows: $('.testimonialSlider-nav'),
    pauseOnHover: true,
    centerMode: false,
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 767.98,
            settings: {slidesToShow: 1,}
        },
    ]
});
//Testimonial slider


//Client Slider

$('.clientSlider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots:false,
    arrows:true,
    pauseOnHover: false,
    appendArrows: $('.clientSlider-nav'),
    centerMode: false,
    responsive: [
        {
            breakpoint: 1399.98,
            settings: {slidesToShow: 3,}
        },
        {
            breakpoint: 767.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 360,
            settings: {slidesToShow: 1,}
        }
    ]
});
//Client Slider

//News slider
$('.latestNewsSlider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    focusOnSelect: false,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows:true,
    appendArrows: $('.latestNewsSlider-nav'),
    pauseOnHover: true,
    centerMode: false,
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 767.98,
            settings: {slidesToShow: 1,}
        },
    ]
});
//News slider

//Related Products Slider
$('.relatedSlider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots:false,
    arrows:true,
    pauseOnHover: false,
    appendArrows: $('.relatedSlider-nav'),
    centerMode: false,
    responsive: [
        {
            breakpoint: 1399.98,
            settings: {slidesToShow: 3,}
        },
        {
            breakpoint: 767.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 425,
            settings: {slidesToShow: 1,}
        }
    ]
});
//Related Products Slider

//Product Details Slider

$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: true,
    centerMode: false,
    arrows: false,
    focusOnSelect: true,
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 4,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 5,}
        },
        {
            breakpoint: 767,
            settings: {slidesToShow: 5,}
        },
        {
            breakpoint: 575,
            settings: {slidesToShow: 4,}
        },
        {
            breakpoint: 400.98,
            settings: {slidesToShow: 4,}
        },
        {
            breakpoint: 350.98,
            settings: {slidesToShow: 3,}
        }
    ]
});

//Product Details Slider


//sticky header
$(window).scroll(function () {
    if ($(this).scrollTop() > 10) {
        $('header').addClass('sticky')
    } else {
        $('header').removeClass('sticky')
    }
});
//sticky header

//sticky Filter
$(window).scroll(function () {
    if ($(this).scrollTop() > 80) {
        $(".listFilterSticky").addClass('sticky')
    } else {
        $(".listFilterSticky").removeClass('sticky')
    }
});
//sticky Filter

