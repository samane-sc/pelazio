jQuery(document).ready(function ($) {
    $("#sync").owlCarousel({
            items: 4,
            dots: false,
            nav: true,
            smartSpeed: 200,
            slideSpeed: 500,
            responsiveRefreshRate: 100,
            navText: ['', ''],
            responsive: {
                0: {items: 3},
                500: {items: 4},
                600: {items: 5},
                768: {items: 5},
                1000: {items: 4},
            }
        });
    $('.carousel').carousel();
    $("#myCarousel .carousel-inner").lightGallery();
    $("#myCarousel .carousel-indicators .owl-item").click(function (e){
        e.preventDefault();
        $("#myCarousel .carousel-indicators .owl-item").removeClass("select");
        $("#myCarousel .carousel-indicators li").removeClass("select");
        $(this).addClass("select");
        $(this).find("li").addClass("select");
    });
    $("#myCarousel .carousel-indicators li").click(function (e){
        e.preventDefault();
        $("#myCarousel .carousel-indicators .owl-item").removeClass("select");
        $("#myCarousel .carousel-indicators li").removeClass("select");
        $(this).addClass("select");
        $(this).find("li").addClass("select");
        $("#myCarousel .carousel-inner .carousel-item").removeClass("active");
        $img = $("#myCarousel .carousel-indicators li.select img").attr('src');
        $("#myCarousel .carousel-inner .carousel-item img[src$='"+$img+"']").first().parent().addClass("active");
    });
    if ($(".variations_form").attr("data-product_variations")){
        var variations = JSON.parse($(".variations_form").attr("data-product_variations"));
        if (variations){
            $(".variation_id").on('change', function (e) {
                var image_to_show = '';
                if (variations) {
                    var current_id = $(".variation_id").attr('value');
                    var found = false;
                    for (var i = 0; i < variations.length; i++) {
                        if (found) continue;
                        if (variations.hasOwnProperty(i)) {
                            // if first attribute has the same value as has been selected
                            var id = variations[i]["variation_id"];
                            if (current_id == id) {
                                // change featured image
                                image_to_show = variations[i]["image"]["src"];
                                found = true;
                            }
                        }
                    }
                    if (image_to_show.length > 0) {
                        $("#myCarousel .carousel-inner .carousel-item").removeClass('active');
                        $("#myCarousel .carousel-indicators .owl-item").removeClass("select");
                        $("#myCarousel .carousel-indicators li").removeClass("select");
                        $("#myCarousel .carousel-inner .carousel-item img[src$='"+image_to_show+"']").first().parent().addClass("active");
                        // var el = "<div class='item active' data-width='600' data-src='"+image_to_show+"'><img width='600' height='600' class='img-responsive lazy center-block' src='"+image_to_show+"'></div>";
                        // $("#myCarousel .carousel-inner").append(el);

                        if($(window).width() < 768)
                            window.scrollTo({top:$("#myCarousel").offset().top-150});
                    }
                }
            });
        }
        //swatch
        $(".product-container__info-color-box .variable-items-wrapper li").click(function (){
            console.log($("#myCarousel .carousel-inner .carousel-item.active").children())
            // if ($("#myCarousel .carousel-inner .carousel-item.active").children()){
            //     $("#myCarousel .carousel-inner .carousel-item.active")[2].removeClass("active");
            // }
        })
    }
});