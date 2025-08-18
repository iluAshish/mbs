

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>

    <!-- tel with country code -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>
    <script src="assets/js/form-select2_new.js"></script>

    <script src="https://kit.fontawesome.com/99358fb784.js"></script>

    <script src="assets/js/jquery.star-rating-svg.js"></script>

    <!--Fancy Box-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <script src="assets/js/counter/jquery.waypoints.min.js"></script>
    <script src="assets/js/counter/jquery.countup.js"></script>

    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>

    <script async src="https://cpwebassets.codepen.io/assets/embed/ei.js"></script>

    <script>


        // tel with country code
        $(".theme-tel").intlTelInput({
            initialCountry: "ae",
            separateDialCode: true,
            // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
        });


        $(document).ready(function(){
            $(".filter-button").click(function(){
                var value = $(this).attr('data-filter');
                console.log('yes');
                if(value == "all")
                {
                    //$('.filter').removeClass('hidden');
                    $('.filter').show('1000');
                }
                else
                {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
                    $(".filter").not('.'+value).hide('3000');
                    $('.filter').filter('.'+value).show('3000');

                }
                if ($(".filter-button").removeClass("active")) {
                    $(this).removeClass("active");
                }
                $(this).addClass("active");
            });
        });


        $('.counter').countUp(
            {
                delay: 5,
                time: 1500
            }
        );

        $(document).ready(function() {
            $('[data-fancybox]').fancybox({
                buttons : [
                    "zoom",
                    // "share",
                    "slideShow",
                    "fullScreen",
                    // "download",
                    "thumbs",
                    "close"
                ],
                thumbs : {
                    autoStart   : true,
                },
                fullScreen : {
                    requestOnStart : true
                }
            });
        });


        $('document').ready(function(){

            var $file = $('#file-input'),
                $label = $file.next('label'),
                $labelText = $label.find('span'),
                $labelRemove = $('i.remove'),
                labelDefault = $labelText.text();

            // on file change
            $file.on('change', function(event){
                var fileName = $file.val().split( '\\' ).pop();
                if( fileName ){
                    console.log($file)
                    $labelText.text(fileName);
                    $labelRemove.show();
                }else{
                    $labelText.text(labelDefault);
                    $labelRemove.hide();
                }
            });
        })

    </script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
        })
    </script>

    </body>
</html>