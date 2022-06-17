@extends('admin.layouts.admin_master')

@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Service </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Service </li>
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

                    <div class="pull-right" style="margin: 20px">
                        <a class="btn btn-primary" href="{{ route('admin.service') }}"> Back </a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.service.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="serviceName">Name</label>
                                <input type="name" name="name" class="form-control" id="servicename"
                                    placeholder="Enter ..." value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="serviceName">Page Name</label>
                                <input type="name" name="page_name" class="form-control" id="service_page_name"
                                    placeholder="Enter ..." value="{{ old('page_name') }}"required>
                            </div>
                            <div class="form-group">
                                <label for="serviceName">Title</label>
                                <input type="text" name="title" class="form-control" id="servicetitle"
                                    placeholder="Enter ..." value="{{ old('title') }}"required>
                            </div>
                            <div class="form-group">
                                <label for="serviceIcon">Icon</label>
                                <input type="text" name="icon" class="form-control" id="serviceicon"
                                    placeholder="Enter ..." value="{{ old('icon') }}"required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="summernote" class="form-control" name="desc" rows="3" placeholder="Enter ..." value="{{ old('desc') }}"required></textarea>

                            </div>

                            <div class="form-group">
                                <label for="serviceName">Detail Name</label>
                                <input type="text" name="detailname" class="form-control" id="servicedetailname"
                                    placeholder="Enter ..." value="{{ old('detailname') }}"required>
                            </div>
                            <div class="form-group">
                                <label>Detail Description</label>
                                <textarea id="summernote2" class="form-control" name="detail_description" rows="3" placeholder="Enter ..." value="{{ old('detail_description') }}"required></textarea>
                               
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option selected value="{{ \App\Models\Service::ACTIVE }}">Active</option>
                                    <option value="{{ \App\Models\Service::INACTIVE }}">InActive</option>

                                </select>

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
            $("#summernote2").summernote();
        </script>
    @endsection
