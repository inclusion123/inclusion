@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Quotes </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Quotes </li>
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
                <table id="quote_list_table" class="table table-bordered table-striped" role="grid"
                    aria-describedby="example1_info">
                    <thead>
                        <tr role="row">
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Service</th>
                            <th>Message</th>
                            <th>Created At</th>
                            <th id="operations_column" >Operations</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </section>
    @endsection
    @section('script')
        <script>
            $(document).ready(function() {
                $(function() {
                    $('#quote_list_table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{{ route('admin.quote.list') }}',
                        columns: [{
                                data: 'id',
                                name: 'id'
                            },
                            {
                                data: 'name',
                                name: 'name'
                            },
                            {
                                data: 'email',
                                name: 'email'
                            },
                            {
                                data: 'service',
                                name: 'service'
                            },
                            {
                                data: 'message',
                                name: 'message'
                            },
                            {
                                data: 'created_at',
                                name: 'created_at'
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

            function deletequote() {
                var id = $("#delete-quotes-modal #item_id").val();
                console.log(id);

                $.ajax({
                    // type: "POST",
                    url: "{{ route('admin.quote.destroy') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function(result) {
                        $("#delete-quotes-modal").modal('hide');
                        $('#quote_list_table').DataTable().ajax.reload();

                    }
                });
            }

            function OpenQuotesDeleteBox(id) {
                $("#delete-quotes-modal").modal('show');
                $("#delete-quotes-modal #item_id").val(id);
            }
        </script>
    @endsection
