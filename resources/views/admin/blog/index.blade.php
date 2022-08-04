@extends('admin.layouts.admin_master')
@section('breadcumb')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Blogs</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Blogs</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->
    @endsection
    @section('content')
        <section class="content">
            <div class="container-fluid">
                <div class="box">
                    <div class="box-header" style="padding: 20px;">
                        <div class="pull-right" style="text-align: -webkit-right;margin:20px;">
                            <a class="btn btn-primary" href="{{ route('admin.blog.create') }}">Create Blog</a>
                        </div>
                    </div>
                    <table id="blogTable" class="table table-bordered table-striped" role="grid"
                        aria-describedby="example1_info">
                        <thead>
                            <tr role="row">
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Action</th>
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
                    $('#blogTable').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{{ route('admin.blog.list') }}',
                        columns: [{
                                data: 'id',
                            },
                            {
                                data: 'title',
                            },
                            {
                                data: 'description',
                            },
                            {
                                data: 'image',
                            },
                            {
                                data:'category',
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

            function deleteItem() {
                var id = $("#delete-blog #item_id").val();
                // console.log(id);

                $.ajax({
                    type: "DELETE",
                    url: "{{ url('admin/blog') }}/"+id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function(result) {
                        $("#delete-blog").modal('hide');
                        $('#blogTable').DataTable().ajax.reload();

                    }
                });
            }

            function OpenDeleteBox(id) {
                $("#delete-blog").modal('show');
                $("#delete-blog #item_id").val(id);
            }

        </script>
    @endsection
