@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Feature</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Feature</li>
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
                        <a class="btn btn-primary" href="{{ route('admin.feature.index') }}"> Back </a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="childServiceForm" action="{{ route('admin.feature.store') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <label for="featurename">Name</label>
                                    <input type="name" name="name" class="form-control" id="featurename"
                                        placeholder="Enter ..." required value="{{ old('name') }}">
                                </div>


                                <div class="col-6">
                                    <label for="featureIcon">Icon</label>
                                    <input type="name" name="icon" class="form-control" id="featureIcon"
                                        placeholder="Enter ..."  value="{{ old('icon') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="featuredescription" class="form-control" name="description" rows="3" placeholder="Enter ..." required
                                    value="{{ old('description') }}"></textarea>

                            </div>

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
    $('#featuredescription').summernote();
</script>
@endsection