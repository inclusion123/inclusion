@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ isset($tag) ? 'Edit a Record' : 'Create a new Record' }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Tag </li>
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
                        <a class="btn btn-primary" href="{{route('admin.theme.theme_tag.index')}}"> Back </a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="tagServiceForm" action="{{ isset($tag) ? route('admin.theme.theme_tag.update',$tag->id ) : route('admin.theme.theme_tag.store') }}" method="post"
                        enctype="multipart/form-data">
                        @if(isset($tag)) @method('put') @else @method('post') @endif
                        @csrf
                        <div class="card-body">
                            {{-- <div class="form-group">
                                <label for="serviceId">Service Id</label>
                                <input type="text" name="service_id" class="form-control" value=""
                                    readonly>
                            </div> --}}
                            <div class="form-group">
                                <label for="tagName">Name</label>
                                <input type="name" name="name" class="form-control" id="tagName"
                                    placeholder="Enter ..." value="{{ old('name',isset($tag) ? $tag->name : '') }}">
                            </div>
                            <div class="form-group">
                                <label for="tagslug">Slug</label>
                                <input type="slug" name="slug" class="form-control" id="tagslug"
                                    placeholder="Enter ..." value="{{ old('slug',isset($tag) ? $tag->slug : '') }}">
                            </div>

                            {{-- <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="status" role="switch" value= 0
                                    id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                            </div> --}}

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

            $('#tagName').on("change keyup paste click", function() {
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
                $('#tagslug').val(Text);
            });

            $("#tagServiceForm").validate({
                    rules: {
                        name: 'required',
                        slug: 'required',
                    },
                    messages: {
                        name: 'This field is required',
                        slug: 'This field is required',
                    },
                    submitHandler: function(form) {
                        form.submit();
                    }
                });

            // $("#flexSwitchCheckDefault").on('change', function() {
            //     if ($(this).is(':checked')) {
            //         $(this).attr('value', 1);
            //     } else {
            //         $(this).attr('value', 0);
            //     }
            // });
        </script>
    @endsection
