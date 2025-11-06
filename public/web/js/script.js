
// ===========Sticky Header====================
window.addEventListener("scroll", function () {
  var header = document.getElementById("header");
  if (window.scrollY < 10) {
    header.classList.remove("scrolled");
  } else {
    header.classList.add("scrolled");
  }
});

// Home Banner section fade on intial load
window.addEventListener('load', function() {
  if (document.querySelector(".banner")) {
    document.getElementById('fadeSection').classList.add('visible');
    };
});

// Home Banner - Slider

$(document).ready(function () {
  $(".home-banner .banner-text-slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    asNavFor: ".home-banner .banner-image-slider",
    autoplay: true,
    fade: true,
    cssEase: "linear",
    speed: 800,
       prevArrow: $(".prev"),
    nextArrow: $(".next"),
  });
  $(".home-banner .banner-image-slider").slick({
    asNavFor: ".home-banner .banner-text-slider",
    dots: false,
    arrows: false,
    fade: true,
    cssEase: "linear",
  });
});


//Key feature slider
$('.about .service ').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    focusOnSelect: false,
    autoplay: true,
    infinite: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows:true,
    pauseOnHover: false,
    centerMode: false,
    responsive: [
     
     
        {
            breakpoint: 991,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 575.98,
            settings: {slidesToShow: 1,}
        },
    ]
});

// ===========Products Section Slider=====================
$(document).ready(function () {
  $(".products-slider-init").slick({
    slidesToShow:4,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    cssEase: "linear",
    autoplay:true,
     prevArrow: $(".products-slider-prev"),
    nextArrow: $(".products-slider-next"),
 
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 3,
        },
      },  {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
        },
      },{
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        },
      
      }
    ],
  });
});
// ===========Major Products  Slider - Inner Categories =====================
$(document).ready(function () {
  $(".major-products-slider").slick({
    slidesToShow:4,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    cssEase: "linear",
    autoplay:true,
    variableWidth:true,
     prevArrow: $(".major-products-slider-prev"),
    nextArrow: $(".major-products-slider-next"),
 
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 3,
        },
      },  {
        breakpoint: 991,
        settings: {
          slidesToShow: 2,
        },
      },{
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          
        },
      
      }
    ],
  });
});


// ===========Case Slider=====================
$(document).ready(function () {
  $(".caseStudies-slider").slick({
    slidesToShow:4,
    slidesToScroll: 1,
    dots: false,
    arrows: true,
    cssEase: "linear",
    variableWidth: true,

    autoplay:true,
         prevArrow: $(".caseStudies-slider-prev"),
    nextArrow: $(".caseStudies-slider-next"),

    responsive: [
      {
     
      }, {
        breakpoint: 991,
        settings: {
          slidesToShow: 1,
        },
      }, {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
        },
      }
    ],
  });
});

// ===========Testimonial SLider=====================


 $('.slider-for').slick({
   slidesToShow: 1,
   slidesToScroll: 1,
   arrows: false,
   fade: true,
   dots:false,
   asNavFor: '.slider-nav'
 });
 $('.slider-nav').slick({
   slidesToShow: 2,
   slidesToScroll: 1,
   asNavFor: '.slider-for',
   dots: false,
       autoplay:true,
   focusOnSelect: true,
   vertical: true,
      arrows: true,
            prevArrow: $(".testimonial-slider-prev"),
    nextArrow: $(".testimonial-slider-next"),
 });

// ===========Clients SLider=====================
$(document).ready(function () {
  $(".clients-slider").slick({
    slidesToShow:7,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    cssEase: "linear",
    autoplay:true,

    responsive: [
      {
     
      }, {
        breakpoint: 1199,
        settings: {
          slidesToShow: 6,
        },
      },, {
        breakpoint: 992,
        settings: {
          slidesToShow: 4,
        },
      },{
        breakpoint: 575,
        settings: {
          slidesToShow:3,
        },
      }
    ],
  });
});

// ====================== Aticle Slider=============================
$(document).ready(function () {
  $(".articles-slider").slick({
    slidesToShow:3,
    slidesToScroll: 1,
    dots: false,
      arrows: true,
            prevArrow: $(".articles-slider-prev"),
    nextArrow: $(".articles-slider-next"),
    cssEase: "linear",
    autoplay:true,

    responsive: [
      {
     
      }, {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
        },
      },{
        breakpoint: 575,
        settings: {
          slidesToShow:1,
        },
      }
    ],
  });
});

// ====================== Companies Slider=============================

