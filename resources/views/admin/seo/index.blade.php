@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">SEO</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">SEO</li>
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
                                <a class="btn btn-primary" href="{{ route('admin.seo.create') }}"> Create SEO </a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">

                                <table id="seoTable" class="table table-bordered table-striped" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th>#</th>
                                            <th>Route-Name</th>
                                            <th>Meta-Title</th>
                                            <th>Meta-Keywords</th>
                                            <th>Meta-Description</th>
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
            function deleteSeo() {
                const id = $("#delete-seo #item_id").val();
                console.log(id);

                $.ajax({
                    type: "DELETE",
                    url: "{{ url('admin/seo') }}/"+id,
                    
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function(result) {
                        $("#delete-seo").modal('hide');
                        $('#seoTable').DataTable().ajax.reload();

                    }
                });
            }

            function OpenDeleteBox(id) {
                $("#delete-seo").modal('show');
                $("#delete-seo #item_id").val(id);
            }

     
                $('#seoTable').DataTable({
                    processing: true,
                    serverSide: true,
                   
                    dataType: 'json',
                    ajax: '{{ route('admin.seo.list') }}',
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },                    
                        {
                            data: 'route_name',
                            name: 'route_name'
                        },
                        {
                            data: 'meta_title',
                            name: 'meta_title'
                        },
                        {
                            data: 'meta_keywords',
                            name: 'meta_keywords'
                        },
                        {
                            data: 'meta_description',
                            name: 'meta_description'
                        },
                    
                        
                        {
                            data: 'action',
                            name: 'action',
                            searchable:false,
                            orderable:false
                          
                        },
                       
                    ]
                });

            // });
        </script>
    @endsection
