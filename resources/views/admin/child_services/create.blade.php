@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Child Service </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Child Service </li>
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
                        <a class="btn btn-primary" href="{{ route('admin.childservices.indexpage', $id) }}"> Back </a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="childServiceForm" action="{{ route('admin.childservices.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="serviceId">Service Id</label>
                                <input type="text" name="service_id" class="form-control" value="{{ $id }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="serviceName">Name</label>
                                <input type="name" name="name" class="form-control" id="servicename"
                                    placeholder="Enter ..." required value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="summernote" class="form-control" name="desc" rows="3" placeholder="Enter ..." required
                                    value="{{ old('desc') }}"></textarea>


                                <div class="form-group">
                                    <label for="childServiceImage">Image</label>

                                    <input type="file" name="image" class="form-control" id="childServiceImage"
                                        required>
                                       
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
            $("#summernote").summernote();
        </script>
    @endsection
