@extends('admin.layouts.admin_master')

@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Service </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Service </li>
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

                    <div class="pull-right" id="back" style="margin: 20px">
                        <a class="btn btn-primary" href="{{ route('admin.service.index') }}"> Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.service.update', $service->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="serviceName">Name</label>
                                <input type="name" name="name" class="form-control" id="servicenameedit"
                                    value="{{ $service->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="serviceName"> page Name</label>
                                <input type="name" name="page_name" class="form-control" id="servicepagenameedit"
                                    value="{{ $service->page_name }}" required>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="service-meta-title">Meta-Title</label>
                                    <input type="name" name="meta_title" class="form-control" 
                                    value="{{ $service->meta_title }}" >
                                </div>
                                <div class="col-6">
                                    <label for="service-meta-keywords">Meta-Keywords</label>
                                    <input type="name" id="metaKeywords" data-role="tagsinput" name="meta_keywords"
                                        class="form-control" 
                                        value="{{  $service->meta_keywords }}">
                                </div>

                            </div><br>
                            <div class="form-group">
                                <label for="service-meta-description">Meta-Description</label>
                                <input type="name" name="meta_description" class="form-control" 
                                    value="{{  $service->meta_description }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="serviceName">Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter ..."
                                    value="{{ $service->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="serviceName">Icon</label>
                                <input type="text" name="icon" class="form-control" placeholder="Enter ..."
                                    value="{{ $service->icon }}" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="editServiceDesc" class="form-control" name="desc" rows="3" placeholder="Enter ..." required>{{ $service->description }}</textarea>

                            </div>
                            <div class="form-group">
                                <label for="serviceName">Detail Name</label>
                                <input type="text" name="detailname" class="form-control"
                                    value="{{ $service->detail_name }}" placeholder="Enter ..." required>
                            </div>
                            <div class="form-group">
                                <label for="serviceName">Detail Description</label>
                                <textarea id="editServiceDesc2" class="form-control" name="detaildescription" rows="3" placeholder="Enter ..." required>{{ $service->detail_description }}</textarea>
                                {{-- <textarea id="editServiceDesc2"  name="detaildescription" class="form-control"
                                    value="{{ $service->detail_description }}" placeholder="Enter ..." required></textarea> --}}
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option {{ $service->status == 1 ? 'selected' : '' }}
                                        value="{{ \App\Models\Service::ACTIVE }}">Active</option>
                                    <option {{ $service->status == 0 ? 'selected' : '' }}
                                        value="{{ \App\Models\Service::INACTIVE }}">InActive</option>

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
            $("#editServiceDesc").summernote();
            $("#editServiceDesc2").summernote();
        </script>
    @endsection
