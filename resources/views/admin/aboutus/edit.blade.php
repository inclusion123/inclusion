@extends('admin.layouts.admin_master')

@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit About-Us </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">About-Us </li>
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
               
                <div class="card card-primary">

                    <div class="pull-right" style="margin: 20px;">
                        <a class="btn btn-primary" href="{{ route('admin.aboutus.index') }}"> Back </a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('admin.aboutus.update', $aboutus->id) }}" method="POST"
                        enctype="multipart/form-data">
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
                                            <td><input type="text" name="name" class="form-control"
                                                    value="{{ $aboutus->name }}"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Title') }}</th>
                                            <td><input type="text" name="title" class="form-control"
                                                    value="{{ $aboutus->title }}"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('Description') }}</th>
                                            <td>
                                                <textarea name="description" class="form-control" id="aboutus_desc">{!! $aboutus->description !!}
                                                    </textarea>
                                            </td>
                                        </tr>
                                        <div class="form-group">
                                            <strong>Product Image</strong>
                                            @if ($aboutus->image)
                                                <img id="original" class="profile-user-img img-responsive rounded"
                                                    src="{{ asset('/storage/images') }}/{{ $aboutus->image }}">
                                            @endif




                                        </div>
                                        <div class="form-group">
                                            <label for="aboutUsImage">File input</label>

                                            <input class="form-control" name="image" type="file" id="aboutusimage">
                                        </div>
                                       
                                </div>
                            </div>
                            {{-- <tr>
                                            <th>{{ __('About-Us List') }}</th>
                                            <td>
                                                <a title="View" class=" btn btn-info btn-table btn-icon"
                                                    href="{{ route('admin.about_us_list.index', $aboutus->id) }}">
                                                    <i class='far fa-eye'></i>
                                                </a>
                                            </td>
                                        </tr> --}}

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
@section('script')
    <script>
        $('#aboutus_desc').summernote();
    </script>
@endsection
