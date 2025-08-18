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
