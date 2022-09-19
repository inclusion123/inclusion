@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Team Member</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Edit Team Member</li>
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
                <form id="Form" action="{{ route('admin.team.update',$team->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="teamname">Name</label>
                            <input type="name" name="name" class="form-control" id="teamname"
                                placeholder="Enter ..." required value="{{ $team->name }}">
                        </div>
                        <div class="form-group">
                            <label for="teamdesignation">Designation</label>
                            <input type="name" name="designation" class="form-control" id="teamdesignation"
                                placeholder="Enter ..." required value="{{ $team->designation }}">
                        </div>


                        <div class="form-group">
                            {{-- <strong>Team Member Image</strong> --}}
                            @if ($team->image)
                                <img id="original" class="profile-user-img img-responsive "
                                    src="{{ asset('/storage/images') }}/{{ $team->image }}">
                            @endif

                        </div>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="teamimage" class="form-label">Image</label>
                                <input class="form-control" name="image" type="file" id="teamimage" value="{{$team->image}}" accept="image/*"/>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                              <div class="col-3"><label>Instagram-Profile-Link</label>
                                <input type="url" name="instagram" class="form-control" value="{{$team->instagram}}">
                              </div>
                              <div class="col-3"><label>LinkedIn-Profile-Link</label>
                                <input type="url" name="linkedin" class="form-control" value="{{$team->linkedin}}">
                              </div>
                              <div class="col-3"><label>Facebook-Profile-Link</label>
                                <input type="url" name="facebook" class="form-control" value="{{$team->facebook}}">
                              </div>
                              <div class="col-3"><label>Twitter-Profile-Link</label>
                                <input type="url" name="twitter" class="form-control" value="{{$team->twitter}}">
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
