@extends('admin.layouts.admin_master')
@section('breadcumb')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{@$project_category->name}}-projects</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Projects</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('content')
        <section class="content">
            <div class="container-fluid">
                @include('alerts.alerts')
                <div class="col-md-12">
                    <div class="box">
                        <div class="pull-left" style="margin: 20px;">
                            <a class="btn btn-primary" href="{{ route('admin.projectcategory.index') }}"> Back </a>
                        </div>
                        <div class="box-header">
                            <div class="pull-right" style="text-align: -webkit-right;margin:20px;">
                                <a class="btn btn-primary" href="{{ route('admin.projects.create', $id) }}"> Create </a>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-bordered table-striped" role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
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
                var id = $("#delete-modal #item_id").val();
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('admin/+ id +/projects/') }}/" + id,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id,
                        "category_id":{{$id}}
                    },
                    success: function(result) {
                        $("#delete-modal").modal('hide');
                        $('#datatable').DataTable().ajax.reload();

                    }
                });
            }

            function OpenDeleteBox(id) {
                $("#delete-modal").modal('show');
                $("#delete-modal #item_id").val(id);
            }


            $('#datatable').DataTable({
                processing: true,
                serverSide: true,

                dataType: 'json',
                ajax: '{{ route('admin.projects.index',$id) }}',
                columns: [{
                        data: 'id',
                    },
                    {
                        data: 'image',
                    },
                    {
                        data: 'name',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false
                    },
                ]
            });
        </script>
    @endsection
