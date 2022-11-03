@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">  Change Password </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">  Change Password  </li>
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
                <div class="box">
                    <div class="col-md-12">
                        <div class="nav-tabs-custom">
                            <div class="tab-content">
                                <div class="active tab-pane">
                                    <form class="form-horizontal" method="post"
                                            action="{{ route('admin.password.change') }}"
                                            enctype="multipart/form-data" id="admin_password_validate">
                                            @csrf
                                            <div class="card-body">
                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">Current Password</label>
                                            <div class="col-sm-12">
                                                <input type="password" name="old_password" id="current_pwd"
                                                        class="form-control"/>
                                                <span id="chkPwd"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputName" class="col-sm-3 control-label">New Password</label>
                                            <div class="col-sm-12">
                                                <input type="password" name="password" id="new_pwd" class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputEmail" class="col-sm-3 control-label">Confirm Password</label>
                                            <div class="col-sm-12">
                                                <input type="password" name="password_confirmation" id="password_confirmation "
                                                        class="form-control"/>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection

