@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Category</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Themes</li>
                            <li class="breadcrumb-item active">Category</li>
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
                                <a class="btn btn-primary" href="{{ route('admin.theme.create') }}"> Create
                                    Requirement </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <table id="requirementTable" class="table table-bordered table-striped" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Created At</th>
                                            {{-- <th>Experience</th> --}}

                                            {{-- <th>Description</th> --}}
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
            function deleteCategory() {
                let id = $("#delete-theme-category-modal #item_id").val();
                //  id = 1;
                console.log(id);
                console.log("{{ route('admin.theme.delete_category') }}/"+ id );
                $.ajax({
                    type: "DELETE",
                    enctype: 'multipart/form-data',
                    url: "{{ route('admin.theme.delete_category') }}",

                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function(result) {
                        $("#delete-theme-category-modal").modal('hide');
                        $('#requirementTable').DataTable().ajax.reload();

                    }
                });
            }

            function OpenCategoryDeleteBox(id) {
                $("#delete-theme-category-modal").modal('show');
                $("#delete-theme-category-modal #item_id").val(id);
            }

            $('#requirementTable').DataTable({
                processing: true,
                serverSide: true,

                dataType: 'json',
                ajax: '{{ route('admin.theme.index') }}',
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'created_at',
                    },

                    // {
                    //     data: 'experience',
                    // },
                    // {
                    //     data: 'description',
                    // },


                    {
                        data: 'action',
                        searchable: false,
                        orderable: false

                    },

                ]
            });

            // });
        </script>
    @endsection