$(document).ready(function () {
  $(".companies-slider").slick({
    slidesToShow:3,
    slidesToScroll: 1,
    dots: false,
      arrows: true,
      variableWidth :true,
              cssEase: 'linear',
        initialSlide: 0,

            prevArrow: $(".comapnies-prev"),
    nextArrow: $(".comapnies-next"),
    cssEase: "linear",
    autoplay:true,

    responsive: [
      {
     
      }, {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
        },
      },{
        breakpoint: 575,
        settings: {
          slidesToShow:1,
        },
      }
    ],
  });
});
// ==========================contry dorp down=============================

function initializePhoneInput(selector) {	
  const shippingFormWrapper = document.querySelector(selector + ' .phone_number');	
  if (shippingFormWrapper !== null) {	
      const phoneInput = window.intlTelInput(shippingFormWrapper, {	
          preferredCountries: ["ae", "sa", "kw", "bh", "qa","om"],	
          excludeCountries: ["ru", "cu", "sy", "ir", "sd", "ss", "kp", "ye", "KR", "UA"],	
          utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",	
      });	
      $(selector + ' .phone_number').on('blur', function () {	
          contactPhone(selector, phoneInput);	
      });	
  }	
}	

function contactPhone(selector, phoneInput) {	
  let phoneNumber = phoneInput.getNumber(); // Get full international number
  
  if (phoneNumber.startsWith('+')) {
      let countryCode = phoneInput.getSelectedCountryData().dialCode; // Get country code only
      let localNumber = phoneNumber.replace('+' + countryCode, ''); // Remove country code from full number
      phoneNumber = `+${countryCode}-${localNumber}`; // Add separator
  }

  $(selector + ' .phone_number').val(phoneNumber);	
}

	
initializePhoneInput("#enquiryForm");	
initializePhoneInput("#ProductEnquiryForm");	
initializePhoneInput("#ServiceEnquiryForm");	
initializePhoneInput("#quickContact");	
initializePhoneInput("#get-in-touch");	

// ======================Filter Dropdown==========================

document.addEventListener('DOMContentLoaded', function () {
  const allDetails = document.querySelectorAll("aside > details");

  allDetails.forEach((targetDetail) => {
    targetDetail.addEventListener("toggle", () => {
      if (targetDetail.open) {
        allDetails.forEach((detail) => {
          if (detail !== targetDetail && detail.open) {
            detail.open = false;
          }
        });
      }
    });
  });
});

// ======================Product Detail Page==========================
$(document).ready(function(){
  $('.product-slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    // fade: true,
    // autoplay:true,
    loop:true,
    infinit:true,
    asNavFor: '.product-slider-nav'
  });
  $('.product-slider-nav').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.product-slider-for',
    dots: false,
    focusOnSelect: true,
    loop:true,

         infinit:true,

  });
  
$('.product-slider-nav').on('afterChange', function(event, slick, currentSlide){
  if (currentSlide === 0) {
    $('.product-slider-nav .slick-track').css('transform', 'translate3d(0, 0, 0)');
  }
});

  
});


