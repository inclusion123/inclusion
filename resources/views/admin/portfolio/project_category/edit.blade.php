@extends('admin.layouts.admin_master')
@section('breadcumb')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Portfolio</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit ProjectCategory</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('content')
        <section class="content">
            <div class="container-fluid">
                @include('alerts.alerts')
                <div class="card card-primary">
                    <div class="pull-right" style="margin: 20px;">
                        <a class="btn btn-primary" href="{{ route('admin.projectcategory.index') }}"> Back </a>
                    </div>
                    <form action="{{ route('admin.projectcategory.update', $projectcategory->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="name" name="name" class="form-control" id="teamname" placeholder="Enter ..." required value="{{ $projectcategory->name }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endsection
