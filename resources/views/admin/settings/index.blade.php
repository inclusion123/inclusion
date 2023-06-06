@extends('admin.layouts.admin_master')

@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Setting </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"> Setting </li>
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

                    {{-- <div class="pull-right" id="back" style="margin: 20px">
                        <a class="btn btn-primary" href="{{ route('admin.service') }}"> Back</a>
                    </div> --}}
                    <!-- /.card-header -->
                    <!-- form start -->
                   <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('alerts.alerts')
                        <div class="card">

                            <!-- Nested Row within Card Body -->
                            <div class="card-body">
                                <div class="gd-responsive-table">
                                    <table class="table table-bordered table-striped">
                                        <tr>
                                            <th>{{ __('Name') }}</th>
                                            <td> <input type="text" name="name" class="form-control"
                                                    value="{{$setting->name}}"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Address') }}</th>
                                            <td> <input type="text" name="address" class="form-control"
                                                    value="{{$setting->address}}"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Email') }}</th>
                                            <td><input type="email" name="email" class="form-control" id="text"
                                                    value="{{$setting->email}}"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Mobile') }}</th>
                                            <td><input type="tel" name="mobile" class="form-control" id="text"
                                                    value="{{$setting->mobile}}"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Toll-Free') }}</th>
                                            <td><input type="text" name="toll_free" class="form-control" id="text"
                                                    value="{{$setting->toll_free}}"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Web-Link') }}</th>
                                            <td><input type="text" name="web" class="form-control" id="text"
                                                    value="{{$setting->web}}"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Instagram-Link') }}</th>
                                            <td><input type="text" name="instagram" class="form-control" id="text"
                                                    value="{{$setting->instagram}}"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('LinkedIn-Link') }}</th>
                                            <td><input type="text" name="linkedin" class="form-control" id="text"
                                                    value="{{$setting->linkedin}}"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Youtube-Link') }}</th>
                                            <td><input type="text" name="youtube" class="form-control" id="text"
                                                    value="{{$setting->youtube}}"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Twitter-Link') }}</th>
                                            <td><input type="text" name="twitter" class="form-control" id="text"
                                                    value="{{$setting->twitter}}"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Facebook-Link') }}</th>
                                            <td><input type="text" name="facebook" class="form-control" id="text"
                                                    value="{{$setting->facebook}}"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Github-Link') }}</th>
                                            <td><input type="text" name="github" class="form-control" id="text"
                                                    value="{{$setting->github}}"></td>
                                        </tr>



                                    </table>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endsection
