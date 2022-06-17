@extends('admin.layouts.admin_master')
@section('breadcumb')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Contact-Us </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Contact-Us </li>
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
                <table id="list_table" class="table table-bordered table-striped" role="grid"
                    aria-describedby="example1_info">
                    <thead>
                        <tr role="row">
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Created At</th>
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
                    $('#list_table').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{{ route('admin.contact.list') }}',
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
                                data: 'subject',
                                name: 'subject'
                            },
                            {
                                data: 'message',
                                name: 'message'
                            },
                            {
                                data: 'created_at',
                                name: 'created_at'
                            }
                        ]
                    });
                });
            });
        </script>
    @endsection