// ===========Brands Slider-- Product Detail Page=====================
$(document).ready(function () {
  $('.brands-slider').slick({
    speed: 4000,            
    autoplay: true,
    autoplaySpeed: 0,          
    cssEase: 'linear',         
    slidesToScroll: 1,
    infinite: true,
    arrows: false,
    dots: false,
    pauseOnHover: false,
    pauseOnFocus: false,
          slidesToShow: 6,
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 5,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 4,
        },
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 3,
        },
      }
    ]
  });
});
// ===========Other Slivices Slider--Service Detail Page=====================
$(document).ready(function () {
  $('.other-services-slider').slick({
    autoplay: true,        
    cssEase: 'linear',         
    slidesToScroll: 1,
    infinite: true,
    arrows: false,
    dots: false,
    pauseOnHover: false,
    pauseOnFocus: false,
      slidesToShow: 4,
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
        },
      }
    ]
  });
});
// ===========Other Products Slider--Product Detail Page=====================
$(document).ready(function () {
  $('.other-products-slider').slick({
    autoplay: true,        
    cssEase: 'linear',         
    slidesToScroll: 1,
    infinite: true,
    arrows: false,
    dots: false,
    pauseOnHover: false,
    pauseOnFocus: false,
      slidesToShow: 4,
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
        },
      }
    ]
  });
});
// ===========Other Products Slider--Brand Detail Page=====================
$(document).ready(function () {
  $('.brands-other-products-slider').slick({
    autoplay: true,        
    cssEase: 'linear',         
    slidesToScroll: 1,
    infinite: true,
    arrows: true,
    dots: false,
    pauseOnHover: false,
    pauseOnFocus: false,
      slidesToShow: 3,
       prevArrow: $(".other-product-prev"),
    nextArrow: $(".other-product-next"),
    responsive: [
         {
        breakpoint: 1199,
        settings: {
          slidesToShow: 2,
        },
      },

      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        },
      }
    ]
  });
});
// ===========Other Products Slider--Brand Detail Page=====================
$(document).ready(function () {
  $('.our-services-slider').slick({
    autoplay: true,        
    cssEase: 'linear',         
    slidesToScroll: 1,
    infinite: true,
    arrows: true,
    dots: false,
    pauseOnHover: false,
    pauseOnFocus: false,
      slidesToShow: 4,
       prevArrow: $(".our-services-prev"),
    nextArrow: $(".our-services-next"),
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 3,
        },
      },
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        },
      }
    ]
  });
});
// ===========Recent projects--Project Detail Page=====================
$(document).ready(function () {
  $('.recent-project-slider').slick({
    autoplay: true,        
    cssEase: 'linear',         
    slidesToScroll: 1,
    infinite: true,
    arrows: true,
    dots: false,
    pauseOnHover: false,
    pauseOnFocus: false,
      slidesToShow: 3,
       prevArrow: $(".recent-project-prev"),
    nextArrow: $(".recent-project-next"),
    responsive: [
      {
        breakpoint: 1199,
        settings: {
          slidesToShow: 2,
        },
      },
  
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
        },
      }
    ]
  });
});
// ===========Recent Blog=====================
$(document).ready(function () {
  $('.recent-blog-slider').slick({
    autoplay: true,        
    cssEase: 'linear',         
    slidesToScroll: 1,
    infinite: true,
    arrows: true,
    dots: false,
    pauseOnHover: false,
    pauseOnFocus: false,
      slidesToShow: 1,
       prevArrow: $(".recent-blogs-prev"),
    nextArrow: $(".recent-blogs-next"),

  });
});

// ===========Other Products Slider--Brand Detail Page=====================
$(document).ready(function () {
  $('.projects-details .slider').slick({
    autoplay: true,        
    cssEase: 'linear',         
    slidesToScroll: 1,
    infinite: true,
    arrows: true,
    dots: false,
    pauseOnHover: false,
    pauseOnFocus: false,
      slidesToShow: 1,
       prevArrow: $(".projects-details-prev"),
    nextArrow: $(".projects-details-next"),

  });
});
// ===========================Height========================================
function setEqualHeightFor(selector) {
  const elements = document.querySelectorAll(selector);
  let maxHeight = 0;

  elements.forEach(el => el.style.height = "auto");

  elements.forEach(el => {
    if (el.offsetHeight > maxHeight) maxHeight = el.offsetHeight;
  });

  elements.forEach(el => el.style.height = maxHeight + "px");
}

window.addEventListener("load", () => {
  setTimeout(() => {
    setEqualHeightFor(".our-services-details");
    setEqualHeightFor(".other-product-details");
    setEqualHeightFor(".slider-nav .slick-slide");
    setEqualHeightFor(".companies-item");
  }, 300);
});

window.addEventListener("resize", () => {
  setEqualHeightFor(".our-services-details");
  setEqualHeightFor(".other-product-details");
  setEqualHeightFor(".slider-nav .slick-slide");
      setEqualHeightFor(".companies-item");

});



// ======================Limit Characters==========================
  function truncateProductDescriptions(maxChars) {
    const paragraphs = document.querySelectorAll('.product-details p');

    paragraphs.forEach(p => {
      const originalText = p.getAttribute('data-full-text') || p.textContent.trim();

      // Save the original full text only once
      if (!p.hasAttribute('data-full-text')) {
        p.setAttribute('data-full-text', originalText);
      }

      if (originalText.length > maxChars) {
        p.textContent = originalText.substring(0, maxChars).trim() + '...';
      } else {
        p.textContent = originalText;
      }
    });
  }

  function applyResponsiveTruncation() {
    const screenWidth = window.innerWidth;

    if (screenWidth <= 768) {
      // Mobile
      truncateProductDescriptions(50);
    } else {
      // Desktop
      truncateProductDescriptions(65);
    }
  }

  // Call on load and resize
  window.addEventListener('load', applyResponsiveTruncation);
  window.addEventListener('resize', applyResponsiveTruncation);

