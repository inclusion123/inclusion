@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit banner Member</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit banner Member</li>
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
                    <a class="btn btn-primary" href="{{ route('admin.banner.index') }}"> Back </a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="AboutUsForm" action="{{ route('admin.banner.update',$banner->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="bannername">Name</label>
                            <input type="name" name="name" class="form-control" id="bannername"
                                placeholder="Enter ..." required value="{{ $banner->name }}">
                        </div>
                        <div class="form-group">
                            <label for="bannertitle">Title</label>
                            <input type="name" name="title" class="form-control" id="bannertitle"
                                placeholder="Enter ..." required value="{{ $banner->title }}">
                        </div>


                        <div class="form-group">
                            {{-- <strong>banner Member Image</strong> --}}
                            @if ($banner->image)
                                <img id="original" class=" img-responsive img-round"
                                    src="{{ asset('/images') }}/{{ $banner->image }}"  width="960" 
                                    height="540">
                            @endif

                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="bannerimage" class="form-label">Image</label>
                                <input class="form-control" name="image" type="file" id="bannerimage" value="{{$banner->image}}">
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