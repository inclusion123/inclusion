@extends('front.layouts.master')

@section('css')
@endsection

@section('carousel')
    <div class="container-fluid bg-primary py-4 mb-0 bg-header" style="">
        <div class="row py-4">
            <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h1 class="display-4 text-white animated zoomIn">Themes</h1>
                <a href="{{ route('front.index') }}" class="h5 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="#!" class="h5 text-white">Themes</a>
            </div>
        </div>
    </div>
    </div>
    <!-- Navbar End -->
@endsection


@section('content')


    <div class="container-fluid py-4 wow fadeInUp thems__wrap" data-wow-delay="0.1s"
        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
        <div class="container py-4">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 800px;">
                <h5 class="fw-bold text-primary text-uppercase">Free Bootstrap Templates</h5>
                <h1 class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h1>
            </div>
            <div class="row g-5">
                <div class="col-lg-12 wow slideInUp" data-wow-delay="0.3s"
                    style="visibility: visible; animation-delay: 0.3s; animation-name: slideInUp;">
                    <section class="thems__header">
                        <div class="thems_Hfilter">
                            <div class="hfilter__left">
                                <p>Category</p>
                                <select class="select" name="dropdown_category" id="dropdown-category" >
                                    <option value="" selected>All Category</option>
                                    @if (isset($categories))
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                    {{-- <option>landing Page</option>
                                    <option>Forms</option>
                                    <option>All</option>
                                    <option>All</option> --}}
                                </select>
                            </div>
                            <div class="hfilter__right">
                                <div class="techonology">
                                    <p>Technologies</p>
                                    <div class="techonology__check">
                                        @if (isset($tags))
                                            @foreach ($tags as $tag)
                                                <label class="container-check" >{{ $tag->name }}
                                                    <input type="checkbox" name="mytags[]" onclick="return tagFilter()" id="mytags" value="{{$tag->id}}" >
                                                    <span class="checkmark"></span>
                                                </label>
                                            @endforeach
                                        @endif
                                        {{-- <label class="container-check">Angular
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container-check">Vue
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label> --}}
                                    </div>
                                </div>
                                <div class="techonology ml-2">
                                    <p>Price</p>
                                    <div class="techonology__check">
                                        <label class="container-check">Pro
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="container-check">Free
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <hr class="mt-3 mb-5">
            <div class="row g-5" id="item-lists">
                @include('front.pages.themes.data')

            </div>
        </div>
    </div>



@endsection

@section('script')
    <script>


        $(document).ready(function() {
            $(document).on('click', '.pagination a', function(event) {
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                event.preventDefault();

                var myurl = $(this).attr('href');
                var page = $(this).attr('href').split('page=')[1];
                console.log(myurl);
                var cat_id = $('#dropdown-category').val();

                getData(page, cat_id);
            });
        });


        function getData(page, cat_id) {
            $.ajax({
                    url: '?page=' + page,
                    type: "get",
                    datatype: "html",
                    data:{
                        'cat_id' : cat_id,
                    }
                })
                .done(function(data) {
                    $("#item-lists").empty().html(data);
                    location.hash = page;
                    $("html, body").animate({ scrollTop: 350 }, "slow");
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    alert('No response from server');
                });
        }
    </script>
    <script>
        $(document)
            function tagFilter(){
                var tag_id = new Array();
                $("#mytags:checked").each(function() {
                    tag_id.push($(this).val());
                });
                console.log(tag_id);
                var cat_id = $('#dropdown-category').val();
                getDataCategory_tec(1,cat_id,tag_id);
            }


            $('#dropdown-category').on('change', function(){
                var cat_id = $(this).val();
                var tag_id = new Array();
                $("#mytags:checked").each(function() {
                tag_id.push($(this).val());
                });
                getDataCategory_tec(1,cat_id,tag_id);
            });

            function getDataCategory_tec(page,cat_id=null,tag_id=null) {
                $.ajax({
                        url: '?page=' + page,
                        type: "get",
                        datatype: "html",
                        data:{
                            'cat_id' : cat_id,
                            'tag_id' : tag_id
                        }
                    })
                    .done(function(data) {
                        $("#item-lists").empty().html(data);

                    })
                    .fail(function(jqXHR, ajaxOptions, thrownError) {
                        alert('No response from server');
                    });
            }
    </script>
@endsection
