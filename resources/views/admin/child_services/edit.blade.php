@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Child Service </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Create Child Service </li>
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

                    <div class="pull-right" id="back" style="margin: 20px;">
                        <a class="btn btn-primary" href="{{ route('admin.childservices.indexpage',$child_service->service_id) }}"> Back</a>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form action="{{ route('admin.childservices.update', $child_service->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <strong>Product Image</strong>
                                @if ($child_service->image)
                                    <img id="original" class="profile-user-img img-responsive img-circle"
                                        src="{{ asset('/storage/images') }}/{{ $child_service->image }}">
                                @endif
                              
                                     
                                    
                             
                            </div>
                            <div class="form-group">
                                <label for="childServiceImage">File input</label>
                               
                                <input type="file" name="image" class="form-control" id="childServiceImage"
                                >
                            </div>
                            <div class="form-group">
                                <label for="serviceId">Service Id</label>
                                <input type="hidden" name="service_id" class="form-control" value="{{ $child_service->service_id  }}"
                                    readonly>
                            </div>
                            <div class="form-group">
                                <label for="serviceName">Name</label>
                                <input type="name" name="name" class="form-control" id="servicenameedit"
                                    value="{{ $child_service->name }}" required>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="editChildDesc" class="form-control" name="desc" rows="3" placeholder="Enter ..." required>{{ $child_service->description }}</textarea>

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
@section('script')

    <script>
        $("#editChildDesc").summernote();
    </script>
   
    {{-- <script type="text/javascript">
    $(document).ready(function () {
        $(function() {
            bsCustomFileInput.init();
        });
    });
    </script> --}}
@endsection
