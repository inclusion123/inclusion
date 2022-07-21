@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Team Member </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Team Member </li>
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
                        <a class="btn btn-primary" href="{{ route('admin.team.index') }}"> Back </a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="AboutUsForm" action="{{ route('admin.team.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="teamname">Name</label>
                                <input type="name" name="name" class="form-control" id="teamname"
                                    placeholder="Enter ..." required value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="teamdesignation">Designation</label>
                                <input type="name" name="designation" class="form-control" id="teamdesignation"
                                    placeholder="Enter ..." required value="{{ old('designation') }}">
                            </div>

                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="teamimage" class="form-label">Image</label>
                                    <input class="form-control" name="image" type="file" id="teamimage">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                  <div class="col-3"><label>Instagram-Profile-Link</label>
                                    <input type="url" name="instagram" class="form-control" placeholder="">
                                  </div>
                                  <div class="col-3"><label>LinkedIn-Profile-Link</label>
                                    <input type="url" name="linkedin" class="form-control" placeholder="">
                                  </div>
                                  <div class="col-3"><label>Facebook-Profile-Link</label>
                                    <input type="url" name="facebook" class="form-control" placeholder="">
                                  </div>
                                  <div class="col-3"><label>Twitter-Profile-Link</label>
                                    <input type="url" name="twitter" class="form-control" placeholder="">
                                  </div>
                                 
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

   
