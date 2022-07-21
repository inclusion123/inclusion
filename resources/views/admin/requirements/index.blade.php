@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Requirement</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Requirement</li>
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
                                <a class="btn btn-primary" href="{{ route('admin.requirement.create') }}"> Create
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
                                            <th>Position</th>

                                            <th>Description</th>
                                            <th id="operations_column" class="operations-tour">Operations</th>
                                            <th>Skills</th>
                                            <th>Experience</th>
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
            function deleterequirement() {
                const id = $("#delete-requirement #item_id").val();
                console.log(id);

                $.ajax({
                    type: "DELETE",
                    url: "{{ url('admin/requirement') }}/" + id,

                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": id
                    },
                    success: function(result) {
                        $("#delete-requirement").modal('hide');
                        $('#requirementTable').DataTable().ajax.reload();

                    }
                });
            }

            function OpenDeleteBox(id) {
                $("#delete-requirement").modal('show');
                $("#delete-requirement #item_id").val(id);
            }

            function openSkillsModal($id) {
                // alert($id);
                $("#show-skills").modal('show');
                $("#show-skills #item_id").val(id);
            }


            $('#requirementTable').DataTable({
                processing: true,
                serverSide: true,

                dataType: 'json',
                ajax: '{{ route('admin.requirement.list') }}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'position',
                        name: 'position'
                    },

                    {
                        data: 'description',
                        name: 'description'
                    },


                    {
                        data: 'action',
                        name: 'action',
                        searchable: false,
                        orderable: false

                    },
                    {
                        data: 'skills',
                        name: 'skills'
                    },
                    {
                        data: 'experience',
                        name: 'experience'
                    },

                ]
            });

            // });
        </script>
    @endsection
