jQuery(function ($) {
    jQuery(document).ready(function () {

        // Mobile menu
        $(".hamburger").click(function () {
            $(this).toggleClass("is-active");
            $(".menu-large").toggleClass("is-active");
        });

        // Slider
        $(".slider-slide").slick({
            infinite: true,
            dots: true,
            appendDots: $(".slider-dots"),
            speed: 300,
            prevArrow: $('.slick-next'),
            nextArrow: $('.slick-prev'),
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            arrows: true
        });

        // Toggles paragraphs display
        $(".show").click(function(){
            $(".show-p").toggle();
        });

        // Star rating
        $(document).ready(function() {
            // Gets the span width of the filled-ratings span
            // this will be the same for each rating
            var star_rating_width = $('.fill-ratings span').width();
            // Sets the container of the ratings to span width
            // thus the percentages in mobile will never be wrong
            $('.star-ratings').width(star_rating_width);
        });

        // Contact form - Footer
        $(".contact-send-footer").on("click", function(e) {
            e.preventDefault();
            var email_address = $(".sign-up-container input[name='email']").val();
            var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
            if(pattern.test(email_address) != true) {
                $(".notifications-footer").html("Please enter valid e-mail!");
            } else if( email_address == "" ) {
                $(".notifications-footer").html("Please fill out all fields!");
            } else {
                $(".notifications-footer").html("Message sent!");
                $(".sign-up-container input[name='email']").val("");
            }
        });

        // Contact form - Page Contact Us
        $(".contact-send").on("click", function(e) {
            e.preventDefault();
            var name = $(".contact-us-container input[name='name']").val();
            var email_address = $(".contact-us-container input[name='email']").val();
            var subject = $(".contact-us-container input[name='subject']").val();
            var message = $(".contact-us-container textarea[name='message']").val();
            var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
            if(pattern.test(email_address) != true) {
                $(".notifications").html("Please enter valid e-mail!");
            } else if(name == "" || email_address == "" || subject == "" || message == "") {
                $(".notifications").html("Please fill out all fields!");
            } else {
                $(".notifications").html("Message sent!");
                $(".contact-us-container input[name='name']").val("");
                $(".contact-us-container input[name='email']").val("");
                $(".contact-us-container input[name='subject']").val("");
                $(".contact-us-container textarea[name='message']").val("");
            }
        });
    });
})





