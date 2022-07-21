@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Testimonial</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Testimonial</li>
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
                    <form id="AboutUsForm" action="{{ route('admin.testimonial.update', $testimonial->id) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            
                                                        <div class="form-group">
                                                            {{-- <strong>Team Member Image</strong> --}}
                                                            @if ($testimonial->image)
                                                                <img id="original" class="profile-user-img img-responsive img-circle"
                                                                    src="{{ asset('/storage/images') }}/{{ $testimonial->image }}">
                                                            @endif
                            
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="mb-3">
                                                                <label for="teamimage" class="form-label">Image</label>
                                                                <input class="form-control" name="image" type="file" id="teamimage"
                                                                    value="{{ $testimonial->image }}">
                                                            </div>
                                                        </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="testimonialname">Name</label>
                                    <input type="name" name="name" class="form-control" id="testimonialname"
                                        placeholder="Enter ..." required value="{{ $testimonial->name }}">
                                </div>
                                <div class="col-6">
                                    <label for="testimonialprofession">Profession</label>
                                    <input type="name" name="profession" class="form-control" id="testimonialprofession"
                                        placeholder="Enter ..." required value="{{ $testimonial->profession }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label> Description</label>
                                <textarea id="testimonialdescription" class="form-control" name="description" rows="3" placeholder="Enter ..."
                                    required>{{ $testimonial->description }}</textarea>

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
