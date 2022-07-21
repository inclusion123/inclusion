@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Features</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Features</li>
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
                <div class="box">
                    <div class="box-header" style="padding: 20px;">

                        {{-- <div class="pull-right" style="text-align: -webkit-right;
                            ">
                            <a class="btn btn-primary" href="{{ route('admin.feature.create') }}">
                                Add
                                Feature</a>
                        </div> --}}
                    </div>
                    <table id="featureTable" class="table table-bordered table-striped" role="grid"
                        aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Icon</th>
                                <th>Operations</th>

                            </tr>
                        </thead>

                    </table>
                </div>
        </section>
    @endsection
    @section('script')
        <script>
            // function deleteItem() {
            //     var id = $("#delete-feature #item_id").val();
            //     // console.log(id);

            //     $.ajax({
            //         type: "DELETE",
            //         url: "{{ url('admin/feature/destroy') }}/" + id,
            //         data: {
            //             "_token": "{{ csrf_token() }}",
            //             "id": id
            //         },
            //         success: function(result) {
            //             $("#delete-feature").modal('hide');
            //             $('#featureTable').DataTable().ajax.reload();

            //         }
            //     });
            // }

            // function OpenDeleteBox(id) {
            //     $("#delete-feature").modal('show');
            //     $("#delete-feature #item_id").val(id);
            // }
            $(document).ready(function() {
                $(function() {
                    $('#featureTable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{{ route('admin.feature.list') }}',
                        columns: [{
                                data: 'id',
                                name: 'id'
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
                                data: 'icon',
                                name: 'icon'
                            },
                            {
                                data: 'action',
                                name: 'action',
                                searchable: false,
                                orderable: false

                            },

                        ]
                    });
                });
            });
        </script>
    @endsection
