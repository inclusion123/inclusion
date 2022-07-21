@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Services </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active"> Service </li>
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
                        <div class="box-header">
                            {{-- <div class="box-title pull-right" style="margin-right: 1px;">
                                <a class="btn btn-block btn-primary" href="{{ route('admin.service.create') }}"> Add
                                    Service</a>
                            </div> --}}
                            <div class="pull-right"
                                style="text-align: -webkit-right;margin:20px;
                                                        ">
                                <a class="btn btn-primary" href="{{ route('admin.service.create') }}"> Add
                                    Service</a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <table id="servicelist" class="table table-bordered table-striped" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Detail</th>
                                            <th id="operations_column" class="operations-tour">Operations</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endsection
    @section('script')
        <script>
            function deleteItem() {
                var id = $("#delete-service-modal #item_id").val();
                console.log(id);

                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.service.destroy') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function(result) {
                        $("#delete-service-modal").modal('hide');
                        $('#servicelist').DataTable().ajax.reload();

                    }
                });
            }

            function OpenDeleteBox(id) {
                $("#delete-service-modal").modal('show');
                $("#delete-service-modal #item_id").val(id);
            }

            $(document).ready(function() {
                $(document).on('click', ".custom-control-input", function() {
                    // alert("sfnd");
                    var status = $(this).prop('checked') == true ? 1 : 0;

                    var id = $(this).data('id');

                    console.log(status);
                    console.log($(this).data("id"));
                    $.ajax({
                        type: 'POST',
                        dataType: "json",
                        url: '{{ route('admin.service.changeStatus') }}',
                        data: {
                            'status': status,
                            'id': id,
                            _token: '{{ csrf_token() }}'
                        },
                        headers: {
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                            }
                        },
                        success: function(data) {
                            Swal.fire(
                                'GREAT!', 'Status changed successfully', 'success')
                            location.reload();
                            console.log(data.success);
                        }
                    });
                });

                $('#servicelist').DataTable({
                    processing: true,
                    serverSide: true,
                    dataType: 'json',
                    ajax: '{{ route('admin.service.list') }}',
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
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'detail',
                            name: 'detail'
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
        </script>
    @endsection
