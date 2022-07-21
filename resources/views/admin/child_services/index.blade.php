@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Child Services </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Child Service </li>
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
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header" style="padding: 20px;">
                            <div class="" >
                                <a class="btn btn-primary" href="{{ route('admin.service.index') }}"> Back</a>
                            </div>


                            <div class="pull-right" style="text-align: -webkit-right;
                                ">
                                <a class="btn btn-primary" href="{{ route('admin.childservices.create_child', $id) }}">
                                    Add
                                    Child
                                    Service</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <table id="childservicelist" class="table table-bordered table-striped" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th id="action_column" class="operations-tour">Action</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- {{$id}} --}}
    @endsection
    @section('script')
        <script>
            function deleteChildService() {
                const child_id = id
                var id = $("#delete-servicechild-modal #item_id").val();
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('admin/childservices/destroy/') }}" + child_id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function(result) {
                        $("#delete-servicechild-modal").modal('hide');
                        $('#childservicelist').DataTable().ajax.reload();
                        console.log("child service deleted successfully");
                    }
                });
            }
            function OpenDeleteBox(id) {
                $("#delete-servicechild-modal").modal('show');
                $("#delete-servicechild-modal #item_id").val(id);
            }


            $(document).ready(function() {


                // $(document).on('click', ".custom-control-input", function() {
                //     console.log($(this).data("id"));
                // });
                var id = {{ $id }};
                console.log(id);
                $(function() {
                    $('#childservicelist').DataTable({
                        processing: true,
                        serverSide: true,
                        dataType: 'json',
                        type: 'get',

                        ajax: "{{ url('admin/childservices-list', $id) }}",

                        columns: [{
                                data: 'id',
                                name: 'id'
                            },

                            {
                                data: 'image',
                                name: 'image'
                            },
                            {
                                data: 'name',
                                name: 'name'
                            },
                            {
                                data: 'description',
                                name: 'description'
                            },
                            {
                                data: 'action',
                                name: 'action',
                                orderable: false,
                                searchable: false
                            },
                        ]
                    });
                });
            });
        </script>
    @endsection
