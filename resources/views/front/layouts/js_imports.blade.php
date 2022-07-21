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
