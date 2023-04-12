@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Themes</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Theme</li>
                            <li class="breadcrumb-item active">Themes</li>
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

                            <div class="pull-right"
                                style="text-align: -webkit-right;margin:20px;
                                                        ">
                                <a class="btn btn-primary" href="{{ route('admin.theme.items.create') }}"> Add Theme
                                     </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <table id="itemsTable" class="table table-bordered table-striped" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Download Link</th>
                                            {{-- <th>Image</th> --}}
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
      var themeItemTable =   $('#itemsTable').DataTable({
                processing: true,
                serverSide: true,

                dataType: 'json',
                ajax: '{{ route('admin.theme.items.index') }}',
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'title',
                    },

                    {
                        data: 'title_description',
                    },
                    {
                        data: 'download_link',
                    },


                    {
                        data: 'action',
                        searchable: false,
                        orderable: false

                    },

                ]
            });

            function deleteCategory() {
                var id = $("#delete-theme-category-modal #item_id").val();
                var url = '{{ route("admin.theme.items.destroy", ":id") }}';
                console.log(url);
                url = url.replace(':id', id );
                console.log(id);
                $.ajax({
                    type: "DELETE",
                    enctype: 'multipart/form-data',
                    url: url ,

                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function(result) {
                        $("#delete-theme-category-modal").modal('hide');
                        $('#itemsTable').DataTable().ajax.reload();

                    }
                });
            }
            function OpenCategoryDeleteBox(id) {
            $("#delete-theme-category-modal").modal('show');
            $("#delete-theme-category-modal #item_id").val(id);
            }
    </script>

    @endsection
