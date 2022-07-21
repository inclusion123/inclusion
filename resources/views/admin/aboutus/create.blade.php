@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create About-Us </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create About-Us </li>
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
                        <a class="btn btn-primary" href="{{ route('admin.aboutus.index') }}"> Back </a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="AboutUsForm" action="{{ route('admin.aboutus.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                           
                            <div class="form-group">
                                <label for="aboutusname">Name</label>
                                <input type="name" name="name" class="form-control" id="aboutusname"
                                    placeholder="Enter ..." required value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="aboutustitle">Title</label>
                                <input type="name" name="title" class="form-control" id="aboutustitle"
                                    placeholder="Enter ..." required value="{{ old('title') }}">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="aboutusdesc" class="form-control" name="description" rows="3" placeholder="Enter ..." required
                                    value="{{ old('description') }}"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="aboutusimage">Image</label>
                                <input class="form-control" name="image" type="file" id="aboutusimage">
                               
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
            $("#aboutusdesc").summernote();
        </script>
    @endsection
