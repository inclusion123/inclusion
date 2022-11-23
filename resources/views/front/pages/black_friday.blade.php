<!-- Black Friday Modal -->
<div class="modal modal__black_friday fade" id="modal-black-friday" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <div class="discount__contant">
                    <div class="discount__leftArea">
                        <div class="modal__logo">
                            <img src="{{asset('/front/img/logo-white.png')}}">
                        </div>
                        <h2>Mon. 21st - Wed. 30th Nov.</h2>
                        <h5>
                            30% OFF On Website Development Services. <br><br> Offer Valid Till 30th November
                        </h5>
                        <!-- <p class="discountModal__text">
                    You can check <a href="#!" target="_blank">privacy policy</a> By entering your email
                    </p> -->
                    </div>

                    <div class="discountModal__submit">
                        <h2>
                            Black Friday
                        </h2>
                        <h1>
                            Get <b>30%</b> Off <span>On Websites Development</span>
                        </h1>
                        <p>Enter your email below</p>
                        <form id="black---friday-enquery" action="{{route('front.black.friday.store')}}" method="post">
                            @csrf
                            <input type="email" name="email" class="input1" id="" placeholder="Type your email here">
                            <button class="submit" type="submit" id="">SUBMIT</button>
                        </form>
                        <button class="no__thanks" data-bs-dismiss="modal" type="button" id="">NO THANKS</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
   $(document).ready(function() {
        $("#black---friday-enquery").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
            },
            messages: {
                email: {
                    required: "Email is required.",
                }

            },
        });
    });
</script>
