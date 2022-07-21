<script>
    $(document).ready(function() {
        $("#jobForm").validate({

            rules: {
                name: {
                    required: true,
                    maxlength: 50
                },

                email: {
                    required: true,
                },

                profile: {
                    required: true,
                },
                message: {
                    required: true,
                },
                cv: {
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
                profile: {
                    required: "Profile is required.",
                },
                message: {
                    required: "Message is required.",
                },
                cv: {
                    required: "CV is required.",
                },


            },
        });
    });
</script>