// ======================Sub Categories Mobile only slider==========================
  $(document).ready(function () {
    function initMobileSlider() {
      const $slider = $('.sub-category-mobile-slider');

      if (window.innerWidth <= 768) {
        if (!$slider.hasClass('slick-initialized')) {
          $slider.slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            infinite: true,
            autoplay: true,
            // rows:2,
          });
        }
      } else {
        if ($slider.hasClass('slick-initialized')) {
          $slider.slick('unslick');
        }
      }
    }

    // Initial check
    initMobileSlider();

    // Recheck on resize
    $(window).on('resize', function () {
      initMobileSlider();
    });
  });
// ======================Coustomer Rating Developers==========================
$(document).ready(function () {
  $(" .my-rating-readonly").starRating({
    starSize: 18,
    initialRating: 5,
    useFullStars: true,
    readOnly: true,
  });
});
// =====================placement  slider=====================
function initlogos() {
  if ($(window).width() <= 575) {
    if (!$(".logos ").hasClass("slick-initialized")) {
      $(".logos ").slick({
        slidesToScroll:1,
        slidesToShow:2,

        dots: false,
        rows:2,
         autoplay:true,
        responsive: [
          
          {
            breakpoint: 575,
            settings: {
              slidesToShow:2,
            },
          },
        ],
      });
    }
  } else {
    if ($(".logos").hasClass("slick-initialized")) {
      $(".logos ").slick("unslick");
    }
  }
}
initlogos();

$(window).resize(function () {
  initlogos();
});
// =====================placement  slider=====================
// function initplacement() {
//   if ($(window).width() <= 575) {
//     if (!$(".placement-logos").hasClass("slick-initialized")) {
//       $(".placement-logos").slick({
//         slidesToScroll: 1,
//         dots: false,
//         rows:2,
//          autoplay:true,
//         responsive: [
          
//           {
//             breakpoint: 575,
//             settings: {
//               slidesToShow: 2,
//             },
//           },
//         ],
//       });
//     }
//   } else {
//     if ($(".placement-logos").hasClass("slick-initialized")) {
//       $(".placement-logos").slick("unslick");
//     }
//   }
// }

// initplacement();

// $(window).resize(function () {
//   initplacement();
// });

// ======================Coustomer Rating End========================


// ======================Lazy Loading Script ===============================
document.addEventListener("DOMContentLoaded", function() {var lazyImages = document.querySelectorAll("img[data-src][loading='lazy']");var lazyImageObserver = new IntersectionObserver(function(entries, observer) {entries.forEach(function(entry) {if (entry.isIntersecting) {var lazyImage = entry.target;lazyImage.src = lazyImage.dataset.src;lazyImage.alt = lazyImage.dataset.alt;lazyImage.removeAttribute("data-src");lazyImage.removeAttribute("loading");lazyImageObserver.unobserve(lazyImage);}});});lazyImages.forEach(function(lazyImage) {lazyImageObserver.observe(lazyImage);});});
// ======================Lazy Loading End===============================

// =====================Home Service  slider=====================
// function initservice() {
//   if ($(window).width() <= 767) {
//     if (!$(".about .service").hasClass("slick-initialized")) {
//       $(".about .service").slick({
//         slidesToScroll: 1,
//         dots: true,
//         autoplay:true,
//         cssEase: "linear",
      
//       });
//     }
//   } else {
//     if ($(".about .service").hasClass("slick-initialized")) {
//       $(".about .service").slick("unslick");
//     }
//   }
// }

// initservice();

// $(window).resize(function () {
//   initservice();
// });

// ========================gallery Slider=======================
// $(document).ready(function () {
//   $(".gallery-Slider").slick({
//     slidesToScroll: 1,
//     slidesToShow:3,
//     arrows:true,
//     prevArrow: $(".gallery-prev"),
//     nextArrow: $(".gallery-next"),
//     dots: false,
//     autoplay:true,
//     rows:3,
//     responsive: [
      
//       {
//         breakpoint: 575,
//         settings: {
//           slidesToShow: 2,
//         },
//       },
//     ],
//   });

// });









// header-menu

document.querySelectorAll(".accordion-toggle").forEach(button => {
  button.addEventListener("click", function () {
    const item = this.parentElement;

    // Close all other items
    document.querySelectorAll(".accordion-item").forEach(i => {
      if (i !== item) {
        i.classList.remove("active");
      }
    });

    // Toggle current item
    item.classList.toggle("active");
  });
});
