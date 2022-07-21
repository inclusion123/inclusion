@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Testimonial </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Testimonial </li>
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
                        <a class="btn btn-primary" href="{{ route('admin.testimonial.index') }}"> Back </a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="AboutUsForm" action="{{ route('admin.testimonial.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="testimonialname">Name</label>
                                        <input type="name" name="name" class="form-control" id="testimonialname"
                                            placeholder="Enter ..." required value="{{ old('name') }}">
                                    </div>
                                    <div class="col-6">
                                        <label for="testimonialprofession">Profession</label>
                                        <input type="name" name="profession" class="form-control"
                                            id="testimonialprofession" placeholder="Enter ..." required
                                            value="{{ old('profession') }}">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label> Description</label>
                                    <textarea id="testimonialdescription" class="form-control" name="description" rows="3" placeholder="Enter ..."
                                        value="{{ old('description') }}"required></textarea>

                                </div>

                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="testimonialimage" class="form-label">Image</label>
                                        <input class="form-control" name="image" type="file" id="testimonialimage">
                                    </div>
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
        $('#testimonialdescription').summernote();
    </script>
    @endsection