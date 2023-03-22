@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Theme </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add Theme </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    @endsection
    @section('content')
        <section class="content">
            <div class="container-fluid">
                @include('alerts.alerts')
                <div class="card card-primary">

                    <div class="pull-right" style="margin: 20px;">
                        <a class="btn btn-primary" href="{{route('admin.theme.items.index')}}"> Back </a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="itemCreateForm" action="{{ isset($theme) ? route('admin.theme.items.update', $theme->id) : route('admin.theme.items.store') }}" method="post"
                        enctype="multipart/form-data">
                        @if(isset($theme)) @method('put') @else @method('post') @endif
                        @csrf
                        <div class="card-body">
                            {{-- <div class="form-group">
                                <label for="serviceId">Service Id</label>
                                <input type="text" name="service_id" class="form-control" value=""
                                    readonly>
                            </div> --}}
                            <div class="form-group">
                                <label for="serviceName">Name</label>
                                <input type="name" name="name" class="form-control" id="themename"
                                    placeholder="Enter ..." value="{{ old('name',isset($theme) ? $theme->name : '') }}">
                            </div>
                            <div class="form-group">
                                <label for="serviceName">Slug</label>
                                <input type="slug" name="slug" class="form-control" id="themeslug"
                                    placeholder="Enter ..." value="{{ old('slug', isset($theme) ? $theme->slug : '') }}">
                            </div>
                            <div class="form-group">
                                <label for="serviceName">Title</label>
                                <input type="text" name="title" class="form-control" id="themetitle"
                                    placeholder="Enter ..." value="{{ old('title', isset($theme) ? $theme->title : '') }}">
                            </div>
                            <div class="form-group">
                                <label for="serviceName">Title Description</label>
                                <input type="text" name="title_description" class="form-control" id="themedescription"
                                    placeholder="Enter ..." value="{{ old('title_description', isset($theme) ? $theme->title_description : '') }}">
                            </div>
                            <div class="form-group">
                                <label for="serviceName">Download Link</label>
                                <input type="text" name="download_link" class="form-control" id="themedescription"
                                    placeholder="Enter ..." value="{{ old('title_description', isset($theme) ? $theme->download_link : '') }}">
                            </div>

                            <label for="formFile" class="form-label">Featured Image</label>
                            <div class="card card-primary">
                                <div class="mb-2">
                                    <p><img id="output" width="200" /></p>
                                    <input class="form-control" name="featured_image" accept="image/*" type="file" id="formFile" onchange="loadFile(event)">
                                </div>
                            </div>

                            <label for="formFile" class="form-label">Gallery</label>
                            <div class="card card-primary">
                                <div class="mb-2">
                                    <div id="myImg">

                                    </div>
                                    {{-- <p><output id='result' /></p>
                                    <p><img id="gallery_output" width="200" /></p> --}}
                                    <input class="form-control" name="gallery[]" accept="image/*" type="file" id="gallery" multiple >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col container mt-5">
                                    <label for="selectedCategories">Select Category</label>
                                    <select class="selectpicker" multiple aria-label="Default select example"  name="selectedCategories[]" data-live-search="true">
                                        @foreach($categories as $category)
                                        @if(isset($theme))
                                      <option value="{{$category->id}}" {{ in_array($category->id, $theme_has_category) ? 'selected' : '' }}>{{$category->name}}</option>
                                        @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endif
                                      @endforeach
                                    </select>
                                </div>
                                <div class="col container mt-5">
                                    <label for="selectedTags">Select Technologies</label>
                                    <select class="selectpicker" multiple aria-label="Default select example" name="selectedTags[]" data-live-search="true">
                                        @foreach($tags as $tag)
                                        @if(isset($theme))
                                      <option value="{{$tag->id}}" {{ in_array($tag->id, $theme_has_tag) ? 'selected' : '' }}>{{$tag->name}}</option>
                                        @else
                                      <option value="{{$tag->id}}">{{$tag->name}}</option>
                                      @endif
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="input_fields_wrap">
                                <label for="serviceName">Highlight Details</label>
                                <div class="input-group mb-3">
                                <input type="text" class="form-control mb-3" name="highlight_details[]" placeholder="Enter Price" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success add_field_button ">Add</button>
                                  </div>
                                </div>
                                @if(isset($theme))
                                @foreach (explode(',', $theme->highlight_details) as $highlight_detail)
                                <div class="input-group mb-3"><input placeholder="Enter Price" value="{{$highlight_detail}}" type="text" name="mytext[]" class="form-control"><div class="input-group-append"><button class="btn btn-outline-danger remove_field" type="button">Remove</button></div></div>
                                @endforeach
                                @endif
                            </div>
                            <div class="input_fields_included">
                                <label for="serviceName">Included</label>
                                <div class="input-group mb-3">
                                <input type="text" class="form-control mb-3" name="included[]" placeholder="Enter Price" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="add_field_included">Add</button>
                                  </div>
                                </div>
                                @if(isset($theme))
                                @foreach (explode(',', $theme->included) as $included)
                                <div class="input-group mb-3"><input placeholder="Enter Price" value="{{$included}}" type="text" name="included[]" class="form-control"><div class="input-group-append"><button class="btn btn-outline-danger remove_included" type="button">Remove</button></div></div>
                                @endforeach
                                @endif
                            </div>
                            <div class="input_fields_features">
                                <label for="serviceName">Features</label>
                                <div class="input-group mb-3">
                                <input type="text" class="form-control mb-3" name="features[]" placeholder="Enter Price" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="add_field_features">Add</button>
                                  </div>
                                </div>
                                @if(isset($theme))
                                @foreach (explode(',', $theme->features) as $features)
                                <div class="input-group mb-3"><input placeholder="Enter Price" value="{{$features}}" type="text" name="features[]" class="form-control"><div class="input-group-append"><button class="btn btn-outline-danger remove_features" type="button">Remove</button></div></div>
                                @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                @if(isset($theme))
                                <textarea id="summernote" class="form-control" name="description" rows="3" placeholder="Enter ..."
                                    value="{{ old('description') }}">{{$theme->discription}}</textarea>
                                @else
                                <textarea id="summernote" class="form-control" name="description" rows="3" placeholder="Enter ..."
                                value="{{ old('description') }}"></textarea>
                                @endif
                            </div>
                            <div class="form-check form-switch">
                                @if(isset($theme))
                                <input class="form-check-input" type="checkbox" {{($theme->status == 1)? 'checked' : ''}}  name="status" role="switch" value= {{$theme->status}}
                                    id="flexSwitchCheckDefault">
                                @else
                                <input class="form-check-input" type="checkbox" checked="checked" name="status" role="switch" value= 1
                                    id="flexSwitchCheckDefault">
                                @endif
                                <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endsection
    @section('script')
        <script>
            $("#summernote").summernote();
            //slug
            $('#themename').on("change keyup paste click", function() {
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
                $('#themeslug').val(Text);
            });

            //status
            $("#flexSwitchCheckDefault").on('change', function() {
                if ($(this).is(':checked')) {
                    $(this).attr('value', 1);
                } else {
                    $(this).attr('value', 0);
                }
            });

            //add input field
            var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
            var add_button      = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            $(wrapper).append('<div class="input-group mb-3"><input placeholder="Enter Price" type="text" name="mytext[]" class="form-control"><div class="input-group-append"><button class="btn btn-outline-danger remove_field" type="button">Remove</button></div></div>'); //add input box
            });

            $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
                })

            //add included field
            var included   		= $(".input_fields_included"); //Fields wrapper
            var add_included      = $(".add_field_included"); //Add button ID

            var x = 1; //initlal text box count
            $(add_included).click(function(e){ //on add input button click
            e.preventDefault();
            $(included).append('<div class="input-group mb-3"><input placeholder="Enter Price" type="text" name="included[]" class="form-control"><div class="input-group-append"><button class="btn btn-outline-danger remove_included" type="button">Remove</button></div></div>'); //add input box
            });

            $(included).on("click",".remove_included", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
                })

            //add included field
            var features   		= $(".input_fields_features"); //Fields wrapper
            var add_features     = $(".add_field_features"); //Add button ID

            var x = 1; //initlal text box count
            $(add_features).click(function(e){ //on add input button click
            e.preventDefault();
            $(features).append('<div class="input-group mb-3"><input placeholder="Enter Price" type="text" name="features[]" class="form-control"><div class="input-group-append"><button class="btn btn-outline-danger remove_features" type="button">Remove</button></div></div>'); //add input box
            });

            $(features).on("click",".remove_features", function(e){ //user click on remove text
                e.preventDefault(); $(this).parent('div').parent('div').remove(); x--;
                })
        </script>
        <script>
            $(function() {
                $("#gallery").change(function() {
                    $('#myImg').html("");
                    if (this.files && this.files[0]) {
                    for (var i = 0; i < this.files.length; i++) {
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[i]);
                    }
                    }
                });
                });

                function imageIsLoaded(e) {
                $('#myImg').append('<img src=' + e.target.result + ' id="gallery_img" width="200">');
                };

                $('body').on('click','#gallery_img',function(){
                    var newFileList = Array.from(event.target.files);
                $(this).remove();
            });

            //featured Image
            var loadFile = function(event) {
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        <script>
            //Validation
            $(document).ready(function() {
                // var case = {!! $case !!};
                if ("{{ $case }}" == 'POST') {

                $("#itemCreateForm").validate({
                    rules: {
                        name: 'required',
                        slug: 'required',
                        title: {
                            required: true,
                        },
                        title_description: {
                            required: true,
                        },
                        download_link: {
                            required: true,
                        },
                        featured_image: {
                            required: true,
                        },
                        selectedCategories: {
                            required: true,
                        },
                        highlight_details: {
                            required: true,
                        },
                    },
                    messages: {
                        name: 'This field is required',
                        slug: 'This field is required',
                        title: 'This field is required',
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            } else {
                $("#itemCreateForm").validate({
                    rules: {
                        name: 'sometimes',
                        slug: 'sometimes',
                        title: {
                            sometimes: true,
                        },
                        title_description: {
                            sometimes: true,
                        },
                        download_link: {
                            sometimes: true,
                        },
                        selectedCategories: {
                            sometimes: true,
                        },
                        highlight_details: {
                            sometimes: true,
                        },
                    },
                    messages: {
                        name: 'This field is required',
                        slug: 'This field is required',
                        title: 'This field is required',
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });
            }
            });
        </script>
    @endsection
