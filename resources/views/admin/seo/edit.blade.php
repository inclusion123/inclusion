@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Seo </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Seo </li>
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
                    <a class="btn btn-primary" href="{{ route('admin.seo.index') }}"> Back </a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="AboutUsForm" action="{{ route('admin.seo.update',$seo->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="route_name">Name</label>
                            <input type="name" name="route_name" class="form-control" id="route_name"
                                placeholder="Enter ..." required value="{{ $seo->route_name }}" readonly>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label for="seo-meta-title">Meta-Title</label>
                                <input type="name" name="meta_title" class="form-control" placeholder="Enter ..."
                                    value="{{ $seo->meta_title }}" required>
                            </div>
                            <div class="col-6">
                                <label for="seo-meta-keywords">Meta-Keywords</label>
                                <input type="name" id="metaKeywords" data-role="tagsinput" name="meta_keywords"
                                    class="form-control" placeholder="Enter ..."
                                    value="{{  $seo->meta_keywords }}"required>
                            </div>

                        </div><br>
                        <div class="form-group">
                            <label for="seo-meta-description">Meta-Description</label>
                            <input type="name" name="meta_description" class="form-control" placeholder="Enter ..."
                                value="{{  $seo->meta_description }}"required>
                        </div>
                        <br>


                       

                       
                        

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