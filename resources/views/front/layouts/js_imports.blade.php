    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('front/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('front/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('front/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('front/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('front/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('front/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>


    <script>
        // image gallery

        $("#slideshow > img:gt(0)").hide();

        setInterval(function() {
            $("#slideshow > img:first").fadeOut(3000).next().fadeIn(3000).end().appendTo("#slideshow");
        }, 5000);

        whr(document).ready(function() {
            whr_embed(164082, {
                detail: "titles",
                base: "jobs",
                zoom: "country",
                grouping: "none",
                url: "url"
            });
        });

        $(document).ready(function() {
            //console.log( "ready!" );

            var timerId = setInterval(function() {
                $("h3.whr-title").each(function() {
                    var href = $(this).children().first().attr("href");

                    var new_content = $(this).parent().html() +
                        "<div class='apply-now-btn'><a href='" + href +
                        "' target='_blank'>Apply Now</a></div>";

                    $(this).parent().html(new_content);

                    clearInterval(timerId);
                });
            }, 1000);
        });
    </script>

    <!-- Mixitup -->
    <script src="{{ asset('/front/js/mixitup.min.js') }}"></script>
    <!-- fancybox -->
    <script src="{{ asset('/front/js/jquery.fancybox.min.js') }}"></script>
    <!-- Fancybox js -->
    <script>
        /*Downloaded from https://www.codeseek.co/ezra_siton/mixitup-fancybox3-JydYqm */
        // 1. querySelector
        var containerEl = document.querySelector(".portfolio-item");
        // 2. Passing the configuration object inline
        //https://www.kunkalabs.com/mixitup/docs/configuration-object/
        var mixer = mixitup(containerEl, {
            animation: {
                effects: "fade translateZ(-100px)",
                effectsIn: "fade translateY(-100%)",
                easing: "cubic-bezier(0.645, 0.045, 0.355, 1)"
            }
        });
        // fancybox insilaze & options //
        $("[data-fancybox]").fancybox({
            loop: true,
            hash: true,
            transitionEffect: "slide",
            /* zoom VS next////////////////////
            clickContent - i modify the deafult - now when you click on the image you go to the next image - i more like this approach than zoom on desktop (This idea was in the classic/first lightbox) */
            clickContent: function(current, event) {
                return current.type === "image" ? "next" : false;
            }
        });
    </script>
