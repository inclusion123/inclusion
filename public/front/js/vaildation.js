< script >
    $("#quoteform").validate({

        rules: {
            name: {
                required: true,
                maxlength: 50
            },

            email: {
                required: true,
            },

            service: {
                required: true,
            },
            message: {
                required: true,
            },



        },
        messages: {

            name: {
                required: "Name is required.",
            },
            email: {
                required: "Email is required.",
            },
            service: {
                required: "Subject is required.",
            },
            message: {
                required: "Message is required.",
            },


        },
    }); <
/script>