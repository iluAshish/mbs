$(document).on('click', '.submit-form-btn', function (e) {
    e.preventDefault();

    var btn_value = $(this).html();
    var form_flag = $(this).data('flag');
    var email_id = $('#' + form_flag + '_email').val();
    var phone_id = $('#' + form_flag + '_phone').val();
    var name = $('#' + form_flag + '_name').val();
    var message = $('#' + form_flag + '_message').val();

    var required = [];
    var url = $(this).data('url');

    // ✅ Required fields check
    $('.' + form_flag + '-required').each(function () {
        var id = $(this).attr('id');
        if ($('#' + id).val().trim() === '') {
            required.push(id);
            $('#' + id).css({ 'border': '1px solid #FF0000' });
            $('#' + id + 'Error').show();
        } else {
            $('#' + id).css({ 'border': '2px solid #707070' });
            $('#' + id + 'Error').hide();
        }
    });

    if (required.length === 0) {
        // ✅ Email validation
        var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

        if (!emailRegex.test(email_id)) {
            Swal.fire({
                title: 'Error',
                text: 'Please enter a valid email address',
                icon: 'error'
            });
            $('#' + form_flag + '_email').css({ 'border': '1px solid #FF0000' });
            return false;
        }

        // ✅ Phone validation (basic)
        var phoneRegex = /^(\+?\d{1,4}[\s-]?)?\d{9,15}$/;
        if (!phoneRegex.test(phone_id)) {
            Swal.fire({
                title: 'Error',
                text: 'Please enter a valid phone number',
                icon: 'error'
            });
            $('#' + form_flag + '_phone').css({ 'border': '1px solid #FF0000' });
            return;
        }

        // ✅ Prepare for submit
        $(this).html('Please wait..');
        $('.with-errors').html('');

        var form = document.getElementById(form_flag + 'Form');
        var formData = new FormData(form);

        $.ajax({
            type: 'POST',
            url: base_url + '/' + url,
            data: formData,
            contentType: false,
            processData: false,
            cache: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $('.submit-form-btn').html(btn_value);
                if (response.status === "success") {
                    Swal.fire({
                        title: "Success",
                        text: response.message,
                        icon: "success"
                    }).then(() => {
                      $('#' + form_flag + 'Form')[0].reset(); // ✅ form reset
                    window.location.href = response.redirect;
                    });
                } else if (response.status === "error") {
                    Swal.fire({
                        title: "Error",
                        text: response.message,
                        icon: "error"
                    });
                } else {
                    Swal.fire({
                        title: response.status,
                        text: response.message,
                        icon: response.status
                    });
                }
            }
        });
    }
});


$(document).ready(function () {

    // $(".my-rating-readonly").starRating({
    //     totalStars: 5,
    //     starShape: 'rounded',
    //     starSize: 15,
    //     emptyColor: 'lightgray',
    //     hoverColor: '#F3DB01',
    //     activeColor: '#F3DB01',
    //     useGradient: false,
    //     readOnly: true,
    // });

    // $(".my-rating").starRating({
    //     totalStars: 5,
    //     starSize: 20,
    //     emptyColor: 'lightgray',
    //     hoverColor: '#F3DB01',
    //     activeColor: 'lightgray',
    //     useGradient: false,
    //     disableAfterRate: false,
    //     ratedColor: '#F3DB01',
    //     emptyColor: 'lightgray',
    //     useFullStars: true,
    //     callback: function (currentRating, $el) {
    //         $('#rating').val(currentRating);
    //         console.log('DOM element ', $el);
    //     }
    // });

    $(window).scroll(function() {
        // $(".load-more-blog-button").each(function() {
        //     var o = $(window).scrollTop()
        //       , t = o + $(window).height()
        //       , e = $(".load-more-blog-button").offset().top;
        //     e + $(".load-more-blog-button").height() <= t && e >= o && blogLoadMore()
        // }),
        $(".blog-load").each(function () {
            var WindowTop = $(window).scrollTop();
            var WindowBottom = WindowTop + $(window).height();
            var ElementTop = $(this).offset().top;
            var ElementBottom = ElementTop + $(this).height();
            if ((ElementBottom <= WindowBottom) && ElementTop >= WindowTop){
                BlogsLoadMoreData();
            }
        });
        // $(".load-more-project-button").each(function() {
        //     var o = $(window).scrollTop()
        //       , t = o + $(window).height()
        //       , e = $(".load-more-project-button").offset().top;
        //     e + $(".load-more-project-button").height() <= t && e >= o && projectLoadMore()
        // }),
        $(".load-product-button").each(function() {
            var o = $(window).scrollTop()
              , t = o + $(window).height()
              , e = $(".load-product-button").offset().top;
            e + $(".load-product-button").height() <= t && e >= o && productLoadMore()
        })
    });
    function BlogsLoadMoreData() {
        var totalBlog = $('#totalBlog').val();
        var offset = $('#blog_loading_offset').val();
        var loading_limit = $('#blog_loading_limit').val();
        var blog_type = $('#blog_type').val();
    
        var btnHtml = $('.blog-load').html();
        // console.log(totalBlog,offset);
    
        if(totalBlog !== offset){
            $('.blog-load').html('Load More');
            $.ajax({
                type: 'POST',
                data: { offset: offset,loading_limit:loading_limit,blog_type:blog_type},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: base_url+'/blog-load-more',
                success: function (response) {
                    //console.log(response);
                    if (response !== 0) {
                            $('.appendHere_' + offset).after(response).remove();
                            $('.more-section-' + offset).remove();
                            $('.blog-load').html(btnHtml);
    
                        if (offset !== totalBlog) {
                            $('.blog-load').html('');
                        }
    
                    } else {
                        swal.fire({
                            title: 'Error', text: 'Some error occurred', icon: 'error'
                        });
                    }
                }
            });
        }
    }

    function productLoadMore() {
        var total = $("#product_total").val(),
            offset = $("#product_offset").val(),
            limit = $("#product_limit").val(),
            originalButtonHtml = $(".product_load-more-product-button").html(),
            type = $('.load-product-button').data("type"),
            type_id = $('.load-product-button').data("type-id");
    
        $(".product_load-more-product-button").html("Please wait...");
    
        $.ajax({
            type: "POST",
            data: {
                total: total,
                offset: offset,
                limit: limit,
                type_id: type_id,
                type: type
            },
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
            },
            url: base_url + "/products-load-more",
            success: function(o) {
                console.log(o);
                0 != o ? ($(".appendHere_" + offset).after(o).remove(),
                $(".more-section-" + offset).remove(),
                $(".product_load-more-product-button").html(originalButtonHtml)) : swal.fire({
                    title: "Error",
                    text: "Some error occurred",
                    icon: "error"
                })
            }
        });
    }

});
