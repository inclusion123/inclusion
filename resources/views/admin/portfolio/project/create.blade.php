@extends('admin.layouts.admin_master')
@section('breadcumb')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Portfolio</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Projects </li>
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
                        <a class="btn btn-primary" href="{{ route('admin.projects.index', $id) }}"> Back </a>
                    </div>
                    <form id="AboutUsForm" action="{{ route('admin.projects.store', $id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Project Name</label>
                                <input type="name" name="name" class="form-control" id="name" placeholder="Enter ..." required value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <input class="form-control" name="image" type="file" id="image" accept="image/*" />
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label for="link">Link</label>
                                <input type="name" name="link" class="form-control" placeholder="Enter ..." required value="{{ old('name') }}">
                            </div> --}}
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endsection
