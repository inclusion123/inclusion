@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Category </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Category </li>
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
                        <a class="btn btn-primary" href=""> Back </a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="catogoryServiceForm" action="{{ route('admin.theme.update_category',$category->id ) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            {{-- <div class="form-group">
                                <label for="serviceId">Service Id</label>
                                <input type="text" name="service_id" class="form-control" value=""
                                    readonly>
                            </div> --}}
                            {{-- {{dd($category)}} --}}
                            <div class="form-group">
                                <label for="serviceName">Name</label>
                                <input type="name" name="name" class="form-control" value="{{$category->name}}" id="servicename"
                                    placeholder="Enter ..." required value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="serviceName">Slug</label>
                                <input type="slug" name="slug" class="form-control" value="{{$category->slug}}" id="serviceslug"
                                    placeholder="Enter ..." required value="{{ old('slug') }}">
                            </div>

                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="status" role="switch" {{($category->status == 1)? 'checked': ''}} value= {{$category->status}}
                                    id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Status</label>
                            </div>


                            {{-- <div class="form-group">
                                <label>Description</label>
                                <textarea id="summernote" class="form-control" name="desc" rows="3" placeholder="Enter ..." required
                                    value="{{ old('desc') }}"></textarea>

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

            $('#servicename').on("change keyup paste click", function() {
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
                $('#serviceslug').val(Text);
            });

            $("#flexSwitchCheckDefault").on('change', function() {
                if ($(this).is(':checked')) {
                    $(this).attr('value', 1);
                } else {
                    $(this).attr('value', 0);
                }
            });
        </script>
    @endsection
